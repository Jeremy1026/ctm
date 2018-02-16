$(document).ready(function() {
	$('#textForm').submit(function(e) {
		console.log("SUMITTED FORM");
		e.preventDefault();
	});
});