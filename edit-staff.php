<?php 
ob_start();
require_once('./classes/DBConnection.php');
session_start();

?>
<?php
if (isset($_SESSION["email"])){
    $email = $_SESSION["email"];
    $query = "SELECT * FROM user WHERE email = '{$email}'";

    $select_user_email_query = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($select_user_email_query)) {
        $user_id = $row['id'];
        $username2 = $row['username'];

    }
}

?>
<?php
$id=$_GET["id"];
$username="";
$fullname="";
$phone="";
$email="";
$role_id="";
$status_id="";
$gender_id="";


$res=mysqli_query($conn, "select * from user where id=$id");
while($row=mysqli_fetch_array($res))

{
    $username=$row["username"];
    $fullname=$row["fullname"];
    $phone=$row["phone"];
    $email=$row["email"];
    $role_id=$row["role_id"];
    $status_id=$row["status_id"];
    $gender_id=$row["gender_id"];
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
                                                <h2 class="mb-4 border-bottom">Employee</h1>
          
                                                <div class="row mb-5">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="stat-widget-two card-body">
                                                                    <div class="card-header">
                                                                        <h4 class="heading-secondary mb-2">Edit staff</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form action="" class="row" method="post">
                                                                            <div class="col-6 col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Username</label>
                                                                                    <div>
                                                                                    <input type="text" class="form-control mt-1 mb-3" value="<?php echo $username; ?>" name="username">
                                                                                    </div>
                                                                                </div>
                                                                            </div>    
                                                                            <div class="col-12 col-md-8">
                                                                                <div class="form-group">
                                                                                    <label>Fullname</label>
                                                                                    <div>
                                                                                    <input type="text" class="form-control mt-1 mb-3" value="<?php echo $fullname; ?>" name="fullname">
                                                                                    </div>
                                                                                </div>
                                                                            </div>  
                                                                            
                                                                            <div class="col-6"> 

                                                                                <div class="form-group">
                                                                                    <label>Phone Number</label>
                                                                                    <div>
                                                                                    <input type="tel" class="form-control mt-1 mb-3" value="<?php echo $phone; ?>" name="phone">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6"> 
                                                                                <div class="form-group">
                                                                                        <label>Email</label>
                                                                                        <div>
                                                                                        <input type="email" class="form-control mt-1 mb-3" value="<?php echo $email; ?>" name="email">
                                                                                        </div>
                                                                                </div>
                                                                                
                                                                            </div>


            
                                                                        
                                                                            <div class="col-4"> 

                                                                                <div class="form-group mb-3">
                                                                                    <label class="col-form-label">Select Gender:</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select " id="role" name="gender_id">
                                                                                            <option <?php if($status_id=="1") {echo "selected";} ?> value="1">Male</option>
                                                                                            <option <?php if($status_id=="2") {echo "selected";} ?> value="2">Female</option>                                               
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-4"> 

                                                                            <div class="form-group mb-3">
                                                                                <label class="col-form-label">Select Status:</label>
                                                                                <div class="col">
                                                                                    <select class="form-select " id="role" name="status_id">
                                                                                        <option <?php if($status_id=="1") {echo "selected";} ?> value="1">Active (Work)</option>
                                                                                        <option <?php if($status_id=="2") {echo "selected";} ?> value="2">Active (leave)</option>          
                                                                                        <option <?php if($status_id=="3") {echo "selected";} ?> value="3">Inactive (Out)</option>                                         
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            </div>

                                                                            <div class="col-4"> 
                                                                                <div class="form-group mb-3">
                                                                                    <label class="col-form-label">Select Role:</label>
                                                                                    <div class="col">
                                                                                        <select class="form-select" id="role" name="role_id">
                                                                                            <option <?php if($status_id=="1") {echo "selected";} ?> value="1">Staff</option>
                                                                                            <option <?php if($status_id=="2") {echo "selected";} ?> value="2">Admin</option>                                               
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-4">
                                                                                <input type="submit" name="submit1" class="btn btn-orange-rad" value="update">
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
                                                                                    <th class="text-center">#</th>
                                                                                    <th class="text-center">Username</th>
                                                                                    <th class="text-center">Fullname</th>
                                                                                    <th class="text-center">Phone Number</th>
                                                                                    <th class="text-center">Email</th>
                                                                                    <th class="text-center">Gender</th>
                                                                                    <th class="text-center">Role</th>
                                                                                    <th class="text-center">Status</th>
                                                                                    <th class="text-center">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        
                                                                        

                                                                        
                                                                        <tbody>
                                        <?php
                                        $i = 1;
                                        
                                        $res=mysqli_query($conn, "SELECT user.id, user.username, user.fullname, user.phone, user.email, gender.gender, role.role, status.status 
                                        FROM user 
                                        JOIN gender ON gender_id = gender.id 
                                        JOIN role ON role_id = role.id 
                                        JOIN status ON status_id = status.id;");

                                        while($row=mysqli_fetch_array($res))
                                        {
                                                ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $i++ ?></td>

                                                                <td class="text-center"><?php echo $row["username"]; ?></td>
                                                                <td class="text-center"><?php echo $row["fullname"]; ?></td>
                                                                <td class="text-center"><?php echo $row["phone"]; ?></td>
                                                                <td class="text-center"><?php echo $row["email"]; ?></td>
                                                                <td class="text-center"><?php echo $row["gender"]; ?></td>
                                                                <td class="text-center"><?php echo $row["role"]; ?></td>
                                                                <td class="text-center"><?php echo $row["status"]; ?></td>

                                                                <td class='text-center'>
                                                                    <a class="btn-link" href="edit-staff.php?id=<?php echo $row["id"]; ?>">Edit</a>
                                                                    <a href="delete-staff.php?id=<?php echo $row["id"]; ?>" class="btn-link btn-del" ><i class='bx-1 bx bx-trash-alt'></i></a>

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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>

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
if (isset($_POST["submit1"]))

{
    $UPDATE ="update user set username='$_POST[username]',fullname='$_POST[fullname]',phone='$_POST[phone]',email='$_POST[email]',role_id='$_POST[role_id]',status_id='$_POST[status_id]',gender_id='$_POST[gender_id]' where id=$id";

    $result = mysqli_query($conn, $UPDATE);


if($result)
     {
        
        header("location:add-staff.php");     

    }    
     else
     {
         echo "error :" .$insert;
     }
     

        



}?>