>> php artisan about

>> php artisan about --only=environment

>> php artisan config:show database

>> php artisan env:encrypt

>> php artisan env:encrypt --key=3UVsEgGVK36XN82KKeyLFMhvosbZN1aF

>> php artisan config:clear

>> php artisan config:publish
 
>> php artisan config:publish --all

>> php artisan down

>> php artisan down

>> php artisan up

>> php artisan optimize:clear

>> php artisan config:cache

>> php artisan event:cache

>> php artisan route:cache

>> php artisan view:cache

>> php artisan make:provider RiakServiceProvider

>> php artisan install:api

>> php artisan tinker

>> php artisan storage:link

>> php artisan key:generate

>> composer install

>> mkdir -p storage/app/public/uploads

>> chmod -R 775 storage/app/public

>> chmod -R 777 storage

>> netstat -ano | findstr :3306


# ACTUALIZACION PRODUCCIÓN

# computadora local, ejecuta 
>> composer install --no-dev --optimize-autoloader 
ó composer update --ignore-platform-reqs (sí hay problemas de compatibilidad) 
# (esto limpiará tu vendor local de cosas innecesarias para producción).

# 1. Limpiar todo lo viejo
php artisan optimize:clear

# 2. Generar el nuevo caché (Esto crea archivos nuevos específicos para el servidor)
php artisan optimize

# 3. Cachear las vistas
php artisan view:cache

# 4. (Opcional) Reiniciar el gestor de procesos si usas colas (queues)
php artisan queue:restart

# Código fuente: Todos los archivos de las carpetas app/, config/, database/, resources/, routes/, y bootstrap/app.php.

>> composer.json y composer.lock: Es vital subirlos para que el servidor sepa exactamente qué versiones de paquetes instalar.

>> package.json y vite.config.js: Necesarios para compilar tus assets.

>> public/build/: La carpeta completa que generaste con npm run build.