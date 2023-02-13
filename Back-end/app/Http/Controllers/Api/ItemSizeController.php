<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ItemSizeResource;
use App\Repositories\ItemSize\ItemSizeRepositoryInterface;
use Illuminate\Http\Request;

/**
 * @group Item Sizes Endpoints
 *
 * APIs for getting the sizes for the items
 */
class ItemSizeController extends Controller
{
    protected $itemSizeRepository;

    public function __construct(ItemSizeRepositoryInterface $itemSizeRepository)
    {
        $this->itemSizeRepository = $itemSizeRepository;
    }

    /**
     * Get a list of Sizes
     *
     * This endpoint lets you get a list of Sizes for the items
     * @unauthenticated
     *
     * @queryParam limit integer The number of resource that will show and then paginate. Example: 50
     * @queryParam item_category_id integer the id of the category for filter the sizes. No-example
     * @queryParam item_person_type_id integer the id of the person type for filter the sizes by gender. No-example
     *
     * @return Resource
     */
    public function index(Request $request)
    {
        $result = $this->itemSizeRepository->serverPaginationFilterForApi($request->all());
        return ItemSizeResource::collection($result);
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
