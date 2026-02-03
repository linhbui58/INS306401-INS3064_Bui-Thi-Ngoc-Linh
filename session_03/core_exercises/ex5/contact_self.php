<?php
// Detect form submission
$isSubmitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

// Initialize variables
$fullName = $email = $message = "";
$errors = [];
$isSuccess = false;

if ($isSubmitted) {
    $fullName = trim($_POST['fullname'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $message  = trim($_POST['message'] ?? '');

    // Validation
    if ($fullName === '') {
        $errors[] = "Full Name is required.";
    }

    if ($email === '') {
        $errors[] = "Email is required.";
    }

    if ($message === '') {
        $errors[] = "Message is required.";
    }

    // If no validation errors
    if (empty($errors)) {
        $isSuccess = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #4f46e5, #9333ea);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #ffffff;
            width: 100%;
            max-width: 460px;
            padding: 32px;
            border-radius: 14px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
        }

        h2 {
            text-align: center;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
        }

        label {
            font-weight: bold;
            margin-top: 12px;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 110px;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 12px;
            background: #4f46e5;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #4338ca;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 18px;
        }

        .success-box {
            text-align: center;
            color: #166534;
            background: #dcfce7;
            padding: 28px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card">

<?php if ($isSuccess): ?>

    <div class="success-box">
        ✅ Thank You! <br><br>
        Your message has been successfully submitted.
    </div>

<?php else: ?>

    <h2>Contact Us</h2>
    <div class="subtitle">Please fill out the form below</div>

    <?php if (!empty($errors)): ?>
        <div class="error-box">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post">
        <label>Full Name</label>
        <input type="text" name="fullname" value="<?php echo htmlspecialchars($fullName); ?>">

        <label>Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

        <label>Message</label>
        <textarea name="message"><?php echo htmlspecialchars($message); ?></textarea>

        <button type="submit">Send Message</button>
    </form>

<?php endif; ?>

</div>

</body>
</html>
