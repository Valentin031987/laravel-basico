<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function store(Request $request)
    {
        request()->validate(Tarea::$rules);
        $tarea = Tarea::create($request->all());
        return response()->json(['success' => 'Agregado correctamente.']);
    }

    public function update(Request $request, Tarea $tarea)
    {
        request()->validate(Tarea::$rules);
        $tarea->update($request->all());
        return response()->json(['success' => 'Editado correctamente.']);
    }

    public function destroy($id)
    {
        Tarea::find($id)->delete();
        return response()->json(['success' => 'Eliminado correctamente.']);
    }
}
