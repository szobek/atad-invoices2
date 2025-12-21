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
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class,
        'transaction_partners', 
        'partner_id', 
        'transaction_id');
    }
}
