<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Snaps extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'snaps';
    protected $fillable = [
       'story_id','media','mediatype','created_at','updated_at'
    ];

   public function story() {
      return $this->belongsTo('App\Models\Story');
   }

}