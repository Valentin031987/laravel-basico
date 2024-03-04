<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CargoController extends Controller
{
    public function index(Request $request)
    {
        $query = Cargo::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                foreach (Cargo::$searchable as $attribute) {
                    $q->orWhere($attribute, 'like', '%' . $search . '%');
                }
            });
        }

        $cargos = $query->paginate();
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
            ->with('success', 'Cargo created successfully.');
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
        return redirect()->route('cargos.index')->with('success', 'Cargo updated successfully');
    }

    public function destroy($id)
    {
        Cargo::find($id)->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo deleted successfully');
    }

    protected function getRelatedData($model)
    {
        $relatedData = [];
        foreach ($model->getFillable() as $column) {
            if (Str::endsWith($column, '_id')) {
                $relationName = Str::before($column, '_id');
                $relatedModelClass = 'App\\Models\\' . Str::studly($relationName);
                if (class_exists($relatedModelClass)) {
                     $relatedData[Str::plural($relationName)] = $relatedModelClass::all();
                }
            }
        }
        return $relatedData;
    }
}
