
<!DOCTYPE>
  <html>
    <head>
      <title>Login</title>
    
      <meta charset="UTF-8">
    
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      <link  rel = "icon"  href = "src/sign-in-alt-solid.svg"  type = "image / x-icon" >

      <script src="https://kit.fontawesome.com/b8e60f92a5.js" crossorigin="anonymous"></script>
    
    </head>
    
    <body class="w3-pale-blue" >
          
        


          <div class="w3-container w3-blue w3-round">
            <h1>Bienvenido</h1>
          </div>


            <table class="w3-table ">
              <tr>
                <div class="w3-row">
                  
                  <div >
                      <th class="w3-quarter w3-col">
                            
                          <div class="w3-card-2 w3-round-xlarge">
                            
                            <div class="w3-container w3-blue w3-round-xlarge">
                              <h4 id="saludo"></h4>
                            </div>
                            
                            <form class="w3-container w3-pale-blue" action="" method="POST">
                              <p>
                                <i class="fas fa-user"></i>
                                <label class="w3-text-blue"><b>Identificación De Usuario:</b></label>
                                <input class="w3-input w3-pale-blue" name="UsuarioLogin" type="text" placeholder="Usuario" required>
                              </p>
                              <p>
                                <i class="fas fa-lock"></i>
                                <label class="w3-text-blue"><b>Contraseña:</b></label>
                                <input class="w3-input w3-pale-blue" name="ContraLogin" type="password" placeholder="Contraseña" required>
                              </p>




                              <p>
                                <button class="w3-btn w3-blue w3-round-large" type="submit">Ingresar</button>
                              </p>
                              
                              <p>
                                  <button class="w3-btn w3-blue w3-round-large" type="button" onclick="document.getElementById('contactar').style.display='block'">Contáctenos</button>
                              </p>

                            </form>
                              
                              
                          </div>

                      </th>
                  </div>
                  
                  <div>   
                      <th class="w3-threequarter w3-col">
                        
                          <div class="w3-container w3-blue w3-round-xlarge">
                            <p>¿Quiénes somos?
                            </br>Bienvenido a nuestra página.
                            </br>Somos un grupo de estudiantes casi egresados de la escuela secundaria EEST N°6 'Albert Thomas', trabajando en conjunto con la Facultad de Ingeniería de La Universidad Nacional de La Plata, que intenta ofrecer mayor comodidad a quienes nos vienen cuidando históricamente, pero más en este último tiempo: los profesionales de la salud.
                            </p>
                            <div class="w3-bar">
                              <img class="w3-bar-item w3-third" src="src/fondo1.jpg" width="300" height="200" >
                              <img class="w3-bar-item w3-third" src="src/fondo2.jpg" width="300" height="200" >
                              <img class="w3-bar-item w3-third" src="src/fondo3.jpg" width="300" height="200" >
                            </div>
                          </div>

                      </th>
                  </div>



                </div>
              </tr>
            </table>

            <div id="contactar" class="w3-modal w3-animate-opacity">
              <div class="w3-modal-content">
                <header class="w3-container w3-blue"> 
                  <span onclick="document.getElementById('contactar').style.display='none'" 
                  class="w3-button w3-display-topright">&times;</span>
                    <h2>Contáctenos</h2>
                </header>

                      <form class="w3-container w3-pale-blue" action="">
                              <p>
                                <label class="w3-text-blue"><b>Asuno:</b></label>
                                <input class="w3-input w3-pale-blue" name="first" type="text" placeholder="Asunto" required>
                              </p>
                              <p>      
                                <label class="w3-text-blue"><b>Correo Electrónico:</b></label>
                                <input class="w3-input w3-pale-blue" name="last" type="email" placeholder="Correo Electrónico" required>
                              </p>
                              <p>
                                  <textarea class="w3-input w3-pale-blue" rows="10" cols="95" wrap="hard" placeholder="Ingrese su mensaje en detalle." required></textarea>
                              </p>
                              <p>
                                <button class="w3-btn w3-blue w3-round-large" type="submit">Enviar Mensaje</button>
                              </p>
                              
                            </form>

              </div>
            </div>

            <script>
              var modal=document.getElementById("contactar");
              window.onclick=function(event) {
              if(event.target==modal){
                modal.style.display="none";
              }}
            </script>

            <script type="text/javascript">
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
            </script>


    </body>
  </html>