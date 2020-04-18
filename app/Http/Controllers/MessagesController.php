<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $messages = $user->feed_messagess()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'messages' => $messages,
            ];
        }
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->messages()->create([
            'content' => $request->content,
        ]);

        return back();
    }

    public function destroy($id)
    {
        $message = \App\Message::find($id);

        if (\Auth::id() === $message->user_id) {
            $message->delete();
        }

        return back();
    }
}
