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
Route::get('/', 'SiteController@create');
Route::get('/single/service/{nb}', 'SiteController@servicesinglecreate');
Route::get('/single/blog/{nb}', 'SiteController@blogsinglecreate');
Route::get('/contact', 'SiteController@contactcreate');
Route::get('/services', 'SiteController@servicescreate');
Route::get('/about', 'SiteController@aboutcreate');
Route::get('/blog', 'SiteController@blogcreate');
Route::get('/gallery', 'SiteController@gallerycreate');
Route::get('/partenaires', 'SiteController@partenairescreate');
Route::get('/actualites', 'SiteController@actualitescreate');

Route::get('/master/logout', 'adminController@logout');

Route::group([
    'middleware' => 'App\Http\Middleware\NoAuth'
], function(){
    Route::get('/master', 'adminController@create');
    Route::get('/master/register', 'adminController@createRegister');
    Route::post('/master', 'adminController@auth');
    Route::post('/master/register', 'adminController@auth');
});

Route::group([
    'middleware' => 'App\Http\Middleware\Auth'
], function(){
    // Acceuil
    Route::get('/master/acceuil', 'adminController@cpanel');

    // Ajouter Admin
    Route::get('/master/adda', 'adminController@addcreate');
    Route::post('/master/adda', 'adminController@addstorage');
    Route::get('/master/perso', 'adminController@personcreate');

    // Ajouter Admin
    Route::get('/master/navires', 'adminController@navires_create');
    Route::post('/master/navires', 'adminController@navires_storage');
    Route::get('/master/navires/add', 'adminController@navires_add_create');
    Route::post('/master/navires/add', 'adminController@navires_add_storage');
    Route::get('/master/navires/edit', 'adminController@navires_edit_create');
    Route::post('/master/navires/edit', 'adminController@navires_edit_storage');
    Route::get('/master/navires/profiles', 'adminController@navires_profiles_create');
    Route::post('/master/navires/profiles', 'adminController@navires_profiles_storage');

    Route::POST('/master/upload', 'adminController@ajaxupload');

    //Ajouter Post
    Route::get('/master/ajtpost', 'PostController@ajtpostcreate');
    Route::post('/master/ajtpost', 'PostController@ajtpoststore');
    Route::post('/master/postuplod', 'PostController@postupload');
    Route::get('/master/imgsup', 'PostController@imgsup');
    Route::get('/master/post/affichage', 'PostController@postaffichage');
    Route::get('/master/post/affichage/{nb}', 'PostController@postaffichagedetaille');

    //Modifier supprimer poste
    Route::get('/master/post/edit', 'PostController@editaffichagecreate');
    Route::get('/master/post/edit/{nb}', 'PostController@editing');
    Route::post('/master/post/edit/{nb}', 'PostController@editingstore');
    Route::get('/master/post/deleting', 'PostController@postdeleting');
    Route::get('/master/post/deletingDB', 'PostController@postdeletingDB');
    Route::get('/master/post/activing', 'PostController@postactiving');
    Route::get('/master/post/defaulting', 'PostController@postdefaulting');
    Route::get('/master/post/sliding', 'PostController@postsliding');

    // ****************** Générique  *********************** //
    Route::get('/master/{page}', 'adminController@retour');
});

