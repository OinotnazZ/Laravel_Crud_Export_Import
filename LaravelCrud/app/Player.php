<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
        'retired'
    ];
    use SoftDeletes;
}
