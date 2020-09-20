<div class="flex bg-gray-300 py-4">
    <div class="w-1/3 text-center flex-1">
        <div class="flex content-justify">
            <div class="flex-1">
                <div class="text-cool-gray-700 font-semibold text-md">
                    Status
                </div>

                <div class="text-cool-gray-600 font-medium text-md">
                    {{ $user->statuses()->count() }}
                </div>
            </div>
            <a href="{{ route('follow.index', [$user->usernameOrHash, 'following']) }}" class="flex-1">
                <div class="text-cool-gray-700 font-semibold text-md">
                    Following
                </div>

                <div class="text-cool-gray-600 font-medium text-md">
                    {{ $user->follows()->count() }}
                </div>
            </a>
            <a href="{{ route('follow.index', [$user->usernameOrHash, 'follower']) }}" class="flex-1">
                <div class="text-cool-gray-700 font-semibold text-md">
                    Follower
                </div>

                <div class="text-cool-gray-600 font-medium text-md">
                    {{ $user->follower()->count() }}
                </div>
            </a>
        </div>
    </div>
</div>
