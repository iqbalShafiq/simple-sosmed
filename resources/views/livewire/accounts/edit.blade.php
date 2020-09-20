<div class="p-4">
    @if (session()->has('message'))
    <div
        class="w-full md:w-1/2 rounded-md border bg-green-200 border-cool-gray-300 shadow-md text-cool-gray-700 mb-2 md:mr-4 px-4 py-4">
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    </div>
    @endif
    <div class="w-full rounded-md border border-cool-gray-300 shadow-md text-cool-gray-700 md:mr-4 px-4 py-4">
        <div class="border-b border-cool-gray-300">
            <p class="text-lg pb-2 font-semibold text-cool-gray-600">Update Your Profile</p>
        </div>

        <form wire:submit.prevent="update" class="pt-4">
            <div
                class="flex flex-col md:flex-row items-center justify-center md:justify-start mb-3 w-full mt-1 px-2 py-2 rounded-md text-cool-gray-700">
                <div class="mb-3 md:mb-0">
                    @if ($picture)
                    <img src="{{ $picture->temporaryUrl() }}"
                        class="mr-3 object-cover object-center w-24 h-24 rounded-full">
                    @else
                    <img src="{{ auth()->user()->gravatar() }}"
                        class="mr-3 object-cover object-center w-24 h-24 rounded-full">
                    @endif
                </div>
                <label
                    class="bg-cool-gray-200 border-2 border-gray-400 rounded-lg p-2 text-cool-gray-600 cursor-pointer hover:bg-cool-gray-100 transition-colors duration-300"
                    for="picture">
                    <div wire:loading wire:loading.class="cursor-not-allowed" wire:target="picture">Uploading...</div>
                    <div wire:loading.class="hidden" wire:target="picture">Upload Picture</div>
                    <input class=" sr-only" type="file" id="picture" wire:model="picture">
                </label>
                @error('picture')
                <p class="text-red-700 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="text-md mb-4" for="username">Username</label>
                <input class="w-full border border-cool-gray-300 mt-1 px-2 py-2 rounded-md text-cool-gray-700"
                    type="text" name="username" id="username" placeholder="your username here ..."
                    wire:model="username">
                @error('username')
                <p class="text-red-700 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="text-md mb-4" for="name">Name</label>
                <input class="w-full border border-cool-gray-300 mt-1 px-2 py-2 rounded-md text-cool-gray-700"
                    type="text" name="name" id="name" placeholder="your name ..." wire:model="name">
                @error('name')
                <p class="text-red-700 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="text-md mb-4" for="description">Description</label>
                <textarea class="w-full border border-cool-gray-300 mt-1 px-2 py-2 rounded-md text-cool-gray-700"
                    name="description" id="description" placeholder="your description here ..." wire:model="description"
                    style="resize: none"></textarea>
                @error('description')
                <p class="text-red-700 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <x-button.primary>
                Update
            </x-button.primary>
        </form>
    </div>
</div>
