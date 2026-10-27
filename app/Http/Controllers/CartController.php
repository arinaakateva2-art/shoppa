<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'qty' => 'required|integer|min:1',
        ]);

        $data = $request->all();
        $product = Product::findOrFail($data['product_id']);
        
        $cart = new Cart();
        $cart->addToCart($product, $data['qty']);

        return view('cart.cart-modal');
    }

    public function show()
    {
        return view('cart.cart-modal');
    }

    public function delItem($product_id)
    {
        $cart = new Cart();
        $cart->delItem($product_id);

        return view('cart.cart-modal');
    }

    public function clear()
    {
        session()->forget(['cart', 'cart_qty', 'cart_total']);
        
        return view('cart.cart-modal');
    }

    public function checkout(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string',
                'address' => 'required|string',
            ]);

            $order = Order::create([
                'qty' => session('cart_qty'),
                'total' => session('cart_total'),
                'status' => 0,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'note' => $request->note,
            ]);

            foreach (session('cart') as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'title' => $item['title'],
                    'price' => $item['price'],
                    'qty' => $item['qty'],
                ]);
            }

            session()->forget(['cart', 'cart_qty', 'cart_total']);

            return redirect()->route('cart.checkout')->with('success', 'Заказ успешно оформлен!');
        }

        return view('cart.checkout');
    }
}