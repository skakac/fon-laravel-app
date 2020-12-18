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
        return $thread->messages()->with(['user'])->get();
    }

    public function create(Forum $forum, Thread $thread, Request $request)
    {
        try {
            $data = $request->validate([
                'user_id' => 'required|exists:users,id',
                'body' => 'required|string|min:1',
            ]);
        } catch (\Throwable $e) {
            return response(['error' => $e->getMessage()], 400);
        }

        return Message::create([
            'user_id' => $data['user_id'],
            'thread_id' => $thread->id,
            'body' => $data['body'],
        ]);
    }

    public function update(Forum $forum, Thread $thread, Message $message, Request $request) {
        try {
            $data = $request->validate([
                'body' => 'required|string|min:1',
            ]);
        } catch (\Throwable $e) {
            return response(['error' => $e->getMessage()], 400);
        }

        $message->update([
            'body' => $data['body'],
        ]);

        return $message;
    }

    public function delete(Forum $forum, Thread $thread, Message $message) {
        $message->delete();
        return $message;
    }
}
