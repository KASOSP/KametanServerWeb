<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\UserSavedItem
 *
 * @property int $user_id
 * @property int $slot
 * @property int $item_id
 * @property int $item_meta
 * @property int $amount
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserSavedItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSavedItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSavedItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSavedItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSavedItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSavedItem whereItemMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSavedItem whereSlot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSavedItem whereUserId($value)
 * @mixin \Eloquent
 */
class UserSavedItem extends Model
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    //protected $primaryKey  = ['user_id', 'slot'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
