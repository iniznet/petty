<?php

namespace App\Http\Controllers;

use Petty\Auth\Auth;
use Petty\Http\Validator;

class LoginController extends Controller
{
	public function index()
	{
		return view('pages.login');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// validate the request
		$validate = Validator::validate([
			'email' => [
				'required' => true,
			],
			'password' => [
				'required' => true,
			]
			], [
			'email' => $email,
			'password' => $password,
		]);
		// if valid, check if the user exists
		if (!Auth::attempt($email, $password)) {
			return redirect('login');
		} else {
			return redirect('admin');
		}
	}
}