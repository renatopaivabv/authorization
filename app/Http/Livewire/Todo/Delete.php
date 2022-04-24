<?php

namespace App\Http\Livewire\Todo;

use App\Http\Livewire\Todo as LivewireTodo;
use App\Models\Todo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Delete extends Component
{
    use AuthorizesRequests;

    public Todo $todo;

    public function render()
    {
        return view('livewire.todo.delete');
    }

    public function delete()
    {
        if (!auth()->check() || !auth()->user()->can('delete', $this->todo)) {
            $this->emit('notification', [
                'type' => 'danger',
                'message' => 'You are not authorized to delete this todo.',
            ]);
            return;
        }

        $this->todo->delete();
        $this->emitTo(LivewireTodo::class, 'todo::deleted');
        $this->emit('notification', [
            'type' => 'success',
            'message' => 'Todo deleted successfully.',
        ]);
    }
}
