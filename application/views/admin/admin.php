<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin List</title>
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
                    <div class="col-lg-3 col-xl-2 col-md-4 sidebar fixed-top">
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
                                <a href="<?php echo base_url('AdminContr/viewAllProcess'); ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-file-circle-plus text-light fa-lg mr-3" aria-hidden="true"></i> Add Recipe
                                </a>
                            </li>
                            <hr>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/viewAllAdminRecords'); ?>" class="nav-link text-light p-3 mb-2 current"> <i class="fa fa-user text-light fa-lg mr-3" aria-hidden="true"></i> Admin List
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
                        <section class="content-header mb-4">
                            <h1>Admin User Profile</h1>
                        </section>
                        <div class="col-xs-12">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Verified</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                <?php
                                    if($records){
                                        foreach ($records as $record) {     
                                ?>

                                <tr>
                                    <td><?php echo $record->id?></td>
                                    <td><?php echo $record->first_name?></td>
                                    <td><?php echo $record->middle_name?></td>
                                    <td><?php echo $record->last_name?></td>
                                    <td><?php echo $record->age?></td>
                                    <td><?php echo $record->gender?></td>
                                    <td><?php echo $record->email?></td>
                                    <td><i class="fa-solid fa-circle-check" style="color: green; font-size: 20px"></i> <?php echo $record->is_email_verified?> </td>
                                    
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>

                </div>
            </div>
           
        </section>
    </div>   




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