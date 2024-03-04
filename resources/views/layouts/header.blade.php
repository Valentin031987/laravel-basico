<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 text-end">
        @if (Route::has('login'))
            @auth
                @include('layouts.menu')
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign-up</a>
                @endif
            @endauth
        @endif
    </div>
</header>
