<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profissao extends Model
{
    use SoftDeletes;
    
    protected $table = "profissoes";
    
    protected $fillable = [
     'nome'
    ];

    public function voluntarios()
    {
        return $this->belongsToMany('App\Models\Profissao', 'voluntario_profissao', 'profissao_id','voluntario_id');
    }
}
