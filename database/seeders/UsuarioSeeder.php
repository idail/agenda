<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senha = bcrypt("123456");
        $usuario = new Usuario();
        $usuario->nome = "Idail Neto";
        $usuario->usuario = "idail";
        $usuario->senha = $senha;

        $usuario->save();
    }
}
