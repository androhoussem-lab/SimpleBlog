<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
      'post_id', 'title' , 'url'
    ];
    //
    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
}
