<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="container"> {{-- Container class begins --}}
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <h2>Email Sender App</h2>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                {{-- <a href="#" class="navbar-item">
                  Home
                </a> --}}
            </div>

            <div class="navbar-end">
            @if(session()->has('door'))
                <div class="top-right links">
                    {{-- @if (Route::has('logout')) --}}
                    <a href="{{ URL::to('/logout') }}">Çıxış et</a>
                    {{-- @endif --}}
                </div>
            @else
                 @guest
                    <div class="top-right links">
                        {{-- @if (Route::has('login')) --}}
                        <a href="{{ URL::to('/login') }}">Giriş et</a>
                        {{-- @endif --}}
                        {{-- @if (Route::has('register')) --}}
                        <a href="{{ URL::to('/register') }}">Qeydiyyat</a>
                        {{-- @endif     --}}
                    </div>
                @endguest
            @endif
            </div>
        </div>
    </div> {{-- Container class ends --}}
</nav>
