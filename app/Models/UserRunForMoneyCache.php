<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserRunForMoneyCache
 *
 * @property int $user_id
 * @property int $clear
 * @property int $death
 * @property int $catch
 * @property int $surrender
 * @property int $revival
 * @property int $max_result_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache whereCatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache whereClear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache whereDeath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache whereMaxResultId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache whereRevival($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache whereSurrender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRunForMoneyCache whereUserId($value)
 * @mixin \Eloquent
 */
class UserRunForMoneyCache extends Model
{
    use HasFactory;

    public const CREATED_AT = null;

    protected $primaryKey = 'user_id';

    protected $fillable = ['user_id', 'clear', 'death', 'catch', 'surrender', 'revival', 'max_result_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
