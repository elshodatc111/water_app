<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyItem;

class CompanyItemSeeder extends Seeder{
    public function run(): void{

        CompanyItem::create([
            'company_id' => 1,
            'name'       => '20L Suv',
            'price'      => 10000,
            'image'      => 'https://www.nestlepurelife.com/tr/sites/g/files/xknfdk416/files/2020-04/19litre_442x562_rev_0.png',
            'status'     => 'true',
        ]);

        CompanyItem::create([
            'company_id' => 1,
            'name'       => '10L Suv',
            'price'      => 6000,
            'image'      => 'https://www.nestlepurelife.com/tr/sites/g/files/xknfdk416/files/2020-04/10litre_442x562_rev_0.png',
            'status'     => 'true',
        ]);

        CompanyItem::create([
            'company_id' => 1,
            'name'       => '5L Suv',
            'price'      => 4000,
            'image'      => 'https://www.thebottleclub.com/cdn/shop/files/saka-natural-mineral-water-2-x-5-l-water-31648485113971.jpg?v=1703681798',
            'status'     => 'true',
        ]);

    }
}
