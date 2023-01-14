
<?php 

require_once('./classes/DBConnection.php');
$db = new DBConnection();
session_start();

?>

<?php 

$code = isset($_GET['code']) ? $_GET['code'] : "";
if(empty($code)){
    echo "<script> alert('form code is not provided'); location.replace('./')</script>";
    exit;
}

$query = mysqli_query($conn, "SELECT * from form_list WHERE form_code='$code'");

while ($row = mysqli_fetch_array($query )){
  $code = $row['form_code'];
}

?>

<?php
if (isset($_SESSION["email"])){
    $email = $_SESSION["email"];
    $query = "SELECT * FROM user WHERE email = '{$email}'";

    $select_user_email_query = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($select_user_email_query)) {
        $user_id = $row['id'];
        $username = $row['username'];

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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
        <script>
        var form_code = "<?php echo $code ?>";
        </script>
    </head>

    <body class="dashboard-body">
     
        <div class="admin-dashboard">
            <header class="header-dashboard d-flex justify-content-end">
                
            <h2 class="header-dashboard__name">Hi! <?php echo $username; ?></h2>
                  
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
                                                <h2 class="mb-4 border-bottom">Add date into a form</h1>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="card">

                                                            <div class="card-body">
                                                                <?php 
                                                                include './forms/'.$code.'.html';
                                                                ?>

                                                                <div class="w-100 d-flex justify-content-center">
                                                            <form action="" method="POST">
                       
                                                                <div class="form-group mb-3">
                                                                    <label for="">date expired</label>
                                                                    <input type="date" name="date_expired" class="form-control" />
                                                                </div>


                                                                <div class="form-group mb-3">
                                                                <div class="d-flex w-100 justify-content-center" id="form-buidler-action">


                                                                    <button type="submit" id="save_form" name="save_form" class="btn btn-primary">Save Date</button>
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

                     
            


            

      

        
    






        </div>
            <!-- Footer part-->
                                    
            <!--end Footer part-->
        </div>
<footer class="footer">
                                        

                                        <div class="footer_copyright-box">
                                                    <p class="footer_author">Copyright Aidil Maula. All rights reserved.</p>

                                        </div>

                                    </footer>
                                            <!-- Javascript -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

        <script src="js/form-build-display.js"></script>
        <script src="js/chart.js"></script>
        <script src="js/pulldown-menu.js"></script>
        <script src="js/datatables.js"></script>
        <script src="js/script.js"></script>
     
    </body>
</html>


<?php
if(isset($_POST['save_form']))
{
    $date_expired = date('Y-m-d', strtotime($_POST['date_expired']));
    
    $query = "UPDATE form_list SET date_expired = '$date_expired' WHERE form_code = $code";
    
    $query_run = mysqli_query($conn, $query);


    if($query_run)
      {
        
      }
}
?>

