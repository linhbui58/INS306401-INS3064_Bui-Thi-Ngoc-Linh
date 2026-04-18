<?php

require_once "../app/Controllers/RequestController.php";

$controller = new RequestController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'show':
        $id = (int)($_GET['id'] ?? 0);
        $controller->show($id);
        break;

    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;

    default:
        $controller->index();
}