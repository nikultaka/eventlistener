<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class FeedbackSubject extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'feedback_subject';
    protected $fillable = ['feedback_subject_name','status','created_at','updated_at'
    ]; 

}
