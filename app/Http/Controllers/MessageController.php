<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class MessageController extends Controller
{
    public function msglist ()
    {   
        try {
            $messages = Message::select(
                'id',
                'member',
                'message',
                'created_at',
            )
                ->orderBy('created_at', 'DESC')
                ->get();
            if($messages){
                $json = [
                    'ok' => true, 
                    'messages' => $messages
                ];
            }else {
                $json = [
                    'ok' => false, 
                    'messages' => $messages
                ];
            }
            
            return $json;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function create(Request $request)
    {
        try {
            Message::create([
                'member' => $request->member,
                'message' => $request->message,
            ]);
        
            return 'success';
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function detail($msgid)
    {   
        try {
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
        } catch (\Exception $e) {
            return $e;
        }
        
    }

    public function update(Request $request, $msgid)
    {
        try {
            Message::where('id', $msgid)->update([
                'member' => $request->member,
                'message' => $request->message,
            ]);

            return 'success';
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function delete($msgid)
    {
        try {
            Message::where('id', $msgid)
            ->delete();

            return 'success';
        } catch (\Exception $e) {
            return $e;
        }
    }
}
