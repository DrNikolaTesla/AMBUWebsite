-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2021 a las 00:13:11
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
create database ambu;

use ambu;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afectacionlluvia`
--

CREATE TABLE `afectacionlluvia` (
                                    `idReporte` int(11) NOT NULL,
                                    `IdUsuario` int(11) NOT NULL,
                                    `idBosque` int(11) NOT NULL,
                                    `fechaRepo` date NOT NULL,
                                    `horaRepo` time NOT NULL,
                                    `municipo` varchar(250) NOT NULL,
                                    `obstruye` bit(1) NOT NULL,
                                    `riesgoElec` bit(1) NOT NULL,
                                    `riesgoCai` bit(1) NOT NULL,
                                    `arbolCai` bit(1) NOT NULL,
                                    `arbolDana` bit(1) NOT NULL,
                                    `arbolFractu` bit(1) NOT NULL,
                                    `ramaCai` bit(1) NOT NULL,
                                    `descripcion` varchar(250) NOT NULL,
                                    `activo` int(11) NOT NULL DEFAULT 1 COMMENT '1 = activo\r\n0= inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aforo`
--

CREATE TABLE `aforo` (
                         `idReporte` int(11) NOT NULL,
                         `idBosque` int(11) NOT NULL,
                         `idUsuario` int(11) NOT NULL,
                         `fecha` date NOT NULL,
                         `personas` int(11) NOT NULL,
                         `activo` int(11) NOT NULL DEFAULT 1 COMMENT '1 = activo\r\n0= inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bosques`
--

CREATE TABLE `bosques` (
                           `idBosque` int(11) NOT NULL,
                           `NombreBosque` varchar(40) NOT NULL,
                           `Nomenclatura` varchar(10) NOT NULL,
                           `Direccion` varchar(255) DEFAULT NULL,
                           `Zona` int(10) NOT NULL,
                           `activo` int(10) NOT NULL DEFAULT 1,
                           `supervisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bosques`
--

INSERT INTO `bosques` (`idBosque`, `NombreBosque`, `Nomenclatura`, `Direccion`, `Zona`, `activo`, `supervisor`) VALUES
(1, 'Bosque los Colomos', 'BLC', 'C. El Chaco 3200, Providencia, 44630 Guadalajara, Jal.', 1, 1, 1),
(2, 'Parque Alcalde', 'PAC', 'C. Jesús García s/n, Alcalde Barranquitas, 44270 Guadalajara, Jal.', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bosque_usuario`
--

CREATE TABLE `bosque_usuario` (
                                  `idBosqueUsuario` int(11) NOT NULL,
                                  `idUsuario` int(11) NOT NULL,
                                  `idBosque` int(11) NOT NULL,
                                  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bosque_usuario`
--

INSERT INTO `bosque_usuario` (`idBosqueUsuario`, `idUsuario`, `idBosque`, `activo`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(4, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comerciantes`
--

CREATE TABLE `comerciantes` (
                                `idReporte` int(11) NOT NULL,
                                `idBosque` int(11) NOT NULL,
                                `idUsuario` int(11) NOT NULL,
                                `fechaRepo` date NOT NULL,
                                `horaRepo` time NOT NULL,
                                `nombreComer` varchar(250) NOT NULL,
                                `actividadComercial` varchar(250) NOT NULL,
                                `permiso` bit(1) NOT NULL COMMENT '1 = si\r\n0= no',
                                `sanitizacion` bit(1) NOT NULL,
                                `barraProte` bit(1) NOT NULL,
                                `filaDistan` bit(1) NOT NULL,
                                `gel` bit(1) NOT NULL,
                                `mercanciaPerm` bit(1) NOT NULL,
                                `ubicacion` varchar(250) NOT NULL,
                                `descripcion` varchar(250) NOT NULL,
                                `activo` int(11) NOT NULL DEFAULT 1 COMMENT '1= activo\r\n0=inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fauna`
--

CREATE TABLE `fauna` (
                         `idReporte` int(11) NOT NULL,
                         `IdUsuario` int(11) NOT NULL,
                         `idBosque` int(11) NOT NULL,
                         `fechaRepo` date NOT NULL,
                         `horaRepo` time NOT NULL,
                         `TipoFauna` varchar(250) NOT NULL,
                         `agresiva` bit(1) NOT NULL,
                         `resguardo` varchar(250) NOT NULL,
                         `heridasVisi` bit(1) NOT NULL,
                         `descripcion` varchar(250) NOT NULL,
                         `municipio` varchar(250) NOT NULL,
                         `activo` int(11) NOT NULL COMMENT '1 = activo\r\n0= inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forestal`
--

CREATE TABLE `forestal` (
                            `idReporte` int(11) NOT NULL,
                            `IdUsuario` int(11) NOT NULL,
                            `idBosque` int(11) NOT NULL,
                            `fechaRepo` date NOT NULL,
                            `horaRepo` time NOT NULL,
                            `municipio` varchar(250) NOT NULL,
                            `obstruye` bit(1) NOT NULL,
                            `riesgoElec` bit(1) NOT NULL,
                            `riesgoCai` bit(1) NOT NULL,
                            `arbolCai` bit(1) NOT NULL,
                            `arbolDana` bit(1) NOT NULL,
                            `arbolRama` bit(1) NOT NULL,
                            `ramaCai` bit(1) NOT NULL,
                            `descripcion` varchar(250) NOT NULL,
                            `activo` int(11) NOT NULL DEFAULT 1 COMMENT '1 = activo\r\n0= inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incendios`
--

CREATE TABLE `incendios` (
                             `idReporte` int(11) NOT NULL,
                             `IdUsuario` int(11) NOT NULL,
                             `idBosque` int(11) NOT NULL,
                             `fechaRepo` time NOT NULL,
                             `horaRepo` time NOT NULL,
                             `municipio` varchar(250) NOT NULL,
                             `horaIncen` time NOT NULL,
                             `tipoServi` varchar(250) NOT NULL,
                             `mediaFilia` varchar(250) NOT NULL,
                             `descripcion` varchar(250) NOT NULL,
                             `llamadaAviso` varchar(250) NOT NULL,
                             `horaAviso` time NOT NULL,
                             `activo` int(11) NOT NULL DEFAULT 1 COMMENT '1 = activo\r\n0= inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportediario`
--

CREATE TABLE `reportediario` (
                                 `idReporteDia` int(100) NOT NULL,
                                 `idBosque` int(100) NOT NULL,
                                 `idUsuario` int(100) NOT NULL,
                                 `fechaReali` date NOT NULL,
                                 `horaReali` time NOT NULL,
                                 `andadores1` bit(1) NOT NULL COMMENT '1 = cumple \r\n0 = no cumple',
                                 `areasVerdes1` bit(1) NOT NULL,
                                 `areaPergolas1` bit(1) NOT NULL,
                                 `fuentes1` bit(1) NOT NULL,
                                 `andadores2` bit(1) NOT NULL,
                                 `areasVerdes2` bit(1) NOT NULL,
                                 `areaPergolas2` bit(1) NOT NULL,
                                 `fuentes2` bit(1) NOT NULL,
                                 `andadores3` bit(1) NOT NULL,
                                 `areasVerdes3` bit(1) NOT NULL,
                                 `areaPergolas3` bit(1) NOT NULL,
                                 `fuentes3` bit(1) NOT NULL,
                                 `activo` int(11) NOT NULL DEFAULT 1 COMMENT '1 = activo\r\n0= inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportediario`
--

INSERT INTO `reportediario` (`idReporteDia`, `idBosque`, `idUsuario`, `fechaReali`, `horaReali`, `andadores1`, `areasVerdes1`, `areaPergolas1`, `fuentes1`, `andadores2`, `areasVerdes2`, `areaPergolas2`, `fuentes2`, `andadores3`, `areasVerdes3`, `areaPergolas3`, `fuentes3`, `activo`) VALUES
(2, 1, 1, '2021-11-02', '01:21:13', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'0', b'0', b'0', b'0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportesurgentes`
--

CREATE TABLE `reportesurgentes` (
                                    `idReporteUr` int(11) NOT NULL,
                                    `IdUsuario` int(11) NOT NULL,
                                    `idBosque` int(11) NOT NULL,
                                    `incidencia` varchar(512) NOT NULL,
                                    `fecha` date NOT NULL,
                                    `hora` time NOT NULL DEFAULT current_timestamp(),
                                    `resuelto` varchar(20) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportesurgentes`
--

INSERT INTO `reportesurgentes` (`idReporteUr`, `IdUsuario`, `idBosque`, `incidencia`, `fecha`, `hora`, `resuelto`) VALUES
(1, 1, 2, 'Se cayo un arbol', '2021-11-10', '00:00:00', 'NO'),
(2, 1, 1, 'se metieron a robar', '2021-11-27', '02:38:22', 'NO'),
(3, 1, 1, 'se metieron a robar', '2021-11-27', '03:08:52', 'NO'),
(6, 1, 1, 'se metieron a robar', '2021-11-27', '03:34:50', 'NO'),
(12, 1, 1, 'banca rota', '2021-11-27', '15:56:51', 'NO'),
(13, 1, 2, 'banca rota 4', '2021-11-27', '15:58:13', 'NO'),
(14, 1, 2, 'banca rota 20', '2021-11-27', '15:59:49', 'NO'),
(15, 1, 1, 'banca rota 22', '2021-11-27', '16:00:15', 'NO'),
(16, 1, 2, 'se metieron a robar 20', '2021-11-27', '16:54:58', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reposeguridad`
--

CREATE TABLE `reposeguridad` (
                                 `idReporte` int(50) NOT NULL,
                                 `idBosque` int(11) NOT NULL,
                                 `idUsuario` int(11) NOT NULL,
                                 `fecha` date NOT NULL,
                                 `horaInci` time NOT NULL,
                                 `horaReali` time NOT NULL,
                                 `actividadPer` varchar(250) DEFAULT NULL,
                                 `tipoArma` varchar(250) DEFAULT NULL,
                                 `transporte` varchar(250) DEFAULT NULL,
                                 `observaciones` varchar(250) NOT NULL,
                                 `aviso` varchar(20) NOT NULL,
                                 `hraAviso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reposeguridad`
--

INSERT INTO `reposeguridad` (`idReporte`, `idBosque`, `idUsuario`, `fecha`, `horaInci`, `horaReali`, `actividadPer`, `tipoArma`, `transporte`, `observaciones`, `aviso`, `hraAviso`) VALUES
(1, 1, 1, '2021-11-05', '07:30:00', '21:46:49', 'cero', '-', '-', '-', 'juan', '07:32:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacioncalle`
--

CREATE TABLE `situacioncalle` (
                                  `idReporte` int(11) NOT NULL,
                                  `idBosque` int(11) NOT NULL,
                                  `idUsuario` int(11) NOT NULL,
                                  `fechaRepo` date NOT NULL,
                                  `horaRepo` time NOT NULL,
                                  `municipio` varchar(250) NOT NULL,
                                  `ubicacionExacta` varchar(250) NOT NULL,
                                  `covid` bit(1) NOT NULL,
                                  `diabetes` bit(1) NOT NULL,
                                  `hipertension` bit(1) NOT NULL,
                                  `cirrosis` bit(1) NOT NULL,
                                  `desconoce` bit(1) NOT NULL,
                                  `genero` bit(1) NOT NULL COMMENT '1= masculino\r\n0= femenino',
                                  `caracteristicas` varchar(250) NOT NULL,
                                  `observaciones` varchar(250) NOT NULL,
                                  `activo` int(11) NOT NULL DEFAULT 1 COMMENT '1 = activo\r\n0= inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
                            `idUsuario` int(11) NOT NULL,
                            `Nombre` varchar(40) NOT NULL,
                            `Apellidos` varchar(40) NOT NULL,
                            `NombreUsuario` varchar(20) NOT NULL,
                            `Password` varchar(255) NOT NULL,
                            `CategoriaUs` int(10) NOT NULL DEFAULT 5 COMMENT '1=consultas y captura\r\n2= modificacion y consultas.\r\n3= captura y modificacion.\r\n4= captura\r\n5= todos',
                            `Activo` int(11) NOT NULL DEFAULT 1 COMMENT '1 si el usario esta activo\r\n0 si se quiere eliminar el usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `Apellidos`, `NombreUsuario`, `Password`, `CategoriaUs`, `Activo`) VALUES
(1, 'admin', 'admin admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 5, 1),
(2, 'juan', 'pedro', 'juan@juan', 'a94652aa97c7211ba8954dd15a3cf838', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afectacionlluvia`
--
ALTER TABLE `afectacionlluvia`
    ADD PRIMARY KEY (`idReporte`),
    ADD KEY `IdUsuario` (`IdUsuario`),
    ADD KEY `idBosque` (`idBosque`);

--
-- Indices de la tabla `aforo`
--
ALTER TABLE `aforo`
    ADD PRIMARY KEY (`idReporte`),
    ADD KEY `idUsuario` (`idUsuario`),
    ADD KEY `idBosque` (`idBosque`);

--
-- Indices de la tabla `bosques`
--
ALTER TABLE `bosques`
    ADD PRIMARY KEY (`idBosque`);

--
-- Indices de la tabla `bosque_usuario`
--
ALTER TABLE `bosque_usuario`
    ADD PRIMARY KEY (`idBosqueUsuario`);

--
-- Indices de la tabla `comerciantes`
--
ALTER TABLE `comerciantes`
    ADD PRIMARY KEY (`idReporte`),
    ADD KEY `idUsuario` (`idUsuario`),
    ADD KEY `idBosque` (`idBosque`);

--
-- Indices de la tabla `fauna`
--
ALTER TABLE `fauna`
    ADD PRIMARY KEY (`idReporte`),
    ADD KEY `IdUsuario` (`IdUsuario`),
    ADD KEY `idBosque` (`idBosque`);

--
-- Indices de la tabla `forestal`
--
ALTER TABLE `forestal`
    ADD PRIMARY KEY (`idReporte`),
    ADD KEY `IdUsuario` (`IdUsuario`),
    ADD KEY `idBosque` (`idBosque`);

--
-- Indices de la tabla `incendios`
--
ALTER TABLE `incendios`
    ADD PRIMARY KEY (`idReporte`),
    ADD KEY `IdUsuario` (`IdUsuario`),
    ADD KEY `idBosque` (`idBosque`);

--
-- Indices de la tabla `reportediario`
--
ALTER TABLE `reportediario`
    ADD PRIMARY KEY (`idReporteDia`),
    ADD KEY `idUsuario` (`idUsuario`),
    ADD KEY `idBosque` (`idBosque`);

--
-- Indices de la tabla `reportesurgentes`
--
ALTER TABLE `reportesurgentes`
    ADD PRIMARY KEY (`idReporteUr`),
    ADD KEY `IdUsuario` (`IdUsuario`),
    ADD KEY `idBosque` (`idBosque`);

--
-- Indices de la tabla `reposeguridad`
--
ALTER TABLE `reposeguridad`
    ADD PRIMARY KEY (`idReporte`),
    ADD KEY `idBosque` (`idBosque`),
    ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `situacioncalle`
--
ALTER TABLE `situacioncalle`
    ADD PRIMARY KEY (`idReporte`),
    ADD KEY `idUsuario` (`idUsuario`),
    ADD KEY `idBosque` (`idBosque`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afectacionlluvia`
--
ALTER TABLE `afectacionlluvia`
    MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aforo`
--
ALTER TABLE `aforo`
    MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bosques`
--
ALTER TABLE `bosques`
    MODIFY `idBosque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bosque_usuario`
--
ALTER TABLE `bosque_usuario`
    MODIFY `idBosqueUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comerciantes`
--
ALTER TABLE `comerciantes`
    MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fauna`
--
ALTER TABLE `fauna`
    MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forestal`
--
ALTER TABLE `forestal`
    MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incendios`
--
ALTER TABLE `incendios`
    MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportediario`
--
ALTER TABLE `reportediario`
    MODIFY `idReporteDia` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reportesurgentes`
--
ALTER TABLE `reportesurgentes`
    MODIFY `idReporteUr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `reposeguridad`
--
ALTER TABLE `reposeguridad`
    MODIFY `idReporte` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `situacioncalle`
--
ALTER TABLE `situacioncalle`
    MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afectacionlluvia`
--
ALTER TABLE `afectacionlluvia`
    ADD CONSTRAINT `afectacionlluvia_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`idUsuario`),
    ADD CONSTRAINT `afectacionlluvia_ibfk_2` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`);

--
-- Filtros para la tabla `aforo`
--
ALTER TABLE `aforo`
    ADD CONSTRAINT `aforo_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
    ADD CONSTRAINT `aforo_ibfk_2` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`);

--
-- Filtros para la tabla `comerciantes`
--
ALTER TABLE `comerciantes`
    ADD CONSTRAINT `comerciantes_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
    ADD CONSTRAINT `comerciantes_ibfk_2` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`);

--
-- Filtros para la tabla `fauna`
--
ALTER TABLE `fauna`
    ADD CONSTRAINT `fauna_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`idUsuario`),
    ADD CONSTRAINT `fauna_ibfk_2` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`);

--
-- Filtros para la tabla `forestal`
--
ALTER TABLE `forestal`
    ADD CONSTRAINT `forestal_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`idUsuario`),
    ADD CONSTRAINT `forestal_ibfk_2` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`);

--
-- Filtros para la tabla `incendios`
--
ALTER TABLE `incendios`
    ADD CONSTRAINT `incendios_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`idUsuario`),
    ADD CONSTRAINT `incendios_ibfk_2` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`);

--
-- Filtros para la tabla `reportediario`
--
ALTER TABLE `reportediario`
    ADD CONSTRAINT `reportediario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
    ADD CONSTRAINT `reportediario_ibfk_2` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`);

--
-- Filtros para la tabla `reportesurgentes`
--
ALTER TABLE `reportesurgentes`
    ADD CONSTRAINT `reportesurgentes_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`idUsuario`),
    ADD CONSTRAINT `reportesurgentes_ibfk_2` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`);

--
-- Filtros para la tabla `reposeguridad`
--
ALTER TABLE `reposeguridad`
    ADD CONSTRAINT `reposeguridad_ibfk_1` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`),
    ADD CONSTRAINT `reposeguridad_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `situacioncalle`
--
ALTER TABLE `situacioncalle`
    ADD CONSTRAINT `situacioncalle_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
    ADD CONSTRAINT `situacioncalle_ibfk_2` FOREIGN KEY (`idBosque`) REFERENCES `bosques` (`idBosque`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
