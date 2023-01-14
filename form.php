
<?php 

ob_start();
require_once('./classes/DBConnection.php');
$db = new DBConnection();

$code = isset($_GET['code']) ? $_GET['code'] : "";
if(empty($code)){
    echo "<script> alert('form code is not provided'); location.replace('./')</script>";
    exit;
}
ob_end_flush();
session_start();

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
        <header class="header-dashboard header-dashboard-staff d-flex justify-content-end">
                
            <h2 class="header-dashboard__name">Hi! <?php echo $username; ?></h2>
                  
            </header>
        



                        <!-- Sidebar part-->
                                   
                            <div class="sidebar-box">        
                                        <div class="sidebar">
                                            <nav class="nav">
                            
                                                
                            
                                                    <div class="nav__list">
                                                        <a href="./staff-dashboard.php" class="nav__logo">
                                                            <img src="includes/logo.svg" alt="" class="nav__logo" >
                                                        </a>
                                                        
                                                    </div>
                            
                                                 

                                                    <div class="nav__list mb-22">     
                                                        <a href="./staff-satisfaction.php?id=<?php echo $user_id?>" class="nav__link d-flex justify-content-start">
                                                            <i class='bx bx-message-square-detail nav__icon' ></i>
                                                            <span class="nav__name">Satisfaction</span>
                                                        </a>
                                                
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
                                                <h2 class="mb-4 border-bottom">Answer form</h1>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                
                                                                <?php 
                                                                include './forms/'.$code.'.html';
                                                                ?>
                                                                <form action="classes/Forms.php" method="POST">

                                                                    <div class="w-100 d-flex justify-content-center">
                                                                    <button class="btn btn-primary" form="form-data" id="">Submit</button>

                                                                      
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
                        <footer class="footer-staff">
                            

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

        <script src="js/form-build-display.js"></script>
        <script src="js/chart.js"></script>
        <script src="js/pulldown-menu.js"></script>
        <script src="js/datatables.js"></script>
        <script src="js/script.js"></script>
     
    </body>
</html>


