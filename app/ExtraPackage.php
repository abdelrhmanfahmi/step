<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraPackage extends Model
{
    protected $table = "extrapackages";
    protected $fillable = ['name_ar' , 'name_en' , 'price'];
}
