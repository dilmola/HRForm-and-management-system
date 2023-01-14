<?php 

require_once('./classes/DBConnection.php');
session_start();
$db = new DBConnection();
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
        <link href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"> 
        
    </head>

    <body class="dashboard-body" onload="loaded();">
     
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
                                                <h2 class="mb-4 border-bottom">Bookmark Form List</h1>
          
                                                <div class="row mb-5">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="stat-widget-two card-body">
                                                                    <div class="card-header">
                                                                        
                                                                    </div>

                                                                    <div class="card-body">
                                                                        <table id="forms-tbl" class="table table-striped" width="100%">
                                                                            <thead>
                                                                                <tr class="text-center">
                                                                                    <th class="text-center">#</th>
                                                                                    <th class="text-center">Date & Time</th>
                                                                                    <th class="text-center">Title</th>
                                                                                    <th class="text-center">Due date</th>
                                                                                    <th class="text-center">Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                        
                                                                                <tbody class=table-group-divider>
                                                                                    <?php 
                                                                                        $i = 1;
                                                                                            $forms = $db->conn->query("SELECT * FROM `form_list` WHERE bookmark_id = 1");
                                                                                            while($row = $forms->fetch_assoc()):
                                                                                        ?>
                                                                                            <tr>
                                                                                                <td class="text-center"><?php echo $i++ ?></td>
                                                                                                <td ><?php echo date("M d,Y h:i A",strtotime($row['date_created'])) ?></td>
                                                                                                <td ><?php echo $row['title'] ?></td>

                                                                                                <td class="text-center"> <a href="./adddate-form.php?&code=<?php echo $row['form_code'] ?>"  class="btn-link"> Add date</a> </td>
                                                                                                <td class='text-center'>
                                                                                                    <a href="./bookmark.php?id=<?php echo $row["id"] ?>" class="btn-link" ><i class='bx-1 bx bxs-bookmark-star'></i></a>                  
                                                                                                    <a href="./view_form.php?&code=<?php echo $row['form_code'] ?>" class="btn-link ">Edit</a>
                                                                                                    <a href="./view_responses.php?&code=<?php echo $row['form_code'] ?>" class="btn-link ">Responses</a>
                                                                                                    <a href="sendform-user.php?id=<?php echo $row["id"] ?>" class="btn-link " name="submit2" type="button">send</a>
                                                                                                    <a href="delete-form.php?id=<?php echo $row["id"] ?>" class="btn-link btn-del" ><i class='bx-1 bx bx-trash-alt'></i></a>                 
                                                                                                </td>
                                                                                            </tr>
                                                                                    <?php endwhile;  ?>
                                                                                </tbody>
                                                                        </table>
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
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

        <script src="js/sweetalert.js"></script>
        <script src="js/form-build-display.js"></script>
        <script src="js/chart.js"></script>
        <script src="js/pulldown-menu.js"></script>
        <script src="js/delete-data.js"></script>
        <script src="js/datatable.js"></script>
        <script src="js/script.js"></script>
        <script src="js/bookmark.js"></script>
    </body>
</html>


