@if(!empty(session('cart')))
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Фото</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Кол-во</th>
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
                        <td>{{ $item['price'] }} руб.</td>
                        <td>{{ $item['qty'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td id="modal-cart-qty" colspan="3" align="right">
                        <b>Итого:</b>
                    </td>
                    <td>{{ session('cart_qty') }}</td>
                </tr>
                <tr>
                    <td id="modal-cart-total" colspan="3" align="right">
                        <b>На сумму:</b>
                    </td>
                    <td>{{ session('cart_total') }} руб.</td>
                </tr>
            </tbody>
        </table>
    </div>
@else
    <h4 class="text-center p-3">Корзина пуста</h4>
@endif