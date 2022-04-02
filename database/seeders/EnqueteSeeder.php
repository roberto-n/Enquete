<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enquete;
use App\Models\Opcoes;
use Database\Factories\EnqueteFactory;


class EnqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enquete::factory(50)
                 ->has(Opcoes::factory()->count(10),'Opcoes')
                 ->create();
        
    }
}
