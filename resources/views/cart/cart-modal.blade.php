@if(!empty(session('cart')))
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Фото</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col"></th> 
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $item)
                    <tr>
                        <td>
                            <a href="{{ route('products.show', ['slug' => $item['slug']]) }}">
                                <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" style="max-width: 50px;">
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('products.show', ['slug' => $item['slug']]) }}">
                                {{ $item['title'] }}
                            </a>
                        </td>
                        <td>@priceFormat($item['price']) руб.</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>
                            <span class="text-danger del-item" 
                                  data-action="{{ route('cart.del_item', ['product_id' => $item['id']]) }}"
                                  style="cursor: pointer;">
                                <i class="fas fa-times"></i>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <button type="button" class="btn btn-outline-danger btn-sm clear-cart" 
                    data-action="{{ route('cart.clear') }}">
                <i class="fas fa-trash-alt"></i> Очистить корзину
            </button>
        </div>
        <div class="text-end">
            <div class="text-muted small mb-1">
                Товаров: <span id="modal-cart-qty">{{ session('cart_qty') }}</span>
            </div>
            <div class="fw-bold" style="font-size: 20px; color: var(--neon-purple);">
                Итого: <span id="modal-cart-total">@priceFormat(session('cart_total')) руб.</span>
            </div>
        </div>
    </div>
@else
    <h4 class="text-center py-4" style="color: var(--text-muted);">Ваша корзина пуста</h4>
@endif