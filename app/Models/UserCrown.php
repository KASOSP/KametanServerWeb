<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserCrown
 *
 * @property int $id
 * @property int $user_id
 * @property int $type
 * @property string $color
 * @property string $data
 * @property int $expired_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown whereUserId($value)
 * @mixin \Eloquent
 * @property string $expires_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserCrown whereExpiresAt($value)
 */
class UserCrown extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    public static $typeToCrownCharMap = [
        "♔", "♕", "♖", "♗", "♘", "♙", "♚", "♛", "♜", "♝", "♞", "♟"
    ];

    public static $mcToHtmlColorMap = [
        'a' => '#55FF55',
        'b' => '#55FFFF',
        'c' => '#FF5555',
        'd' => '#FF55FF',
        'e' => '#FFFF55',
        'f' => '#FFFFFF',
    ];

    public function getCrownText(){
        return '<span style="color:'.self::$mcToHtmlColorMap[$this->color].';font-weight: normal;font-size: 145%">'.self::$typeToCrownCharMap[$this->type].'</span>';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
