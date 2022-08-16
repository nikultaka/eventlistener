<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'category';
    protected $fillable = [
        'name','status','created_at','updated_at'
    ];

    public function discover() {
      return $this->hasMany('App\Models\Discover');
    }

}
