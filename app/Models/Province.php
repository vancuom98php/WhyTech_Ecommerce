<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'province_name', 'type'
    ];
    protected $primaryKey = 'provice_id';
 	protected $table = 'provinces';
}
