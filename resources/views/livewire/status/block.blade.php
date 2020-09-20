<div>
    <div class="flex p-2">
        <div class="flex-shrink-0">
            <img class="rounded-full object-cover object-center w-16 h-16 mr-4" src="{{ $status->user->gravatar() }}"
                alt="#">
        </div>

        <div class="w-full">
            <div class="flex justify-between relative" x-data="{ open: false }">
                <a class="text-cool-gray-900 font-semibold hover:underline"
                    href="{{ route('show', $status->user->usernameOrHash) }}">
                    {{ $status->user->name }}
                </a>
                @can('update', $status)
                <button class="hover:bg-cool-gray-200 p-1 rounded-full focus:outline-none" @click="open = !open">
                    <svg class="chevron-down w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                </button>
                <div class="text-sm text-cool-gray-800 font-medium bg-cool-gray-100 rounded-lg text-left absolute top-8 right-0"
                    :class="{ 'hidden' :
                    !open }">
                    <a href="{{ route('status.edit', $status->hash) }}"
                        class="hover:bg-cool-gray-300 px-6 py-1 mb-1 rounded-lg block">Edit</a>
                    <a href="{{ route('status.delete', $status->hash) }}"
                        class="hover:bg-cool-gray-300 px-6 py-1 rounded-lg block">Remove</a>
                </div>
                @endcan
            </div>

            <a href="{{ route('status.show', $status->hash) }}">
                <div class="mb-1 text-cool-gray-500 text-xs">
                    {{ $status->published }}
                </div>

                <div class="text-cool-gray-700 pr-6">
                    {!! nl2br($status->body) !!}
                </div>
            </a>

            <div class="mt-3 flex text-sm items-center text-cool-gray-400">
                <a href="{{ route('status.show', $status->hash) }}/#commenter"
                    class="flex items-center focus:outline-none">
                    <svg class="mr-2 chat-alt2 w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                        <path
                            d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z">
                        </path>
                    </svg>
                    {{ $status->comments_count }} {{ \Str::plural('Comment', $status->comments_count) }}
                </a>
                <livewire:status.like :status="$status" :key="$status->id" />
            </div>
        </div>
    </div>
</div>
