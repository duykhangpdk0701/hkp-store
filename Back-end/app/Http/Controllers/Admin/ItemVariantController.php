<?php

namespace App\Http\Controllers\Admin;

use App\Acl\Acl;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemBid\ItemBidConfirmationResource;
use App\Models\ItemBoxCondition;
use App\Models\ItemVariant;
use App\Models\User;
use App\Repositories\ItemVariant\ItemVariantRepositoryInterface;
use Illuminate\Http\Request;

class ItemVariantController extends Controller
{
    private $itemVariantRepository;

    public function __construct(
        ItemVariantRepositoryInterface $itemVariantRepository,
    ) {
        $this->itemVariantRepository = $itemVariantRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemVariant  $itemVariant
     * @return \Illuminate\Http\Response
     */
    public function show(ItemVariant $itemVariant)
    {
        $itemVariant->load('item', 'size');
        return view('admin.item_variant.show', compact('itemVariant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemVariant  $itemVariant
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemVariant $itemVariant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemVariant  $itemVariant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemVariant $itemVariant)
    {
        //
    }

    /**
     * Update the specified resource status in storage.
     *
     * @param  \App\Models\ItemVariant  $itemVariant
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(ItemVariant $itemVariant)
    {
        $result = $this->itemVariantRepository->toggleStatus($itemVariant);
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemVariant  $itemVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemVariant $itemVariant)
    {
        //
    }
}
