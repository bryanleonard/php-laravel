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
			'title' => 'One for all, all for one',
			'content' => 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.'
		]);

		$post->save();

		$post = new \App\Post([
			'title' => 'Far far away',
			'content' => 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am.'
		]);
		
		$post->save();

		$post = new \App\Post([
            'title' => 'European languages: all the same family',
            'content' => 'Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.'
        ]);
        
        $post->save();

        $post = new \App\Post([
        	'title' => 'When Gregor Samsa woke from troubled dreams',
        	'content' => 'He found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.'
        ]);

        $post->save();

		$post = new \App\Post([
			'title' => 'Lorem ipsum dolor sit amet',
			'content' => 'Consectetur adipisicing elit. Eaque quaerat iste nemo, praesentium pariatur deleniti cum. Eius excepturi quisquam odio sequi velit quas ab, voluptates ullam enim. Impedit, delectus minima.'
		]);

		$post->save();

		$post = new \App\Post([
			'title' => 'Lius excepturi quisquam odio sequi',
			'content' => 'Eaque quaerat iste nemo, praesentium pariatur deleniti cum. Eius excepturi quisquam odio sequi velit quas ab, voluptates ullam enim. Impedit, delectus minima.'
		]);
		
		$post->save();

	}
}
