<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tax',
        'country',
        'zip',
        'city',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->zip . ' ' . $this->city . ', ' . $this->address;
    }
}
