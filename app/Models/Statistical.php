<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Statistical extends Model
{
    use Notifiable;

    protected $primaryKey = 'statistical_id';
    protected $table = 'statisticals';

    public $timestamps = false; //set time to false
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_date',
        'sales',
        'profit',
        'quantity',
        'total_order'
    ];
}
