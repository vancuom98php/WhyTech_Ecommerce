<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
	use HasApiTokens, Notifiable;

	public $timestamps = true; //set time to true
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'admin_email', 'admin_password', 'admin_name', 'admin_phone', 'admin_avatar', 'provider_id'
	];
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
	protected $primaryKey = 'admin_id';
	protected $table = 'admin';

	public function roles()
	{
		return $this->belongsToMany('App\Models\Role', 'admin_roles', 'admin_id', 'role_id');
	}

	public function getAuthPassword()
	{
		return $this->admin_password;
	}

	public function hasAnyRoles($roles)
	{
		return null !==  $this->roles()->whereIn('role_name', $roles)->first();
	}
	public function hasRole($role)
	{
		return null !==  $this->roles()->where('role_name', $role)->first();
	}
}
