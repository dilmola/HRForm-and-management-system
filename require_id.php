<?php
require_once('./classes/DBConnection.php');

?>

<?php
$id = $_GET['id'];
$form = $_GET['code'];


$sql = "UPDATE response_list SET user_id = '$id' WHERE form_code= '$form'";
$query= mysqli_query($conn, $sql);

header('location: staff-dashboard.php');



?>