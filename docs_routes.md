
## ROUTE MAIN VIEWS
// MAINS VIEWS
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

## ROUTE USERS MANAGER
Route::get('/users', [UserController::class, 'index'])->name('users.index');  
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');  
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');  
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

## ROUTE SEND MAIL CONTACTS
Route::post('/contact/send', [ContactMailController::class, 'send'])->name('contact.send');

## ROUTE POST
Route::post('/save-descriptions', [DescriptionController::class, 'saveDescriptions'])->name('saveDescriptions');