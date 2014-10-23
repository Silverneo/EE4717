function signInValidate() {
	var myForm = document.getElementById("Sign-In");
	var myEmail = myForm["Email"];
	var myPassword = myForm["Password"];
	
	if(!checkEmail(myEmail))	return false;
	if(!checkPassword(myPassword)) return false;
	
	return true;
}

function signUpValidate() {
	var myForm = document.getElementById("Sign-Up");
	
	var myName = myForm["Name"];
	var myEmail = myForm["Email"];
	var myContact = myForm["Contact"];
	var myPassword = myForm["Password"];
	var myPassword2 = myForm["Password2"];
	
	if(!checkName(myName)) return false;
	if(!checkContact(myContact)) return false;
	if(!checkEmail(myEmail)) return false;
	if(!checkPassword(myPassword)) return false;
	if(!checkPassword(myPassword2)) return false;
	
	if(myPassword.value != myPassword2.value) {
		alert("Passwords do not match!");
		myPassword2.focus();
		myPassword2.select();
		return false;
	}
	
	return true;
}

function checkName(myName) {
	if(myName.value.length == 0) {
		alert("The name field cannot be empty!\n");
		myName.focus();
		myName.select();
		return false;
	}
	
	var regexp = /^\w{1,10}( \w{1,10})?$/;
	
	if(!regexp.test(myName.value)) {
		alert("The name you entered (" + myName.value +
				") is not a valid name.\n");
		myName.focus();
		myName.select();
		return false;
	}
	return true;
}


function checkEmail(myEmail) {
	if(myEmail.value.length == 0) {
		alert("The email filed cannot be empty!");
		myEmail.focus();
		myEmail.select();
		return false;
	}
	
	var pos = myEmail.value.search(/^[\w\.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$/);
	
	if (pos != 0) {
		alert("The Email you entered (" + myEmail.value + 
			") is not a valid E-mail address.\n");
		myEmail.focus();
		myEmail.select();
		return false;
	}
	return true;
}

function checkContact(myContact) {
	if(myContact.value.length != 8) {
		alert("The contact length should be 8!\n");
		myContact.focus();
		myContact.select();
		return false;
	}
	
	var regexp = /^\d{8}$/;
	if(!regexp.test(myContact.value)) {
		alert("The phone number you entered (" + myContact.value +
				") is not valid! It should be 8 numbers.\n");
		myContact.focus();
		myContact.select();
		return false;
	}
	return true;
}

function checkPassword(myPassword) {
	if(myPassword.value.length < 8) {
		alert("The password is at least 8 characters");
		myPassword.focus();
		myPassword.select();
		return false;
	}
	return true;
}

function init() {
	'use strict';
	
	if (document && document.getElementById) {
		var signInForm = document.getElementById("Sign-In");
		var signUpForm = document.getElementById("Sign-Up");
		if (signInForm != null)	signInForm.onsubmit = signInValidate;
		if (signUpForm != null) signUpForm.onsubmit = signUpValidate;
	}
}

window.onload = init;