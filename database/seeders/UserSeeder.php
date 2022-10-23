<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Conductor;
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
            'email_verified_at' => '2022-10-16 03:26:32'
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $dario->id,
        ]);

        Cliente::create([
            'user_id' => $dario->id,
        ]);

        $guido = User::create([
            'nombre' => 'Guido',
            'apellido' => 'Salazar Vargas',
            'telefono' => '72669261',
            'email' => 'guido@correo.com',
            'password' => Hash::make('S0123456789'),
            'email_verified_at' => '2022-10-16 03:26:32'
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $guido->id,
        ]);

        $cliente2 = Cliente::create([
            'user_id' => $guido->id,
        ]);

        Conductor::create([
            'cliente_id' => $cliente2->id,
            'ci' => '9668001',
            'ocupado' => 0,
            'fotoAntecedente' => '',
            'fotoLicencia' => '',
            'fotoTIC' => '',
        ]);
        $julio = User::create([
            'nombre' => 'Julio Cesar',
            'apellido' => 'Suarez Torrelio',
            'telefono' => '76034449',
            'email' => 'julio@correo.com',
            'password' => Hash::make('S0123456789'),
            'email_verified_at' => '2022-10-16 03:26:32'
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $julio->id,
        ]);

        $cliente3 = Cliente::create([
            'user_id' => $julio->id,
        ]);

        Conductor::create([
            'cliente_id' => $cliente3->id,
            'ci' => '9668001',
            'ocupado' => 0,
            'fotoAntecedente' => '',
            'fotoLicencia' => '',
            'fotoTIC' => '',
        ]);


        $christian = User::create([
            'nombre' => 'Christian',
            'apellido' => 'Cutile Maldonado',
            'telefono' => '73606371',
            'email' => 'christian@correo.com',
            'password' => Hash::make('C0123456789'),
            'email_verified_at' => '2022-10-16 03:26:32'
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $christian->id,
        ]);

        $cliente4 = Cliente::create([
            'user_id' => $christian->id,
        ]);

        Conductor::create([
            'cliente_id' => $cliente4->id,
            'ci' => '9668001',
            'ocupado' => 0,
            'fotoAntecedente' => '',
            'fotoLicencia' => '',
            'fotoTIC' => '',
        ]);
        $emanuel = User::create([
            'nombre' => 'Emanuel',
            'apellido' => 'Vaca Ibañez',
            'telefono' => '62064184',
            'email' => 'emanuel@correo.com',
            'password' => Hash::make('V0123456789'),
            'email_verified_at' => '2022-10-16 03:26:32'
        ])->assignRole('admin');

        Administrador::create([
            'user_id' => $emanuel->id,
        ]);


        //Poblar tabla Usuario relacionadas con la tabla Cliente
        User::create([
            'nombre' => 'Cliente 1',
            'apellido' => 'Apellido Cliente 1',
            'telefono' => '132465798',
            'email' => 'cliente1@correo.com',
            'password' => Hash::make('C0123456789'),
            'email_verified_at' => null
        ])->assignRole('cliente');

        User::create([
            'nombre' => 'Cliente 2',
            'apellido' => 'Apellido Cliente 2',
            'telefono' => '132465798',
            'email' => 'cliente2@correo.com',
            'password' => Hash::make('C0123456789'),
            'email_verified_at' => null
        ])->assignRole('cliente');

        User::create([
            'nombre' => 'Cliente 3',
            'apellido' => 'Apellido Cliente 3',
            'telefono' => '132465798',
            'email' => 'cliente3@correo.com',
            'password' => Hash::make('C0123456789'),
            'email_verified_at' => null
        ])->assignRole('cliente');

        User::create([
            'nombre' => 'Cliente 4',
            'apellido' => 'Apellido Cliente 4',
            'telefono' => '132465798',
            'email' => 'cliente4@correo.com',
            'password' => Hash::make('C0123456789'),
            'email_verified_at' => null
        ])->assignRole('cliente');

        User::create([
            'nombre' => 'Cliente 5',
            'apellido' => 'Apellido Cliente 5',
            'telefono' => '132465798',
            'email' => 'cliente5@correo.com',
            'password' => Hash::make('C0123456789'),
            'email_verified_at' => null
        ])->assignRole('cliente');

    }
}
