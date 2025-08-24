<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{

    public function run(): void{
        User::create([
            'company_id' => 1,
            'name'       => 'Admin User',
            'phone'      => '+998 91 111 2233',
            'type'       => 'admin',
            'email'      => 'admin@gmail.com',
            'password'   => Hash::make('password'),
            'code'       => null,
            'status'     => 'true',
        ]);

        User::create([
            'company_id' => 1,
            'name'       => 'Direktor User',
            'phone'      => '+998 93 333 4455',
            'type'       => 'direktor',
            'email'      => 'direktor@gmail.com',
            'password'   => Hash::make('password'),
            'code'       => null,
            'status'     => 'true',
        ]);

        User::create([
            'company_id' => 1,
            'name'       => 'Currer User',
            'phone'      => '+998 93 333 4355',
            'type'       => 'currer',
            'email'      => 'currer@gmail.com',
            'password'   => Hash::make('password'),
            'code'       => null,
            'status'     => 'true',
        ]);

        User::create([
            'company_id' => 1,
            'name'       => 'Oddiy mijoz',
            'phone'      => '+998977778899',
            'type'       => 'user',
            'email'      => null,
            'password'   => null,
            'code'       => '1234',
            'status'     => 'true',
        ]);

        User::create([
            'company_id' => 1,
            'name'       => 'Oddiy mijoz 2',
            'phone'      => '+998977778809',
            'type'       => 'user',
            'email'      => null,
            'password'   => null,
            'code'       => '1234',
            'status'     => 'true',
        ]);

        User::create([
            'company_id' => 1,
            'name'       => 'Oddiy mijoz 3',
            'phone'      => '+998977778839',
            'type'       => 'user',
            'email'      => null,
            'password'   => null,
            'code'       => '1234',
            'status'     => 'true',
        ]);
    }
}
