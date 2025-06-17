<?php
namespace App\Services;

class TrendyolOrderService implements MarketplaceOrderInterface
{
    public function fetchOrders(): array
    {
        // TODO: Replace with real Trendyol API integration
        return [
            [
                'marketplace_id' => 1,
                'external_order_id' => 'T123',
                'status' => 'created',
                'shipping_name' => 'Ahmet Yilmaz',
                'total_price' => 100.5,
                'items_json' => [
                    ['name' => 'Urun A', 'qty' => 1, 'price' => 50.25],
                    ['name' => 'Urun B', 'qty' => 1, 'price' => 50.25]
                ],
                'shipping_json' => [
                    'address' => 'Istanbul'
                ]
            ]
        ];
    }
}
