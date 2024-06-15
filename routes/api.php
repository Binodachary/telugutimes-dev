<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories',[ApiController::class,'categories']);
Route::get('categories/{category}',[ApiController::class,'categories']);
Route::get('categories/{category}/news',[ApiController::class,'categoryNews']);
Route::get('news-folders',[ApiController::class,'newsFolders']);
Route::get('news-folders/{newsFolder}',[ApiController::class,'newsFolders'])->name('api-news-folder');
Route::get('epapers',[ApiController::class,'epapers']);
Route::get('epaper',[ApiController::class,'epaper']);
Route::get('epapers/{epaper}',[ApiController::class,'epapers']);
Route::get('news-article/{news}',[ApiController::class,'getArticle']);
Route::get('news/highlighted',[ApiController::class,'highlightNews']);
Route::get('gallery/categories',[ApiController::class,'galleryCategories']);
Route::get('gallery/photos/{gallery}',[ApiController::class,'gallery']);
Route::get('gallery/{category}',[ApiController::class,'galleryCategory']);
Route::get('gallery/{category}/{sub}',[ApiController::class,'gallerySub']);
Route::get('ads',[ApiController::class,'advertisements']);

//present updating
Route::get('dashboard',[ApiController::class,'dashboard'])->name('dashboardApi');