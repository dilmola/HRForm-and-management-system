<?php
require_once('./classes/DBConnection.php');

?>

<?php
$sql = "DELETE FROM user WHERE id='" . $_GET['id']."'";
$query= mysqli_query($conn, $sql);
$close= mysqli_close($conn);

header('location: add-staff.php');


?>