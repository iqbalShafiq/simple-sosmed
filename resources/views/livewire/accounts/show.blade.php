<div>
    <div class="bg-cool-gray-200 lg:bg-cool-gray-100 -mt-6">
        <div class="container">
            <div class="relative py-7 flex flex-col items-center justify-center text-center">
                <div class="mr-0 py-2 mb-4 md:mb-0 flex-shrink-0">
                    <img class=" w-24 h-24 rounded-full object-center object-cover" src="{{ $user->gravatar() }}">
                </div>

                <div class="lg:mt-2 text-cool-gray-700 font-semibold">
                    <div>
                        <p class="text-md">{{ $user->name }}</p>
                        <p class="text-sm text-cool-gray-500">{{ $bio }}</p>
                        <div class="{{ $bioIt ? 'block' : 'hidden' }}">
                            <button
                                class="{{ $readmore ? 'block' : 'hidden' }} hover:underline focus:outline-none text-xs text-cool-gray-300"
                                wire:click="readMore">Read more</button>
                            <button
                                class="{{ $readmore ? 'hidden' : 'block' }} hover:underline focus:outline-none text-xs text-cool-gray-300"
                                wire:click="less">Less</button>
                        </div>
                        <p class="text-sm text-cool-gray-500 mt-2">Joined: {{ $user->created_at->format("d F, Y") }}</p>
                    </div>
                    <div class="flex justify-center">
                        <livewire:follows.button :user="$user">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <livewire:follows.statistic :user="$user">
    </div>

    <div class="container mt-7">
        @foreach ($statuses as $status)
        <div class="w-full mb-5">
            <livewire:status.block :status="$status" :key="$status->id">
        </div>
        @endforeach

        @if ($statuses->hasMorePages())
        <div class="w-full">
            <div class="flex justify-center">
                <div class="cursor-pointer" wire:click.prevent="loadMore">
                    <span wire:loading wire:target="loadMore">
                        Please wait ...
                    </span>
                    <span class="flex" wire:loading.class="hidden" wire:target="loadMore">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-down w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                        Load More
                    </span>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
