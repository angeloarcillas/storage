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
        // php artisan migrate:fresh --seed -> migrate:fresh + db:seed
          // [ multi seeder]
          $this->call(UsersTableSeeder::class);

         //  [ Single seeder ]
         //  DB::table('users')->insert([
         //     'name' => Str::random(10),
         //     'email' => Str::random(10).'@gmail.com',
         //     'password' => bcrypt('secret'),
         // ]);
    }
}
