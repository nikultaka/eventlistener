<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CommunityCategory extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'community_categorys';
    protected $fillable = [
        'name','status','created_at','updated_at'
    ];

    public function messages() {
       return $this->hasMany('App\Models\Messages');
    }

} 
