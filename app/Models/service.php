<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'category',
        'price_master',
        'price_top_master',
        'description'
    ];
}