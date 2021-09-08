<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdminRole extends Model
{
    use Notifiable;

    protected $primaryKey = 'admin_roles_id';
    protected $table = 'admin_roles';

    public $timestamps = false; //set time to true
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
