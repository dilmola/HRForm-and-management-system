<?php 

require_once('./classes/DBConnection.php');
session_start();
$db = new DBConnection();
?>

<?php
if (isset($_SESSION["email"])){
    $email = $_SESSION["email"];
    $query = "SELECT user.id, user.username, user.form_id,  form_list.date_created, form_list.date_expired
    FROM user
    CROSS JOIN form_list WHERE email = '{$email}'";
    $select_user_email_query = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($select_user_email_query)) {
        $user_id = $row['id'];
        $username = $row['username'];
        $form_id = $row['form_id'];
        $exp_date = $row['date_expired'];
        $exp_created = $row['date_created'];

    }
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
                                                <div class="row mb-4">

                                                    
                                                    
                                                    <div class="col">
                                                        <div class="card">
                                                        <a href="#" class="close">&times;</a>

                                                            <div class="card-body item-content-2 ">
                                                                

                                                                <div class="stat-content  stat-sub d-flex justify-content-between align-items-center position-relative ">

                                                                    <p class="position-absolute top-50 start-50 translate-middle fs-5">Hello <b><?php echo $username; ?></b><br>
                                                                    
                                                                                    <?php



                                                                                    $exp=strtotime($exp_date);
                                                                                    $crt=strtotime($exp_created);

                                                                                    if($crt>$exp)
                                                                                    {
                                                                                        $diff=$crt-$exp;
                                                                                        $x=abs (floor($diff / (60 * 60 * 24)));

                                                                                        echo " Form already due date";
                                                                                        echo "<br/>DAYS : <b> " .$x  ."</b>";
                                                                                        
                                                                                    }
                                                                                    else
                                                                                    {   
                                                                                        $diff=$crt-$exp;
                                                                                        $x=abs (floor($diff / (60 * 60 * 24)));
                                                                                        echo "Form not due date ";
                                                                                        echo "<br/>DAYS: <b> ".$x ."</b>";
                                                                                    }

                                                                                    ?>
                                                                        <br>
                                                                        
                                                                    </p>

                                                                    
                                                                </div>
                                                                <div class="stat-content stat-sub d-flex justify-content-between align-items-center card-size cardnoti-image">

                                                                   
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>  

                                                <h2 class="mb-4 border-bottom">Dashboard</h1>

                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body item-content-2">
                                                                <div class="stat-content stat-sub d-flex justify-content-between align-items-center">
                                                                    <div class="sub-text">
                                                                        <div class="stat-text">Number of submission </div>
                                                                        <div class="stat-digit"> 
                                                                        <?php
                                    
                                                                        $number_user = "SELECT * from response_list WHERE user_id = '$user_id'";
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
                                                                        <div class="stat-text">Staff performance result </div>
                                                                        <div class="stat-digit"> 
                                                                        <?php
                                    
                                                                        $staff_performance_num = "SELECT staff_performance_num FROM user WHERE id =  '$user_id'";
                                                                        $number_staff_performance_num = mysqli_query($conn, $staff_performance_num);

                                                                        if($row = mysqli_fetch_array($number_staff_performance_num)) {
                                                                            $staff_performance_num = $row['staff_performance_num'];
                                                                        }else{
                                                                            echo '<h4> No data </h4>';

                                                                        }
                                                                        
                                                                        if($staff_performance_num <= 0) {
                                                                            echo '<h4> No data </h4>';

                                                                        }elseif($staff_performance_num <= 2) {
                                                                            echo '<h4> Bad </h4>';

                                                                        }else{
                                                                            echo '<h4> Good </h4>';
                                                                        }
                                                                    
                                                                        
                                                                        ?>

                                                                        </div> 
                                                                    </div>

                                                                    <div class="sub-logo box-logo">
                                                                        <img src="includes/icons/form_submission.svg" alt="" class="icon-size" >

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
                                                                        <h4 class="heading-secondary mb-2">Form Need Submit</h4>
                                                                        
                                                                    </div>

                                                                    <div class="card-body">
                                                                        <table id="forms-tbl" class="table table-striped" width="100%">
                                                                            <thead >
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Title</th>
                                                                                    <th>Due date</th>
                                                                                    <th>Time remaining</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                        
                                                                                <tbody class=table-group-divider>
                                                                                    <?php 
                                                                                        $i = 1;
                                                                                            $rows = mysqli_query($conn, "SELECT form_list.id, form_list.title, form_list.date_expired, form_list.form_code, user.id FROM sendform_list
                                                                                            INNER JOIN form_list ON   sendform_list.form_id = form_list.id
                                                                                            INNER JOIN user ON  sendform_list.user_id = user.id
                                                                                            WHERE user_id = $user_id;");
                                                                                            if($rows)
                                                                                           foreach($rows as $row) :
                                                                                        ?>
                                                                                            <tr>
                                                                                                <td class="text-center"><?php echo $i++ ?></td>
                                                                                                <td><?php echo $row['title'] ?></td>
                                                                                                <td><?php echo $row['date_expired'] ?></td>
                                                                                                <td><?php echo $x." days"?> </td>

                                                                                                <td class='text-center'>
                                                                                                    <a class="btn-link" href="./form.php?id=<?php echo $row['id']?>& code=<?php echo $row['form_code']?>">Answer </a>
                                                                                                    <a class="btn-link" href="./require_id.php?id=<?php echo $row["id"]?>&code=<?php echo $row["form_code"]?>">Send ID </a>

                                                                                                    
                                                                                                </td>
                                                                                            </tr>

                                                                                            <?php endforeach; ?>

                                                                                    
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

