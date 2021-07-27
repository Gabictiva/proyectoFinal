CREATE DATABASE veterinaria;
use veterinaria;

CREATE TABLE usuarios ( 
	id_usuario INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,  
	nombre_usuario VARCHAR(40) NOT NULL ,  
	apellido_usuario VARCHAR(40) NOT NULL ,  
	email VARCHAR(60) NOT NULL UNIQUE,  
	password VARCHAR(10) NOT NULL ,  
	telefono INT(15) NOT NULL ,  
	direccion VARCHAR(100) NOT NULL  
); 

CREATE TABLE mascotas (
	id_mascota INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre_mascota VARCHAR(40) NOT NULL, 
	usuario_id INT NOT NULL,
	FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

/*CREATE TABLE servicios (
	id_servicio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre_servicio VARCHAR(40) NOT NULL, 
	turno_id INT NOT NULL,
	FOREIGN KEY (turno_id) REFERENCES turnos(id_turno)
);

CREATE TABLE turnos (
	id_turno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	dia DATE NOT NULL, 
	hora TIME NOT NULL
);*/
    
    





