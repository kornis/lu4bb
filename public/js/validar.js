		var mp = 
		{
			respuestas: document.querySelectorAll('.rcheck'),
			content: document.querySelectorAll('.content'),
			val:"",
			clicked:""
		}
		

		var gp =
		{
			inicio: function()
			{
				/*for(var i = 0; i < mp.respuestas.length; i++)
				{
		 			mp.respuestas[i].addEventListener("click", gp.chequear);
		 			
				}*/
				for(var a = 0; a < mp.content.length; a++)
				{
					mp.content[a].addEventListener("click", gp.chequear2);
				}

			},


			chequear2: function(clicked)
			{
				mp.clicked = clicked.target;
				var id = clicked.target.id;

				var hiddenClicked = document.getElementById("respuesta["+id+"]");
				
				clicked.target.classList.toggle("alert-secondary");
				clicked.target.classList.toggle("alert-warning");
				if(hiddenClicked.checked == true)
				{
					hiddenClicked.checked = false;
				}
				else
				{
					hiddenClicked.checked = true;
				}
			},

			validar: function()
			{
				/*var url = '{{ url("/consultar", ":id") }}';
					url = url.replace('%3Aid', mp.val);*/
					var url = document.getElementById('form')
					var token = document.getElementsByName('_token');

					
				var xmlhttp = new XMLHttpRequest();


				xmlhttp.onreadystatechange = function()
				{
					
					if (this.readyState == 4 && this.status == 200) 
					{					

						var myObj = JSON.parse(this.responseText);
							
							switch(myObj['datos'].respuesta)
							{
							case "verdadero":
							document.getElementById(myObj['datos'].id_pregunta).style.color = 'white';
							document.getElementById(myObj['datos'].id_pregunta).style.backgroundColor = 'green';							
							document.getElementById("validate").disabled = true;
							document.querySelector('.nextt').disabled = false;
							break;

							case "falso":

							for(var i = 0; i<Object.keys(myObj).length-1; i++)
							{
								
								if(myObj[i].valor == "falso")
							{
								document.getElementById(myObj[i].id).style.color = 'white';
								document.getElementById(myObj[i].id).style.backgroundColor = 'red';
							}
							if(myObj[i].valor == "verdadero")
							{
								document.getElementById(myObj[i].id).style.color = 'white';
								document.getElementById(myObj[i].id).style.backgroundColor = 'green';
							}
							}
							var incorrectas = myObj['datos'].incorrectas;
							document.querySelector('.nextt').disabled = false;
							document.getElementById("validate").disabled = true;
							document.getElementById("resp").innerHTML = incorrectas;

							break;

							default:
							alert(myObj['datos'].respuesta);
							break;

						}
						/*
						if (myObj['datos'].respuesta == "verdadero")
						{
							mp.clicked.style.color="white";
							mp.clicked.style.backgroundColor = 'green';
							document.getElementById("validate").disabled = true;
							document.querySelector('.nextt').disabled = false;
						}
						else if(xmlhttp.response == 'no seleccionó pregunta')
						{
							alert("No seleccionó ninguna respuesta...!");
						}
						else
						{
							
							for(var i = 0; i<myObj.length; i++)
							{
								if(myObj[i].valor == "falso")
							{
								document.getElementById(myObj[i].id).style.color = 'white';
								document.getElementById(myObj[i].id).style.backgroundColor = 'red';
							}
							if(myObj[i].valor == "verdadero")
							{
								document.getElementById(myObj[i].id).style.color = 'white';
								document.getElementById(myObj[i].id).style.backgroundColor = 'green';
							}
							}
							var incorrectas = myObj['datos'].incorrectas;
							document.querySelector('.nextt').disabled = false;
							document.getElementById("validate").disabled = true;
							document.getElementById("resp").innerHTML = incorrectas;
						}*/
						
					}
					
				}
				
				xmlhttp.open("post",url.action);
				xmlhttp.setRequestHeader('x-csrf-token', token[0].value);
				xmlhttp.send(new FormData(url));
			}


		}
			
		gp.inicio();