<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eventos_Images extends Model
{
    use SoftDeletes;
    
    protected $table = "eventos_images";
    protected $fillable = [
     'image',
     'eventos_id'
    ];
    
    public function eventos(){

        return $this->belongsToMany('App\Models\Eventos');
    
        }
}
