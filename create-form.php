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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        
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
                                    <i class='bx bx-grid-alt nav__icon ' ></i>
                                    <span class="nav__name ">Dashboard</span>
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <div class="sub-menu ">
                                    <a href="#" class="sub-item nav__link border-top">sub item</a>
                                    <a href="#" class="sub-item nav__link border-top">sub item 2</a>

                                </div>
                            </div>
                            
                            <div class="nav__list">
                                <a href="#" class="nav__link d-flex justify-content-start">
                                    <i class='bx bx-user nav__icon' ></i>
                                    <span class="nav__name">Employee</span>
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <div class="sub-menu ">
                                    <a href="./add-staff.php" class="sub-item nav__link border-top">Add employee</a>
                                    <a href="#" class="sub-item nav__link border-top">Leave employee</a>
                                    
                                </div>
                                
                                <a href="#" class="nav__link d-flex justify-content-start">
                                    <i class='bx bx-message-square-detail nav__icon' ></i>
                                    <span class="nav__name">Add data</span>
                                    <i class='bx bx-chevron-down'></i>

                                </a>
                                <div class="sub-menu ">
                                    <a href="#" class="sub-item nav__link">sub item</a>
                                    <a href="#" class="sub-item nav__link">sub item 2</a>
                                </div>
                            </div>
                      
                            <div class="nav__list">
                                <a href="#" class="nav__link d-flex justify-content-start">
                                    <i class='bx bx-grid-alt nav__icon' ></i>
                                    <span class="nav__name">Form</span>
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <div class="sub-menu ">
                                        <a href="#" class="sub-item nav__link">Response list</a>
                                        <a href="#" class="sub-item nav__link">sub item 2</a>
                                </div>
            
                                <a href="#" class="nav__link">
                                        <i class='bx bx-user nav__icon' ></i>
                                        <span class="nav__name">Form template</span>
                                </a>
                                
                                <a href="./form-list.php" class="nav__link">
                                        <i class='bx bx-message-square-detail nav__icon' ></i>
                                    <span class="nav__name">Form list</span>
                                </a>
                            </div>

                          
                            
                            <div class="nav__list">
                                <a href="./login.html" class="nav__link">
                                        <i class='bx bx-log-out nav__icon' ></i>
                                        <span class="nav__name">Log Out</span>
                                </a>
                            </div>
                       
    
    
                    </nav>
                </div>
            </div>

<!--End Sidebar part-->

<!-- Content part-->
<div class="content"> 
        <div class="container-fluid">
            <div class="card-1">
                <h2 class="mb-4 border-bottom"><?php echo isset($_GET['code']) ? "Edit" : "Create New" ?> Form</h2>
           
            <hr class="border-dark">
            <div class="" id="form-field">
                <form id="form-data">
                    <div class="row">
                        <div class="card col-md-12 border border-primary">
                            <div class="card-body">
                                <p contenteditable="true" title="Enter Title" class="text-center" id="form-title">Enter Title Here</p>
                                <hr class="border-primary">
                                <p contenteditable="true"  id="form-description" title="Enter Description" class="form-description text-center">Enter Description Here</p>
                            </div>
                            
                        </div>
                    </div>
                    <div>
                        <div id="question-field" class='row ml-2 mr-2'>
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
                                                <option value="checkbox">Multiple choice (multiple answer)</option>
                                                <option value="radio">Multiple choice (single answer)</option>
                                                <option value="file">File upload</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="border-dark">
                                    <div class="row ">
                                        <div class="form-group choice-field col-md-12">
                                            <textarea name="q[0]" class="form-control col-sm-12" cols="30" rows="5" placeholder="Write your answer here"></textarea>
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
                                        <button class="btn btn-default border rem-q-item" type="button"><i class='bx bx-trash-alt'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex w-100 justify-content-center" id="form-buidler-action">
                        <button class="btn btn-default border mr-1" type="button" id="add_q-item"><i class="fa fa-plus"></i> Add Item</button>
                        <button class="btn btn-default border ml-1" type="button" id="save_form"><i class="fa fa-save"></i> Save Form</button>
                    </div>
                </form>
            </div>
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
                                <option value="checkbox">Multiple choice (multiple answer)</option>
                                <option value="radio">Multiple choice (single answer)</option>
                                <option value="file">File upload</option>
                            </select>
                        </div>
                    </div>
                    <hr class="border-dark">
                    <div class="row ">
                        <div class="form-group choice-field col-md-12">
                            <textarea name="q[]" class="form-control col-sm-12" cols="10" rows="5" placeholder="Write your answer here"></textarea>
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
                        <button class="btn btn-default border rem-q-item" type="button"><i class='bx bx-trash-alt'></i></button>
                    </div>
                </div>
            </div>
            </div>

            </div>
   
        </div>
    </div>


    <!--End Content part-->
    <footer class="footer">
     

                <div class="footer_copyright-box">
                            <p class="footer_author">Copyright Aidil Maula. All rights reserved.</p>

                </div>

            </footer>
</div>
      

        
    








        <!-- Javascript -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        

        <script src="js/form-builder.js"></script>
        <script src="js/pulldown-menu.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>









