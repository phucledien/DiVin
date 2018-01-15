<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UsersTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        // DB::table('orders')->insert([
        //     'name' => 'Tran Minh Luan',
        //     'address' => 'So 19, duong 13',
        //     'number' => '0163375305',
        //     'products' => 'lamp'
        // ]);
        //$this->call(OrdersTableSeeder::class);
    }
}
