$(document).ready(function() {
	$('#textForm').submit(function(e) {
		e.preventDefault();
		var postData = $(this).serialize();
	    url = $(this).attr('action');

	    if (isPhoneNumberValid($('#phone').val())) {
	    	sendSMS(url, postData);
	    }
	    else {
	    }
		

		e.preventDefault();
	});
});

function isPhoneNumberValid(phoneNumber) {
	var phoneRegex = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
	if (phoneNumber.match(phoneRegex)) {
		return true;
	}
	else {
		return false;
	}
}

function sendSMS(url, data) {
	$.ajax({
            type: "post",
            url: url,
            data: data,
            contentType: "application/x-www-form-urlencoded",
            success: function(responseData, textStatus, jqXHR) {
            	console.log("success");
            },
            error: function(jqXHR, textStatus, error) {
                console.log(error);
            }
        })
}