<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:user')->except('logout');
    } // End Construct Method

    public function viewLogin()
    {
        return view('dashboard.login.index');
    } // End View Login Form

    public function field()
    {
        if (filter_var(request()->username, FILTER_VALIDATE_EMAIL))
            return 'email';

        if (is_numeric(request()->username))
            return 'phone';

        return 'username';
    } // End Check Field [ User Name || Phone || Email ]

    public function login(LoginRequest $request)
    {
        if (app('router')->getRoutes()->match(app('request'))->uri() == 'user/login')
            $info = ['user', RouteServiceProvider::DASHBOARD];
        else
            $info = ['student', RouteServiceProvider::HOME];

        if (Auth::guard($info[0])->attempt([$this->field() => request()->username, 'password' => request()->password])) {
            toastr()->success(__('alerts.welcome_back') . ' <b>' . Auth::guard($info[0])->user()->username . '</b>');
            return redirect()->intended(route($info[1]));
        } else {
            return redirect()->back()->withInput(request()->only('username', 'remember_me'))->with(['error' => __('auth.failed')]);
        }
    } // End Login User

    public function logout()
    {
        if (app('router')->getRoutes()->match(app('request'))->uri == 'user/logout')
            $info = ['user', 'user.login'];
        else
            $info = ['student', 'login'];

        $username = __('alerts.bye_bye', ['username' => Auth::guard($info[0])->user()->username]);
        Auth::guard($info[0])->logout();
        return redirect()->route($info[1])->with(['username' => $username]);
    } // End Logout Auth

} // End Login Controller
