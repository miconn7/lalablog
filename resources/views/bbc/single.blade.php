@extends('layouts.default')
@section('content')

    <div class="col-xs-8 col-xs-offset-2">

        <h2>タイトル：{{ $post->title }}
            <small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small>
        </h2>
        <p>カテゴリー：{{ $post->Category->name }}</p>
        <p>{{ $post->content }}</p>

        <hr />

        <h3>コメント一覧</h3>
        @foreach($post->comments as $single_comment)
            <h4>{{ $single_comment->commenter }}</h4>
            <p>{{ $single_comment->comment }}</p><br />
        @endforeach



        <h3>コメントを投稿する</h3>
        {{-- 投稿完了時にフラッシュメッセージを表示 --}}
        @if(Session::has('message'))
            <div class="bg-info">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif

        {{-- エラーメッセージの表示 --}}
        @foreach($errors->all() as $message)
            <p class="bg-danger">{{ $message }}</p>
        @endforeach

        {{ Form::open(['url' => 'http://localhost:8000/bbc/comments']) }}

        <div class="form-group">
            <label for="commenter" class="">名前</label>
            <div class="">
                {{ Form::text('commenter', null, array('class' => '')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="comment" class="">コメント</label>
            <div class="">
                {{ Form::textarea('comment', null, array('class' => '')) }}
            </div>
        </div>

        {{ Form::hidden('post_id', $post->id) }}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">投稿する</button>
        </div>


        {{ Form::close() }}

    </div>

@stop
