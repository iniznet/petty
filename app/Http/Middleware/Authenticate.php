<?php

namespace App\Http\Middleware;

use Petty\Auth\Auth;

class Authenticate
{
	public function handle($next)
	{
		if (!Auth::check()) {
			return redirect('login');
		}

		return $next();
	}
}