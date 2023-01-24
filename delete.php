<?php
    require ("db.php");

    $id = $_POST['id'];

    // echo $id;

    $con->query("DELETE FROM `person` WHERE id='$id'")
?>