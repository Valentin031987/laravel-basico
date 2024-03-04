<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Tarea
 *
 * @property $id
 * @property $tarea
 * @property $contact_id
 * @property $tipotarea_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contact $contact
 * @property Tipotarea $tipotarea
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tarea extends Model
{


    // Validation rules for this model
    static $rules = [
        'tarea' => 'required',
        'contact_id' => 'required',
        'tipotarea_id' => 'required',
    ];

    // Number of items to be shown per page
    protected $perPage = 20;

    // Attributes that should be mass-assignable
    protected $fillable = ['tarea', 'contact_id', 'tipotarea_id'];

    // Attributes that are searchable
    static $searchable = ['tarea', 'contact_id', 'tipotarea_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipotarea()
    {
        return $this->hasOne('App\Models\Tipotarea', 'id', 'tipotarea_id');
    }
}
