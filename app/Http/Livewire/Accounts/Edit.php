<?php

namespace App\Http\Livewire\Accounts;

use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $name;
    public $username;
    public $picture;
    public $description;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->username = auth()->user()->username;
        $this->description = auth()->user()->description;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'username' => 'min:3|max:25|unique:users,username,' . auth()->id(),
            'name' => 'min:3|string',
            'description' => 'min:1|string',
        ]);
    }

    public function update()
    {
        $this->validate([
            'picture' => $this->picture ? 'image|mimes:jpg,jpeg,png' : '',
            'username' => 'required|min:3|max:25|unique:users,username,' . auth()->id(),
            'name' => 'required|string|min:3',
            'description' => 'min:1|string'
        ]);

        if ($this->picture) {
            \Storage::delete(auth()->user()->picture);
            $picture = $this->picture->store('images/profile');
        } else {
            $picture = auth()->user()->picture ?? null;
        }

        $update = auth()->user()->update([
            'name' => $this->name,
            'username' => $this->username,
            'picture' => $picture,
            'description' => $this->description,
        ]);

        if ($update) {
            session()->flash('message', 'Your Account Has Updated.');
        }

        return redirect()->to('settings');
    }

    public function render()
    {
        return view('livewire.accounts.edit');
    }
}
