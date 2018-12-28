<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        "name","subName","price","description"
    ];
    protected $table = "products";
}
