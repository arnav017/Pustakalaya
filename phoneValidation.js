
function validatePhone(){

		var mob=document.getElementById("mob").value;

		if(mob.length==0){
			return true;
		}
    if(mob.length==10){

    for(var i=0;i<mob.length;i++){
  		var temp= mob.charCodeAt(i);
  		if(temp>=48 && temp<=57)
  			continue;
  		else{
  			alert("Please enter a valid phone number");
  			return false;
  		}
  	}
  }
  else {
    alert("Please enter a valid phone number");
    return false;
  }
}
