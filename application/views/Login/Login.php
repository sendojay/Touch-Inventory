<?php echo $Template["Header"];?>
<?php echo $Template["Css"];?>
<?php echo $Template["Preload"];?>
<section id="wrapper" class="login-register">
  <div class="login-box">
    <div class="white-box">
          <?php echo 
          form_open(base_url("Login/Check_login"), array("class" => "form-horizontal form-material", "id" => "loginform"));
          ?>
        <h3 class="box-title m-b-20"><p>Login to your account</p></h3>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" name="username" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
     <?php echo form_close();?>
    </div>
  </div>
</section>
<?php echo $Template["Script"];?>
<?php echo $Template["Under"];?>