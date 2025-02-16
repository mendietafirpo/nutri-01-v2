# Nombre del proyecto: 
nutri-01-v2

# Breve descripción de su propósito
Sitio web destinado a 

# Tecnologías utilizadas:
- Laravel -v: 11.34.2
 - php -v: 8.2.12
 - composer v: 2.8.3
- Brezze (autenticación de usuarios)
- Tailwind (css)
- MariaDB (mysql) - v:11.7, 11.8

## instalaciones
> composer global require laravel/installer
> composer global require laravel/installer
> cd nutri-01-v2
> npm install && npm run build
> composer run dev
> composer require laravel/breeze --dev
> npm install tailwindcss @tailwindcss/vite
> npm run build

# Estado del proyecto:
- en desarrollo


## layouts /resources/views/layouts
- app/guest - diseño marco de las vistas
- navigation - menues por defecto Brezze
- naveauthout - incluye estructura de menu general
- footor

## estructura de paginas (view)
# resources/view
- Home: pagina de presentación
- Contacts
- Produts
- Company
- Panel

## resources/views/sections
- sectionHome
- sectionProduts
- sectionPanel

## resources/views/design
- desing_view

## resources/views/admin
# gestion de base de datos
- users
- contacts
- traces

## resources/auth
- Autenticación: por defecto Brezze
  - Login
  - Registro
  - Perfil


- Contacts: formulario de contacto con mapa de ubicación
- Products: vista general, con videos, imagenes y descripcion
 - show: vista de productos
 - Gestor de productos
 - Creater:
 - Update:
- Company: about, presentación de empresa, perfil proopietario


# middleware
> ls app/Http/Middleware/