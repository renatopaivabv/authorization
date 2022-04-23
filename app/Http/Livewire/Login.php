<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $with;
    public $name;
    public User $user;

    public function mount($with)
    {
        $this->user = User::find($with);
    }

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        Auth::login($this->user);
        return redirect()->to('/')->with('success', 'Login Successful');
    }
}
