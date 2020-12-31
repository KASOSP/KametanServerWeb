<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserMoneyTransaction
 *
 * @property int $id
 * @property int $user_id
 * @property int $type
 * @property int $amount
 * @property string $data
 * @property int $is_valid
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction whereIsValid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyTransaction whereUserId($value)
 * @mixin \Eloquent
 */
class UserMoneyTransaction extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    // 0~9はシステム的な
    public const TYPE_ACCOUNT_INIT = 0;

    // 10~29はアイテム関係
    public const TYPE_ITEM_BUY = 10; // アイテムの購入
    public const TYPE_ITEM_USE = 11; // アイテムの使用による消費
    public const TYPE_ITEM_SOBA = 12; // 年越しそばの使用

    // 30~49はゲーム関係
    public const TYPE_GAME_EVENT = 30; // ゲーム内イベント
    public const TYPE_GAME_CLEAR = 31; // ゲームクリア
    public const TYPE_GAME_CATCH = 32; // 捕獲
    public const TYPE_GAME_SURRENDER = 33; // 自首

    // 50~99は適当
    public const TYPE_REFUND = 50;
    public const TYPE_ADMIN_OPERATION = 99;

    public function user(){
        return $this->belongsTo(User::class);
    }

}
