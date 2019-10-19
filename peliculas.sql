DROP DATABASE IF EXISTS peliculas; 
CREATE DATABASE peliculas CHARSET utf8mb4;
USE peliculas;

CREATE TABLE usuarios (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR(50) NOT NULL,
nombre VARCHAR(50) NOT NULL,
apellidos VARCHAR(100) NOT NULL,
correo VARCHAR(100) NOT NULL,
contraseña VARCHAR(50) NOT NULL,
tipo BOOLEAN NOT NULL
);

CREATE TABLE peliculas (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
cartel VARCHAR(50) NOT NULL,
nombre VARCHAR(50) NOT NULL,
anyo_presentacion INT NOT NULL,
duracion INT NOT NULL,
genero VARCHAR(50) NOT NULL
);

CREATE TABLE directores ( 
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
apellidos VARCHAR(100) NOT NULL,
nacionalidad VARCHAR (50) NOT NULL
);

CREATE TABLE actores ( 
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
apellidos VARCHAR(100) NOT NULL,
nacionalidad VARCHAR (50) NOT NULL
);

CREATE TABLE usuarios_ven_peliculas(
id_usuario INT UNSIGNED NOT NULL,
id_pelicula INT UNSIGNED NOT NULL,
PRIMARY KEY(id_usuario, id_pelicula),
FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
FOREIGN KEY (id_pelicula) REFERENCES peliculas(id)
);

CREATE TABLE peliculas_tienen_director(
id_director INT UNSIGNED NOT NULL,
id_pelicula INT UNSIGNED NOT NULL,
PRIMARY KEY(id_director, id_pelicula),
FOREIGN KEY (id_director) REFERENCES directores(id),
FOREIGN KEY (id_pelicula) REFERENCES peliculas(id)
);

CREATE TABLE peliculas_tienen_actores(
id_actor INT UNSIGNED NOT NULL,
id_pelicula INT UNSIGNED NOT NULL,
PRIMARY KEY(id_pelicula, id_actor),
FOREIGN KEY (id_actor) REFERENCES actores(id),
FOREIGN KEY (id_pelicula) REFERENCES peliculas(id)
);

INSERT INTO peliculas VALUES(NULL, 'after.jpg', 'After', 2019, 105, 'Romance' );
INSERT INTO peliculas VALUES(NULL, 'c_huesos.jpg', 'El coleccionista de huesos', 2000, 118, 'Suspense' );
INSERT INTO peliculas VALUES(NULL, '7almas.jpg', '7 almas', 2009, 123, 'Dromatico' );

INSERT INTO actores VALUES(NULL, 'Will', 'Smith', 'Estadounidense' );
INSERT INTO actores VALUES(NULL, 'Hero', 'Fiennes-Tiffin', 'Britanico' );
INSERT INTO actores VALUES(NULL, 'Angelina', 'Jolie', 'Estadounidense/Camboyana' );

INSERT INTO usuarios VALUES(NULL, 'cka', 'Carmen', 'Soriano', 'cka@gmail.com', 'cka', FALSE);

SELECT * FROM usuarios WHERE usuario = 'cka' AND contraseña = 'cka';

SELECT * FROM usuarios WHERE usuario = 'cka' AND contraseña = 'cka';