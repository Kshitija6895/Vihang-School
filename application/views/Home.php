<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PAGE_TITLE; ?> | Home</title>
     <!-- [ Css ] start -->
     <?php include "Common/CSS.php"; ?>
     <!-- [ Css ] End -->
</head>

<body>
   <!-- [ Pre-loader ] start -->
   <?php include "Common/Loader.php"; ?>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <?php include "Common/Navbar.php"; ?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php include "Common/Header.php"; ?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Dashboard Analytics</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">             
                <!-- seo start -->
                <div class="col-xl-3 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3>10000</h3>
                                    <h6 class="text-muted m-b-0">Total Users</h6>
                                </div>
                                <div class="col-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3>1000</h3>
                                    <h6 class="text-muted m-b-0">Total Parents</h6>
                                </div>
                                <div class="col-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3>100</h3>
                                    <h6 class="text-muted m-b-0">Total Professionals</h6>
                                </div>
                                <div class="col-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3>1000</h3>
                                    <h6 class="text-muted m-b-0">Total Schools</h6>
                                </div>
                                <div class="col-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- seo end -->

            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
</body>
<!-- [ Js ] start -->
 <?php include "Common/JS.php"; ?>
     <!-- [ Js ] End -->

</html>