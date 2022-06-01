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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>TM Capacitación - Sobre Nosostros</title>

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


/* ==================================== */
/*      aqui empieza  los testimonio 2   */
/* ==================================== */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;700&display=swap');



/*Styling the content*/

.testimonial-container {
    background-color: #f7f7f7;
    color: #002A54;
    border-radius: 20px;
    margin: 20px auto;
    padding: 100px 120px;
    max-width: 900px;
    position: relative;
    box-shadow: 8px 8px 27px 0px rgba(0,0,0,0.49);
    overflow: hidden;
    font-weight: 500;
}

.fa-quote {
    color: #3498db;
	opacity: 0.3;
    
    font-size: 80px;
    position: absolute;
}

.fa-quote-right {
    right: 2px;
    bottom: 100px;
}

.fa-quote-left {
    left: 4px;
    bottom: 240px;
}

.testimonial {
    line-height: 28px;
    text-align: justify;
}

.user {
    display: flex;
    align-items: center;
    justify-content: center;
}

.user .user-image {
    border-radius: 50%;
    height: 75px;
    width: 75px;
    object-fit: cover;
}

.user .user-details {
    margin-left: 10px;
}

.user .username {
    margin: 0;
}

.user .role {
    font-weight: normal;
    margin: 8px 0;
}

.user .company {
    text-transform: uppercase;
    font-size: 11px;
    letter-spacing: 1px;
    color: #0F599E;
    margin: 7px 0;
}

/*Styling the progress bar*/

.progress-bar {
    background-color: #3498db;
    height: 4px;
    width: 100%;
    animation: grow 10s linear infinite;
    transform-origin: left;
}

@keyframes grow {
    0% {
        transform: scaleX(0);
    }
}

/*Responsive*/

@media(max-width: 768px) {
    .testimonial-container {
        padding: 20px 30px;
    }

    .fa-quote {
        display: none;
    }
}

/* ==================================== */
/*      aqui empieza  el contador    */
/* ==================================== */

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.columnnn {
  float: left;
  width: 25%;
  padding: 0 5px;
}

.rown {margin: 0 -5px;}

