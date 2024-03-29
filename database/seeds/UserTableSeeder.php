<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name'=> str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);

        factory(App\User::class, 5)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->create());
        });
        factory(App\Post::class, 5)->create()->each(function ($post) {
            $post->comment()->save(factory(App\Comment::class)->create());
        });
 
    }
}
