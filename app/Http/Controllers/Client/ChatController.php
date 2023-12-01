<?php

namespace App\Http\Controllers\client;

use App\Events\SendMessage;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\KhachHang;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function __construct()
    {
    }
    public function showUser()
    {
        $users = KhachHang::all();
        // return view('client.chat', ['users' => $users ?? null]);
    }

    public function getChat()
    {
        $users = Admin::all();
        $userId = Session::get('idKH');
        return view('client.chat', ['users' => $users ?? null, 'id_user' => 66, 'id_kh' => $userId]); //Auth::user()->idKH
    }

    public function getChatAdmin()
    {
        $users = KhachHang::all();
        $userId = Session::get('admin_id');
        return view('admin.chat', ['users' => $users ?? null, 'id_user' => 66, 'id_admin' => $userId]); //Auth::user()->idKH
    }
    public function sendChat(Request $request)
    {
        $userId = Session::get('idKH');
        SendMessage::dispatch($request->channel, 1, 2, $request->body);
    }
    public function sendChatAdmin(Request $request)
    {
        $adminId = Session::get('admin_id');
        SendMessage::dispatch($request->channel, $request->to, $adminId, $request->body);
    }

    public function connect(Request $request)
    {
        $broadcaster = new PusherBroadcaster(
            new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                []
            )
        );
        return $broadcaster->validAuthenticationResponse($request, []);
    }
}
