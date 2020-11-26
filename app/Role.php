<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

  /**
   * Array with all the roles for the application
   *
   * @var array
   */
  const roles = [
    0 => [
		'name' => 'user',
		'admin' => false,
	],
	7 => [
		'name' => 'content',
		'admin' => true,
	],
	8 => [
		'name' => 'board',
		'admin' => true,
	],
    9 => [
		'name' => 'sysadmin',
		'admin' => true,
	],
  ];

  /**
   * Returns the role. Defaults to standard user.
   *
   * @param $roleId
   * @return The role corresponding to the standard user
   */
  public static function getRole($roleId)
  {
    if(static::roles[$roleId] !== null) {
      return static::roles[$roleId];
    }
    return static::roles[0];
  }
}
