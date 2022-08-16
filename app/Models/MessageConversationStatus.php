<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MessageConversationStatus extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'message_conversation_status';
    protected $fillable = ['user_id','to_user_id','message_id','is_typing','created_at','updated_at'
    ]; 

}
