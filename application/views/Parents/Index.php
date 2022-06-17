<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo PAGE_TITLE;?> | Parents</title>
    <!-- [ Css ] start -->
    <?php $this->load->view("Common/CSS.php"); ?>
     <!-- [ Css ] End -->
</head>

<body>
    <!-- [ Pre-loader ] start -->
    <?php $this->load->view("Common/Loader.php"); ?>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <?php $this->load->view("Common/Navbar.php"); ?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php $this->load->view("Common/Header.php"); ?>
    <!-- [ Header ] end -->

  
</body>
 <!-- [ Js ] start -->
 <?php $this->load->view("Common/JS.php"); ?>
     <!-- [ Js ] End -->
<!-- [ Js ] End -->

</html>