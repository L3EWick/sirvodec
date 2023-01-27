<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voluntario_exp extends Model
{
    use SoftDeletes;

    protected $table = "voluntario_exp";
    
    protected $fillable = [
     'voluntario_id',
     'experiencia_id'
    //  'experiencia_nome'
    ];

    
}
