@extends('layouts.layout')

@section('title', $category->title)

@section('content')
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold" style="color: #333;">{{ $category->title }}</h1>
        <p class="text-muted">Товары в категории "{{ $category->title }}"</p>
    </div>

    <div class="row">
        @forelse($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="product-card h-100 d-flex flex-column">
                    
                    <div class="offer">
                        @if($product->hit) <div class="offer-hit">Hit</div> @endif
                        @if($product->sale) <div class="offer-sale">Sale</div> @endif
                    </div>

                    <div class="card-thumb text-center p-3">
                        <a href="{{ route('products.show', ['slug' => $product->slug]) }}">
                            <img src="{{ $product->getImage() }}" alt="{{ $product->title }}" class="img-fluid">
                        </a>
                    </div>

                    <div class="card-caption d-flex flex-column flex-grow-1 p-3">
                        <div class="card-title">
                            <a href="{{ route('products.show', ['slug' => $product->slug]) }}" class="text-decoration-none" style="color: #555;">
                                {{ $product->title }}
                            </a>
                        </div>
                        
                        <div class="card-price text-center mt-auto">
                            @if($product->old_price) <del class="text-muted small me-2">{{ $product->old_price }} ₽</del> @endif
                            <span class="fw-bold" style="font-size: 20px;">{{ $product->price }} ₽</span>
                        </div>
                        
                        <form action="{{ route('cart.add') }}" method="post" class="addtocart mt-2">
                            @csrf
                            <div class="input-group">
                                <input type="number" class="form-control" name="qty" value="1" min="1" max="99">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input-group-append">
                                    <button class="btn btn-info btn-block card-addtocart" type="submit">Купить</button>
                                </div>
                            </div>
                        </form>

                        <div class="item-status 
                            @if($product->status->slug == 'v-nalichii') status-instock 
                            @elseif($product->status->slug == 'pod-zakaz') status-onorder 
                            @endif">
                            <i class="fas {{ $product->status->icon ?? 'fa-check' }}"></i> 
                            {{ $product->status->title }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted py-5">В этой категории пока пусто...</p>
            </div>
        @endforelse
    </div>

    <nav aria-label="Page navigation example" class="mt-5">
        {{ $products->links() }}
    </nav>
@endsection