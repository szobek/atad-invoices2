<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'num','date','pay_mode'
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
