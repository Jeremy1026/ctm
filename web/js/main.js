$(document).ready(function() {
	$('#textForm').submit(function(e) {
		var postData = $(this).serialize();
	    url = $(this).attr('action');

		$.ajax({
            type: "post",
            url: url,
            data: postData,
            contentType: "application/x-www-form-urlencoded",
            success: function(responseData, textStatus, jqXHR) {
            	console.log("success");
            },
            error: function(jqXHR, textStatus, error) {
                console.log(error);
            }
        })

		e.preventDefault();
	});
});