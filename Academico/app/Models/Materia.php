<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Materia extends Model{
    use HasFactory;
    protected $table = 'materia';
    protected $primaryKey = 'idmateria';
    const UPDATED_AT = null;

    const CREATED_AT = null;

}