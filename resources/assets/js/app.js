$(function () {

	$('.add-to-cart-btn-js').on('click', function () {
		var product_id = $(this).data('product-id');

		console.log({ product_id });

		var data = {
			id: product_id,
			quantity: 1
		}

		$.post("app/AddToCart.php", data, (response) => {
			console.log({ response });
			if (!response.error) {
				updateCartQty(1);
				$(this).text('Added');
			}

			showAlerts((!response.error ? 'success' : 'error'), response.message);
		}, "json");
	})

})



/* Cart page */

var total = 0;
$(function () {
	$(document).on('click', '.cart_delete', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'app/CartDelete.php',
			data: { id: id },
			dataType: 'json',
			success: function (response) {
				if (!response.error) {
					getDetails();
					getCart();
					getTotal();

					updateCartQty(-1);
				}

				showAlerts((!response.error ? 'success' : 'error'), response.message);
			}
		});
	});

	$(document).on('click', '.minus', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_' + id).val();
		if (qty > 1) {
			qty--;
		}
		$('#qty_' + id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'app/CartUpdate.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function (response) {
				if (!response.error) {
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.add', function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_' + id).val();
		qty++;
		$('#qty_' + id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'app/CartUpdate.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function (response) {
				if (!response.error) {
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	getDetails();
	getTotal();

});

function getDetails() {
	$.ajax({
		type: 'POST',
		url: "app/CartController.php",
		dataType: 'json',
		success: function (response) {
			console.log({ response });
			$('#tbody').html(response);
			getCart();
		},
	})
}

function getTotal() {
	$.ajax({
		type: 'POST',
		url: "app/CartTotal.php",
		dataType: 'json',
		success: function (response) {
			total = response;
		}
	});
}

function updateCartQty(cart_count) {
	var my_cart = $('.my-cart-btn-js');
	var notify_dot = my_cart.find('.notify-dot');

	if (notify_dot.length > 0) {
		var count = notify_dot.text();
		notify_dot.text((Number(count) + cart_count));
	} else {
		var cart_text = my_cart.text();
		my_cart.html(`<span class="notify-dot">1</span> ${cart_text}`);
	}
}

function showAlerts(type, message) {

	var errors = $('.errors-js');
	var alert = '.alert-success';
	errors.find('.alert').each((index, element) => {
		console.log(index, element);
		if (!$(element).hasClass('d-none')) {
			$(element).addClass('d-none');
		}
	});

	if (type === 'error') {
		alert = '.alert-danger';
	} else if (type === 'info') {
		alert = '.alert-info';
	}

	errors.find(alert).removeClass('d-none').text(message);
}