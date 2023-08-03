<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ComponentCategory;

class CategoryController extends Controller {
	public function all()
	{
		return ComponentCategory::with('components')
			->get();
	}
}