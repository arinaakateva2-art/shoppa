@extends('layouts.layout')

@section('title', 'Админ-панель')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4" style="color: #2d0a4e; font-weight: 800;">Админ-панель</h1>
        <p class="text-muted mb-4">Добро пожаловать, {{ Auth::user()->name }}! Здесь вы можете управлять магазином.</p>

        <div class="row mb-5">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0" style="background: #f3e8ff; border-radius: 12px;">
                    <div class="card-body text-center">
                        <i class="fas fa-box fa-3x mb-3" style="color: #a8d8ea;"></i>
                        <h2 class="fw-bold">{{ $productsCount }}</h2>
                        <p class="text-muted mb-0">Товаров</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0" style="background: #f3e8ff; border-radius: 12px;">
                    <div class="card-body text-center">
                        <i class="fas fa-shopping-bag fa-3x mb-3" style="color: #a8d8ea;"></i>
                        <h2 class="fw-bold">{{ $ordersCount }}</h2>
                        <p class="text-muted mb-0">Заказов</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0" style="background: #f3e8ff; border-radius: 12px;">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x mb-3" style="color: #a8d8ea;"></i>
                        <h2 class="fw-bold">{{ $usersCount }}</h2>
                        <p class="text-muted mb-0">Пользователей</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('admin.products.index') }}" class="btn btn-lg px-5 py-3 shadow" 
               style="background-color: #a8d8ea; color: #fff; font-weight: 700; border-radius: 12px; text-transform: uppercase; letter-spacing: 1px;">
                <i class="fas fa-boxes me-2"></i> Управление товарами
            </a>
        </div>
    </div>
@endsection