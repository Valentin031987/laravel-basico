{{-- <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li><a href="{{ route('dashboard') }}" class="nav-link px-2 {{ request()->routeIs('home') ? 'link-secondary' : 'link-dark'}}">Home</a></li>
    <li><a href="{{ route('cargos.index') }}" class="nav-link px-2 link-dark">Cargos</a></li>
    <li><a href="{{ route('tipotareas.index') }}" class="nav-link px-2 link-dark">Tipos de tarea</a></li>
    <li><a href="{{ route('departamentos.index') }}" class="nav-link px-2 link-dark">Departamentos</a></li>
    <li><a href="{{ route('contacts.index') }}" class="nav-link px-2 link-dark">Contactos</a></li>
    <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
    <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
</ul> --}}

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Laravel-10 + Bootstrap 5</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link px-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contacts.index') }}"
                        class="nav-link px-2 {{ request()->routeIs('contacts.index') ? 'active' : '' }}">Contactos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cargos.index') }}"
                        class="nav-link px-2 {{ request()->routeIs('cargos.index') ? 'active' : '' }}">Cargos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('departamentos.index') }}"
                        class="nav-link px-2 {{ request()->routeIs('departamentos.index') ? 'active' : '' }}">Departamentos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tipotareas.index') }}"
                        class="nav-link px-2 {{ request()->routeIs('tipotareas.index') ? 'active' : '' }}">Tipos de
                        tarea</a>
                </li>

            </ul>
            <div class="d-flex">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="text-light"
                        onclick="event.preventDefault();this.closest('form').submit();">
                        {{ __('Logout') }}
                    </a>
                </form>
            </div>
        </div>
</nav>
