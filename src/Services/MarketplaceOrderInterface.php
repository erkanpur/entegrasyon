<?php
namespace App\Services;

interface MarketplaceOrderInterface
{
    public function fetchOrders(): array;
}
