<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginAdminController extends Controller
{
    public function getLoginAdmin()
    {
        return view('Login');
    }

    public function AuthLogin()
    {
        if (!Session::has('admin_id') || !Session::has('admin_name')) {
            return Redirect::to('login');
        } else {
            return Redirect::to('admin.dashboard');
        }
    }
}
