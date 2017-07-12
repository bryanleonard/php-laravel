<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new \App\Tag();
        $tag->name = 'Literature';
        $tag->post_id = 2;
        $tag->save();

        $tag = new \App\Tag();
        $tag->name = 'Hot n\' Spicy';
        $tag->post_id = 1;
        $tag->save();
    }
}
