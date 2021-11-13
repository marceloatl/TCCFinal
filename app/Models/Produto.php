<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
		'codigo',
        'descricao',
        'estado',
        'condicao',
        'propriedade',
        'quantidade',
        'local_origem',
        'local_estoque',
        'custo',
        'status',
        'fornecedor'
    ];


    public function picklist(){
        return $this->hasMany(Picklist::class);
    }

    public function workorders(){
        return $this->hasMany(Workorder::class);
    }
}
