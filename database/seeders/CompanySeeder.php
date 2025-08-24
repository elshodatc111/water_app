<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder{
    public function run(): void{
        Company::create([
            'name'        => 'Water Go LLC',
            'phone'       => '+998 90 123 4567',
            'order_price' => 0,
            'image'       => 'https://cdn.pr.commerce.coop.co.uk/7613031722662_1_512x512_20250819.png',
            'description' => 'Suv yetkazib berish kompaniyasi',
            'star'        => 4.5,
            'star_count'  => 10,
            'balance'     => 100000,
            'price'       => 5000,
            'status'      => 'true',
        ]);
    }
}
