<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

	/**
	 * Rules for validation
	 */
	const validationRules = [
		'name'	=> 'required|max:255',
		'email'	=> 'required|email|max:255',
		'role' 	=> 'required',
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRole()
    {
      return Role::getRole($this->role);
    }

	public function getRoleName()
	{
		return $this->getRole()['name'];
	}

	public function canManage()
	{
		return $this->getRole()['admin'];
	}
}
