<?php

include './main.php';

if(isset($_POST['submit']))
{
    if (isset($_POST['deleteId']) != '')
    {   
        $id = $_POST['deleteId'];
    }
}

$delUser = new DelUsers($id);
$delUser->delUser();

header("Location: index.php"); exit();
?>