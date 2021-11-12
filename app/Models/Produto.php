<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public function picklist(){
        return $this->hasMany(Picklist::class);
    }

    public function workorders(){
        return $this->hasMany(Workorder::class);
    }
}
