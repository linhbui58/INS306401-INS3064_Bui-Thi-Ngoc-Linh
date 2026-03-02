<?php
require "includes/session.php";
require "includes/functions.php";

$user = findUser($_SESSION['user']);
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow border-0 rounded-4 text-center p-4">

<?php if ($user['avatar']) : ?>
<img src="uploads/<?= $user['avatar'] ?>" class="rounded-circle mb-3" width="120">
<?php else: ?>
<img src="https://i.pravatar.cc/120" class="rounded-circle mb-3">
<?php endif; ?>

<h4><?= $user['email'] ?></h4>

<p class="text-muted"><?= $user['bio'] ?: "No bio yet" ?></p>

<a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>

</div>

</div>

</body>
</html>