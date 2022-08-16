<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'investments';

    public function industries() {
      return $this->belongsTo('App\Models\Industries');
    }
}
