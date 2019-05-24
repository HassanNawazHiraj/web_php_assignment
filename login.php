<?php
session_start();
//signup file
include_once("functions.php");

//if user directly accessed dashboard show this message
if(isset($_GET['show_direct_access_error'])) {
    $alert = "please login to access Dashboard";
}



//if already logined then redirect to dashboard
if(isset($_COOKIE['user'])) {
    header("location: index.php?already_loged_in=1");
}


//login process
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $db = new Functions();
    $db->connect();


//data to send to functions
    $data = [
        ["user_name", "'".$username."'"],
        ["user_password", "'".$password."'"]
    ];

    $response = $db->read_where("users", $data);
    


    //handle response and redirect
    if($response) {
        setcookie("user", $username, time() + 3600);
        $_SESSION['loginCount'] += 1;
        header("location: index.php");
    } else {
        $alert = "wrong username/password";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>ByteRemix - Signup</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 50px;
    }
    .starter-template {
        padding: 40px 15px;
        text-align: center;
    }
</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ByteRemix</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Dashboard</a></li>
                    <li class="active"><a href="login.php">login</a></li>
                    <li ><a href="signup.php">signup</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <?php 
        if(isset($alert)) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $alert;
            echo '</div>';
        }

        if(isset($success)) {
            echo '<div class="alert alert-success" role="alert">';
            echo $success;
            echo '</div>';
        }
        ?>


        <div class="col-md-12">
            <div class="modal-dialog" style="margin-bottom:0">
                <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User name" name="username" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                        <!--
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                    -->
                    <!-- Change this to a button or input when using this as a form -->
                    <input class="btn btn-sm btn-success" value="login" type="submit"></input>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div>

<hr>

<!-- /.row -->
</div>
<!-- /.container -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>