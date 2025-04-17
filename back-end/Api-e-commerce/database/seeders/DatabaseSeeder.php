<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;  // Adicione a importação do seu seeder

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Chame o seeder específico
        $this->call([
            UsuarioSeeder::class,
        ]);
    }
}
