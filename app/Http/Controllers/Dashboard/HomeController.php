<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BackEndController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends BackEndController
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index(Request $request)
    {
        return view('dashboard.home.index');
    }
}
