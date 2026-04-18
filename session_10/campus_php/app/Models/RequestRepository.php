<?php

require_once "Database.php";
require_once "Request.php";

class RequestRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all(): array
    {
        $stmt = $this->db->query("SELECT * FROM requests");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($data as $row) {
            $result[] = new Request($row['id'], $row['title'], $row['status']);
        }

        return $result;
    }

    public function find(int $id): ?Request
    {
        $stmt = $this->db->prepare("SELECT * FROM requests WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new Request($row['id'], $row['title'], $row['status']);
    }

    public function add(string $title): void
    {
        $stmt = $this->db->prepare(
            "INSERT INTO requests (title, status) VALUES (?, 'Pending')"
        );
        $stmt->execute([$title]);
    }
}