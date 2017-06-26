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
		if (!$session->has('posts')) {
			$this->createDummyData();
		}
		$posts = $session->get('posts');
		array_push($posts, ['title' => $title, 'content' => $content]);
		$session->put('posts', $posts);
	}

	public function editPost($session, $id, $title, $content) 
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
				'content' => 'This blog post will get you right on track with Laravel!'
			],
			[
				'title' => 'Something else about learning',
				'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit delectus sit odio nesciunt, aut cumque omnis deleniti cum inventore natus commodi culpa laborum dolores quo earum illo impedit maiores. Quia.'
			]
		];

		$session->put('posts', $posts);
	}
}

