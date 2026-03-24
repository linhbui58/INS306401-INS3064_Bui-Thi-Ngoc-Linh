<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/ValidationException.php';

$db = Database::getInstance();
$title = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $title = trim($_POST['title']);

        if ($title === '') $errors['title'] = 'Required';
        elseif (strlen($title) < 3) $errors['title'] = 'Min 3 chars';

        if ($errors) throw new ValidationException($errors);

        $db->insert('courses', ['title' => $title]);

        header('Location: index.php');
        exit;

    } catch (ValidationException $e) {
        $errors = $e->getErrors();
    } catch (Exception $e) {
        die('System error');
    }
}
?>

<h2>Create</h2>
<form method="POST">
<input name="title" value="<?= htmlspecialchars($title) ?>">
<div style="color:red"><?= $errors['title'] ?? '' ?></div>
<button>Save</button>
</form>