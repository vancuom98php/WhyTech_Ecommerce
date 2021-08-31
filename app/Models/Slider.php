<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Slider extends Model
{
    use Notifiable;

    protected $primaryKey = 'slider_id';
    protected $table = 'sliders';

    public $timestamps = false; //set time to false
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slider_name',
        'slider_status',
        'slider_image',
        'slider_desc'
    ];
}
