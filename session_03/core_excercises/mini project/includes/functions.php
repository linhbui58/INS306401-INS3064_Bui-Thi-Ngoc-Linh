<?php

function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function loadUsers() {
    return json_decode(file_get_contents("data/users.json"), true) ?? [];
}

function saveUsers($users) {
    file_put_contents("data/users.json", json_encode($users, JSON_PRETTY_PRINT));
}

function findUser($email) {
    $users = loadUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email) return $user;
    }
    return null;
}
