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
}
