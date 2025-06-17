<?php
namespace App\Services;

class WooOrderService implements MarketplaceOrderInterface
{
    public function fetchOrders(): array
    {
        // TODO: Replace with real WooCommerce API integration
        return [
            [
                'marketplace_id' => 4,
                'external_order_id' => 'W321',
                'status' => 'created',
                'shipping_name' => 'Fatma Kaya',
                'total_price' => 75,
                'items_json' => [
                    ['name' => 'Woo Urun', 'qty' => 3, 'price' => 25]
                ],
                'shipping_json' => [
                    'address' => 'Bursa'
                ]
            ]
        ];
    }
}
