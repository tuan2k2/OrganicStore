<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class LoginController extends Controller
{

    public function __construct()
    {
    }
    public function getLogin()
    {
        return view('login');
    }
}
