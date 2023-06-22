<?php

namespace App\Http\Controllers;

use App\Models\GroupModel;
use Petty\Auth\Auth;
use Petty\Database\QueryBuilder as DB;

class GroupController extends BaseController
{
	public function index()
	{
		// get ?search query
		$search = $this->input->get('search');

		if ($search) {
			$groups = DB::table('group')->where('title', $search, 'LIKE')->get();
		} else {
			$groups = GroupModel::all();
		}
		
		return view('admin.groups', [
			'search' => $search ?: '',
			'groups' => $groups,
		]);
	}

	public function get()
	{
		$id = $this->input->post('id');
		$group = GroupModel::find($id);

		return json_encode($group);
	}

	public function store()
	{
		$title = $this->input->post('title');
		$status = $this->input->post('status');
		$url = $this->input->post('url');

		// validate the request
		$validate = $this->input->validate([
			'title' => ['required' => true],
			'status' => ['required' => true],
			'url' => ['required' => true]
		]);

		// if valid, create the group
		if (!$validate->fails()) {
			$user = Auth::user();

			$group = new GroupModel();
			$group->create([
				'title' => $title,
				'slug' => str_replace(' ', '-', strtolower($title)),
				'status' => $status,
				'url' => $url,
				'author_id' => $user->id,
			]);
		}
		
		return redirect('admin/groups');
	}

	public function update()
	{
		$id = $this->input->post('id');

		$title = $this->input->post('title');
		$status = $this->input->post('status');
		$url = $this->input->post('url');

		// validate the request
		$validate = $this->input->validate([
			'title' => ['required' => true],
			'status' => ['required' => true],
			'url' => ['required' => true]
		]);

		// if valid, update the group
		if (!$validate->fails()) {
			(new GroupModel())->update($id,[
				'title' => $title,
				'slug' => str_replace(' ', '-', strtolower($title)),
				'status' => $status,
				'url' => $url,
			]);
		}
		
		return redirect('admin/groups');
	}

	public function destroy()
	{
		$id = $this->input->get('id');
		$group = GroupModel::find($id);
		
		if ($group) {
			(new GroupModel())->delete($id);
		}

		return redirect('admin/groups');
	}
}