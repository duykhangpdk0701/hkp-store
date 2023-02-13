<?php

namespace App\Http\Controllers\Admin;

use App\Acl\Acl;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemColor\StoreItemColorRequest;
use App\Http\Requests\ItemColor\UpdateItemColorRequest;
use App\Http\Resources\Item\ItemColorResource;
use App\Models\ItemColor;
use App\Repositories\ItemColor\ItemColorRepositoryInterface;
use Illuminate\Http\Request;

class ItemColorController extends Controller
{
    private $itemColorRepository;

    public function __construct(ItemColorRepositoryInterface $itemColorRepository)
    {
        // Permissions validations
        $this->middleware('permission:' . Acl::PERMISSION_ITEM_COLOR_LIST)->only(['index', 'show']);
        $this->middleware('permission:' . Acl::PERMISSION_ITEM_COLOR_ADD)->only(['create', 'store']);
        $this->middleware('permission:' . Acl::PERMISSION_ITEM_COLOR_EDIT)->only(['edit', 'update']);
        $this->middleware('permission:' . Acl::PERMISSION_ITEM_COLOR_DELETE)->only('destroy');

        $this->itemColorRepository = $itemColorRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemColors = $this->itemColorRepository->serverPaginationFilteringFor($request->all());
        // dd($request->all());
        if ($request->ajax()) {
            return ItemColorResource::collection($itemColors);
        }
        return view('admin.item_color.index', compact('itemColors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.item_color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemColorRequest $request)
    {
        $result = $this->itemColorRepository->create($request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.item_color.store', ['item_color' => $result->name]));
        return redirect()->route('admin.item_color.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemColor  $itemColor
     * @return \Illuminate\Http\Response
     */
    public function show(ItemColor $itemColor)
    {
        return view('admin.item_color.show', compact('itemColor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemColor  $itemColor
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemColor $itemColor)
    {
        return view('admin.item_color.edit', compact('itemColor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemColor  $itemColor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemColorRequest $request, ItemColor $itemColor)
    {
        $result = $this->itemColorRepository->update($itemColor, $request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.item_color.update', ['item_color' => $itemColor->name]));
        return redirect()->route('admin.item_color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemColor  $itemColor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemColor $itemColor)
    {
        $this->itemColorRepository->destroy($itemColor);
        return redirect()->route('admin.item_color.index');
    }
}
