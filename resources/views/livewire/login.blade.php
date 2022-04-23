<div class="mb-2">
    <form wire:submit.prevent="login" method="POST">
        @csrf
        <input type="hidden" name="with" value="{{$with}}">
        <input class="btn btn-secondary" type="submit" value="Login as {{$name}}">
    </form>
</div>
