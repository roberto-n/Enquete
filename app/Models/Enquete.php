<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
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

     /**
     * Set the Enquete Data inicio.
     *
     * @param  string  $value
     * @return void
     */
    public function setData_De_InicioAttribute($value)
    {
        $this->attributes['data_de_inicio'] = Str::replace('T',' ',$value);
    }
    /**
     * Set the Enquete Data termino.
     *
     * @param  string  $value
     * @return void
     */
    public function setData_De_TerminoAttribute($value)
    {
        $this->attributes['data_de_termino'] = Str::replace('T',' ',$value);
    }
     public function Opcoes(){

        return $this->hasMany(Opcoes::class);
    }
}
