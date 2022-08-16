<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Storyview extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'storyview';
    protected $fillable = [
       'name','user_id','story_id','created_at','updated_at'
    ];

}