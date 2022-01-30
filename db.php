<?php

function get_connection()
{
    return new PDO('mysql:host=localhost;dbname=steelladymax', 'root', '');
}



function getUsersList()
{
    $db = get_connection();
    $query = 'SELECT * FROM users ORDER BY id';
    
    return $db->query($query,PDO::FETCH_ASSOC);

}

?>