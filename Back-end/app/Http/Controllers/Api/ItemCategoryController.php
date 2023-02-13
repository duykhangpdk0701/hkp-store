<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ItemCategoryResource;
use App\Repositories\ItemCategory\ItemCategoryRepositoryInterface;
use Illuminate\Http\Request;

/**
 * @group Item Category Endpoints
 *
 * APIs for managing item categories
 */
class ItemCategoryController extends Controller
{
    protected $itemCategoryRepository;

    public function __construct(ItemCategoryRepositoryInterface $itemCategoryRepository)
    {
        $this->itemCategoryRepository = $itemCategoryRepository;
    }

    /**
     * Get a list of categories of the items.
     *
     * This endpoint lets you get a list of categories of the items
     * @unauthenticated
     *
     * @queryParam is_show boolean True will return active brands and False will return inactive brands. Example: true
     * @queryParam with_children boolean True categories with subcategories No-example
     * @queryParam limit integer The number of resource that will show and then paginate. Example: 50
     *
     * @return Resource
     */
    public function index(Request $request)
    {
        $result = $this->itemCategoryRepository->serverPaginationFilterForApi($request->all());
        return ItemCategoryResource::collection($result);
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
