<?php

namespace Database\Seeders;

use App\Models\Plano;
use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hoje = Carbon::create(2021,04,05,0,0,0);

        $plano = Plano::first();

        $plano->tenants()->create([
            'uuid' => Str::uuid(),
            'cpf_cnpj' => '67227864391',
            'nome' => 'Invista Tecnologias',
            'slug' => Str::slug('Invista Tecnologias'),
            'email' => 'free@upgest.com.br',
            'porcentagem' => '200',
            'status' => 1,
            'data_inscricao' => $hoje,
            'data_expiracao' => $hoje->addDays(7),
            'inscricao_status' => 'Ativo'
        ]);

    }
}
