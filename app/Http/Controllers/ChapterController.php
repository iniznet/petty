<?php

namespace App\Http\Controllers;

use App\Models\ChapterModel;
use App\Models\GroupModel;
use App\Models\SeriesModel;
use Petty\Auth\Auth;
use Petty\Database\QueryBuilder as DB;

class ChapterController extends BaseController
{
	public function index()
	{
		// get ?search query
		$search = $this->input->get('search');

		if ($search) {
			$chapters = DB::table('chapter')->where('title', $search, 'LIKE')->get();
		} else {
			$chapters = ChapterModel::all();
		}

		$series = SeriesModel::all();
		$groups = GroupModel::all();

		foreach ($chapters as &$chapter) {
			$chapter->series = SeriesModel::find($chapter->series_id);
			$chapter->group = GroupModel::find($chapter->group_id);
		}

		return view('admin.chapters', [
			'search' => $search ?: '',
			'chapters' => $chapters,
			'series' => $series,
			'groups' => $groups,
		]);
	}

	public function get()
	{
		$id = $this->input->post('id');
		$chapter = ChapterModel::find($id);

		return json_encode($chapter);
	}

	public function store()
	{
		$title = $this->input->post('title');
		$series = $this->input->post('series');
		$group = $this->input->post('group');
		$url = $this->input->post('url');

		// validate the request
		$validate = $this->input->validate([
			'title' => ['required' => true],
			'series' => ['required' => true],
			'group' => ['required' => true],
			'url' => ['required' => true]
		]);

		// if valid, create the chapter
		if (!$validate->fails()) {
			$user = Auth::user();

			$chapter = new ChapterModel();
			$chapter->create([
				'title' => $title,
				'slug' => str_replace(' ', '-', strtolower($title)),
				'series_id' => $series,
				'group_id' => $group,
				'url' => $url,
				'author_id' => $user->id,
			]);
		}
		
		return redirect('admin/chapters');
	}

	public function update()
	{
		$id = $this->input->post('id');

		$title = $this->input->post('title');
		$series = $this->input->post('series');
		$group = $this->input->post('group');
		$url = $this->input->post('url');

		// validate the request
		$validate = $this->input->validate([
			'title' => ['required' => true],
			'series' => ['required' => true],
			'group' => ['required' => true],
			'url' => ['required' => true]
		]);

		// if valid, update the chapter
		if (!$validate->fails()) {
			(new ChapterModel())->update($id,[
				'title' => $title,
				'slug' => str_replace(' ', '-', strtolower($title)),
				'series_id' => $series,
				'group_id' => $group,
				'url' => $url,
			]);
		}
		
		return redirect('admin/chapters');
	}

	public function destroy()
	{
		$id = $this->input->get('id');
		$chapter = ChapterModel::find($id);
		
		if ($chapter) {
			(new ChapterModel())->delete($id);
		}

		return redirect('admin/chapters');
	}
}