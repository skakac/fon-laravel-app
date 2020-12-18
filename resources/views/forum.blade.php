<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="text-purple-600" href="{{ route('dashboard') }}">{{ __('Forums') }}</a>
            / {{ $forum->name }}
        </h2>
    </x-slot>

    @foreach($threads as $thread)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 cursor-pointer">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="/forum/{{ $forum->id }}/thread/{{ $thread->id }}">
                    <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-50">
                        <h1 class="text-purple-600">{{ $thread->name }}
                            <small class="text-gray-600">@ {{ $thread->created_at->format('Y/m/d') }}</small>
                        </h1>
                        <span>{{ mb_strimwidth($thread->firstMessage->body, 0, 128, "...") }}</span>
                        <br />
                        <small>by {{ $thread->user->username }}</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endforeach

</x-app-layout>
