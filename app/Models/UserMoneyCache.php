<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserMoneyCache
 *
 * @property int $user_id
 * @property int $amount
 * @property int $max_transaction_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyCache newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyCache newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyCache query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyCache whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyCache whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyCache whereMaxTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMoneyCache whereUserId($value)
 * @mixin \Eloquent
 */
class UserMoneyCache extends Model
{
    use HasFactory;

    public const CREATED_AT = null;

    protected $primaryKey = 'user_id';

    protected $fillable = ['user_id', 'amount', 'max_transaction_id'];

}
