<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function __construct()
    {
    }

    public function getProductDetails($id = null)
    {

        // $products = new products();

        // $productsList = $products->getAllProducts();

        return view('client.ProductDetails');
    }
}
