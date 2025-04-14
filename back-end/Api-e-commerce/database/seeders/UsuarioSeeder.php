<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criar um usuário administrador
        Usuario::create([
            'nome' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('senhaadmin'),
            'data_nascimento' => '1985-01-01',
        ]);
    }
}
