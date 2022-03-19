<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Opcoes;

class Enquete extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'data_de_inicio',
        'data_de_termino',
 
     ];
     public function Opcoes(){

        return $this->belongsToMany(Opcoes::class,'enquete','opcao_id',);
    }
}
