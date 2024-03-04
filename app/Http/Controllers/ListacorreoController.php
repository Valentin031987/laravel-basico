<?php

namespace App\Http\Controllers;

use App\Models\Listacorreo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListacorreoController extends Controller
{
    public function store(Request $request)
    {
        request()->validate(Listacorreo::$rules);
        $listacorreo = Listacorreo::create($request->all());
        return response()->json(['success' => 'Agregado correctamente.']);
    }

    public function destroy($id)
    {
        Listacorreo::find($id)->delete();
        return response()->json(['success' => 'Borrado correctamente.']);
    }
}
