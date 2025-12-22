<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPartner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPartner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionPartner query()
 * @mixin \Eloquent
 */
class TransactionPartner extends Model
{
    protected $fillable = [
        'transaction_id','partner_id'
    ];
}
