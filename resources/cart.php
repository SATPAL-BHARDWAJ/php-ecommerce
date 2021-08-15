<?php $cart_count = countCart(); ?>
<div class="cart-wrapper wrapper">

	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
		  	<?php if ( isset($cart_count) && $cart_count > 0 ) { ?>
	        <div class="row">
	        	<div class="col-sm-12">
	        		<!-- <h1 class="page-header">YOUR CART</h1> -->
	        		<div class="box box-solid">
	        			<div class="box-body">
		        		<table class="table table-bordered">
		        			<thead>
		        				<th></th>
		        				<th>Photo</th>
		        				<th>Name</th>
		        				<th>Price</th>
		        				<th width="20%">Quantity</th>
		        				<th>Subtotal</th>
		        			</thead>
		        			<tbody id="tbody">
		        			</tbody>
		        		</table>
	        			</div>
	        		</div>
	        		<?php
	        			if(isset($_SESSION['user'])){
	        				echo ""; // we can add payment gateway here
	        			}
	        			else{
	        				echo "
	        					<h4>You need to <a href='login'>Login</a> to checkout.</h4>
	        				";
	        			}
	        		?>
	        	</div>
	        	
	        </div>
			<?php } else { ?>

				<div>
					<img src="./resources/assets/images/undraw_add_to_cart.svg" class="img-fluid"/>
				</div>

			<?php } ?>
	      </section>
	     
	    </div>
	  </div>
</div>


