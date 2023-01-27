<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eventos extends Model
{
    use SoftDeletes;
    
    protected $table = "eventos";

    protected $fillable = [
     'id',
     'descricao',
     'nome',
     'data'
     
    ];

    public function evento_images(){

        return $this->hasMany('App\Models\Eventos_Images');
        
    }
    
}
