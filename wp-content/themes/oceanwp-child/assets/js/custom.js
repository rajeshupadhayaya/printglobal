$(function(){ // document ready
	if (!!$('#site-header').offset()) { // make sure ".sticky" element exists
		var stickyTop = $('#site-header').offset().top; // returns number 
		$(window).scroll(function(){ // scroll event

			var windowTop = $(window).scrollTop(); // returns number 
			if (stickyTop < windowTop){
					$('#site-header').css({ position: 'fixed', top: 0, width: '100%' });
					$('#site-header').addClass('is-stuck');
					navTopHeight = $('#site-header').outerHeight();
					$('.content').css('margin-top',navTopHeight);

			}else{
				$('#site-header').removeAttr('style');
				$('#site-header').removeClass('is-stuck');
				$('.content').css('margin-top','0');
			};
		});
	};

  // $('.upload_design-wrapper').css('display','none');
  $('select[name="printing_options"]').on('change', function(){
  console.log($(this).val());
      if($(this).val() == 'Print Only'){
        $(".upload_design-wrapper").css("display", "table");
      }else{
        $(".upload_design-wrapper").css("display", "none");
      }
	})
	
	$('select').change(function(){
		// console.log(elementorFrontendConfig['post']['id']);
		var id = elementorFrontendConfig['post']['id'];
		var title = elementorFrontendConfig['post']['title'];
		var height = $('select[name="height"] option:selected').val() ;
		var length = $('select[name="length"] option:selected').val() ;
		// var size = $('select[name="size"] option:selected').val() ;
		var form_data = new FormData();

    form_data.append('id', id);
    form_data.append('title', title);
    form_data.append('height', height);
    form_data.append('action', 'product_price');
		form_data.append('length', length);
		// form_data.append('size', size);
		
		if (height !=undefined && length !=undefined)	{
			$( ".woocommerce-variation-add-to-cart .button, button[name=add-to-cart]" ).addClass( "disabled" );
			jQuery.ajax({
				url: '../../wp-admin/admin-ajax.php',
				type: 'post',
				contentType: false,
				processData: false,
				data: form_data,
				success: function (response) {
						console.log(response);
						$( ".summary.entry-summary .price .woocommerce-Price-amount" ).replaceWith( response );
						$( ".woocommerce-variation-add-to-cart .button, button[name=add-to-cart]" ).removeClass( "disabled" );
				},
				error: function (response) {
					console.log(response);
				}
			});
		}
		
	});
});


// $(document).on('click', '#upload-file', function (e) {
// 	$(progressBar).removeClass("hidden");
// 	$(progressBar).addClass("show");
// 	function uploadProgressHandler(event)
//   	{
// 	    // $("#loaded_n_total").html("<b>Uploaded</b> "+event.loaded+" bytes of "+event.total);
// 	    var percent = (event.loaded / event.total) * 100;
// 	    var progress = Math.round(percent);

// 	    if(progress>0 && progress <= 100){
// 	    	$("#uploadProgressBar").css("width", progress + "%");	
// 	    }
	    
//   	}

// 	function loadHandler(event)
//     {
//     	$("#status").html(event.target.responseText);
//     	$("#uploadProgressBar").css("width", "0%");
//     }

//     function errorHandler(event){
//     	$("#status").html("Upload Failed");
//     }

//     function abortHandler(event){
//     	$("#status").html("Upload Aborted");
//     }
//     var email = $('#email').val();

//     var message = $('#message').val();
//     var file_data = $('#file-to-upload').prop('files')[0];

//     var form_data = new FormData();
//     if (email == '') {
//         $('#email').css({"border": "1px solid red"})
//         return false;
//     } 
//     else {
//         $('#email').css({"border": "1px solid #e3ecf0"})
//     }
//     if (message == '') {
//         $('#message').css({"border": "1px solid red"})
//         return false;
//     } 
//     else {
//         $('#message').css({"border": "1px solid #e3ecf0"})
//     }

//     form_data.append('file', file_data);
//     form_data.append('action', 'upload_file');
//     form_data.append('email', email);
//     form_data.append('message', message);

//     $.ajax({
//         url: '../wp-admin/admin-ajax.php',
//         type: 'post',
//         contentType: false,
//         processData: false,
//         data: form_data,
//         success: function (response) {
//             $('.Success-div').html(response);
//         },
//         error: function (response) {
//          $('.Success-div').html(response);
//         },
//         xhr: function()
//             {
//               var xhr = new window.XMLHttpRequest();
//               xhr.upload.addEventListener("progress",
//                                           uploadProgressHandler,
//                                           false
//                                          );
//               xhr.addEventListener("load", loadHandler, false);
//               xhr.addEventListener("error", errorHandler, false);
//               xhr.addEventListener("abort", abortHandler, false);

//               return xhr;
//             }
//       });

// });

// $(document).ready(function() {
//      $(".single_add_to_cart_button").removeClass("single_add_to_cart_button")
//  });

