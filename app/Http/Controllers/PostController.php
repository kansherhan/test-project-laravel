<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use DateTime;

class PostController extends Controller
{
    public function post(Post $post)
    {
        $postComments = Comment::where('post_id', $post->id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        $hasComments = count($postComments) > 0;

        return view('pages.post', [
            'post' => $post,
            'comments' => [
                'items' => $postComments,
                'has' => $hasComments
            ]
        ]);
    }

    public function allPosts()
    {
        return view('pages.post-collection', ['posts' => Post::all()]);
    }

    public function createPost()
    {
        return view('pages.edit');
    }

    public function editPost(Post $post)
    {
        return view('pages.edit', ['post' => $post]);
    }

    public function deletePost(Post $post)
    {
        $post->delete();

        return redirect()->route('home');
    }

    public function storePost(PostRequest $request)
    {
        $postId = $request->get('id');

        $post = $postId ? Post::find($postId) : new Post();

        if ($postId) {
            $post->updated_at = new DateTime();
        }

        $this->storePostFromRequest($post, $request);

        return redirect()->route('home');
    }

    private function storePostFromRequest(Post $post, PostRequest $request)
    {
        $post->title = $request->get('title');
        $post->author = $request->get('author');
        $post->content = $request->get('content');

        $file = $request->file('image_url');

        if ($file != null)
        {
            $post->image_url = $file->store('images', 'public');
        }

        $post->save();
    }
}
