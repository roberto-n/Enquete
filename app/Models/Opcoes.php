<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enquete;

class Opcoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'opcao',
        'voto',
 
     ];
     public function Opcoes(){

        return $this->belongsToMany(Enquete::class,'matriculas','curso_id',);
    }
}
