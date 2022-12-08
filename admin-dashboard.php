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
        <title>HR form : dynamic form builder and management system</title>
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
                 
                    <h2 class="header-dashboard__name">Hi! <?php echo $username; ?></h2>

                  
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
                                                 

                                                <h2 class="mb-4 border-bottom">Statistic</h1>

                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body item-content-2 ">
                                                                <div class="stat-content stat-sub d-flex justify-content-between align-items-center">
                                                                    <div class="sub-text">
                                                                        <div class="stat-text">Number of submission </div>
                                                                        <div class="stat-digit"> 
                                                                        <?php
                                    
                                                                        $number_user = "SELECT * from response_list";
                                                                        $number_user_run = mysqli_query($conn, $number_user);

                                                                        if($number_total = mysqli_num_rows($number_user_run))
                                                                        {
                                                                            echo '<h4>' .$number_total. '<h4>';
                                                                        }else{
                                                                            echo '<h4> No data </h4>';
                                                                        }

                                                                    
                                                                        
                                                                        ?>

                                                                        </div> 
                                                                    </div>

                                                                    <div class="sub-logo box-logo">
                                                                        <img src="includes/icons/form_submission.svg" alt="" class="icon-size" >

                                                                    </div>
                                                                    
                            
                                                                    
                                                                </div>

                                                                <div class="stat-content border-left stat-sub d-flex justify-content-between align-items-center">

                                                                    
                                                                        <div class="sub-text">
                                                                            <div class="stat-text">Number of form</div>
                                                                            <div class="stat-digit"> 

                                                                            <?php
                                                                                    $number_user = "SELECT * from form_list";
                                                                                $number_user_run = mysqli_query($conn, $number_user);

                                                                                if($number_total = mysqli_num_rows($number_user_run))
                                                                                {
                                                                                    echo '<h4>' .$number_total. '<h4>';
                                                                                }else{
                                                                                    echo '<h4> No data </h4>';
                                                                                }

                                                                            ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="sub-logo box-logo-end">
                                                                        <img src="includes/icons/form_number.svg" alt="" class="icon-size" >

                                                                        </div>
                                                                    
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>  

                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body item-content-3">
                                                                <div class="stat-content border-left-noline stat-sub d-flex justify-content-between align-items-center">

                                                                        <div class="sub-text">
                                                                            <div class="stat-text">Number of employee</div>
                                                                            <div class="stat-digit">                
                                                                                <?php
                                    
                                                                                $number_user = "SELECT * from user";
                                                                                $number_user_run = mysqli_query($conn, $number_user);

                                                                                if($number_total = mysqli_num_rows($number_user_run))
                                                                                {
                                                                                    echo '<h4>' .$number_total. '<h4>';
                                                                                }else{
                                                                                    echo '<h4> No data </h4>';
                                                                                }
                                                                                ?>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="sub-logo box-logo">
                                                                            <img src="includes/icons/employee_number.svg" alt="" class="icon-size" >

                                                                        </div>
                                                                    
                                                                </div>
                                                            
                                                                <div class="stat-content border-left stat-sub d-flex justify-content-between align-items-center">

                                                                        <div class="sub-text "> 
                                                                            <div class="stat-text"> Gender total </div>
                                                                            <div class="stat-digit-head item-content-2">
                                                                                <div class="stat-digit border-right-noline stat-sub d-flex justify-content-between align-items-center">
                                                                                    male: &nbsp;  
                                                                                    <?php
                                                                                    $number_user = "SELECT * from user WHERE gender_id='1' ";
                                                                                    $number_user_run = mysqli_query($conn, $number_user);

                                                                                    if($number_total = mysqli_num_rows($number_user_run))
                                                                                    {
                                                                                        echo '<h4>' .$number_total. '<h4>';
                                                                                    }else{
                                                                                        echo '<h4> No data </h4>';
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                                <div class="stat-digit border-left stat-sub d-flex justify-content-between align-items-center">  
                                                                                    female: &nbsp;
                                                                                    <?php
                                                                                    $number_user = "SELECT * from user WHERE gender_id='2' ";
                                                                                    $number_user_run = mysqli_query($conn, $number_user);

                                                                                    if($number_total = mysqli_num_rows($number_user_run))
                                                                                    {
                                                                                        echo '<h4>' .$number_total. '<h4>';
                                                                                    }else{
                                                                                        echo '<h4> No data </h4>';
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    <div class="sub-logo box-logo">
                                                                        <img src="includes/icons/employee_gender.svg" alt="" class="icon-size align-items-center" >

                                                                    </div>

                                                                    
                                                                </div>

                                                                <div class="stat-content border-left stat-sub d-flex justify-content-between align-items-center">

                                                                    <div class="sub-text"> 
                                                                        <div class="stat-text">Employees satisfaction</div>
                                                                        <div class="stat-digit"> <h4>7 </h4></div>
                                                                    </div>

                                                                    <div class="sub-logo box-logo">
                                                                        <img src="includes/icons/employee_satisfaction.svg" alt="" class="icon-size" >

                                                                    </div>

                                                                    
                                                                </div>

                                                                <div class="stat-content border-left-noline border-top stat-sub d-flex justify-content-between align-items-center">

                                                                        <div class="sub-text">
                                                                            <div class="stat-text">Out employee</div>
                                                                            <div class="stat-digit">  
                                                                                <?php
                                                                                    $number_user = "SELECT * FROM user where 
                                                                                    status_id ='3' ";
                                                                                  
                                                                                    $number_user_run = mysqli_query($conn, $number_user);

                                                                                    if($number_total = mysqli_num_rows($number_user_run))
                                                                                    {
                                                                                        echo '<h4>' .$number_total. '<h4>';
                                                                                    }else{
                                                                                        echo '<h4> No data </h4>';
                                                                                    }
                                                                                ?>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="sub-logo box-logo">
                                                                            <img src="includes/icons/employee_out.svg" alt="" class="icon-size" >

                                                                        </div>
                                                                    


                                                                </div>


                                                                <div class="stat-content border-left border-top stat-sub d-flex justify-content-between align-items-center">

                                                                    <div class="sub-text"> 
                                                                        <div class="stat-text">Leave employee</div>
                                                                        <div class="stat-digit"> 
                                                                            <?php
                                                                                    $number_user = "SELECT * FROM user where 
                                                                                    status_id ='2' ";
                                                                                  
                                                                                    $number_user_run = mysqli_query($conn, $number_user);

                                                                                    if($number_total = mysqli_num_rows($number_user_run))
                                                                                    {
                                                                                        echo '<h4>' .$number_total. '<h4>';
                                                                                    }else{
                                                                                        echo '<h4> No data </h4>';
                                                                                    }
                                                                                ?></div>
                                                                    </div>

                                                                    <div class="sub-logo box-logo">
                                                                        <img src="includes/icons/employee_leave.svg" alt="" class="icon-size" >

                                                                    </div>

                                                                    
                                                                </div>

                                                                <div class="stat-content border-left border-top stat-sub d-flex justify-content-between align-items-center">

                                                                    <div class="sub-text"> 
                                                                        <div class="stat-text">New joining</div>
                                                                        <div class="stat-digit">
                                                                            <?php
                                                                                    $number_user = "SELECT * FROM user where 
                                                                                    MONTH(date_add)=MONTH(now())";
                                                                                  
                                                                                    $number_user_run = mysqli_query($conn, $number_user);

                                                                                    if($number_total = mysqli_num_rows($number_user_run))
                                                                                    {
                                                                                        echo '<h4>' .$number_total. '<h4>';
                                                                                    }else{
                                                                                        echo '<h4> No data </h4>';
                                                                                    }
                                                                            ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="sub-logo box-logo">
                                                                        <img src="includes/icons/employee_new.svg" alt="" class="icon-size" >

                                                                    </div>

                                                                    
                                                                </div>
                                                                

                                                                

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>       
                                                
                                                <div class="row mb-4">
                                                    <div class="col-xl-8 col-lg-8 col-md-8">
                                                        
                                                        <div class="card card-graph">
                                                            <div class="stat-text">Employee performers</div>
                                                            <canvas id="performanceChart">
                                                            </canvas>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        
                                                        <div class="card card-graph">
                                                            <div class="stat-text">Total new hires and quit</div>
                                                            <canvas id="hiresandquitChart" class=chart width="700" height="790">
                                                            </canvas>
                                                        </div>
                                                    </div>
                                                
                                                    
                                                
                                                </div>
                                            
                                                <div class="row mb-5">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="stat-widget-two card-body">
                                                                    <div class="card-header">
                                                                        <h4 class="heading-secondary mb-2">Form List</h4>
                                                                        
                                                                    </div>

                                                                    <div class="card-body">
                                                                        <table id="forms-tbl" class="table table-striped" width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>DateTime</th>
                                                                                    <th>Code</th>
                                                                                    <th>Title</th>
                                                                                    <th>URL</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                        
                                                                                <tbody class=table-group-divider>
                                                                                    <?php 
                                                                                        $i = 1;
                                                                                            $forms = $db->conn->query("SELECT * FROM `form_list` order by date(date_created) desc");
                                                                                            while($row = $forms->fetch_assoc()):
                                                                                        ?>
                                                                                            <tr>
                                                                                                <td class="text-center"><?php echo $i++ ?></td>
                                                                                                <td><?php echo date("M d,Y h:i A",strtotime($row['date_created'])) ?></td>
                                                                                                <td><?php echo $row['form_code'] ?></td>
                                                                                                <td><?php echo $row['title'] ?></td>
                                                                                                <td><a href="./form.php?code=<?php echo $row['form_code'] ?>">form.php?code=<?php echo $row['form_code'] ?></a></td>
                                                                                                <td class='text-center'>
                                                                                                    <a href="./view_form.php?code=<?php echo $row['form_code'] ?>" class="btn btn-default border">View</a>
                                                                                                    <a href="./view_responses.php?&code=<?php echo $row['form_code'] ?>" class="btn btn-default border">Responses</a>
                                                                                                    <a href="delete-form.php?id=<?php echo $row["id"] ?>" class="btn btn-default border btn-del" ><i class='bx bx-trash-alt'></i></a>
                                                                                                    <a href="sendform-user.php?id=<?php echo $row["id"] ?>" class="btn btn-default border" name="submit2" type="button">send</a>
                                                                                                                               
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
if(isset($_POST["submit2"]))
{
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["pass"]);

    $count=0;
    $res=mysqli_query($conn,"SELECT * FROM user WHERE email='$email' && pass='$password' ");
    $count=mysqli_num_rows($res);
    $row=mysqli_fetch_array($res);
    if($count>0) {
    
       
    if($row["role_id"]=="2")
    {
        $_SESSION["email"]=$email;
        $_SESSION["pass"]=$password;
       
        header("location:admin-dashboard.php");
    }

    elseif($row["role_id"]=="1")
    {
        $_SESSION["username"]=$username;
        header("location:admin-kamil.php");
    }


    }




}

  

?>
