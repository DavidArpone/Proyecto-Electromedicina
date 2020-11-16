<!DOCTYPE>
	<html>
		<head>      	

			
      		<title>Home</title>
      		
      		<meta charset="UTF-8">
      		
      		<meta name="viewport" content="width=device-width, initial-scale=1">

      		<link rel="stylesheet" href="buttons.css">

      		<!-- W3 -->
      		
      		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
			
      		<link  rel = "icon"  href = "src/home-solid.svg"  type = "image / x-icon" >


      		<script src="https://kit.fontawesome.com/b8e60f92a5.js" crossorigin="anonymous"></script>

      		<!-- Libreria CHART -->

      		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

      		<script src="http://code.jquery.com/jquery-latest.js"></script>

      		
				<!-- RECARGAR VALORES -->

			      		<script type="text/javascript">
			      			
			      			var data={data: "<?php echo $user->getId();?>"};

			      			function tiempoReal(){

			      				var info=$.ajax({
			      					type: 'post',
			      					url:'vistas/busquedafavoritos.php',
			      					dataType:'json',
			      					data: data,
			      					async:false
			      				}).responseText;

			      				document.getElementById("favs").innerHTML=info;
			      				
			      			}
			      			setInterval(tiempoReal,1000);


			      		</script>      		
    
    	</head>

		<body class="w3-pale-blue ">
				<div class="w3-bar w3-blue">
					
					<h3 class="w3-bar-item w3-left">Profesional: 
					<?php 
						echo $user->getApell();	
						echo ", ";
						echo $user->getUser();
					?>
					</h3>

		            <h3 id="saludo" class="w3-bar-item w3-right"></h3>

		        </div>
					
					<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
					<!-- //////////////////////////////////////////////Botones de Navegacion/////////////////////////////////////////////////// -->
					<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
			        <div class="w3-bar w3-pale-blue w3-card">			        	
			        	
			        	<button class="w3-bar-item w3-button tablink" onclick="cambiarPestana(event, 'Inicio')">Inicio
					  	<i class="fas fa-home"></i></button>

					  	<button class="w3-bar-item w3-button tablink" onclick="cambiarPestana(event, 'Favoritos')">Favoritos
					  	<i class="fas fa-star"></i></button>
					  	
					  	<button class="w3-bar-item w3-button tablink" onclick="cambiarPestana(event, 'Notas')">Notas
					  	<i class="fas fa-notes-medical"></i></button>
					  	
					  	<button class="w3-bar-item w3-button tablink" onclick="inf()">Información
					  	<i class="fas fa-info-circle"></i></button>
					  	
					  	<a href="driver/cerrar.php"><button class="w3-bar-item w3-button tablink w3-right">Cerrar
					  	<i class="fas fa-sign-out-alt"></i></button></a>
					  		
					  	<button class="w3-bar-item w3-button tablink w3-right" type="submit" onclick="search()">Buscar 
					  	<i class="fa fa-search"></i></button>
					  	<input name="Busqueda" id="busqueda" type="text" class="w3-bar-item w3-input w3-right" placeholder="Search...">
					  						  	
			        </div>

					
					<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
					<!-- ///////////////////////////////////////////Visualizacion de las pestañas////////////////////////////////////////////// -->
					<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
					
					<div>					
						<div id="Inicio" class="w3-container sec " style="display:none;">
					    	<h4>Bienvenido:</h4>					    	
						</div>

						<div id="Favoritos" class="w3-container sec " style="display:block;">
					    	<section id="favs">					    		
					    	</section>
					    	<section id="asdasd">
					    		
					    	</section>
						</div>

					  	

					  	<div id="Notas" class="w3-container sec " style="display:none">
					    	<h4>Notas:</h4>
					  	</div>
					  	
					</div>


					<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
					<!-- //////////////////////////////////////////////Ventanas Emergentes///////////////////////////////////////////////////// -->
					<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
					
					<!-- VENTANA INFO -->
					<div id="info" class="w3-modal w3-animate-opacity">
					  <div class="w3-modal-content">
					    <header class="w3-container w3-blue"> 
					      <span onclick="document.getElementById('info').style.display='none'" 
					      class="w3-button w3-display-topright">&times;</span>
					        <h2>Información</h2>
					    </header>

						<div class="w3-container w3-pale-blue ">
							<p>A la izquierda verá un panel de navegación con el cual podrá acceder a los sitios de nuestra página.</p>
					    	<p>-Vivo: Dentro de esta pestaña usted podrá visualizar los signos vitales de frecuencia cardíaca, temperatura corporal y presión sanguínea.</p>
					    	<p>-Notas: Dentro de esta pestaña usted podrá dejar registrado cualquier tipo de información indispensble a la que podrá acceder en otro momento y desde cuaquier dispositivo.</p>
					    	<p>-Ecg: Dentro de esta pestaña usted podrá visualizar un electrocardiograma del paciente de las últimas 24 Hs.</p>
					    	<p>-Historial: Dentro de esta pestaña usted podrá visualizar un registro de los valores tomados al paciente en un rango de las últimas 24 Hs.</p>
						</div>

					  </div>
					</div>

					<!-- VENTANA BUSQUEDA -->
					<div id="resultado" class="w3-modal w3-animate-opacity">
					  <div class="w3-modal-content">					    
					    <header class="w3-container w3-blue"> 
					      <span onclick="document.getElementById('resultado').style.display='none'" 
					      class="w3-button w3-display-topright">&times;</span>
					        <h2>Resultados</h2>
					    </header>
						<div class="w3-container w3-pale-blue ">
							<section id="h">							 		 	
							</section>							 							
						</div>
					  </div>
					</div>


					<!-- Expandir Favorito -->

					<div id="expandirFav" class="w3-modal w3-animate-opacity">
						
						<div id="expansion" class="w3-modal-content">
							
						</div>

					</div>



					<!-- /////// -->
					<!-- Alertas -->
					<!-- /////// -->

					<!-- Exito -->
					<div id="success" class="w3-modal w3-animate-opacity">
						<div class="w3-modal-content">
							<header class="w3-container w3-green"> 
								<span onclick="document.getElementById('success').style.display='none'" 
						    	class="w3-button w3-display-topright">&times;</span>
						    	<h2>Atención!</h2>
							</header>
							<div class="w3-container w3-pale-green">
								<section id="cartel">
							
								</section>
							</div>
					</div>

					<!-- Error -->
					<div id="fail" class="w3-modal w3-animate-opacity">
						<div class="w3-modal-content">					    
						    <header class="w3-container w3-red"> 
						    	<span onclick="document.getElementById('fail').style.display='none'" 
						    	class="w3-button w3-display-topright">&times;</span>
						    	<h2>Error!</h2>
							</header>
							<div class="w3-container w3-pale-red">
								<p>Lo sentimos, ha ocurrido un error inesperado.</p>
								<p>Reintente luego.</p>							 							
							</div>
						</div>
					</div>


					<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
					<!-- //////////////////////////////////////////////JavaScript////////////////////////////////////////////////////////////// -->
					<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

					<script type="text/javascript">
					
					//<!-- SALUDO JS-->
					
		            function Saludo(){

		            	var hoy=new Date();
			            var hora=hoy.getHours();
			        	var saludo = "";
			            
			            if(hora>=4&&hora<12){
			            saludo="Buenos Días";
			            }else if(hora>=12&&hora<19){
			            saludo="Buenas Tardes";
			            }else if(hora>=19||hora<4){
			            saludo="Buenas Noches";}
			            document.getElementById('saludo').innerHTML=saludo;
		            } 
		            setInterval(Saludo,1000);



					//<!-- CAMBIO DE PESTAÑA -->

					function cambiarPestana(evt, place) {
					  var i, x, tablinks;
					  x = document.getElementsByClassName("sec");
					  for (i = 0; i < x.length; i++) {
					    x[i].style.display = "none";
					  }
					  tablinks = document.getElementsByClassName("tablink");
					  for (i = 0; i < x.length; i++) {
					    tablinks[i].className = tablinks[i].className.replace(" w3-blue", ""); 
					  }
					  document.getElementById(place).style.display = "block";
					  evt.currentTarget.className += " w3-blue";
					}

					
					//<!-- BOTÓN INFO -->

					function inf(){
					  document.getElementById('info').style.display='block'
					  var modal=document.getElementById("info");
					  window.onclick=function(event) {
					  if(event.target==modal){
					    modal.style.display="none";
					  }}
					}


		      		//<!-- BOTÓN SEARCH -->

		      		function search(){

		      			var modal=document.getElementById("resultado");
		      			window.onclick=function(event) {
		      				if(event.target==modal){
		      					modal.style.display="none";
		      				}}

		      				var entradaBusqueda=$('#busqueda').val();
		      				var id= "<?php echo $user->getId(); ?>";

		      				var busq = {hola: entradaBusqueda, chau: id};

		      				var info=$.ajax({
		      					type: 'POST',
		      					url: 'vistas/busqueda.php',
		      					dataType:'json',
		      					data: busq,
		      					async:false
		      				}).responseText;

		      					document.getElementById("h").innerHTML= info;
		      					document.getElementById('resultado').style.display='block';
		      			}

		      		//<!-- Boton de agregar favoritos -->

					function add(id){

						document.getElementById('resultado').style.display='none'


						var ass= "<?php echo $user->getId(); ?>";
						var busq = {hola: id, chau: ass};

						var info=$.ajax({
								type: 'POST',
								url: 'driver/addFavs.php',
								data: busq,
								async:false,
								error: function(){
									document.getElementById('fail').style.display='block';
								}																
							}).responseText;

							document.getElementById('cartel').innerHTML=info;
							document.getElementById('success').style.display='block';
							closeSuccess();							
							
						}

					function closeSuccess(){//Cerrar ventana de favoritos
						var modal=document.getElementById("success");
					  		window.onclick=function(event) {
					  		if(event.target==modal){
					    	modal.style.display="none";
					  		}
						}
					}

					function expandirFav(idpaciente){

						var pasar={id: idpaciente};

						var control=1;
						
						var info=$.ajax({
							type: 'POST',
							url: 'vistas/expandirFav.php',
							data: pasar,
							async: false,
						}).responseText;

						document.getElementById('expansion').innerHTML=info;
						document.getElementById('expandirFav').style.display='block';
						closeExpandirFav();

						document.getElementById('temperatura').onclick = function() {
						      console.log("temperatura");
						      var control=1;
						      
						      pintarGrafico(idpaciente, control);
						    };
						document.getElementById('presion').onclick = function() {
						      console.log("presion");
						      var control=2;
						      
						      pintarGrafico(idpaciente, control);
						    };
						document.getElementById('cardio').onclick = function() {
						      console.log("cardio");
						      var control=3
						      
						      pintarGrafico(idpaciente, control);
						    };						

						pintarGrafico(idpaciente, control);			

					}

					function closeExpandirFav(){//Cerrar ventana de favoritos expandida
						var modal=document.getElementById("expandirFav");
					  		window.onclick=function(event) {
					  		if(event.target==modal){
					    	modal.style.display="none";
					  		}					  		
						}						
					}

					function pintarGrafico(idpaciente, control){						
						
						console.log(control);

						var pasar={id: idpaciente, seleccion: control};

						var label="";

						if (control==1) {
							label="Temperatura en °C"
						}
						if (control==2) {
							label="Presión en mm/Hg"
						}
						if (control==3) {
							label="Ritmo carídaco en ppm";
						}

						
						var info=$.ajax({
							type: 'POST',
							url: 'vistas/pintarGrafico.php',
							data: pasar,
							dataType: 'json',
							async: false,
							success: function(data){

								//reverse(data[0]);

								var ctx=document.getElementById('label').getContext('2d');

																var myChart = new Chart(ctx,{
																	type:'bar',
																	data:{
																		labels: data[1].reverse(),
																		datasets:[
																			{
																				label: label,
																				backgroundColor:'rgb(0,220,0)',
																				data: data[0].reverse()
																			}
																		]
																	},
																	options:{
																		scales:{
																			yAxes:[{
																				ticks:{
																					beginAtZero:true
																				}
																			}]
																		}
																	}

																});

							},
							error: function(data){
								
								console.log("mal");

							}
						});
					}

					
					
					</script>
					
	
					
		</body>
	</html>

	<!--	-->