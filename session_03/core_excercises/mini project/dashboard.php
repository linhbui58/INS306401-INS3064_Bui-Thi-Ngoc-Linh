<?php require "includes/session.php"; ?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4">
<span class="navbar-brand">User System</span>
<a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
</nav>

<div class="container mt-5">

<div class="card shadow border-0 rounded-4 text-center p-5">

<h2>Welcome</h2>
<h4 class="text-primary"><?= $_SESSION['user'] ?></h4>

<a href="profile.php" class="btn btn-outline-primary mt-3">View Profile</a>

</div>

</div>

</body>
</html>
