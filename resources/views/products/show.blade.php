@extends('layouts.layout')

@section('title', $product->title)

@section('content')
    <div class="row mt-5 mb-5">
        
        <div class="col-md-6 mb-4">
            <div class="flower-frame shadow-sm">
                <img src="{{ $product->getImage() }}" 
                     alt="{{ $product->title }}" 
                     class="product-img">
            </div>
        </div>

        <div class="col-md-6 mb-4 d-flex flex-column justify-content-center">
            <h1 class="display-5 fw-bold mb-4" style="color: #2d0a4e;">{{ $product->title }}</h1>
            
            <ul class="list-unstyled" style="font-size: 16px;">
                <li class="mb-3">
                    <span class="text-muted">Категория:</span> 
                    <a href="{{ route('categories.show', ['slug' => $product->category->slug]) }}" style="color: #a8d8ea; font-weight: 600; text-decoration: none;">
                        {{ $product->category->title }}
                    </a>
                </li>
                <li class="mb-3">
                    <span class="text-muted">Наличие:</span> 
                    <span class="
                        @if($product->status->slug == 'v-nalichii') text-success 
                        @elseif($product->status->slug == 'pod-zakaz') text-warning 
                        @endif
                        fw-bold">
                        <i class="fas {{ $product->status->icon ?? 'fa-check' }}"></i> 
                        {{ $product->status->title }}
                    </span>
                </li>
            </ul>

            <div class="my-4 p-3" style="background: #f8f9fa; border-radius: 12px; display: inline-block;">
                <span class="text-muted small d-block mb-1">Цена:</span>
                <span style="font-size: 32px; color: #a8d8ea; font-weight: 800;">
                    @if($product->old_price)
                        <del class="text-muted me-2" style="font-size: 20px;">{{ $product->old_price }} ₽</del>
                    @endif
                    {{ $product->price }} ₽
                </span>
            </div>

            <form action="{{ route('cart.add') }}" method="post" class="addtocart mt-2">
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="qty" class="col-form-label fw-bold">Кол-во:</label>
                    </div>
                    <div class="col-3">
                        <input type="number" id="qty" class="form-control form-control-lg text-center" name="qty" value="1" min="1" max="99" style="font-weight: bold;">
                    </div>
                    <div class="col-7">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-info btn-lg w-100" type="submit" style="font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">
                            <i class="fas fa-cart-arrow-down me-2"></i> Купить
                        </button>
                    </div>
                </div>
            </form>

            <hr class="my-4">

            <h4 class="fw-bold mb-3" style="color: #2d0a4e;">Описание</h4>
            <p class="text-muted" style="line-height: 1.8; font-size: 15px;">
                {{ $product->content ?? 'Описание отсутствует.' }}
            </p>
        </div>
    </div>
@endsection

<style>
    body {
        min-height: 100vh;
    }

    .flower-frame {
        position: relative;
        width: 100%;
        height: 500px;
        background: #fff;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        
        border: 2px dashed #a8d8ea; 
        
        box-shadow: 0 4px 15px rgba(168, 216, 234, 0.2); 
    }

    .product-img {
        position: relative;
        z-index: 2; 
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        background: #fff;
        border-radius: 8px;
        padding: 5px;
    }

    .ivy {
        opacity: 0.3 !important;
        filter: blur(2px) !important;
    }

    @media (max-width: 991px) {
        .ivy-layer {
            display: none;
        }
    }
</style>