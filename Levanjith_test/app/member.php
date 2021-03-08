<?php

namespace App;
use App\member_status;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $fillable = ['fname','lname','divition','dob','summery','member_status_id','image'];

    function member(){
        return $this->hasMany('App\member_status','id','member_status_id');
    }   


    
    function member_status(){
        return $this->belongsTo(member_status::class);
    }   
    
}

// public function user()
// {
//     return $this->belongsTo('App\User', 'foreign_key');
// }

