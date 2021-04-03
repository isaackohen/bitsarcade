<div class="nav-middle">
    <div class="our-games-box">
        @if(!auth()->guest())
        <button class="btn btn-secondary p-2 m-1" onclick="redirect('https://t.me/BitsArcade')">Welcome back {{ auth()->user()->name }}</button>
        @else
        <button class="btn btn-primary p-1" onclick="$.auth()">Login</button>
        @endif
    </div>
</div>
