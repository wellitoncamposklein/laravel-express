<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use \App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(
            [
                'name' => 'welliton',
                'email' => 'welliton.fokushima@gmail.com',
                'password' => bcrypt(123456), // secret
                'remember_token' => str_random(10),
            ]
        );

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

         $this->call(PostsTableSeeder::class);
         $this->call(TagTableSeeder::class);

        // supposed to only apply to a single connection and reset it's self
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
