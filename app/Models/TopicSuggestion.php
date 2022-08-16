<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TopicSuggestion extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'topic_suggestion';
    protected $fillable = ['topicname','suggestion','created_at','updated_at']; 
}