<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class MessageController extends Controller
{
    public function index ()
    {   
        $messages = Message::select(
            'id',
            'member',
            'message',
            'created_at',
        )
            ->orderBy('created_at', 'DESC')
            ->get();
    
        return $messages;
    }

    public function create(Request $request)
    {
        Message::create([
            'member' => $request->member,
            'message' => $request->message,
        ]);
    
        return 'success';
    }

    public function detail($msgid)
    {
        $message = Message::select(
            'id',
            'member',
            'message',
            'created_at',
            'updated_at',
        )
            ->where('id', $msgid)
            ->first();
    
        return $message;
    }

    public function update(Request $request, $msgid)
    {
        Message::where('id', $msgid)->update([
            'message' => $request->message,
        ]);

        return 'success';
    }

    public function delete($msgid)
    {
        Message::where('id', $msgid)
        ->delete();

        return 'success';
    }
}
