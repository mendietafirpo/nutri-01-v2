<footer class="text-white py-4 rounded-b-md">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 bg-gray-800">
        <!-- columna 1 -->
        <div class="text-left row-start-2 ml-8 ">
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
                <a href="{{ url('/contacts') }}" class="text-sm text-gray-400 hover:text-white">Contacto</a>
                &nbsp
            </div>
        </div>
        <!-- columna 2 -->
        <div class="text-center row-start-2">
            <p class="text-sm">Información del Sitio</p>
            <ul>
            <li><a href="{{ url('/company') }}" class="text-gray-400 hover:text-white">Sobre Nosotros</a></li>
            <li><a href="{{ url('/teams') }}" class="text-gray-400 hover:text-white">Equipo</a></li>
            </ul>
        </div>
        <!-- columna 3 -->
        <div class="text-right mr-4 row-start-2">
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
        <!-- <div class="col-span-3 row-start-3 text-center mb-6">
            <i class="fa fa-copyright" aria-hidden="true"></i>
            Copyright <?php echo config('app.name')." ";  echo date('Y'); ?> | Todos los derechos reservados
            </a>
        </div> -->
    </div>
</footer>