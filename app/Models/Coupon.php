<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use Notifiable, SoftDeletes;

    protected $primaryKey = 'coupon_id';
    protected $table = 'coupons';

    public $timestamps = true; //set time to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'coupon_time',
        'coupon_number',
        'coupon_condition'
    ];
}
