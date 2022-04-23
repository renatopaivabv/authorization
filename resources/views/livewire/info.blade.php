<div>
    <h2>Info</h2>
    @if(auth()->check())
    <div class="mb-2"> Logged as {{auth()->user()->name ?? ''}} </div>
    <livewire:logout />
    @else

    <div>Gues</div>
    <livewire:login :with="1" name="John" />
    <livewire:login :with="2" name="Jane" />

    @endif
    <div>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
    </div>


</div>
