@extends('layouts.layout')

@section('title', $title ?? 'Laravel Shop')

@section('content')
    <div class="product-cards mb-5">
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card h-100 d-flex flex-column">
                        
                        <div class="offer">
                            @if($product->hit) <div class="offer-hit">Hit</div> @endif
                            @if($product->sale) <div class="offer-sale">Sale</div> @endif
                        </div>

                        <div class="card-thumb text-center p-3">
                            <a href="{{ route('product.show', ['slug' => $product->slug]) }}">
                                <img src="{{ $product->getImage() }}" 
                                     alt="{{ $product->title }}" 
                                     class="img-fluid">
                            </a>
                        </div>
                        
                        <div class="card-caption d-flex flex-column flex-grow-1 p-3">
                            <div class="card-title">
                                <a href="{{ route('product.show', ['slug' => $product->slug]) }}">
                                    {{ $product->title }}
                                </a>
                            </div>
                            
                            <div class="card-price text-center mt-auto">
                                @if($product->old_price)
                                    <del>{{ $product->old_price }} руб.</del>
                                @endif
                                {{ $product->price }} руб.
                            </div>
                            
                            <form action="{{ route('cart.add') }}" method="post" class="addtocart mt-2">
                                @csrf
                                <div class="d-flex gap-2">
                                    <input type="number" class="form-control" name="qty" value="1" min="1" max="99" style="max-width: 70px;">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="btn btn-info flex-grow-1 card-addtocart" type="submit">
                                        <i class="fas fa-cart-arrow-down"></i> Купить
                                    </button>
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
            @endforeach
        </div>
    </div>

    <nav aria-label="Page navigation example" class="mt-4">
        {{ $products->links() }}
    </nav>
@endsection