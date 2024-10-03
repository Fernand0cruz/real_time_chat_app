<?php

namespace App\Http\Controllers\Api;

use App\Events\Chat\SendMessage;
use App\Http\Controllers\Controller;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    public function listMessages(User $user)
    {
        $userFrom =  Auth::user()->id;
        $userTo = $user->id;

        $messages = Message::where(
            function ($query) use ($userFrom, $userTo) {
                $query->where([
                    'from' => $userFrom,
                    'to' => $userTo,
                ]);
            }
        )->orWhere(
            function ($query) use ($userFrom, $userTo) {
                $query->where([
                    'from' => $userTo,
                    'to' => $userFrom,
                ]);
            }
        )->orderBy('created_at', 'ASC')->get();

        return response()->json([
            'messages' => $messages
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'to' => 'required|exists:users,id', 
        ]);
    
        $message = new Message();
        $message->from = Auth::user()->id;
        $message->to = $request->input('to');
        $message->content = strip_tags($request->input('content'));
        $message->save();

        Event::dispatch(new SendMessage($message, $request->to));
    
        return response()->json(['message' => $message], 201);
    }
}
