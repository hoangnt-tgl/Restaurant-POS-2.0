<?php
require_once('./php/dbhelp.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = 'delete from menu where ID = ' .$id;
    execute($sql);
}
?>