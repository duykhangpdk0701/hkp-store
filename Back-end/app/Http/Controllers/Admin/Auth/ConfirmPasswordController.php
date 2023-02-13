<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the password confirmation view.
     *
     * @return \Illuminate\View\View
     */
    public function showConfirmForm()
    {
        return view('admin.auth.passwords.confirm');
    }

    /**
     * Confirm the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function confirm(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $this->resetPasswordConfirmationTimeout($request);

        return $request->wantsJson() || $request->ajax()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }
}
