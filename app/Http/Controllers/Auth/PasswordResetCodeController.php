<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordResetCodeController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'regex:/^(\+989|00989|989|09|9)\d{9}$/'],
        ]);

        $request->merge([
            'phone' => reformPhoneNumber($request->phone)
        ]);

        // We will send the password reset code to this user. Once we have attempted
        // to send the code, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetCode($request->only('phone'));

        return $status == Password::RESET_LINK_SENT
            ? redirect()->to(route('password.reset'))->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
