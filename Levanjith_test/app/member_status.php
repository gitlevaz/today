<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member_status extends Model
{
    protected $fillable = ['name'];


    // function members(){
    //     return $this->belongsTo('App\member','id','member_status_id');
    // }   
    
    function member(){
        return $this->hasMany(member::class);
    }  
}

 