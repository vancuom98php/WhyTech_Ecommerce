<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ward extends Model
{
    use Notifiable;

    protected $primaryKey = 'ward_id';
    protected $table = 'wards';

    public $timestamps = false; //set false to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ward_name',
        'type',
        'district_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function feeships()
    {
        return $this->hasMany(Feeship::class, 'ward_id');
    }
}
