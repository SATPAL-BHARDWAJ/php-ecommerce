<header class="p-3 bg-theme text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <ul class="nav col-lg-auto me-lg-auto justify-content-center mb-md-0">
                <li><a href="<?php url('\\') ?>" class="btn btn-outline-light me-2">
                Gadgets
                    </a>
                </li>
                
            </ul>

            <div class="text-end">
                <?php if( isset($user) ) { ?> 
                    <a href="<?php url('\logout'); ?>" class="btn btn-outline-light me-2">Logout</a>
                   
                <?php } else { ?>

                    <a href="<?php url('\login'); ?>" class="btn btn-outline-light me-2">Login</a>
                    <!-- <a href="<?php url('\signup'); ?>" class="btn btn-warning">Sign-up</a> -->
                <?php } ?>

                <a href="<?php url('\cart'); ?>" class="btn btn-outline-light me-2 position-relative my-cart-btn-js"> 
                       <?php if ( isset($cart_count) && $cart_count > 0 ) { ?> <span class="notify-dot"><?php echo $cart_count ?></span>  <?php } ?> My Cart</a>
                
            </div>
        </div>
    </div>
</header>