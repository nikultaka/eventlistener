<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TopicComment extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'topic_comment';
    protected $fillable = ['topic_id','post_id','message','created_at','updated_at','image','tags','user_id']; 

    public function users() {
      return $this->belongsTo('App\Models\User','user_id');
    }
}