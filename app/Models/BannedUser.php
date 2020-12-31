<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BannedUser
 *
 * @property int $id
 * @property int $user_id
 * @property string $xuid
 * @property string $username
 * @property string $ip_address
 * @property int $expiration_date
 * @property string $enforcer_sign
 * @property string $reason
 * @property int $is_valid
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereEnforcerSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereIsValid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BannedUser whereXuid($value)
 * @mixin \Eloquent
 */
class BannedUser extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;
}
