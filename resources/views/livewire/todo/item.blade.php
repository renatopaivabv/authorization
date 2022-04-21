<li class="list-group-item d-flex justify-content-between align-items-center ms-1">
    <div class="d-flex align-items-center">
        <input class="form-check-input fs-4 me-3 mt-0" type="checkbox" id="task_{{$todo->id}}" name="task_{{$todo->id}}"
            wire:model="todo.checked">
        <label for="task_{{$todo->id}}">
            <span class="fw-bold">{{$todo->title}}</span>
            {{-- <span class="text-muted"><small>(Author)</small></span> --}}
        </label>
    </div>
    <livewire:todo.delete :todo="$todo" />
</li>
