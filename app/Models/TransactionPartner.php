<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionPartner extends Model
{
    protected $fillable = [
        'transaction_id','partner_id'
    ];
}
