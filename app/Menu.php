<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_nl', 'name_en', 'parent_id', 'order', 'target'
    ];

	/**
	 * Rules for validation
	 */
	const validationRules = [
		'name_nl'		=> 'required|max:255',
		'name_en'		=> 'required|max:255',
		'parent_id'		=> '', // TODO: see if there's a nice way to make the validator check this
	];
	
	public static function getMain()
	{
		return Menu::whereNull('parent_id')->orderBy('order')->get();
	}

	public function getChildren()
	{
		return Menu::where('parent_id', $this->id)->orderBy('order')->get();
	}

	public function getURL()
	{
		$target = explode(':', $this->target);

		$type = $target[0];

		switch($type) {
			case 'dynamic':
				return '/page/'.$target[1];
				break;
			case 'calendar':
				return '/calendar';
				break;
			default:
				return '/';
		}
	}

	public function getType()
	{
		return explode(':', $this->target)[0];
	}

	public function name()
	{

		return $this->{'name_'.\App::getLocale()};
	}

	public function updateOrder($parent_id)
	{
		if($parent_id == $this->parent_id) {
			return $this->order;
		}
		return static::availableOrder($parent_id);
	}

	public static function availableOrder($parent_id)
	{
		if($parent_id === null) {
			$item = Menu::whereNull('parent_id')->orderBy('order', 'DESC')->first();
		} else {
			$item = Menu::where('parent_id', $parent_id)->orderBy('order', 'DESC')->first();
		}

		if(isset($item)) {
			return $item->order + 1;
		}

		return 0;
	}
}
