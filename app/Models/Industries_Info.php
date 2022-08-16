<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Industries_Info extends Model
{
    protected $primaryKey = 'industries_info_id';
    protected $table = 'industries_info';
    protected $fillable = [
        'industries_id','email','website','title','city','sector','cto','problemsolveing','competitive_advantage','traction','description','founddate','annual_revenue','revenue','mvp','socialmedia','status','',
    ];  

}
