<?php

use App\Http\Controllers\ContactCoctroller;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Doctor;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\User\FeedbackController;
use App\Http\Controllers\User\AppointmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\SearchController;


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

                        // All Public Routes

Route::get('/', function () {

    // Current User
    $user = Auth::user();

    // All Trainers
    $trainers = Trainer::get();

    return view('index', compact('user', 'trainers'));
});


// Show All Product
Route::get('/products', [ProductController::class, 'All_Products'])->name('products.index');

//Search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Show Our Doctors
Route::get('/doctors', function () {
    $doctors = Doctor::get();
    return view('team', compact('doctors'));
});

// Show Our Trainers
Route::get('/trainers',function(){
    $trainers = Trainer::get();
    return view('trainers', compact('trainers'));
});

// Contact Us
Route::get('/contactus', function () {
    return view('contactus');
});
Route::post('/send-message', [ContactCoctroller::class, 'send_message'])->name('submit-contact-form');


// Appointment
Route::post('/submit-appointment-form', [AppointmentController::class, 'store'])->name("Appointment");


