<?php

use App\Article;
use App\Review;
use App\Story;
use Illuminate\Support\Facades\Route;
// use RealRashid\SweetAlert\Facades\Alert;

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

    return view('welcome', [
        'articles' => Article::latest()->get()->take(3),
        'slider_articles' => Article::latest()->get(),
        'stories' => Story::latest()->get()->take(3),
        'reviews' => Review::latest()->get()->take(3)
    ]);
});



/**
 * Contact us 
 
 **/
Route::post('/contact', 'ContactController@store')->middleware('auth')->name('contact');
/**
 * Articles route group 
 * 
 * */
Route::group(['prefix' => 'habari/', 'namespace' => 'Articles'], function () {

    Route::get('', 'ArticlesController@index')->name('articles');
    Route::get('create', 'ArticlesController@create')->name('new-article')->middleware('auth');
    Route::get('{article:slug}', 'ArticlesController@show')->name('show-article');
    Route::post('{article:slug}/comments', 'ArticlesController@saveComment')->name('post-comment')->middleware('auth');
    Route::post('', 'ArticlesController@store')->name('store-article');
});

Route::group(['prefix' => 'makala/', 'namespace' => 'Reviews'], function () {

    Route::get('', 'ReviewsController@index')->name('reviews');
    Route::get('create', 'ReviewsController@create')->name('new-review')->middleware('auth');
    Route::get('{review:slug}', 'ReviewsController@show')->name('show-review');
    Route::post('{review:slug}/comments', 'ReviewsController@saveComment')->name('post-comment')->middleware('auth');
    Route::post('', 'ReviewsController@store')->name('store-review');
});

/**
 * Stories route group 
 * 
 * */
Route::group(['prefix' => 'hadithi/', 'namespace' => 'Stories'], function () {

    Route::get('', 'StoriesController@index')->name('stories');
    Route::get('create', 'StoriesController@create')->name('new-story')->middleware('auth');
    Route::get('{story:slug}', 'StoriesController@show')->name('show-story');
    Route::post('', 'StoriesController@store')->name('store-story');
    Route::post('', 'StoriesController@store')->name('store-story');
});

//Profiles
Route::group(['prefix' => 'profiles', 'namespace' => 'Api\Users'], function () {

    Route::get('{user:name}', 'ProfilesController@show')->name('member-profile');
    Route::post('', 'ProfilesController@store')->name('save-profile');
    Route::get('', 'ProfilesController@index');
});

//quotes
Route::group(['prefix' => 'ushairi/', 'namespace' => 'Poems'], function () {

    Route::get('', 'PoemsController@index')->name('poems');
    Route::get('create', 'PoemsController@create')->name('new-poem')->middleware('auth');
    Route::get('{poem:slug}', 'PoemsController@show')->name('show-poem');
    Route::post('', 'PoemsController@store')->name('store-poem')->middleware('auth');
});

//Quotes
Route::group(['prefix' => 'nasaha/', 'namespace' => 'Quotes'], function () {

    Route::get('', 'QuotesController@index')->name('quotes');
    Route::get('create', 'QuotesController@create')->name('new-quote')->middleware('auth');
    Route::get('{quote}', 'QuotesController@show')->name('show-quote');
    Route::post('', 'QuotesController@store')->name('store-quote')->middleware('auth');
});

/**
 * Translate work routes
 */

Route::group(['prefix' => 'ofisi/kazi/tafsiri-kazi', 'namespace' => 'Translations'], function () {

    Route::get('', 'TranslateRequestController@index')->name('translate-index');
    Route::get('/submit-new-material', 'TranslateRequestController@create')->name('submit-work');
    Route::get('{translateRequest:sub_url}', 'TranslateRequestController@show')->name('show-work');

    Route::post('/submit-new-material', 'TranslateRequestController@store')->name('save-work');
    Route::post('{translateRequest:sub_url}/comments', 'TranslateRequestCommentController@store')->name('save-comment');
    Route::post('{translateRequest:sub_url}/invitations', 'TranslateRequestInvitationsController@store')->name('invite-member');
    Route::post('{translateRequest:sub_url}/file', 'TranslateRequestFilesController@update')->name('add-file');
});

Route::get(
    'dashboards/{user:name}',
    'DashboardsController@index'
)->name('dashboard');

Auth::routes();
