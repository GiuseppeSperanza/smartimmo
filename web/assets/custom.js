$(document).ready(function() {
   
	if (window.location.pathname == "/login"){
		$("body").addClass("bodyOverflow");
	}

	$('#submitFormLogout').click(function(event){
 		event.preventDefault();
	    var form = $("#logout-form");
	    form.submit();
	});




	$('#arrowGoBack').click(function(){
		window.location.href = "/";
	});

	//clear form
	$("#deleteAnnouncement").click(function(event) {
	    event.preventDefault();
	    var form = $("#delete-form");
	    form.submit();
	});


	$(".reset").click(function() {
	    $(this).closest('form').find("input[type=text], textarea, input[type=number], label.custom-file-label, input[type=email], input[type=tel]").val("").html("");
	});


	$('input:submit').attr('disabled',true);
	function checkImg(){
	
	$('#inputImg').bind('change',function(){
			var ext = $('#inputImg').val().split('.').pop().toLowerCase();
			var filename = $('#inputImg').val().replace(/C:\\fakepath\\/i, '').toLowerCase();
			$('label.custom-file-label').html(filename);

			if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
				$('input:submit').attr('disabled',true);
				$('#error1').slideDown();
				$('#error2').slideUp();
				a=0;
			}
			else
			{
				var picsize = (this.files[0].size);
				if (picsize > 10000000){
				$('input:submit').attr('disabled',true);
				$('#error2').slideDown();
				a=0;
			}
			else
			{
				a=1;
				$('#error2').slideUp();
			}
			$('#error1').slideUp();
			if (a==1){
				$('input:submit').attr('disabled',false);
			}
		}
	});

}
	
	$("#form-new-announcement").validate({
		rules: {
			category: {
				required:true
			},
			typology: {
				required:true
			},
			contract: {
				required:true
			},
			price: {
				required:true
			},
			surface: {
				required:true
			},
			comune: {
				required:true
			},
			locals: {
				required:true
			},
			inputImg: {
				required: checkImg()

			}
		}
	});

});



//override default message jquery validate

jQuery.extend(jQuery.validator.messages, {
    required: "Questo campo è richiesto"
});