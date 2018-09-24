<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::find(10)->update([
            'name' => 'Default country',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        \App\Category::create([
            'name' => 'New Country',
            'slug' => str_slug('New Country'),
        ]);
    }
}
