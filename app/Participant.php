<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
	// Properties for all models
	protected $table = 'participants';
	public $incrementing = false;

	public function user()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function me()
	{
		return (\Auth::check() && $this->user_id == \Auth::user()->id);
	}
}
