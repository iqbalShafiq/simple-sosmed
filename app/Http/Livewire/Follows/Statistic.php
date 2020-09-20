<?php

namespace App\Http\Livewire\Follows;

use Livewire\Component;

class Statistic extends Component
{
    public $user;

    protected $listeners = ['updateStatistic'];

    public function mount($user)
    {
        $this->user = $user;
    }

    public function updateStatistic()
    {
    }

    public function render()
    {
        return view('livewire.follows.statistic');
    }
}
