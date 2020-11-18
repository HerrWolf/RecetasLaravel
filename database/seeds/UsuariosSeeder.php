<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Adan',
            'email' => 'adan@mail.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://pagina.com'
        ]);

        $user2 = User::create([
            'name' => 'Jose',
            'email' => 'jose@mail.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://pagina.com'
        ]);
        
    }
}
