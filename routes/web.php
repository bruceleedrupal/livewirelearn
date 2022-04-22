<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Livewire\Frontpage;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("upload")->group(function () {
    Route::post("ckimage", [UploadController::class, "ckImage"])->name("upload.ckImage");
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => [
    'auth:sanctum',
    'verified'
]], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pages', function () {
        return view('admin.pages');
    })->name('pages');
});


Route::get('/page/{slug}', Frontpage::class)->name('page.show');

Route::prefix("upload")->group(function () {
    Route::post("ckimage", [UploadController::class, "ckImage"])->name("upload.ckImage");
    Route::post("image", [UploadController::class, "storeImage"])->name("upload.storeImage"); //->middleware("auth");
    Route::post("file", [UploadController::class, "storeFile"])->name("upload.storeFile");
    Route::patch("chunk/{id}", [UploadController::class, "chunk"])->name("upload.chunk");
    Route::get("/", [UploadController::class, "get"])->name("upload.get");
    Route::delete("delete", [UploadController::class, "delete"])->name("upload.delete");
    Route::get("upload", [UploadController::class, "upload"])->name("upload.upload");
});
