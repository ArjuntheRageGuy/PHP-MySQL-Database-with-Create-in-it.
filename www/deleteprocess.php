<?php
    // Place in: oop_crud/process/deleteprocess.php
    require_once '../dao/config.php';   // creates $db
    require_once '../dao/crudDAO.php';

    $id = (int) ($_GET['id'] ?? 0);

    if ($id > 0) {
        $dao = new CrudDAO($db);
        $dao->delete($id);
    }

    header("Location: ../pages/read.php");
    exit;
?>