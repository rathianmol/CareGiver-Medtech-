<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\AssignProviderController;
use App\Http\Controllers\ProviderAvailabilityController;
use App\Http\Controllers\BillingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('patients', PatientController::class);
Route::resource('providers', ProviderController::class);

/** AssignProvider Routes - assigning a Patient to a Provider */
Route::get('/patients/{patient}/assign', [AssignProviderController::class, 'show'])->name('assign_providers.show');
Route::post('/patients/{patient}/providers/{provider}/assign', [AssignProviderController::class, 'store'])->name('assign_providers.store');
/** END AssignProvider Routes  */

/**ProviderAvailablity Routes */
Route::post('/provider/{provider}/availability', [ProviderAvailabilityController::class, 'store'])->name('provider_availability.store');
/**END ProviderAvailablity Routes */

/** Billing Routes */
    Route::get('/billing/patients/{patient}/create', [BillingController::class, 'create'])->name('billing.create');
    Route::post('/billing/patients/{patient}/store', [BillingController::class, 'store'])->name('billing.store');
/** END Billing Routes */
