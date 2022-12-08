<?php 

ob_start();
require_once('./classes/DBConnection.php');
$db = new DBConnection();

$page = isset($_GET['p']) ? $_GET['p'] : "admin-dashboard";
ob_end_flush();

?>

<?php 
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * from form_list WHERE id='$id'");

while ($row = mysqli_fetch_array($query )){
  $form_id = $row['id'];
  
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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
        
    </head>

    <body class="dashboard-body" onload="loaded();">
     
      <div class="admin-dashboard">
        <header class="header-dashboard d-flex justify-content-end">
                
          <h2 class="header-dashboard__name">Hi! Aidil</h2>
                  
        </header>
        



        <!-- Sidebar part-->
          <div class="sidebar-box">        
            <div class="sidebar">
              <nav class="nav">
                            
                                                
                            
                                                    <div class="nav__list">
                                                        <a href="./admin-dashboard.php" class="nav__logo">
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
                                                            <a href="#" class="sub-item nav__link border-top">Add status employee </a>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="nav__list">
                                                        
                                                        
                                                        <a href="#" class="nav__link d-flex justify-content-start">
                                                            <i class='bx bx-message-square-detail nav__icon' ></i>
                                                            <span class="nav__name">Add data</span>
                                                            <i class='bx bx-chevron-down'></i>

                                                        </a>
                                                        <div class="sub-menu ">
                                                            <a href="#" class="sub-item nav__link border-top">Employee satisfaction</a>
                                                            
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
                                                                <a href="#" class="sub-item nav__link border-top">Form template</a>

                                                        </div>
                                    
                                                    
                                                        
                                                        
                                                    </div>

                                                
                                                    
                                                    <div class="nav__list ">
                                                        <a href="./login.html" class="nav__link">
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
                                                <h2 class="mb-4 border-bottom">Statistic</h1>
          
                                                <div class="row mb-5">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="stat-widget-two card-body">
                                                                    <div class="card-header">
                                                                        <h4 class="heading-secondary mb-2">Form List</h4>
                                                                    </div>

                                                                    <div class="card-body">
                                                                                          

                                                                              <form class="" action="" method="post">
                                                                                            <table id="forms-tbl" class="table table-striped" width="100%">
                                                                                              <thead>
                                                                                                        <tr>
                                                                                                          <th > <button class="btn btn-white-rad center-item " onClick="mensaje()" type="submit" name="send">Send</button> </th>
                                                                                                          <th>#</th>
                                                                                                          <th>Username</th>
                                                                                                          <th>Fullname</th>
                                                                                                          <th>Role</th>
                                                                                                          <th>Gender</th>
                                                                                                        </tr>
                                                                                              </thead>
                                                                            
                                                                          

                                                                          
                                                                                              <tbody>
                                                                                                <?php
                                                                                                    $rows = mysqli_query($conn, "SELECT user.id,user.username, user.fullname, user.phone, user.email, gender.gender, role.role, status.status 
                                                                                                    FROM user 
                                                                                                    JOIN gender ON gender_id = gender.id 
                                                                                                    JOIN role ON role_id = role.id 
                                                                                                    JOIN status ON status_id = status.id;");
                                                                                                    $i = 1;
                                                                                                    foreach($rows as $row) :
                                                                                                ?>
                                                                                                                  
                                                                                                    <tr>
                                                                                                      <td > <input class="form-check-input" type="checkbox" name="sendID[]" value="<?php echo $row['id']; ?>"> </td>
                                                                                                      <td><?php echo $i++; ?></td>
                                                                                                      <td><?php echo $row["username"]; ?></td>
                                                                                                      <td><?php echo $row["fullname"]; ?></td>
                                                                                                      <td><?php echo $row["role"]; ?></td>
                                                                                                      <td><?php echo $row["gender"]; ?></td>
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

if(isset($_POST["send"]) && isset($_POST["sendID"])){
  foreach($_POST["sendID"] as $sendID){
    $send = "UPDATE `user` SET `form_id` = $form_id WHERE `user`.`id` = $sendID";
   

    mysqli_query($conn, $send);
  }
}
?>