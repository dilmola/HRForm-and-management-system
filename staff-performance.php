<?php 

ob_start();
require_once('./classes/DBConnection.php');
$db = new DBConnection();
session_start();

ob_end_flush();



$id = $_GET['id'];


$query = mysqli_query($conn, "SELECT * from user WHERE id='$id'");

while ($row = mysqli_fetch_array($query )){
  $user_id = $row['id'];
  $fullname = $row['fullname'];
$username = $row['username'];

}



?>

<?php
if (isset($_SESSION["email"])){
    $email = $_SESSION["email"];
    $query = "SELECT * FROM user WHERE email = '{$email}'";

    $select_user_email_query = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($select_user_email_query)) {
        $username2 = $row['username'];

    }
}

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="includes/style.css">
        

        <link rel = "icon" href = "includes/icon.png" type = "image/icon">
        <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel='stylesheet'>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"> 
        
    </head>

    <body class="dashboard-body" onload="loaded();">
     
      <div class="admin-dashboard">
        <header class="header-dashboard d-flex justify-content-end">
                
        <h2 class="header-dashboard__name">Hi! <?php echo $username2; ?></h2>
                  
        </header>
        



                        <!-- Sidebar part-->
                                   
                            <div class="sidebar-box">        
                                        <div class="sidebar">
                                            <nav class="nav">
                            
                                                
                            
                                                    <div class="nav__list">
                                                    <a href="./admin-dashboard.php?id=<?php echo $user_id?>" class="nav__logo">
                                                            <img src="includes/logo.svg" alt="" class="nav__logo" >
                                                        </a>
                                                        
                                                    </div>
                                
                                                    <div class="nav__list">
                                                    <a href="#" class="nav__link d-flex justify-content-start">
                                                            <i class='bx bx-user nav__icon' ></i>

                                                            <span class="nav__name">Employee</span>
                                                            <i class='bx bx-chevron-down'></i>
                                                        </a>
                                                        <div class="sub-menu ">
                                                            <a href="./add-staff.php" class="sub-item nav__link border-top">Add employee</a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="nav__list">
                                                        
                                                        
                                                        <a href="#" class="nav__link d-flex justify-content-start">
                                                            <i class='bx bx-message-square-detail nav__icon' ></i>
                                                            <span class="nav__name">Data</span>
                                                            <i class='bx bx-chevron-down'></i>

                                                        </a>
                                                        <div class="sub-menu ">
                                                            <a href="./staff-performance.php?id=<?php echo $user_id?>" class="sub-item nav__link border-top">Add Performances </a>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="nav__list margin-bottom-gap">
                                                        <a href="#" class="nav__link d-flex justify-content-start">
                                                            <i class='bx bx-grid-alt nav__icon' ></i>
                                                            <span class="nav__name">Form</span>
                                                            <i class='bx bx-chevron-down'></i>
                                                        </a>
                                                        <div class="sub-menu ">
                                                                <a href="./response-list.php" class="sub-item nav__link border-top">Response list</a>
                                                                <a href="./create-form.php" class="sub-item nav__link border-top">Create Form</a>
                                                                <a href="./form-bookmark.php" class="sub-item nav__link border-top">Bookmark</a>

                                                        </div>
                                    
                                                    
                                                        
                                                        
                                                    </div>

                                                
                                                    
                                                    <div class="nav__list ">
                                                        <a href="./logout.php" class="nav__link">
                                                                <i class='bx bx-log-out nav__icon' ></i>
                                                                <span class="nav__name">Log Out</span>

                                                        </a>
                                                    </div>
                                            
                            
                            
                                            </nav>
                                        </div>
                                    </div>
                        <!--end Sidebar part-->


                        <!-- Content part-->
                                    <div class="content">
                                        <div class="container-fluid">

                                            <div class="card-1">
                                                <h2 class="mb-4 border-bottom">Data</h1>
          
                                                <div class="row mb-5">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="stat-widget-two card-body">
                                                                    <div class="card-header">
                                                                        <h4 class="heading-secondary mb-2">Add Performance</h4>
                                                                    </div>

                                                                    <div class="card-body">
                                                                                          

                                                                              <form class="" action="" method="post">
                                                                                            <table id="forms-tbl-2" class="table table-striped" width="100%">
                                                                                              <thead>
                                                                                                        <tr>
                                                                                                          <th class="text-center">#</th>
                                                                                                          <th class="text-center">Username</th>
                                                                                                          <th class="text-center">Fullname</th>
                                                                                                          <th class="text-center">Role</th>
                                                                                                          <th class="text-center">Gender</th>
                                                                                                          <th class="text-center">Staff performance</th>
                                                                                                          <th class="text-center">checklist</th>

                                                                                                        </tr>
                                                                                              </thead>
                                                                            
                                                                          

                                                                          
                                                                                              <tbody>
                                                                                                <?php
                                                                                                    $rows = mysqli_query($conn, "SELECT user.id,user.username, user.fullname, user.phone, user.email, user.staff_performance_num, gender.gender, role.role, status.status 
                                                                                                    FROM user 
                                                                                                    JOIN gender ON gender_id = gender.id 
                                                                                                    JOIN role ON role_id = role.id 
                                                                                                    JOIN status ON status_id = status.id;");
                                                                                                    $i = 1;
                                                                                                    foreach($rows as $row) :
                                                                                                ?>
                                                                                                                  
                                                                                                    <tr>
                                                                                                      <td class="text-center"><?php echo $i++; ?></td>
                                                                                                      <td class="text-center"><?php echo $row["username"]; ?></td>
                                                                                                      <td class="text-center"><?php echo $row["fullname"]; ?></td>
                                                                                                      <td class="text-center"><?php echo $row["role"]; ?></td>
                                                                                                      <td class="text-center"><?php echo $row["gender"]; ?></td>
                                                                                                      <td class="text-center"><?php echo $row["staff_performance_num"]; ?></td>
                                                                                                      <td class="text-center"><a href="./staff-performance.php?id=<?php echo $row['id'] ?>" class="btn-link">Checklist</a></td>
                                                                                                    </tr>
                                                                                                                                                        
                                                                
                                                                                                    <?php endforeach; ?>

                                                                                                
                                                                                              </tbody>
                                                                                            </table>   
                                                                                  </form>

                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>   

                                                </div>

                                                <div class="row mb-5">
                                                        
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="stat-widget-two card-body">
                                                                    <div class="card-header">

                                                                        <h4 class="heading-secondary mb-2">Employee Performance Evaluation Checklist </h4>
                                                           
                                                                    </div>
                                                                    <div class="card-header">
                                                                        <?php
                                                                        
                                                                            echo 'Name of staff:&nbsp&nbsp', $fullname;

                                                                          
                                                                        ?>
                                                                    </div>
                                                                    <div class="card-body padding-card-body">
                                                                        <form action="" class="row" method="post">

                                                                        
                                                                            <div class="col-lg-12">
                                                                                <p><input class="form-check-input" type = "checkbox" value = "box" name = "checkbox[]"/>Problem Solving ‐ How well does the employee solve complex problems?</input></p><br>
                                                                                <p><input class="form-check-input" type = "checkbox" value = "box" name = "checkbox[]"/>Decision Making ‐ How well does the employee make critical decisions on their own?</input></p><br>
                                                                                <p><input class="form-check-input" type = "checkbox" value = "box" name = "checkbox[]"/>Taking Criticism ‐ How good is this employee's ability to receive open feedback from subordinates?</input></p><br>
                                                                                <p><input class="form-check-input" type = "checkbox" value = "box" name = "checkbox[]"/>Written Communication ‐ How well does this employee communicate in writing?</input></p><br>
                                                                                <p><input class="form-check-input" type = "checkbox" value = "box" name = "checkbox[]"/>Team Player ‐ Is this employee a team player? How well do they work towards a common goal?</input></p><br>

                                                                                <input onclick="toggleClock()" id="clockButton" type="submit" name="submit1" class="btn btn-orange-rad" value="save">
                                                                            </div>    
                                                                            
                                                                        </form>    
                                                                    </div>

                                                                    
                                                                    
                                                                </div>


                                                                
                                                            </div>
                                                        </div>

                                                </div>   

                                            </div>
                                                
                                        
                                                
                                            
                            
                                            
                                    </div>
                        <!--end Content part-->

                        <!-- Footer part-->
                                    <footer class="footer">
                            

                                        <div class="footer_copyright-box">
                                                    <p class="footer_author">Copyright Aidil Maula. All rights reserved.</p>

                                        </div>

                                    </footer>
                        <!--end Footer part-->
            


            

      

        
    






        </div>

        <!-- Javascript -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11 "></script>
      

        <script src="js/sweetalert.js"></script>
        <script src="js/form-build-display.js"></script>
        <script src="js/chart.js"></script>
        <script src="js/pulldown-menu.js"></script>
        <script src="js/delete-data.js"></script>
        <script src="js/datatable.js"></script>
        <script src="js/script.js"></script>

        
    </body>
</html>



<?php

if(isset($_POST["submit1"]))
{ 
$checked_arr = $_POST['checkbox'];
$count = count($checked_arr);
$insert = "UPDATE user SET staff_performance_num = $count WHERE id = $user_id";

$result = mysqli_query($conn, $insert);



}
?>

<?php
$results = mysqli_query($conn, "SELECT sum(staff_performance_num) FROM user");
$rows = mysqli_fetch_array($results);

$number = $rows['sum(staff_performance_num)'];


$results2 = mysqli_query($conn, "SELECT * FROM user");
$number2 = mysqli_num_rows($results2);


$total = ((  $number/ ($number2 * 5)) * 100 );


$insert =  mysqli_query($conn, "UPDATE staff_performance_month SET stafF_performance_percentage = $total 
                                WHERE current_month = DATE_FORMAT(CURDATE(),'%y-%m-01')");
$result = mysqli_query($conn, $insert);


?>



