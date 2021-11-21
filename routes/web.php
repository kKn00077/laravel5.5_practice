<?php

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

Route::get('/hello', function(){
    return view('hello');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); // 이름을 이용해 간편하게 페이지 이동이 가능
Route::get('/home/show', 'HomeController@show')->name('home.show');

Route::resource('photos', 'PhotoController');

Route::get('/create', 'BlogController@create')->name('blogs.create');
Route::post('/create', 'BlogController@store')->name('blogs.store');

Route::get('users/{id}', 'UserDetailController@show')->name('user.detail.show');

Route::get('/blogs/{id}', 'BlogController@show')->name('blogs.show');

Route::get('/comments', 'CommentController@index')->name('comments.index');;
Route::post('/comments', 'CommentController@store')->name('comments.store');

Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');

Route::get('/test', function () {
    $collection = collect(['gyuna', 'eighttwofive', null, ''])->map(function($name){ // 값을 하나씩 돌며 대문자로 변경
        return strtoupper($name);
    })->reject(function($name) { // 필터링
        return empty($name); // 빈값일 경우(null이나 공백 제거) 제거 = True가 반환되는 값이면 제거한다 
    });

    dd($collection);
});

Route::get('/middleware/test', function () {
    dd('미들웨어 테스트');
})->middleware('checkage');