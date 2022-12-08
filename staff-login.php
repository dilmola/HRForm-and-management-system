<?php 

ob_start();
require_once('./classes/DBConnection.php');
$db = new DBConnection();



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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
     
    
        <div class="section-login">
            <div class="section-login--employee">

                <header class="header-start d-flex justify-content-between">   
                    <img src="includes/logo.svg" alt="" class="header-start__logo" >
                
                    <div class="header-start__list">
                        <a href="./login.php" class="btn btn-orange-rad">Admin Login</a>
                    </div>
                </header>

                <div class="row">
                    <div class="position-absolute top-50 start-50 translate-middle body_form"> 
                    
                        <h1 class="heading-primary mb-5 mt-5">Welcome back</h1>
                        <h2 class="heading-secondary mb-5">Staff Login</h2>

                        <form name="form1" action="" method="post">

                                    <div class="form-group">
                                        <label><strong>Email</strong></label>
                                        <div>
                                            <input type="email" class="form-control mt-1 mb-3" placeholder="hello@example.com" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Password</strong></label>
                                        <div>
                                            <input type="password" class="form-control mt-1 mb-5" placeholder="password" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-5 text-center ">
                                        <button class="btn btn-orange" name="submit1">Login</a>
                                    </div>

                                    

                        </form>

                        
                    </div>
                </div>
            </div>
                
            
        </div>


        <?php
if(isset($_POST["submit1"]))
{
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);

    $count=0;
    $res=mysqli_query($conn,"select * from user where email='$email' && password='$password' && status_id='1' ");
    $count=mysqli_num_rows($res);
    $row=mysqli_fetch_array($res);
    if($count>0) {
    
       
    if($row["role_id"]=="2")
    {
        $_SESSION["email"]=$email;
        header("location:admin-dashboard.php");
    }

    elseif($row["role_id"]=="1")
    {
        $_SESSION["email"]=$email;
        header("location:admin-dashboard.php");
    }


    }
    else {
        ?>
        <div class="alert alert-danger" role="alert">
        this user not exist
        </div>
        <?php
    }
}

?>

        
        








        <!-- Javascript -->
        <script src=""></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>