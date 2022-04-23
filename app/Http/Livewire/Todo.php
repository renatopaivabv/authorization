<?php

namespace App\Http\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Component;

class Todo extends Component
{
    public string $filter = 'all';

    protected $listeners = [
        'todo::created' => '$refresh',
        'todo::updated' => '$refresh',
        'todo::deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.todo');
    }

    public function getTodosProperty()
    {
        return ModelsTodo::query()
            ->when($this->filter == 'done', function ($query) {
                return $query->where('checked', true);
            })
            ->when($this->filter == 'pending', function ($query) {
                return $query->where('checked', false);
            })
            ->with('user')
            ->orderBy('checked')
            ->get();
    }

    public function getAllProperty()
    {
        return ModelsTodo::query()->count();
    }

    public function getDoneProperty()
    {
        return ModelsTodo::query()->where('checked', true)->count();
    }

    public function getPendingProperty()
    {
        return ModelsTodo::query()->where('checked', false)->count();
    }
}
