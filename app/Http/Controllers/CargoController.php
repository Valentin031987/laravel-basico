<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index(Request $request)
    {
        $cargos = Cargo::search($request);
        return view('cargo.index', [
            'cargos' => $cargos,
        ])->with('i', (request()->input('page', 1) - 1) * $cargos->perPage());
    }

    public function create()
    {
        $cargo = new Cargo();
        $relatedData = $this->getRelatedData($cargo);
        return view('cargo.create', $relatedData);
    }

    public function store(Request $request)
    {
        request()->validate(Cargo::$rules);
        $cargo = Cargo::create($request->all());
        return redirect()->route('cargos.index')
            ->with('success', 'Cargo creado correctamente.');
    }

    public function show($id)
    {
        $cargo = Cargo::find($id);
        return view('cargo.show', ['cargo' => $cargo]);
    }

    public function edit($id)
    {
        $cargo = Cargo::find($id);
        $relatedData = $this->getRelatedData($cargo);
        return view('cargo.edit', array_merge([
            'cargo' => $cargo
        ], $relatedData));
    }

    public function update(Request $request, Cargo $cargo)
    {
        request()->validate(Cargo::$rules);
        $cargo->update($request->all());
        return redirect()->route('cargos.index')->with('success', 'Cargo actualizado correctamente');
    }

    public function destroy($id)
    {
        Cargo::find($id)->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo eliminado correctamente');
    }
}
