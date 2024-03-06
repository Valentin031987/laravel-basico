@extends('layouts.app')

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/tipotareas">Tipos de tarea</a></li>
                        <li class="breadcrumb-item active" aria-current="create">Crear Tipo de tarea</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                       Crear Tipo de tarea
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipotareas.store') }}"  role="form" enctype="multipart/form-data" class="row g-3">
                            @csrf

                            @include('tipotarea.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
