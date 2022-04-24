<div>
    @can('delete', $todo)
    <button class="btn outline-none rounded-circle" wire:click="delete">
        <i class="fa-solid fa-trash-can text-danger"></i>
    </button>
    @else
    <button class="btn outline-none rounded-circle" wire:click="delete">
        <i class="fa-solid fa-trash-can text-secondary"></i>
    </button>
    @endcan
</div>
