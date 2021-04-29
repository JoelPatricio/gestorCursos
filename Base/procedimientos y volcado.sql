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
        cursos (nombre, unidades,examen,tareas,asistencias,registro_matricula)
    VALUES
    	(nombreIN,unidadesIN,examenesIN,tareasIN,asistenciasIN,matriculaIN);
END$$

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
CREATE PROCEDURE alumnosRegistrados(IN matriculaIN VARCHAR(45))
BEGIN
    SELECT
    	* 
    FROM
    	alumnos AS a 
    INNER JOIN cursos on a.cursos_idcursos=idcursos 
    where registro_matricula=matriculaIN;
END$$