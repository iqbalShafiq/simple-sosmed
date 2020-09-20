<?php

namespace App\Http\Livewire\Accounts;

use App\Models\Timeline\Status;
use App\User;
use Illuminate\Support\Facades\URL as FacadesURL;
use Livewire\Component;
use PharIo\Manifest\Url;

class Show extends Component
{
    public $user;
    public $perPage = 10;
    public $bio;
    public $previous;
    public $bioIt = false;
    public $readmore = true;

    public function mount($identifier)
    {
        $this->user = User::where('username', $identifier)->orWhere('hash', $identifier)->first();
        $this->bioIt = \Str::length($this->user->description) >= 120;
        $this->bio = \Str::limit($this->user->description, 120);
        $this->previous = url()->previous();
    }

    public function readMore()
    {
        $this->bio = $this->user->description;
        $this->readmore = false;
    }

    public function back()
    {
        return redirect($this->previous);
    }

    public function less()
    {
        $this->bio = \Str::limit($this->user->description, 10);
        $this->readmore = true;
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function render()
    {
        $statuses = Status::where('user_id', $this->user->id)->latest()->paginate($this->perPage);

        return view('livewire.accounts.show', compact('statuses'));
    }
}
