<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voluntario_profissao extends Model
{   
    use SoftDeletes;

    protected $table = "voluntario_profissao";

    protected $fillable = [
     'voluntario_id',
     'profissao_id'
    //  'profissao_nome'
    ];

    public function voluntario(){

        return $this->belongsToMany('App\Models\Voluntario');

    }
    
}
