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
    <div id="botones_admin">
        <input type="submit" name="adnuistrar" value="Administrar cuentas" onclick="window.location.href='index.php?do=mostrar_usuarios'"> <br/> <!--Falta poner la referencia-->
        <br/><input type="submit" name="adnuistrar" value="Administrar peliculas"> &nbsp;&nbsp;&nbsp;&nbsp; <!--Falta poner la referencia-->
        <input type="submit" name="cerrar" value="Cerrar sesión" onclick="window.location.href='index.php?do=Desconectar'"> 
    </div>
</div>
<div id="cuerpo_cuantas">
<?php
    if (isset($data["mensaje"]) && $data["mensaje"] != null) {
        echo "<div style='color:red'>" . $data["mensaje"] . "</div>";
    }
    $usersList = $data["datosUsuario"];
    foreach ($usersList as $user) {
        echo "<form>";
        echo "<br/><br/>";
        echo "Nick de usuario:<br/><input type='text' name='usuario' value=$user->usuario readonly='readonly'><br/>";
        echo "<br />Contraseña del usuario:<br /> <input type='text' name='contraseña' value=$user->contraseña><br />";
        echo "<br />Nombre:<br /> <input type='text' name='nombre' value=$user->nombre><br />";
        echo "<br /> Tipo usuario:<br/> <input type='text' name='tipo' value=$user->tipo><br />";
        echo "<br />Apellidos:<br /> <input type='text' name='apellidos' value=$user->apellidos><br />";
        echo "<br />Correo:<br /> <input type='text' name='correo' value=$user->correo><br />";
        echo "<br /><input type='submit' value='Modificar usuario'>";
        echo "<br /><input type='hidden' name='do' value='modificar_usuario'>";
        echo "</form>";
    }
?>
</div>