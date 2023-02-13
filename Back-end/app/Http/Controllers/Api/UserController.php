<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Http\Resources\Api\UserResource;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\User\ChangeUserPasswordRequest;
use App\Http\Requests\User\UploadAvatarApiRequest;
use App\Rules\PhoneNumber;
use App\Responses\JsonResponse;
use App\Rules\AlphaSpaces;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @group Authentication Endpoints
     *
     * Get the user detail
     * @authenticated
     *
     * Get the current user detail information.
     *
     * @apiResource App\Http\Resources\Api\UserResource
     * @apiResourceModel App\Models\User
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        return response()->json(new JsonResponse(new UserResource(auth()->user())), Response::HTTP_OK);
    }

    /**
     * @group User Endpoints
     *
     * Update the user profile of the current customer
     * @authenticated
     *
     * @bodyParam first_name string required The first name of the user. No-example
     * @bodyParam last_name string required The last name of the user. No-example
     * @bodyParam phone string The phone of the user. No-example
     *
     * @return \Illuminate\Http\Response
     */
    public function changeProfile(Request $request)
    {
        $data = $request->validate([
            'first_name' => [
                'required',
                'string',
                'max:20',
                new AlphaSpaces
            ],
            'last_name' => [
                'required',
                'string',
                'max:20',
                new AlphaSpaces
            ],
            'phone' => [
                'sometimes',
                'required',
                'numeric',
                'unique:user_profile,phone,' . auth()->user()->userProfile->id,
                new PhoneNumber
            ]
        ]);
        $result = $this->userRepository->update(auth()->user(), $data);
        if ($result) {
            return response()->json(new JsonResponse(new UserResource(auth()->user())), Response::HTTP_OK);
        }
        return response()->json(new JsonResponse([], __('error.user_change_profile.update')), Response::HTTP_NOT_FOUND);
    }

    /**
     * @group User Endpoints
     *
     * Update the password of the current customer
     * @authenticated
     *
     * @bodyParam current_password string required The current password of the user. No-example
     * @bodyParam password string required The email of the user. No-example
     * @bodyParam password_confirmation string required The password confirmation of the user. No-example
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangeUserPasswordRequest $request)
    {
        $data = $request->validated();
        $result = $this->userRepository->resetPassword(auth()->user(), $data);
        if ($result) {
            return response()->json(new JsonResponse(new UserResource(auth()->user())), Response::HTTP_OK);
        }
        return response()->json(new JsonResponse([], __('error.user_change_profile.update')), Response::HTTP_NOT_FOUND);
    }

    /**
     * @group User Endpoints
     *
     * Upload avatar of the current customer
     * @authenticated
     *
     * @bodyParam avatar file required The image avatar of the current customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar(UploadAvatarApiRequest $request)
    {
        $data = $request->validated();
        $result = $this->userRepository->update(auth()->user(), $data);
        if ($result) {
            return response()->json(new JsonResponse(new UserResource(auth()->user())), Response::HTTP_OK);
        }
        return response()->json(new JsonResponse([], __('error.user_change_profile.update')), Response::HTTP_NOT_FOUND);
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
