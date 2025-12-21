<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'num',
        'date',
        'pay_mode',
        'partner_id',
        'amount',
        'comment',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
