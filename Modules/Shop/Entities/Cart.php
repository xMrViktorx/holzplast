<?php

namespace Modules\Shop\Entities;

use Carbon\Carbon;
use Modules\Admin\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    /**
     * @var \Shop\Entities\Cart
     */
    private $cart;

    protected $fillable = ['total_price', 'order_id', 'items_count'];

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Create new cart instance.
     *
     * @param  array  $data
     * @return \Shop\Entities\Cart|null
     */
    public function create()
    {
        $now = Carbon::now();
        $cartData = [
            'items_count'           => 1,
            'created_at'            => $now,
            'updated_at'            => $now,
        ];

        $cart_id = Cart::insertGetId($cartData);
        $cart = Cart::find($cart_id);

        $cartTemp = new \stdClass();
        $cartTemp->id = $cart->id;

        session()->put('cart', $cartTemp);

        return $cart;
    }

    /**
     * Add items in a cart with some cart and item details.
     *
     * @param  int  $productId
     * @param  array  $data
     * @return \Shop\Entities\Cart|string|array
     *
     * @throws Exception
     */
    public function addProduct($productId, $data)
    {
        $cart = $this->getCart();

        $now = Carbon::now();

        if (!$cart) {
            $cart = $this->create();
        }
        $product = Product::find($productId);

        $cartProduct = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();

        if (!$cartProduct) {
            CartItem::insert([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'name' => $product->name,
                'quantity' => $data['quantity'],
                'item_price' => $product->price,
                'total_price' => $data['quantity'] * $product->price,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        } else {
            $totalQuantity = $cartProduct->quantity + $data['quantity'];
            $cartProduct->quantity = $totalQuantity;
            $cartProduct->total_price = $totalQuantity * $product->price;
            $cartProduct->save();
        }

        $product->amount -= $data['quantity'];
        $product->save();

        $cartItems = CartItem::where('cart_id', $cart->id)->get();
        $cart->items_count = $cartItems->count();
        $cart->total_price = $cartItems->pluck('total_price')->sum();
        $cart->save();

        return $this->getCart();
    }

    /**
     * Returns cart.
     */
    public function getCart()
    {
        if (session()->has('cart')) {
            $this->cart = Cart::find(session()->get('cart')->id);
        }

        return $this->cart;
    }
}
