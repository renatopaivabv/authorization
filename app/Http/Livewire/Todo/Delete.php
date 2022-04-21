<?php

namespace App\Http\Livewire\Todo;


use App\Http\Livewire\Todo as LivewireTodo;
use App\Models\Todo;
use Livewire\Component;

class Delete extends Component
{
    public Todo $todo;

    public function render()
    {
        return view('livewire.todo.delete');
    }

    public function delete()
    {
        $this->todo->delete();
        $this->emitTo(LivewireTodo::class, 'todo::deleted');
    }
}
