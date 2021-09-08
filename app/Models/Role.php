<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;

    public $timestamps = false; //set time to false
    protected $fillable = [
        'role_name'
    ];
    protected $primaryKey = 'role_id';
    protected $table = 'roles';

    public function admin() {
        return $this->belongsToMany('App\Models\Admin', 'admin_roles', 'role_id', 'admin_id');
    }
}
