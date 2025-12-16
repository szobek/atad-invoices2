<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'num','date','pay_mode'
    ];
    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'transaction_partners', 'transaction_id', 'partner_id');
    }
}
