<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // go UserFactory then create 50 times
        factory(App\User::class, 50)->create();

        // [ seeder with relationship ]
        // factory(App\User::class, 50)->create()->each(function ($user) {
        // $user->posts()->save(factory(App\Post::class)->make());
          // });
    }
}
