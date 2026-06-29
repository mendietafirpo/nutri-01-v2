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
use App\Http\Controllers\ShowController;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\DeviceUserController;
use App\Http\Controllers\TraceController;
use App\Http\Controllers\AdminBoardController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\VideoUploadController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OwnerBoardController;
use App\Http\Controllers\TrixController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FormularioController;
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


// CONTACT

Route::get('/contact', function () {return view('contact');});
    
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// LOAD FORMULARIO .CVS
Route::get('/admin/exportar-formulario', [FormularioController::class, 'exportNative'])
     ->name('formulario.export');

// ADMIN PANEL: ENABLED ONLY ROLE:1
Route::middleware([RoleMiddleware::class . ':1'])->group(function () {

    Route::match(['get', 'post'], 'admin/admin_panel', [AdminBoardController::class, 'index'])->name('admin_panel');

    // USERS MANAGEMENT
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    
    Route::get('admin/sections/users/{id}/edit', [AdminUserController::class, 'edit']);

    Route::get('admin/users/users_edit/{id}', [AdminUserController::class, 'edit'])->name('users.edit');  

    Route::put('admin/users_update/{id}', [AdminUserController::class, 'update'])->name('users.update');

    Route::delete('admin/sections/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    // TRACE MANAGEMENT

    Route::get('/admin/traces/{traceId}/edit', [TraceController::class, 'edit'])->name('traces.edit');
    
    Route::put('/admin/traces/{traceId}', [TraceController::class, 'update'])->name('traces.update');

    Route::delete('admin//sections/trace_update/{traceId}', [TraceController::class, 'destroy'])->name('trace.destroy');

    // DEVICE MANAGEMENT

    Route::get('/admin/devices/{devId}/edit', [DevicesController::class, 'edit'])->name('devices.edit');
    Route::put('/admin/devices/{devId}', [DevicesController::class, 'update'])->name('devices.update');
    Route::get('/admin/device_create/', [DevicesController::class, 'create'])->name('devices.create');
    Route::put('/admin', [DevicesController::class, 'store'])->name('devices.store');
    Route::delete('admin/devices/destroy/{devId}', [DevicesController::class, 'destroy'])->name('devices.destroy');
    // vincular user with device

    Route::get('/admin/devices/{device}/assign', [DeviceUserController::class, 'create'])->name('devices.assign.create');
    // Ruta para guardar la relación
    Route::post('/admin/devices/assign', [DeviceUserController::class, 'store'])->name('devices.assign.store');

    // Ruta para eliminar la relación (desafectar)
    Route::delete('devices/{devId}/detach/{userId}', [DeviceUserController::class, 'detach'])->name('devices.detach');
    
    // LOCACION
    Route::get('admin/cities_edit', [CityController::class, 'index'])->name('cities.index');
    Route::post('admin/cities_edit', [CityController::class, 'store'])->name('cities.store');
    Route::put('admin/cities_edit/{city_name}', [CityController::class, 'update'])->name('cities.update');
    
    Route::get('admin/countries', [CountryController::class, 'index'])->name('countries.index');
    Route::post('admin/countries', [CountryController::class, 'store'])->name('countries.store');
    Route::put('admin/countries/{city_name}', [CountryController::class, 'update'])->name('countries.update');
    // CONTACTS
    Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
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

Route::middleware([RoleMiddleware::class . ':1,2'])->group(function () {

    Route::match(['get', 'post'], 'admin_owner/user_panel', [OwnerBoardController::class, 'index'])->name('user_panel');

    Route::get('/admin_owner/device_edit/{devId}/edit', [OwnerBoardController::class, 'edit'])->name('device_owner.edit');
    Route::put('/admin_owner/device_edit/{devId}', [OwnerBoardController::class, 'updateParams'])->name('device_owner.update');

    // VIEW SECTION
    Route::post('/save_view_section_owner', function (Illuminate\Http\Request $request) {
        session()->put('viewSection_owner', $request->input('valor'));
        return response()->json(['mensaje' => 'Variable guardada']);
    });


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
