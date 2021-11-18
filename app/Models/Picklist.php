<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picklist extends Model
{
    use HasFactory;

    protected $fillable = [
		'produto_id',
        'quantidade',
        'cliente',
        'bill',
        'observacoes'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
