<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Comments()
    {
        //投稿はたくさんのコメントを持つ　←　ここいっぱい通るよ〜〜
        return $this->hasMany(Comment::class, 'post_id');
    }
    public function Category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

}
