<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../classes/Database.php';

$db = Database::getInstance();

try {
    $courses = $db->fetchAll("SELECT * FROM courses ORDER BY id DESC");
} catch (Exception $e) {
    die('System error');
}
?>

<h2>Courses</h2>
<a href="create.php">+ Add</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Action</th>
</tr>

<?php foreach ($courses as $c): ?>
<tr>
    <td><?= $c['id'] ?></td>
    <td><?= htmlspecialchars($c['title']) ?></td>
    <td>
        <a href="edit.php?id=<?= $c['id'] ?>">Edit</a>
        <a href="delete.php?id=<?= $c['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>