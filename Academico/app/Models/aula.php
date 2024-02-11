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

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idprofesor');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'idasignatura');
    }
}
