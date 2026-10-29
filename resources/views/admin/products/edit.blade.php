@extends('layouts.layout')

@section('title', 'Редактировать товар')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Редактировать: {{ $product->title }}</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
            @include('admin.products._form')
        </form>
    </div>
@endsection