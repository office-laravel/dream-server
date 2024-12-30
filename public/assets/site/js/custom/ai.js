var valid=true;

$(document).ready(function() {  
  $("#question").focusout(function (e) {
    if (!validatempty($(this))) {
			return false;
		} else {		 
		}
	 
	});      
   //register form 
   $('.ask-btn').on('click', function (e) {
		e.preventDefault();
		
if( validatempty($("#question"))){
    var formid = $(this).closest("form").attr('id');
		sendform('#' + formid);
}		
	});
 
	function ClearErrors() {
		$("." + "invalid-feedback").html('').hide();
		$('.is-invalid').removeClass('is-invalid');
	}

	function sendform(formid) {
		ClearErrors();
		var form = $(formid)[0];
		var formData = new FormData(form);
		urlval = $(formid).attr("action");
		$.ajax({
			url: urlval,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,

			success: function (data) {
				if (data.length == 0) {
					noteError();
				} else  {
					noteSuccess(); 	
					$("#answer").html(data.response);
					$(".dream-result").show();				 
					$("html, body").animate({ scrollTop: $('#dream-result-section').offset().top -'100' }, 500);
			
				}  
				resetForm(formid);

			}, error: function (errorresult) {
				var response = $.parseJSON(errorresult.responseText);
				noteError();
				$.each(response.errors, function (key, val) {
				 $("#" + key).append('<li class="text-danger">' + val[0] + '</li>');				
					$("#" + key).addClass('is-invalid');
				});
			}, finally: function () {		 

			}
		});
	}

   //end register
   
});
  function resetForm(formid) {
	 
	jQuery(formid)[0].reset();
  
}
  function noteSuccess() {
  //  swal("تم   بنجاح");
  }
  function noteError() {
    swal("لم تنجح العملية");
  }