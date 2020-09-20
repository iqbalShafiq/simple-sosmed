<?php

namespace App\Http\Livewire\Comments;

use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $status;
    public $comment;
    public $body;

    public function mount($status)
    {
        $this->status = $status;
    }

    public function store()
    {
        $this->validate([
            'body' => 'required'
        ]);

        auth()->user()->comments()->create([
            'status_id' => $this->status->id,
            'body' => $this->body,
            'hash' => \Str::random(22) . strtotime(Carbon::now())
        ]);

        $this->body = '';
        $this->emit('commented');
        // return redirect()->route('status.show', $this->status->hash);
    }

    public function render()
    {
        return view('livewire.comments.create');
    }
}
