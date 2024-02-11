<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aula extends Model
{
    use HasFactory;
    protected $table = 'aula';
    protected $primaryKey = 'idaula';

    protected $fillable = [
        'codigo',
        'idasignatura',
        'idprofesor'
    ];

    /*public function profesores()
    {
        return $this->hasMany(
            Profesor::class, 'idprofesor', 'idprofesor'
        );
    }

    public function materias()
    {
        return $this->hasMany(
            Materia::class, 'idmateria', 'idasignatura'
        );
    }*/
}
