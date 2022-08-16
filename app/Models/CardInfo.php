<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CardInfo extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'cards_info';
    protected $fillable = [
        'user_id','firstname','lastname','middlename','nationality','address1','address2','state','city','zipcode','id_issued_date','id_expiration_date','id_card_type','id_number','ssn','dob','gender','selfie_pic'
    ];

}

