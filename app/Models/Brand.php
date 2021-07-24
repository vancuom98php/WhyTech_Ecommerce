<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use Notifiable, SoftDeletes;

    protected $primaryKey = 'brand_id';
    protected $table = 'brands';

    public $timestamps = true; //set time to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_name',
        'brand_slug',
        'brand_desc',
        'brand_status'
    ];
}
