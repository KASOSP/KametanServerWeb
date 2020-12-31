<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RunForMoneyEntry
 *
 * @property int $id
 * @property string $information
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|RunForMoneyEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RunForMoneyEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RunForMoneyEntry query()
 * @method static \Illuminate\Database\Eloquent\Builder|RunForMoneyEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RunForMoneyEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RunForMoneyEntry whereInformation($value)
 * @mixin \Eloquent
 */
class RunForMoneyEntry extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;
}
