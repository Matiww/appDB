<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      =>  'Produkt 1',
                'amount'      =>  4,
            ],
            [
                'name'      =>  'Produkt 2',
                'amount'      =>  12,
            ],
            [
                'name'      =>  'Produkt 5',
                'amount'      =>  0,
            ],
            [
                'name'      =>  'Produkt 7',
                'amount'      =>  6,
            ],
            [
                'name'      =>  'Produkt 8',
                'amount'      =>  2,
            ],
        ];
        Item::insert($users);
    }
}
