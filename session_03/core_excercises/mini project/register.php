<?php
require "includes/functions.php";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = sanitize($_POST["email"]);
    $pass  = $_POST["password"];
    $confirm = $_POST["confirm"];

    if ($pass !== $confirm) {
        $msg = "Passwords do not match";
    } elseif (findUser($email)) {
        $msg = "Email already exists";
    } else {

        $users = loadUsers();

        $users[] = [
            "email" => $email,
            "password" => password_hash($pass, PASSWORD_DEFAULT),
            "bio" => "",
            "avatar" => ""
        ];

        saveUsers($users);
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary d-flex align-items-center vh-100">

<div class="container">
<div class="row justify-content-center">
<div class="col-md-5">

<div class="card shadow-lg border-0 rounded-4">
<div class="card-body p-4">

<h3 class="text-center mb-4">Create Account</h3>

<form method="POST">

<input class="form-control mb-3" name="email" placeholder="Email" required>

<input type="password" class="form-control mb-3" name="password" placeholder="Password" required>

<input type="password" class="form-control mb-3" name="confirm" placeholder="Confirm Password" required>

<button class="btn btn-light w-100">Register</button>

</form>

<div class="text-danger mt-3 text-center"><?= $msg ?></div>

<div class="text-center mt-3">
<a href="login.php">Already have account?</a>
</div>

</div>
</div>

</div>
</div>
</div>

</body>
</html>