USE `gestorcursos` ;

insert into registro (matricula,password) values
("B6ACA741566","h698115f5h"),
("A5ACB920483","n95110b1n");


DELIMITER $$
CREATE PROCEDURE login(IN matriculaIn VARCHAR(50), IN passwordIn VARCHAR(50))
BEGIN
    SELECT
        count(*)
    FROM 
        registro
    WHERE
    	matricula=matriculaIn AND password=passwordIn;
END$$

--CALL login('A5ACB920483','n95110b1n');	
--DROP PROCEDURE nombre_procedimiento
--show procedure status;

DELIMITER $$
CREATE PROCEDURE nuevaMateria(IN nombreIN VARCHAR(45), IN unidadesIN INT, IN examenesIN INT, IN tareasIN INT, IN asistenciasIN INT, IN matriculaIN VARCHAR(45))
BEGIN
    INSERT INTO
        cursos (nombre,unidades,examen,tareas,asistencias,registro_matricula)
    VALUES
    	(nombreIN,unidadesIN,examenesIN,tareasIN,asistenciasIN,matriculaIN);
    SET @idMateria=(SELECT MAX(idcursos) AS id FROM cursos);
    SET @i=0;
    REPEAT
    	INSERT INTO
        	unidades (cursos_idcursos)
    	VALUES
    		(@idMateria);
    	SET @i=@i+1;
    	UNTIL @i=unidadesIN
    END REPEAT;
END$$
--CALL nuevaMateria('Ingles',4,25,50,25,'B6ACA741566');

DELIMITER $$
CREATE PROCEDURE mostrarCursos(IN matriculaIN VARCHAR(45))
BEGIN
    SELECT
    	*
    FROM
        cursos
    WHERE
    	registro_matricula=matriculaIN;
END$$


DELIMITER $$
CREATE PROCEDURE eliminarCurso(IN idcursosIN INT)
BEGIN
	DELETE FROM
    	unidades
    WHERE 
    	cursos_idcursos=idcursosIN;
    DELETE FROM
    	cursos 
    WHERE 
    	idcursos=idcursosIN;
END$$

DELIMITER $$
CREATE PROCEDURE mostrarCurso(IN idcursosIN INT)
BEGIN
    SELECT
    	*
    FROM
        cursos
    WHERE
    	idcursos=idcursosIN;
END$$

DELIMITER $$
CREATE PROCEDURE agregarAlumno(IN nombreIN VARCHAR(45), IN idcursosIN INT)
BEGIN
    INSERT INTO
        alumnos (nombre,cursos_idcursos)
    VALUES
    	(nombreIN,idcursosIN);
    SELECT MAX(idalumnos) AS id FROM alumnos;
END$$

DELIMITER $$
CREATE PROCEDURE mostrarIdUnidadesCurso(IN idCurso INT)
BEGIN
    SELECT
    	idunidades
    FROM
    	unidades
    AS u INNER JOIN
    	cursos
    ON
    	u.cursos_idcursos=idcursos
    WHERE
    	cursos_idcursos=idCurso;
END$$

DELIMITER $$
CREATE PROCEDURE mostrarAlumnos(IN idcursosIN INT)
BEGIN
    SELECT
    	*
    FROM
        alumnos
    WHERE
    	cursos_idcursos=idcursosIN
    ORDER BY
    	nombre ASC;
END$$

DELIMITER $$
CREATE PROCEDURE agregarAlumno_Unidades(IN idAlumno INT, IN idUnidades INT)
BEGIN
    INSERT INTO
    	alumnosCalificaciones(alumnos_idalumnos,unidades_idunidades)
    VALUES
    	(idAlumno,idUnidades);
END$$

DELIMITER $$
CREATE PROCEDURE contarAlumnos(IN idcursosIN INT)
BEGIN
    SELECT
    	count(*)
    FROM
        alumnos
    WHERE
    	cursos_idcursos=idcursosIN;
END$$

DELIMITER $$
CREATE PROCEDURE mostrarUnidades(IN idcursosIN INT)
BEGIN
    SELECT
    	*
    FROM
        unidades
    WHERE
    	cursos_idcursos=idcursosIN;
END$$

DELIMITER $$
CREATE PROCEDURE eliminarAlumno(IN idalumnoIN INT)
BEGIN
	DELETE FROM
    	alumnosCalificaciones
    WHERE 
    	alumnos_idalumnos=idalumnoIN;
    DELETE FROM
    	alumnos
    WHERE 
    	idalumnos=idalumnoIN;
END$$

DELIMITER $$
CREATE PROCEDURE mostrarAlumnosUnidad(IN idCursos INT,IN idUnidades INT)
BEGIN
	SELECT 
		idalumnos,nombre,calExamenes,calTareas,calAsistencias
	FROM 
		alumnos AS a 
	INNER JOIN
		alumnosCalificaciones 
	ON a.idalumnos=alumnos_idalumnos 
	WHERE
		cursos_idcursos=idCursos
	AND
		unidades_idunidades=idUnidades
	ORDER BY
		nombre;
END$$

DELIMITER $$
CREATE PROCEDURE obtenerRubrosEvaluacion(IN idCursos INT)
BEGIN
	SELECT 
		examen,tareas,asistencias
	FROM 
		cursos
	WHERE
		idcursos=idCursos;
END$$

DELIMITER $$
CREATE PROCEDURE mostrarNombreAlumno(IN idAlumno INT)
BEGIN
	SELECT 
		nombre
	FROM 
		alumnos
	WHERE
		idalumnos=idAlumno;
END$$

DELIMITER $$
CREATE PROCEDURE actualizarCalificacionUnidad(IN idAlumnoIN INT,IN idUnidadIN INT,IN calExamenesIN INT,IN calTareasIN INT,IN calAsistenciasIN INT)
BEGIN
	UPDATE
		alumnosCalificaciones
	SET
		calExamenes=calExamenesIN,calTareas=calTareasIN,calAsistencias=calAsistenciasIN
	WHERE
		unidades_idunidades=idUnidadIN AND alumnos_idalumnos=idAlumnoIN;
END$$

DELIMITER $$
CREATE PROCEDURE mostrarCalificacionesFinales(IN idAlumno INT)
BEGIN
	select
		calExamenes,calTareas,calAsistencias
	from
		alumnosCalificaciones
	where
		alumnos_idalumnos=idAlumno;
END$$

DELIMITER $$
CREATE PROCEDURE numeroUnidades(IN idCursos INT)
BEGIN
	select
		unidades
	from
		cursos
	where
		idCursos=idCursos;
END$$

DELIMITER $$
CREATE PROCEDURE mostrarCalificacionesFinalesGrafica(IN idCursos INT)
BEGIN
	select
		calExamenes,calTareas,calAsistencias
	from
		alumnosCalificaciones 
	as a inner join
		unidades 
	on 
		a.unidades_idunidades=idunidades
	where 
		cursos_idcursos=idCursos;
END$$

DELIMITER $$
CREATE PROCEDURE mostrarCalificacionesUnidadGrafica(IN idUnidad INT)
BEGIN
	select 
		calExamenes,calTareas,calAsistencias
	from
		alumnosCalificaciones
	where
		unidades_idunidades=idUnidad;
END$$