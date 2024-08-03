<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = auth()->id();
        $comment->blog_id = $request->hiddenBlogID;
        $comment->save();

        return redirect()->back();
    }
}
