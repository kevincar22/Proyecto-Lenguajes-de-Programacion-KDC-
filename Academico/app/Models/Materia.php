<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Materia extends Model{
    use HasFactory;
    protected $table = 'materia';
    public function delete(){
        DB::transaction(
            function () {
                $this->delete();
            }
        );
    }
}