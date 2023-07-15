<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Recipe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- local  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">


</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md  navbar-light">
        <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse " id="myNavbar">
            <div class="container-fluid">
                <div class="row">
                    <!-- sidebar navbar -->
                    <div class="col-lg-3 col-xl-2 col-md-6 sidebar fixed-top">
                        <div class="avatar justify-content-center mt-4" style="display: inline-block;">
                            
                        </div>
                        <ul class="navbar-nav flex-column mt-4">
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr'); ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-home text-light fa-lg mr-3" aria-hidden="true"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/viewAllRecipe'); ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-book text-light fa-lg mr-4" aria-hidden="true"></i> Recipes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/viewAllProcess'); ?>" class="nav-link text-light p-3 mb-2 current" > <i class="fa fa-file-circle-plus text-light fa-lg mr-3" aria-hidden="true"></i> Add Recipes
                                </a>
                            </li>
                            <hr>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/viewAllAdminRecords'); ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-user text-light fa-lg mr-3" aria-hidden="true"></i> Admin List
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/viewAllUserRecords'); ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-user text-light fa-lg mr-3" aria-hidden="true"></i> User List
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/logout') ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-sign-out text-danger fa-lg mr-3" aria-hidden="true"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end sidebar -->

                    <!--  top nav-->
                    <div class="top-navbar">
                        <div class="row align-items-center">
                            <div class="brand">
                                <img src="<?php echo base_url('assets/dblogo.png'); ?>" width="200px;" class="mt-0 mr-1">
                            </div>
                            <div class="user mt-1">
                                <img src="<?php echo base_url('assets/user1.png'); ?>" width="30" height="30" class="mt-0 mr-0">
                                <p class="text-white mt-1">Hi, buddy!</p> <p class="name"><?php echo $this->session->userdata('username');?></p><br>
                            </div>
                        </div>
                    </div>
                    <!-- end nav -->
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                 <div class="box">
                    <div class="table-wrap">
                        <section class="content-header mb-3">
                            <h1>Add Recipe</h1>
                        </section>
                        <section class="panel mt-5">
                        <div class="col-md-12">
                            <div class="card-recipe">

                        <?php
                    if ($this->session->flashdata('success_msg')){
                        echo '
                            <div class="alert alert-success">
                            '.$this->session->flashdata('success_msg').'</div>
                        ';
                    }
                    ?>
                    

                <form action="<?php echo base_url('AdminContr/addRecipeRecord'); ?>" method="POST" class="text-center">
                    <div class="row text-center mb-4 mt-3">
                        <div class="col-md-12">
                            <div class="form-group__recipe" style="display: -webkit-inline-box;">
                                <label for="recipe" class="mt-1 pr-3">Recipe Name:</label>
                                <input type="text" name="txtRecipe" id="right-span" style="width: 300;" autocomplete="off" required>
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group__recipe" style="display: -webkit-inline-box;">
                                <label for="recipe" class="mt-1 pr-3">Cooking Time:</label>
                                <input type="text" name="txtCookingTime" id="right-span" style="width: 300;">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group__recipe">
                                <label for="recipe">Calories:</label>
                                <input type="text" name="txtCal" id="right-span" style="margin-left: 24px;">
                                <span class="measurement">KCal</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group__recipe">
                                <label for="recipe">Sugar:</label>
                                <input type="text" name="txtSugar" id="right-span">
                                <span class="measurement">g</span>
                            </div>
                        </div>
                    </div>
 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group__recipe">
                                <label for="recipe">Fat:</label>
                                <input type="text" name="txtFat" id="right-span">
                                <span class="measurement">g</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group__recipe">
                                <label for="recipe">Carbs:</label>
                                <input type="text" name="txtCarb" id="right-span">
                                <span class="measurement">g</span>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group__recipe">
                                <label for="recipe">Protein:</label>
                                <input type="text" name="txtProtein" id="right-span">
                                <span class="measurement">g</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group__recipe">
                                <label for="recipe">Fibre:</label>
                                <input type="text" name="txtFibre" id="right-span">
                                <span class="measurement">g</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group__recipe">
                        <button type="submit" name="addrecipe" class="btn btn-primary">Add Recipe</button>
                        </div>
                </form>
                            
                        </div> 
                        </section>
                        
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>   
    <script type="text/javascript">
        
        function myFunction(){
           $(this).remove()
        }
    </script>


    <!-- local -->
    <script type="text/javascript " src="script.js "></script>
    <script src="js/bootstrap.min.js "></script>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

</html>

