<?php
  if(isset($_SESSION['user'])){
    redirect('\\');
  }
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            QSale SignUp
        </div>
        <div class="card-body bg-light">
            <form class="p-4" method='POST' action='<?php url('/app/signup'); ?>'>
                <div class="form-group">
                    <label for="exampleInputname"> First Name </label>
                    <input type="text" name="firstname" class="form-control" id="exampleInputname" placeholder="Enter name">
                    <?php showFormError('firstname') ?>
                </div>

                <div class="form-group mt-3">
                    <label for="exampleInputname"> Last Name </label>
                    <input type="text" name="lastname" class="form-control" id="exampleInputname" placeholder="Enter name">
                    <?php showFormError('lastname'); ?>
                </div>

                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <?php showFormError('email'); ?>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <?php showFormError('password'); ?>
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputPassword2">Re-Password</label>
                    <input type="password" class="form-control" name="repassword" placeholder="Retype password" id="exampleInputPassword2">
                    <?php showFormError('repassword'); ?>
                </div>
               
                <div class="mt-3" >
                <button type="submit" name='signup' class="btn btn-outline-danger btn-block"><i class="fa fa-sign-in"></i> Signup </button>
                <a href="<?php url('/login'); ?>" class="btn btn-outline-primary btn-block"><i class="fa fa-sign-in"></i> Have Account? </a>
                </div>
                
            </form>
        </div>
        <div class="card-footer text-muted">
           All right reserved by QSale &copy; <?php echo date('Y') ?>
        </div>
    </div>
   
</div>
