<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Discover extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'discovers';
    protected $fillable = [
        'name','description','category_id','subcategory_id','is_featured','status','created_at','updated_at','type_of_card','is_blog','text_color','background_color'
    ];

    public function category() {
      return $this->belongsTo('App\Models\Category','category_id');
    }

    public function subcategory() {
      return $this->belongsTo('App\Models\SubCategory','subcategory_id');
    }
 
}
