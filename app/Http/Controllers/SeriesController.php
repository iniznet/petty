<?php

namespace App\Http\Controllers;

use App\Models\SeriesModel;
use Petty\Auth\Auth;
use Petty\Database\QueryBuilder as DB;

class SeriesController extends BaseController
{
	public function index()
	{
		// get ?search query
		$search = $this->input->get('search');

		if ($search) {
			$series = DB::table('series')->where('title', $search, 'LIKE')->get();
		} else {
			$series = SeriesModel::all();
		}
		
		return view('admin.series', [
			'search' => $search ?: '',
			'series' => $series,
		]);
	}

	public function get()
	{
		$id = $this->input->post('id');
		$series = SeriesModel::find($id);

		return json_encode($series);
	}

	public function store()
	{
		$title = $this->input->post('title');
		$release_year = $this->input->post('release_year');
		$author = $this->input->post('author');
		$artist = $this->input->post('artist');
		$status = $this->input->post('status');

		// validate the request
		$validate = $this->input->validate([
			'title' => ['required' => true],
			'release_year' => ['required' => true],
			'author' => ['required' => true],
			'artist' => ['required' => true],
			'status' => ['required' => true]
		]);

		// if valid, create the series
		if (!$validate->fails()) {
			$user = Auth::user();

			$series = new SeriesModel();
			$series->create([
				'title' => $title,
				'slug' => str_replace(' ', '-', strtolower($title)),
				'release_year' => $release_year,
				'author' => $author,
				'artist' => $artist,
				'status' => $status,
				'author_id' => $user->id,
			]);
		}
		
		return redirect('admin/series');
	}

	public function update()
	{
		$id = $this->input->post('id');

		$title = $this->input->post('title');
		$release_year = $this->input->post('release_year');
		$author = $this->input->post('author');
		$artist = $this->input->post('artist');
		$status = $this->input->post('status');

		// validate the request
		$validate = $this->input->validate([
			'title' => ['required' => true],
			'release_year' => ['required' => true],
			'author' => ['required' => true],
			'artist' => ['required' => true],
			'status' => ['required' => true]
		]);

		// if valid, update the series
		if (!$validate->fails()) {
			(new SeriesModel())->update($id,[
				'title' => $title,
				'slug' => str_replace(' ', '-', strtolower($title)),
				'release_year' => $release_year,
				'author' => $author,
				'artist' => $artist,
				'status' => $status,
			]);
		}
		
		return redirect('admin/series');
	}

	public function destroy()
	{
		$id = $this->input->get('id');
		$series = SeriesModel::find($id);
		
		if ($series) {
			(new SeriesModel())->delete($id);
		}

		return redirect('admin/series');
	}
}