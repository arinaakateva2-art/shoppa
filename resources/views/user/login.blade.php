@extends('layouts.layout')

@section('title', 'Авторизация')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-4">Вход</h1>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <div class="text-danger mb-2">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <div class="text-danger mb-2">{{ $message }}</div>
                @enderror

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-block w-100">
                            <i class="fas fa-sign-in-alt"></i> Войти
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<style>
    .input-group {
        display: flex;
        gap: 10px; 
    }

    .input-group .form-control {
        border-radius: 8px !important; 
    }

    .input-group-append {
        display: flex;
    }

    .input-group-text {
        border-radius: 8px !important; 
        background-color: #e9ecef; 
        border: 1px solid #ced4da;
    }
</style>
@endsection