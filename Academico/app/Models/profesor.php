<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'Profesor'; // Especifica el nombre de la tabla si no sigue la convención de Laravel
    protected $primaryKey = 'idprofesor'; // Especifica la clave primaria si no es 'id'

    protected $fillable = [
        'nombre',
        'cedula',
        'idasignatura',
    ];

    public function aulas() 
    {
        return $this->hasMany(Aula::class, 'idprofesor', 'idprofesor');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'idasignatura');
    }
}
