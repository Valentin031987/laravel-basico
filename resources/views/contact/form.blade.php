<div class="col-md-6">
    <label for="nombre">Nombre</label>
    <input class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" name="nombre" type="text"
        value="{{ old('nombre', @$contact->nombre) }}" id="nombre">
    @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="apellido">Apellido</label>
    <input class="form-control @error('apellido') is-invalid @enderror" placeholder="Apellido" name="apellido"
        type="text" value="{{ old('apellido', @$contact->apellido) }}" id="apellido">
    @error('apellido')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="empresa_cliente">Empresa Cliente</label>
    <input class="form-control @error('empresa_cliente') is-invalid @enderror" placeholder="Empresa Cliente"
        name="empresa_cliente" type="text" value="{{ old('empresa_cliente', @$contact->empresa_cliente) }}"
        id="empresa_cliente">
    @error('empresa_cliente')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="fecha_ultima_modificacion">Fecha Ultima Modificacion</label>
    <input class="form-control @error('fecha_ultima_modificacion') is-invalid @enderror"
        placeholder="Fecha Ultima Modificacion" name="fecha_ultima_modificacion" type="date"
        value="{{ old('fecha_ultima_modificacion', @$contact->fecha_ultima_modificacion) }}"
        id="fecha_ultima_modificacion">
    @error('fecha_ultima_modificacion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="correo">Correo</label>
    <input class="form-control @error('correo') is-invalid @enderror" placeholder="Correo" name="correo" type="text"
        value="{{ old('correo', @$contact->correo) }}" id="correo">
    @error('correo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="direccion">Direccion</label>
    <input class="form-control @error('direccion') is-invalid @enderror" placeholder="Direccion" name="direccion"
        type="text" value="{{ old('direccion', @$contact->direccion) }}" id="direccion">
    @error('direccion')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="telefono">Telefono</label>
    <input class="form-control @error('telefono') is-invalid @enderror" placeholder="Telefono" name="telefono"
        type="text" value="{{ old('telefono', @$contact->telefono) }}" id="telefono">
    @error('telefono')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="movil">Movil</label>
    <input class="form-control @error('movil') is-invalid @enderror" placeholder="Movil" name="movil" type="text"
        value="{{ old('movil', @$contact->movil) }}" id="movil">
    @error('movil')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@if (Route::currentRouteName() == 'contacts.edit')
    <div class="my-5 div-tabs-contacto">

        <ul class="nav nav-tabs my-3" id="tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                    type="button" role="tab" aria-controls="home" aria-selected="true">Información General</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="tareas-tab" data-bs-toggle="tab" data-bs-target="#tareas" type="button"
                    role="tab" aria-controls="tareas" aria-selected="false">Tareas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="correos-tab" data-bs-toggle="tab" data-bs-target="#correos"
                    type="button" role="tab" aria-controls="correos" aria-selected="false">Lista de
                    correos</button>
            </li>
        </ul>

        <div class="tab-content px-3" id="tab-content">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="col-md-6">
                    <label for="departamento_id">Departamento</label>

                    <select class="form-select @error('departamento_id') is-invalid @enderror" name="departamento_id"
                        id="departamento_id">
                        <option value="">--Selecciona--</option>
                        @foreach ($departamentos as $relatedItem)
                            <option value="{{ $relatedItem->id }}"
                                {{ old('departamento_id', @$contact->departamento_id) == $relatedItem->id ? 'selected' : '' }}>
                                {{ $relatedItem->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('departamento_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="cargo_id">Cargo</label>

                    <select class="form-select @error('cargo_id') is-invalid @enderror" name="cargo_id"
                        id="cargo_id">
                        <option value="">--Selecciona--</option>
                        @foreach ($cargos as $relatedItem)
                            <option value="{{ $relatedItem->id }}"
                                {{ old('cargo_id', @$contact->cargo_id) == $relatedItem->id ? 'selected' : '' }}>
                                {{ $relatedItem->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('cargo_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="tab-pane fade" id="tareas" role="tabpanel" aria-labelledby="tareas-tab">
                <div class="top-form row my-3">
                    <div class="col-3">
                        <input class="form-control" placeholder="Tarea" id="tarea">
                    </div>
                    <div class="col-3">
                        <select class="form-select" id="tipotarea_id">
                            @foreach ($tipotareas as $d)
                                <option value="{{ $d->id }}">
                                    {{ $d->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3">
                        <button id="agregarTarea" type="button" class="btn btn-primary">Agregar</button>
                    </div>

                    <div id="ajax-result-tareas">
                    </div>
                </div>

                <table class="table table-bordered table-hover table-condensed table-striped" class="dataTable">
                    <thead>
                        <tr>
                            {{-- <th>Id</th> --}}
                            <th>Tarea</th>
                            <th>Tipo</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tareas as $key => $d)
                            <tr>
                                {{-- <td>{{ $d->id }}</td> --}}
                                <td>{{ $d->tarea }}</td>
                                <td>{{ $d->tipotarea->nombre }}</td>
                                <td>
                                    <button type="button" class="editarTarea btn btn-secondary"
                                        data-bs-toggle="modal" data-bs-target="#editarTarea"
                                        data-url="{{ route('tareas.update', $d->id) }}"
                                        data-tarea="{{ $d->tarea }}" data-tipo-tarea-id="{{ $d->tipotarea_id }}"
                                        data-id="{{ $d->id }}">Editar</button>

                                    <button type="button" class="borrarTarea btn btn-danger"
                                        data-url="{{ route('tareas.destroy', $d->id) }}"
                                        data-id="{{ $d->id }}">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="correos" role="tabpanel" aria-labelledby="correos-tab">

                <div class="top-form row my-3">
                    <div class="col-3">
                        <input class="form-control" placeholder="Nombre/Contacto" id="nombre-correo">
                    </div>
                    <div class="col-3">
                        <input class="form-control" placeholder="Email" id="correo" type="email">
                    </div>
                    <div class="col-3">
                        <button id="agregarCorreo" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                    <div id="ajax-result">
                    </div>
                </div>

                <table class="table table-bordered table-hover table-condensed table-striped" class="dataTable">
                    <thead>
                        <tr>
                            {{-- <th>Id</th> --}}
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($correos as $key => $d)
                            <tr>
                                {{-- <td>{{ $d->id }}</td> --}}
                                <td>{{ $d->nombre }}</td>
                                <td>{{ $d->correo }}</td>
                                <td>
                                    <button type="button" class="borrarCorreo btn btn-danger"
                                        data-url="{{ route('listacorreos.destroy', $d->id) }}"
                                        data-id="{{ $d->id }}">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarTarea" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Editar Tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row gy-2 p-3">

                        <input class="form-control " placeholder="Tarea"type="text" id="tarea-popup">

                        <select class="form-select" id="tipotarea-popup">
                            @foreach ($tipotareas as $d)
                                <option value="{{ $d->id }}">
                                    {{ $d->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary guardarTarea">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@else
<div class="my-5 div-tabs-contacto">

    <ul class="nav nav-tabs my-3" id="tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                type="button" role="tab" aria-controls="home" aria-selected="true">Información General</button>
        </li>
    </ul>

    <div class="tab-content px-3" id="tab-content">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="col-md-6">
                <label for="departamento_id">Departamento</label>

                <select class="form-select @error('departamento_id') is-invalid @enderror" name="departamento_id"
                    id="departamento_id">
                    <option value="">--Selecciona--</option>
                    @foreach ($departamentos as $relatedItem)
                        <option value="{{ $relatedItem->id }}"
                            {{ old('departamento_id', @$contact->departamento_id) == $relatedItem->id ? 'selected' : '' }}>
                            {{ $relatedItem->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('departamento_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="cargo_id">Cargo</label>

                <select class="form-select @error('cargo_id') is-invalid @enderror" name="cargo_id"
                    id="cargo_id">
                    <option value="">--Selecciona--</option>
                    @foreach ($cargos as $relatedItem)
                        <option value="{{ $relatedItem->id }}"
                            {{ old('cargo_id', @$contact->cargo_id) == $relatedItem->id ? 'selected' : '' }}>
                            {{ $relatedItem->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('cargo_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>
</div>

@endif

<div class="col-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>

@if (Route::currentRouteName() == 'contacts.edit')
    <script>
        $('#agregarCorreo').click(function(e) {
            let correo = $('#correo').val()
            let nombreCorreo = $('#nombre-correo').val()
            let contact_id = {{ $contact->id }}
            let url = '{{ route('listacorreos.store') }}'
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: {
                    "correo": correo,
                    "nombre": nombreCorreo,
                    "contact_id": contact_id
                },
                dataType: "JSON",
                success: (response) => {
                    location.reload();
                },
                error: function(response) {
                    $('#ajax-result').find(".print-error-msg").find("ul").html('');
                    $('#ajax-result').find(".print-error-msg").css('display', 'block');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $('#ajax-result').find(".print-error-msg").find("ul").append('<li>' +
                            value + '</li>');
                    });
                }
            });
        });

        $('.borrarCorreo').click(function(e) {
            if (!confirm('Está seguro?')) {
                return;
            }
            let info = $(this)
            $.ajax({
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: info.data('url'),
                dataType: "JSON",
                success: (response) => {
                    //alert('Registro eliminado correctamente');
                    location.reload();
                },
                error: function(response) {
                    $('#ajax-result').find(".print-error-msg").find("ul").html('');
                    $('#ajax-result').find(".print-error-msg").css('display', 'block');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $('#ajax-result').find(".print-error-msg").find("ul").append('<li>' +
                            value + '</li>');
                    });
                }
            });
        });


        let urlEditarTarea = null
        $('.editarTarea').click(function(e) {
            let info = $(this)

            $("#tarea-popup").val(info.data('tarea'))
            $("#tipotarea-popup").val(info.data('tipo-tarea-id'))
            urlEditarTarea = info.data('url')

        });

        $('.guardarTarea').click(function(e) {
            let contact_id = {{ $contact->id }}
            $.ajax({
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: urlEditarTarea,
                data: {
                    "tarea": $("#tarea-popup").val(),
                    "tipotarea_id": $("#tipotarea-popup").val(),
                    contact_id
                },
                dataType: "JSON",
                success: (response) => {
                    location.reload();
                },
                error: function(response) {
                    $('#ajax-result').find(".print-error-msg").find("ul").html('');
                    $('#ajax-result').find(".print-error-msg").css('display', 'block');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $('#ajax-result').find(".print-error-msg").find("ul").append('<li>' +
                            value + '</li>');
                    });
                }
            });
        });

        $('#agregarTarea').click(function(e) {
            let tarea = $('#tarea').val()
            let tipotarea_id = $('#tipotarea_id').val()
            let contact_id = {{ $contact->id }}
            let url = '{{ route('tareas.store') }}'
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: {
                    "tarea": tarea,
                    "tipotarea_id": tipotarea_id,
                    "contact_id": contact_id
                },
                dataType: "JSON",
                success: (response) => {
                    location.reload();
                },
                error: function(response) {
                    $('#ajax-result').find(".print-error-msg").find("ul").html('');
                    $('#ajax-result').find(".print-error-msg").css('display', 'block');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $('#ajax-result').find(".print-error-msg").find("ul").append('<li>' +
                            value + '</li>');
                    });
                }
            });
        });

        $('.borrarTarea').click(function(e) {
            if (!confirm('Está seguro?')) {
                return;
            }
            let info = $(this)
            $.ajax({
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: info.data('url'),
                dataType: "JSON",
                success: (response) => {
                    //alert('Registro eliminado correctamente');
                    location.reload();
                },
                error: function(response) {
                    $('#ajax-result').find(".print-error-msg").find("ul").html('');
                    $('#ajax-result').find(".print-error-msg").css('display', 'block');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $('#ajax-result').find(".print-error-msg").find("ul").append('<li>' +
                            value + '</li>');
                    });
                }
            });
        });
    </script>
@endif
