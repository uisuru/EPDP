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
Route::group(['prefix' => 'admin'], function () {
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
Route::post('contact',function (Request $request){
    dd($request);
});
Route::get('post/{slug}','BlogController@show');
//Route::get('post/{baz}', 'BlogController@show1')->where('baz', '.*');  // Anything


Auth::routes();

Route::get('/home', 'BlogController@index')->name('home');

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('{slug}', 'PageController@show');
Route::get('page/{slug}', 'PageController@show');