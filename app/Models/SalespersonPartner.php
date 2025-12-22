<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $partner_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Partner|null $partner
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalespersonPartner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalespersonPartner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalespersonPartner query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalespersonPartner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalespersonPartner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalespersonPartner wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalespersonPartner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SalespersonPartner whereUserId($value)
 * @mixin \Eloquent
 */
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
