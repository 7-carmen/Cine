<?php
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<div id="cabecera">
    <img id="logo" src="logo.png" onclick="window.location.href='index.php?do=mostrar_página'">
    <h1><i>El cine en casa</i></h1> 
    <img id="lupa" src="https://www.trzcacak.rs/myfile/full/444-4444324_free-png-search-icon-dibujos-de-una-lupa.png">
    <div id="buscar">
        <input type="text" name ="buscar" value="">
        <input type="submit" name="buscar" value="Buscar">
    </div>
    <div id="botones">
    <input type="submit" name="login" value="Logearse" onclick="window.location.href='vista_logearse.php'"> &nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="submit" name="registro" value="Registrarse" onclick="window.location.href='vista_registrarse.php'"> 
    
    </div>
</div>
<div id="cuerpo">
        <h2>Bienvenido, registrese en nuestro sistema: </h2>
        <div id="logearse">
        <?php
         if (isset($data["mensaje"]) && $data["mensaje"] != null) {
            echo "<br/><div style='color:red'>" . $data["mensaje"] . "</div>";
        }
        ?>
        <form action="index.php" method="get">
            <br /> Nick del usuario:<br /> <input type='text' name='usuario'><br />
            <br /> Contraseña:<br /> <input type='password' name='contraseña'><br />
            <br /> Nombre: <br /> <input type='text' name='nombre'><br />
            <br /> Apellidos:<br /> <input type='text' name='apellidos'><br />
            <br /> Correo: <br /> <input type='text' name='correo'><br />
            <br /> <input type="submit" value="Registrarse">
            <br /> <input type="hidden" name="do" value="registrarse"><br />
        </form>
        </div>
</div>