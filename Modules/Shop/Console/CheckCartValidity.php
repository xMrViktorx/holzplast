<?php

namespace Modules\Shop\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Shop\Entities\Cart;
use Modules\Admin\Entities\Product;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CheckCartValidity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'shop:checkCartValidity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the cart validity in every hour';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $carts = Cart::whereNull('order_id')
            ->where('updated_at', '<', Carbon::now()->subHour())
            ->get();
        \Log::info('itt');
        foreach ($carts as $cart) {
            foreach ($cart->cart_items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->amount += $item->quantity;
                    $product->save();
                }
            }
            $cart->delete();
        }
    }
}
