<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>

<h1>Create Product</h1>

<?php $base = dirname($_SERVER['SCRIPT_NAME']); ?>

<form method="POST" action="<?= $base ?>/index.php/products/create">
    <input type="text" name="name" placeholder="Product name" required>
    <button type="submit">Save</button>
</form>

</body>
</html>