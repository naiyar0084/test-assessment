<?php
namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;  

use Illuminate\Support\Facades\Route;
use App\Models\Listing;

use App\Http\Controllers\ListingController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProviderListingController;
use App\Http\Controllers\AdminListingController;
use App\Http\Controllers\ProviderEnquiryController;
/*
|--------------------------------------------------------------------------
| Public Routes (Guest – SEO)
|--------------------------------------------------------------------------
*/
Route::get('/', [ListingController::class, 'index']);
Route::get('/listing/{listing}', [ListingController::class, 'show'])
    ->name('listing.show');

Route::post('/enquiry', [EnquiryController::class, 'store'])
    ->name('enquiry.store');

/*
|--------------------------------------------------------------------------
| Provider Routes (Auth)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('provider')
    ->name('provider.')
    ->group(function () {
        Route::resource('listings', ProviderListingController::class);
        Route::get('enquiries', [ProviderEnquiryController::class, 'index'])
            ->name('enquiries.index');
    });

/*
|--------------------------------------------------------------------------
| Admin Routes (Auth + Policy)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/listings', [AdminListingController::class, 'index'])
            ->name('listings.index')
            ->can('moderate', Listing::class);

        Route::post('/listings/{listing}/approve', [AdminListingController::class, 'approve'])
            ->name('listings.approve');

        Route::post('/listings/{listing}/reject', [AdminListingController::class, 'reject'])
            ->name('listings.reject');

        Route::post('/listings/{listing}/suspend', [AdminListingController::class, 'suspend'])
            ->name('listings.suspend');
    });

/*
|--------------------------------------------------------------------------
| Dashboard Redirect (Auth default)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
