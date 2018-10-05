<div class="signup-form">

    <?php Flash::Show() ?>

    <form action="<?php echo URL;?>login/doLogin" method="post">
        <h2>Sign In</h2>
        <p class="hint-text">Sign in with your e-mail or username.</p>        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>       
        <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required="required"> Remember Me.</label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Sign In</button>
        </div>
    </form>
    <div class="text-center">
        Dont have account? <a href="<?php echo URL;?>register">Register Now !</a>
    </div>
</div>