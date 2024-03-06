<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Listacorreo
 *
 * @property $id
 * @property $nombre
 * @property $correo
 * @property $contact_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contact $contact
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Listacorreo extends Model
{

  // Reglas de validación para éste modelo
  static $rules = [
    'nombre' => 'required',
    'correo' => 'required',
    'contact_id' => 'required',
  ];

  // Número de filas mostradas por página de resultados (sql)
  protected $perPage = 20;

  // Atributos que son "setteables" desde mi logica de dominio, de otro modo no puedo asignarles un valor
  protected $fillable = ['nombre', 'correo', 'contact_id'];

  // Atributos habilitados para realizar búsquedas
  static $searchable = ['nombre', 'correo', 'contact_id'];

  /**
   * Relación con cargo, contacto - correos, 1 - *, muchos correos pertenecen a un contacto
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function contact()
  {
    return $this->hasOne('App\Models\Contact', 'id', 'contact_id');
  }
}
