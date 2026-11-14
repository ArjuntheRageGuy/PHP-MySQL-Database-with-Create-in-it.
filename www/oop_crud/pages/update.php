<?php
// Place in: oop_crud/pages/update.php
require_once '../dao/config.php';   // creates $db
require_once '../dao/crudDAO.php';

$dao = new CrudDAO($db);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id        = (int) ($_POST['id'] ?? 0);
    $lname  = trim($_POST['lname'] ?? '');
    $fname = trim($_POST['fname'] ?? '');
    $username  = trim($_POST['username'] ?? '');
    $email     = trim($_POST['email'] ?? '');

    $dao->update($id, $lname, $fname, $username, $email);
    header("Location: read.php");
    exit;
}

// Show the form: load the row from ?id=
$id   = (int) ($_GET['id'] ?? 0);
$user = $dao->getById($id);

if (!$user) {
    die("Record not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        label {
            display: inline-block;
            width: 100px;
            text-align: left;
        }
        input[type="text"], 
        input[type="email"] {
            width: 200px;
            height: 25px;
        }
        button {
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }
        a {
            margin-left: 10px;
            text-decoration: none;
            color: #007bff;
        }
        form{
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <center>
    <h2>Edit User</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

        <label>Last Name: </label>
        <input type="text" name="lname" value="<?= htmlspecialchars($user['lname']) ?>" required><br><br>

        <label>First Name: </label>
        <input type="text" name="fname" value="<?= htmlspecialchars($user['fname']) ?>" required><br><br>

        <label>Username: </label>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br><br>

        <label>Email: </label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

        <button type="submit">Save</button>
        <a href="read.php">Cancel</a>
    </form>
    </center>
</body>
</html>