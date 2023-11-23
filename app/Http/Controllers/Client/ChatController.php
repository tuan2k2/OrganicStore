<?php

namespace App\Http\Controllers\client;

use App\Events\SendMessage;
use App\Http\Controllers\Controller;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function __construct()
    {
    }

    public function getChat()
    {
        return view('client.Chat');
    }
    public function sendChat()
    {
        SendMessage::dispatch('hello world');
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
