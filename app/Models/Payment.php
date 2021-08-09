<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use Notifiable;

    protected $primaryKey = 'payment_id';
    protected $table = 'payments';

    public $timestamps = true; //set time to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_method',
        'payment_status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'payment_id');
    }
}
