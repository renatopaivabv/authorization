<div>
    <h2>Info</h2>
    @if(Auth::check())
    <div class="mb-2"> Logged as {{Auth::user()->name ?? 'Null'}} </div>
    <div class="mb-2">
        <form action="/logout" method="POST">
            @csrf
            <input class="btn btn-danger" type="submit" value="Logout">
        </form>
    </div>
    @else
    <div class="mb-2">
        <form action="/login" method="POST">
            @csrf
            <input type="hidden" name="email" value="douglas.era@example.com">
            <input type="hidden" name="password" value="password">
            <input class="btn btn-secondary" type="submit" value="Login as Gunnar">
        </form>
    </div>

    <div class="mb-2">
        <form action="/login" method="POST">
            @csrf
            <input type="hidden" name="email" value="russell.pollich@example.org">
            <input type="hidden" name="password" value="password">
            <input class="btn btn-secondary" type="submit" value="Login as Amani">
        </form>
    </div>

    @endif

    <div>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
    </div>


</div>
