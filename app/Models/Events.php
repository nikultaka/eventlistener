<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
	protected $primaryKey = 'id';
    protected $table = 'events';
    protected $fillable = [
        'name','start_date','end_date','timezone','status','created_at','updated_at'
    ];
    use HasFactory;
}
