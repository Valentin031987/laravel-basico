<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Tipotarea
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Tarea[] $tareas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipotarea extends Model
{

  // Reglas de validación para éste modelo
  static $rules = [
    'nombre' => 'required',
  ];

  // Número de filas mostradas por página de resultados (sql)
  protected $perPage = 20;

  // Atributos que son "setteables" desde mi logica de dominio, de otro modo no puedo asignarles un valor
  protected $fillable = ['nombre'];

  // Atributos habilitados para realizar búsquedas
  static $searchable = ['nombre'];


  /**
   * Relación con tareas, tareas - tipo de tareas, * - 1, 
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function tareas()
  {
    return $this->hasMany('App\Models\Tarea', 'tipotarea_id', 'id');
  }

  //filtrando de registros por los atributos del modelo
  public static function search($request)
  {
    $query = Tipotarea::query();

    if ($request->has('search')) {
      $search = $request->input('search');
      $query->where(function ($q) use ($search) {
        foreach (Tipotarea::$searchable as $attribute) {
          $q->orWhere($attribute, 'like', '%' . $search . '%');
        }
      });
    }

    return $query->paginate();
  }
}
