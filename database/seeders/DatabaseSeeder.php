<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //User::truncate();
        //Category::truncate();
        //Post::truncate();

        $neethu = User::create([
            'name' => 'Neethu Isaac',
            'username' => 'neethuisaac',
            'email' => 'neethuisaac@gmail.com',
            'password' => 'password',
        ]);
        $june = User::create([
            'name' => 'June NN',
            'username' => 'junenn',
            'email' => 'neethuisaac7@gmail.com',
            'password' => 'password',
        ]);
        User::factory(10)->create();

        $personal = Category::create([
            'name' => "Personal",
            'slug' => 'personal'
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);

        Post::create([
            'category_id' => 1,
            'user_id' => 1,
            'title' => 'First Post',
            'slug' => 'first-post',
            'excerpt' => 'First things first. You have to set priorities in your life. It is very important.',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>'
        ]);
        Post::create([
            'category_id' => 1,
            'user_id' => 2,
            'title' => 'Second Post',
            'slug' => 'second-post',
            'excerpt' => 'Second things are done secondly.things first. You have to set priorities in your life. It is very important.',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>'
        ]);

        Post::factory(10)->create([
            'category_id' => 1
        ]);
        Post::factory(8)->create([
            'category_id' => 2
        ]);
        Post::factory(15)->create([
            'category_id' => 3
        ]);
        Post::factory(5)->create([
            'category_id' => 1,
            'user_id' => $june->id
        ]);
        Post::factory(3)->create([
            'category_id' => 2,
            'user_id' => $june->id
        ]);
        Post::factory(4)->create([
            'category_id' => 3,
            'user_id' => $neethu->id
        ]);
        Post::factory(2)->create([
            'category_id' => 1,
            'user_id' => $neethu->id
        ]);
        Post::factory(5)->create([
            'category_id' => 2,
            'user_id' => $neethu->id
        ]);
    }
}
