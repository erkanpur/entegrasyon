<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Services\{TrendyolOrderService, HepsiburadaOrderService, PazaramaOrderService, WooOrderService, OrderService};

$services = [
    new TrendyolOrderService(),
    new HepsiburadaOrderService(),
    new PazaramaOrderService(),
    new WooOrderService()
];

$orderService = new OrderService();

foreach ($services as $service) {
    $orders = $service->fetchOrders();
    foreach ($orders as $order) {
        $orderService->save($order);
    }
}
