<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserWebReceivedItem
 *
 * @property int $id
 * @property int $user_id
 * @property int $type
 * @property int $item_id
 * @property int $item_meta
 * @property int $amount
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem whereItemMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWebReceivedItem whereUserId($value)
 * @mixin \Eloquent
 */
class UserWebReceivedItem extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    public const TYPE_SHOP_PURCHASE = 0;
    public const TYPE_LOGIN_BONUS = 1;

    protected $fillable = ['user_id' , 'type', 'item_id', 'item_meta', 'amount'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
