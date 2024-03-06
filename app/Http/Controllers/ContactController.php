<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Tipotarea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
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
        $contacts = Contact::search($request);

        return view('contact.index', [
            'contacts' => $contacts,
        ])->with('i', (request()->input('page', 1) - 1) * $contacts->perPage());
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
        $contact = new Contact();
        $relatedData = $this->getRelatedData($contact);
        //dd($relatedData);
        return view('contact.create', $relatedData);
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
        request()->validate(Contact::$rules);
        $contact = Contact::create($request->all());
        // return redirect()->route('contacts.index')
        //     ->with('success', 'Contacto creado correctamente.');
        return redirect()->route('contacts.edit', $contact->id);
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
        $contact = Contact::whereId($id)->with('cargo', 'departamento')->get()[0];
        return view('contact.show', ['contact' => $contact]);
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
        $contact = Contact::find($id);
        $relatedData = $this->getRelatedData($contact);
        $correos = $contact->listacorreos()->get();
        $tareas = $contact->tareas()->with('tipotarea')->get();
        $tipotareas = Tipotarea::get();

        return view('contact.edit', array_merge([
            'contact' => $contact,
            'correos' => $correos,
            'tareas' => $tareas,
            'tipotareas' => $tipotareas
        ], $relatedData));
    }

    /**
     * Metodo para actualizar un registro
     * Valida los campos de la solicitud
     * Actualiza la instancia del modelo con los datos de la solicitud
     * Redirige al index con el mensaje de éxito
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        request()->validate(Contact::$rules);
        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contacto actualizado correctamente');
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
        Contact::find($id)->delete();
        return redirect()->route('contacts.index')->with('success', 'Contacto eliminado correctamente');
    }
}
