<div>
    @if (auth()->check())

    @if (auth()->user()->isNot($user))

    @if (auth()->user()->following($user))
    <div class="mt-4" wire:click="unfollow">
        <x-button.danger>
            <span wire:loading>
                Please wait ...
            </span>

            <span wire:loading.class="hidden">
                Unfollow
            </span>
        </x-button.danger>
    </div>
    @else
    <div class="mt-4" wire:click="follow">
        <x-button.primary>
            <span wire:loading>
                Please wait ...
            </span>

            <span wire:loading.class="hidden">
                Follow
            </span>
        </x-button.primary>
    </div>
    @endif

    @else
    <a href="{{ route('setting') }}" class="flex items-center mt-2 text-cool-gray-600 text-sm">
        <svg class="mr-2 adjustments w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                clip-rule="evenodd">
            </path>
        </svg>
        Settings Profile
    </a>

    @endif

    @endif
</div>