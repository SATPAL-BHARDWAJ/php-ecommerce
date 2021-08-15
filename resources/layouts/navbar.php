<header class="p-3 bg-theme text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?php url('\\') ?>" class="btn btn-outline-light me-2">
                Gadgets
                    </a>
                </li>
                
            </ul>

            <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search Product..." aria-label="Search">
            </form> -->

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