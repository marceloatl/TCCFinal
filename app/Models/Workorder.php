<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
    use HasFactory;

    protected $fillable = [
		'produto_id',
        'quantidade',
        'fornecedor',
        'bill',
        'observacoes'
    ];
    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
