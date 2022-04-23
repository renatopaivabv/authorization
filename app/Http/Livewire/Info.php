<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Info extends Component
{
    public function render()
    {
        return view('livewire.info');
    }
}
