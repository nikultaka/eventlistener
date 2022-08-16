<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SubCategory extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'subcategorys';
    protected $fillable = [
        'category_id','name','status','created_at','updated_at'
    ];

    public function discover() {
      return $this->hasMany('App\Models\Discover');
    }

}
