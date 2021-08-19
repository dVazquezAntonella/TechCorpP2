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
<div class="card2">
    <div class="container">
    <table border="2">
            <thead>
               <th>NumLote</th>
               <th>Nombre</th>
               <th>Apellido Paterno</th>
               <th>Apellido Materno</th>
               <th>Fecha Inicio</th>
               <th>Fecha Terminacion</th>
               <th>Tipo</th>
               <th>Numero de Piezas</th>
               <th>Defectuosas</th>
               
            </thead>
    <?php 
                include 'conexiondatabase.php';
                $sel=$conexion -> query("select * from productos");
                while ($fila=$sel->fetch_assoc())
                {
                 ?>
        <tbody>
                  <tr class="tabla">
                      <td><?php echo $fila['NumLote']?></td>
                      <td><?php echo $fila['Nombre']?></td>
                      <td><?php echo $fila['ApellidoP']?></td>
                      <td><?php echo $fila['ApellidoM']?></td>
                      <td><?php echo $fila['FechaInicio']?></td>
                      <td><?php echo $fila['FechaTerm']?></td>
                      <td><?php echo $fila['Tipo']?></td>
                      <td><?php echo $fila['Numero']?></td>
                      <td><?php echo $fila['PiezasDef']?></td>
                  </tr>    
                 </tbody>     

                 <?php
                } ?>
 </table>



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
