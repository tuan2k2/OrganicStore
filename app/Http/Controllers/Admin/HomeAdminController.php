<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        // $products = new products();

        // $productsList = $products->getAllProducts();

        return view('Admin.Home');
    }
    public function show_dashboard()
    {

        // $products = new products();

        // $productsList = $products->getAllProducts();

        return view('Admin.dashboard_layout');
    }
}
