<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Province extends Model
{
    use Notifiable;

    protected $primaryKey = 'province_id';
    protected $table = 'provinces';

    public $timestamps = false; //set false to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_name',
        'type',
    ];

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }

    public function feeships()
    {
        return $this->hasMany(Feeship::class, 'province_id');
    }
}
