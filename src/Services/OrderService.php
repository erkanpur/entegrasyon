<?php
namespace App\Services;

use App\Helpers\DB;
use PDO;

class OrderService
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DB::getConnection();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM orders ORDER BY created_at DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(string $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM orders WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        return $order ?: null;
    }

    public function save(array $order): void
    {
        $stmt = $this->db->prepare(
            'SELECT id FROM orders WHERE external_order_id = :external_id AND marketplace_id = :marketplace_id'
        );
        $stmt->execute([
            'external_id' => $order['external_order_id'],
            'marketplace_id' => $order['marketplace_id']
        ]);
        $existingId = $stmt->fetchColumn();

        if ($existingId) {
            $update = $this->db->prepare(
                'UPDATE orders SET status = :status, shipping_name = :shipping_name, total_price = :total_price, items_json = :items_json, shipping_json = :shipping_json, sync_date = NOW() WHERE id = :id'
            );
            $update->execute([
                'status' => $order['status'],
                'shipping_name' => $order['shipping_name'],
                'total_price' => $order['total_price'],
                'items_json' => json_encode($order['items_json']),
                'shipping_json' => json_encode($order['shipping_json']),
                'id' => $existingId
            ]);
        } else {
            $insert = $this->db->prepare(
                'INSERT INTO orders (marketplace_id, external_order_id, status, shipping_name, total_price, items_json, shipping_json, created_at, sync_date) VALUES (:marketplace_id, :external_id, :status, :shipping_name, :total_price, :items_json, :shipping_json, NOW(), NOW())'
            );
            $insert->execute([
                'marketplace_id' => $order['marketplace_id'],
                'external_id' => $order['external_order_id'],
                'status' => $order['status'],
                'shipping_name' => $order['shipping_name'],
                'total_price' => $order['total_price'],
                'items_json' => json_encode($order['items_json']),
                'shipping_json' => json_encode($order['shipping_json'])
            ]);
        }
    }

    public function createShippingLabel(int $orderId, array $data): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO shipping_labels (order_id, barcode, label_pdf, created_at) VALUES (:order_id, :barcode, :label_pdf, NOW())'
        );
        $stmt->execute([
            'order_id' => $orderId,
            'barcode' => $data['barcode'],
            'label_pdf' => $data['label_pdf'] ?? null
        ]);
    }
}
