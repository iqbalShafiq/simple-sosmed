<div>
    @if ($status->comments_count)
    <div class="w-full  px-5 -mt-8 mb-5">
        <div class="rounded-lg border border-cool-gray-300 bg-cool-gray-100">
            @foreach ($comments as $comment)
            <div class="px-6 py-5" x-data="{ openReply: false }">
                <div class="flex">
                    <div class="mr-3 flex-shrink-0">
                        <img class="w-16 h-16 rounded-full object-center object-cover"
                            src="{{ $comment->user->gravatar() }}">
                    </div>

                    <div>
                        <div class="font-semibold text-cool-gray-800">
                            {{ $comment->user->name }}
                        </div>

                        <div class="text-sm text-cool-gray-500 font-light mb-2">
                            {{ $comment->created_at->diffForHumans() }}
                        </div>

                        <div class="text-cool-gray-800">
                            {{ $comment->body }}
                        </div>

                        <div class="flex items-center">
                            <button
                                class="flex items-center text-xs text-cool-gray-500 font-light mt-2 focus:outline-none"
                                @click="openReply = !openReply" wire:click.prevent="showReply({{ $comment->id }})">
                                <svg class="annotation w-4 h-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                                <div>
                                    {{ $comment->children_count }} {{ \Str::plural('Reply', $comment->children_count) }}
                                </div>
                            </button>

                            <livewire:comment.like :comment="$comment" :key="$comment->id" />
                        </div>
                    </div>
                </div>

                @foreach ($comment->children as $comment)
                <div class="flex ml-10 pt-6">
                    <div class="mr-3 flex-shrink-0">
                        <img class="w-16 h-16 rounded-full object-center object-cover"
                            src="{{ $comment->user->gravatar() }}">
                    </div>

                    <div>
                        <div class="font-semibold text-cool-gray-800">
                            {{ $comment->user->name }}
                        </div>

                        <div class="text-sm text-cool-gray-500 font-light mb-2">
                            {{ $comment->created_at->diffForHumans() }}
                        </div>

                        <div class="text-cool-gray-800">
                            {{ $comment->body }}
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="flex pt-6 pl-10" :class="{ 'hidden' : !openReply }">
                    <div class="mr-3 flex-shrink-0">
                        <img class="w-16 h-16 rounded-full object-center object-cover"
                            src="{{ $comment->user->gravatar() }}">
                    </div>
                    <form class="bg-cool-gray-100 rounded-lg w-full" wire:submit.prevent="reply">
                        <textarea class="form-textarea w-full border-0 focus:outline-none focus:shadow-none resize-none"
                            style="resize: none" placeholder="What's your reply?" wire:model="body"></textarea>
                        <div class="flex justify-end mt-1">
                            <button
                                class="px-4 py-1 bg-cool-gray-200 border border-gray-300 text-cool-gray-700 rounded-lg focus:outline-none focus:bg-cool-gray-300 hover:bg-cool-gray-300">Reply</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
