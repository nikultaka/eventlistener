<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class IsFollow extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'is_follow';
    protected $fillable = [
       'user_id','to_user_id','is_follow','created_at','updated_at'
    ];

}