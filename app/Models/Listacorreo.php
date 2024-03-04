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


  // Validation rules for this model
  static $rules = [
    'nombre' => 'required',
    'correo' => 'required',
    'contact_id' => 'required',
  ];

  // Number of items to be shown per page
  protected $perPage = 20;

  // Attributes that should be mass-assignable
  protected $fillable = ['nombre', 'correo', 'contact_id'];

  // Attributes that are searchable
  static $searchable = ['nombre', 'correo', 'contact_id'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function contact()
  {
    return $this->hasOne('App\Models\Contact', 'id', 'contact_id');
  }
}
