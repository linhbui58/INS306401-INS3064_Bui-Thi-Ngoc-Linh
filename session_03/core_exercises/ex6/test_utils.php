<?php
require_once 'utils.php';

/**
 * Helper function to print PASS / FAIL
 */
function printResult(string $testName, bool $result) {
    echo "<tr>";
    echo "<td>$testName</td>";
    echo "<td class='" . ($result ? "pass" : "fail") . "'>";
    echo $result ? "PASS" : "FAIL";
    echo "</td>";
    echo "</tr>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validation Utilities Test</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6fb;
            padding: 40px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #4f46e5;
            color: #fff;
        }

        .pass {
            color: #166534;
            font-weight: bold;
        }

        .fail {
            color: #b91c1c;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Validation Utilities – Test Results</h2>

<table>
    <tr>
        <th>Test Case</th>
        <th>Result</th>
    </tr>

    <?php
    // sanitize()
    $raw = " <script>alert('x')</script> ";
    printResult("sanitize()", sanitize($raw) !== $raw);

    // validateEmail()
    printResult("validateEmail() – valid", validateEmail("user@example.com"));
    printResult("validateEmail() – invalid", !validateEmail("user@@example"));

    // validateLength()
    printResult("validateLength() – valid range", validateLength("HelloWorld", 5, 15));
    printResult("validateLength() – too short", !validateLength("Hi", 5, 15));

    // validatePassword()
    printResult("validatePassword() – valid", validatePassword("Secure@123"));
    printResult("validatePassword() – invalid", !validatePassword("password"));
    ?>
</table>

</body>
</html>
