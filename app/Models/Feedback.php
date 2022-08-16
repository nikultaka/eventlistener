<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Feedback extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'feedback';
    protected $fillable = ['feedback_subject_id','feedback','created_at','updated_at'
    ]; 

}
