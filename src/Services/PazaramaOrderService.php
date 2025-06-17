<?php
namespace App\Services;

class PazaramaOrderService implements MarketplaceOrderInterface
{
    public function fetchOrders(): array
    {
        // TODO: Replace with real Pazarama API integration
        return [
            [
                'marketplace_id' => 3,
                'external_order_id' => 'P789',
                'status' => 'created',
                'shipping_name' => 'Ayse Demir',
                'total_price' => 150,
                'items_json' => [
                    ['name' => 'Pazarama Urun', 'qty' => 1, 'price' => 150]
                ],
                'shipping_json' => [
                    'address' => 'Izmir'
                ]
            ]
        ];
    }
}
