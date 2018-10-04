function myfunction(field_id)
{
  var x=document.getElementById(field_id);
  var show=null;
  var edit=null;
  for(var i=0;i<x.children.length;i++)
  {
      if(x.children[i].className=="display_block")
          show=x.children[i];
       if(x.children[i].className=="input_field")
          edit=x.children[i];

  }


  if(show.style.display!="none")
  {
    edit.style.display="inline-block";
	edit.focus();
    show.style.display="none";
    var temp=document.getElementById('my_form');
    for(var i=0;i<temp.children.length;i++)
    {
      var temp2=temp.children[i];
      if(temp.children[i].id===field_id)
       {

         continue;
       }
       else
       {
          var dis;
          var edi;
         for(var j=0;j<temp2.children.length;j++)
         {

             if(temp2.children[j].className=="display_block")
                 {
                  dis=temp2.children[j];
				 

                  temp2.children[j].style.display="inline-block" ;
				  
                 }
            if(temp2.children[j].className=="input_field")
                 {
                  edi=temp2.children[j];
                  temp2.children[j].style.display="none";
                 }

         }
          
          if(edi.value!=null&&edi.value!="")
          {
            dis.innerHTML=edi.value;
          }
       }
    }
  }



}
