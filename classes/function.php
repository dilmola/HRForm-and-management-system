<?php 

ob_start();
require_once('./classes/DBConnection.php');
$db = new DBConnection();





 
function getUsersData($id) {
    $array = array();
    $q = mysql_query($conn,"SELECT * FROM 'user' WHERE 'id'=".$id);
    while($r = mysql_fetch_assoc($q))
    {
        $array['id'] = $row['id'];
        $array['username'] = $row['username'];
        $array['email'] = $row['email'];
        $array['password'] = $row['password'];
        $array['role_id'] = $row['role_id'];
        $array['status_id'] = $row['status_id'];
        $array['form_id'] = $row['form_id'];
    }
    return $array;
}   





function getId($email)
{
    $q = mysql_query($conn,"SELECT * 'id' FROM 'user' WHERE 'email'=".$email);
    while($r = mysql_fetch_assoc($q))
    {
        return $row['id'];
    }


}
?>


