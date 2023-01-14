<?php 

ob_start();
require_once('./classes/DBConnection.php');
$db = new DBConnection();
session_start();

ob_end_flush();



 
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * from user WHERE id='$id'");

while ($row = mysqli_fetch_array($query )){
  $user_id = $row['id'];
  $fullname = $row['fullname'];
  $username = $row['username'];

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
      <header class="header-dashboard header-dashboard-staff d-flex justify-content-end">
                 
                 <h2 class="header-dashboard__name">Hi! <?php echo $username; ?></h2>

               
         </header>
        



<!-- Sidebar part-->
               
                            <div class="sidebar-box">        
                                        <div class="sidebar">
                                            <nav class="nav">
                            
                                                
                            
                                                    <div class="nav__list">
                                                        <a href="./staff-dashboard.php?id=<?php echo $user_id?>" class="nav__logo">
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
                                                <h2 class="mb-4 border-bottom">Satisfaction</h1>
          
                                                

                                                <div class="row mb-5">
                                                        
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="stat-widget-two card-body">
                                                                    <div class="card-header">

                                                                        <h4 class="heading-secondary mb-2">Satisfaction Evaluation Checklist </h4>
                                                           
                                                                    </div>
                                                                    <div class="card-header">
                                                                       <?php echo 'Name of staff:&nbsp&nbsp', $fullname; ?>
                                                                    </div>
                                                                    <div class="card-body padding-card-body">
                                                                    <form action="" method="POST">
                                                                        <table class="table table-striped">

                                                                            <tr  class="text-center">
                                                                                <th><br> </th>
                                                                                <th > Very satisfied </th>
                                                                                <th > Satisfied </th>
                                                                                <th > Neither agree or disagree </th>
                                                                                <th > Dissatisfied </th>
                                                                                <th > Very dissatisfied </thd> 
                                                                            </tr>   

                                                                            <tr  class="text-center">
                                                                                <th  class="text-left"><label for="q1">I can see myself working here in five years</label> <br> </th>
                                                                                <td> <input type="radio" name="q1" value="3" /> </td>
                                                                                <td> <input type="radio" name="q1" value="3" />  </td>
                                                                                <td>  <input type="radio" name="q1" value="2" /> </td>
                                                                                <td> <input type="radio" name="q1" value="1" /> </td> 
                                                                                <td> <input type="radio" name="q1" value="1" /> </td>
                                                                            </tr> 
                                                                            
                                                                            <tr  class="text-center">
                                                                                <th class="text-left"><label for="q2">I have a clear understanding of my company's strategic goals</label> <br> </th>
                                                                                <td> <input type="radio" name="q2" value="3" /> </td>
                                                                                <td> <input type="radio" name="q2" value="3" />  </td>
                                                                                <td>  <input type="radio" name="q2" value="2" /> </td>
                                                                                <td> <input type="radio" name="q2" value="1" /> </td> 
                                                                                <td> <input type="radio" name="q2" value="1" /> </td>
                                                                            </tr>  

                                                                            <tr  class="text-center">
                                                                                <th class="text-left"><label for="q3">I can easily see how my work affects the company's overall success</label> <br> </th>
                                                                                <td> <input type="radio" name="q3" value="3" /> </td>
                                                                                <td> <input type="radio" name="q3" value="3" />  </td>
                                                                                <td>  <input type="radio" name="q3" value="2" /> </td>
                                                                                <td> <input type="radio" name="q3" value="1" /> </td> 
                                                                                <td> <input type="radio" name="q3" value="1" /> </td>
                                                                            </tr>  


                                                                            <tr  class="text-center">
                                                                                <th class="text-left"><label for="q4">I always know what is expected of me when it comes to my goals and objectives</label> <br> </th>
                                                                                <td> <input type="radio" name="q4" value="3" /> </td>
                                                                                <td> <input type="radio" name="q4" value="3" />  </td>
                                                                                <td>  <input type="radio" name="q4" value="2" /> </td>
                                                                                <td> <input type="radio" name="q4" value="1" /> </td> 
                                                                                <td> <input type="radio" name="q4" value="1" /> </td>
                                                                            </tr>  


                                                                            <tr  class="text-center">
                                                                                <th class="text-left"><label for="q5">It really feels like everyone is on the same team at my company</label> <br> </th>
                                                                                <td> <input type="radio" name="q5" value="3" /> </td>
                                                                                <td> <input type="radio" name="q5" value="3" />  </td>
                                                                                <td>  <input type="radio" name="q5" value="2" /> </td>
                                                                                <td> <input type="radio" name="q5" value="1" /> </td> 
                                                                                <td> <input type="radio" name="q5" value="1" /> </td>
                                                                            </tr>  

                                                                            <tr  class="text-center">
                                                                                <th class="text-left"><label for="q6">I always recommend my company to others</label> <br> </th>
                                                                                <td> <input type="radio" name="q6" value="3" /> </td>
                                                                                <td> <input type="radio" name="q6" value="3" />  </td>
                                                                                <td>  <input type="radio" name="q6" value="2" /> </td>
                                                                                <td> <input type="radio" name="q6" value="1" /> </td> 
                                                                                <td> <input type="radio" name="q6" value="1" /> </td>
                                                                            </tr>  

                                                                            
                                                                        </table>
                                                                        
                                                                            <div class="form-group mb-3">
                                                                                <button type="submit" name="submit1" class="btn btn-primary">Save</button>
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
       <footer class="footer-staff">
                            

                            <div class="footer_copyright-box">
                                        <p class="footer_author">Copyright Aidil Maula. All rights reserved.</p>

                            </div>

                        </footer>
            <!--end Footer part-->

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



?>

<?php

if(isset($_POST["submit1"])){

$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$q6 = $_POST['q6'];

$totalquestion = $q1 + $q2 + $q3 + $q4 + $q5 + $q6;
    
$totalbystaff= ($totalquestion / 18);



    $sql = ("SELECT * FROM staff_satisfaction WHERE user_id='$user_id'");
    $res_u = mysqli_query($conn, $sql);

    if   (mysqli_num_rows($res_u) > 0) {
       echo "you already answer";

    }else{
        # code...
         $query = ("INSERT INTO staff_satisfaction (satisfaction_num,user_id) VALUES ('$totalbystaff','$id') ");
        $query_run = mysqli_query($conn, $query);


    

   }
}
?>