<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Shop')</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="min-height: 100vh; display: flex; flex-direction: column;">

<div id="droplets-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 9997; overflow: hidden;"></div>

<div class="ivy-layer">
    <div class="ivy ivy-l-1"></div>
    <div class="ivy ivy-l-2"></div>
    <div class="ivy ivy-l-3"></div>
    
    <div class="ivy ivy-r-1"></div>
    <div class="ivy ivy-r-2"></div>
    <div class="ivy ivy-r-3"></div>
</div>

<div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Корзина</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <a href="{{ route('cart.checkout') }}" class="btn btn-primary {{ empty(session('cart')) ? 'd-none' : '' }}">
                    Оформить заказ
                </a>
            </div>
        </div>
    </div>
</div>
    
    @include('layouts.navbar')

    <div class="container" style="flex-grow: 1;">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>