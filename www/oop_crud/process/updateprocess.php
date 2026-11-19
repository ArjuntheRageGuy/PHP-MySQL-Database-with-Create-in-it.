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