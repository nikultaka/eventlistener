<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MessageConversation extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'message_conversation';
    protected $fillable = ['user_id','to_user_id','message','created_at','updated_at','parent_id'
    ]; 

    public function sender() {
       return $this->belongsTo('App\Models\User','user_id');
    }

    public function receiver() {
       return $this->belongsTo('App\Models\User','to_user_id');
    }

}
