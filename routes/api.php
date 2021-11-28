<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelServiceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('locations')->name('locations')->group(function(){
    Route::get('/listLocations',[LocationController::class,'listLocations'])->name('listLocations');
});

Route::prefix('posts')->name('posts')->group(function(){
    Route::get('/homePost',[PostController::class,'homePost'])->name('homePost');
    Route::post('/create/{id}',[PostController::class,'createPost'])->name('createPost');
    Route::get('/',[PostController::class,'getPost'])->name('getPost');
    Route::post('/{id}',[PostController::class,'updatePost'])->name('updatePost');
});
Route::prefix('hotels')->name('hotels')->group(function(){
    Route::get('/hotelList',[HotelController::class,'hotelList'])->name('hotelList');
    Route::get('/{id}',[HotelController::class,'hotelDetail'])->name('hotelDetail');
    Route::get('/{search}',[HotelController::class,'searchHotel'])->name('searchHotel');
    Route::post('/addHotel',[HotelController::class,'addHotel'])->name('addHotel');
    Route::post('/update/{id}',[HotelController::class,'updateHotel'])->name('updateHotel');
    Route::get('/delete/{id}',[HotelController::class,'deleteHotel'])->name('deleteHotel');
    Route::get('/{id}/room',[RoomController::class,'hotelRoom'])->name('hotelRoom');
    Route::get('/{id}/services',[HotelServiceController::class,'hotelService'])->name('hotelService');
});
Route::prefix('rooms')->name('rooms')->group(function(){
    Route::get('/{search}',[RoomController::class,'searchRoom'])->name('searchRoom');
    Route::post('/add/{id}',[RoomController::class,'addRoom'])->name('addRoom');
    Route::get('/{id}',[RoomController::class,'getRoomById'])->name('getRoomById');
    Route::post('/update/{id}',[RoomController::class,'updateRoom'])->name('updateRoom');
    Route::get('/delete/{id}',[RoomController::class,'deleteRoom'])->name('deleteRoom');
});
Route::prefix('services')->name('services')->group(function(){
    Route::post('/create',[ServiceController::class,'createService'])->name('createService');
    Route::get('/',[ServiceController::class,'showService'])->name('showService');
    Route::post('/{id}',[ServiceController::class,'updateService'])->name('updateService');
    Route::get('/delete/{id}',[ServiceController::class,'deleteService'])->name('deleteService');
    
});
Route::prefix('roomType')->name('roomType')->group(function(){
    Route::post('/create',[RoomTypeController::class,'createRoomType'])->name('createRoomType');
    Route::get('/',[RoomTypeController::class,'showRoomType'])->name('showRoomType');
    Route::post('/{id}',[RoomTypeController::class,'updateRoomType'])->name('updateRoomType');
    Route::get('/delete/{id}',[RoomTypeController::class,'deleteRoomType'])->name('deleteRoomType');
    
});
