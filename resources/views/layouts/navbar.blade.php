<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Laravel Shop</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                
                @if(isset($categories) && count($categories) > 0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Каталог
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('categories.show', ['slug' => $category->slug]) }}">
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            </ul>
            
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary get-cart" data-url="{{ route('cart.show') }}">
                        Корзина 
                        <span class="badge badge-light mini-cart-qty">{{ session('cart_qty') ?? 0 }}</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>