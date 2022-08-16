<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Messages extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'messages';
    protected $fillable = [
        'parent_id','user_id','community_category_id','message_type','message_text','is_read','is_verified','is_follow','status','created_at','updated_at'
    ]; 

    public function category() {
       return $this->belongsTo('App\Models\CommunityCategory','community_category_id');
    }

    public function comments() {
      return $this->hasMany('App\Models\Messages','parent_id');
    }

    public function user() {
       return $this->belongsTo('App\Models\User','user_id');
    }

}
