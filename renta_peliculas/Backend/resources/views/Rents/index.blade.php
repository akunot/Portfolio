<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mi Carrito</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets_home/css/styles.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets_cart/css/cart_show.css') }}" rel="stylesheet" />
</head>
<body class="bg-dark">
    @include('layouts.header')

    <section class="movie-form-section py-5">
        <div class="container">
            <div class="movie-form-container">
                <h1 class="form-title">
                    <i class="bi bi-cart3 me-2"></i>Mi Carrito
                </h1>
                
                @if($cart && $cart->movie->isNotEmpty())
                <div class="cart-items">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr class="fw-bold text-gold">
                                <th scope="col">Película</th>
                                <th scope="col" class="text-center">Cantidad</th>
                                <th scope="col" class="text-end">Precio Unitario</th>
                                <th scope="col" class="text-end">Subtotal</th>
                                <th scope="col" class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart->movie as $movie)
                            <tr>
                                <td>{{ $movie->name }}</td>
                                <td class="text-center">{{ $movie->pivot->quantity }}</td>
                                <td class="text-end">${{ number_format($movie->pivot->price, 2) }}</td>
                                <td class="text-end">${{ number_format($movie->pivot->quantity * $movie->pivot->price, 2) }}</td>
                                <td class="text-end">
                                    <form action="{{ route('rents.remove', $movie->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash me-2"></i>Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="total-section mt-5 pt-4" style="border-top: 2px solid #ffd700;">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-between fw-bold fs-5 text-gold">
                                    <span>Total:</span>
                                    <span>${{ number_format($cart->movie->sum(function($movie) {
                                        return $movie->pivot->quantity * $movie->pivot->price;
                                    }), 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="checkout-section mt-5 text-center">
                        <form action="{{ route('rents.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-save btn-lg px-5 py-3" style="display: inline-block;">
                                <i class="bi bi-credit-card me-2"></i>Finalizar Compra
                            </button>
                        </form>
                    </div>
                </div>

                @elseif($pendingReturn == true)
                <div class="pending-return-alert text-center py-5">
                    <i class="bi bi-exclamation-triangle display-4 text-warning mb-4"></i>
                    <h3 class="text-warning mb-3">Tienes una devolución pendiente</h3>
                    <a href="{{ route('users.show', Auth::user()->id) }}" class="btn btn-outline-warning">
                        <i class="bi bi-arrow-left me-2"></i>Ver Devolución
                    </a>
                </div>

                @else
                <div class="empty-cart text-center py-5">
                    <i class="bi bi-cart-x display-4 text-gold mb-4"></i>
                    <h3 class="text-gold mb-3">Tu carrito está vacío</h3>
                    <a href="{{ route('movies.index') }}" class="btn btn-outline-warning">
                        <i class="bi bi-arrow-left me-2"></i>Explorar Películas
                    </a>
                </div>
                @endif

                
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <!-- Custom JS -->
</body>
</html>