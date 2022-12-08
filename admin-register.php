<?php 
require_once('./classes/DBConnection.php');


if (isset($_POST['submit1'])) {
    session_start();


    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "INSERT INTO user (username, email, password) VALUES('$username', '$email','$password')";
    mysqli_query($conn, $sql);

    $_SESSION['username'] = "You are logged in";
    header("location: login.php");
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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" >
    </head>
    <body>
     
    
        <div class="section-login">
            <div class="section-login--register">

                    <header class="header-start d-flex justify-content-between">   
                        <a  href="./login.php"><img src="includes/logo.svg" alt="" class="header-start__logo" ></a>
                    
                       

                        
                    </header>

                    <div class="row">
                        <div class="position-absolute top-50 start-50 translate-middle body_form"> 
                        
                            <h2 class="heading-secondary mb-5 mt-5">Register admin account</h2>

                            <?php
                            if(isset($error)){
                                foreach($error as $error){
                                    echo '<span class="error-msg">'.$error.'</span>';
                                };
                            };
                            ?>
                            <form class="form1" action="" method="post">

                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <div>
                                                <input type="text" class="form-control mt-1 mb-3" placeholder="name" name="username">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <div>
                                                <input type="email" class="form-control mt-1 mb-3" placeholder="hello@example.com" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <div>
                                                <input type="password" class="form-control mt-1 mb-5" placeholder="password" name="pass">
                                            </div>
                                        </div>

                                        <div class="mb-5 text-center ">
                                            <button class="btn btn-orange" name="submit1" type="submit">Register</a>
                                        </div>

                                        <div class="new-account mb-4 text-center">
                                            <p>Already have an account?<a class="text" href="./login.php"> Sign in</a></p>
                                        </div> 

                                        

                            </form>

                        </div>

                    </div>
            </div>
            
                
            
        </div>


      

        
        








        <!-- Javascript -->
        <script src=""></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" ></script>
    </body>
</html>






<?php
 
if(isset($_POST["submit1"]))
{

    $name = $_POST['username'] ;
    $email = $_POST['email'] ;
    $pass = $_POST['pass'] ;

    $insert = "INSERT INTO user (username, email, pass, role_id, status_id, form_id, gender_id) VALUES ('$name', '$email', '$pass' , '2' ,'1' ,NULL, '1')";
    $result = mysqli_query($conn, $insert);

    if($result)
    {
        header("location: login.php");
    }    
    else
    {
        echo "error :" .$insert;
    }
    

}

?>












