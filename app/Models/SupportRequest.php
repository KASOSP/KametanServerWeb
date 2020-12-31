<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SupportRequest
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $username
 * @property string|null $input_username
 * @property string $email
 * @property int $not_required_reply
 * @property int $content
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest whereInputUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest whereNotRequiredReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportRequest whereUsername($value)
 * @mixin \Eloquent
 */
class SupportRequest extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;
}
