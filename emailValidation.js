
function validateForm(){
	// var sub=true;
	// sub&=validateEmail();
	// sub&=validatePass();
	// return sub;
	if(validatePass()&&validateEmail())
	  return true;
		else {
			return false;
		}
}
function validateEmail(){

		var e=document.getElementById("email1").value;

		if(e.lastIndexOf('@')!=e.indexOf('@') || e.indexOf('@')<3){
			alert("Invalid Email Address");
			return false;
		}
		if(e.length-e.lastIndexOf('.')<3){
			alert("Invalid Email Address");
			return false;
		}

		var subStr=e.substring(e.indexOf('@')+1,e.length);

		if(subStr.indexOf('.')!=subStr.lastIndexOf('.')){
			alert("Invalid Email Address");
			return false;
		}
		if(subStr.indexOf('.')<1){
			alert("Invalid Email Address");
			return false;
		}

		if(e.indexOf('.')<1){
			alert("Invalid Email Address");
			return false;
		}
		return true;
}

function validatePass(){
	if (document.getElementById('pass1').value != document.getElementById('rpass1').value){
		alert("Password and Confirm Password fields must match!");
		return false;
	}
	var pswrd=document.getElementById("pass1").value;

	for(var i=0;i<pswrd.length;i++){
		var temp= pswrd.charCodeAt(i);
		if((temp>=97 && temp<=122) || (temp>=65 && temp<=90) || (temp>=48 && temp<=57) || temp==95 || temp==64)
			continue;
		else{
			alert("Only characters A-Z, a-z, 0-9, _ and @ are allowed in password");
			return false;
		}
	}
	if(pswrd.length<6){
		alert("Password must not be less than 6 characters");
		return false;
	}

	return true;
}
