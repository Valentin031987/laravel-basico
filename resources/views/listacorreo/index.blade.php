@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="listacorreos">Listacorreos</li>
                    </ol>
                </nav>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Listacorreo
                                <a href="{{ route('listacorreos.create') }}" class="btn btn-primary float-end btn-sm"><i class="fa fa-solid fa-plus"></i> Crear Registro</a>
                            </div>
                            <div class="card-body">
                                <!-- Search and Filter Form -->
                                <form action="{{ route('listacorreos.index') }}" method="GET" class="row g-3">
                                    <div class="col-md-4">
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                        <a href="{{ route('listacorreos.index',  [ 'search' =>  '' ]) }}"><button type="submit" class="btn btn-secondary btn-sm">Ver Todo</button></a>
                                    </div>
                                </form>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>No</th>
                                                
										<th>Nombre</th>
										<th>Correo</th>
										<th>Contacto </th>

                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listacorreos as $listacorreo)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    
											<td>{{ $listacorreo->nombre }}</td>
											<td>{{ $listacorreo->correo }}</td>
											<td>{{ $listacorreo->1->name }}</td>

                                                    <td>
                                                        <form action="{{ route('listacorreos.destroy',$listacorreo->id) }}" method="POST">
                                                            <a class="btn btn-sm btn-primary " href="{{ route('listacorreos.show',$listacorreo->id) }}"><i class="fa fa-fw fa-eye"></i> Ver </a>
                                                            <a class="btn btn-sm btn-success" href="{{ route('listacorreos.edit',$listacorreo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
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
                {!! $listacorreos->appends(request()->query())->links() !!}
            </div>
        </div>
    </div>
@endsection
