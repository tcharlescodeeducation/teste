<?php

use CodeDelivery\Models\Order;
use CodeDelivery\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    public function run()
    {
        factory(Order::class, 10)->create()->each(function($order)
        {
            for($i = 0; $i<= 2; $i++)
            {
                $order->items()->save(factory(OrderItem::class)->make(
                    [
                        'product_id' => rand(1,5),
                        'qtd' => 2,
                        'price' => 50,
                    ]
                ));
            }
        });
    }
}
