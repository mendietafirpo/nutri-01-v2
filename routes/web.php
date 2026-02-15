<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
#middlewares
use App\Http\Middleware\RoleMiddleware;
#controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactMailController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TraceController;
use App\Http\Controllers\AdminBoardController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\VideoUploadController;
use App\Http\Controllers\TrixController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



// PUBLIC MAIN VIEWS

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/company', [CompanyController::class, 'index'])->name('company');


// DESCRIPTIONS PAGE HOME
Route::post('/save-descriptions', [DescriptionController::class, 'saveDescriptions'])->name('saveDescriptions');




// CONTACT SENDING MAIL
Route::post('/contact/send', [ContactMailController::class, 'send'])->name('contact.send');


// REVIEW

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// ADMIN PANEL: ENABLED ONLY ROLE:1
Route::middleware([RoleMiddleware::class . ':1'])->group(function () {

    Route::match(['get', 'post'], 'admin/admin_panel', [AdminBoardController::class, 'index'])->name('admin_panel');

    // USERS MANAGEMENT  
    Route::get('admin/sections/users/{id}/edit', [UserAdminController::class, 'edit']);

    Route::get('admin/sections/users/{id}', [UserAdminController::class, 'edit'])->name('users.edit');  

    Route::put('admin/sections/users/{id}', [UserAdminController::class, 'update'])->name('users.update');  

    Route::delete('admin/sections/users/{id}', [UserAdminController::class, 'destroy'])->name('users.destroy');

    // TRACE MANAGEMENT

    Route::get('/admin/traces/{traceId}/edit', [TraceController::class, 'edit'])->name('traces.edit');
    Route::put('/admin/traces/{traceId}', [TraceController::class, 'update'])->name('traces.update');

    Route::delete('admin//sections/trace_update/{traceId}', [TraceController::class, 'destroy'])->name('trace.destroy');
    
    // VIEW SECTION
    Route::post('/save_view_section', function (Illuminate\Http\Request $request) {
        session()->put('viewSection', $request->input('valor'));
        return response()->json(['mensaje' => 'Variable guardada']);
    });

    // EDITING DESIGN DESCRIPTIONS
    
    Route::post('/home.editmode', [HomeController::class, 'getEditMode'])->name('home.editmode');

    // EDITING DESCRIPTION PAGE HOME
    Route::post('/home.updateddesign', [HomeController::class, 'updateDesign'])->name('home.updateddesign');

    // EDITING DESCRIPTION PAGE COMPANY
    Route::post('/company.updateddesign', [CompanyController::class, 'updateDesign'])->name('company.updateddesign');

    
    Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload-image');

    Route::post('/upload-video', [VideoUploadController::class, 'store'])->name('video.upload');

});

Route::middleware([RoleMiddleware::class . ':2'])->group(function () {
  //

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/trix', [TrixController::class, 'index']);
Route::post('/upload', [TrixController::class, 'upload']);
Route::post('/store', [TrixController::class, 'store']);
