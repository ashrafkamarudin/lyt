
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Lyt Framework</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL; ?>public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>

<style type="text/css">
    body{
        font-family: 'Roboto', sans-serif;
    }
    .form-control{
        height: 40px;
        box-shadow: none;
        color: #969fa4;
    }
    .form-control:focus{
        border-color: #5cb85c;
    }
    .form-control, .btn{        
        border-radius: 3px;
    }
    .signup-form{
        width: 400px;
        margin: 0 auto;
        padding: 30px 0;
    }
    .signup-form h2{
        color: #636363;
        margin: 0 0 15px;
        position: relative;
        text-align: center;
    }
    .signup-form h2:before, .signup-form h2:after{
        content: "";
        height: 2px;
        width: 30%;
        background: #d4d4d4;
        position: absolute;
        top: 50%;
        z-index: 2;
    }   
    .signup-form h2:before{
        left: 0;
    }
    .signup-form h2:after{
        right: 0;
    }
    .signup-form .hint-text{
        color: #999;
        margin-bottom: 30px;
        text-align: center;
    }
    .signup-form form{
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form .form-group{
        margin-bottom: 20px;
    }
    .signup-form input[type="checkbox"]{
        margin-top: 3px;
    }
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;      
        min-width: 140px;
        outline: none !important;
    }
    .signup-form .row div:first-child{
        padding-right: 10px;
    }
    .signup-form .row div:last-child{
        padding-left: 10px;
    }       
    .signup-form a{
        color: #2196f3;
        text-decoration: none;
    }
    .signup-form a:hover{
        text-decoration: underline;
    }
    .signup-form form a{
        color: #5cb85c;
        text-decoration: none;
    }   
    .signup-form form a:hover{
        text-decoration: underline;
    }  

    #links {
        margin-top: 5px;
        font-size:14px;
    }
</style>
    <body>
        <div id="wrapper">

            <div id="page-content-wrapper">
                <div class="contrainer-fluid-content" style="margin-top: 50px">
                    <!-- content -->
                    <?php require 'views/auth/' . $name . '.php'; ?>

                    <div id="links" class="text-center">
                        <a href="" class="btn btn-danger" style="margin-right: 5px">Home</a>
                        <a href="" class="btn btn-warning" style="margin-right: 5px">Documentation</a>
                        <a href="" class="btn btn-default" style="margin-right: 5px">Github</a>
                        <a href="<?php echo URL;?>login" class="btn btn-info" style="margin-right: 5px">Login</a>
                        <a href="<?php echo URL;?>register" class="btn btn-success">Register</a>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>
