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
	
	public static function getMain($showHidden = false)
	{
		$menus = Menu::whereNull('parent_id');

		if(!$showHidden) {
			$menus->where('visible', true);
		}

		return $menus->orderBy('order')->get();
	}

	public function getChildren($showHidden = false)
	{
		$menus =  Menu::where('parent_id', $this->id);

		if(!$showHidden) {
			$menus->where('visible', true);
		}

		return $menus->orderBy('order')->get();
	}

	public function getURL()
	{
		$target = explode(':', $this->target, 2);

		$type = $target[0];

		switch($type) {
			case 'dynamic':
				return '/page/'.$target[1];
				break;
			case 'calendar':
				return '/calendar';
				break;
			case 'competitions':
				return '/competitions';
				break;
			case 'link':
				return $target[1];
				break;
			default:
				return '/';
		}
	}

	public function getType()
	{
		return explode(':', $this->target, 2)[0];
	}

	public function getTarget()
	{
		$res = explode(':', $this->target, 2);

		return end($res); // Just take the last entry
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

	public static function minOrder($parent_id = null)
	{
		if($parent_id === null) {
			$item = Menu::whereNull('parent_id')->orderBy('order', 'ASC')->first();
		} else {
			$item = Menu::where('parent_id', $parent_id)->orderBy('order', 'ASC')->first();
		}

		return isset($item->order) ? $item->order : 0;
	}

	public static function maxOrder($parent_id = null)
	{
		if($parent_id === null) {
			$item = Menu::whereNull('parent_id')->orderBy('order', 'DESC')->first();
		} else {
			$item = Menu::where('parent_id', $parent_id)->orderBy('order', 'DESC')->first();
		}

		return isset($item->order) ? $item->order : 0;
	}

	public static function normalizeOrder($parent_id = null)
	{
		if($parent_id !== null) {
			$items = Menu::where('parent_id', $parent_id)->orderBy('order', 'ASC')->get();
		} else {
			$items = Menu::whereNull('parent_id')->orderBy('order', 'ASC')->get();
		}

		if(!isset($items)) {
			return;
		}

		$i = 0;
		foreach($items as $item) {
			$item->order = $i;
			$item->save();
			static::normalizeOrder($item->id);
			$i++;
		}
	}
}
