<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

	protected $fillable=array('category_id','title','describtion','price','availablity','image');

	public static $rules=array(
			'category_id' => 'required|integer',
			'title' => 'required|min:3',
			'describtion' => 'required|min:20',
			'price' => 'required|numeric',
			'availablity' => 'integer',
			'image' => 'required|image|mimes:jpeg,bmp,png',

		);

	public function category(){
		return $this->belongTo('Category');
	}
}
