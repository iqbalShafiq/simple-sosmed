<?php

namespace App\Http\Livewire\Comments;

use App\Models\Timeline\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $status;
    public $parentId;
    public $body;
    protected $listeners = ['commented'];

    public function commented()
    {
    }

    public function mount($status)
    {
        $this->status = $status;
    }

    public function showReply($id)
    {
        $this->parentId = $id;
        $username = Comment::find($this->parentId)->user->usernameOrHash;
        $this->body = "@{$username} ";
    }

    public function reply()
    {
        $this->validate([
            'body' => 'required'
        ]);

        auth()->user()->comments()->create([
            'parent_id' => $this->parentId,
            'status_id' => $this->status->id,
            'body' => $this->body,
            'hash' => \Str::random(22) . strtotime(Carbon::now())
        ]);

        $this->body = "";
    }

    public function render()
    {
        $comments = $this->status->comments()->where('parent_id', null)->withCount('children')->get();
        return view('livewire.comments.index', compact('comments'));
    }
}
