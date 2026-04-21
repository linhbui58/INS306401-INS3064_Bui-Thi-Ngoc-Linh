<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h1>Product List</h1>

<?php $base = dirname($_SERVER['SCRIPT_NAME']); ?>

<a href="<?= $base ?>/index.php/products/create">Create Product</a>

<ul>
    <?php foreach ($products as $p): ?>
        <li><?= $p ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>