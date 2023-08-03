<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Page;
use App\Models\PageComponent;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller {
	public function single(Page $page)
	{
		return $page->load('components');
	}

	public function create(Request $request)
	{
		if(!$request->has('name') || !$request->has('project_id')) return app()->abort(403);

		$page = new Page;
		$page->project_id = $request->project_id;
		$page->name = $request->name;
		$page->save();

		return $page;
	}

	public function createComponent(Page $page, Request $request)
	{
		$component = Component::findOrFail($request->component_id);

		$page_component = new PageComponent;
		$page_component->page_id = $page->id;
		$page_component->component_id = $component->id;
		$page_component->render_order = $page->getNextRenderOrder();

		if($component->default_contents) $page_component->contents = $component->default_contents;

		$page_component->save();

		return $page;
	}

	public function updateOrder(Page $page, Request $request)
	{
		foreach($request->all() as $id => $render_order) {
			$component = PageComponent::find($id)->update(['render_order' => $render_order]);
		}

		return ['success' => true];
	}

	public function delete(Page $page)
	{
		PageComponent::where('page_id', $page->id)->delete();
		$page->delete();

		return ['success' => true];
	}
}