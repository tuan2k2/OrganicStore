<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\products;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        // $products = new products();

        // $productsList = $products->getAllProducts();

        return view('client.Home');
    }
}
