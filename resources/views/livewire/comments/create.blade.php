<div class="w-full">
    <div class="flex px-4 py-6 border border-cool-gray-300 rounded-lg box-content overflow-hidden">
        <div class="flex-shrink-0 mx-2">
            <img class="rounded-full w-16 h-16 object-cover object-center" src="{{ auth()->user()->gravatar() }}">
        </div>

        <div class="w-full" wire:submit.prevent="store">
            <div class="font-semibold px-2 mb-1">
                {{ auth()->user()->name }}
            </div>
            <form class="w-full">
                <textarea class="form-textarea w-full border-0 focus:outline-none focus:shadow-none resize-none"
                    style="resize: none" placeholder="What's your idea?" wire:model="body"></textarea>

                @error('body')
                <div class="text-sm font-light text-red-700">{{ $message }}</div>
                @enderror

                <div class="flex justify-end mt-1">
                    <x-button.primary wire:loading.class="cursor-not-allowed opacity-25 font-bold">
                        <span wire:loading>Please Wait</span>
                        <span wire:loading.class="hidden">Comment</span>
                    </x-button.primary>
                </div>
            </form>
        </div>
    </div>
</div>
