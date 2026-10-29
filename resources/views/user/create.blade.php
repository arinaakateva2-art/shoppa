@extends('layouts.layout')

@section('title', 'Регистрация')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-4">Регистрация</h1>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('name')
                    <div class="text-danger mb-2">{{ $message }}</div>
                @enderror

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

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-block w-100">
                            <i class="fas fa-user-plus"></i> Зарегистрироваться
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<style>
    .input-group {
        display: flex !important;
        gap: 8px !important; 
    }

    .input-group .form-control {
        border-radius: 8px !important; 
    }

    .input-group-text {
        border-radius: 8px !important; 
        background-color: #e9ecef !important;
        border: 1px solid #ced4da !important;
    }
</style>