<?php

namespace Database\Factories;

use App\Models\Enquete;
use App\Models\Opcoes;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpcoesFactory extends Factory
{
    
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Opcoes::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            "opcao"  =>$this->faker->text,
           "votos" =>$this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ];
    }
}
