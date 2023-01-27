<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voluntario extends Model
{
    use SoftDeletes;

    protected $table = "voluntarios";

    protected $fillable = [
        'id',
        'nome',
        'data_de_nascimento',
        'cpf',
        'tipo_sanguineo',
        'endereco',
        'cep',
        'bairro',
        'municipio',
        'email',
        'telefone',
        'nivel_intrucao',
        'complemento',
        'image',
        'sexo'

    ];
    
    public function experiencias()
    {
        // relacionamento com withTrash, para mostrar os excluidos
        return $this->belongsToMany('App\Models\Experiencia', 'voluntario_exp', 'voluntario_id', 'experiencia_id')->withTrashed();
    }

    public function profissoes()
    {
        // relacionamento com withTrash, para mostrar os excluidos
        return $this->belongsToMany('App\Models\Profissao', 'voluntario_profissao', 'voluntario_id', 'profissao_id')->withTrashed();
    }
}
