<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserRunForMoneyResult
 *
 * @property int $id
 * @property int $user_id
 * @property int $run_for_money_id
 * @property int $clear
 * @property int $death
 * @property int $catch
 * @property int $surrender
 * @property int $revival
 * @property int $is_valid
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereCatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereClear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereDeath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereIsValid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereRevival($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereRunForMoneyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereSurrender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyResult whereUserId($value)
 * @mixin \Eloquent
 */
class UserRunForMoneyResult extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
