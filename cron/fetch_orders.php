<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Services\{TrendyolOrderService, HepsiburadaOrderService, PazaramaOrderService, WooOrderService};

$services = [
    new TrendyolOrderService(),
    new HepsiburadaOrderService(),
    new PazaramaOrderService(),
    new WooOrderService()
];

foreach ($services as $service) {
    $orders = $service->fetchOrders();
    // TODO: save orders to DB
}
