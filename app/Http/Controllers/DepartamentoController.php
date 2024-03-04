<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Initialize the query builder for the model.
     * Check if a search term is provided in the request.
     * Add conditions to filter results based on the search term.
     * Retrieve paginated results for the model.
     * Return the index view with the retrieved results.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Departamento::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                foreach (Departamento::$searchable as $attribute) {
                    $q->orWhere($attribute, 'like', '%' . $search . '%');
                }
            });
        }

        $departamentos = $query->paginate();
        return view('departamento.index', [
            'departamentos' => $departamentos,
        ])->with('i', (request()->input('page', 1) - 1) * $departamentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     * Create a new instance of the model.
     * Retrieve related data for belongsTo relationships.
     * Return the create view with the model instance and related data.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento = new Departamento();
        $relatedData = $this->getRelatedData($departamento);
        return view('departamento.create', $relatedData);
    }

    /**
     * Store a newly created resource in storage.
     * Validate the incoming request.
     * Create a new record in the database.
     * Redirect to the index route with a success message.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Departamento::$rules);
        $departamento = Departamento::create($request->all());
        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento created successfully.');
    }

    /**
     * Display the specified resource.
     * Find the model instance by ID.
     * Return the show view with the model instance.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Departamento::find($id);
        return view('departamento.show', ['departamento' => $departamento]);
    }

    /**
     * Show the form for editing the specified resource.
     * Find the model instance by ID.
     * Retrieve related data for belongsTo relationships.
     * Return the edit view with the model instance and related data.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::find($id);
        $relatedData = $this->getRelatedData($departamento);
        return view('departamento.edit', array_merge([
            'departamento' => $departamento,
        ], $relatedData));
    }

    /**
     * Update the specified resource in storage.
     * Validate the incoming request.
     * Update the model instance with the request data.
     * Redirect to the index route with a success message.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        request()->validate(Departamento::$rules);
        $departamento->update($request->all());
        return redirect()->route('departamentos.index')->with('success', 'Departamento updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * Find and delete the model instance by ID.
     * Redirect to the index route with a success message.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Departamento::find($id)->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento deleted successfully');
    }

    /**
     * Retrieve related data for belongsTo relationships.
     * Iterate over the fillable columns of the model.
     * If a column ends with '_id', assume it represents a belongsTo relationship.
     * Construct the relation name and related model class name.
     * If the related model class exists, load all its records.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return array
     */
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
