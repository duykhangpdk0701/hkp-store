<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStock\StoreItemStockRequest;
use App\Http\Requests\ItemStock\UpdateItemStockPriceRequest;
use App\Http\Resources\Item\ItemStockResource;
use App\Models\Item;
use App\Models\ItemStock;
use App\Repositories\ItemStock\ItemStockRepositoryInterface;
use App\Services\ItemStockService;
use Illuminate\Http\Request;

class ItemStockController extends Controller
{
    private $itemStockService, $itemStockRepository;

    public function __construct(
        ItemStockService $itemStockService,
        ItemStockRepositoryInterface $itemStockRepository
    ) {
        $this->itemStockService = $itemStockService;
        $this->itemStockRepository = $itemStockRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $itemStocks = $this->itemStockRepository->serverPaginationFilteringFor($request->all());

            return ItemStockResource::collection($itemStocks);
        }
        $stockStatuses = ItemStock::$stockStatuses;
        return view('admin.item_stock.index', compact('stockStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemStockRequest $request)
    {
        $result = $this->itemStockService->create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemStock  $itemStock
     * @return \Illuminate\Http\Response
     */
    public function show(ItemStock $itemStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemStock  $itemStock
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemStock $itemStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemStock  $itemStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemStock $itemStock)
    {
        //
    }

    /**
     * Update the price of the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemStock  $itemStock
     * @return \Illuminate\Http\Response
     */
    public function updatePrice(UpdateItemStockPriceRequest $request, ItemStock $itemStock)
    {
        $result = $this->itemStockService->updatePrice($itemStock, $request->validated());
        if ($result) {
            session()->flash(NOTIFICATION_SUCCESS, __('success.update', ['resource' => 'stock']));
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemStock  $itemStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemStock $itemStock)
    {
        //
    }
}
