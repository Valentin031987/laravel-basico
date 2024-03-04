@extends('layouts.app')

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/listacorreos">Listacorreos</a></li>
                        <li class="breadcrumb-item active" aria-current="create">Add Listacorreo</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Show Listacorreo
                            <a class="btn btn-primary float-end btn-sm" href="{{ route('listacorreos.index') }}"> Back </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            
                        <div class="col-md-6">
                            <strong>Nombre:</strong>
                            {{ $listacorreo->nombre }}
                        </div>
                        <div class="col-md-6">
                            <strong>Correo:</strong>
                            {{ $listacorreo->correo }}
                        </div>
                        <div class="col-md-6">
                            <strong>Contact :</strong>
                            {{ $listacorreo->contact_id }}
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
