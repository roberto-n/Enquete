<?php

namespace Database\Factories;

use App\Models\Enquete;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnqueteFactory extends Factory
{

     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enquete::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [ 
           "titulo" =>$this->faker->text,
           "descricao" =>$this->faker->text,
           "data_de_inicio" =>$this->faker->dateTimeThisDecade($max = 'now', $timezone = null),
           "data_de_termino" =>$this->faker->dateTimeThisDecade($max = 'now', $timezone = null),
           
        ];
    }
}
