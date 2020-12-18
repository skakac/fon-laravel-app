<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Message;
use App\Models\Thread;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index()
    {
        $forums = Forum::withCount('threads')->get();
        return view('dashboard', compact('forums'));
    }

    public function forum(Forum $forum)
    {
        $threads = $forum->threads()
            ->with(['user', 'firstMessage'])
            ->get();
        return view('forum', compact('forum', 'threads'));
    }

    public function thread(Forum $forum, Thread $thread, Request $request)
    {
        $messages = $thread->messages()
            ->with(['user'])
            ->paginate(2);

        if ($request->input('lastPage')
            && $messages->currentPage() != $messages->lastPage()
        ) {
            return redirect($this->urlToThreadPage($forum, $thread, false, $messages->lastPage()));
        }

        return view('thread', compact('forum', 'thread', 'messages'));
    }

    public function post(Forum $forum, Thread $thread, Request $request)
    {
        $data = $request->validate([
            'body' => 'required|string|min:1',
            'page' => 'required|integer',
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'thread_id' => $thread->id,
            'body' => $data['body'],
        ]);

        return redirect($this->urlToThreadPage($forum, $thread, true));
    }

    private function urlToThreadPage(Forum $forum, Thread $thread, bool $lastPage = false, int $page = 0)
    {
        $params = [];
        if ($page) {
            $params['page'] = $page;
        }
        if ($lastPage) {
            $params['lastPage'] = 1;
        }
        return "/forum/{$forum->id}/thread/{$thread->id}?" . http_build_query($params);
    }
}
