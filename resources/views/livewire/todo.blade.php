<div>
    <h1 class="text-center">ToDo List</h1>
    <livewire:todo.create />

    <div class="col-sm-8 col-md-6 col-xl-4 m-auto mt-2 d-flex justify-content-around">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="filter" id="all" value="all" wire:model="filter">
            <label class="form-check-label" for="all">All ({{$this->all}})</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="filter" id="pending" value="pending" wire:model="filter">
            <label class="form-check-label" for="pending">Pending ({{$this->pending}})</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="filter" id="done" value="done" wire:model="filter">
            <label class="form-check-label" for="done">Done ({{$this->done}})</label>
        </div>
    </div>
    <ul class="list-group  list-group-flush mt-3 ps-2">
        @foreach ($this->todos as $todo)
        <livewire:todo.item :todo="$todo" :wire:key="$todo->id" />
        @endforeach
    </ul>

</div>
