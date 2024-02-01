<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    Route::view('/', 'frontend.pages.services')->name('services');
    Route::view('/transaction-and-business-structuring', 'frontend.pages.transaction-and-business-structuring')->name('transaction-and-business-structuring');
    Route::view('/audit-and-assurance', 'frontend.pages.audit-and-assurance')->name('audit-and-assurance');
    Route::view('/direct-tax', 'frontend.pages.direct-tax')->name('direct-tax');
    Route::view('/corporate-and-regulatory-laws', 'frontend.pages.corporate-and-regulatory-laws')->name('corporate-and-regulatory-laws');
    Route::view('/indirect-tax', 'frontend.pages.indirect-tax')->name('indirect-tax');
    Route::view('/fema-and-international-taxation', 'frontend.pages.fema-and-international-taxation')->name('fema-and-international-taxation');
    Route::view('/safe', 'frontend.pages.safe')->name('safe');
    Route::view('/doing-business-in-india', 'frontend.pages.doing-business-in-india')->name('doing-business-in-india');
});

Route::prefix('resources')->name('resources.')->group(function () {
    Route::view('/', 'frontend.pages.resources')->name('all');
    Route::get('/{category}', [HomeController::class, 'resource_category'])->name('resource_category');
});

Route::view('/industries', 'frontend.pages.industries')->name('industries');
Route::view('/careers', 'frontend.pages.careers')->name('careers');
Route::view('/contact-us', 'frontend.pages.contact-us')->name('contact-us');
Route::view('/alumni-login', 'frontend.pages.alumni-login')->name('alumni-login');

// Contact Form Submit
Route::post('/contact-form-submit', [HomeController::class, 'contact_form_submit'])->name('contact-form-submit');
