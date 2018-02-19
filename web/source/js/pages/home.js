$(document).ready(function() {
	$('#textForm').submit(function(e) {
		e.preventDefault();
		var postData = $(this).serialize();
	    url = $(this).attr('action');

	    var errorMessage = $('.errorMessage');

	    if (($('#name').val() === '') || ($('#phone') === '') || ($('#message') === '')) {
	    	console.log("misisng data");
	    	errorMessage.html('Please fill in all the fields and try again.');
	    	errorMessage.show(500);
	    	return;
	    }

	    if (isPhoneNumberValid($('#phone').val())) {
	    	sendSMS(url, postData);
	    	errorMessage.hide();
	    }
	    else {
	    	errorMessage.html('Phone number is invalid, please correct and try again.');
	    	errorMessage.show(500);
	    	console.log("Phone number invalid");
	    }
	});
});

function isPhoneNumberValid(phoneNumber) {
	var phoneRegex = /^\(?([2-9][0-8][0-9])\)?[-.●]?([2-9][0-9]{2})[-.●]?([0-9]{4})$/
	if (phoneNumber.match(phoneRegex)) {
		return true;
	}
	else {
		return false;
	}
}

function sendSMS(url, data) {
    var errorMessage = $('.errorMessage');
	$.ajax({
            type: "post",
            url: url,
            data: data,
            contentType: "application/x-www-form-urlencoded",
            success: function(responseData, textStatus, jqXHR) {
		    	errorMessage.html('Your message has been sent!');
		    	errorMessage.addClass('success');
		    	errorMessage.show(500);
            },
            error: function(jqXHR, textStatus, error) {
		    	errorMessage.html('An erorr has occured: '+error);
		    	errorMessage.show(500);
            }
        })
}