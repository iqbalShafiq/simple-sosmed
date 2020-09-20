<?php

namespace App\Http\Livewire\Status;

use App\Models\Timeline\Status;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Delete extends Component
{
    public $status;

    use AuthorizesRequests;

    public function mount($hash)
    {
        $this->status = Status::where('hash', $hash)->firstOrFail();
    }

    public function destroy()
    {
        $this->authorize('update', $this->status);

        $this->status->delete();

        return redirect()->route('show', $this->status->user->usernameOrHash);
    }

    public function render()
    {
        $this->authorize('update', $this->status);
        return view('livewire.status.delete');
    }
}
