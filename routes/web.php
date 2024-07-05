<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\OrderController;
use App\Models\Destination;
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

route::get('/login',[LoginController::class,'index'])->name('login');
route::post('/login_proses',[LoginController::class,'login_proses'])->name('login_proses');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

route::get('/register',[LoginController::class,'register'])->name('register');
route::post('/register_proses',[LoginController::class,'register_proses'])->name('register_proses');

Route::get('/book/{id}', [TicketController::class, 'showBookingForm'])->name('book.ticket');
Route::post('/book/{id}', [TicketController::class, 'bookTicket'])->name('book.ticket.post');
Route::post('/payment-callback', [TicketController::class, 'paymentCallback'])->name('payment.callback');

Route::post('/destinations/{destination}/ratings', [DestinationController::class, 'storeRating'])->name('destinations.storeRating');
// Route::get('/destination/{destination}', [DestinationController::class, 'show'])->name('destination.show');

route::get('/',[DestinationController::class,'test'])->name('test');

// route::group(['middleware' => ['auth','ceklevel:user']] , function(){
//     route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
// });


route::group(['middleware' => ['auth','ceklevel:admin,manager,client']] , function(){
// route::group(['middleware' => ['auth','ceklevel:admin']] , function(){

    route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

    route::get('/user',[HomeController::class,'index'])->name('index');
    route::get('/create',[HomeController::class,'create'])->name('user.create');
    route::post('/store',[HomeController::class,'store'])->name('user.store');
    route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
    route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
    route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');

    route::get('/destination',[DestinationController::class,'destination'])->name('destination');
    route::get('/create_destination',[DestinationController::class,'create_Destination'])->name('create.destination');
    route::post('/store_destination',[DestinationController::class,'store'])->name('destination.store');
    route::get('/edit_destination/{id}',[DestinationController::class,'edit'])->name('destination.edit');
    route::put('/update_destination/{id}',[DestinationController::class,'update'])->name('destination.update');
    route::delete('/delete_destination/{id}',[DestinationController::class,'delete'])->name('destination.delete');

    route::get('/order',[OrderController::class,'order'])->name('order');
});




