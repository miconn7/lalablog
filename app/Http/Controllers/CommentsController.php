<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Comment;
use Redirect;
use Validator;


class CommentsController extends Controller
{
    public function store(CommentRequest $request)
    {

        $comment = new Comment;
        $comment->commenter = Input::get('commenter');
        $comment->comment = Input::get('comment');
        $comment->post_id = Input::get('post_id');
        $comment->save();
        return Redirect::back()
            ->with('message', '投稿が完了しました。');

    }
}
