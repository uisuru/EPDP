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
Route::group(['prefix' => 'dashboard'], function () {
    Voyager::routes();
});

Route::get('/', 'BlogController@index')->name('home');

Route::group(['middleware'=>'auth'],function (){
    Route::get('upload','FilesController@upload');
    Route::post('/handleUpload','FilesController@handleUpload');
    Route::get('/deleteFile/{id}',['as'=>'deleteFile','uses'=>'FilesController@deleteFile']);
});
//Route::get('upload','Upload@show');

Route::get('uploadd',function (){
   return view('upload.uploadD');
});
Route::get('dropzone', 'dropzoneController@dropzone');
Route::post('dropzone/store', ['as'=>'dropzone.store','uses'=>'dropzoneController@dropzoneStore']);

Route::get('contact',function (){
    return view('contact');
});
Route::get('test',function (){
    return view('test');
});
Route::get('profile','UserController@profile');
Route::get('profile/{data}', 'UserController@showProfile');
Route::post('profileAvatar','UserController@update_Avatar');
Route::post('profileUpdate','UserController@update_Profile');
Route::post('profilePassword','UserController@update_Pass');
Route::post('contact',function (Request $request){
    dd($request);
});
Route::get('post/{slug}',['as'=>'post.slug','uses'=>'BlogController@show']);
//Route::get('post/{baz}', 'BlogController@show1')->where('baz', '.*');  // Anything
Route::post('answers/{post_id}',['uses'=>'AnswerController@store','as'=>'answers.store']);

Auth::routes();

Route::get('/home', 'BlogController@index')->name('home');

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('{slug}', 'PageController@show');
Route::get('page/{slug}', 'PageController@show');