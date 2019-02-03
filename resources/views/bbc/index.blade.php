@extends('layouts.default')
@section('content')

    <div class="col-xs-8 col-xs-offset-2">

        @foreach($posts as $post)

            <h2>タイトル：{{ $post->title }}
                <small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small>
            </h2>
{{--            <p>カテゴリー：{{ $post->Category->name }}</p>--}}
            <p><a href="{{ action('PostsController@showCategory', $post->Category->id) }}">{{ $post->Category->name }}</a></p>
            <p>{{ $post->content }}</p>
            {{--<p>{{ link_to('/bbc/'.$post->id, '続きを読む', ['class' => 'btn btn-primary']) }}</p>--}}
            {{--<p class="btn btn-primary"><a style="color: #ffffff;" href="/bbc/{{ $post->id }}">つづき</a></p>--}}
            <p><a href="{{ action('PostsController@show', $post->id) }}">つづき</a></p>
            <p>コメント数：{{ $post->comment_count }}</p>
            <hr />
        @endforeach

    </div>

@stop