<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Message;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller {
    public function users()
    {
        return User::all();
    }

    public function forums()
    {
        return Forum::withCount('threads')->get();
    }

    public function threads(Forum $forum)
    {
        return $forum->threads()->with(['user', 'firstMessage'])->get();
    }

    public function messages(Forum $forum, Thread $thread, Request $request)
    {
        return $thread->messages()->with(['user']);
    }

    public function create(Forum $forum, Thread $thread, Request $request)
    {
        $data = $request->validate([
            'body' => 'required|string|min:1',
        ]);

        return Message::create([
            'user_id' => auth()->id(),
            'thread_id' => $thread->id,
            'body' => $data['body'],
        ]);
    }

    public function update(Forum $forum, Thread $thread, Message $message, Request $request) {
        $data = $request->validate([
            'body' => 'required|string|min:1',
        ]);

        return $message->update([
            'user_id' => auth()->id(),
            'thread_id' => $thread->id,
            'body' => $data['body'],
        ]);
    }

    public function delete(Forum $forum, Thread $thread, Message $message) {
        return $message->delete();
    }
}
