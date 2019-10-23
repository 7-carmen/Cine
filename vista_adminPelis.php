<?php
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<div id="cabecera">
    <img id="logo" src="logo.png" onclick="window.location.href='index.php?do=mostrar_datos'">
    <h1><i>El cine en casa</i></h1> 
    <img id="lupa" src="https://www.trzcacak.rs/myfile/full/444-4444324_free-png-search-icon-dibujos-de-una-lupa.png">
    <div id="buscar">
        <input type="text" name ="buscar" value="">
        <input type="submit" name="buscar" value="Buscar">
    </div>
    <div id="botones_admin">
        <input type="submit" name="adnuistrar" value="Administrar cuentas" onclick="window.location.href='index.php?do=mostrar_usuarios'"> <br/> 
        <br/><input type="submit" name="adnuistrar" value="Administrar peliculas"onclick="window.location.href='index.php?do=mostrar_admin_pelicula'"> &nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="submit" name="cerrar" value="Cerrar sesión" onclick="window.location.href='index.php?do=Desconectar'"> 
    </div>
</div>
<h2><i>Peliculas:</i></h2>
<div id="cuerpo_cuantas">
    <?php
    if (isset($_REQUEST["mensaje"]) && $_REQUEST["mensaje"] != null) {
        echo "<div style='color:red'>" . $_REQUEST["mensaje"] . "</div> <br/>";
    }
    $peliculas = $data["peliculas"];
    echo "<table border='1'>";
    echo "<tr> <th> ID </th> <th> Cartel </th> <th> Nombre </th> <th> Año </th> <th> Duración </th> <th> Genero </th><th> Eliminar </th> <th> Editar </th></tr>";
    foreach ($peliculas as $peli) {
            echo "<tr> 
                    <td> " . $peli->id . " </td>
                    <td> <img src= " . $peli->cartel . "  width='100px' height='150px'> </td> 
                    <td> " . $peli->nombre . " </td>
                    <td> " . $peli->anyo_presentacion . " </td>
                    <td> " . $peli->duracion . " </td>
                    <td> " . $peli->genero . " </td>
                    <td> <a href='index.php?do=eliminar_pelicula&id=" . $peli->id . "'>Eliminar</a> </td>
                    <td> <a href='index.php?do=mostrar_pelicula_modificar&id=" . $peli->id . "'>Modificar</a> </td>
                    </tr>";
        }
    echo "</table>";
    ?>
    <div id=admin>
        <form action="index.php" method="get">
            <br /> Nombre<br /> <input type='text' name='nombre'><br />
            <br /> Año::<br /> <input type='text' name='anyo'><br />
            <br /> Duración: <br /> <input type='text' name='duracion'><br />
            <br /> Genero:<br /> <input type='text' name='genero'><br />
            <br /> Cartel: <br /> <input type='text' name='cartel'><br />
            <br /> <input type="submit" value="Añadir pelicula">
            <br /> <input type="hidden" name="do" value="anadir_pelicula"><br />
        </form>
    </div>
</div>