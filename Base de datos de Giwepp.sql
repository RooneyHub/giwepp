CREATE DATABASE giwepp_pf;
use giwepp_pf;

CREATE TABLE usuarios
(
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
	u_tipo TINYINT NOT NULL,
	u_nombre CHAR(26) NOT NULL,
	u_ape_pat CHAR(22) NOT NULL,
	u_ape_mat CHAR(22) NOT NULL, 
	u_correo CHAR(45) NOT NULL,
	u_telefono CHAR(22) ,
	u_fecha_nac DATE NOT NULL,
	u_activo TINYINT NOT NULL,
	u_cuenta CHAR(10) NOT NULL,
	u_password CHAR(128) NOT NULL,
	u_fecha_reg TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
    ON UPDATE CURRENT_TIMESTAMP
);






CREATE TABLE grupos
(
    id_grupo INT PRIMARY KEY AUTO_INCREMENT,
    id_generacion INT NOT NULL,
    gr_nombre CHAR(10)
);

alter table grupos add foreign key (id_generacion) references  generaciones (id_generacion);

CREATE TABLE calificaciones
(
	id_calificacion INT PRIMARY key,
	id_materia INT NOT NULL,
	id_alumno INT NOT NULL,
	c_parcial SMALLINT NOT NULL,
	c_calificacion INT NOT NULL,
	c_reporte CHAR(120) NOT NULL,
	id_profesor INT NOT NULL
);

alter table calificaciones add foreign key (id_materia) references  materias (id_materia);
alter table calificaciones add foreign key (id_alumno) references  usuarios (id_usuario);
alter table calificaciones add foreign key (id_profesor) references  usuarios (id_usuario);

CREATE TABLE generaciones
(
	id_generacion INT PRIMARY KEY,
	ge_fecha_ini DATE NOT NULL,
	ge_fecha_fin DATE NOT NULL
);

CREATE TABLE horarios
(
	id_horario INT PRIMARY KEY,
	id_materia INT NOT NULL,
	ho_hora_ini TINYINT NOT NULL,
	ho_hora_fin TINYINT NOT NULL,
	ho_dia TINYINT NOT NULL
);

alter table horarios add foreign key (id_materia) references materias (id_materia);

CREATE TABLE familiares_alumno
(
	id_datos_alumno INT PRIMARY key,
    id_alumno INT NOT NULL,
    id_familiar INT NOT NULL,
    fa_tipo TINYINT NOT NULL
);

alter table familiares_alumno add foreign key (id_alumno) references  usuarios (id_usuario);
alter table familiares_alumno add foreign key (id_familiar) references  usuarios (id_usuario);

CREATE TABLE tareas
(
	id_tarea INT PRIMARY key AUTO_INCREMENT,
	id_maestro INT NOT NULL,
	id_materia INT NOT NULL,
    id_grupo INT NOT NULL,
    t_tarea CHAR(30) NOT NULL,
    t_descripcion CHAR(150) NOT NULL,
    t_fecha_entrega DATE NOT NULL,
    t_activa TINYINT NOT NULL,
    t_fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
    ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE materias
(
	id_materia INT PRIMARY KEY AUTO_INCREMENT,
	ma_nombre CHAR(26) NOT NULL,
	ma_descri CHAR(160) NOT NULL
);

CREATE TABLE grupos
(
    id_grupo INT PRIMARY KEY AUTO_INCREMENT,
    id_generacion INT NOT NULL,
    gr_nombre CHAR(10)
);

CREATE TABLE rel_mater_prof_grup
(
	id_materia INT NOT NULL,
	id_profesor INT NOT NULL,
	id_grupo INT NOT NULL,
);

alter table rel_mater_prof_grup add foreign key (id_materia) references  materias (id_materia);
alter table rel_mater_prof_grup add foreign key (id_profesor) references  usuarios (id_usuario);
alter table rel_mater_prof_grup add foreign key (id_grupo) references  grupos (id_grupo);

----------------------------------Posibles agregados al sistema------------------------------------
--- Aqui solo se busca registrar a quien ha pagado la colegiatura y tener prueba de ello, el sistema
---no hara los pagos automaticamente.

CREATE table pagos
(
	id_pago INT PRIMARY key,
	pa_costo SMALLINT NOT NULL,
	id_alumno INT NOT NULL,
	pa_beca INT NOT NULL,
	id_generacion INT NOT NULL,
	pa_parcial TINYINT NOT NULL,
	pa_costo_final SMALLINT NOT NULL
);

alter table pagos add foreign key (id_alumno) references  usuarios (id_usuario);
alter table pagos add foreign key (id_generacion) references  generaciones (id_generacion);

----------------------------------Registros raiz de prueba------------------------------------

insert into Tareas 
   (id_tarea, id_maestro, id_materia, id_grupo, t_tarea, t_descripcion, t_fecha_entrega, t_activa)
   values
   (1000, 1000, 1000, 1000, 'Tarea prueba', 'Tarea de prueba para el registro de la base de datos', '2017/01/01', 1 );

insert into grupos
   (id_grupo, id_generacion, gr_nombre) values
   (1000, 1000, 'ZA-0001');

insert into materias 
   (id_materia, ma_nombre, ma_descri) values
   (1000, 'M_Prueba', 'Registro de prueba para la base de datos');