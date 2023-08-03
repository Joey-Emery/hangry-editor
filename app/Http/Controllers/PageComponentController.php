<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PageComponent;
use Illuminate\Http\Request;

class PageComponentController extends Controller {
	public function update(PageComponent $component, Request $request)
	{
		$component->contents = json_encode($request->contents);
		$component->save();

		return $component;
	}

	public function delete(PageComponent $component)
	{
		$component->delete();

		return ['success' => true];
	}
}