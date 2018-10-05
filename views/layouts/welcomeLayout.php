<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="">

    <title>Lyt Framework</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL; ?>public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style type="text/css">

body {
    font-family: 'Roboto', sans-serif;
}

.content {
    margin-top: 25%;
    margin-left: auto;
    font-size: 50px;
    font-weight: 100;
}

#links {
    margin-top: 5px;
    font-size:14px;
}
    
</style>

<body class="container">
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <div id="page-content-wrapper" align="center">
            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper" class="container-fluid content">
                <!-- content -->
                <?php require 'views/' . $name . '.php'; ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
    <!-- /#wrapper -->
</body>
</html>
