<?php
include_once './db.php';
include './main.php';

if(isset($_POST['submit']))
    {
        $err = [];

        // проверяем имя

        if(!preg_match("/^[a-zA-Z]+$/",$_POST['firstName']))
            {
                $err[] = "Имя может состоять только из букв английского алфавита";
            } 
    
        //проверяем, не существует ли данных с таким именем
        $db = get_connection();

        $sql = "SELECT id FROM users WHERE firstName=:userfn ";

        $result = $db->prepare($sql);
        $result ->bindValue(":userfn", $_POST["firstName"]);
        $result->execute();

        //Если есть запись
        if ($result->rowCount() > 0)
            {
                $err[] = "Данные с таким именем уже существует в базе данных";
            }

        // Если нет ошибок, то добавляем в БД нового пользователя
        if(count($err) == 0)
            {
                $firstName = $_POST['firstName'];           //имя
                $lastName = $_POST['lastName'];             //фамилия
                $birthday = $_POST['birthday'];             //дата рождения
                $date2 = $birthday;              
                $date2time = strtotime($date2);             //преобразования даты в формат timestamp
                $_POST['sex'][0] == 'Женский' ?  $sex = '' : $sex = '1';  //пол
                $town = $_POST['town'];                                   //город
                $user = new Users($firstName, $lastName, $birthday, $sex, $town);
                $year = Users::getAge($date2time);                               // вызов статического метода
                $user->addUsers($year);
                
                
                header("Location: index.php"); exit();                           // переход на главную страницу
            }
        else
            {
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
                foreach($err AS $error)
                    {
                        print $error."<br>";
                    }
            }
    }
    

?>