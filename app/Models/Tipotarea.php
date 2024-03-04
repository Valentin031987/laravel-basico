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


  // Validation rules for this model
  static $rules = [
    'nombre' => 'required',
  ];

  // Number of items to be shown per page
  protected $perPage = 20;

  // Attributes that should be mass-assignable
  protected $fillable = ['nombre'];

  // Attributes that are searchable
  static $searchable = ['nombre'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function tareas()
  {
    return $this->hasMany('App\Models\Tarea', 'tipotarea_id', 'id');
  }
}
