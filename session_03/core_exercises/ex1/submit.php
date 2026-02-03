<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submission Result</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .result-box {
            background: #fff;
            padding: 30px;
            width: 100%;
            max-width: 420px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .error {
            color: #e53e3e;
            text-align: center;
            font-weight: bold;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #667eea;
        }
    </style>
</head>
<body>

<div class="result-box">
    <h2>Submitted Information</h2>

    <?php
    $fullname = $_POST['fullname'] ?? '';
    $email    = $_POST['email'] ?? '';
    $phone    = $_POST['phone'] ?? '';
    $message  = $_POST['message'] ?? '';

    if (empty($fullname) || empty($email) || empty($phone) || empty($message)) {
        echo "<p class='error'>Missing Data</p>";
    } else {
        echo "<ul>";
        echo "<li><strong>Full Name:</strong> $fullname</li>";
        echo "<li><strong>Email:</strong> $email</li>";
        echo "<li><strong>Phone:</strong> $phone</li>";
        echo "<li><strong>Message:</strong> $message</li>";
        echo "</ul>";
    }
    ?>

    <a href="contact.html">← Back to Contact Form</a>
</div>

</body>
</html>
