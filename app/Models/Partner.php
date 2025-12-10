<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'tax',
        'country',
        'zip',
        'state',
        'address',
    ];
}
