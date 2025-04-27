<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineAdmin - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets_home/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_admin/css/admin_index.css') }}" rel="stylesheet">
</head>
    @include('layouts.header')
    <body class="admin-body">
        
        <div class="container admin-dashboard">
            <!-- Header -->
            <div class="dashboard-header">
                <h1 class="cinematic-title">
                    <i class="bi bi-speedometer2"></i>
                    Panel de Control Cinematográfico
                </h1>
                <div class="gold-bar"></div>
            </div>

            <!-- Métricas Rápidas -->
            <div class="stats-grid">
                <div class="stat-card bg-box">
                    <div class="stat-content">
                        <h3>{{ $metrics['total_users'] }}</h3>
                        <p>Usuarios Registrados</p>
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>

                <div class="stat-card bg-box">
                    <div class="stat-content">
                        <h3>${{ number_format($metrics['total_revenue'], 2) }}</h3>
                        <p>Ingresos Mensuales</p>
                        <i class="bi bi-cash-stack"></i>
                    </div>
                </div>

                <div class="stat-card bg-box">
                    <div class="stat-content">
                        <h3>{{ $metrics['total_movies'] }}</h3>
                        <p>Películas en Catálogo</p>
                        <i class="bi bi-film"></i>
                    </div>
                </div>

                <div class="stat-card bg-box">
                    <div class="stat-content">
                        <h3>{{ $metrics['active_rents'] }}</h3>
                        <p>Rentas Activas</p>
                        <i class="bi bi-cart-check"></i>
                    </div>
                </div>
            </div>

            <!-- Sección Principal -->
            <div class="container dashboard-main d-flex justify-content-center">
                <div class="dashboard-column">
                    <!-- Actividad Reciente -->
                    <div class="activity-card bg-box">
                        <h3 class="section-title">
                            <i class="bi bi-clock-history"></i>
                            Actividad Reciente
                        </h3>
                        <div class="gold-bar-sm"></div>

                        <div class="activity-list">
                            @foreach($recentActivity['latest_rents'] as $rent)
                            @if(!$rent->movie->isEmpty())
                            <div class="activity-item">
                                <i class="bi bi-cart"></i>
                                <div class="activity-content">
                                    <a href="{{ route('users.show', $rent->user->id) }}" class="user-link">
                                        <span class="user">{{ $rent->user->name}}</span>
                                    </a>
                                    rentó
                                    @foreach($rent->movie as $movie)
                                    <a href="{{ route('movies.show', $movie->id) }}" class="movie-link">
                                        <span class="movie">{{ $movie->name }}</span>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Usuario Con Renta Pendiente -->
                    <div class="pending-rents-card bg-box">
                        <h3 class="section-title">
                            <i class="bi bi-person-check"></i>
                            Usuarios con Renta Pendiente
                        </h3>
                        <div class="gold-bar-sm"></div>

                        <div class="pending-rents-list">
                            @foreach($metrics['pending_rents_users'] as $user)
                            <div class="pending-rent-item">
                                <div class="pending-rent-header">
                                    <a href="{{ route('users.show', $user->id) }}" class="user-link">
                                        <span class="user">{{ $user->name }} </span>
                                    </a>
                                    <span class="rent-date">{{ \Carbon\Carbon::parse($user->rents->first()->rent_date)->format('d M Y') }}</span>
                                </div>
                                <div class="pending-rent-movies">
                                @foreach($user->rents->last()->movie as $movie)
                                    <div class="movie-details">
                                        <span class="movie-title">{{ $movie->name }}</span>
                                        <span class="movie-quantity"> - Cantidad: {{ $movie->pivot->quantity }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Reseñas Recientes -->
                    <div class="reviews-card bg-box">
                        <h3 class="section-title">
                            <i class="bi bi-chat-quote"></i>
                            Últimas Reseñas
                        </h3>
                        <div class="gold-bar-sm"></div>

                        @foreach($recentActivity['recent_reviews'] as $review)
                        <div class="review-item">
                            <div class="review-header">
                                <span class="user">{{ $review->user->name }}</span>
                                <div class="rating">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="bi bi-star{{ $i < $review->rating ? '-fill' : '' }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <p class="review-excerpt">{{ Str::limit($review->comment, 120) }}</p>
                            <small>En {{ $review->movie->name }}</small>
                        </div>
                        @endforeach
                    </div>

                    <div class="usage-section bg-box">
                    <h3 class="section-title">
                        <i class="bi bi-bar-chart"></i>
                        Estadísticas de Uso
                    </h3>
                        <div class="gold-bar-sm"></div>
                            <div class="usage-stats">
                                <div class="usage-item">
                                    <h4>Películas Más Rentadas</h4>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                var movies = [
                                                    @foreach($usageStats['most_rented_movies'] as $movie)
                                                        ["{{ $movie->name }}", {{ $movie->rents_count }}],
                                                    @endforeach
                                                ];

                                                var data = [{
                                                    x: movies.map(function(item) {
                                                        return item[0];
                                                    }),
                                                    y: movies.map(function(item) {
                                                        return item[1];
                                                    }),
                                                    type: 'bar'
                                                }];

                                                var layout = {
                                                    title: {
                                                        text: 'Películas Más Rentadas'
                                                    },
                                                    xaxis: {
                                                        title: {
                                                            text: 'Peliculas'
                                                        },
                                                    },
                                                    yaxis: {
                                                        title: {
                                                            text: 'Número de Rentas'
                                                        },
                                                    },
                                                };

                                                Plotly.newPlot('most-rented-movies', data, layout);
                                            });
                                        </script>
                                    <div id="most-rented-movies" style="width: 100%; height: 400px;"></div>
                                </div>
                                    <br>
                                    <br>    
                                <div class="usage-item">
                                    <h4>Películas Más Reseñadas</h4>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                var movies = [
                                                    @foreach($usageStats['most_viewed_movies'] as $movie)
                                                        ["{{ $movie->name }}", {{ $movie->reviews_count }}],
                                                    @endforeach
                                                ];

                                                var data = [{
                                                    x: movies.map(function(item) {
                                                        return item[0];
                                                    }),
                                                    y: movies.map(function(item) {
                                                        return item[1];
                                                    }),
                                                    type: 'bar'
                                                }];

                                                var layout = {
                                                    title: {
                                                        text: 'Películas Más Reseñadas',
                                                    },
                                                    
                                                    xaxis: {
                                                        title: {
                                                            text: 'Películas',
                                                        },
                                                    },
                                                    yaxis: {
                                                        title: {
                                                            text: 'Número de Reseñas',
                                                        },
                                                    }
                                                };

                                                Plotly.newPlot('most-viewed-movies', data, layout);
                                            });
                                        </script>
                                    <div id="most-viewed-movies" style="width: 100%; height: 400px;"></div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.plot.ly/plotly-3.0.0.min.js" charset="utf-8"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>