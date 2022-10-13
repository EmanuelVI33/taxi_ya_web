<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dario = User::create([
            'nombre' => 'Dario',
            'apellido' => 'Suarez Lazarte',
            'telefono' => '65085392',
            'email' => 'dario@correo.com',
            'password' => Hash::make('S0123456789'),
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $dario->id,
        ]);

        $guido = User::create([
            'nombre' => 'Guido',
            'apellido' => 'Salazar Vargas',
            'telefono' => '72669261',
            'email' => 'guido@correo.com',
            'password' => Hash::make('S0123456789'),
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $guido->id,
        ]);

        $julio = User::create([
            'nombre' => 'Julio Cesar',
            'apellido' => 'Suarez Torrelio',
            'telefono' => '76034449',
            'email' => 'julio@correo.com',
            'password' => Hash::make('S0123456789'),
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $julio->id,
        ]);

        $christian = User::create([
            'nombre' => 'Christian',
            'apellido' => 'Cutile Maldonado',
            'telefono' => '73606371',
            'email' => 'christian@correo.com',
            'password' => Hash::make('C0123456789'),
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $christian->id,
        ]);

        $emanuel = User::create([
            'nombre' => 'Emanuel',
            'apellido' => 'Vaca Ibañez',
            'telefono' => '62064184',
            'email' => 'emanuel@correo.com',
            'password' => Hash::make('V0123456789'),
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $emanuel->id,
        ]);
    }
}
