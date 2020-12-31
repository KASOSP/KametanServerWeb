<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserLog
 *
 * @property int $id
 * @property int $user_id
 * @property int $type
 * @property string $ip_address
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLog whereUserId($value)
 * @mixin \Eloquent
 */
class UserLog extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    public const TYPE_SERVER_LOGIN = 0;
    public const TYPE_SERVER_LOGOUT = 1;

    public const TYPE_HOMEPAGE_LOGIN = 4;

    protected $fillable = ['user_id', 'type', 'ip_address'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
