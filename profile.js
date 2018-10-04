function changeText(temp,btn)
{
  var x=document.getElementById(temp);
  var b=document.getElementById(btn);
  var f=document.forms['form1'];
  var y=x.innerHTML;


  if(y=="Edit"){
   x.innerHTML="Change";
   b.style.display="inline-block";
   for(var i=0;i<2;i++)
   {
       f.elements[i].readOnly=true;
   }



   }
  else if(y=="Change"){
    x.innerHTML="Edit";
     b.style.display="none";
     for(var i=0;i<2;i++)
   {
       f.elements[i].readOnly=false;
   }


 }




}
