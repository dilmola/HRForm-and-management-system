<?php
require_once('./classes/DBConnection.php');

?>

<?php
$sql = "DELETE FROM form_list WHERE id='" . $_GET['id']."'";
$query= mysqli_query($conn, $sql);
$close= mysqli_close($conn);

header('location: admin-dashboard.php');


?>