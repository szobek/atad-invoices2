<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'num','date','pay_mode'
    ];
}
