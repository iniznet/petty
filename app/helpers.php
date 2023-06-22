<?php

use Petty\Routing\Route;
use Petty\View\View;

/**
 * Helper functions for the application.
 * 1. dd()
 * 2. view()
 * 3. redirect()
 * 4. back()
 * 6. config()
 * 7. env()
 * 8. request()
 * 9. session()
 * 10. auth()
 * 12. csrf_token()
 * 13. csrf_field()
 * 14. method_field()
 * 15. old()
 * 17. route()
 * 18. asset()
 * 19. public_path()
 * 20. storage_path()
 * 21. base_path()
 * 22. app_path()
 */

function dd(mixed ...$data): void
{
	printf('<pre>%s</pre>', print_r($data, true));
	exit;
}

function view(string $view, array $data = []): void
{
	View::render($view, $data);
}

function asset(string $path): string
{
	// parse PUBLIC_PATH/dist/manifest.json and return the path to the asset from assets folder
	$manifest = json_decode(file_get_contents(PUBLIC_PATH . '/dist/manifest.json'), true);
	return $_ENV['APP_URL'] . '/dist/' . $manifest[$path]['file'];
}

function route(string $method, string $name, array $params = []): string
{
	$method = strtoupper($method);
	$name = str_replace('.', '/', $name);
	$routes = Route::getRoutes();

	/**
	 * $routes data:
	 * [
		'get' => [
			'login' => [
				'action' => 'App\Http\Controllers\LoginController@index',
				'middleware' => []
			]
		]
	]
	 */

	if (!isset($routes[$method][$name])) {
		throw new \Exception('Route not found');
	}

	return '/' . $routes[$method][$name]['uri'] . ($params ? '?' . http_build_query($params) : '');
}

function redirect(string $path): void
{
	$route = route('get', $path);
	header('Location: ' . $route);
}
