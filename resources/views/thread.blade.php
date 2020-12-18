<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="text-purple-600" href="{{ route('dashboard') }}">{{ __('Forums') }}</a>
            / <a class="text-purple-600" href="/forum/{{ $forum->id }}">{{ $forum->name }}</a>
            / {{ $thread->name }}
        </h2>
    </x-slot>

    @foreach($messages as $message)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 cursor-pointer">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-50">
                    {{ $message->user->username }} <small class="text-gray-600">@ {{ $message->created_at->format('Y/m/d H:i') }}</small>
                    <br />
                    <span>{{ mb_strimwidth($message->body, 0, 128, "...") }}</span>

                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 cursor-pointer">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-50">
                    <form method="POST" action="/forum/{{ $forum->id }}/thread/{{ $thread->id }}?page={{ $messages->currentPage() }}">
                        {!! csrf_field() !!}
                        <textarea name="body" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>
                        <div class="text-right">
                            <button class="bg-purple-600 text-white text-md rounded hover:bg-purple-500 px-6 py-1 focus:outline-none">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 cursor-pointer">
            {{ $messages->links() }}
        </div>
    </div>

</x-app-layout>
