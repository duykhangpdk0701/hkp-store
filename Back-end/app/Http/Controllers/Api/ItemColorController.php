<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ItemColorResource;
use App\Repositories\ItemColor\ItemColorRepositoryInterface;
use Illuminate\Http\Request;

/**
 * @group Item Colors Endpoints
 *
 * APIs for getting the colors for the items
 */
class ItemColorController extends Controller
{

    protected $itemColorRepository;

    public function __construct(ItemColorRepositoryInterface $itemColorRepository)
    {
        $this->itemColorRepository = $itemColorRepository;
    }
    /**
     * Get a list of Colors
     *
     * This endpoint lets you get a list of Colors for the items
     * @unauthenticated
     *
     * @queryParam limit integer The number of resource that will show and then paginate. Example: 50
     *
     * @return Resource
     */
    public function index(Request $request)
    {
        $result = $this->itemColorRepository->serverPaginationFilterForApi($request->all());
        return ItemColorResource::collection($result);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
