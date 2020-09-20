<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Livewire\Component;

class Block extends Component
{
    public $status;
    protected $listeners = ['statusUpdated'];

    public function statusUpdated($status)
    {
    }

    public function mount($status)
    {
        $this->status = Status::with('user')->where('id', $status->id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.status.block');
    }
}
