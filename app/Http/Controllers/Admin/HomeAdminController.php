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
    public function show_dashboard()
    {

        // $products = new products();

        // $productsList = $products->getAllProducts();

        return view('Admin.dashboard_layout');
    }
}
