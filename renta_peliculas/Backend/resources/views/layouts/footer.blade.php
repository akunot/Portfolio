<footer class="bg-dark text-white pt-5">
    <link rel="stylesheet" href="{{ asset('assets_home/css/footer.css') }}">
    <div class="container">
        <div class="row g-4">
            <!-- Sección de redes sociales -->
            <div class="col-md-4 text-center text-md-start">
                <h5 class="text-warning mb-3" style="font-family: 'Cinzel', serif;">SÍGUENOS</h5>
                <div class="social-links">
                    <a href="#" class="text-white me-3 fs-5">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-white me-3 fs-5">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-white me-3 fs-5">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="#" class="text-white fs-5">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Sección de enlaces rápidos -->
            <div class="col-md-4 text-center">
                <h5 class="text-warning mb-3" style="font-family: 'Cinzel', serif;">NUIT NOIRE</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('about') }}" class="text-white text-decoration-none">Sobre Nosotros</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contacto</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Términos de Servicio</a></li>
                </ul>
            </div>

            <!-- Sección de newsletter -->
            <div class="col-md-4 text-center text-md-end">
                <h5 class="text-warning mb-3" style="font-family: 'Cinzel', serif;">NEWSLETTER</h5>
                <form class="d-flex gap-2">
                    <input type="email" class="form-control bg-transparent text-white border-warning" 
                           placeholder="Tu correo electrónico">
                    <button class="btn btn-outline-warning" type="submit">Suscribir</button>
                </form>
            </div>
        </div>

        <!-- Derechos de autor -->
        <div class="border-top border-warning mt-5 pt-3">
            <p class="text-center text-white-50 mb-0">
                Copyright © Nuit Noire 2023 | 
                <span class="text-warning">El cine a tu alcance</span>
            </p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</footer>