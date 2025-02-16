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
use App\Http\Controllers\ColorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



// MAIN VIEWS

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/company', [CompanyController::class, 'index'])->name('company');

// WILL BE BUILD
Route::get('/show', [ShowController::class, 'index'])->name('show');


// ADMIN BOARD
// Route::get('/admin/users', [UserAdminController::class, 'index'])->name('users');

// Route::get('admin/users/{id}', [UserAdminController::class, 'update'])->name('users.update');

// Route::get('admin/users/{user}', [UserAdminController::class, 'edit'])->name('users.edit');


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



// ADMIN PANEL
Route::middleware([RoleMiddleware::class . ':1'])->group(function () {

    Route::match(['get', 'post'], 'admin/admin_panel', [AdminBoardController::class, 'index'])->name('admin_panel');

    // USERS MANAGEMENT  

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

    // DESIGN DESCRIPTIONS
    Route::post('update-description/{key}', function (Request $request, $key) {
        $filePath = storage_path('app/designs.json');

        // Si el archivo no existe, crearlo con un JSON vacío
        if (!file_exists($filePath)) {
            file_put_contents($filePath, json_encode([], JSON_PRETTY_PRINT));
        }

        // Cargar el contenido del archivo
        $data = json_decode(file_get_contents($filePath), true) ?? [];

        // Validar que el valor enviado no sea nulo
        $newValue = $request->input('value');
        if ($newValue === null) {
            return response()->json(['error' => 'Valor no válido'], 400);
        }

        // Guardar la nueva descripción
        $data[$key] = $newValue;
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

        return response()->json(['success' => true]);
    })->name('update.description');

    


    
    Route::post('update-color', function (Request $request) {
        $filePath = storage_path('app/designs_color.json');
    
        $color = $request->input('color');
        $key = $request->input('key');

        // Leer el contenido actual del archivo JSON si existe
        $data = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];
    
        // Asegurar que $data es un array y actualizar solo la clave correspondiente
        $data[$key] = $color;
    
        // Guardar el JSON actualizado
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    
        return response()->json(['success' => true, 'message' => 'Color guardado correctamente']);
    })->name('update.color');
    

    Route::post('/home.updateddesign', [HomeController::class, 'updateDesign'])->name('home.updateddesign');

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


