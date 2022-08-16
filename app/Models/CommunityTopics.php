<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CommunityTopics extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'community_topics';
    protected $fillable = ['name','host','text_color','background_color','is_verify','created_at','updated_at'
    ]; 

    public function topicsmember() {
      return $this->hasMany('App\Models\TopicsMember','topic_id');
    }

}
