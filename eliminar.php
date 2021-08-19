<?php
session_start();
$correo=$_SESSION['correo'];
if($correo==null || $correo=''){
header('location:login.html');
die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="icon" type="image/icon" href="img/logoI.png" />
    <script src="https://kit.fontawesome.com/ca1ea61cbb.js" crossorigin="anonymous"></script>
</head>
<body>
<header id="cabeza">
<div class="center">
  <!--LOGO-->
  <div id="logo">
  <a href="index.php"><img src="img/LogoL.jpg" class="app-text" alt="Logo"></a>
				<a href="index.php"><img src="img/LogoI.png" class="app-logo" alt="Logo"></a>
			</div>
      <!--MENU-->
			<nav id="menu">
				<ul>
					<li>
          <a href="administrar.php">Administrar </a>
					</li>
					<li>
						<a href="">Producción</a>
							<ul>
								<li><a href="index.php">Agregar</a></li>
								<li><a href="eliminar.php">Eliminar</a></li>
                <div class="dropdown-content">
							</ul>
					</li>
				</ul>
				<!--USUARIO-->
			<div id="usuario">
				<img src="img/usuario.png" class="img-usuario" alt="Usuario">
				<p>Fulano Pérez</p>
				
			</div>
			</nav>
      
      <div class="clearfix"></div>
</div>
</header>
<div class="contenedor">
<h2>Eliminar</h2>
<div class="card">
    <div class="container">
        <form>
          <div class="row">
            <div class="col-25">
              <label>Número de lote</label>
            </div>
            <div class="col-75">
              <input type="text" id="codigo" pattern="[0-9]*" placeholder="Ingresar número de lote" required>
              <button type="button" onclick="get()">Buscar</button>

              <script>
             
                function get() {
                  var c = document.getElementById("codigo").value;
                  var url="http://localhost/TechCorpP/apirest/lotes?codigo="+c;
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    var jsonResponse = JSON.parse(this.responseText);
                    console.log(jsonResponse[0]["codigo"]);
                    document.getElementById("nombre").value = jsonResponse[0]["Nombre"];
                    document.getElementById("apep").value = jsonResponse[0]["ApellidoP"];
                    document.getElementById("apem").value = jsonResponse[0]["ApellidoM"];
                    document.getElementById("fecha_i").value = jsonResponse[0]["FechaInicio"];
                    document.getElementById("fecha_t").value = jsonResponse[0]["FechaTerm"];
                    document.getElementById("tipo").value = jsonResponse[0]["Tipo"];
                    document.getElementById("num_p").value = jsonResponse[0]["Numero"];
                    document.getElementById("num_d").value = jsonResponse[0]["PiezasDef"];
                    //document.getElementById("demo").innerHTML = this.responseText.JSON;
                 }
               };
               xhttp.open("GET", url, true);
               xhttp.send();
             }
             </script>
             <span id="demo"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Nombre</label>
            </div>
            <div class="col-75">
              <input type="text" id="nombre" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Apellido Paterno</label>
            </div>
            <div class="col-75">
              <input type="text" id="apep" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Apellido Materno</label>
            </div>
            <div class="col-75">
              <input type="text" id="apem" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Fecha de inicio de producción</label>
            </div>
            <div class="col-75">
              <input type="date" min="01-01-2015" max="01-01-2021" id="fecha_i" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Fecha de terminación de producción</label>
            </div>
            <div class="col-75">
              <input type="date" id="fecha_t" min="01-01-2015" max="01-01-2021" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Tipo de piezas</label>
            </div>
            <div class="col-75">
              <select id="tipo" name="country" disabled>
              <option value="hogar">Hogar</option>
                <option value="jardin">Jardin</option>
                <option value="mascotas">Mascotas</option>
                <option value="electronica">Electronica</option>
                <option value="belleza">Belleza</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Número de piezas</label>
            </div>
            <div class="col-75">
              <input type="number" id="num_p" pattern="[0-9]*" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Número de piezas defectuosas</label>
            </div>
            <div class="col-75">
              <input type="number" id="num_d" pattern="[0-9]*" disabled>
            </div>
          </div>
          <div class="row">
            <button type="button" onclick="del()">Eliminar</button>
          </div>
        </form>
      </div>
  </div>
            </div>
  <script>
    function del(){
      var c = document.getElementById("codigo").value;
      const datos = {"codigo": c};
      const texto = JSON.stringify(datos);
      //var formElement = document.getElementById("datos");
      var request = new XMLHttpRequest();
      request.open("DELETE", "http://localhost/TechCorpP/apirest/lotes");
      request.send(texto);
    }
  </script>

    
<footer id="footer">
			<div class="center">
				<p>
					&copy; Tech Corp
				</p>
			</div>
			
		</footer>

</body>
