<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Photo;
use App\Staff;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function(){

    $staff = Staff::find(1);

    $staff->photos()->create(['path'=>'example.jpg']);

});

Route::get('/read', function(){

    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo){

        echo $photo->path;

    }

});

Route::get('/update', function(){

    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();

    $photo->path = "updated.jpg";

    $photo->save();

});

Route::get('/delete', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->delete();

});

Route::get('/assign', function (){

    $staff = Staff::findOrFail(1);

    $photo = Photo::findOrFail(4);

    $staff->photos()->save($photo);

});

//Route::get('/un-assign', function (){
//
//    $staff = Staff::findOrFail(1);
//
//    $staff->photos()->whereId(4)->update(['imageable_id'=>'', 'imageabe_type'=>'']);
//
//});