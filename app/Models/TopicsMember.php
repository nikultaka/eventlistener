<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TopicsMember extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'topics_member';
    protected $fillable = ['user_id','is_follow','created_at','updated_at','topic_id'
    ]; 

}
