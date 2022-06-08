<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request)
    {
        $comment = new Comment();

        $postId = $request->get('post_id');

        $comment->post_id = $postId;
        $comment->author = $request->get('author');
        $comment->content = $request->get('content');

        $file = $request->file('image_url');

        if ($file != null) {
            $comment->image_url = $file->store('images', 'public');
        }

        $comment->save();

        return redirect()->route('post.page', $postId);
    }

    public function delete(int $postId, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('post.page', $postId);
    }
}
