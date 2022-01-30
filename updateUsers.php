<?php

include './main.php';

if(isset($_POST['submit']))
{
    if (isset($_POST['inputId']) != '')
    {
        $birthday = $_POST['inputBirthday'];
        $date2 = $birthday;
        $date2time = strtotime($date2);
        $_POST['inputSex'] == 'Женский' ?  $sex = '' : $sex = '1';       
        $id = $_POST['inputId'];
    }
}
$setUser = new UpdateClass($birthday, $sex, $id);

$year = Users::getAge($date2time);

$setUser->updateUsers($year);

header("Location: index.php"); exit();

?>