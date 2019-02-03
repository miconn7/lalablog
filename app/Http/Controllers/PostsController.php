<?php

namespace App\Http\Controllers;

use Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
//        var_dump($posts);
        return view('bbc.index',['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('bbc.single',['post' => $post]);
    }

    public function create()
    {
        return view('bbc.create');
    }

    public function store()
    {
        $rules = [
            "title" => "required",
            "content" => "required",
            "cat_id" => "required",
        ];

        $messages = [
            "title.required" => "タイトルを正しく入力してください。",
            "content.required" => "本文を正しく入力してください。",
            "cat_id.required" => "カテゴリを選択してください。",
        ];
        $data = Input::all();
//        echo "あああ";
//        var_dump($data)
//        var_dump($rules);
//        var_dump($messages);


        $validator= Validator::make($data,$rules,$messages);
//        var_dump($validator);
//            var_dump($validator->passes());
        if($validator->passes()){
            $post = new Post();
            $post->title = Input::get('title');
            $post->content = Input::get('content');
            $post->cat_id = Input::get('cat_id');
            $post->comment_count = 0;
            $post->save();
            return Redirect::back()->with('message', '投稿が完了しました。');
        } else {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function showCategory($id)
    {
        echo $id;
        $category_posts = Post::where('cat_id', $id)->get();
//        return View::make('category')->with('category_posts', $category_posts);
        return view('bbc.category', ['category_posts' => $category_posts]);
    }
}
