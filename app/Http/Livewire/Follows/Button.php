<?php

namespace App\Http\Livewire\Follows;

use Livewire\Component;

class Button extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function follow()
    {
        auth()->user()->follow($this->user);

        $this->emit('updateStatistic');
    }

    public function unfollow()
    {
        auth()->user()->unfollow($this->user);

        $this->emit('updateStatistic');
    }

    public function render()
    {
        return view('livewire.follows.button');
    }
}
