<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::group([
    'prefix' => 'dashboard',
    'namespace' => 'App\Http\Controllers\Dashboard',
    'as' => 'dashboard.',
], function ($router) {

    Route::get('/', 'IndexController')->name('index');
    Route::get('/profile', 'ProfileController@edit')->name('profile');
    Route::post('/profile/save', 'ProfileController@save')->name('profile.save');

    Route::resource('medias', 'MediaController');
    Route::get('/galleries', 'GalleryController@getMedias')->name('galleries');

    Route::post('/upload-file', 'UploadController@uploadFile')->name('file.upload');
    Route::post('/remove-file', 'UploadController@removeFile')->name('file.remove');

    Route::resource('skills', 'SkillController');
});