/* Clear floats after the columns */
.rown:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .columnnn {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.cardd {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #3498db;
  border-radius: 20px;
  color: white;
  transition: transform .2s;
}

.cardd:hover {
  -ms-transform: scale(1.1); /* IE 9 */
  -webkit-transform: scale(1.1); /* Safari 3-8 */
  transform: scale(1.1); 
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
				<li class='active'>Sobre Nosostros</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<br>

    <div class="container">
    <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">Bienvenidos a TM Capacitación</h3>
				
			</div>

			

    </div>

	<div class="body-content outer-top-bd">
	<div class="container">
		<div class="my-wishlist-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="2">¿QUIENES SOMOS?</th>

					
				</tr>
				
			</thead>

      
			
		</table>

    <div class="container">  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/foto2relator.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="img/foto3relator.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="img/foto1relator.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
	</div>
	<h4>Somos una empresa, que nace por la necesidad de enseñar, capacitar y/o retroalimentar los 
		diversos temas de la actualidad. Nuestro objetivo es crecer con ustedes y ser parte de vuestra actividad curricular.</h4>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	
		

		<div class="col-container">
  <div class="col">
    <i class='fa fa-graduation-cap' style='font-size:50px'></i>
	<h3>Por qué Elegirnos</h3>
    <p>Queremos brindar la mejor calidad operativa, reduciendo márgenes de errores y enfocarnos mucho 
		en las encuestas y hacer una buena retroalimentación de estas.</p>

	<p>Nuestra diferenciación será la
	calidad educativa, no haremos excepción de personas y promulgaremos dicha ley de nuestra empresa.</p>
  </div>

  <div class="col">
  <i class='fa fa-building' style='font-size:50px'></i>        
	<h3>Nuestra Mision</h3>
    <p>Orientar al constante perfeccionamiento y desarrollo de las competencias laborales, formar y capacitar 
		en las distintas áreas que los individuos carecen y de esa forma poder ampliar su mundo laboral el cual les 
		permitirá mejorar su calidad de vida.</p>
 
  </div>

  <div class="col">
    <i class='fa fa-eye' style='font-size:50px'></i> 
	<h3>Nuestra Vision</h3>
    <p>Buscamos perfeccionarnos cada día mas en nuestra calidad y operatividad, el compromiso con la satisfacción 
		total de nuestros clientes y poder elevar su nivel de conocimiento y productividad de ellos. </p>
    
  </div>
</div>

<br>

<div class="container">
    <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">Testimonios de nuestros estudiantes</h3>
				
			</div>

<br>
 <div class="testimonial-container">
       <div class="progress-bar"></div>
       <div class="fas fa-quote-right fa-quote"></div>
       <div class="fas fa-quote-left fa-quote"></div>
       <h3 class="testimonial">
           Estoy fascinado con el curso, la mejor descición que he tomado
        </h3>
		<br>
       <div class="user">
           <img src="img/profe6.png" alt="user" class="user-image">
           <div class="user-details">
               <h4 class="username">Carlos Cartes</h4>
               <p class="role">Experto Java Script</p>
               <h5 class="company">Duoc UC</h5>
           </div>
       </div>
   </div>


   <br>
   <br>
   <div class="container">
    <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">Nuestras Estadisticas</h3>
				
			</div>
<br>
   <div class="rown">
  <div class="columnnn">
    <div class="cardd">
      <p><i class="fa fa-user" style='font-size:50px'></i></p>
      <h3>614+</h3>
      <p style='font-size:15px'>Estudiantes</p>
    </div>
  </div>

  <div class="columnnn">
    <div class="cardd">
      <p><i class="fas fa-book" style='font-size:50px'></i></p>
      <h3>158+</h3>
      <p style='font-size:15px'>Cursos subidos</p>
    </div>
  </div>
  
  <div class="columnnn">
    <div class="cardd">
      <p><i class="fa fa-user-graduate" style='font-size:50px'></i></p>
      <h3>598+</h3>
      <p style='font-size:15px'>Estudiantes certificados</p>
    </div>
  </div>
  
  <div class="columnnn">
    <div class="cardd">
      <p><i class="fa fa-chalkboard-teacher" style='font-size:50px'></i></p>
      <h3>16+</h3>
      <p style='font-size:15px'>Total profesores</p>
    </div>
  </div>
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
	<script src="https://kit.fontawesome.com/c06567aaeb.js" crossorigin="anonymous"></script>

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
const testimonialsContainer = document.querySelector('.testimonials-container')
const testimonial = document.querySelector('.testimonial')
const userImage = document.querySelector('.user-image')
const username = document.querySelector('.username')
const role = document.querySelector('.role')
const enterprise = document.querySelector('.company');

const testimonials = [{
        name: 'Francisco Ramirez',
        position: 'Estudiante',
        business: 'TM CAPACITACION',
        photo: 'img/profe9.png',
        text: "Muy buenos cursos y profesores",
    },
    {
        name: 'Luis Avila',
        position: 'Software Engineer',
        business: 'TM Capacitacion',
        photo: 'img/profe7.png',
        text: 'Excelentes profesores, un grato ambiente',
    },
 
   
]

let idx = 1;

function updateTestimonial() {
    const {
        name,
        position,
        business,
        photo,
        text,
    } = testimonials[idx];

    testimonial.innerHTML = text;
    userImage.src = photo;
    username.innerHTML = name;
    role.innerHTML = position;
    enterprise.innerHTML = business;

    idx++;

    if (idx > testimonials.length - 1) {
        idx = 0;
    }
}

setInterval(updateTestimonial, 11000);

</script>



  
</body>
</html>