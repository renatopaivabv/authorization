<form>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="New task" aria-label="New task" aria-describedby="add-task"
            wire:model.defer="title" wire:keydown.enter.prevent="save">
        <button wire:click.prevent="save" class="btn btn-outline-secondary" type="button" id="add-task">Add
            task</button>
    </div>
    @error('title') <div class="text-danger mt-1">{{ $message }}</div> @enderror
</form>
