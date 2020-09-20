<div class="w-full">
    @foreach ($statuses as $status)
    <div class="mb-5" wire:poll.1000ms>
        <livewire:status.block :status="$status" :key="$status->id">
    </div>
    @endforeach

    @if ($statuses->hasMorePages())
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
    @endif
</div>
