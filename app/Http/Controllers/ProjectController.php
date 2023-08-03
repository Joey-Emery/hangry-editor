<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
	public function all()
	{
		return Project::with('pages.components')
			->orderBy('created_at', 'DESC')
			->get();
	}

	public function single(Project $project)
	{
		return $project->load('pages.components');
	}

	public function create(Request $request)
	{
		$project = new Project;
		$project->name = $request->name;
		$project->save();

		return $project;
	}
}