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
        factory(\App\User::class, 15)->create();
        factory(\App\Article::class, 7)->create();
        factory(\App\Tag::class, 10)->create();
    }
}
