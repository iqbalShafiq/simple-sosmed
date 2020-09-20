<div class="mx-auto w-full lg:w-1/3 px-2 lg:px-0">
    <div class="bg-white border border-gray-200 rounded-lg p-4">
        <div class="text-lg font-semibold text-center mb-4">
            Are you sure?
        </div>

        <div class="w-full border bg-cool-gray-100 rounded p-4 mb-4">
            <div class="flex justify-between relative" x-data="{ open: false }">
                <a class="text-cool-gray-900 font-semibold hover:underline"
                    href="{{ route('show', $status->user->usernameOrHash) }}">
                    {{ $status->user->name }}
                </a>
            </div>

            <a href="{{ route('status.show', $status->hash) }}">
                <div class="mb-1 text-cool-gray-500 text-xs">
                    {{ $status->published }}
                </div>

                <div class="text-cool-gray-700">
                    {!! nl2br($status->body) !!}
                </div>
            </a>

            <div class="mt-3 flex text-sm items-center text-cool-gray-400">
                <svg class="mr-2 chat-alt2 w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                    <path
                        d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z">
                    </path>
                </svg> 100 Comment
                <svg class="ml-4 mr-2 thumb-up w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z">
                    </path>
                </svg> 900 Like
            </div>
        </div>

        <div class="flex justify-end -mx-2">
            <button
                class="px-4 py-2 bg-red-700 hover:bg-red-500 transition-colors duration-300 border text-gray-200 rounded inline-block mx-2 focus:outline-none"
                wire:click="destroy">
                Delete
            </button>

            <a class="px-4 py-2 bg-white border hover:bg-cool-gray-300 transition-colors duration-300 focus:outline-none border-gray-200 rounded inline-block mx-2"
                href="{{ route('status.show', $status->hash) }}">Cancel</a>
        </div>
    </div>
</div>
