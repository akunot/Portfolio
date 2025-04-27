<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros | Nuit Noire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset ('assets_home/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets_home/css/about_us.css') }}">
</head>
<body class="bg-dark">
    @include('layouts.header')

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="hero-content">
            <h1 class="cinematic-title">Proyecto Universitario</h1>
            <p class="hero-subtitle">Desarrollo de plataforma de cine - Universidad Nacional de Colombia</p>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Equipo de Desarrollo</h2>
            
            <div class="team-grid">
                <!-- Estudiante 1 -->
                <div class="team-card">
                    <div class="member-photo academic-frame">
                        <i class="bi bi-person-circle default-avatar"></i>
                    </div>
                    <h3 class="member-name">David Andres Diaz Garcia</h3>
                    <p class="member-role">Estudiante de Administración de Sistemas Informáticos</p>
                    <div class="member-bio">
                        <p><strong>Contribuciones:</strong></p>
                        <ul class="contributions-list mb-0 text-center">
                            <li>Desarrollo Frontend</li>
                            <li>Diseño de Interfaz</li>
                            <li>Gestión de Contenido</li>
                        </ul>
                    </div>
                    <div class="academic-links">
                        <a href="https://github.com/Davdiazga" class="btn btn-academic">
                            <i class="bi bi-github"></i> Repositorio
                        </a>
                    </div>
                    <div class="academic-links">
                        <a href="https://www.facebook.com/share/1G2PtMZzEo/" class="btn btn-academic">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>
                        <a href="https://www.instagram.com/david.adg?igsh=OHp2cGlpYjZobDlq" class="btn btn-academic">
                            <i class="bi bi-instagram"></i> Instagram
                        </a>
                    </div>
                </div>

                <!-- Estudiante 2 -->
                <div class="team-card">
                    <div class="member-photo academic-frame">
                        <i class="bi bi-person-circle default-avatar"></i>
                    </div>
                    <h3 class="member-name">Sergio Alejandro Castro Botero</h3>
                    <p class="member-role">Estudiante de Administración de Sistemas Informáticos</p>
                    <div class="member-bio">
                        <p><strong>Contribuciones:</strong></p>
                        <ul class="contributions-list mb-0 text-center">
                            <li>Desarrollo Backend</li>
                            <li>Base de Datos</li>
                            <li>Autenticación</li>
                        </ul>
                    </div>
                    <div class="academic-links">
                        <a href="https://github.com/akunot" class="btn btn-academic">
                            <i class="bi bi-github"></i> Repositorio
                        </a>
                    </div>
                    <div class="academic-links">
                        <a href="https://www.facebook.com/sergioalejandro.castrobotero" class="btn btn-academic">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>
                        <a href="https://x.com/aku_not?t=tk3kpjtOozAFf-0gYbpLTg&s=09" class="btn btn-academic">
                            <i class="bi bi-twitter"></i> Twitter
                        </a>
                        <a href="https://www.instagram.com/akunot1?igsh=cjcyMnNxcTQ5bTF5" class="btn btn-academic">
                            <i class="bi bi-instagram"></i> Instagram
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tech Stack -->
    <section class="tech-section bg-black py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Tecnologías Utilizadas</h2>
            <div class="tech-grid">
                <!-- HTML5 -->
                <div class="tech-item">
                    <svg class="tech-icon" viewBox="0 0 128 128">
                        <path fill="#E44D26" d="M19.037 113.876l-10.005-112.215h109.936l-10.016 112.198-45.019 12.48z"/>
                        <path fill="#F16529" d="M64 116.8l36.378-10.086 8.559-95.878h-44.937z"/>
                        <path fill="#EBEBEB" d="M64 52.455h-18.212l-1.258-14.094h19.47v-13.762h-34.511l.33 3.692 3.382 37.927h30.799zM64 88.198l-.061.017-15.327-4.14-.979-10.975h-13.817l1.928 21.609 28.193 7.826.063-.017z"/>
                    </svg>
                    <span>HTML5</span>
                </div>

                <!-- CSS3 -->
                <div class="tech-item">
                    <svg class="tech-icon" viewBox="0 0 128 128">
                        <path fill="#1572B6" d="M18.814 114.123l-10.054-112.771h110.48l-10.064 112.754-45.243 12.543z"/>
                        <path fill="#33A9DC" d="M64 116.8l36.243-10.053 8.62-96.671h-44.863z"/>
                        <path fill="#EBEBEB" d="M64 52.455h-17.577l-1.149-12.88h18.726v-12.88h-31.66l.302 3.411 3.086 34.569h28.257zM64 88.198l-.061.017-15.327-4.14-.979-10.975h-13.817l1.928 21.609 28.193 7.826.063-.017z"/>
                    </svg>
                    <span>CSS3</span>
                </div>

                <!-- Bootstrap -->
                <div class="tech-item">
                    <svg class="tech-icon" viewBox="0 0 128 128">
                        <path fill="#7952B3" d="M114.4 105.2c-2.2 15.3-15.7 22.8-35 22.8H48.6c-19.3 0-32.8-7.5-35-22.8-2.2-15.3 8.8-23.2 26.5-28.3l1.2-.3c12.8-3.1 17.4-5.5 17.4-11.1 0-6.8-5.5-10.3-16.2-10.3-12.3 0-16.6 4.5-17.4 12.5H14c1.1-20 17.3-30 34.6-30 17.7 0 29.7 8.8 29.7 25.7 0 11.8-6.8 19.8-20.5 23.7l-1.2.3c-14 3.4-18.7 5.8-18.7 12.1 0 7.3 6.2 10.8 18.1 10.8 13.1 0 17.9-4.7 19.1-12.5h15.8c-1.6 16.7-15.6 24.8-34.9 24.8-19.3 0-32.8-7.5-35-22.8"/>
                    </svg>
                    <span>Bootstrap</span>
                </div>

                <!-- MySQL -->
                <div class="tech-item">
                    <svg class="tech-icon" viewBox="0 0 24 24">
                        <path fill="#00758F" d="M16.417 5.667h-.25c-.146 0-.292.042-.417.125L12 8.167 8.25 5.792c-.125-.083-.271-.125-.417-.125h-.25A2.09 2.09 0 0 0 5.5 7.75v8.5c0 1.146.938 2.083 2.083 2.083h8.834c1.145 0 2.083-.937 2.083-2.083v-8.5c0-1.146-.938-2.083-2.083-2.083zM12 12.292L9.083 10.25v3.459L12 15.75l2.917-2.041V10.25L12 12.292z"/>
                        <path fill="#F29111" d="M17.708 4.5H6.292A2.794 2.794 0 0 0 3.5 7.292v9.416A2.794 2.794 0 0 0 6.292 19.5h11.416a2.794 2.794 0 0 0 2.792-2.792V7.292A2.794 2.794 0 0 0 17.708 4.5zM16.417 18H7.583A2.09 2.09 0 0 1 5.5 15.917v-8.5A2.09 2.09 0 0 1 7.583 5.25h.25c.146 0 .292.042.417.125L12 8.167l3.75-2.792c.125-.083.271-.125.417-.125h.25a2.09 2.09 0 0 1 2.083 2.083v8.5A2.09 2.09 0 0 1 16.417 18z"/>
                    </svg>
                    <span>MySQL</span>
                </div>

                <!-- Laravel -->
                <div class="tech-item">
                    <svg class="tech-icon" viewBox="0 0 24 24">
                        <path fill="#FF2D20" d="M12 0L2 7l3 1.18V12l7 4.41L19 12V8.18L22 7 12 0zM5.68 9.25L12 13.1l6.32-3.85L12 3.5 5.68 9.25zM2.5 12.82V16l9 5.32 9-5.32v-3.18L12 17.5 2.5 12.82z"/>
                    </svg>
                    <span>Laravel</span>
                </div>
            </div>
    </section>

    <!-- Objetivos Académicos -->
    <section class="objectives-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4">Objetivos del Proyecto</h2>
            <div class="objective-list">
                <div class="objective-item">
                    <i class="bi bi-check2-circle"></i>
                    <p>Implementar un CRUD completo</p>
                </div>
                <div class="objective-item">
                    <i class="bi bi-check2-circle"></i>
                    <p>Practicar desarrollo full-stack</p>
                </div>
                <div class="objective-item">
                    <i class="bi bi-check2-circle"></i>
                    <p>Aplicar patrones MVC</p>
                </div>
                <div class="objective-item">
                    <i class="bi bi-check2-circle"></i>
                    <p>Integrar autenticación de usuarios</p>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>