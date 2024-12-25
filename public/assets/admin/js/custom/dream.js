var urlval = "";
 
$(document).ready(function () {
 
	
		$('.btn-submit').on('click', function (e) {
			e.preventDefault();	 
			var formid = $(this).closest("form").attr('id');
	sendform('#'+formid);
	});
	$('#btn_reset').on('click', function (e) {
		e.preventDefault();
		var formid = $(this).closest("form").attr('id');
	 	resetForm(formid);
		ClearErrors();
	});
	function ClearErrors() {
	 
		$("." + "error").html('').hide();

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
			//contentType: 'application/json',
			success: function (data) {
				 
				if (data.length == 0) {
					//noteError();
				} else if (data == "ok") {
					 
					swal( "تم الحفظ بنجاح");
					 	
				}

	 
			}, error: function (errorresult) {
		 
				var response = $.parseJSON(errorresult.responseText);
	 
				swal( "لم يتم الحفظ");
				$.each(response.errors, function (key, val) {
				 
					$("#" + "info-form-error").append('<li class="text-danger">'+val[0]+'</li>');
					$("#" + key + "-error").text(val[0]).show();
					$("#" + key).addClass('parsley-error');
				});

			}, finally: function () {
			 

			}		});
	}
 
	 
  
	 
 
	 
	});
	 
 

function noteSuccess() {
	// notif({
	// 	msg: "تمت العملية بنجاح",
	// 	type: "success"
	// });
}
function noteError() {
	// notif({
	// 	msg: "لم تنجح العملية !",
	// 	position: "right",
	// 	type: "error",
	// 	bottom: '10'
	// });
}
 
 
function resetForm(formid) {
	formid="#"+formid;
	jQuery(formid)[0].reset();
	$('#image_label').text("Choose File");
	//$('#icon_label').text('اختر ملف SVG');
	$('#imgshow').attr("src", "");
 
	//$('#iconshow').attr("src", emptyimg);
}