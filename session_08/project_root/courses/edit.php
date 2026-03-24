<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/ValidationException.php';

$db = Database::getInstance();

$id = (int)($_GET['id'] ?? 0);

try {
    $course = $db->fetch("SELECT * FROM courses WHERE id = ?", [$id]);
} catch (Exception $e) {
    die('System error');
}

$title = $course['title'] ?? '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $title = trim($_POST['title']);

        if ($title === '') $errors['title'] = 'Required';
        elseif (strlen($title) < 3) $errors['title'] = 'Min 3 chars';

        if ($errors) throw new ValidationException($errors);

        $db->update('courses', ['title' => $title], 'id = ?', [$id]);

        header('Location: index.php');
        exit;

    } catch (ValidationException $e) {
        $errors = $e->getErrors();
    } catch (Exception $e) {
        die('System error');
    }
}
?>

<h2>Edit</h2>
<form method="POST">
<input name="title" value="<?= htmlspecialchars($title) ?>">
<div style="color:red"><?= $errors['title'] ?? '' ?></div>
<button>Update</button>
</form>