<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $fillable = [
      'user_id', 'title' , 'content'
    ];
    public function blogger(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function images(){
        return $this->hasMany(Image::class ,'post_id' , 'id');
    }
    public function medias(){
        return $this->hasMany(Media::class, 'post_id' , 'id');
    }
    public function reviews(){
        return $this->hasMany(Review::class,'post_id','id');
    }
    public function titleResume(){
        $title = $this->title;
        $resume = '';
        $arrTitle = explode(' ',trim($title));
        for ($i = 0 ; $i<3 ; $i++){
            $resume .= $arrTitle[$i].' ';
        }
        return $resume;

    }
    public function contentResume(){
        $content = $this->content;
        $resume = '';
        $arrContent = explode(' ',trim($content));
        for ($i = 0 ; $i<3;$i++){
            $resume .= $arrContent[$i].' ';
        }
        return $resume;
    }
    //return readable format of time exp 1 min ago
    public function formatTimeForHuman(){
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    }
    //
}
