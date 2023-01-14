<?php
require_once('./classes/DBConnection.php');

?>

<?php
$sql = "UPDATE form_list SET bookmark_id = 1 WHERE id='" . $_GET['id']."'";
$query= mysqli_query($conn, $sql);
$close= mysqli_close($conn);

header('location: admin-dashboard.php');


?>