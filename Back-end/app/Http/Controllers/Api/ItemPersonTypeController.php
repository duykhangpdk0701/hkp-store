<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ItemPersonTypeResource;
use App\Models\ItemPersonType;
use Illuminate\Http\Request;

/**
 * @group Person Gender Endpoints
 *
 * APIs for getting the genders for the items
 */
class ItemPersonTypeController extends Controller
{
    /**
     * Get a list of Person Types for the items.
     *
     * This endpoint lets you get a list of person types for the items
     * @unauthenticated
     *
     * @return Resource
     */
    public function index()
    {
        return ItemPersonTypeResource::collection(ItemPersonType::all());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
