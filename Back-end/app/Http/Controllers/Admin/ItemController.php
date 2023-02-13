<?php

namespace App\Http\Controllers\Admin;

use App\Acl\Acl;
use App\Http\Controllers\Controller;
use App\Http\Requests\Item\AddImageItemRequest;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Http\Resources\Item\ItemResource;
use App\Models\Item;
use App\Models\ItemVariant;
use App\Models\User;
use App\Repositories\Item\ItemRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Responses\JsonResponse;
use App\Services\ItemService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ItemController extends Controller
{
    protected $itemService, $itemRepository, $userRepository;

    public function __construct(
        ItemService $itemService,
        ItemRepositoryInterface $itemRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->itemService = $itemService;
        $this->itemRepository = $itemRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->itemService->getAllItems($request->all());
        $brands = $this->itemService->getAllBrand();
        $itemCategories = $this->itemService->getAllCategories();
        if ($request->ajax()) {
            return ItemResource::collection($items);
        }
        return view('admin.item.index', compact('items', 'brands', 'itemCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemPersonType = [];
        $brands = $this->itemService->getAllBrand();
        $itemCategories = $this->itemService->getAllCategories();
        $personTypes = $this->itemService->getAllPersonTypes();
        $stockStatuses = $this->itemService->getAllStockStatuses();
        $itemColors = $this->itemService->getAllColors();

        if (old('item_person_type_id')) {
            $itemPersonType = $this->itemService->findPersonType(old('item_person_type_id'));
        }

        return view('admin.item.create', compact('brands', 'itemCategories', 'personTypes', 'itemPersonType', 'stockStatuses', 'itemColors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $result = $this->itemService->create($request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.store', ['resource' => $result->name]));
        return redirect()->route('admin.item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (request()->ajax()) {
            $item = $this->itemRepository->find($id);

            return new ItemResource($item);
        }
        $item = $this->itemRepository->findWithVariants($id);
        $brands = $this->itemService->getAllBrand();
        $itemCategories = $this->itemService->getAllCategories();
        $selectedCategories = $item->categories()->pluck('id')->toArray();
        $stockStatuses = $this->itemService->getAllStockStatuses();
        $personTypes = $this->itemService->getAllPersonTypes();
        $itemPersonType = $this->itemService->findPersonType($item->item_person_type_id);
        $itemColors = $this->itemService->getAllColors();

        return view('admin.item.show', compact(
            'item',
            'brands',
            'itemCategories',
            'stockStatuses',
            'selectedCategories',
            'personTypes',
            'itemPersonType',
            'itemColors'
        ));
    }

    /**
     * Show the stock of the variant and the item
     */
    public function showVariant(Request $request, Item $item, ItemVariant $itemVariant)
    {
        $itemVariant->load('item', 'size', 'itemStocks');
        $index = 0;
        return view('admin.item_variant.show', compact('item', 'itemVariant', 'index'));
    }

    /**
     * Use AJAX to get the inbound row for the item stock
     */
    public function getInboundRow(Request $request)
    {
        $index = $request->get('index');
        return view('admin.item_variant.partials.inbound_item', compact('index'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $result = $this->itemService->update($request, $item);
        session()->flash(NOTIFICATION_SUCCESS, __('success.update', ['resource' => $item->name]));
        return redirect()->back();
    }

    /**
     * Update the specified resource is featured in storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleFeatured(Item $item)
    {
        $result = $this->itemService->toggleFeatured($item);
        if (!$result) {
            return response()->json(new JsonResponse(error: __('error.item.cannot_processed')), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json(new JsonResponse(['message' => __('success.item.changed_featured')]), Response::HTTP_OK);
    }

    /**
     * Update the specified resource status in storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleStatus(Item $item, Request $request)
    {
        $result = $this->itemService->toggleStatus($item, $request->only('status'));
        if (!$result) {
            return response()->json(new JsonResponse(error: __('error.item.cannot_processed')), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json(new JsonResponse(['message' => __('success.item.changed_status')]), Response::HTTP_OK);
    }

    /**
     * Update the specific resource media type in storage
     *
     * @param Item $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleMediaType(Item $item)
    {
        $result = $this->itemService->toggleMediaType($item);
        if (!$result) {
            return response()->json(new JsonResponse(error: __('error.item.cannot_processed')), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json(new JsonResponse(['message' => __('success.item.changed_media_type')]), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }


    /**
     * Remove the specified resource media from storage.
     *
     * @param  \Spatie\MediaLibrary\MediaCollections\Models\Media $media
     *
     * @return bool
     */
    public function removeMedia(Media $media)
    {
        $image = $media->delete();
        return $image;
    }

    /**
     * Add Media to the specified resource
     *
     * @param App\Http\Requests\Item\AddImageItemRequest $request
     * @param \App\Models\Item $item
     *
     * @return \Illuminate\Http\Response
     */
    public function addMedia(AddImageItemRequest $request, Item $item)
    {
        $result = $this->itemService->addMedia($item);
        return redirect()->route('admin.item.show', $item);
    }

    /**
     * Add sizes to the resource
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Item $item
     *
     * @return \Illuminate\Http\Response
     */
    public function addSize(Request $request, Item $item)
    {
        $result = $this->itemService->addSize($request, $item);
        return redirect()->route('admin.item.show', $item);
    }


    /**
     * Delete sizes from the resource
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Item $item
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteSize(Request $request, Item $item)
    {
        $result = $this->itemService->removeSize($request, $item);
        return redirect()->route('admin.item.show', $item);
    }
}
