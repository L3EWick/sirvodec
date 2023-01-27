<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experiencia extends Model
{
    use SoftDeletes;
    
    protected $table = "experiencias";
    
    protected $fillable = [
        'nome'
    ];


    public function voluntarios()
    {
        return $this->belongsToMany('App\Models\Voluntario', 'voluntario_exp', 'experiencia_id','voluntario_id');
    }

}
