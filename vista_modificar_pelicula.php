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
<div id="cuerpo_cuantas">
<?php
    if (isset($data["mensaje"]) && $data["mensaje"] != null) {
        echo "<div style='color:red'>" . $data["mensaje"] . "</div>";
    }
    $listaPelis = $data["datosPelicula"];
    foreach ($listaPelis as $peli){
        echo "<form action='index.php' method='get'>
            <br />Id: <br/> <input type='text' name='id' value='$peli->id'><br />
            <br /> Nombre<br /> <input type='text' name='nombre' value='$peli->nombre'><br />
            <br /> Año:<br /> <input type='text' name='anyo'  value='$peli->anyo_presentacion'><br />
            <br /> Duración: <br /> <input type='text' name='duracion'  value='$peli->duracion'><br />
            <br /> Genero:<br /> <input type='text' name='genero'  value='$peli->genero'><br />
            <br /> Cartel: <br /> <input type='text' name='cartel'  value='$peli->cartel'><br />
            <br /> <input type='submit' value='Modificar pelicula'>
            <br /> <input type='hidden' name='do' value='modificar_pelicula'><br />
        </form>";
    }