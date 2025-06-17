<?php
namespace App\Services\Shipping;

interface ShippingServiceInterface
{
    public function createLabel(array $order): array;
}
