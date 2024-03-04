@extends('layouts.app')

@section('content')
    <section class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/contacts">Contacts</a></li>
                        <li class="breadcrumb-item active" aria-current="create">Add Contact</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Show Contact
                        <a class="btn btn-primary float-end btn-sm" href="{{ route('contacts.index') }}"> Back </a>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <strong>Nombre:</strong>
                                {{ $contact->nombre }}
                            </div>
                            <div class="col-md-6">
                                <strong>Apellido:</strong>
                                {{ $contact->apellido }}
                            </div>
                            <div class="col-md-6">
                                <strong>Empresa Cliente:</strong>
                                {{ $contact->empresa_cliente }}
                            </div>
                            <div class="col-md-6">
                                <strong>Fecha Ultima Modificacion:</strong>
                                {{ $contact->fecha_ultima_modificacion }}
                            </div>
                            <div class="col-md-6">
                                <strong>Correo:</strong>
                                {{ $contact->correo }}
                            </div>
                            <div class="col-md-6">
                                <strong>Direccion:</strong>
                                {{ $contact->direccion }}
                            </div>
                            <div class="col-md-6">
                                <strong>Telefono:</strong>
                                {{ $contact->telefono }}
                            </div>
                            <div class="col-md-6">
                                <strong>Movil:</strong>
                                {{ $contact->movil }}
                            </div>
                            <div class="col-md-6">
                                <strong>Departamento :</strong>
                                {{ $contact->departamento->nombre }}
                            </div>
                            <div class="col-md-6">
                                <strong>Cargo :</strong>
                                {{ $contact->cargo->nombre }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
