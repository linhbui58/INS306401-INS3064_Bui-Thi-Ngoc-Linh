<?php
session_start();
require "includes/functions.php";

$_SESSION['fail'] = $_SESSION['fail'] ?? 0;
$msg = "";

if ($_SESSION['fail'] >= 3) {
    die("Too many failed attempts");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = findUser($_POST["email"]);

    if ($user && password_verify($_POST["password"], $user["password"])) {

        $_SESSION['user'] = $user["email"];
        $_SESSION['fail'] = 0;

        header("Location: dashboard.php");
    } else {
        $_SESSION['fail']++;
        $msg = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark d-flex align-items-center vh-100">

<div class="container">
<div class="row justify-content-center">
<div class="col-md-4">

<div class="card shadow-lg border-0 rounded-4">
<div class="card-body p-4">

<h3 class="text-center mb-4">Login</h3>

<form method="POST">

<input class="form-control mb-3" name="email" placeholder="Email" required>

<input type="password" class="form-control mb-3" name="password" placeholder="Password" required>

<button class="btn btn-primary w-100">Login</button>

</form>

<div class="text-danger mt-3 text-center"><?= $msg ?></div>

<div class="text-center mt-3">
<a href="register.php">Create account</a>
</div>

</div>
</div>

</div>
</div>
</div>

</body>
</html>