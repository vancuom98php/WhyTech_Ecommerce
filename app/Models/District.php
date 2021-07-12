<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'district_name', 'type', 'provice_id'
    ];
    protected $primaryKey = 'district_id';
 	protected $table = 'districts';
}
