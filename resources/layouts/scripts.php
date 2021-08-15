<script src="./resources/assets/js/list.min.js"></script>
<script src="./resources/assets/js/auth.js"></script>

<script>
$(function(){
	
	var options = {
  		valueNames: [ 'name' ]
	};

// Init list
var contactList = new List('qsale_products', options);


  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

  getCart();

  $('form.productForm').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();

  	$.ajax({
  		type: 'POST',
  		url: "<?php url('/app/AddToCart.php') ?>",
  		data: product,
  		dataType: 'json',
  		success: function(response){
			console.log('', response);
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

function getCart(){
	$.ajax({
		type: 'POST',
		url: "<?php url('/app/CartFetch.php') ?>",
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			$('.cart_count').html(response.count);
		}
	});
}
</script>