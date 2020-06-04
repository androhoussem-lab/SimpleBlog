<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Review extends Model
{
    protected $fillable = [
        'user_id','post_id','stars','review'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
    public function reviewResume(){
        $review = $this->review;
        $resume = '';
        $arrReview = explode(' ',trim($review));
        for ($i = 0 ; $i < 3 ; $i++){
            $resume .= $arrReview[$i].' ';
        }
        return $resume;
    }
    public function formatTimeForHumen(){
        return Carbon::createFromTimestamp(strtotime($this->created_at))->diffForHumans();
    }
    //
}
//Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
