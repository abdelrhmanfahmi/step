<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = "packages";
    protected $fillable = ['name_ar' , 'name_en' , 'price' , 'user_ar' , 'user_en'];

    public function services(){
        return $this->hasMany('App\PackagesServices');
    }
}
