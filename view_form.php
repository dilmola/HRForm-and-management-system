<?php 

ob_start();
require_once('./classes/DBConnection.php');
$db = new DBConnection();

$page = isset($_GET['p']) ? $_GET['p'] : "admin-dashboard";
ob_end_flush();
session_start();

?>

<?php 
extract($_GET);
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
                                                <h2 class="mb-4 border-bottom">Edit Form</h1>

                                                <div class="row mb-5">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="stat-widget-two card-body">
                                                                    <div class="card-header">
                                                                        <h4 class="heading-secondary mb-2">Form List</h4>
                                                                    </div>
                                                                       
                                                                <?php include "./forms/".$code.".html" ?>
                                                               
                                                        <div class=" d-none" id = "q-item-clone">
                                                            <div class="card mt-3 mb-3 col-md-12 question-item ui-state-default" data-item="0">
                                                                <span class="item-move"><i class="fa fa-braille"></i></span>
                                                                <div class="card-body">
                                                                    <div class="row align-items-center d-flex">
                                                                        <div class="col-sm-8">
                                                                            <p class="question-text m-0" contenteditable="true" title="Write you question here">Write you question here</p>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <select title="question choice type" name="choice" class='form-control choice-option'>
                                                                                <option value="p">paragraph</option>
                                                                                <option value="checkbox">Mupliple choice (multiple answer)</option>
                                                                                <option value="radio">Mupliple choice (single answer)</option>
                                                                                <option value="file">File upload</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="border-dark">
                                                                    <div class="row ">
                                                                        <div class="form-group choice-field col-md-12">
                                                                            <textarea name="q[]" class="form-control col-sm-12" cols="30" rows="5" placeholder="Write your answer here"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input req-item" type="checkbox" value="" >
                                                                            <label class="form-check-label req-chk" for="">
                                                                                * Required
                                                                            </label>
                                                                        </div>
                                                                        <button class="btn btn-default border rem-q-item" type="button"><i class="bx bx-trash-alt"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
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
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        
        <script src="js/jquery-ui.js"></script>
        <script src="js/pulldown-menu.js"></script>
        <script src="js/datatables.js"></script>
        <script src="js/script.js"></script>
        <script src="js/form-build-display.js"></script>
        <script src="js/form-builder.js"></script>        
                <script>
                                                            $('#form-field form').prepend("<input type='hidden' name='form_code' value='<?php echo $code ?>'/>")
                                                        </script>
    </body>
</html>