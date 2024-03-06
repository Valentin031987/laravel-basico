@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="tipotareas">Tipos de tarea</li>
                    </ol>
                </nav>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Tipo de tarea
                                <a href="{{ route('tipotareas.create') }}" class="btn btn-primary float-end btn-sm"><i class="fa fa-solid fa-plus"></i> Crear Registro</a>
                            </div>
                            <div class="card-body">
                                <!-- Search and Filter Form -->
                                <form action="{{ route('tipotareas.index') }}" method="GET" class="row g-3">
                                    <div class="col-md-4">
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                        <a href="{{ route('tipotareas.index',  [ 'search' =>  '' ]) }}"><button type="submit" class="btn btn-secondary btn-sm">Ver Todo</button></a>
                                    </div>
                                </form>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>No</th>
                                                
										<th>Nombre</th>

                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tipotareas as $tipotarea)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    
											<td>{{ $tipotarea->nombre }}</td>

                                                    <td>
                                                        <form action="{{ route('tipotareas.destroy',$tipotarea->id) }}" method="POST">
                                                            <a class="btn btn-sm btn-primary " href="{{ route('tipotareas.show',$tipotarea->id) }}"><i class="fa fa-fw fa-eye"></i> Ver </a>
                                                            <a class="btn btn-sm btn-success" href="{{ route('tipotareas.edit',$tipotarea->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $tipotareas->appends(request()->query())->links() !!}
            </div>
        </div>
    </div>
@endsection
