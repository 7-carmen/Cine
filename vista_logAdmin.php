<?php
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<div id="cabecera">
    <img id="logo" src="logo.png" onclick="window.location.href='index.php?do=mostrar_datos'">
    <h1><i>El cine en casa</i></h1> <!--COLOCAR EL LOGO EN LA CABECERA-->
    <img id="lupa" src="https://www.trzcacak.rs/myfile/full/444-4444324_free-png-search-icon-dibujos-de-una-lupa.png">
    <div id="buscar">
        <input type="text" name ="buscar" value="">
        <input type="submit" name="buscar" value="Buscar">
    </div>
    <div id="botones">
        <input type="submit" name="adnuistrar" value="Administrar cuentas"> &nbsp;&nbsp;&nbsp;&nbsp; <!--Falta poner la referencia-->
        <input type="submit" name="cerrar" value="Cerrar sesión"> <!--Falta poner la referencia-->
    </div>
</div>
<div id="cuerpo">
    <h2><i>Peliculas:</i></h2>
    <?php
    $c_peliculas = new ControladorPeliculas();
    $peliculas=$c_peliculas->mostrar_peliculas();
    foreach($peliculas as $pelis){
        echo "<div id = 'pelis'> <img src='$pelis->cartel'> <span class='titulo'>$pelis->nombre</span> <br/><span>$pelis->anyo_presentacion</span> <br/> <a href='index.php?do=modificar_pelicula&id=" . $pelis->id . "'>Editar</a> </div>";
    }
    ?>

</div>