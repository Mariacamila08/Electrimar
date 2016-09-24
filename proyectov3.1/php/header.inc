

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Distribuidora Electimar</title>
    <link rel="icon" type="image/png" href="img/icono.png" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <script type="text/javascript" src="js/jquery.js"></script>  
    <script type="text/javascript" src="js/funciones.js"></script>  
    
</head>

    <body>
 

<div class="container">
    <img class="logo" src="img/logo.png" alt="Distribuidora Electimar"/>
    <?php if (isset($_SESSION['email'])) { ?>

<!-- <h4><a ><?php echo $_SESSION['email'];  ?></a>    <a href="php/logout.php">Logout</a>    </h4>  -->
               
        <?php if ($_SESSION['rol']=='admin') {?>
            <nav>
                <ul class="navegador"> 
                    <li><a href="formulariocrearcuenta.php">Usuarios</a></li>   
                    <li><a href="formulariocategoria.php">Bodegas/Categorias</a></li>
                    <li><a href="formularioproductos.php">Productos</a></li>
                    <li><a href="php/logout.php"><span class="glyphicon glyphicon-off"></span></a>
            

            <?php }else { ?>

               <nav>
                    <ul class="navegador"> 
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="php/logout.php"><span class="glyphicon glyphicon-off""></span></a>
                

    <?php }  }else { ?>

    

        <nav>
            <ul class="navegador"> 
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#acerca-de" class="scroll">Acerca de</a></li>
                <li><a href="#servicios" class="scroll">Servicios</a></li>
                <li><a href="#contacto" class="scroll">Contacto</a></li>
                <li><a href="formulariologin.php"><span class="glyphicon glyphicon-user"></span></a>
             
                <?php }?>

                </li>
            </ul>
        </nav>


</div>		



	
