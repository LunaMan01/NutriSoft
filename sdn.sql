SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `alimentos` (
  `ID_ALIMENTOS` int(255) NOT NULL,
  `ID_GRUPOS` int(255) NOT NULL,
  `Nombre_Ali` varchar(255) NOT NULL,
  `Cantidad_Ali` varchar(255) NOT NULL,
  `Unidad_Ali` varchar(255) NOT NULL,
  `Peso_Bruto` int(255) NOT NULL,
  `Peso_Neto` int(255) NOT NULL,
  `Energia_Kal_Ali` int(255) NOT NULL,
  `Proteinas_Ali` float NOT NULL,
  `Lipidos_Ali` float NOT NULL,
  `Hidratos_Carbono_Ali` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `alimentos` (`ID_ALIMENTOS`, `ID_GRUPOS`, `Nombre_Ali`, `Cantidad_Ali`, `Unidad_Ali`, `Peso_Bruto`, `Peso_Neto`, `Energia_Kal_Ali`, `Proteinas_Ali`, `Lipidos_Ali`, `Hidratos_Carbono_Ali`) VALUES
(1, 5, 'Huevo Fresco', '1', 'Pieza', 50, 44, 63, 5.5, 4.4, 0.3),
(2, 6, 'Aceite de oliva', '1', 'Cucharadita', 5, 5, 44, 0, 5, 0),
(3, 1, 'Jitomate', '120', 'g', 120, 113, 20, 1, 0.2, 4.4),
(4, 1, 'Cebolla Rebanada', '1/2', 'Taza', 58, 58, 23, 0.6, 0.1, 5.4),
(5, 3, 'Tortillas de Maiz', '1', 'Pieza', 30, 30, 64, 1.4, 0.5, 13.6),
(6, 2, 'Papaya Picada', '1', 'Taza', 140, 140, 55, 0.8, 0.1, 13.7),
(7, 7, 'Agua Natural', '1', 'Taza', 240, 240, 2, 0, 0, 0);

CREATE TABLE `bioimpedancia` (
  `ID_PACIENTES` int(11) NOT NULL,
  `ID_BIOIMPEDANCIA` int(11) NOT NULL,
  `Grasa_Total` int(3) NOT NULL,
  `Grasa_Superior` int(3) NOT NULL,
  `Grasa_Inferior` int(3) NOT NULL,
  `Grasa_Viseral` int(3) NOT NULL,
  `Masa_Libre_Grasa` int(3) NOT NULL,
  `Masa_Muscular` int(3) NOT NULL,
  `Peso_Oseo` int(3) NOT NULL,
  `Agua_Corporal` int(3) NOT NULL,
  `Edad_Metabolica` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bioimpedancia` (`ID_PACIENTES`, `ID_BIOIMPEDANCIA`, `Grasa_Total`, `Grasa_Superior`, `Grasa_Inferior`, `Grasa_Viseral`, `Masa_Libre_Grasa`, `Masa_Muscular`, `Peso_Oseo`, `Agua_Corporal`, `Edad_Metabolica`) VALUES
(2, 1, 20, 10, 10, 15, 30, 50, 10, 40, 60),
(1, 2, 70, 30, 30, 10, 30, 10, 58, 50, 100);

CREATE TABLE `estilo_vida` (
  `ID_PACIENTES` int(11) NOT NULL,
  `ID_ESTILO_VIDA` int(11) NOT NULL,
  `Act_Laboral` varchar(30) NOT NULL,
  `Descripcion_Act_Lab` text NOT NULL,
  `Deportes` varchar(100) NOT NULL,
  `Estres` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `estilo_vida` (`ID_PACIENTES`, `ID_ESTILO_VIDA`, `Act_Laboral`, `Descripcion_Act_Lab`, `Deportes`, `Estres`) VALUES
(1, 1, 'Estudiante', 'Estudia una licenciatura en Ing. Sistemas Computacionales en el tecnologico de Ciudad Guzman. Cursa el 11 semestre y esta por culminar su carrera, si llega a terminar sus residencias.', 'Futbol Americano, 3 veces a la semana, 2 horas al ', 'Medio'),
(2, 2, 'Nini', 'no trabaj y no estudia', 'Ninguno', 'Alto');

CREATE TABLE `grupos_ali` (
  `ID_GRUPOS` int(11) NOT NULL,
  `Nombre_Grupo` varchar(255) NOT NULL,
  `Color_Grupo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `grupos_ali` (`ID_GRUPOS`, `Nombre_Grupo`, `Color_Grupo`) VALUES
(1, 'Verduras', 'Verde'),
(2, 'Frutas', 'Rojo'),
(3, 'Cereales', 'Naranja'),
(4, 'Lacteos', 'Azul'),
(5, 'Origen Animal', 'Amarillo'),
(6, 'Aceites', 'Cafe'),
(7, 'Bebidas', 'Morado');

CREATE TABLE `habitos_toxicos` (
  `ID_PACIENTES` int(11) NOT NULL,
  `ID_TOXICO` int(11) NOT NULL,
  `Frecuencia_Cigarro` varchar(50) NOT NULL,
  `Cantidad_Cigarro` int(50) NOT NULL,
  `Frecuencia_Alcohol` varchar(50) NOT NULL,
  `Cantidad_Alcohol` int(50) NOT NULL,
  `Frecuencia_Drogas` varchar(50) NOT NULL,
  `Cantidad_Drogas` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `habitos_toxicos` (`ID_PACIENTES`, `ID_TOXICO`, `Frecuencia_Cigarro`, `Cantidad_Cigarro`, `Frecuencia_Alcohol`, `Cantidad_Alcohol`, `Frecuencia_Drogas`, `Cantidad_Drogas`) VALUES
(1, 1, 'Nunca', 0, 'Cada 8 dias', 10, 'Nunca', 0),
(2, 2, 'Cada Dia', 3, 'Cada 3 dias', 15, 'Siempre', 3);

CREATE TABLE `historia_clinica` (
  `ID_PACIENTES` int(11) NOT NULL,
  `ID_HISTORIA_CLI` int(11) NOT NULL,
  `Motivo_Consulta` varchar(50) NOT NULL,
  `Terapeuta_Previa` varchar(50) NOT NULL,
  `Cirugias_Realizadas` varchar(100) NOT NULL,
  `Tipo_Sangre` char(4) NOT NULL,
  `Alergias` varchar(255) NOT NULL,
  `Diagnostico_Previo` varchar(255) NOT NULL,
  `Vacunas` varchar(255) NOT NULL,
  `Antecedentes_Familiares` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `historia_clinica` (`ID_PACIENTES`, `ID_HISTORIA_CLI`, `Motivo_Consulta`, `Terapeuta_Previa`, `Cirugias_Realizadas`, `Tipo_Sangre`, `Alergias`, `Diagnostico_Previo`, `Vacunas`, `Antecedentes_Familiares`) VALUES
(1, 1, 'Bajar de peso', 'Ninguna', 'Ninguna', 'B+', 'Ninguna', 'Ninguno', 'Todas', 'padres diabeticos');

CREATE TABLE `mediciones_basicas` (
  `ID_PACIENTES` int(11) NOT NULL,
  `ID_MEDICIONES_B` int(11) NOT NULL,
  `Estatura` float NOT NULL,
  `Peso` float NOT NULL,
  `Factor_Act` int(11) NOT NULL,
  `Embarazo` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mediciones_basicas` (`ID_PACIENTES`, `ID_MEDICIONES_B`, `Estatura`, `Peso`, `Factor_Act`, `Embarazo`) VALUES
(1, 1, 1.82, 100.5, 2, 'No'),
(2, 2, 1.7, 70, 3, 'No');

CREATE TABLE `menus` (
  `ID_MENU` int(255) NOT NULL,
  `Energia_Kal_M` int(255) NOT NULL,
  `Proteinas_M` int(255) NOT NULL,
  `Lipidos_M` int(255) NOT NULL,
  `Hidratos_Carbono_M` int(255) NOT NULL,
  `ID_PACIENTES` int(255) NOT NULL,
  `Dia_Ini` char(2) NOT NULL,
  `Mes_Ini` char(2) NOT NULL,
  `Año_Ini` year(4) NOT NULL,
  `Dia` varchar(10) NOT NULL,
  `ID_TIEMPO` int(255) NOT NULL,
  `ID_PLATILLOS` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menus` (`ID_MENU`, `Energia_Kal_M`, `Proteinas_M`, `Lipidos_M`, `Hidratos_Carbono_M`, `ID_PACIENTES`, `Dia_Ini`, `Mes_Ini`, `Año_Ini`, `Dia`, `ID_TIEMPO`, `ID_PLATILLOS`) VALUES
(1, 1500, 500, 200, 400, 1, '15', '10', 2019, 'Lunes', 1, 1),
(1, 1500, 500, 200, 300, 1, '00', '00', 0000, 'Lunes', 2, 2);

CREATE TABLE `pacientes` (
  `ID_PACIENTES` int(255) NOT NULL,
  `Nombre_P` varchar(30) NOT NULL,
  `AP_P` varchar(20) NOT NULL,
  `AM_P` varchar(20) NOT NULL,
  `Escolaridad` varchar(30) NOT NULL,
  `Genero` char(1) NOT NULL,
  `Dia_N` char(2) NOT NULL,
  `Mes_N` char(2) NOT NULL,
  `Año_N` char(4) NOT NULL,
  `Calle_P` varchar(30) NOT NULL,
  `Num_P` varchar(255) NOT NULL,
  `Col_P` varchar(30) NOT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Historial_P` varchar(255) NOT NULL,
  `Dia_C` char(2) NOT NULL,
  `Mes_C` char(2) NOT NULL,
  `Año_C` char(4) NOT NULL,
  `Dia_SC` char(2) NOT NULL,
  `Mes_SC` char(2) NOT NULL,
  `Año_SC` char(4) NOT NULL,
  `Observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pacientes` (`ID_PACIENTES`, `Nombre_P`, `AP_P`, `AM_P`, `Escolaridad`, `Genero`, `Dia_N`, `Mes_N`, `Año_N`, `Calle_P`, `Num_P`, `Col_P`, `Ciudad`, `Estado`, `Telefono`, `Correo`, `Historial_P`, `Dia_C`, `Mes_C`, `Año_C`, `Dia_SC`, `Mes_SC`, `Año_SC`, `Observaciones`) VALUES
(1, 'Pedro Esteban', 'Magaña', 'Negrete', 'Licenciatura', 'M', '10', '04', '1995', 'Datiles', '#5', 'Villas del Palmar', 'Ciudad Guzman', 'Jalisco', '3411218270', 'pedro.campeon.jal@hotmail.com', '', '14', '10', '2019', '14', '11', '2019', 'Este paciente trabaja 8 horas diarias en el tecnologico, asi que por lo tanto no tiene facilidad para desayunar'),
(2, 'Pacho', 'Perez', 'Lopez', 'Preparatoria', 'M', '20', '08', '2000', 'Zapo', 'interior, 20', 'centro', 'Tuxpan', 'Jalisco', '3411000754', 'Paco_Loco@hotmail.com', 'sufre de sobre peso', '15', '10', '2019', '15', '12', '2019', 'este paciente sugfre de sobre peso y ademas es diabetico, hipertenso, etc.');

CREATE TABLE `perimetros` (
  `ID_PACIENTES` int(11) NOT NULL,
  `ID_PERIMETROS` int(11) NOT NULL,
  `Cefalico` float NOT NULL,
  `Cuello` float NOT NULL,
  `Brazo_Relajado` float NOT NULL,
  `Brazo_Contraido` float NOT NULL,
  `Antebrazo` float NOT NULL,
  `Muñeca` float NOT NULL,
  `Meseoesternal` float NOT NULL,
  `Umbilical` float NOT NULL,
  `Cintura` float NOT NULL,
  `Caderas` float NOT NULL,
  `Muslo` float NOT NULL,
  `Muslo_Medio` float NOT NULL,
  `Pantorrilla` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `perimetros` (`ID_PACIENTES`, `ID_PERIMETROS`, `Cefalico`, `Cuello`, `Brazo_Relajado`, `Brazo_Contraido`, `Antebrazo`, `Muñeca`, `Meseoesternal`, `Umbilical`, `Cintura`, `Caderas`, `Muslo`, `Muslo_Medio`, `Pantorrilla`) VALUES
(2, 1, 1.6, 5.5, 2.3, 1.2, 5.63, 12.3, 12.3, 5, 20.63, 15, 10, 8, 4);

CREATE TABLE `plan_alimenticio` (
  `ID_PACIENTES` int(11) NOT NULL,
  `ID_PLAN` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `plan_alimenticio` (`ID_PACIENTES`, `ID_PLAN`, `Descripcion`) VALUES
(1, 1, 'El Plan alimenticio para este paciente esta enfocado en reducir las calorias que consume a la semana para asi poder lograr su meta de bajar de peso');

CREATE TABLE `platillos` (
  `ID_PLATILLOS` int(255) NOT NULL,
  `Nombre_Pla` varchar(255) NOT NULL,
  `Energia_Kal_Pla` float NOT NULL,
  `Lipidos_Pla` float NOT NULL,
  `Proteinas_Pla` float NOT NULL,
  `Hidratos_Carbono_Pla` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `platillos` (`ID_PLATILLOS`, `Nombre_Pla`, `Energia_Kal_Pla`, `Lipidos_Pla`, `Proteinas_Pla`, `Hidratos_Carbono_Pla`) VALUES
(1, 'Cereal', 270.5, 11.5, 8.8, 39.5),
(2, 'Chilaquiles', 270, 10, 9.5, 34),
(3, 'Pollo a la Plancha', 247.5, 17.5, 21, 0);

CREATE TABLE `pliegues` (
  `ID_PACIENTES` int(11) NOT NULL,
  `ID_PLIEGUES` int(11) NOT NULL,
  `Subescapular` int(2) NOT NULL,
  `Triceps` int(2) NOT NULL,
  `Biceps` int(2) NOT NULL,
  `Ileocrestal` int(2) NOT NULL,
  `Suprailiaco` int(2) NOT NULL,
  `Abdominal` int(2) NOT NULL,
  `muslo_Frontal` int(2) NOT NULL,
  `Pantorrilla_Medial` int(2) NOT NULL,
  `Axiliar_Medial` int(2) NOT NULL,
  `Pectoral` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pliegues` (`ID_PACIENTES`, `ID_PLIEGUES`, `Subescapular`, `Triceps`, `Biceps`, `Ileocrestal`, `Suprailiaco`, `Abdominal`, `muslo_Frontal`, `Pantorrilla_Medial`, `Axiliar_Medial`, `Pectoral`) VALUES
(1, 1, 223, 0, 3, 10, 51, 21, 12, 21, 21, 145);

CREATE TABLE `preparacion` (
  `ID_PREPARACION` int(255) NOT NULL,
  `ID_PLATILLOS` int(255) NOT NULL,
  `ID_ALIMENTOS` int(255) NOT NULL,
  `Cantidad_Pre` varchar(255) NOT NULL,
  `Unidad_Pre` varchar(255) NOT NULL,
  `Tipos_Pre` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `preparacion` (`ID_PREPARACION`, `ID_PLATILLOS`, `ID_ALIMENTOS`, `Cantidad_Pre`, `Unidad_Pre`, `Tipos_Pre`) VALUES
(3, 1, 1, '2', 'Piezas', 'A'),
(3, 1, 2, '1', 'Cucharadita', 'A'),
(3, 1, 3, '1', 'pieza', 'A'),
(3, 1, 4, '1/2', 'Pieza', 'A'),
(3, 1, 5, '2', 'Piezas', 'C'),
(3, 1, 6, '1/2', 'Taza', 'P'),
(3, 1, 7, '1', 'Taza', 'C');

CREATE TABLE `tiempo_comida` (
  `ID_TIEMPO` int(5) NOT NULL,
  `Nombre_Tiempo` varchar(15) NOT NULL,
  `Hora_Tiempo` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tiempo_comida` (`ID_TIEMPO`, `Nombre_Tiempo`, `Hora_Tiempo`) VALUES
(1, 'Desayuno', '09:00:00.000000'),
(2, 'Colacion', '11:30:00.000000'),
(3, 'Comida', '03:00:00.000000'),
(4, 'Colacion', '06:00:00.000000'),
(5, 'Cena', '09:00:00.000000');

ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`ID_ALIMENTOS`),
  ADD KEY `fk_Alimentos_Grupos_Ali` (`ID_GRUPOS`);

ALTER TABLE `bioimpedancia`
  ADD PRIMARY KEY (`ID_BIOIMPEDANCIA`,`ID_PACIENTES`) USING BTREE,
  ADD KEY `fk_Bioimpedancia_Pacientes` (`ID_PACIENTES`);

ALTER TABLE `estilo_vida`
  ADD PRIMARY KEY (`ID_ESTILO_VIDA`,`ID_PACIENTES`),
  ADD KEY `fk_Estilo_V_Pacientes` (`ID_PACIENTES`);

ALTER TABLE `grupos_ali`
  ADD PRIMARY KEY (`ID_GRUPOS`);

ALTER TABLE `habitos_toxicos`
  ADD PRIMARY KEY (`ID_TOXICO`,`ID_PACIENTES`),
  ADD KEY `fk_Toxico_Pacientes` (`ID_PACIENTES`);

ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`ID_HISTORIA_CLI`,`ID_PACIENTES`),
  ADD KEY `fk_Historia_Cli_Pacientes` (`ID_PACIENTES`);
Indices de la tabla `mediciones_basicas`

ALTER TABLE `mediciones_basicas`
  ADD PRIMARY KEY (`ID_MEDICIONES_B`,`ID_PACIENTES`) USING BTREE,
  ADD KEY `fk_Mediciones_Pacientes` (`ID_PACIENTES`);

ALTER TABLE `menus`
  ADD PRIMARY KEY (`ID_MENU`,`ID_PLATILLOS`) USING BTREE,
  ADD KEY `fk_Menus_Tiempos_Comida` (`ID_TIEMPO`),
  ADD KEY `fk_Menus_Pacientes` (`ID_PACIENTES`),
  ADD KEY `fk_Menus_Platillos` (`ID_PLATILLOS`);

ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`ID_PACIENTES`);

ALTER TABLE `perimetros`
  ADD PRIMARY KEY (`ID_PERIMETROS`,`ID_PACIENTES`) USING BTREE,
  ADD KEY `fk_Perimetros_Pacientes` (`ID_PACIENTES`);

ALTER TABLE `plan_alimenticio`
  ADD PRIMARY KEY (`ID_PLAN`,`ID_PACIENTES`) USING BTREE,
  ADD KEY `fk_Plan_Ali_Pacientes` (`ID_PACIENTES`);

ALTER TABLE `platillos`
  ADD PRIMARY KEY (`ID_PLATILLOS`);

ALTER TABLE `pliegues`
  ADD PRIMARY KEY (`ID_PLIEGUES`,`ID_PACIENTES`) USING BTREE,
  ADD KEY `fk_Pliegues_Pacientes` (`ID_PACIENTES`);

ALTER TABLE `preparacion`
  ADD PRIMARY KEY (`ID_PREPARACION`,`ID_PLATILLOS`,`ID_ALIMENTOS`),
  ADD KEY `fk_Preparacion_Alimentos` (`ID_ALIMENTOS`),
  ADD KEY `fk_Preparacion_Platillos` (`ID_PLATILLOS`);

ALTER TABLE `tiempo_comida`
  ADD PRIMARY KEY (`ID_TIEMPO`);

ALTER TABLE `alimentos`
  MODIFY `ID_ALIMENTOS` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `bioimpedancia`
  MODIFY `ID_BIOIMPEDANCIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `estilo_vida`
  MODIFY `ID_ESTILO_VIDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `grupos_ali`
  MODIFY `ID_GRUPOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `habitos_toxicos`
  MODIFY `ID_TOXICO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `historia_clinica`
  MODIFY `ID_HISTORIA_CLI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `mediciones_basicas`
  MODIFY `ID_MEDICIONES_B` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `menus`
  MODIFY `ID_MENU` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `pacientes`
  MODIFY `ID_PACIENTES` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `perimetros`
  MODIFY `ID_PERIMETROS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `plan_alimenticio`
  MODIFY `ID_PLAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `platillos`
  MODIFY `ID_PLATILLOS` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `pliegues`
  MODIFY `ID_PLIEGUES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `preparacion`
  MODIFY `ID_PREPARACION` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `tiempo_comida`
  MODIFY `ID_TIEMPO` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `alimentos`
  ADD CONSTRAINT `fk_Alimentos_Grupos_Ali` FOREIGN KEY (`ID_GRUPOS`) REFERENCES `grupos_ali` (`ID_GRUPOS`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `bioimpedancia`
  ADD CONSTRAINT `fk_Bioimpedancia_Pacientes` FOREIGN KEY (`ID_PACIENTES`) REFERENCES `pacientes` (`ID_PACIENTES`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `estilo_vida`
  ADD CONSTRAINT `fk_Estilo_V_Pacientes` FOREIGN KEY (`ID_PACIENTES`) REFERENCES `pacientes` (`ID_PACIENTES`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `habitos_toxicos`
  ADD CONSTRAINT `fk_Toxico_Pacientes` FOREIGN KEY (`ID_PACIENTES`) REFERENCES `pacientes` (`ID_PACIENTES`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `fk_Historia_Cli_Pacientes` FOREIGN KEY (`ID_PACIENTES`) REFERENCES `pacientes` (`ID_PACIENTES`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `mediciones_basicas`
  ADD CONSTRAINT `fk_Mediciones_Pacientes` FOREIGN KEY (`ID_PACIENTES`) REFERENCES `pacientes` (`ID_PACIENTES`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `menus`
  ADD CONSTRAINT `fk_Menus_Pacientes` FOREIGN KEY (`ID_PACIENTES`) REFERENCES `pacientes` (`ID_PACIENTES`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Menus_Platillos` FOREIGN KEY (`ID_PLATILLOS`) REFERENCES `platillos` (`ID_PLATILLOS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Menus_Tiempos_Comida` FOREIGN KEY (`ID_TIEMPO`) REFERENCES `tiempo_comida` (`ID_TIEMPO`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `perimetros`
  ADD CONSTRAINT `fk_Perimetros_Pacientes` FOREIGN KEY (`ID_PACIENTES`) REFERENCES `pacientes` (`ID_PACIENTES`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `plan_alimenticio`
  ADD CONSTRAINT `fk_Plan_Ali_Pacientes` FOREIGN KEY (`ID_PACIENTES`) REFERENCES `pacientes` (`ID_PACIENTES`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pliegues`
  ADD CONSTRAINT `fk_Pliegues_Pacientes` FOREIGN KEY (`ID_PACIENTES`) REFERENCES `pacientes` (`ID_PACIENTES`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `preparacion`
  ADD CONSTRAINT `fk_Preparacion_Alimentos` FOREIGN KEY (`ID_ALIMENTOS`) REFERENCES `alimentos` (`ID_ALIMENTOS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Preparacion_Platillos` FOREIGN KEY (`ID_PLATILLOS`) REFERENCES `platillos` (`ID_PLATILLOS`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

-- ACTUALIZACIONES

ALTER TABLE pacientes CHANGE Año_N Anio_N char(4);
ALTER TABLE pacientes CHANGE Año_C Anio_C char(4);
ALTER TABLE pacientes CHANGE Año_SC Anio_SC char(4);
ALTER TABLE perimetros CHANGE Muñeca Muneca float;

