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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::middleware(['auth'])->group(function () { //для захисту сторінок від незареєстрованих користувачів

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoriesController');

Route::resource('tags', 'TagsController');

//Route::get('categories/{category}') - недоробив

Route::resource('posts', 'PostsController')->middleware(['auth']); // можна так одну сторінку захистити

Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');

Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-posts');

Route::get('allcats', 'PostsController@allcats'); //для показування всіх категорій

Route::get('category/{category}', 'PostsController@category'); //для сортування категорій

});

Route::get('users', 'UsersController@index');

Route::get('singletest', function () {
    return view('showblogpost.singletest');
});

/*Route::get('register', function () {
    return view('welcome'); //можливо хочу захистити реєстрацію (вкинути в групу)
});*/

//Route::get('{slug}', 'PostsController@show');

/*Route::get('/categories/new', 'HomeController@category')->name('home');

Route::get('/categories/admin', 'HomeController@categoriesAdmin')->name('home');

Route::get('/showUsers', 'HomeController@showUsers')->name('home');

Route::post('categories/store-name', 'HomeController@store')->name('home');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('allposts', 'FrontEndController@posts');

Route::get('{slug}', 'FrontEndController@onepost');

Route::get('allproducts', 'FrontEndController@products');

/*Галерея*/

Route::get('posts/{postId}/admin/gallery','GalleryController@index');

/*Роути для інших тем*/

Route::get('projects/colorlib1', function(){
	return view('projects.colorlib_1.index');
});

Route::get('projects/colorlib2', function(){
	return view('projects.colorlib_2.index');
});

Route::get('projects/colorlib2_iframe', function(){
	return view('projects.colorlib_2.index_iframe');
});

/*Роути для інших тем*/