<div class="nav">
    <div class="our-games-box">
        @if(!auth()->guest())
                    <button class="btn btn-login mt-1 mr-1" onclick="redirect('/bonus/')">Promocode</button>
                    <button class="btn btn-login mt-1 mr-1" onclick="redirect('/bonus/')">Bonus</button>
                    <button class="btn btn-login mt-1 mr-1" onclick="redirect('/earn')">Earn</button>
                    <button class="btn btn-signup mt-1 mr-1" onclick="$.vip()">VIP Progress</button>
        @else
        <button class="btn btn-signup" onclick="$.register()">Register</button>
        <button class="btn btn-login" onclick="$.auth()">Login</button>
        @endif
    </div>
</div>
