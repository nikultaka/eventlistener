<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Story extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'story';
    protected $fillable = [
      'user_id','name','status','created_at','updated_at','lastviewd'
    ];

   public function snaps() {
      return $this->hasMany('App\Models\Snaps');
   }

   public function user() {
      return $this->belongsTo('App\Models\User');
   }

}