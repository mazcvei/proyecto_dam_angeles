<footer class="bg-dark text-light pt-4 pb-3 mt-5">
    <div class="container">
        <div class="row gy-4">
            
            <!-- Información de la web -->
            <div class="col-md-4 col-sm-12">
                <h5 class="fw-bold">IlustraEvento</h5>
                <p class="small text-muted">
                {{ $settings->description ?? '' }}
                </p>
            </div>

            <!-- Contacto -->
            <div class="col-md-4 col-sm-12">
                <h5 class="fw-bold">Contacto</h5>
                <ul class="list-unstyled small">
                    <li><i class="bi bi-envelope me-2"></i>{{$settings->email_contact ?? '' }} </li>
                    <li><i class="bi bi-telephone me-2"></i> {{$settings->phone_contact ?? '' }}</li>
                </ul>
            </div>

            <!-- Redes Sociales -->
            <div class="col-md-4 col-sm-12">
                <h5 class="fw-bold">Síguenos</h5>
                <div class="d-flex gap-3">
                    <a href="{{ $settings->url_instagram ?? '#'}}" class="text-light fs-5" target="_blank"><i class="fa-brands fa-instagram" ></i></a>
                </div>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <!-- Copyright -->
        <div class="text-center small text-muted">
            © {{date('Y')}} IlustraEvento - Todos los derechos reservados
        </div>
    </div>
</footer>
