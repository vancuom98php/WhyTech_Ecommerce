<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use Notifiable, SoftDeletes;

    protected $primaryKey = 'order_id';
    protected $table = 'orders';

    public $timestamps = true; //set time to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'shipping_id',
        'payment_id',
        'order_total',
        'order_status',
        'order_coupon',
        'order_feeship',
        'order_code',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    protected static function boot() {
        parent::boot();
    
        static::deleting(function($order_details) {
            $order_details->order_details()->delete();
        });
    }
}
