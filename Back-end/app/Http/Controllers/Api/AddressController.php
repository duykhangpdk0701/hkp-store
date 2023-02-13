<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Repositories\Address\AddressRepositoryInterface;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Models\Address;
use App\Responses\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group User Endpoints
 *
 * APIs for managing Address
 */
class AddressController extends Controller
{
    private $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
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
     * Create a new address of the current customer
     * @authenticated
     *
     * @bodyParam name string The name of the address. No-example
     * @bodyParam city_id int required The id of the city. No-example
     * @bodyParam district_id int required The id of the district. No-example
     * @bodyParam ward_id int The id of the ward. No-example
     * @bodyParam address string required The address of the user. No-example
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {
        if ($this->addressRepository->create($request->validated())) {
            return response()->json(new JsonResponse(new UserResource(auth()->user())), Response::HTTP_OK);
        }

        return response()->json(new JsonResponse([], __('error.user_change_profile.store_address')), Response::HTTP_NOT_FOUND);
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
     * Update the address of the current customer
     * @authenticated
     *
     * @urlParam address_id integer required The ID of the address.
     * 
     * @bodyParam name string The name of the address. No-example
     * @bodyParam city_id int required The id of the city. No-example
     * @bodyParam district_id int required The id of the district. No-example
     * @bodyParam ward_id int The id of the ward. No-example
     * @bodyParam address string required The address of the user. No-example
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        if ($this->addressRepository->update($address, $request->validated())) {
            return response()->json(new JsonResponse(new UserResource(auth()->user())), Response::HTTP_OK);
        }

        return response()->json(new JsonResponse([], __('error.user_change_profile.update_address')), Response::HTTP_NOT_FOUND);
    }

    /**
     * Delete the address of the current customer
     * @authenticated
     * 
     * @urlParam address_id integer required The ID of the address.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        if ($this->addressRepository->destroy($address)) {
            return response()->json(new JsonResponse([
                'message' => __('success.user_change_profile.delete_address')
            ]), Response::HTTP_OK);
        }

        return response()->json(new JsonResponse([], __('error.user_change_profile.delete_address')), Response::HTTP_NOT_FOUND);
    }

    /**
     * Set default address shipping of the current customer
     * @authenticated
     *
     * @urlParam address_id integer required The ID of the address.
     *
     * @return \Illuminate\Http\Response
     */
    public function setDefaultAddress(Address $address)
    {
        if ($this->addressRepository->setAsDefault($address)) {
            return response()->json(new JsonResponse(new UserResource(auth()->user())), Response::HTTP_OK);
        }

        return response()->json(new JsonResponse([], __('error.user_change_profile.set_default_address')), Response::HTTP_NOT_FOUND);
    }
}
