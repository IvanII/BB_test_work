<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id'];

    /**
     * Find first coupon where user_id is null and set give it user
     *
     * @param $userId
     * @return bool
     */
    public static function obtain($userId)
    {
        return self::whereNull('user_id')
                ->first()
                ->update(['user_id' => $userId]);
    }

    /**
     * Find all coupons where user_id is not null and set null to user_id property
     *
     * @return bool|int
     */
    public static function release()
    {
        return self::whereNotNull('user_id')
                ->update(['user_id' => null]);
    }

    /**
     * Relation with user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
