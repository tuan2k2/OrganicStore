<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
    }

    public function getOrder()
    {
        return view('client.OrderCheck');
    }
}
