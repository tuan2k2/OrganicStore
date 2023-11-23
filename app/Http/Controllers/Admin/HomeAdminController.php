<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        return view('admin.Home');
    }
}
