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


    // Reglas de validación para éste modelo
    static $rules = [
        'tarea' => 'required',
        'contact_id' => 'required',
        'tipotarea_id' => 'required',
    ];

    // Número de filas mostradas por página de resultados (sql)
    protected $perPage = 20;

    // Atributos que son "setteables" desde mi logica de dominio, de otro modo no puedo asignarles un valor
    protected $fillable = ['tarea', 'contact_id', 'tipotarea_id'];

    // Atributos habilitados para realizar búsquedas
    static $searchable = ['tarea', 'contact_id', 'tipotarea_id'];


    /**
     * Relación con cargo, contacto - tarea, 1-*, varias tareas pertenecen a un contacto
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_id');
    }

    /**
     * Relación con tipo de tarea, tarea - tipodetarea, * - 1, una tarea pertenece a un tipo
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipotarea()
    {
        return $this->hasOne('App\Models\Tipotarea', 'id', 'tipotarea_id');
    }
}
