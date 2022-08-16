<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TopicPost extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'topic_post';
    protected $fillable = ['topic_id','post_message','created_at','updated_at','post_image','tags']; 

    public function users() {
      return $this->belongsTo('App\Models\User','user_id');
    }

}
