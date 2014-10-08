// sign-in validation javascript


function validateForm() {
	'use strict';
	
	var email = document.getElementById("Email");
	var password = document.getElementById("Password");
	
	if ( (email.value.length > 0) && (password.value.length > 0) ) {
		return true;	
	} else {
		alert('Please input all the fields required!');
		return false;
	}
}

function init() {
	'use strict';
	
	if (document && document.getElementById) {
		var signinForm = document.getElementById("signInForm");
		signinForm.onsubmit = validateForm;
	}
}

window.onload = init;