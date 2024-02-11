<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $table = 'aula';
    protected $primaryKey = 'idaula';
    const UPDATED_AT = null;

    const CREATED_AT = null;

    protected $fillable = [
        'nombre',
        'codigo',
        'idasignatura',
        'idprofesor',
        'descripcion',
    ];

    public function profesores()
    {
        return $this->hasMany(Profesor::class, 'idasignatura', 'idasignatura');
    }
}
