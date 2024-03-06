@extends('layouts.app')

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/tareas">Tareas</a></li>
                        <li class="breadcrumb-item active" aria-current="create">Crear Tarea</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Show Tarea
                            <a class="btn btn-primary float-end btn-sm" href="{{ route('tareas.index') }}"> Back </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col-md-6">
                            <strong>Tarea:</strong>
                            {{ $tarea->tarea }}
                        </div>
                        <div class="col-md-6">
                            <strong>Contacto :</strong>
                            {{ $tarea->contact_id }}
                        </div>
                        <div class="col-md-6">
                            <strong>Tipo de tarea :</strong>
                            {{ $tarea->tipotarea_id }}
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
