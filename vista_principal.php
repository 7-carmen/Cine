<?php
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<div id="cabecera">
    <img id="logo" src="logo.png" onclick="window.location.href='vista_principal.php'">
    <h1><i>El cine en casa</i></h1> <!--COLOCAR EL LOGO EN LA CABECERA-->
    <img src="https://www.trzcacak.rs/myfile/full/444-4444324_free-png-search-icon-dibujos-de-una-lupa.png">
    <div id="buscar">
        <input type="text" name ="buscar" value="">
        <input type="submit" name="buscar" value="Buscar">
    </div>
    <div id="botones">
        <input type="submit" name="login" value="Logearse" onclick="window.location.href='vista_logearse.php'"> &nbsp;&nbsp;&nbsp;&nbsp; <!--Falta poner la referencia-->
        <input type="submit" name="registro" value="Registrarse" onclick="window.location.href='vista_registrarse.php'"> <!--Falta poner la referencia-->
    </div>
</div>
<div id="cuerpo">
    <h2><i>Peliculas:</i></h2>
</div>