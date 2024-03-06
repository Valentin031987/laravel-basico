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
    // Reglas de validación para éste modelo
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

    // Número de filas mostradas por página de resultados (sql)
    protected $perPage = 20;

    // Atributos que son "setteables" desde mi logica de dominio, de otro modo no puedo asignarles un valor
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

    // Atributos habilitados para realizar búsquedas
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
     * Relación con cargo, contacto - cargos, * - 1
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cargo()
    {
        return $this->hasOne('App\Models\Cargo', 'id', 'cargo_id');
    }

    /**
     * Relación con departamento, contacto - departamento, * - 1
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'id', 'departamento_id');
    }

    /**
     * Relación con correos, contacto - correos, 1 - *, un contacto tiee muchos correos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listacorreos()
    {
        return $this->hasMany('App\Models\Listacorreo', 'contact_id', 'id');
    }

    /**
     * Relación con notas, contacto - notas, 1 - *, un contacto tiene muchas notas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notas()
    {
        return $this->hasMany('App\Models\Nota', 'contact_id', 'id');
    }

    /**
     * Relación con tareas, contacto - tarea, 1-*, un contacto tiee muchas tareas
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tareas()
    {
        return $this->hasMany('App\Models\Tarea', 'contact_id', 'id');
    }

    //filtrando de registros por los atributos del modelo
    public static function search($request)
    {
        $query = Contact::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                foreach (Contact::$searchable as $attribute) {
                    $q->orWhere($attribute, 'like', '%' . $search . '%');
                }
            });
        }

        return $query->paginate();
    }
}
