<?php

namespace App\Http\Livewire\Status;

use Carbon\Carbon;
use Livewire\Component;

class Post extends Component
{
    public $body = "";

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'body' => 'string|min:3'
        ]);
    }

    public function store()
    {
        $this->validate([
            'body' => 'required|string|min:3'
        ]);

        $status = auth()->user()->statuses()->create([
            'hash' => \Str::random(22) . strtotime(Carbon::now()),
            'body' => $this->body,
        ]);

        $this->body = "";

        $this->emit('statusUpdated', $status->id);
    }

    public function render()
    {
        return view('livewire.status.post');
    }
}
