/*********************************************/
#tala de configuracion carreras
/*********************************************/
create table carreras(
	id integer(10) unsigned not null auto_increment primary key,
	carrera varchar(100) not null,
	status boolean,
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO carreras (id, carrera, status)
VALUES
	(1, 'tecnologias de informacion', true),
	(2, 'mantenimiento', true),
	(3, 'logistica', true);
/*********************************************/
#tala de configuracion turnos
/*********************************************/
create table turnos(
	id integer(10) unsigned not null auto_increment primary key,
	turno varchar(50) not null,
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO turnos (id, turno)
VALUES
	(1, 'matutino'),
	(2, 'vespertino'),
	(3, 'enpalme');

/*********************************************/
#tala de configuracion semestres
/*********************************************/
create table semestres(
	id integer(10) unsigned not null auto_increment primary key,
	semestre varchar(30) not null,
	status boolean,
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO semestres (id, semestre, status)
VALUES
	(1, 'primer semestre', true),
	(2, 'segundo semestre', true),
	(3, 'tercer semestre', true),
	(4, 'cuarto semestre', true),
	(5, 'quinto semestre', true),
	(6, 'sexto semestre', true);
/*********************************************/
#tala de configuracion aulas
/*********************************************/
create table aulas(
	id integer(10) unsigned not null auto_increment primary key,
	aula varchar(50) not null,
	descripcion varchar(50),
	status boolean,
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO aulas (id, aula, descripcion, status)
VALUES
	(1, 'a1', 'edificio principal', true),
	(2, 'a2', 'edificio principal', true),
	(3, 'a3', 'edificio principal planta 2', true),
	(4, 'a4', 'edificio principal planta 2', true),
	(5, 'l1', 'laboratorio computo edificio principal', true),
	(6, 'l2', 'laboratorio de computo edifico final', true),
	(7, 'b1', 'edificio secundario', true),
	(8, 'b2', 'edifico secundario', true),
	(9, 'b3', 'edificio secundario planta 2', true),
	(10, 'b4', 'edificio secundario planta 2', true);

/*********************************************/
#tala de configuracion ciclos
/*********************************************/
create table ciclos(
	id integer(10) unsigned not null auto_increment primary key,
	ciclo varchar(50) not null,
	status boolean,
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO ciclos (id, ciclo, status)
VALUES
	(1, '2015 Enero - Julio', false),
	(2, '2015 Agosto - Diciembre', true);

/*********************************************/
#tala de configuracion dias
/*********************************************/
create table dias(
	id integer(10) unsigned not null auto_increment primary key,
	dia varchar(30) not null,
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO dias (id, dia)
VALUES
	(1, 'Lunes'),
	(2, 'Martes'),
	(3, 'Miercoles'),
	(4, 'Jueves'),
	(5, 'Viernes');

/*********************************************/
#tala de configuracion horas
/*********************************************/
create table horas(
	id integer(10) unsigned not null auto_increment primary key,
	hora varchar(50) not null,
	turno_id integer(10) unsigned not null,
	FOREIGN KEY (turno_id) REFERENCES turnos(id),
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO horas (hora, turno_id)
VALUES
	('7:00-8:00', 1),
	('8:00-9:00', 1),
	('9:00-10:00', 1),
	('10:00-11:00', 1),
	('11:00-12:00', 1),
	('12:00-13:00', 1),
	('13:00-14:00', 3),
	('14:00-15:00', 2),
	('15:00-16:00', 2),
	('16:00-17:00', 2),
	('17:00-18:00', 2),
	('18:00-19:00', 2),
	('19:00-20:00', 2);

/*********************************************/
#tala de configuracion maestros
/*********************************************/
create table maestros(
	id integer(10) unsigned not null auto_increment primary key,
	clave varchar(50) not null,
	nombres varchar(150) not null,
	status boolean,
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO maestros (id, clave, nombres, status)
VALUES
	(1, 'asd1342', 'luis enrique', true),
	(2, 'df89jjsu', 'jorge enrique', true),
	(3, 'sdfsdf78', 'matias romero', true),
	(4, 'gas57as', 'tizoc mendez', true),
	(5, 'jgdas55', 'claudia nohemi', true),
	(6, 'asdq3q', 'erick de jesus', true),
	(7, 'as907sd', 'maria de lourdes', true);

/*********************************************/
#tala de configuracion materias
/*********************************************/
CREATE TABLE materias (
	id int(10) unsigned NOT NULL AUTO_INCREMENT,
	materia varchar(150) NOT NULL,
	hrs_teoricas int(10) DEFAULT NULL,
	hrs_practicas int(10) DEFAULT NULL,
	color VARCHAR(10),
	status boolean,
	PRIMARY KEY (id),
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO materias (materia, hrs_teoricas, hrs_practicas, color, status)
VALUES
	('ingles', 2, 0, '#cc00aa', true),
	('algebra', 4, 0, '#cc00aa', true),
	('fisica', 4, 0, '#cc00aa', true),
	('quimica', 4, 2, '#cc00aa', true),
	('tics', 2, 4, '#cc00aa', true),
	('mantenimiento', 2, 2, '#cc00aa', true),
	('materia de primer semestre 1', 2, 0, '#cc00aa', true),
	('materia de primer semestre 2', 4, 0, '#cc00aa', true),
	('materia de primer semestre 3', 4, 0, '#cc00aa', true),
	('materia de primer semestre 4', 4, 2, '#cc00aa', true),
	('materia de primer semestre 5', 2, 4, '#cc00aa', true),
	('materia de primer semestre 6', 2, 2, '#cc00aa', true),
	('materia de segundo semestre 1', 2, 0, '#cc00aa', true),
	('materia de segundo semestre 2', 4, 0, '#cc00aa', true),
	('materia de segundo semestre 3', 4, 0, '#cc00aa', true),
	('materia de segundo semestre 4', 4, 2, '#cc00aa', true),
	('materia de segundo semestre 5', 2, 4, '#cc00aa', true),
	('materia de segundo semestre 6', 2, 2, '#cc00aa', true),
	('materia de tercer semestre 1', 2, 0, '#cc00aa', true),
	('materia de tercer semestre 2', 4, 0, '#cc00aa', true),
	('materia de tercer semestre 3', 4, 0, '#cc00aa', true),
	('materia de tercer semestre 4', 4, 2, '#cc00aa', true),
	('materia de tercer semestre 5', 2, 4, '#cc00aa', true),
	('materia de tercer semestre 6', 2, 2, '#cc00aa', true),
	('materia de cuarto semestre 1', 2, 0, '#cc00aa', true),
	('materia de cuarto semestre 2', 4, 0, '#cc00aa', true),
	('materia de cuarto semestre 3', 4, 0, '#cc00aa', true),
	('materia de cuarto semestre 4', 4, 2, '#cc00aa', true),
	('materia de cuarto semestre 5', 2, 4, '#cc00aa', true),
	('materia de cuarto semestre 6', 2, 2, '#cc00aa', true),
	('materia de quinto semestre 1', 2, 0, '#cc00aa', true),
	('materia de quinto semestre 2', 4, 0, '#cc00aa', true),
	('materia de quinto semestre 3', 4, 0, '#cc00aa', true),
	('materia de quinto semestre 4', 4, 2, '#cc00aa', true),
	('materia de quinto semestre 5', 2, 4, '#cc00aa', true),
	('materia de quinto semestre 6', 2, 2, '#cc00aa', true),
	('materia de sexto semestre 1', 2, 0, '#cc00aa', true),
	('materia de sexto semestre 2', 4, 0, '#cc00aa', true),
	('materia de sexto semestre 3', 4, 0, '#cc00aa', true),
	('materia de sexto semestre 4', 4, 2, '#cc00aa', true),
	('materia de sexto semestre 5', 2, 4, '#cc00aa', true),
	('materia de sexto semestre 6', 2, 2, '#cc00aa', true);

/*********************************************/
#tala de configuracion maestro_materia
/*********************************************/
create table maestro_materia(
  id integer(10) unsigned not null primary key auto_increment,
	maestro_id integer(10) unsigned not null,
	FOREIGN KEY (maestro_id) REFERENCES maestros(id),
	materia_id integer(10) unsigned not null,
	FOREIGN KEY (materia_id) REFERENCES materias(id),
	ciclo_id integer(10) unsigned not null,
	FOREIGN KEY (ciclo_id) REFERENCES ciclos(id)
);

/*********************************************/
#tala de configuracion grupos
/*********************************************/
create table grupos(
	id integer(10) unsigned not null auto_increment primary key,
	grupo varchar(30) not null,
	carrera_id integer(10) unsigned not null,
	FOREIGN KEY (carrera_id) REFERENCES carreras(id),
	turno_id integer(10) unsigned not null,
	FOREIGN KEY (turno_id) REFERENCES turnos(id),
	semestre_id integer(10) unsigned not null,
	FOREIGN KEY (semestre_id) REFERENCES semestres(id),
	status boolean not null,
	created_at timestamp,
	updated_at timestamp
);
INSERT INTO grupos (grupo, carrera_id, turno_id, semestre_id, status)
VALUES
	('101', 1, 1, 1, 0),
	('102', 1, 2, 1, 0),
	('103', 2, 1, 1, 0),
	('104', 2, 2, 1, 0),
	('105', 3, 1, 1, 0),
	('106', 3, 2, 1, 0),
	('201', 1, 1, 2, 0),
	('202', 1, 2, 2, 0),
	('203', 2, 1, 2, 0),
	('204', 2, 2, 2, 0),
	('205', 3, 1, 2, 0),
	('206', 3, 2, 2, 0),
	('301', 1, 1, 3, 0),
	('302', 1, 2, 3, 0),
	('303', 2, 1, 3, 0),
	('304', 2, 2, 3, 0),
	('305', 3, 1, 3, 0),
	('306', 3, 2, 3, 0),
	('401', 1, 1, 4, 0),
	('402', 1, 2, 4, 0),
	('403', 2, 1, 4, 0),
	('404', 2, 2, 4, 0),
	('405', 3, 1, 4, 0),
	('406', 3, 2, 4, 0),
	('501', 1, 1, 5, 0),
	('502', 1, 2, 5, 0),
	('503', 2, 1, 5, 0),
	('504', 2, 2, 5, 0),
	('505', 3, 1, 5, 0),
	('506', 3, 2, 5, 0),
	('601', 1, 1, 6, 0),
	('602', 1, 2, 6, 0),
	('603', 2, 1, 6, 0),
	('604', 2, 2, 6, 0),
	('605', 3, 1, 6, 0),
	('606', 3, 2, 6, 0);

/*********************************************/
#tala de configuracion grupo_materia
/*********************************************/
CREATE TABLE grupo_materia (
  id integer(10) unsigned not null auto_increment primary key,
  grupo_id int(10) unsigned NOT NULL,
  materia_id int(10) unsigned NOT NULL,
  FOREIGN KEY (grupo_id) REFERENCES grupos (id),
  FOREIGN KEY (materia_id) REFERENCES materias (id)
);

/*********************************************/
#tala de configuracion ciclo_grupo
/*********************************************/
create table ciclo_grupo(
	id integer(10) unsigned not null auto_increment primary key,
	ciclo_id integer(10) unsigned not null,
	FOREIGN KEY (ciclo_id) REFERENCES ciclos(id),
	grupo_id integer(10) unsigned not null,
	FOREIGN KEY (grupo_id) REFERENCES grupos(id)
);

/*********************************************/
#tala de configuracion horarios
/*********************************************/
create table horarios(
	id integer(10) unsigned not null auto_increment primary key,
	hora_id integer(10) unsigned not null,
	FOREIGN KEY (hora_id) REFERENCES horas(id),
	materia_id integer(10) unsigned not null,
	FOREIGN KEY (materia_id) REFERENCES materias(id),
	grupo_id integer(10) unsigned not null,
	FOREIGN KEY (grupo_id) REFERENCES grupos(id),
	aula_id integer(10) unsigned not null,
	FOREIGN KEY (aula_id) REFERENCES aulas(id),
	dia_id integer(10) unsigned not null,
	FOREIGN KEY (dia_id) REFERENCES dias(id),
	ciclo_id integer(10) unsigned not null,
	FOREIGN KEY (ciclo_id) REFERENCES ciclos(id),
	created_at timestamp,
	updated_at timestamp
);

create table clon_horarios(
	id integer(10),
	hora_id integer(10),
	materia_id integer(10),
	grupo_id integer(10),
	aula_id integer(10),
	dia_id integer(10),
	ciclo_id integer(10)
);