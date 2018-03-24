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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/store', function (Request $request){

    if ($request->hasFile('image')){
     $request->file('image');
//    return $request->image->path();  // get path
//    return $request->image->extension(); //  get extension

//        first way store
        //    return $request->image->store('public');   // store image

//        second way store

    //    return Storage::putFile('public', $request->file('image'));


        return $request->image->storeAs('public', 'rohan.jpg'); // this upload this name

    }else{
        return 'no file ';
    }

});

Route::get('/show', function (){

  // return Storage::files('public');// show only this file image
  // return Storage::allFiles('public'); // show all file with sub folder

    // Storage::makeDirectory('public/new');  // make directory

//    if (Storage::deleteDirectory('public/new'));  // remove directory;

//     return Storage::allFiles('public'); // show all file with sub folder

/*
    $url = Storage::url('rohan.jpg');  echo image
    return "<img src='".$url."'/>";*/

    if (Storage::delete('public/rohan.jpg'));  // remove file

    return 'remove file';




});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
