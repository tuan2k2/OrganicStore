<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
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
        $dung =  View('avbc');
        return view('Admin.Home');
    }
}
