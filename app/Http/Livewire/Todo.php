<?php

namespace App\Http\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    use WithPagination;

    public string $filter = 'all';
    protected $queryString = ['filter' => ['except' => 'all']];

    protected $listeners = [
        'todo::created' => '$refresh',
        'todo::updated' => '$refresh',
        'todo::deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.todo');
    }

    public function updatedFilter()
    {
        $this->gotoPage(1);
    }

    public function getTodosProperty()
    {
        return ModelsTodo::query()
            ->when($this->filter == 'done', fn ($q) => $q->where('checked', true))
            ->when($this->filter == 'pending', fn ($q) => $q->where('checked', false))
            ->with('user')
            ->orderBy('checked')
            ->paginate(5);
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
