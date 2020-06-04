<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
      'post_id' , 'url'
    ];
    public function post(){
        return $this->belongsTo(Post::class ,'post_id' , 'id');
    }
    //
}
