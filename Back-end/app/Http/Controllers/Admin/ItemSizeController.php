<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemSize\StoreItemSizeRequest;
use App\Http\Requests\ItemSize\UpdateItemSizeRequest;
use App\Http\Resources\Item\ItemSizeResource;
use App\Models\ItemSize;
use App\Repositories\ItemCategory\ItemCategoryRepositoryInterface;
use App\Repositories\ItemPersonType\ItemPersonTypeRepositoryInterface;
use App\Repositories\ItemSize\ItemSizeRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemSizeController extends Controller
{
    private $itemSizeRepository, $itemCategoryRepository, $itemPersonTypeRepository;

    public function __construct(
        ItemSizeRepositoryInterface $itemSizeRepository,
        ItemCategoryRepositoryInterface $itemCategoryRepository,
        ItemPersonTypeRepositoryInterface $itemPersonTypeRepository
    ) {
        $this->itemCategoryRepository = $itemCategoryRepository;
        $this->itemSizeRepository = $itemSizeRepository;
        $this->itemPersonTypeRepository = $itemPersonTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $itemSizes = $this->itemSizeRepository->serverFilteringFor($request->all());

            return ItemSizeResource::collection($itemSizes);
        }
        $itemSizes = $this->itemSizeRepository->all();
        return view('admin.size.index', compact('itemSizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $itemCategories = $this->itemCategoryRepository->allParents();
        $itemPersonTypes = $this->itemPersonTypeRepository->all();
        return view('admin.size.create', compact('itemCategories', 'itemPersonTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreItemSizeRequest $request)
    {
        $result = $this->itemSizeRepository->create($request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.store', ['resource' => $result->value]));
        return redirect()->route('admin.item_size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param ItemSize $itemSize
     * @return Response
     */
    public function show(ItemSize $itemSize)
    {
        if (request()->ajax()) {
            return new ItemSizeResource($itemSize);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ItemSize $itemSize
     * @return Response
     */
    public function edit(ItemSize $itemSize)
    {
        $itemCategories = $this->itemCategoryRepository->allParents();
        $itemPersonTypes = $this->itemPersonTypeRepository->all();
        return view('admin.size.edit', compact('itemSize', 'itemCategories', 'itemPersonTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateItemSizeRequest $request
     * @param ItemSize $itemSize
     * @return Response
     */
    public function update(UpdateItemSizeRequest $request, ItemSize $itemSize)
    {
        $this->itemSizeRepository->update($itemSize, $request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.update', ['resource' => $itemSize->value]));
        return redirect()->route('admin.item_size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ItemSize $itemSize
     * @return Response
     */
    public function destroy(ItemSize $itemSize)
    {
        $this->itemSizeRepository->destroy($itemSize);
        return redirect()->route('admin.item_size.index');
    }
}
