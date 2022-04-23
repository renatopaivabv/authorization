<div class="mb-2">
    <form wire:submit.prevent="logout" method="POST">
        @csrf
        <input class="btn btn-danger" type="submit" value="Logout">
    </form>
</div>
