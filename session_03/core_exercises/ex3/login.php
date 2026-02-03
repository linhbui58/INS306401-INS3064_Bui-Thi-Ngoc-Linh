<?php
session_start();

/* Hardcoded credentials */
$correctUser = "admin";
$correctPass = "123456";

/* Initialize counter */
if (!isset($_SESSION['failed'])) {
    $_SESSION['failed'] = 0;
}

$message = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $correctUser && $password === $correctPass) {
        $message = "Login Successful";
        $success = true;
        $_SESSION['failed'] = 0; // reset counter
    } else {
        $_SESSION['failed']++;
        $message = "Invalid Credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #fff;
            width: 100%;
            max-width: 380px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #5a67d8;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }

        .success {
            color: #38a169;
        }

        .error {
            color: #e53e3e;
        }

        .counter {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Login</h2>

    <form method="post">
        <label>Username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>

    <?php if ($message): ?>
        <div class="message <?php echo $success ? 'success' : 'error'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <?php if (!$success && $_SESSION['failed'] > 0): ?>
        <div class="counter">
            Failed Attempts: <?php echo $_SESSION['failed']; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
