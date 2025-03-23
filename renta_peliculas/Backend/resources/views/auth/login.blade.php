@extends('layouts.app', ['invisible' => true])

@section('content')
@include('layouts.header')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets_auth/css/login.css') }}">
<link href="{{asset ('assets_home/css/styles.css')}}" rel="stylesheet" />

<div class="auth-container">
    <div class="cinematic-card">
        <div class="auth-header">
            <h2 class="cinematic-title">{{ __('Acceso de Usuario') }}</h2>
            <div class="gold-bar"></div>
        </div>

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <!-- Email Input -->
            <div class="form-group">
                <div class="input-group">
                    <i class="bi bi-envelope input-icon"></i>
                    <input id="email" type="email" class="form-input @error('email') input-error @enderror" 
                           name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autofocus>
                </div>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <div class="input-group">
                    <i class="bi bi-lock input-icon"></i>
                    <input id="password" type="password" class="form-input @error('password') input-error @enderror" 
                           name="password" placeholder="Contraseña" required>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="custom-checkbox"></span>
                    {{ __('Recordar sesión') }}
                </label>
                
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="gold-link">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="auth-button">
                    <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Ingresar') }}
                </button>
            </div>

            <!-- Registration Link -->
            <div class="auth-footer">
                <span class="text-muted">¿Primera vez aquí? <a href="{{ route('register') }}" class="gold-link">Crea una cuenta</a></span>
            </div>
        </form>
    </div>
</div>
@include('layouts.footer')
@endsection
