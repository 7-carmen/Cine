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
        <br/><input type="submit" name="adnuistrar" value="Administrar peliculas" onclick="window.location.href='index.php?do=mostrar_admin_pelicula'"> &nbsp;&nbsp;&nbsp;&nbsp; <!--Falta poner la referencia-->
        <input type="submit" name="cerrar" value="Cerrar sesión" onclick="window.location.href='index.php?do=Desconectar'"> 
    </div>
</div>
<h2><i>Cuentas:</i></h2>
<div id="cuerpo_cuantas">
    <?php
    $usersList = $data["usersList"];
    if (isset($_REQUEST["mensaje"]) && $_REQUEST["mensaje"] != null) {
        echo "<div style='color:red'>" . $_REQUEST["mensaje"] . "</div> <br/>";
    }
    echo "<table border='1'>";
    echo "<tr> <th> ID </th> <th> Usuario </th> <th> Nombre </th> <th> Apellidos </th> <th> Correo </th> <th> Contraseña </th> <th> Tipo </th> <th> Eliminar </th> <th> Editar </th></tr>";
    foreach ($usersList as $user) {
        if ($user->id == $data["idUsuarioLogueado"]) {
            echo "<tr> 
                                                            <td> " . $user->id . " </td>
                                                            <td> " . $user->usuario . " </td> 
                                                            <td> " . $user->nombre . " </td>
                                                            <td> " . $user->apellidos . " </td>
                                                            <td> " . $user->correo . " </td>
                                                            <td> " . $user->contraseña . " </td>
                                                            <td> " . $user->tipo ."</td>
                                                            <td>  </td>
                                                            <td> <a href='index.php?do=mostrar_usuario_modificar&usuario=" . $user->usuario . "'>Modificar</a> </td>
                                                    </tr>";
        } else {
            echo "<tr> 
                                                            <td> " . $user->id . " </td>
                                                            <td> " . $user->usuario . " </td> 
                                                            <td> " . $user->nombre . " </td>
                                                            <td> " . $user->apellidos . " </td>
                                                            <td> " . $user->correo . " </td>
                                                            <td> " . $user->contraseña . " </td>
                                                            <td> " . $user->tipo ."</td>
                                                            <td> <a href='index.php?do=eliminar_cuenta&usuario=" . $user->usuario . "'>Eliminar</a> </td>
                                                            <td> <a href='index.php?do=mostrar_usuario_modificar&usuario=" . $user->usuario . "'>Modificar</a> </td>
                                                    </tr>";
        }
    }
    echo "</table>";
    ?>
    <div id=admin>
        <form action="index.php" method="get">
            <br /> Nick del usuario:<br /> <input type='text' name='usuario'><br />
            <br /> Contraseña:<br /> <input type='password' name='contraseña'><br />
            <br />
            <p>Tipo:
                <input type="radio" name="tipo" value="1"> Usuario
                <input type="radio" name="tipo" value="0"> Administrador
            </p>
            <br /> Nombre: <br /> <input type='text' name='nombre'><br />
            <br /> Apellidos:<br /> <input type='text' name='apellidos'><br />
            <br /> Correo: <br /> <input type='text' name='correo'><br />
            <br /> <input type="submit" value="Añadir usuario">
            <br /> <input type="hidden" name="do" value="anadir_usuario"><br />
        </form>
    </div>
</div>