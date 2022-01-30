<?php

include_once './db.php';

class Users 
{
	public $firstName ;
	public $lastName ;
	public $birthday ;
	public $sex ;
	public $town ;

    function __construct($firstName, $lastName, $birthday, $sex, $town)
    {
        $this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->birthday = $birthday;
		$this->sex = $sex;
		$this->town = $town;
        
    }

    //Добавление данных в SQL
    public function addUsers($age)
    {		
        
        $db = get_connection();
        $sql = "INSERT INTO Users (firstName, lastName, birthday, sex, age, town) VALUES ('$this->firstName', '$this->lastName', '$this->birthday', '$this->sex', '$age', '$this->town')";
        $db->exec($sql);

    }

    //Вычисляем возраст
    static function getAge($date2time){
        $date1 = date('Y-m-d');
        $date1time = strtotime($date1);
        $diff = abs($date1time - $date2time);
        $diff_year = intval($diff / (3600 * 24 * 365));
        $year = floor($diff_year);
        return $year;
        
    }


}

//Изменение данных в SQL
class UpdateClass extends Users{

	public $birthday ;
	public $sex ;
	public $id ;

    function __construct($birthday, $sex, $id)
    {
		$this->birthday = $birthday;
		$this->sex = $sex;
		$this->id = $id;
        
    }

    public function updateUsers($age){

        $db = get_connection();       
        $sql = "UPDATE Users SET birthday = :userbirthday, age = :userage, sex = :usersex WHERE id = :userid";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":userid", $this->id);
        $stmt->bindValue(":usersex", $this->sex);
        $stmt->bindValue(":userbirthday", $this->birthday);
        $stmt->bindValue(":userage", $age);
          
    $stmt->execute();
    }
}


//Удаление данных из SQL
class  DelUsers extends Users
{

    function __construct($id)
    {
	
		$this->id = $id;
        
    }

        
    public function delUser(){
        
        $db = get_connection();
        $sql = "DELETE FROM Users WHERE id = $this->id";
        $db->exec($sql);
    }

}



?>