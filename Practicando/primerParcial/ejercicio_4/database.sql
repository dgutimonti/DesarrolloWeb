-- SQL to create the table
CREATE TABLE libros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  imagen VARCHAR(255),
  titulo VARCHAR(255),
  autor VARCHAR(255),
  editorial VARCHAR(255),
  anio INT
);
USE DATABASE practicando;
USE TABLE libros;
-- SQL to insert sample data
INSERT INTO libros (imagen, titulo, autor, editorial, anio) VALUES
('C:\xampp\htdocs\Web\Practicando\primerParcial\ejercicio_4\img\imagen1.jpg', 'Introducción a la Informatica', 'Michael Miller', 'Bolivia', 1966),

