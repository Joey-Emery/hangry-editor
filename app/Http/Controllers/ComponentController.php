<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Component;

class ComponentController extends Controller {
	public function all()
	{
		return Component::with('category')
			->get();
	}
}