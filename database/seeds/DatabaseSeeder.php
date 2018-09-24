<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        \App\Post::find(1)->update([
//            'title' => 'Dr. Sven Predovic II',
//            'slug' => str_slug('Dr. Sven Predovic II')
//        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}
