<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EpaperController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobileAdController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsFolderController;
use App\Http\Controllers\NewsFolderItemController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WelcomeNoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name("home");
Route::get('/lang/{language}', [HomeController::class, 'home'])->name("homeEng");
Route::get('/home1', [HomeController::class, 'home1'])->name("home1");
Route::get('/home2', [HomeController::class, 'home2'])->name("home2");
Route::get('/article/{news}', [HomeController::class, 'article'])->name("article");
Route::get('/videos', [VideoController::class, 'show'])->name("videos");
Route::get('/videos/{category}', [VideoController::class, 'show'])->name("videosSub");
Route::get('/gallery/{category}', [GalleryController::class, 'category'])->name("gallery.category");
Route::get('/gallery/{category}/{sub}', [GalleryController::class, 'subCategory'])->name("gallery.subCategory");
Route::get('/view-gallery/{gallery}', [GalleryController::class, 'photos'])->name("photos");
Route::get('/epaper/all', [EpaperController::class, 'showAll'])->name("epapers");
Route::get('/epaper2', [EpaperController::class, 'show'])->name("epaper");
Route::get('/epaper', [EpaperController::class, 'show2'])->name("epaperNew");
Route::get('/epaper2/{epaper}', [EpaperController::class, 'show2'])->name("edition");
Route::get('/epaper/{epaper}', [EpaperController::class, 'show'])->name("editionNew");
Route::get('/news-folders', [NewsFolderController::class, 'showAll'])->name("news-folders");
Route::get('/news-folders/{newsFolder}', [NewsFolderController::class, 'show'])->name("news-folder-items");
Route::get('/news-article/{article}', [NewsFolderController::class, 'article'])->name("news-article");
Route::get('/associations', [GalleryController::class, 'associations'])->name("associations");
Route::get('/associations/{association}', [GalleryController::class, 'association'])->name("association");
Route::get('/archives', [NewsController::class, 'archives'])->name("archives");
Route::get('/archives/{year}', [NewsController::class, 'archives'])->name("archives.year");
Route::get('/archived/{news}', [NewsController::class, 'archived'])->name("archived");
Route::get('/advertise-with-us', [HomeController::class, 'advertise'])->name("advertise");
Route::get('/contact-us', [HomeController::class, 'contact'])->name("contact-us");
Route::get('/about-us', [HomeController::class, 'about'])->name("about-us");
Route::get('/sriaditya', [HomeController::class, 'sriaditya'])->name("sriaditya");
Route::get('/poulomi', [HomeController::class, 'poulomi'])->name("poulomi");
Route::get('/aprgroup', [HomeController::class, 'aprgroup'])->name("aprgroup");
Route::get('/tripura', [HomeController::class, 'tripura'])->name("tripura");
Route::get('/devansh', [HomeController::class, 'devansh'])->name("devansh");
Route::get('/privacy', [HomeController::class, 'privacy'])->name("privacy");
Route::get('/terms', [HomeController::class, 'terms'])->name("terms");
Route::get('/copyrights', [HomeController::class, 'copyrights'])->name("copyrights");
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/nats-services-in-covid-time-period', function () {
    return response()->file(public_path('pdfs/NATS-Sevalu-in-Covid-Period.pdf'), ["Content-Disposition", "inline; filename=NATS-Sevalu-in-Covid-Period.pdf"]);
})->name('nats-pdf');
Route::get('/tana-services-in-covid-time-period', function () {
    return response()->file(public_path('pdfs/TANA-Services-on-Covid-19.pdf'), ["Content-Disposition", "inline; filename=TANA-Services-on-Covid-19.pdf"]);
})->name('tana-pdf');

/* Admin Panel */
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name("index");
    Route::get('profile', [AdminController::class, 'profileView'])->name("profile");
    Route::post('profile', [AdminController::class, 'profile'])->name("profileUpdate");
    Route::resource('news', NewsController::class)->except('show');
    Route::resource('users', UserController::class)->except('show');
    Route::resource('videos', VideoController::class)->except('show');
    Route::resource('gallery', GalleryController::class)->except('show');
    Route::resource('epaper', EpaperController::class)->except('show');
    Route::resource('association', AssociationController::class)->except('show');
    Route::resource('ad', AdvertisementController::class)->except('show');
    Route::resource('mobileAd', MobileAdController::class)->except('show');
    Route::resource('welcome', WelcomeNoteController::class)->except('show');
    Route::resource('subscriber', SubscriberController::class)->except('store');
    Route::resource('category', CategoryController::class)->except('category');
    Route::resource('news-folder', NewsFolderController::class)->except('show');
    Route::resource('news-folder.news-folder-items', NewsFolderItemController::class)->except('show');
    Route::get("news/status/{news}", [NewsController::class, 'status'])->name('news.status');
    Route::get("ad/status/{ad}", [AdvertisementController::class, 'status'])->name('ad.status');
    Route::get("users/status/{user}", [UserController::class, 'status'])->name('users.status');
    Route::get("mobileAd/status/{mobileAd}", [MobileAdController::class, 'status'])->name('mobileAd.status');
    Route::get("welcome/status/{welcome}", [WelcomeNoteController::class, 'status'])->name('welcome.status');
    Route::get("category/status/{category}", [CategoryController::class, 'status'])->name('category.status');
});

require __DIR__ . '/auth.php';
Route::get('/{category}', [CategoryController::class, 'category'])->where('category', '.*')->name("categoryNews");
