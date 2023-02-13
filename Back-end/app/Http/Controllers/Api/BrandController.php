<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BrandResource;
use App\Repositories\Brand\BrandRepositoryInterface;
use Illuminate\Http\Request;

/**
 * @group Brand Endpoints
 *
 * APIs for managing brands
 */
class BrandController extends Controller
{
    protected $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Get a list of brands.
     *
     * This endpoint lets you get a list of brands
     * @unauthenticated
     *
     * @queryParam is_show boolean True will return active brands and False will return inactive brands. Example: true
     * @queryParam limit integer The number of resource that will show and then paginate. Example: 50
     *
     * @return Resource
     */
    public function index(Request $request)
    {
        $result = $this->brandRepository->serverPaginationFilterForApi($request->all());
        return BrandResource::collection($result);
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
