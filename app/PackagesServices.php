<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagesServices extends Model
{
    protected $table = "packages_services";
    protected $fillable = ['service_ar' , 'service_en' , 'package_id'];

    public function packages(){
        return $this->belongsTo('App\Package' , 'package_id');
    }
}
