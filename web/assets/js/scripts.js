

// file: web/source/js/pages/home.js

$(document).ready(function() {
	$('#textForm').submit(function(e) {
		e.preventDefault();
		var postData = $(this).serialize();
	    url = $(this).attr('action');

	    if (($('#name').val() === '') || ($('#phone') === '') || ($('#message') === '')) {
	    	console.log("misisng data");
	    	return;
	    }

	    if (isPhoneNumberValid($('#phone').val())) {
	    	sendSMS(url, postData);
	    }
	    else {
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
	console.log("SEND");
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
};


// file: web/source/js/main.js

;