<?php
require_once '../dao/config.php';
require_once '../dao/crudDAO.php';

$dao = new crudDAO($db);
$emailError = '';
$passwordError = '';
$email = '';
$lname = '';
$fname = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lname = trim($_POST['lname'] ?? '');
    $fname = trim($_POST['fname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email !== '') {
        $stmt = $db->prepare('SELECT 1 FROM users WHERE email = :email LIMIT 1');
        $stmt->execute([':email' => $email]);
        if ($stmt->fetchColumn()) {
            $emailError = 'The email is already registered!';
        }
    }

    if (!preg_match('/\A(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{6,12}\z/', $password)) {
        $passwordError = 'Password complexity requirements are not met! Password must contain 1 uppercase letter, 1 lowercase letter, any number like 0 to 9, no special char like "!" and "@", minimum of 6 characters, and a maximum of 12 characters.';
    }

    if ($emailError === '' && $passwordError === '') {
        $dao->create($lname, $fname, $username, $password, $email);
        header('Location: read.php');
        exit;
    }
}
?>