<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $xuid
 * @property string $username
 * @property string $ip_address
 * @property string $save_data
 * @property string|null $password
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserCartItem[] $cartItems
 * @property-read int|null $cart_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserCrown[] $crowns
 * @property-read int|null $crowns_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserLog[] $logs
 * @property-read int|null $logs_count
 * @property-read \App\Models\UserMoneyCache|null $moneyCache
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserMoneyTransaction[] $moneyTransactions
 * @property-read int|null $money_transactions_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\UserRunForMoneyCache|null $runForMoneyCache
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserRunForMoneyResult[] $runForMoneyResults
 * @property-read int|null $run_for_money_results_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserSavedItem[] $savedItems
 * @property-read int|null $saved_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserWebReceivedItem[] $webReceivedItems
 * @property-read int|null $web_received_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSaveData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereXuid($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes that should be visible for arrays.
     *
     * @var array
     */
    protected $visible = [
        'xuid', 'username', 'created_at', 'updated_at',
    ];

    public function cartItems(){
        return $this->hasMany(UserCartItem::class);
    }


    public function crowns(){
        return $this->hasMany(UserCrown::class);
    }

    public function logs(){
        return $this->hasMany(UserLog::class);
    }

    public function moneyTransactions(){
        return $this->hasMany(UserMoneyTransaction::class);
    }

    public function moneyCache(){
        return $this->hasOne(UserMoneyCache::class);
    }

    public function runForMoneyResults(){
        return $this->hasMany(UserRunForMoneyResult::class);
    }

    public function runForMoneyCache(){
        return $this->hasOne(UserRunForMoneyCache::class);
    }

    public function savedItems(){
        return $this->hasMany(UserSavedItem::class);
    }

    public function webReceivedItems(){
        return $this->hasMany(UserWebReceivedItem::class);
    }

    public function getDisplayName(){
        $displayName = "";
        $crowns = $this->crowns()->get();
        if($crowns->count() !== 0){
            foreach($crowns as $crown){
                $displayName .= $crown->getCrownText();
            }
            $displayName .= "";
        }
        $displayName .= $this->username;
        return $displayName;
    }

}
