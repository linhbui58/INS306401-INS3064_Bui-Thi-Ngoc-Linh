<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

$id = (int)($_GET['id'] ?? 0);

try {
    if ($id) {
        $db->delete('courses', 'id = ?', [$id]);
    }
} catch (Exception $e) {
    die('System error');
}

header('Location: index.php');
exit;