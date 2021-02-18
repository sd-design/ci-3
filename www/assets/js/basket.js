$(document).ready(function(){
	var prodList = [];
function goBasket(){
		if ($(this).hasClass('available')){
			window.location.replace('/basket/');
		}
		else {
			console.log('basket is empty...may be');
		}
	}
	function openGDPR(){
		$('.gdpr_wrap').toggle();
	}
	function checkGDPR(){
		if(localStorage.getItem('gdpr_accepts')){
			var gdprAccept = localStorage.getItem('gdpr_accepts');
			if(gdprAccept == 'true'){
			}
			if(gdprAccept == 'false'){
				console.log(gdprAccept);
				setTimeout(openGDPR, 7000);
			}
		}
		else{
			setTimeout(openGDPR, 5000);
		}
	}
	function hideGear(){
		$('#gearModal').modal('hide');
	}

function switchGear(){
	$('#gearModal').modal('show');
	setTimeout(hideGear, 600);
}

function checkIconBasket(){
		if ($('.webinar-block').hasClass('available')){
		}
		else {
			$('.webinar-block').addClass('available');
		}
}

function checkOrderForm(){

}
	$('.webinar-block').click(goBasket);
	$('#gotoBasket').on('click',function(){
		window.location.replace('/basket/');
	});
	$('#clearBasketList').on('click',function(){
		$('#listProducts').html('');
	});
	$('#delBasketList').on('click',function(){

		$.ajax({
			type: "GET",
			url: "/basket/clear/",
			dataType: "json",
			success: function (response) {
				if(response.answer == true){
					$('.list_products').html('');
					localStorage.setItem('basket_list', '');
						window.location.replace('/basket/');
				}
				if(response.answer == false){ alert('Server error!');setTimeout(window.location.replace('/basket/'), 1500);}
			},
			error: function (xhr, status, error) {
				console.log(status);
			}
		});
	});



	$.ajax({
		type: "GET",
		url: "/basket/status",
		dataType: "json",
		success: function (response) {
			if(response.answer == 'ok' || response.basket_init == true){
			$('.webinar-block').addClass('available');
			}
			else{localStorage.setItem('basket_list', '');}
		},
		error: function (xhr, status, error) {
			console.log(status);
		}
	});

	$('.del-item').on('click', function(){
		var delItem = $(this).data('item');
		var itemDelete ="[data-row="+delItem+"]";
		//console.log(delItem);
		$.ajax({
			type: "GET",
			url: "/basket/delete/"+delItem,
			dataType: "json",
			success: function (response) {
				if(response.answer == true){
					$('.item-row').filter(itemDelete).remove();
					console.log(response.product_list);
					localStorage.setItem('basket_list', response.product_list);
				}
				if(response.answer == false){ window.location.replace('/basket/');}
			},
			error: function (xhr, status, error) {
				console.log(status);
			}
		});
	});

	 $('.btn-buy').on('click', function(){
		var addItem = $(this).data('id');

		 $.ajax({
			type: "GET",
			url: "/basket/add/"+addItem,
			dataType: "json",
			success: function (response) {
				if(response.answer == true){
					$('#listProducts').html('');
					$('#basketModal').modal('toggle');
					prodList = response.product_list;
					$.each(JSON.parse(response.product_list), function(key, element){
						var rowProd = '<tr class="item-row" data-row=""><td>'+ element.name +'</td><td>'+ element.price +'</td><td>'+ element.qty +'</td></tr>';
						$('#listProducts').append(rowProd);
					});
					localStorage.setItem('basket_list', response.product_list);
					checkIconBasket();
					return prodList;
				}
				if(response.answer == false){ alert('Server error');
				}
			},
			error: function (xhr, status, error) {
				console.log(status);
			}
		});

});

$('.input-qty').change(function(e){
	switchGear();
	 	var qty = $(this).val();
	 	var addItem = $(this).data('id');
		 $.ajax({
			 type: "GET",
			 url: "/basket/update/"+addItem+"?qty="+qty,
			 dataType: "json",
			 success: function (response) {
				 if(response.answer == true){
				 }
				 if(response.answer == false){ alert('Server error');
				 }
			 },
			 error: function (xhr, status, error) {
				 console.log(status);
			 }
		 });
	 });

$('#agreeCheck').on('click',function(){
	var check = checkOrderForm();
		if($('#agreeCheck').prop("checked") == false){$('#sendOrder').attr( "disabled", true );$('#sendOrder').addClass('disabled');$('#agreeCheck').val('false');console.log(false)}
		if($('#agreeCheck').prop("checked") == true){$('#sendOrder').attr( "disabled", false );$('#sendOrder').removeClass('disabled');$('#agreeCheck').val('true');console.log(true)}
	});

	$('#readPolicy').on('click',function(){
		$('#agreeCheck').prop("checked", true);
	});

	//GDPR part
	checkGDPR();
	$('#agreeGDPR').on('click', function(){
		localStorage.setItem('gdpr_accepts', true);
		$('.gdpr_wrap').toggle();
	});
	$('#closeGDPR').on('click', function(){
		localStorage.setItem('gdpr_accepts', false);
		$('.gdpr_wrap').toggle();
	});
	 //global end
});
