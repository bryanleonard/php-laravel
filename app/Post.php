<?php

namespace App;

class Post
{
	// could also use a facade instead of fn arg
	public function getPosts($session)
	{
		if (!$session->has('posts')) {
			$this->createDummyData($session);
		}
		return $session->get('posts');
	}

	public function getPost($session, $id) 
	{
		if (!$session->has('posts')) {
			$this->createDummyData();
		}
		return $session->get('posts')[$id];
	}

	public function addPost($session, $title, $content) 
	{
		if ($session->has('posts')) {
			$this->createDummyData();
		}
		$posts = $session->get('posts');
		array_push($posts, ['title' => $title, 'content' => $content]);
		$session->put('posts', $posts);
	}

	public function editPost($sessio, $id, $title, $content) 
	{
		$posts = $session->get('posts');
		$posts[$id] = ['title' => $title, 'content' => $content];
		$session->put('posts', $posts);
	}

	private function createDummyData($session) 
	{
		$posts = [
			[
				'title' => 'Learning Laravel',
				'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure quasi laboriosam sapiente amet rem alias soluta, corporis commodi atque ut quis velit dolorem! Molestiae distinctio obcaecati quibusdam dignissimos, maiores fugit.
				Quo tempore corporis qui consequatur aperiam sed ullam. Earum nemo quas ipsum repellendus unde magnam debitis dolor laborum iure, vel, ullam saepe aliquam ab fugit tenetur, fugiat consequuntur explicabo dolores.
				Ex culpa provident eos expedita ut, commodi atque. Distinctio doloribus, ratione est tempora iure esse quaerat officia earum ab quidem exercitationem inventore sunt cum at voluptas consectetur quas iusto aut!</p>
				<p>Temporibus dolorum voluptatum necessitatibus dolore quibusdam cumque sint voluptas aliquid dolorem ut blanditiis iure distinctio fugiat tenetur sequi laborum recusandae, voluptatibus iusto sit impedit modi, qui reprehenderit. Corrupti itaque, sed?</p>
				<p>Perspiciatis iure at hic, repellat voluptatum libero, vitae esse omnis odit, qui nostrum voluptatem, dolore voluptates praesentium. Earum error, quod. Iste voluptates blanditiis quisquam velit, ex debitis natus doloremque vel.</p>
				<p>Iste, officia minus! Obcaecati modi aut tenetur praesentium aliquid tempora, quidem voluptates corporis alias, quibusdam autem commodi odio vel pariatur ipsum dolor? Dolores enim minima blanditiis molestias recusandae quisquam ullam.</p>
				<p>Natus dolore laudantium soluta dolorem repudiandae consequuntur eveniet, aut aliquid saepe autem itaque, ipsam eligendi ipsa porro, perferendis ad provident nemo molestias. Amet nulla consequatur consequuntur, distinctio hic. Debitis, obcaecati.</p>
				<p>Id vel voluptatem quod, recusandae natus repellendus, nam quia obcaecati soluta sit laudantium sint repellat quasi deserunt dolorem hic doloribus distinctio eos nihil porro placeat. Harum, laudantium, ipsum. Laudantium, odit!</p>
				<p>Impedit ea repudiandae eos, dolores minima atque quod velit neque corporis soluta nam quam non, facere reiciendis esse amet dolore vitae necessitatibus. Consequatur officia ea nam id libero, possimus quas.</p>
				<p>Veniam libero officiis laborum deleniti dicta. Quibusdam, neque ipsa accusamus! Cupiditate impedit aspernatur pariatur omnis natus incidunt neque eius temporibus deserunt tempore. Ex repudiandae sint ratione commodi ipsam at aperiam.</p>'
			],

			[
				'title' => 'Another post! - Dummy',
				'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure quasi laboriosam sapiente amet rem alias soluta, corporis commodi atque ut quis velit dolorem! Molestiae distinctio obcaecati quibusdam dignissimos, maiores fugit.</p>
				<p>Iste, officia minus! Obcaecati modi aut tenetur praesentium aliquid tempora, quidem voluptates corporis alias, quibusdam autem commodi odio vel pariatur ipsum dolor? Dolores enim minima blanditiis molestias recusandae quisquam ullam.</p>
				<p>Quo tempore corporis qui consequatur aperiam sed ullam. Earum nemo quas ipsum repellendus unde magnam debitis dolor laborum iure, vel, ullam saepe aliquam ab fugit tenetur, fugiat consequuntur explicabo dolores.</p>
				<p>Ex culpa provident eos expedita ut, commodi atque. Distinctio doloribus, ratione est tempora iure esse quaerat officia earum ab quidem exercitationem inventore sunt cum at voluptas consectetur quas iusto aut!</p>
				<p>Temporibus dolorum voluptatum necessitatibus dolore quibusdam cumque sint voluptas aliquid dolorem ut blanditiis iure distinctio fugiat tenetur sequi laborum recusandae, voluptatibus iusto sit impedit modi, qui reprehenderit. Corrupti itaque, sed?</p>
				<p>Perspiciatis iure at hic, repellat voluptatum libero, vitae esse omnis odit, qui nostrum voluptatem, dolore voluptates praesentium. Earum error, quod. Iste voluptates blanditiis quisquam velit, ex debitis natus doloremque vel.</p>
				<p>Veniam libero officiis laborum deleniti dicta. Quibusdam, neque ipsa accusamus! Cupiditate impedit aspernatur pariatur omnis natus incidunt neque eius temporibus deserunt tempore. Ex repudiandae sint ratione commodi ipsam at aperiam.</p>'
			]
		];

		$session->put('posts', $posts);
	}
}

