<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $userModel = new User();

        $qtdeRegistros = 55;

        $usuariosPush = [];

        for ($i = 0; $i < $qtdeRegistros; $i++) {

            array_push($usuariosPush, [
                'nome'          => $faker->unique()->name,
                'email'         => $faker->unique()->email,
                'senha'         => '$2y$10$X2clalE87UBrd8q3cP0u0OyUE7xlGbypFUow9.TP/2S7ePi/ilExS',
                'ativo'         => $faker->numberBetween(0, 1)
            ]);
        }

        $userModel->skipValidation(true)
            ->protect(false)
            ->insertBatch($usuariosPush);

        echo "$qtdeRegistros criados com sucesso!";
    }
}
