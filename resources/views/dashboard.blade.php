<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forums') }}
        </h2>
    </x-slot>

    @foreach($forums as $forum)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 cursor-pointer">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="/forum/{{ $forum->id }}">
                    <div class="p-6 bg-white border-b border-gray-200 hover:bg-gray-50">
                        <h1>{{ $forum->name }}
                            <small>({{ $forum->threads_count }} threads)</small>
                        </h1>
                        <span>{{ $forum->description }}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endforeach

</x-app-layout>
