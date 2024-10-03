<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumniController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'frontend.pages.index')->name('index');

Route::view('/about-us', 'frontend.pages.about-us')->name('about-us');

Route::prefix('services')->name('services.')->group(function () {
    Route::view('/transaction-and-business-structuring', 'frontend.pages.transaction-and-business-structuring')->name('transaction-and-business-structuring');
    Route::view('/audit-and-assurance', 'frontend.pages.audit-and-assurance')->name('audit-and-assurance');
    Route::view('/direct-tax', 'frontend.pages.direct-tax')->name('direct-tax');
    Route::view('/corporate-and-regulatory-laws', 'frontend.pages.corporate-and-regulatory-laws')->name('corporate-and-regulatory-laws');
    Route::view('/indirect-tax', 'frontend.pages.indirect-tax')->name('indirect-tax');
    Route::view('/fema-and-international-taxation', 'frontend.pages.fema-and-international-taxation')->name('fema-and-international-taxation');
    Route::view('/safe', 'frontend.pages.safe')->name('safe');
    Route::view('/doing-business-in-india', 'frontend.pages.doing-business-in-india')->name('doing-business-in-india');
});
Route::get('/resources/all',  [HomeController::class, 'resource_category'])->name('resources.all');

Route::prefix('resources')->name('resources.')->group(function () {
    //Route::get('/',  [HomeController::class, 'resource_category'])->name('all');
    Route::get('/{category}', [HomeController::class, 'resource_category'])->name('resource_category');
    Route::post('/get_resources', [HomeController::class, 'get_resources'])->name('get_resources');
});

Route::get('/resource/{any}', [HomeController::class, 'read_resource'])->name('resource');

Route::view('/industries', 'frontend.pages.industries')->name('industries');
Route::view('/careers', 'frontend.pages.careers')->name('careers');
Route::view('/contact-us', 'frontend.pages.contact-us')->name('contact-us');
Route::view('/alumni-login', 'frontend.pages.alumni-login')->name('login');

// Contact Form Submit
Route::middleware(ProtectAgainstSpam::class)->group(function () {
    Route::post('/contact-form-submit', [HomeController::class, 'contact_form_submit'])->name('contact-form-submit');
    Route::post('/profile-form-submit', [HomeController::class, 'profile_form_submit'])->name('profile-form-submit');
    Route::post('/sign-up-form-submit', [AlumniController::class, 'sign_up_form_submit'])->name('sign-up-form-submit');
    Route::post('/send-otp', [AlumniController::class, 'send_otp'])->name('send-otp');
    Route::post('/confirm-otp', [AlumniController::class, 'confirm_otp'])->name('confirm-otp');
    Route::post('/expire-otp', [AlumniController::class, 'expire_otp'])->name('expire-otp');
});


// Alumni Logged in pages
Route::middleware(['auth:web'])->group(function () {
    Route::get('view-profile', [AlumniController::class, 'view_profile'])->name('view-profile');
    Route::get('edit-profile', [AlumniController::class, 'edit_profile'])->name('edit-profile');
    Route::get('alumni-directory', [AlumniController::class, 'alumni_directory'])->name('alumni-directory');
    Route::post('get-alumnis', [AlumniController::class, 'get_alumnis'])->name('get-alumnis');
    Route::post('logout', [AlumniController::class, 'logout'])->name('logout');
    Route::post('save-alumni', [AlumniController::class, 'save_alumni'])->name('save-alumni');
    Route::get('view-alumni/{any}', [AlumniController::class, 'view_alumni'])->name('view-alumni');
});
