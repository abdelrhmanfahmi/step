<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscripeExtraPackage extends Model
{
    protected $table = "subscripe_extra_package";
    protected $fillable = ['extra_package_id' , 'subscripe_id'];
}
