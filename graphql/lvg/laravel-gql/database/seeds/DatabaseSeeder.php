<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;
use App\Book;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory('App\User', 10)->create();
        factory('App\Category', 5)->create()->each(function($u){
            $u->books()->saveMany(factory(Book::class,rand(1,5))->make());
        });
    }
}
