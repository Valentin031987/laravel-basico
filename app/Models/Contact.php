<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Contact
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $empresa_cliente
 * @property $fecha_ultima_modificacion
 * @property $correo
 * @property $direccion
 * @property $telefono
 * @property $movil
 * @property $departamento_id
 * @property $cargo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cargo $cargo
 * @property Departamento $departamento
 * @property Listacorreo[] $listacorreos
 * @property Nota[] $notas
 * @property Tarea[] $tareas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contact extends Model
{


    // Validation rules for this model
    static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'empresa_cliente' => 'required',
        'fecha_ultima_modificacion' => 'required',
        'correo' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'movil' => 'required',
        'departamento_id' => 'required',
        'cargo_id' => 'required',
    ];

    // Number of items to be shown per page
    protected $perPage = 20;

    // Attributes that should be mass-assignable
    protected $fillable = [
        'nombre',
        'apellido',
        'empresa_cliente',
        'fecha_ultima_modificacion',
        'correo',
        'direccion',
        'telefono',
        'movil',
        'departamento_id',
        'cargo_id'
    ];

    // Attributes that are searchable
    static $searchable = [
        'nombre',
        'apellido',
        'empresa_cliente',
        'fecha_ultima_modificacion',
        'correo',
        'direccion',
        'telefono',
        'movil',
        'departamento_id',
        'cargo_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cargo()
    {
        return $this->hasOne('App\Models\Cargo', 'id', 'cargo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'id', 'departamento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listacorreos()
    {
        return $this->hasMany('App\Models\Listacorreo', 'contact_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notas()
    {
        return $this->hasMany('App\Models\Nota', 'contact_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tareas()
    {
        return $this->hasMany('App\Models\Tarea', 'contact_id', 'id');
    }
}
