<?php

namespace Database\Seeders;

use App\Models\Plano;
use Illuminate\Database\Seeder;

class PlanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plano::create([
            'plano' => 'Administrador',
            'slug' => 'administrador',
            'descricao' => 'Administrador',
            'preco' => 0,
            'stripe_id' => '00',
        ]);

        Plano::create([
            'plano' => 'Amigos',
            'slug' => 'amigos',
            'descricao' => 'Amigos',
            'preco' => 0,
            'stripe_id' => '11'
        ]);

        Plano::create([
            'plano' => 'Bussiness',
            'slug' => 'bussiness',
            'descricao' => 'Bussiness',
            'preco' => 990,
            'stripe_id' => 'price_1J2FC7LiHFmbvXrWJpTkrxUg'
        ]);

        Plano::create([
            'plano' => 'Premium',
            'slug' => 'premium',
            'descricao' => 'Todas as funcionalidades disponíveis para o usuário',
            'preco' => 1990,
            'stripe_id' => 'price_1IvnuBLiHFmbvXrWsjGVFPx2'
        ]);

    }
}
