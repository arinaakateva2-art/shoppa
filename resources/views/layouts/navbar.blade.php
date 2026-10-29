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
            
            <ul class="navbar-nav align-items-center">
                <li class="nav-item me-3">
                    <button type="button" class="btn btn-primary get-cart" data-url="{{ route('cart.show') }}">
                        Корзина 
                        <span class="badge badge-light mini-cart-qty">{{ session('cart_qty') ?? 0 }}</span>
                    </button>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            @if(Auth::user()->is_admin)
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                        <i class="fas fa-cog me-1"></i> Админ-панель
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt me-1"></i> Выйти
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.create') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Вход
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.create') }}">
                            <i class="fas fa-user-plus me-1"></i> Регистрация
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>