<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="index.html">
                <!-- Logo icon image, you can use font-icon also --><b>
                <!--This is dark logo icon--><img src="public/plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="public/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                </b>
                <!-- Logo text image you can use text also --><span class="hidden-xs">
                <!--This is dark logo text--><img src="public/plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="public/plugins/images/admin-text-dark.png" alt="home" class="light-logo" /></span>
            </a>
        </div>
        <!-- /Logo -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <a class="profile-pic" href="#"> <img src="public/images/default-user.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['firstname'] . $_SESSION['lastname']; ?></b></a>
           </li>
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>