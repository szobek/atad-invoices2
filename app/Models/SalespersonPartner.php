<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalespersonPartner extends Model
{
    protected $fillable = [
        "partner_id",
        "user_id"
    ];

    public function partner()
    {
        return $this->belongsTo(
            Partner::class,
            'partner_id',
            'id'
        );
    }
}
