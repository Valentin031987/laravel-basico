@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="contacts">Contactos</li>
                    </ol>
                </nav>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Contacto
                                <a href="{{ route('contacts.create') }}" class="btn btn-primary float-end btn-sm"><i
                                        class="fa fa-solid fa-plus"></i> Crear Registro</a>
                            </div>
                            <div class="card-body">
                                <!-- Search and Filter Form -->
                                <form action="{{ route('contacts.index') }}" method="GET" class="row g-3">
                                    <div class="col-md-4">
                                        <input type="text" name="search" class="form-control form-control-sm"
                                            placeholder="Buscar" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                        <a href="{{ route('contacts.index') }}"><button type="submit"
                                                class="btn btn-secondary btn-sm">Search</button></a>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>No</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Empresa Cliente</th>
                                                <th>Fecha Ultima Modificacion</th>
                                                <th>Correo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ ++$i }}</td>

                                                    <td>{{ $contact->nombre }}</td>
                                                    <td>{{ $contact->apellido }}</td>
                                                    <td>{{ $contact->empresa_cliente }}</td>
                                                    <td>{{ $contact->fecha_ultima_modificacion }}</td>
                                                    <td>{{ $contact->correo }}</td>

                                                    <td>
                                                        <form action="{{ route('contacts.destroy', $contact->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('contacts.show', $contact->id) }}"><i
                                                                    class="fa fa-fw fa-eye"></i> Ver </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('contacts.edit', $contact->id) }}"><i
                                                                    class="fa fa-fw fa-edit"></i> Editar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! $contacts->appends(request()->query())->links() !!}
            </div>
        </div>
    </div>
@endsection
