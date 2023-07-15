<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PigMe Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- local  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
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
                                <a href="<?php echo base_url('AdminContr/viewAllOrderRecords'); ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-shopping-cart text-light fa-lg mr-3" aria-hidden="true"></i> Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/viewAllOrderRecords'); ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-spinner text-light fa-lg mr-3" aria-hidden="true"></i> In-Process
                                </a>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/viewAllDeliverRecords'); ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-motorcycle text-light fa-lg mr-3" aria-hidden="true"></i> Delivery
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/viewRecordHistory'); ?>" class="nav-link text-light p-3 mb-2 current"> <i class="fa fa-history text-light fa-lg mr-3" aria-hidden="true"></i> Order History
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('AdminContr/viewAllAdminRecords'); ?>" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-user text-light fa-lg mr-3" aria-hidden="true"></i> Admin List
                                </a>
                            </li>
                            <hr>
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
                                <img src="<?php echo base_url('assets/PigMeLogoH.png'); ?>" width="130px;" class="rounded-circle mr-1">
                            </div>
                            <div class="user mt-2">
                                <img src="<?php echo base_url('assets/user.png'); ?>" width="40"height="40" class="rounded-circle mr-0">
                                <p class="text-white"><?php echo $this->session->userdata('username'); ?></p><br>
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
                        <section class="content-header mb-2">
                            <!--Search Button-->
                            <form action="<?php echo base_url('AdminContr/fetch') ?>" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search-input" placeholder="Search here" name="search">
                                    <button type="submit" class="btn btn-light" id="search-button"><i class="fa fa-search text-danger"></i></button>
                                </div>
                            </form>
                            <h1>Order History</h1>
                        </section>
                    <div class="table-wrap">
                        <div id="result" class="col-xs-12">
                            <table class="table table-bordered">
                                <thead style="font-size: 20px;">
                                    <tr >
                                        <th>ID</th>
                                        <th style="width: 180px;">Customer Name</th>
                                        <th style="width: 150px;">Contact #</th>
                                        <th style="width: 150px;">Customer Address</th>
                                        <th >Date Ordered</th>
                                        <th>Order Details</th>
                                        <th style="width: 100px;">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        if($records){
                                            foreach ($records as $record) {     
                                    ?>

                                    <tr>
                                        <td><?php echo $record->id?></td>
                                        <td><?php echo $record->customername?></td>
                                        <td><?php echo $record->contactnumber?></td>
                                        <td><?php echo $record->customeraddress?></td>
                                        <td><?php echo $record->dateordered?></td>
                                        <td><?php
                                        if ($record->order1 != "") {
                                            echo "1. ".$record->order1."<br>";
                                        }
                                        if ($record->order2 != "") {
                                            echo "2. ".$record->order2."<br>";
                                        }
                                        if ($record->order3 != "") {
                                            echo "3. ".$record->order3."<br>";
                                        }
                                        if ($record->order4 != "") {
                                            echo "4. ".$record->order4."<br>";
                                        }
                                        if ($record->order5 != "") {
                                            echo "5. ".$record->order5."<br>";
                                        }
                                        if ($record->order6 != "") {
                                            echo "6. ".$record->order6."<br>";
                                        }
                                        if ($record->order7 != "") {
                                            echo "7. ".$record->order7."<br>";
                                        }
                                        if ($record->order8 != "") {
                                            echo "8. ".$record->order8."<br>";
                                        }
                                        if ($record->order9 != "") {
                                            echo "9. ".$record->order9."<br>";
                                        }
                                        if ($record->order10 != "") {
                                            echo "10. ".$record->order10."<br>";
                                        }

                                        ?></td>
                                        <td>₱ <?php echo $record->total?></td> 
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

