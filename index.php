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
    <link rel="icon" type="image/icon" href="img/LogoI.png" />
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
                
              </div>
							</ul>
					</li>
				</ul>
				<!--USUARIO-->
			<div id="usuario">
      <img src="img/usuario.png" class="img-usuario" alt="Usuario">
			<a href="log_out.php">	<p><?php echo $correo=$_SESSION['correo'];  ?></p>  </a>
			</div>
			</nav>
      
      <div class="clearfix"></div>
</div>
</header>
<div class="contenedor">
<h2>Agregar Produccion Nueva</h2>
<div class="card">
    <div class="container">
        <form id="datos">
        <div class="row">
            <div class="col-25">
              <label>Numero del Lote</label>
            </div>
            <div class="col-75">
              <input type="text" id="numlote" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Nombre</label>
            </div>
            <div class="col-75">
              <input type="text" id="nombre" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Apellido Paterno</label>
            </div>
            <div class="col-75">
              <input type="text" id="apep" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Apellido Materno</label>
            </div>
            <div class="col-75">
              <input type="text" id="apem" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Fecha de inicio de producción</label>
            </div>
            <div class="col-75">
              <input type="date" id="fecha_i" min="01-01-2015" max="01-01-2021" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Fecha de terminación de producción</label>
            </div>
            <div class="col-75">
              <input type="date" id="fecha_t" min="01-01-2015" max="01-01-2021" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Tipo de piezas</label>
            </div>
            <div class="col-75">
              <select id="tipo" name="country">
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
              <label >Número de piezas</label>
            </div>
            <div class="col-75">
              <input type="number" id="num_piezas" pattern="[0-9]*" placeholder="Número de piezas" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Número de piezas defectuosas</label>
            </div>
            <div class="col-75">
              <input type="number" id="num_d" pattern="[0-9]*" placeholder="Número de piezas defectuosas" required>
            </div>
          </div>
          <div class="row">
            <input type="submit" onclick="post()" value="Guardar">
          </div>
        </form>
      </div>
  </div>

</div>
  


<script>
  function post(){
    var lote = document.getElementById("numlote").value;
    var nom = document.getElementById("nombre").value;
    var ap = document.getElementById("apep").value;
    var am = document.getElementById("apem").value;
    var fi = document.getElementById("fecha_i").value;
    var ft = document.getElementById("fecha_t").value;
    var t = document.getElementById("tipo").value;
    var np = document.getElementById("num_piezas").value;
    var nd = document.getElementById("num_d").value;
    const datos = {"NumLote": lote,"Nombre": nom,"ApellidoP": ap,"ApellidoM": am,"FechaInicio": fi,"FechaTerm": ft,"Tipo": t,"Numero": np,"PiezasDef": nd};
    const texto = JSON.stringify(datos);
    //var formElement = document.getElementById("datos");
    var request = new XMLHttpRequest();
    request.open("POST", "http://localhost/TechCorpP/apirest/lotes");
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
</html>
