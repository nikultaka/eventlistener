<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserInfo extends Model
{
    protected $primaryKey = 'user_info_id';
    protected $table = 'user_infos';
    protected $fillable = [
        'user_id','networth','grossincome','service_utilized','is_accredited_investor','is_experience_in_financial_and_business','is_accurate_and_complete_answers','is_seasoned_investor','status','accrediate_investor_options','invest_stock','answer_all_question','mnemonics','wallet_address','private_key','id_card_pic','accreditation_number','ckeck_kyc_link','kyc_checked'
    ];

}