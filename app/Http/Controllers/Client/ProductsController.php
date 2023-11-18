<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
    }

    public function getAllProducts()
    {

        // $products = new products();

        // $productsList = $products->getAllProducts();

        return view('client.Products');
    }
}
