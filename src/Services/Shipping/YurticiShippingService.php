<?php
namespace App\Services\Shipping;

use App\Services\Shipping\ShippingServiceInterface;

class YurticiShippingService implements ShippingServiceInterface
{
    public function createLabel(array $order): array
    {
        // TODO: Replace with real Yurti\u00e7i Kargo API integration
        $barcode = 'YP' . rand(100000000, 999999999);

        // In real scenario you would generate PDF here
        return [
            'barcode' => $barcode,
            'label_pdf' => null
        ];
    }
}
