
<?php
  if(isset($_SESSION['user'])){
    redirect('\\');
  }
?>


<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            QSale Login
        </div>
        <div class="card-body bg-light">
            <form class="p-4" method='POST' action='<?php url('/app/login'); ?>'>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
               
                <div class="mt-3">
                    <button type="submit" name="login" class="btn btn-outline-danger btn-block"><i class="fa fa-sign-in"></i> Login</button>
                    <a href="<?php url('/signup'); ?>" class="btn btn-outline-primary btn-block"><i class="fa fa-sign-in"></i> Create Account</a>
                </div>
                
            </form>
        </div>
        <div class="card-footer text-muted">
           All right reserved by QSale &copy; <?php echo date('Y') ?>
        </div>
    </div>
   
</div>

