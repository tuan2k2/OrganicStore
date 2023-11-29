<?php

namespace App\Http\Controllers\client;

use App\Events\SendMessage;
use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $users = KhachHang::all();
        $user = Auth::user();
        $userId = auth::id();
        return view('client.chat', ['users' => $users ?? null, 'id_user' => $userId]); //Auth::user()->idKH
    }
    public function sendChat(Request $request)
    {
        SendMessage::dispatch($request->channel, $request->to, 66, $request->body);
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
