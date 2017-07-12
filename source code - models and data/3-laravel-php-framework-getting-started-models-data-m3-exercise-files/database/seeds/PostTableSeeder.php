<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post([
            'title' => 'Learning Laravel',
            'content' => 'This blog post will get you right on track with Laravel!'
        ]);
        $post->save();

        $post = new \App\Post([
            'title' => 'Something else',
            'content' => 'Some other content'
        ]);
        $post->save();

        $post = new \App\Post([
            'title' => 'Another doodad',
            'content' => 'Here is a great post that is going to take over the world'
        ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => 'Don\'t forget about meeee!',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam nihil vel voluptate voluptatem dolores, velit laudantium commodi. Ut deserunt voluptas dolorem excepturi explicabo quia, vel expedita, debitis nesciunt odit! Ea.'
        ]);
        $post->save();
    }
}
