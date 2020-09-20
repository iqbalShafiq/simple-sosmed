@extends('layouts.app', ["title" => 'Follow'])

@section('content')
<div>
    <div>
        <div class="text-cool-gray-600 bg-cool-gray-100 p-4 text-lg font-semibold border-b">
            {{ ucfirst($follow) }}
        </div>

        <div class="px-2 py-6 flex flex-wrap">
            @foreach ($follows as $follow)
            <a href="{{ route('show', $follow->usernameOrHash) }}"
                class="w-1/2 mb-4 p-2 hover:bg-cool-gray-100 rounded-lg transition-colors duration-300">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img class="w-16 h-16 rounded-full object-cover object-center" src="{{ $follow->gravatar() }}">
                    </div>

                    <div>
                        <div class="font-semibold">
                            {{ $follow->name }}
                        </div>

                        <div class="text-sm text-cool-gray-500">
                            Joined {{ $follow->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
