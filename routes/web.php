<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ChapterController;
use App\Http\Middleware\Authenticate;
use Petty\Routing\Route;

Route::get('/', function () {
	return view('index');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(Authenticate::class)->group(function () {
	Route::get('/admin', function () {
		return view('admin.index');
	});
	Route::get('/logout', [LoginController::class, 'logout']);

	Route::get('/admin/series', [SeriesController::class, 'index']);
	Route::post('/admin/series', [SeriesController::class, 'store']);
	Route::post('/admin/series/get', [SeriesController::class, 'get']);
	Route::post('/admin/series/update', [SeriesController::class, 'update']);
	Route::get('/admin/series/destroy', [SeriesController::class, 'destroy']);

	Route::get('/admin/groups', [GroupController::class, 'index']);
	Route::post('/admin/groups', [GroupController::class, 'store']);
	Route::post('/admin/groups/get', [GroupController::class, 'get']);
	Route::post('/admin/groups/update', [GroupController::class, 'update']);
	Route::get('/admin/groups/destroy', [GroupController::class, 'destroy']);

	Route::get('/admin/chapters', [ChapterController::class, 'index']);
	Route::post('/admin/chapters', [ChapterController::class, 'store']);
	Route::post('/admin/chapters/get', [ChapterController::class, 'get']);
	Route::post('/admin/chapters/update', [ChapterController::class, 'update']);
	Route::get('/admin/chapters/destroy', [ChapterController::class, 'destroy']);
});