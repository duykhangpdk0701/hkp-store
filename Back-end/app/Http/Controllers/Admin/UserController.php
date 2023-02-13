<?php

namespace App\Http\Controllers\Admin;

use App\Acl\Acl;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangeMyProfileRequest;
use App\Http\Requests\User\ChangeUserPasswordRequest;
use App\Http\Requests\User\ResetUserPasswordRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\SysCity;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        // Permissions validations
        $this->middleware('permission:' . Acl::PERMISSION_USER_LIST)->only(['index', 'show']);
        $this->middleware('permission:' . Acl::PERMISSION_USER_ADD)->only(['create', 'store']);
        $this->middleware('permission:' . Acl::PERMISSION_USER_EDIT)->only(['edit', 'update']);
        $this->middleware('permission:' . Acl::PERMISSION_USER_DELETE)->only('destroy');

        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->allWithRoles();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $cities = SysCity::all();
        return view('admin.user.create', compact('roles', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $this->userRepository->create($data);
        session()->flash(NOTIFICATION_SUCCESS, __('success.store', ['resource' => 'account']));
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->load('roles');
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $this->userRepository->update($user, $data);
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userRepository->destroy($user);
        return redirect()->route('admin.user.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(ResetUserPasswordRequest $request, User $user)
    {
        $data = $request->validated();
        $this->userRepository->resetPassword($user, $data);
        session()->flash(NOTIFICATION_SUCCESS, __('success.update', ['resource' => 'password']));
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangeUserPasswordRequest $request)
    {
        $data = $request->validated();
        $this->userRepository->resetPassword(auth()->user(), $data);
        session()->flash(NOTIFICATION_SUCCESS, __('success.update', ['resource' => 'password']));
        return redirect()->back();
    }

    /**
     * Show the user profile page
     */
    public function myProfile()
    {
        $cities = SysCity::all();
        return view('admin.user.profile', compact('cities'));
    }

    /**
     * @param \App\Http\Requests\User\ChangeMyProfileRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeProfile(ChangeMyProfileRequest $request)
    {
        $data = $request->validated();

        if ($this->userRepository->update(auth()->user(), $data)) {
            session()->flash(NOTIFICATION_SUCCESS, __('success.user_change_profile.update'));
            return redirect()->back();
        }

        session()->flash(NOTIFICATION_ERROR, __('error.user_change_profile.update'));

        return redirect()->back();
    }
}
