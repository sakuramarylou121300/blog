<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //these are needed if we don't refresh database
        // User::truncate();//to delete the table first before executing the add data, this is to avoid errors when duplicating data
        // Category::truncate();
        // Post::truncate();

        //since we have Factory for User, Post, and Category, here is what we can do
        $user = User::factory()->create([
            'name'=>'John Doe'
        ]);
        Post::factory(5)->create([
            'user_id'=>$user->id//override id, it will get the id declared above which is John Doe's id
        ]);//it will create 5 because the number inside the parenthesis is 5
                // //create automatic user
        // $user = User::factory()->create();


        // //create automatic category
        // $personal = Category::create([
        //     'name'=> 'Personal',
        //     'slug' =>'personal'
        // ]);
        // $family = Category::create([
        //     'name'=> 'Family',
        //     'slug' =>'family'
        // ]);
        // $work = Category::create([
        //     'name'=> 'Work',
        //     'slug' =>'work'
        // ]);

        // //create automatic post
        // Post::create([
        //     'user_id' =>$user->id,
        //     'category_id' =>$family->id,
        //     'title'=> 'My Family Post',
        //     'slug' =>'my-first-post',
        //     'excerpt' =>'<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
        //     'body' =>'<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet justo vel nisl 
        //     pulvinar, eu dictum mi feugiat. Quisque vestibulum arcu at diam scelerisque, ac iaculis magna 
        //     imperdiet. Suspendisse vel purus posuere, mattis neque eu, sollicitudin lorem. Praesent vel quam 
        //     vitae lectus porttitor consectetur eu vitae neque. Nullam a commodo dolor. Aliquam lorem orci, 
        //     scelerisque id magna sed, sollicitudin laoreet justo. Sed nec ligula in lorem lobortis dignissim 
        //     id non neque. Sed id tristique risus, viverra dictum mauris. Aliquam maximus, tortor eget porta 
        //     efficitur, nunc nibh vestibulum risus, eget tristique sem arcu id est. In ut ullamcorper ante. 
        //     Pellentesque ut mattis leo. Quisque vel accumsan turpis. Pellentesque a ex vitae turpis auctor 
        //     volutpat. Nulla nec massa mattis, laoreet neque sit amet, feugiat ex. Proin egestas aliquet velit 
        //     et maximus. Maecenas porttitor leo at ornare hendrerit. . </p>'
        // ]);
        // Post::create([
        //     'user_id' =>$user->id,
        //     'category_id' =>$work->id,
        //     'title'=> 'My Work Post',
        //     'slug' =>'my-work-post',
        //     'excerpt' =>'<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>',
        //     'body' =>'<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet justo vel nisl 
        //     pulvinar, eu dictum mi feugiat. Quisque vestibulum arcu at diam scelerisque, ac iaculis magna 
        //     imperdiet. Suspendisse vel purus posuere, mattis neque eu, sollicitudin lorem. Praesent vel quam 
        //     vitae lectus porttitor consectetur eu vitae neque. Nullam a commodo dolor. Aliquam lorem orci, 
        //     scelerisque id magna sed, sollicitudin laoreet justo. Sed nec ligula in lorem lobortis dignissim 
        //     id non neque. Sed id tristique risus, viverra dictum mauris. Aliquam maximus, tortor eget porta 
        //     efficitur, nunc nibh vestibulum risus, eget tristique sem arcu id est. In ut ullamcorper ante. 
        //     Pellentesque ut mattis leo. Quisque vel accumsan turpis. Pellentesque a ex vitae turpis auctor 
        //     volutpat. Nulla nec massa mattis, laoreet neque sit amet, feugiat ex. Proin egestas aliquet velit 
        //     et maximus. Maecenas porttitor leo at ornare hendrerit. . </p>'
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
