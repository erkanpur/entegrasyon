<?php
namespace App\Controllers;

use App\Services\OrderService;

class OrderController
{
    private OrderService $service;

    public function __construct()
    {
        $this->service = new OrderService();

        $config = require __DIR__ . '/../../config/config.php';
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        if ($token !== 'Bearer ' . $config['api_token']) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }
    }

    public function list(): void
    {
        header('Content-Type: application/json');
        echo json_encode($this->service->getAll());
    }

    public function show(?string $id): void
    {
        if ($id === null) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing id']);
            return;
        }
        header('Content-Type: application/json');
        $order = $this->service->getById($id);
        if ($order) {
            echo json_encode($order);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Not found']);
        }
    }
}
