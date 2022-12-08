<?php 
ob_start();
require_once('./classes/DBConnection.php');
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
                                                                        <h4 class="heading-secondary mb-2">Add staff</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form action="" class="row" method="post">
                                                                            <div class="col-6 col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Username</label>
                                                                                    <div>
                                                                                    <input type="text" class="form-control mt-1 mb-3" placeholder="Username" name="username">
                                                                                    </div>
                                                                                </div>
                                                                            </div>    
                                                                            <div class="col-12 col-md-8">
                                                                                <div class="form-group">
                                                                                    <label>Fullname</label>
                                                                                    <div>
                                                                                    <input type="text" class="form-control mt-1 mb-3" placeholder="Fullname" name="fullname">
                                                                                    </div>
                                                                                </div>
                                                                            </div>  
                                                                            
                                                                            <div class="col-6"> 

                                                                                <div class="form-group">
                                                                                    <label>Phone Number</label>
                                                                                    <div>
                                                                                    <input type="tel" class="form-control mt-1 mb-3" placeholder="(+60)" name="phone">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6"> 
                                                                                <div class="form-group">
                                                                                        <label>Email</label>
                                                                                        <div>
                                                                                        <input type="email" class="form-control mt-1 mb-3" placeholder="Email" name="email">
                                                                                        </div>
                                                                                </div>
                                                                                
                                                                            </div>


                                                                            <div class="form-group">
                                                                                    <label>Password</label>
                                                                                    <div>
                                                                                    <input type="password" class="form-control mt-1 mb-3" placeholder="Password" name="pass">
                                                                                    </div>
                                                                            </div>
                                                                        
                                                                            <div class="col-6"> 

                                                                                <div class="form-group mb-3">
                                                                                    <label class="col-form-label">Select Gender:</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select " id="role" name="gender_id">
                                                                                            <option value="1">Male</option>
                                                                                            <option value="2">Female</option>                                               
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            

                                                                            <div class="col-6"> 
                                                                                <div class="form-group mb-3">
                                                                                    <label class="col-form-label">Select Role:</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select" id="role" name="role_id">
                                                                                            <option value="1">Staff</option>
                                                                                            <option value="2">Admin</option>                                               
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-4">
                                                                                <input type="submit" name="submit1" class="btn btn-orange-rad" value="save">
                                                                            </div>
                                                                        </form>    
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
                                                                    <h4 class="heading-secondary mb-2">Staff List</h4>
                                                                        
                                                                </div>

                                                                <div class="card-body">
                                                                    <table id="forms-tbl" class="table table-striped" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                    <th>#</th>
                                                                                    <th>Username</th>
                                                                                    <th>Fullname</th>
                                                                                    <th>Phone Number</th>
                                                                                    <th>Email</th>
                                                                                    <th>Gender</th>
                                                                                    <th>Role</th>
                                                                                    <th>Status</th>
                                                                                    <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        
                                                                        

                                                                        
                                                                        <tbody>
                                        <?php
                                        $i = 1;
                                        
                                        $res=mysqli_query($conn, "SELECT user.id,user.username, user.fullname, user.phone, user.email, gender.gender, role.role, status.status 
                                        FROM user 
                                        JOIN gender ON gender_id = gender.id 
                                        JOIN role ON role_id = role.id 
                                        JOIN status ON status_id = status.id;");


                                        while($row=mysqli_fetch_array($res))
                                        {
                                                ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $i++ ?></td>

                                                                <td><?php echo $row["username"]; ?></td>
                                                                <td><?php echo $row["fullname"]; ?></td>
                                                                <td><?php echo $row["phone"]; ?></td>
                                                                <td><?php echo $row["email"]; ?></td>
                                                                <td><?php echo $row["gender"]; ?></td>
                                                                <td><?php echo $row["role"]; ?></td>
                                                                <td><?php echo $row["status"]; ?></td>

                                                                <td class='text-center'>
                                                                    <a class='btn btn-orange-rad margin-right' href="edit-staff.php?id=<?php echo $row["id"]; ?>">Edit</a>
                                                                    <a class='btn btn-orange-rad btn-del' href="delete-staff.php?id=<?php echo $row["id"]; ?>">Delete</a>
                                                                </td>
                                                                


                                                            </tr>
                                                        <?php

                                        }
                                                ?>
                                        
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
 
     $name = $_POST['username'] ;
     $fullname = $_POST['fullname'] ;
     $phone = $_POST['phone'] ;
     $email = $_POST['email'] ;
     $pass = $_POST['pass'] ;
     $role_id = $_POST['role_id'] ;
     $status_id = $_POST['status_id'] ;
     $gender_id = $_POST['gender_id'] ;
 
 
     $insert = "INSERT INTO user (username, fullname, phone, email, pass, role_id, status_id, form_id, gender_id) VALUES 
     ('$name', '$fullname' ,'$phone' ,'$email', '$pass' , '$role_id' ,'1' ,NULL, '$gender_id')";
     $result = mysqli_query($conn, $insert);
 
     if($result)
     {
        header("location:add-staff.php");     
    }    
     else
     {
         echo "error :" .$insert;
     }
     
 
 }
 
 ?>


