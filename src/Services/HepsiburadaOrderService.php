<?php
namespace App\Services;

class HepsiburadaOrderService implements MarketplaceOrderInterface
{
    public function fetchOrders(): array
    {
        // TODO: Replace with real Hepsiburada API integration
        return [
            [
                'marketplace_id' => 2,
                'external_order_id' => 'H456',
                'status' => 'created',
                'shipping_name' => 'Mehmet Kara',
                'total_price' => 200,
                'items_json' => [
                    ['name' => 'HB Urun', 'qty' => 2, 'price' => 100]
                ],
                'shipping_json' => [
                    'address' => 'Ankara'
                ]
            ]
        ];
    }
}
