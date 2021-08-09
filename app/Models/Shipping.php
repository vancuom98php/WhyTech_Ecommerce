<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shipping extends Model
{
    use Notifiable;

    protected $primaryKey = 'shipping_id';
    protected $table = 'shippings';

    public $timestamps = true; //set time to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shipping_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_notes'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'shipping_id');
    }
}
