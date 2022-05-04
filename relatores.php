<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:index.php');
		}else{
			$message="El ID del producto no es válido";
		}
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    	<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>TM Capacitación - Conctacto</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link rel="stylesheet" href="assets/css/owl.theme.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png">

        <style>





/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  
}

.col-container {
  display: table;
  width: 100%;
}
.col {
  display: table-cell;
  padding: 16px;
}

/* Three image containers (use 25% for four, and 50% for two, etc) */
.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.columnn {
  float: left;
  width: 33.3%;
  margin-bottom: 26px;
  padding: 0  12px;
}

@media screen and (max-width: 650px) {
  .columnn {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.containerr {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.titlee {
  color: grey;
}

.buttonn {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #3498db;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.buttonn:hover {
  background-color: #3F80C1;
}



</style>
</head>
 <body class="cnt-home" onload="myFunction()" style="margin:0;">
	
	<div id="loader"></div>

   <div style="display:none;" id="myDiv" class="animate-bottom"> 
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Inicio</a></li>
				<li class='active'>Relatores</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<br>

<div class="container">
    <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">Relatores</h3>
				
			</div>

			

    </div>


    <div class="row">
  <div class="columnn">
    <div class="card">
      <img src="img/profe1.png" alt="Jane" style="width:100%">
      <div class="containerr">
        <h2>Alejandra Carrasco</h2>
        <p class="title">Profesora</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        
        <a href="javascript:ventanaSecundaria('pdfRelatores/Curriculum-Alejandra-Carrasco.pdf')"><p><button class="buttonn">Ver Perfil</button></p> </a>
        <br>
      </div>
    </div>
  </div>

  <div class="columnn">
    <div class="card">
      <img src="img/profe2.png" alt="Mike" style="width:100%">
      <div class="containerr">
        <h2>Claudio Andrés Millan</h2>
        <p class="titlee">Prevencionista</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>

  <div class="columnn">
    <div class="card">
      <img src="img/profe3.png" alt="John" style="width:100%">
      <div class="containerr">
        <h2>Ana María Daronch</h2>
        <p class="title">Kinesiologa</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="columnn">
    <div class="card">
      <img src="img/profe4.png" alt="Jane" style="width:100%">
      <div class="containerr">
        <h2>Catherine Inostroza</h2>
        <p class="title">Enfermera</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>

  <div class="columnn">
    <div class="card">
      <img src="img/profe5.png" alt="Mike" style="width:100%">
      <div class="containerr">
        <h2>Ethelyn Pinto</h2>
        <p class="title">Psicóloga</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>

   
  <div class="columnn">
    <div class="card">
      <img src="img/profe6.png" alt="John" style="width:100%">
      <div class="containerr">
        <h2>Francisco Briones</h2>
        <p class="title">Psicólogo</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>
</div>
 


<div class="row">
  <div class="columnn">
    <div class="card">
      <img src="img/profe7.png" alt="Jane" style="width:100%">
      <div class="containerr">
        <h2>Gabriel Godoy</h2>
        <p class="title">Publicista</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>


  <div class="columnn">
    <div class="card">
      <img src="img/profe8.png" alt="Mike" style="width:100%">
      <div class="containerr">
        <h2>J. Alfredo Rubilar</h2>
        <p class="title">Enfermero</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>


  <div class="columnn">
    <div class="card">
      <img src="img/profe9.png" alt="John" style="width:100%">
      <div class="containerr">
        <h2>Jair Alberto Pérez</h2>
        <p class="title">Biotecnólogo Industrial</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>
</div>

   
<div class="row">
  <div class="columnn">
    <div class="card">
      <img src="img/profe10.png" alt="Jane" style="width:100%">
      <div class="containerr">
        <h2>Priscila Sáez</h2>
        <p class="title">Trabajadora Social</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>


  <div class="columnn">
    <div class="card">
      <img src="img/profe11.png" alt="Mike" style="width:100%">
      <div class="containerr">
        <h2>Verónica Villa</h2>
        <p class="title">Enfermera</p>
        <p>
        <i class="fa fa-phone" style='font-size:18px'></i>  
        +56952013781</p>
        <p>
        <i class="fa fa-envelope" style='font-size:18px'></i>  
        contacto@tmcapacitacion.cl​</p>
        <p><button class="buttonn">Ver Perfil</button></p>
        <br>
      </div>
    </div>
  </div>
  




<br/>

<br>
<div class="container">

</div>

<br>
<br>
<?php include('includes/footer.php');?>
	
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>

<script>
 var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 700);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

<script> 
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana1","width=620,height=600,scrollbars=NO") 
} 
</script>

  
</body>
</html>