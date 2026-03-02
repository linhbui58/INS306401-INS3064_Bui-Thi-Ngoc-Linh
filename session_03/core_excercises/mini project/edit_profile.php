<?php
require "includes/session.php";
require "includes/functions.php";

$users = loadUsers();

foreach ($users as &$u) {

    if ($u['email'] == $_SESSION['user']) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $u['bio'] = sanitize($_POST["bio"]);

            if ($_FILES["avatar"]["name"]) {

                $ext = strtolower(pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION));

                if (in_array($ext, ["jpg","png","jpeg"])) {

                    $file = time().".".$ext;
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], "uploads/".$file);
                    $u['avatar'] = $file;
                }
            }

            saveUsers($users);
            header("Location: profile.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow border-0 rounded-4 p-4">

<h3>Edit Profile</h3>

<form method="POST" enctype="multipart/form-data">

<label>Bio</label>
<textarea name="bio" class="form-control mb-3"></textarea>

<label>Avatar</label>
<input type="file" name="avatar" class="form-control mb-3">

<button class="btn btn-success">Save Changes</button>

</form>

</div>
</div>

</body>
</html>