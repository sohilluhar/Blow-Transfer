<?php

session_start();
$usermobile = $_SESSION['mobile'];
$useremail = $_SESSION['username'];
//$_SESSION['process'] ="loggedin";

$basename = substr(strtolower(basename($_SERVER['PHP_SELF'])),0,strlen(basename($_SERVER['PHP_SELF']))-4);

if ((empty($usermobile)) && ($basename!="index")) {
 header('Location: login.php');
 exit;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Share File</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<script type="text/javascript">
    
    function valid()
{
    var recieverjs = document.forms["uploadfile"]["reciever"].value;
    // var email = document.forms["register"]["email"].value;
    // var phone = document.forms["register"]["mobile"].value;
    // var pass = document.forms["register"]["password"].value;
    // var cp = document.forms["register"]["confirm"].value;
     var inp = document.getElementById('fileToUpload');
    if(recieverjs==="")
    {
        alert("please Enter recepient Number");
        return false;
    }
    if(inp.files.length === 0){
        alert("Attachment Required");
        inp.focus();
        return false;
    }
   
}
 
</script>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    BLow Transfer
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="uploadFile.php">
                            <i class="material-icons">file_upload</i>
                            <p>Share File</p>
                        </a>
                    </li>
                    <li>
                        <a href="sharedFiles.php">
                            <i class="material-icons">folder_shared</i>
                            <p>Shared Files</p>
                        </a>
                    </li>
                    <li>
                        <a href="recievedFiles.php">
                            <i class="material-icons">assignment_return</i>
                            <p>Received Files</p>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="material-icons">person</i>
                            <p>Logout</p>
                        </a>
                    </li>
                    
                   <!--  <li class="active-pro">
                        <a href="upgrade.html">
                            <i class="material-icons">unarchive</i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Share File </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li> -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <!-- <span class="notification"></span> -->
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">
                                        <?php 
                                        echo $_SESSION['name'];



                                        ?></a>
                                    </li>
                                    
                                    <li>
                                        <a href="logout.php">
                                        Logout



                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li> -->
                        </ul>
                            
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Share File</h4>
                                    <p class="category">Enter the Users details you want to share the file with!</p>
                                </div>
                                <div class="card-content">
                                    <form enctype="multipart/form-data" action="fileProcess.php" method="post" name='uploadfile' id='uploadfile'>
                                        <div class="row">                                          
                                        
                                            <div class="col-md-5">
                                                    
                                                <div class="form-group label-floating">
                                                    
                                                    <label class="control-label">mobile Number</label>
                                                    <input type="tel" class="form-control" name="reciever" id="reciever" required="true">
                                                </div>
                                            </div>
                                             <!-- <div class="col-md-3">
                                                <div class="form-group label-hintText">
                                                    <input name="file" type="file"  />
                                                </div>

                                            </div> -->
                                            <!-- <div class="col-md-4">
                                                <div >
                                                   
                                                       
                                                
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div >
                                                     <input type="file" name="fileToUpload" id="fileToUpload" required="true" />
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">City</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Postal Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>-->
                                            <!--  <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                                                        <textarea class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn btn-primary pull-right" onclick="valid()">Send Files</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="../assets/img/faces/marc.jpg" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="category text-gray">CEO / Co-Founder</h6>
                                    <h4 class="card-title">Alec Thompson</h4>
                                    <p class="card-content">
                                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                    </p>
                                    <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                                </div>
                            </div>
                        </div> -->
                    <!--     -->
                   <!--  <div class="body">

                            <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data"> 
                               <!--  <div class ="dropzone"> -->
                                <!-- <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
                                    <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                                </div>

                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div> -->
                            <!-- </form> -->
                        <!-- </div> -->
                        <!-- </div>  -->
                </div>
            </div>

           <!--  <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer> -->
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script src="plugins/dropzone/dropzone.js"></script>
</html>