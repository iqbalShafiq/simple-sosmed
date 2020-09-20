<div class="p-4">
    <div class="border border-cool-gray-300 w-full rounded-lg p-4 mb-5">
        <livewire:status.block :status="$status" :key="$status->id">
    </div>


    <livewire:comments.index :status="$status" :key="$status->id" />
    @auth
    <div id="commenter">
        <livewire:comments.create :status="$status" :key="$status->id" />
    </div>
    @endauth
</div>
