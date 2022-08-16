<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Feedwall extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'feedwall';
    protected $fillable = [
        'name','category_id','image','status','created_at','updated_at'
    ];

}
