<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserCartItem
 *
 * @property int $id
 * @property int $item_id
 * @property int $item_meta
 * @property int $amount
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem whereItemMeta($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property int $product_id
 * @property int $count
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCartItem whereUserId($value)
 */
class UserCartItem extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    protected $fillable = ['user_id', 'product_id', 'count'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
