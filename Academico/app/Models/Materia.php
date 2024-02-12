<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materia';
    protected $primaryKey = 'idmateria';

    protected $fillable = [
        'nombre',
        'codigo',
        'descripcion',
    ];

    public function profesores()
    {
        return $this->hasMany(Profesor::class, 'idasignatura', 'idmateria');
    }
    public function aulas()
    {
        return $this->hasMany(Aula::class, 'idasignatura', 'idmateria');
    }
}
