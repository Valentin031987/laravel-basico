<?php

namespace App\Http\Controllers;

use App\Models\Tipotarea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TipotareaController extends Controller
{
    /**
     * Muestra lista de registros.
     * Inicializa filtrado para el modelo.
     * Verifica si un campo de busqueda ha sido pasado en la solicitud.
     * Se filtran los datos en funcion del campo de busqueda
     * Regresa los registros filtrados
     * Entrega los datos a la vista correspondiente
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipotareas = Tipotarea::search($request);
        
        return view('tipotarea.index', [
            'tipotareas' => $tipotareas,
        ])->with('i', (request()->input('page', 1) - 1) * $tipotareas->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo registro
     * Crea una nueva instancia del modelo
     * Busca datos en las tablas relacionadas
     * Entraga a la vista la instancia del modelo y los datos relacionados (belongsTo)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipotarea = new Tipotarea();
        $relatedData = $this->getRelatedData($tipotarea);
        return view('tipotarea.create', $relatedData);
    }

    /**
     * Almacena un nuevo registro a la base de datos
     * Valida los campos de la solicitud
     * Crea un nuevo registro 
     * Redirige al index con el mensaje de éxito
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipotarea::$rules);
        $tipotarea = Tipotarea::create($request->all());
        return redirect()->route('tipotareas.index')
            ->with('success', 'Tipotarea creado correctamente.');
    }

    /**
     * Display the specified resource.
     * Ubica el registro por su id
     * Return the show view with the model instance.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipotarea = Tipotarea::find($id);
        return view('tipotarea.show', ['tipotarea' => $tipotarea]);
    }

    /**
     * Metodo que muestra el formulario para editar un registro
     * Ubica el registro por su id
     * Busca datos en las tablas relacionadas
     * Redirige a la vista de edición de registro con los datos del registro junto con los datos de las tablas con las que el registro tiene alguna relación
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipotarea = Tipotarea::find($id);
        $relatedData = $this->getRelatedData($tipotarea);
        return view('tipotarea.edit', array_merge([
            'tipotarea' => $tipotarea,
        ], $relatedData));
    }

    /**
     * Metodo para actualizar un registro
     * Valida los campos de la solicitud
     * Actualiza la instancia del modelo con los datos de la solicitud
     * Redirige al index con el mensaje de éxito
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipotarea $tipotarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipotarea $tipotarea)
    {
        request()->validate(Tipotarea::$rules);
        $tipotarea->update($request->all());
        return redirect()->route('tipotareas.index')->with('success', 'Tipotarea actualizado correctamente');
    }

    /**
     * Recibe el id del registro en la solicitud
     * Ubica el registro por su id y si existe, lo elimina
     * Redirige al index con el mensaje de éxito
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Tipotarea::find($id)->delete();
        return redirect()->route('tipotareas.index')->with('success', 'Tipotarea eliminado correctamente');
    }

}
