<div>
    <div class="p-4">
        <div class="w-full">
            <div class="w-full border border-cool-gray-300 rounded-lg box-content overflow-hidden">
                <div class="py-4 px-6 font-semibold bg-cool-gray-300 text-cool-gray-700">
                    Your status
                </div>

                <div class="p-4" wire:submit.prevent="update">
                    <form class="w-full">
                        <textarea class="form-textarea w-full" style="resize: none" placeholder="What's in your mind?"
                            wire:model="body">{{ old($status->body) ?? '' }}</textarea>

                        @error('body')
                        <div class="text-sm font-light text-red-700">{{ $message }}</div>
                        @enderror

                        <div class="flex justify-end mt-1">
                            <x-button.primary wire:loading.class="cursor-not-allowed opacity-25 font-bold">
                                <span wire:loading>Please Wait</span>
                                <span wire:loading.class="hidden">Update</span>
                            </x-button.primary>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
