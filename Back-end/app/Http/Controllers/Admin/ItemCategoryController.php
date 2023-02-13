<?php

namespace App\Http\Controllers\Admin;

use App\Acl\Acl;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCategory\StoreItemCategoryRequest;
use App\Http\Requests\ItemCategory\UpdateItemCategoryRequest;
use App\Models\ItemCategory;
use App\Repositories\ItemCategory\ItemCategoryRepositoryInterface;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    private $itemCategoryRepository;

    public function __construct(ItemCategoryRepositoryInterface $itemCategoryRepository)
    {
        $this->middleware('permission:' . Acl::PERMISSION_ITEM_CATEGORY_LIST)->only(['index', 'show']);
        $this->middleware('permission:' . Acl::PERMISSION_ITEM_CATEGORY_ADD)->only(['create', 'store']);
        $this->middleware('permission:' . Acl::PERMISSION_ITEM_CATEGORY_EDIT)->only(['edit', 'update']);
        $this->middleware('permission:' . Acl::PERMISSION_ITEM_CATEGORY_DELETE)->only('destroy');

        $this->itemCategoryRepository = $itemCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemCategories = $this->itemCategoryRepository->allParentWithChildren();
        return view('admin.item_category.index', compact('itemCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemCategories = $this->itemCategoryRepository->allParents();
        return view('admin.item_category.create', compact('itemCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemCategoryRequest $request)
    {
        $result = $this->itemCategoryRepository->create($request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.store', ['resource' => $result->name]));
        return redirect()->route('admin.item_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemCategory $itemCategory)
    {
        $itemCategories = $this->itemCategoryRepository->allParents();
        return view('admin.item_category.edit', compact('itemCategory', 'itemCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemCategoryRequest $request, ItemCategory $itemCategory)
    {
        $this->itemCategoryRepository->update($itemCategory, $request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.update', ['resource' => $itemCategory->name]));
        return redirect()->route('admin.item_category.index');
    }

    /**
     * Update the specified resource status in storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(ItemCategory $itemCategory)
    {
        $result = $this->itemCategoryRepository->toggleStatus($itemCategory);
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemCategory $itemCategory)
    {
        $this->itemCategoryRepository->destroy($itemCategory);
        return redirect()->route('admin.item_category.index');
    }
}
