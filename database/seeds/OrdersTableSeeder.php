<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerOrder::create([
            'name' => 'admin',
            'address' => 'admin@admin.com',
            'number' => bcrypt('password'),
            'products' => 'admin@admin.com'
        ]);
    }
}
