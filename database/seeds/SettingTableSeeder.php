<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'DiVin',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, enim, recusandae perferendis autem molestiae laboriosam voluptatibus nulla assumenda nisi quae quaerat asperiores ipsa! Totam veniam est necessitatibus iste eveniet nesciunt, suscipit deleniti! Ut architecto nobis, dolores perferendis incidunt autem ducimus a reiciendis inventore tempora doloremque ipsa cupiditate repudiandae necessitatibus! Fuga!',
        	'address' => 'HCM, Vietnam',
        	'contact_number' => '01234567890',
        	'contact_email' => 'info@laravelblog.com'
        ]);
    }
}
