<footer class="text-white py-4 rounded-b-md">
    <div class="grid grid-cols-4 bg-gray-800">
        <div class="col-start-1 col-span-2 row-span-3 row-start-1 text-left ml-12">
            &nbsp
            <div>
                <a href="{{ url('/privacy') }}" class="text-sm text-gray-400 hover:text-white">Privacidad</a>
                &nbsp
            </div>
            <div>
                <a href="{{ url('/terms') }}" class="text-sm text-gray-400 hover:text-white">Términos</a>
                &nbsp
            </div>
            <div>
                <a href="{{ url('/contact') }}" class="text-sm text-gray-400 hover:text-white">Contacto</a>
                &nbsp
            </div>
        </div>
        <div class="col-start-2 col-span-2 row-span-3 row-start-1 text-center mr-12 mt-6">
            <p class="text-sm">Información del Sitio</p>
            <ul>
            <li><a href="{{ url('/about') }}" class="text-gray-400 hover:text-white">Sobre Nosotros</a></li>
            <li><a href="{{ url('/team') }}" class="text-gray-400 hover:text-white">Equipo</a></li>
            </ul>
        </div>
        <div class="col-start-3 row-start-4 col-span-2 text-right mr-12">
            &nbsp
            <a class="btn btn-link" href="https://www.facebook.com/NAME">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            &nbsp
            <a class="btn btn-link" href="https://twitter.com/NAME"> 
            <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            &nbsp
            <a class="btn btn-link" href="https://www.linkedin.com/company/NAME/">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            &nbsp
            <a class="btn btn-link" href="mailto://mail@gmail.com.ar">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            </a>
        </div>
        <div class="col-start-2 col-span-2 text-center mb-6">
            <i class="fa fa-copyright" aria-hidden="true"></i>
            Copyright <?php echo config('app.name')." ";  echo date('Y'); ?> | Todos los derechos reservados
            </a>
        </div>
    </div>
</footer>