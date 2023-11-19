<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\client\products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        // Lấy dữ liệu từ cơ sở dữ liệ

        // Trả về view 'home' và truyền dữ liệu vào view
        return view('client.Home');
    }
}
