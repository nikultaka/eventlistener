<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Industries extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'industries';
    protected $fillable = [
        'user_id','name','logo','banner_image','is_featured','progress_details','total_hours','status','created_at','updated_at'
    ];

    public function users() {
      return $this->belongsTo('App\Models\User','user_id');
    }

    public function investment() {
      return $this->hasMany('App\Models\Investment','industry_id');
    }    
}
