<?php 
extract($_GET);
?>

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
                                                <h2 class="mb-4 border-bottom">Response</h1>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-body">
                                                            <?php 
                                                            include "./forms/".$code.".html";
                                                            $responses = $db->conn->query("SELECT * FROM `responses` where response_list_id = $id");
                                                            $data = array();
                                                            while($row = $responses->fetch_assoc()){
                                                                $data[$row['meta_field']]['value'] = $row['meta_value'];
                                                                $data[$row['meta_field']]['type'] = "text";
                                                                if(is_file("./uploads/".$row['meta_value'])){
                                                                    $data[$row['meta_field']]['type'] = "file";
                                                                }
                                                            }
                                                            ?>
                                                                
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

        <script src="js/form-build-display.js"></script>
        <script src="js/chart.js"></script>
        <script src="js/pulldown-menu.js"></script>
        <script src="js/datatables.js"></script>
        <script src="js/script.js"></script>
        <script>
            $('#form-buidler-action').remove()
            $('.question-item .card-footer, .item-move,[name="choice"],.add_chk, .add_radio,.rem-on-display').remove()
            $('[contenteditable]').each(function() {
                $(this).removeAttr('contenteditable')
            })
            $('.question-item .choice-field').html('')
            var data = $.parseJSON('<?php echo json_encode($data) ?>');
            $(function(){
                $('.question-item').each(function(){
                    var item = $(this).attr('data-item')
                    if(!!data[item] && data[item]['type'] == 'file'){
                        var el = $("<a download>")
                        el.attr({
                            href:"./uploads/"+data[item]['value']
                        })
                        el.text(data[item]['value'])
                        $(this).find('.choice-field').append(el)
                    }else{
                        $(this).find('.choice-field').append(data[item]['value'])
                    }
                })
            })
        </script>
    </body>
</html>