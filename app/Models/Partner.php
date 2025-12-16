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
        return $this->belongsToMany(
            Transaction::class,     // Kivel kapcsolódik?
            'transaction_partners', // Mi a köztes tábla?
            'partner_id',           // Mi az ÉN azonosítóm a köztes táblában?
            'transaction_id'        // Mi a MÁSIK azonosítója a köztes táblában?
        );
    }
}
