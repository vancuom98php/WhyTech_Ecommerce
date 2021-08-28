<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class District extends Model
{
    use Notifiable;

    protected $primaryKey = 'district_id';
    protected $table = 'districts';

    public $timestamps = false; //set false to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'district_name',
        'type',
        'province_id'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id');
    }

    public function feeships()
    {
        return $this->hasMany(Feeship::class, 'district_id');
    }
}
