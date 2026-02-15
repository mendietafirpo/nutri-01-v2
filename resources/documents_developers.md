utility command
php artisan view:clear

php artisan optimize:clear

npm install

npm run dev 
# start develoment server

npm run build
# creates a build directory with a production build of your app

# contact form
step 1: configuration .ev
step 2: configuration controller
step 3: route => Route::post('/contact', [ContactController::class, 'sendContactForm'])->name('contact.send');

# mail
php artisan make:mail ContactsMailable 

#create mails.contac.blade.php
