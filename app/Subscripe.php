<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscripe extends Model
{
    protected $table = "subscriptions";
    protected $fillable = ['name' , 'email' , 'company_size' , 'package_id'];

    public function notifications_subscripe(){
        return $this->hasMany('App\Notification');
    } 
}
