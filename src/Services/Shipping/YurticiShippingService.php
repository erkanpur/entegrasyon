<?php
namespace App\Services\Shipping;

use App\Services\Shipping\ShippingServiceInterface;

class YurticiShippingService implements ShippingServiceInterface
{
    public function createLabel(array $order): array
    {
        // TODO: call Yurtici API
        return [
            'barcode' => '1234567890'
        ];
    }
}
