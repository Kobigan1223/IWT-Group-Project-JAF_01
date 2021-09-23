			   		function cardchk(object){
			   			var s= object.value.toString(); 
			   			if(s.length==1)
			   			{
			   				if(s==="4")
			   				{
			   				document.getElementById('visa').style.display ="block";
			   				}
			   				else if(s==="5")
			   				{
			   				document.getElementById('master').style.display ="block";
			   				}
			   				else
			   				{
			   					document.getElementById('master').style.display ="none";
			   					document.getElementById('visa').style.display ="none";
			   				}
			   			}
			   			else if(s.length == 0)
			   				{
			   					document.getElementById('master').style.display ="none";
			   					document.getElementById('visa').style.display ="none";
			   				}
							if(s.length==4 || s.length==9 || s.length==14 )
							{
								object.value = object.value + " ";
							}
							
			   		}

							