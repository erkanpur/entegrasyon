<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\OrderController;

$config = require __DIR__ . '/../config/config.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$controller = new OrderController();

switch ($uri) {
    case '/orders':
        if ($method === 'GET') {
            $controller->list();
        }
        break;
    case '/order':
        if ($method === 'GET') {
            $id = $_GET['id'] ?? null;
            $controller->show($id);
        }
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => 'Not Found']);
}
