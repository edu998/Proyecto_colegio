-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-11-2020 a las 15:43:21
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_colegio`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `Add_control`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_control` (IN `_pago_id` INT(255), IN `_status` VARCHAR(100))  BEGIN
    INSERT INTO control_pago VALUES(null, _pago_id, _status, CURDATE(), CURDATE());
END$$

DROP PROCEDURE IF EXISTS `Add_det_mat_prof`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_det_mat_prof` (`_usuario_id` INT(255), `_materia_id` INT(255), `_nivel_id` INT(255), `_seccion` VARCHAR(50), `_horario_id` INT(255), `_dia` VARCHAR(50))  BEGIN
    INSERT INTO det_mat_prof VALUES(null, _usuario_id, _materia_id, _nivel_id, _seccion, _horario_id, _dia);
END$$

DROP PROCEDURE IF EXISTS `Add_estudiante`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_estudiante` (`_cedula` VARCHAR(12), `_nivel_id` INT(255), `_primer_nombre` VARCHAR(150), `_segundo_nombre` VARCHAR(150), `_primer_apellido` VARCHAR(150), `_segundo_apellido` VARCHAR(150), `_telefono_celular` VARCHAR(100), `_email` VARCHAR(150), `_sexo` VARCHAR(150), `_direccion` TEXT)  BEGIN
    INSERT INTO estudiante VALUES(null, _cedula, _nivel_id, _primer_nombre, _segundo_nombre, _primer_apellido, _segundo_apellido, _telefono_celular, _email, _sexo, _direccion);
END$$

DROP PROCEDURE IF EXISTS `Add_horario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_horario` (`_horario_desde` TIME, `_horario_hasta` TIME)  BEGIN
    INSERT INTO horario VALUES(null, _horario_desde, _horario_hasta);
END$$

DROP PROCEDURE IF EXISTS `Add_inscripcion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_inscripcion` (IN `_estudiante_id` INT(255), IN `_status` VARCHAR(100))  BEGIN
    INSERT INTO inscripcion VALUES(null, _estudiante_id, _status);
END$$

DROP PROCEDURE IF EXISTS `Add_materia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_materia` (`_nombre` VARCHAR(100))  BEGIN
    INSERT INTO materia VALUES(null, _nombre);
END$$

DROP PROCEDURE IF EXISTS `Add_nivel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_nivel` (IN `_nombre` VARCHAR(150), IN `_tipo` VARCHAR(100), IN `_numero_tipo` VARCHAR(150))  BEGIN
    INSERT INTO nivel VALUES(null, _nombre, _tipo, _numero_tipo);
END$$

DROP PROCEDURE IF EXISTS `Add_nota`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_nota` (`_usuario_id` INT(255), `_estudiante_id` INT(255), `_materia_id` INT(255), `_primera_nota` VARCHAR(120), `_segunda_nota` VARCHAR(120), `_tercera_nota` VARCHAR(120), `_cuarta_nota` VARCHAR(120))  BEGIN
    INSERT INTO nota VALUES(null, _usuario_id, _estudiante_id, _materia_id, _primera_nota, _segunda_nota, _tercera_nota, _cuarta_nota);
END$$

DROP PROCEDURE IF EXISTS `Add_pago`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_pago` (IN `_estudiante_id` INT(255), IN `_tipo_pago` VARCHAR(200), IN `_descripcion` TEXT, IN `_nombre_pago` VARCHAR(50), IN `_transferencia` VARCHAR(100))  BEGIN
    INSERT INTO pago VALUES(null, _estudiante_id, _tipo_pago, _descripcion, _nombre_pago, _transferencia, CURDATE(), CURDATE());
END$$

DROP PROCEDURE IF EXISTS `Add_seccion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_seccion` (`_estudiante_id` INT(255), `_nombre_seccion` VARCHAR(100))  BEGIN
    INSERT INTO seccion VALUES(null, _estudiante_id, _nombre_seccion);
END$$

DROP PROCEDURE IF EXISTS `Add_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_usuario` (`_cedula` VARCHAR(12), `_role` VARCHAR(15), `_primer_nombre` VARCHAR(150), `_segundo_nombre` VARCHAR(150), `_primer_apellido` VARCHAR(150), `_segundo_apellido` VARCHAR(150), `_telefono_celular` VARCHAR(100), `_email` VARCHAR(150), `_sexo` VARCHAR(150), `_direccion` TEXT)  BEGIN
    INSERT INTO usuario VALUES(null, _cedula, _role, _primer_nombre, _segundo_nombre, _primer_apellido, _segundo_apellido, _telefono_celular, _email, _sexo, _direccion);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_delete`
--

DROP TABLE IF EXISTS `control_delete`;
CREATE TABLE IF NOT EXISTS `control_delete` (
  `id` int(255) DEFAULT NULL,
  `pago_id` int(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_delete`
--

INSERT INTO `control_delete` (`id`, `pago_id`, `status`, `usuario`, `deleted_at`) VALUES
(11, 1, 'No ha Pagado', 'root@localhost', '2020-10-27 17:14:31'),
(13, 3, 'No ha Pagado', 'root@localhost', '2020-10-27 17:17:47'),
(12, 2, 'Ya Pago', 'root@localhost', '2020-10-27 17:17:55'),
(14, 4, 'No ha Pagado', 'root@localhost', '2020-10-27 17:51:08'),
(16, 6, 'Ya Pago', 'root@localhost', '2020-10-27 18:59:21'),
(17, 7, 'Ya Pago', 'root@localhost', '2020-10-27 18:59:23'),
(19, 10, 'No ha Pagado', 'root@localhost', '2020-10-27 19:08:32'),
(18, 8, 'Ya Pago', 'root@localhost', '2020-10-27 19:08:35'),
(27, 18, 'Ya Pago', 'root@localhost', '2020-10-30 23:16:07'),
(28, 19, 'Ya Pago', 'root@localhost', '2020-10-30 23:16:12'),
(29, 20, 'Ya Pago', 'root@localhost', '2020-10-30 23:16:15'),
(30, 21, 'Ya Pago', 'root@localhost', '2020-10-30 23:16:18'),
(15, 5, 'Ya Pago', 'root@localhost', '2020-11-05 16:24:17'),
(20, 11, 'Ya Pago', 'root@localhost', '2020-11-05 16:24:27'),
(25, 16, 'Ya Pago', 'root@localhost', '2020-11-05 17:23:08'),
(33, 24, 'Ya Pago', 'root@localhost', '2020-11-07 04:58:20'),
(35, 26, 'Ya Pago', 'root@localhost', '2020-11-07 16:44:07'),
(34, 25, 'Ya Pago', 'root@localhost', '2020-11-07 16:44:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_insert`
--

DROP TABLE IF EXISTS `control_insert`;
CREATE TABLE IF NOT EXISTS `control_insert` (
  `id` int(255) DEFAULT NULL,
  `pago_id` int(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_insert`
--

INSERT INTO `control_insert` (`id`, `pago_id`, `status`, `usuario`, `created_at`) VALUES
(11, 1, 'No ha Pagado', 'root@localhost', '2020-10-27 17:12:44'),
(12, 2, 'Ya Pago', 'root@localhost', '2020-10-27 17:16:06'),
(13, 3, 'No ha Pagado', 'root@localhost', '2020-10-27 17:17:01'),
(14, 4, 'No ha Pagado', 'root@localhost', '2020-10-27 17:47:24'),
(15, 5, 'Ya Pago', 'root@localhost', '2020-10-27 18:55:52'),
(16, 6, 'Ya Pago', 'root@localhost', '2020-10-27 18:56:52'),
(17, 7, 'Ya Pago', 'root@localhost', '2020-10-27 18:58:09'),
(18, 8, 'Ya Pago', 'root@localhost', '2020-10-27 19:01:38'),
(19, 10, 'No ha Pagado', 'root@localhost', '2020-10-27 19:08:02'),
(20, 11, 'No ha Pagado', 'root@localhost', '2020-10-27 19:09:54'),
(21, 12, 'Ya Pago', 'root@localhost', '2020-10-27 19:12:41'),
(22, 13, 'No ha Pagado', 'root@localhost', '2020-10-27 19:13:20'),
(23, 14, 'Ya Pago', 'root@localhost', '2020-10-27 19:35:42'),
(24, 15, 'Ya Pago', 'root@localhost', '2020-10-27 22:55:36'),
(25, 16, 'Ya Pago', 'root@localhost', '2020-10-29 23:07:08'),
(26, 17, 'Ya Pago', 'root@localhost', '2020-10-30 00:13:12'),
(27, 18, 'Ya Pago', 'root@localhost', '2020-10-30 22:42:55'),
(28, 19, 'Ya Pago', 'root@localhost', '2020-10-30 22:44:30'),
(29, 20, 'Ya Pago', 'root@localhost', '2020-10-30 22:46:11'),
(30, 21, 'Ya Pago', 'root@localhost', '2020-10-30 22:47:37'),
(31, 22, 'Ya Pago', 'root@localhost', '2020-10-31 01:01:57'),
(32, 23, 'Ya Pago', 'root@localhost', '2020-11-02 14:37:04'),
(33, 24, 'No ha Pagado', 'root@localhost', '2020-11-06 19:32:56'),
(34, 25, 'No ha Pagado', 'root@localhost', '2020-11-07 16:41:42'),
(35, 26, 'Ya Pago', 'root@localhost', '2020-11-07 16:42:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_pago`
--

DROP TABLE IF EXISTS `control_pago`;
CREATE TABLE IF NOT EXISTS `control_pago` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pago_id` int(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_control_p_pago` (`pago_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_pago`
--

INSERT INTO `control_pago` (`id`, `pago_id`, `status`, `created_at`, `updated_at`) VALUES
(21, 12, 'Ya Pago', '2020-10-27', '2020-10-27'),
(22, 13, 'Ya Pago', '2020-10-27', '2020-10-27'),
(23, 14, 'Ya Pago', '2020-10-27', '2020-10-27'),
(24, 15, 'Ya Pago', '2020-10-27', '2020-10-27'),
(26, 17, 'Ya Pago', '2020-10-29', '2020-10-29'),
(31, 22, 'Ya Pago', '2020-10-30', '2020-10-30'),
(32, 23, 'Ya Pago', '2020-11-02', '2020-11-02');

--
-- Disparadores `control_pago`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_CONTROL_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_CONTROL_BU` BEFORE UPDATE ON `control_pago` FOR EACH ROW INSERT INTO control_update VALUES(OLD.id, OLD.pago_id, OLD.status, NEW.id, NEW.pago_id, NEW.status, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `CONTROL_AI`;
DELIMITER $$
CREATE TRIGGER `CONTROL_AI` AFTER INSERT ON `control_pago` FOR EACH ROW INSERT INTO control_insert VALUES(NEW.id, NEW.pago_id, NEW.status, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_CONTROL_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_CONTROL_AD` AFTER DELETE ON `control_pago` FOR EACH ROW INSERT INTO control_delete VALUES(OLD.id, OLD.pago_id, OLD.status, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_update`
--

DROP TABLE IF EXISTS `control_update`;
CREATE TABLE IF NOT EXISTS `control_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_pago_id` int(255) DEFAULT NULL,
  `anterior_status` varchar(100) DEFAULT NULL,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_pago_id` int(255) DEFAULT NULL,
  `nuevo_status` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_update`
--

INSERT INTO `control_update` (`anterior_id`, `anterior_pago_id`, `anterior_status`, `nuevo_id`, `nuevo_pago_id`, `nuevo_status`, `usuario`, `updated_at`) VALUES
(22, 13, 'No ha Pagado', 22, 13, 'Ya Pago', 'root@localhost', '2020-11-05 16:04:27'),
(20, 11, 'No ha Pagado', 20, 11, 'Ya Pago', 'root@localhost', '2020-11-05 16:05:08'),
(33, 24, 'No ha Pagado', 33, 24, 'Ya Pago', 'root@localhost', '2020-11-06 19:40:51'),
(34, 25, 'No ha Pagado', 34, 25, 'Ya Pago', 'root@localhost', '2020-11-07 16:42:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_delete`
--

DROP TABLE IF EXISTS `det_delete`;
CREATE TABLE IF NOT EXISTS `det_delete` (
  `id` int(255) DEFAULT NULL,
  `usuario_id` int(255) DEFAULT NULL,
  `materia_id` int(255) DEFAULT NULL,
  `nivel_id` int(255) DEFAULT NULL,
  `seccion` varchar(50) DEFAULT NULL,
  `horario_id` int(255) DEFAULT NULL,
  `dia` varchar(50) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_delete`
--

INSERT INTO `det_delete` (`id`, `usuario_id`, `materia_id`, `nivel_id`, `seccion`, `horario_id`, `dia`, `usuario`, `deleted_at`) VALUES
(1, 5, 6, 0, '0', 0, '', 'root@localhost', '2020-10-26 19:23:16'),
(2, 6, 9, 0, '0', 0, '', 'root@localhost', '2020-10-26 19:23:24'),
(3, 4, 8, 0, '0', 0, '', 'root@localhost', '2020-10-26 19:23:28'),
(6, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:52:18'),
(5, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:52:23'),
(4, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:52:29'),
(3, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:52:32'),
(2, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:52:34'),
(1, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:52:36'),
(7, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:59:34'),
(8, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:59:36'),
(10, 6, 9, 2, 'A', 5, 'Lunes', 'root@localhost', '2020-10-28 21:18:12'),
(14, 4, 5, 2, 'B', 4, 'Lunes', 'root@localhost', '2020-10-28 21:37:16'),
(15, 4, 9, 3, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 21:43:15'),
(16, 6, 7, 2, 'A', 5, 'Lunes', 'root@localhost', '2020-10-28 21:48:23'),
(17, 6, 7, 2, 'A', 6, 'Lunes', 'root@localhost', '2020-10-28 21:59:19'),
(18, 6, 5, 2, 'A', 9, 'Lunes', 'root@localhost', '2020-10-28 21:59:21'),
(19, 5, 3, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 21:59:55'),
(20, 5, 3, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 21:59:58'),
(21, 6, 3, 2, 'A', 9, 'Lunes', 'root@localhost', '2020-10-28 22:09:11'),
(22, 5, 7, 2, 'A', 7, 'Lunes', 'root@localhost', '2020-10-28 22:09:20'),
(23, 5, 3, 2, 'A', 7, 'Lunes', 'root@localhost', '2020-10-28 22:16:00'),
(24, 5, 3, 2, 'B', 8, 'Lunes', 'root@localhost', '2020-10-28 22:16:07'),
(27, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:37:24'),
(28, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:37:26'),
(29, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:37:28'),
(30, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:37:34'),
(31, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:38:23'),
(32, 8, 7, 2, 'A', 9, 'Martes', 'root@localhost', '2020-10-28 22:51:03'),
(33, 8, 7, 2, 'A', 9, 'Martes', 'root@localhost', '2020-10-28 22:55:30'),
(34, 8, 7, 2, 'A', 9, 'Martes', 'root@localhost', '2020-10-28 22:55:33'),
(35, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:55:42'),
(36, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:55:43'),
(37, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:55:45'),
(39, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:07:55'),
(40, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:08:04'),
(41, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:08:06'),
(38, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:08:48'),
(42, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:11:09'),
(43, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:38:25'),
(47, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:52:35'),
(46, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:52:38'),
(45, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:52:40'),
(44, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:52:43'),
(48, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:56:42'),
(49, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:58:26'),
(50, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:58:34'),
(51, 5, 8, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:59:54'),
(26, 8, 8, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-29 00:00:01'),
(54, 5, 6, 2, 'A', 4, 'Martes', 'root@localhost', '2020-10-29 00:03:42'),
(55, 5, 4, 2, 'B', 4, 'Lunes', 'root@localhost', '2020-10-29 00:06:57'),
(57, 5, 4, 2, 'A', 6, 'Martes', 'root@localhost', '2020-10-29 00:13:52'),
(60, 8, 20, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-11-04 14:45:59'),
(61, 8, 20, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-11-04 14:48:27'),
(62, 6, 20, 8, 'A', 4, 'Lunes', 'root@localhost', '2020-11-04 15:06:41'),
(65, 8, 20, 2, 'B', 1, 'Martes', 'root@localhost', '2020-11-04 15:06:52'),
(64, 6, 20, 2, 'B', 1, 'Martes', 'root@localhost', '2020-11-04 15:23:51'),
(58, 4, 6, 2, 'A', 9, 'Martes', 'root@localhost', '2020-11-04 20:11:20'),
(9, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-11-04 20:22:18'),
(63, 7, 8, 9, 'B', 5, 'Miercoles', 'root@localhost', '2020-11-04 20:22:18'),
(13, 4, 5, 2, 'B', 5, 'Lunes', 'root@localhost', '2020-11-04 20:35:06'),
(64, 4, 10, 2, 'A', 6, 'Lunes', 'root@localhost', '2020-11-04 21:10:48'),
(59, 4, 7, 11, 'A', 1, 'Lunes', 'root@localhost', '2020-11-07 04:58:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_insert`
--

DROP TABLE IF EXISTS `det_insert`;
CREATE TABLE IF NOT EXISTS `det_insert` (
  `id` int(255) DEFAULT NULL,
  `usuario_id` int(255) DEFAULT NULL,
  `materia_id` int(255) DEFAULT NULL,
  `nivel_id` int(255) DEFAULT NULL,
  `seccion` varchar(50) DEFAULT NULL,
  `horario_id` int(255) DEFAULT NULL,
  `dia` varchar(50) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_insert`
--

INSERT INTO `det_insert` (`id`, `usuario_id`, `materia_id`, `nivel_id`, `seccion`, `horario_id`, `dia`, `usuario`, `created_at`) VALUES
(1, 5, 6, 0, '0', 0, NULL, 'root@localhost', '2020-10-23 17:15:50'),
(2, 6, 9, 0, '0', 0, NULL, 'root@localhost', '2020-10-23 17:17:20'),
(3, 4, 8, 0, '0', 0, NULL, 'root@localhost', '2020-10-23 17:18:13'),
(1, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 17:30:33'),
(2, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 17:31:02'),
(3, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 17:31:55'),
(4, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 17:36:24'),
(5, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 17:36:57'),
(6, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 17:43:01'),
(7, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:56:50'),
(8, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:56:57'),
(9, 7, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 20:59:41'),
(10, 6, 9, 2, 'A', 5, 'Lunes', 'root@localhost', '2020-10-28 21:08:59'),
(11, 4, 9, 2, 'B', 4, 'Lunes', 'root@localhost', '2020-10-28 21:19:44'),
(12, 7, 1, 2, 'A', 5, 'Lunes', 'root@localhost', '2020-10-28 21:24:06'),
(13, 4, 5, 2, 'B', 5, 'Lunes', 'root@localhost', '2020-10-28 21:35:41'),
(14, 4, 5, 2, 'B', 4, 'Lunes', 'root@localhost', '2020-10-28 21:36:44'),
(15, 4, 9, 3, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 21:42:51'),
(16, 6, 7, 2, 'A', 5, 'Lunes', 'root@localhost', '2020-10-28 21:44:58'),
(17, 6, 7, 2, 'A', 6, 'Lunes', 'root@localhost', '2020-10-28 21:48:53'),
(18, 6, 5, 2, 'A', 9, 'Lunes', 'root@localhost', '2020-10-28 21:53:46'),
(19, 5, 3, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 21:58:10'),
(20, 5, 3, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 21:58:26'),
(21, 6, 3, 2, 'A', 9, 'Lunes', 'root@localhost', '2020-10-28 22:06:27'),
(22, 5, 7, 2, 'A', 7, 'Lunes', 'root@localhost', '2020-10-28 22:07:16'),
(23, 5, 3, 2, 'A', 7, 'Lunes', 'root@localhost', '2020-10-28 22:09:39'),
(24, 5, 3, 2, 'B', 8, 'Lunes', 'root@localhost', '2020-10-28 22:13:31'),
(25, 6, 7, 2, 'A', 9, 'Lunes', 'root@localhost', '2020-10-28 22:29:24'),
(26, 8, 8, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 22:35:24'),
(27, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:35:37'),
(28, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:36:05'),
(29, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:36:22'),
(30, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:36:30'),
(31, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:38:01'),
(32, 8, 7, 2, 'A', 9, 'Martes', 'root@localhost', '2020-10-28 22:49:54'),
(33, 8, 7, 2, 'A', 9, 'Martes', 'root@localhost', '2020-10-28 22:50:30'),
(34, 8, 7, 2, 'A', 9, 'Martes', 'root@localhost', '2020-10-28 22:51:28'),
(35, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:53:21'),
(36, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:53:45'),
(37, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 22:54:01'),
(38, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:06:31'),
(39, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:06:46'),
(40, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:07:06'),
(41, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:07:32'),
(42, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:10:38'),
(43, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:34:27'),
(44, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:38:43'),
(45, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:41:41'),
(46, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:41:57'),
(47, 8, 9, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-10-28 23:42:06'),
(48, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:54:06'),
(49, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:57:32'),
(50, 8, 3, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:58:10'),
(51, 5, 8, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-28 23:59:14'),
(52, 8, 8, 2, 'A', 1, 'Martes', 'root@localhost', '2020-10-29 00:00:24'),
(53, 8, 3, 2, 'A', 4, 'Martes', 'root@localhost', '2020-10-29 00:00:49'),
(54, 5, 6, 2, 'A', 4, 'Martes', 'root@localhost', '2020-10-29 00:01:55'),
(55, 5, 4, 2, 'B', 4, 'Lunes', 'root@localhost', '2020-10-29 00:06:43'),
(56, 5, 4, 2, 'B', 6, 'Martes', 'root@localhost', '2020-10-29 00:12:52'),
(57, 5, 4, 2, 'A', 6, 'Martes', 'root@localhost', '2020-10-29 00:13:19'),
(57, 7, 1, 2, 'B', 1, 'Martes', 'root@localhost', '2020-10-29 17:37:16'),
(58, 4, 6, 2, 'B', 9, 'Martes', 'root@localhost', '2020-10-31 00:26:51'),
(59, 5, 7, 8, 'A', 1, 'Lunes', 'root@localhost', '2020-11-02 16:52:54'),
(60, 8, 20, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-11-04 14:44:55'),
(61, 8, 20, 2, 'A', 1, 'Lunes', 'root@localhost', '2020-11-04 14:48:10'),
(62, 8, 20, 8, 'A', 4, 'Lunes', 'root@localhost', '2020-11-04 14:53:05'),
(63, 7, 8, 9, 'B', 5, 'Miercoles', 'root@localhost', '2020-11-04 14:58:03'),
(64, 6, 20, 2, 'B', 1, 'Martes', 'root@localhost', '2020-11-04 15:05:41'),
(65, 8, 20, 2, 'B', 1, 'Martes', 'root@localhost', '2020-11-04 15:06:24'),
(64, 4, 10, 2, 'A', 6, 'Lunes', 'root@localhost', '2020-11-04 20:12:54'),
(57, 5, 9, 10, 'B', 6, 'Jueves', 'root@localhost', '2020-11-07 16:39:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_mat_prof`
--

DROP TABLE IF EXISTS `det_mat_prof`;
CREATE TABLE IF NOT EXISTS `det_mat_prof` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(255) NOT NULL,
  `materia_id` int(255) NOT NULL,
  `nivel_id` int(255) NOT NULL,
  `seccion` varchar(50) NOT NULL,
  `horario_id` int(255) NOT NULL,
  `dia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_det_usuario` (`usuario_id`),
  KEY `fk_det_mat_nivel` (`nivel_id`),
  KEY `fk_det_mat_horario` (`horario_id`),
  KEY `materia_id` (`materia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_mat_prof`
--

INSERT INTO `det_mat_prof` (`id`, `usuario_id`, `materia_id`, `nivel_id`, `seccion`, `horario_id`, `dia`) VALUES
(11, 4, 9, 2, 'B', 4, 'Lunes'),
(25, 6, 7, 2, 'A', 9, 'Lunes'),
(52, 8, 8, 2, 'A', 1, 'Martes'),
(53, 8, 3, 2, 'A', 4, 'Martes'),
(56, 5, 5, 2, 'B', 6, 'Martes'),
(57, 5, 9, 10, 'B', 6, 'Jueves');

--
-- Disparadores `det_mat_prof`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_DET_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_DET_BU` BEFORE UPDATE ON `det_mat_prof` FOR EACH ROW INSERT INTO DET_update VALUES(OLD.id, OLD.usuario_id, OLD.materia_id, OLD.nivel_id, OLD.seccion, OLD.horario_id, OLD.dia, NEW.id, NEW.usuario_id, NEW.materia_id, NEW.nivel_id, NEW.seccion, NEW.horario_id, NEW.dia, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `DET_MAT_IA`;
DELIMITER $$
CREATE TRIGGER `DET_MAT_IA` AFTER INSERT ON `det_mat_prof` FOR EACH ROW INSERT INTO det_insert VALUES(NEW.id, NEW.usuario_id, NEW.materia_id, NEW.nivel_id, NEW.seccion, NEW.horario_id, NEW.dia, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_DET_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_DET_AD` AFTER DELETE ON `det_mat_prof` FOR EACH ROW INSERT INTO DET_delete VALUES(OLD.id, OLD.usuario_id, OLD.materia_id, OLD.nivel_id, OLD.seccion, OLD.horario_id, OLD.dia, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_update`
--

DROP TABLE IF EXISTS `det_update`;
CREATE TABLE IF NOT EXISTS `det_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_usuario_id` int(255) DEFAULT NULL,
  `anterior_materia_id` int(255) DEFAULT NULL,
  `anterior_nivel_id` int(255) DEFAULT NULL,
  `anterior_seccion` varchar(50) DEFAULT NULL,
  `anterior_horario_id` int(255) DEFAULT NULL,
  `anterior_dia` varchar(50) DEFAULT NULL,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_usuario_id` int(255) DEFAULT NULL,
  `nuevo_materia_id` int(255) DEFAULT NULL,
  `nuevo_nivel_id` int(255) DEFAULT NULL,
  `nuevo_seccion` varchar(50) DEFAULT NULL,
  `nuevo_horario_id` int(255) DEFAULT NULL,
  `nuevo_dia` varchar(50) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_update`
--

INSERT INTO `det_update` (`anterior_id`, `anterior_usuario_id`, `anterior_materia_id`, `anterior_nivel_id`, `anterior_seccion`, `anterior_horario_id`, `anterior_dia`, `nuevo_id`, `nuevo_usuario_id`, `nuevo_materia_id`, `nuevo_nivel_id`, `nuevo_seccion`, `nuevo_horario_id`, `nuevo_dia`, `usuario`, `updated_at`) VALUES
(58, 4, 6, 2, 'B', 9, 'Martes', 58, 4, 6, 2, 'A', 9, 'Martes', 'root@localhost', '2020-10-31 00:29:02'),
(59, 5, 7, 8, 'A', 1, 'Lunes', 59, 5, 7, 11, 'A', 1, 'Lunes', 'root@localhost', '2020-11-02 16:53:54'),
(62, 8, 20, 8, 'A', 4, 'Lunes', 62, 6, 20, 8, 'A', 4, 'Lunes', 'root@localhost', '2020-11-04 14:53:31'),
(56, 5, 4, 2, 'B', 6, 'Martes', 56, 5, 5, 2, 'B', 6, 'Martes', 'root@localhost', '2020-11-04 21:10:37'),
(59, 5, 7, 11, 'A', 1, 'Lunes', 59, 5, 7, 11, 'A', 1, 'Jueves', 'root@localhost', '2020-11-05 14:05:59'),
(59, 5, 7, 11, 'A', 1, 'Jueves', 59, 5, 7, 11, 'A', 1, 'Lunes', 'root@localhost', '2020-11-05 14:06:04'),
(59, 5, 7, 11, 'A', 1, 'Lunes', 59, 4, 7, 11, 'A', 1, 'Lunes', 'root@localhost', '2020-11-07 04:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(12) NOT NULL,
  `nivel_id` int(255) NOT NULL,
  `primer_nombre` varchar(150) NOT NULL,
  `segundo_nombre` varchar(150) NOT NULL,
  `primer_apellido` varchar(150) NOT NULL,
  `segundo_apellido` varchar(150) NOT NULL,
  `telefono_celular` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sexo` varchar(150) NOT NULL,
  `direccion` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`),
  UNIQUE KEY `uq_cedula` (`cedula`),
  KEY `fk_estudiante_nivel` (`nivel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `cedula`, `nivel_id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `telefono_celular`, `email`, `sexo`, `direccion`) VALUES
(1, '23112456', 2, 'robert', 'alejandro', 'garcia', 'vivas', '4126695678', 'robert@gmail.com', 'Masculino', 'las lomas urb playa bonito frente a la estacion guadalupe casa m#231'),
(2, '28654789', 2, 'sophia', 'daniela', 'jimenez', 'vivas', '4143652148', 'sophia@gmail.com', 'Femenino', 'las lomas subiendo por colinas de carabobo mas abajo del dgcim casa m-261'),
(3, '28456789', 2, 'Maria', 'Jose', 'Zambrano', 'Fernandez', '4267896541', 'maria@maria.com', 'Femenino', 'Palmira Calle alta Pueblo chiquito'),
(5, '16897123', 9, 'Londra', 'Paca', 'Dominguez', 'buyos', '4147895631', 'londra@londra.com', 'Femenino', 'barrio obrero por la plaza los mangos diagonal a kakao 40'),
(10, '51334569', 11, 'Miguel', 'Angel', 'Bustama', 'Fernandez', '4241564789', 'miguel@miguel.com', 'Masculino', 'los teques calle el alto casa m-251'),
(11, '26702112', 2, 'Allen', 'Franco', 'Jaimes', 'Gamez', '4120697590', 'franco@franco.com', 'Masculino', 'rubio calle principal casa m-451'),
(12, '23145678', 11, 'justyn', 'alejandro', 'suarez', 'vivas', '41256789452', 'justin@justin.com', 'Masculino', 'machiri parte alta casa -123');

--
-- Disparadores `estudiante`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_ESTUDIANTE_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_ESTUDIANTE_BU` BEFORE UPDATE ON `estudiante` FOR EACH ROW INSERT INTO estudiante_update VALUES(OLD.id, OLD.cedula, OLD.nivel_id, OLD.primer_nombre, OLD.segundo_nombre, OLD.primer_apellido, OLD.segundo_apellido, OLD.telefono_celular, OLD.email, OLD.sexo, OLD.direccion, NEW.id, NEW.cedula, NEW.nivel_id, NEW.primer_nombre, NEW.segundo_nombre, NEW.primer_apellido, NEW.segundo_apellido, NEW.telefono_celular, NEW.email, NEW.sexo, NEW.direccion, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_ESTUDIANTE_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_ESTUDIANTE_AD` AFTER DELETE ON `estudiante` FOR EACH ROW INSERT INTO estudiante_delete VALUES(OLD.id, OLD.cedula, OLD.nivel_id, OLD.primer_nombre, OLD.segundo_nombre, OLD.primer_apellido, OLD.segundo_apellido, OLD.telefono_celular, OLD.email, OLD.sexo, OLD.direccion, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ESTUDIANTE_AI`;
DELIMITER $$
CREATE TRIGGER `ESTUDIANTE_AI` AFTER INSERT ON `estudiante` FOR EACH ROW INSERT INTO estudiante_insert VALUES(NEW.id, NEW.cedula, NEW.nivel_id, NEW.primer_nombre, NEW.segundo_nombre, NEW.primer_apellido, NEW.segundo_apellido, NEW.telefono_celular, NEW.email, NEW.sexo, NEW.direccion, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_delete`
--

DROP TABLE IF EXISTS `estudiante_delete`;
CREATE TABLE IF NOT EXISTS `estudiante_delete` (
  `id` int(255) DEFAULT NULL,
  `cedula` varchar(12) DEFAULT NULL,
  `nivel_id` int(255) DEFAULT NULL,
  `primer_nombre` varchar(150) DEFAULT NULL,
  `segundo_nombre` varchar(150) DEFAULT NULL,
  `primer_apellido` varchar(150) DEFAULT NULL,
  `segundo_apellido` varchar(150) DEFAULT NULL,
  `telefono_celular` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `sexo` varchar(150) DEFAULT NULL,
  `direccion` text,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante_delete`
--

INSERT INTO `estudiante_delete` (`id`, `cedula`, `nivel_id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `telefono_celular`, `email`, `sexo`, `direccion`, `usuario`, `deleted_at`) VALUES
(6, '35269875', 2, 'aawdawd', 'awdawd', 'awdawd', 'awdawd', '53689754215', 'awfawfa@awfawf.com', 'Masculino', 'awawfawfawfawawf', 'root@localhost', '2020-10-30 23:17:26'),
(7, '16813141', 2, 'gawgawg', 'wgawg', 'awgawg', 'awgawg', '69856895623', 'awfasfasf@awfaf.com', 'Femenino', 'afawfafawfawf', 'root@localhost', '2020-10-30 23:17:29'),
(8, '23654215', 2, 'awfawf', 'awfawf', 'awfa', 'awfaw', '45236587412', 'awfawf@efasf.com', 'Masculino', 'awfawfawf', 'root@localhost', '2020-10-30 23:17:32'),
(9, '51334569', 2, 'safawf', 'sfawfa', 'awfawf', 'awfaw', '32547896512', 'awfawfq@wawfaw.com', 'Masculino', 'awfawf', 'root@localhost', '2020-10-30 23:17:34'),
(4, '17156893', 11, 'Jorge', 'Alejandro', 'Alviarez', 'Mendez', '4247789864', 'jorge@gmail.com', 'Masculino', 'Los teques de santa teresa', 'root@localhost', '2020-11-05 17:23:44'),
(13, '12345678', 10, 'awfawf', 'awfawf', 'awfawf', 'awfawf', '12345678912', 'awfaa@asdfas.com', 'Femenino', 'awfawfawf', 'root@localhost', '2020-11-07 16:45:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_insert`
--

DROP TABLE IF EXISTS `estudiante_insert`;
CREATE TABLE IF NOT EXISTS `estudiante_insert` (
  `id` int(255) DEFAULT NULL,
  `cedula` varchar(12) DEFAULT NULL,
  `nivel_id` int(255) DEFAULT NULL,
  `primer_nombre` varchar(150) DEFAULT NULL,
  `segundo_nombre` varchar(150) DEFAULT NULL,
  `primer_apellido` varchar(150) DEFAULT NULL,
  `segundo_apellido` varchar(150) DEFAULT NULL,
  `telefono_celular` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `sexo` varchar(150) DEFAULT NULL,
  `direccion` text,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante_insert`
--

INSERT INTO `estudiante_insert` (`id`, `cedula`, `nivel_id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `telefono_celular`, `email`, `sexo`, `direccion`, `usuario`, `created_at`) VALUES
(1, '23112456', 8, 'robert', 'alejandro', 'garcia', 'vivas', '4126695678', 'robert@gmail.com', 'Masculino', 'las lomas urb playa bonito frente a la estacion guadalupe casa m#231', 'root@localhost', '2020-10-23 23:24:10'),
(2, '28654789', 7, 'sophia', 'daniela', 'jimenez', 'vivas', '4143652148', 'sophia@gmail.com', 'Femenino', 'las lomas subiendo por colinas de carabobo mas abajo del dgcim casa m-261', 'root@localhost', '2020-10-23 23:31:06'),
(3, '28456789', 11, 'Maria', 'Jose', 'Zambrano', 'Fernandez', '4267896541', 'maria@maria.com', 'Femenino', 'Palmira Calle alta Pueblo chiquito', 'root@localhost', '2020-10-27 14:12:45'),
(4, '17156893', 11, 'Jorge', 'Alejandro', 'Alviarez', 'Mendez', '4247789864', 'jorge@gmail.com', 'Masculino', 'Los teques de santa teresa', 'root@localhost', '2020-10-29 23:05:21'),
(5, '16897123', 9, 'Londra', 'Paca', 'Dominguez', 'buyos', '4147895631', 'londra@londra.com', 'Femenino', 'barrio obrero por la plaza los mangos diagonal a kakao 40', 'root@localhost', '2020-10-30 00:12:21'),
(6, '35269875', 2, 'aawdawd', 'awdawd', 'awdawd', 'awdawd', '53689754215', 'awfawfa@awfawf.com', 'Masculino', 'awawfawfawfawawf', 'root@localhost', '2020-10-30 22:42:12'),
(7, '16813141', 2, 'gawgawg', 'wgawg', 'awgawg', 'awgawg', '69856895623', 'awfasfasf@awfaf.com', 'Femenino', 'afawfafawfawf', 'root@localhost', '2020-10-30 22:44:02'),
(8, '23654215', 2, 'awfawf', 'awfawf', 'awfa', 'awfaw', '45236587412', 'awfawf@efasf.com', 'Masculino', 'awfawfawf', 'root@localhost', '2020-10-30 22:45:46'),
(9, '51334569', 2, 'safawf', 'sfawfa', 'awfawf', 'awfaw', '32547896512', 'awfawfq@wawfaw.com', 'Masculino', 'awfawf', 'root@localhost', '2020-10-30 22:47:14'),
(10, '51334569', 11, 'Miguel', 'Angel', 'Bustama', 'Fernandez', '4241564789', 'miguel@miguel.com', 'Masculino', 'los teques calle el alto casa m-251', 'root@localhost', '2020-10-31 01:00:26'),
(11, '26702112', 2, 'Allen', 'Franco', 'Jaimes', 'Gamez', '4120697590', 'franco@franco.com', 'Masculino', 'rubio calle principal casa m-451', 'root@localhost', '2020-11-02 14:35:49'),
(12, '23145678', 11, 'justyn', 'alejandro', 'suarez', 'vivas', '41256789452', 'justin@justin.com', 'Masculino', 'machiri parte alta casa -123', 'root@localhost', '2020-11-06 19:28:36'),
(13, '12345678', 10, 'awfawf', 'awfawf', 'awfawf', 'awfawf', '12345678912', 'awfaa@asdfas.com', 'Femenino', 'awfawfawf', 'root@localhost', '2020-11-07 16:40:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_update`
--

DROP TABLE IF EXISTS `estudiante_update`;
CREATE TABLE IF NOT EXISTS `estudiante_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_cedula` varchar(12) DEFAULT NULL,
  `anterior_nivel_id` int(255) DEFAULT NULL,
  `anterior_primer_nombre` varchar(150) DEFAULT NULL,
  `anterior_segundo_nombre` varchar(150) DEFAULT NULL,
  `anterior_primer_apellido` varchar(150) DEFAULT NULL,
  `anterior_segundo_apellido` varchar(150) DEFAULT NULL,
  `anterior_telefono_celular` varchar(100) DEFAULT NULL,
  `anterior_email` varchar(150) DEFAULT NULL,
  `anterior_sexo` varchar(150) DEFAULT NULL,
  `anterior_direccion` text,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_cedula` varchar(12) DEFAULT NULL,
  `nuevo_nivel_id` int(255) DEFAULT NULL,
  `nuevo_primer_nombre` varchar(150) DEFAULT NULL,
  `nuevo_segundo_nombre` varchar(150) DEFAULT NULL,
  `nuevo_primer_apellido` varchar(150) DEFAULT NULL,
  `nuevo_segundo_apellido` varchar(150) DEFAULT NULL,
  `nuevo_telefono_celular` varchar(100) DEFAULT NULL,
  `nuevo_email` varchar(150) DEFAULT NULL,
  `nuevo_sexo` varchar(150) DEFAULT NULL,
  `nuevo_direccion` text,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante_update`
--

INSERT INTO `estudiante_update` (`anterior_id`, `anterior_cedula`, `anterior_nivel_id`, `anterior_primer_nombre`, `anterior_segundo_nombre`, `anterior_primer_apellido`, `anterior_segundo_apellido`, `anterior_telefono_celular`, `anterior_email`, `anterior_sexo`, `anterior_direccion`, `nuevo_id`, `nuevo_cedula`, `nuevo_nivel_id`, `nuevo_primer_nombre`, `nuevo_segundo_nombre`, `nuevo_primer_apellido`, `nuevo_segundo_apellido`, `nuevo_telefono_celular`, `nuevo_email`, `nuevo_sexo`, `nuevo_direccion`, `usuario`, `updated_at`) VALUES
(2, '28654789', 7, 'sophia', 'daniela', 'jimenez', 'vivas', '4143652148', 'sophia@gmail.com', 'Femenino', 'las lomas subiendo por colinas de carabobo mas abajo del dgcim casa m-261', 2, '28654789', 2, 'sophia', 'daniela', 'jimenez', 'vivas', '4143652148', 'sophia@gmail.com', 'Femenino', 'las lomas subiendo por colinas de carabobo mas abajo del dgcim casa m-261', 'root@localhost', '2020-11-02 15:55:40'),
(1, '23112456', 8, 'robert', 'alejandro', 'garcia', 'vivas', '4126695678', 'robert@gmail.com', 'Masculino', 'las lomas urb playa bonito frente a la estacion guadalupe casa m#231', 1, '23112456', 2, 'robert', 'alejandro', 'garcia', 'vivas', '4126695678', 'robert@gmail.com', 'Masculino', 'las lomas urb playa bonito frente a la estacion guadalupe casa m#231', 'root@localhost', '2020-11-02 15:56:30'),
(3, '28456789', 11, 'Maria', 'Jose', 'Zambrano', 'Fernandez', '4267896541', 'maria@maria.com', 'Femenino', 'Palmira Calle alta Pueblo chiquito', 3, '28456789', 2, 'Maria', 'Jose', 'Zambrano', 'Fernandez', '4267896541', 'maria@maria.com', 'Femenino', 'Palmira Calle alta Pueblo chiquito', 'root@localhost', '2020-11-02 15:56:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `horario_desde` time NOT NULL,
  `horario_hasta` time NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_horario_desde` (`horario_desde`),
  UNIQUE KEY `uq_horario_hasta` (`horario_hasta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `horario_desde`, `horario_hasta`) VALUES
(1, '07:00:00', '09:00:00'),
(4, '08:30:00', '10:30:00'),
(6, '14:30:00', '15:30:00'),
(7, '07:30:00', '09:30:00'),
(8, '08:00:00', '10:00:00'),
(9, '13:20:00', '14:30:00');

--
-- Disparadores `horario`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_HORARIO_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_HORARIO_BU` BEFORE UPDATE ON `horario` FOR EACH ROW INSERT INTO horario_update VALUES(OLD.id, OLD.horario_desde, OLD.horario_hasta, NEW.id, NEW.horario_desde, NEW.horario_hasta, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_HORARIO_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_HORARIO_AD` AFTER DELETE ON `horario` FOR EACH ROW INSERT INTO horario_delete VALUES(OLD.id, OLD.horario_desde, OLD.horario_hasta, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `HORARIO_AI`;
DELIMITER $$
CREATE TRIGGER `HORARIO_AI` AFTER INSERT ON `horario` FOR EACH ROW INSERT INTO horario_insert VALUES(NEW.id, NEW.horario_desde, NEW.horario_hasta, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_delete`
--

DROP TABLE IF EXISTS `horario_delete`;
CREATE TABLE IF NOT EXISTS `horario_delete` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_horario_desde` time DEFAULT NULL,
  `anterior_horario_hasta` time DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario_delete`
--

INSERT INTO `horario_delete` (`anterior_id`, `anterior_horario_desde`, `anterior_horario_hasta`, `user`, `deleted_at`) VALUES
(6, '23:30:00', '14:30:00', 'root@localhost', '2020-10-27 03:42:33'),
(5, '11:00:00', '13:20:00', 'root@localhost', '2020-11-04 20:35:07'),
(11, '22:30:00', '02:03:00', 'root@localhost', '2020-11-04 20:36:07'),
(10, '02:23:00', '12:34:00', 'root@localhost', '2020-11-04 20:40:58'),
(12, '03:30:00', '12:30:00', 'root@localhost', '2020-11-04 20:41:27'),
(10, '18:00:00', '00:45:00', 'root@localhost', '2020-11-07 16:38:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_insert`
--

DROP TABLE IF EXISTS `horario_insert`;
CREATE TABLE IF NOT EXISTS `horario_insert` (
  `id` int(255) DEFAULT NULL,
  `horario_desde` time DEFAULT NULL,
  `horario_hasta` time DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario_insert`
--

INSERT INTO `horario_insert` (`id`, `horario_desde`, `horario_hasta`, `user`, `created_at`) VALUES
(1, '07:00:00', '09:00:00', 'root@localhost', '2020-10-27 03:17:50'),
(4, '08:30:00', '10:30:00', 'root@localhost', '2020-10-27 03:22:08'),
(5, '11:00:00', '13:20:00', 'root@localhost', '2020-10-27 03:24:43'),
(6, '23:30:00', '14:30:00', 'root@localhost', '2020-10-27 03:30:21'),
(6, '14:30:00', '15:30:00', 'root@localhost', '2020-10-27 12:33:19'),
(7, '07:30:00', '09:30:00', 'root@localhost', '2020-10-27 12:46:15'),
(8, '08:00:00', '10:00:00', 'root@localhost', '2020-10-27 12:46:33'),
(9, '13:20:00', '14:30:00', 'root@localhost', '2020-10-28 21:52:14'),
(10, '02:23:00', '12:34:00', 'root@localhost', '2020-11-04 20:35:27'),
(11, '22:30:00', '02:03:00', 'root@localhost', '2020-11-04 20:35:43'),
(12, '02:13:00', '00:03:00', 'root@localhost', '2020-11-04 20:41:06'),
(10, '18:00:00', '00:45:00', 'root@localhost', '2020-11-07 16:38:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_update`
--

DROP TABLE IF EXISTS `horario_update`;
CREATE TABLE IF NOT EXISTS `horario_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_horario_desde` time DEFAULT NULL,
  `anterior_horario_hasta` time DEFAULT NULL,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_horario_desde` time DEFAULT NULL,
  `nuevo_horario_hasta` time DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario_update`
--

INSERT INTO `horario_update` (`anterior_id`, `anterior_horario_desde`, `anterior_horario_hasta`, `nuevo_id`, `nuevo_horario_desde`, `nuevo_horario_hasta`, `user`, `updated_at`) VALUES
(12, '02:13:00', '00:03:00', 12, '03:30:00', '12:30:00', 'root@localhost', '2020-11-04 20:41:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

DROP TABLE IF EXISTS `inscripcion`;
CREATE TABLE IF NOT EXISTS `inscripcion` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inscripcion_estudiante` (`estudiante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `estudiante_id`, `status`) VALUES
(1, 1, 'ingresado'),
(2, 2, 'ingresado'),
(3, 3, 'ingresado'),
(5, 5, 'ingresado'),
(10, 10, 'egresado'),
(11, 11, 'ingresado'),
(12, 12, 'egresado');

--
-- Disparadores `inscripcion`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_INSCRIPCION_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_INSCRIPCION_BU` BEFORE UPDATE ON `inscripcion` FOR EACH ROW INSERT INTO inscripcion_update VALUES(OLD.id, OLD.estudiante_id, OLD.status, NEW.id, NEW.estudiante_id, NEW.status, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_INSCRIPCION_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_INSCRIPCION_AD` AFTER DELETE ON `inscripcion` FOR EACH ROW INSERT INTO inscripcion_delete VALUES(OLD.id, OLD.estudiante_id, OLD.status, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `INSCRIPCION_AI`;
DELIMITER $$
CREATE TRIGGER `INSCRIPCION_AI` AFTER INSERT ON `inscripcion` FOR EACH ROW INSERT INTO inscripcion_insert VALUES(NEW.id, NEW.estudiante_id, NEW.status, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_delete`
--

DROP TABLE IF EXISTS `inscripcion_delete`;
CREATE TABLE IF NOT EXISTS `inscripcion_delete` (
  `id` int(255) DEFAULT NULL,
  `estudiante_id` int(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion_delete`
--

INSERT INTO `inscripcion_delete` (`id`, `estudiante_id`, `status`, `usuario`, `deleted_at`) VALUES
(6, 6, 'ingresado', 'root@localhost', '2020-10-30 23:14:44'),
(7, 7, 'ingresado', 'root@localhost', '2020-10-30 23:14:51'),
(8, 8, 'ingresado', 'root@localhost', '2020-10-30 23:15:00'),
(9, 9, 'ingresado', 'root@localhost', '2020-10-30 23:15:03'),
(4, 4, 'ingresado', 'root@localhost', '2020-11-05 17:18:53'),
(13, 13, 'ingresado', 'root@localhost', '2020-11-07 16:43:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_insert`
--

DROP TABLE IF EXISTS `inscripcion_insert`;
CREATE TABLE IF NOT EXISTS `inscripcion_insert` (
  `id` int(255) DEFAULT NULL,
  `estudiante_id` int(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion_insert`
--

INSERT INTO `inscripcion_insert` (`id`, `estudiante_id`, `status`, `usuario`, `created_at`) VALUES
(1, 1, 'ingresado', 'root@localhost', '2020-10-23 23:24:11'),
(2, 2, 'ingresado', 'root@localhost', '2020-10-23 23:31:06'),
(3, 3, 'ingresado', 'root@localhost', '2020-10-27 14:12:46'),
(4, 4, 'ingresado', 'root@localhost', '2020-10-29 23:05:23'),
(5, 5, 'ingresado', 'root@localhost', '2020-10-30 00:12:22'),
(6, 6, 'ingresado', 'root@localhost', '2020-10-30 22:42:12'),
(7, 7, 'ingresado', 'root@localhost', '2020-10-30 22:44:02'),
(8, 8, 'ingresado', 'root@localhost', '2020-10-30 22:45:46'),
(9, 9, 'ingresado', 'root@localhost', '2020-10-30 22:47:14'),
(10, 10, 'ingresado', 'root@localhost', '2020-10-31 01:00:26'),
(11, 11, 'ingresado', 'root@localhost', '2020-11-02 14:35:49'),
(12, 12, 'ingresado', 'root@localhost', '2020-11-06 19:28:37'),
(13, 13, 'ingresado', 'root@localhost', '2020-11-07 16:40:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_update`
--

DROP TABLE IF EXISTS `inscripcion_update`;
CREATE TABLE IF NOT EXISTS `inscripcion_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_estudiante_id` int(255) DEFAULT NULL,
  `anterior_status` varchar(100) DEFAULT NULL,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_estudiante_id` int(255) DEFAULT NULL,
  `nuevo_status` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion_update`
--

INSERT INTO `inscripcion_update` (`anterior_id`, `anterior_estudiante_id`, `anterior_status`, `nuevo_id`, `nuevo_estudiante_id`, `nuevo_status`, `usuario`, `updated_at`) VALUES
(10, 10, 'ingresado', 10, 10, 'egresado', 'root@localhost', '2020-11-05 18:03:44'),
(12, 12, 'ingresado', 12, 12, 'egresado', 'root@localhost', '2020-11-06 19:37:20'),
(12, 12, 'egresado', 12, 12, 'ingresado', 'root@localhost', '2020-11-06 19:45:43'),
(12, 12, 'ingresado', 12, 12, 'egresado', 'root@localhost', '2020-11-07 04:58:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_materia_nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`) VALUES
(10, 'Deporte'),
(7, 'Fisica'),
(9, 'Historia'),
(5, 'Ingles'),
(3, 'Matematica'),
(4, 'Musica'),
(8, 'Quimica');

--
-- Disparadores `materia`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_MATERIA_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_MATERIA_BU` BEFORE UPDATE ON `materia` FOR EACH ROW INSERT INTO materia_update VALUES(OLD.id, OLD.nombre, NEW.id, NEW.nombre, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_MATERIA_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_MATERIA_AD` AFTER DELETE ON `materia` FOR EACH ROW INSERT INTO materia_delete VALUES(OLD.id, OLD.nombre, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `MATERIA_AI`;
DELIMITER $$
CREATE TRIGGER `MATERIA_AI` AFTER INSERT ON `materia` FOR EACH ROW INSERT INTO materia_insert VALUES(NEW.id, NEW.nombre, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_delete`
--

DROP TABLE IF EXISTS `materia_delete`;
CREATE TABLE IF NOT EXISTS `materia_delete` (
  `id` int(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia_delete`
--

INSERT INTO `materia_delete` (`id`, `nombre`, `usuario`, `deleted_at`) VALUES
(2, 'Castellano', 'root@localhost', '2020-10-23 14:29:07'),
(1, 'Castellano', 'root@localhost', '2020-11-04 14:32:24'),
(20, 'Castellano', 'root@localhost', '2020-11-04 15:24:28'),
(21, 'Castellano', 'root@localhost', '2020-11-04 15:34:01'),
(22, 'Catedra', 'root@localhost', '2020-11-04 15:58:41'),
(6, 'Deporte', 'root@localhost', '2020-11-04 20:12:14'),
(11, 'awfawf', 'root@localhost', '2020-11-07 03:00:43'),
(12, 'awfawfawfawfw', 'root@localhost', '2020-11-07 04:49:50'),
(11, 'awfawfaw', 'root@localhost', '2020-11-07 16:37:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_insert`
--

DROP TABLE IF EXISTS `materia_insert`;
CREATE TABLE IF NOT EXISTS `materia_insert` (
  `id` int(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia_insert`
--

INSERT INTO `materia_insert` (`id`, `nombre`, `usuario`, `created_at`) VALUES
(1, 'Castellano', 'root@localhost', '2020-10-23 14:27:48'),
(2, 'Castellano', 'root@localhost', '2020-10-23 14:28:33'),
(3, 'Matematica', 'root@localhost', '2020-10-23 14:29:16'),
(4, 'Musica', 'root@localhost', '2020-10-23 14:29:25'),
(5, 'Ingles', 'root@localhost', '2020-10-23 14:29:36'),
(6, 'Deporte', 'root@localhost', '2020-10-23 14:31:44'),
(7, 'Fisica', 'root@localhost', '2020-10-23 14:31:47'),
(8, 'Quimica', 'root@localhost', '2020-10-23 14:34:30'),
(9, 'Historia', 'root@localhost', '2020-10-23 14:34:34'),
(20, 'Castellano', 'root@localhost', '2020-11-04 14:44:22'),
(21, 'Castellano', 'root@localhost', '2020-11-04 15:33:56'),
(22, 'Catedra', 'root@localhost', '2020-11-04 15:57:06'),
(10, 'Deporte', 'root@localhost', '2020-11-04 20:12:26'),
(11, 'awfawf', 'root@localhost', '2020-11-07 02:14:39'),
(12, 'awfawf', 'root@localhost', '2020-11-07 04:49:40'),
(11, 'awfawfaw', 'root@localhost', '2020-11-07 16:37:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_update`
--

DROP TABLE IF EXISTS `materia_update`;
CREATE TABLE IF NOT EXISTS `materia_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_nombre` varchar(100) DEFAULT NULL,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia_update`
--

INSERT INTO `materia_update` (`anterior_id`, `anterior_nombre`, `nuevo_id`, `nuevo_nombre`, `usuario`, `updated_at`) VALUES
(9, 'Historia', 9, 'Catedra', 'root@localhost', '2020-11-04 16:04:28'),
(9, 'Catedra', 9, 'Historia', 'root@localhost', '2020-11-04 16:07:22'),
(9, 'Historia', 9, 'Catedra', 'root@localhost', '2020-11-04 16:10:28'),
(9, 'Catedra', 9, 'Historia', 'root@localhost', '2020-11-04 16:11:02'),
(10, 'Deporte', 10, 'Deporteee', 'root@localhost', '2020-11-07 02:14:21'),
(10, 'Deporteee', 10, 'Deporte', 'root@localhost', '2020-11-07 02:14:27'),
(12, 'awfawf', 12, 'awfawfawfawfw', 'root@localhost', '2020-11-07 04:49:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `numero_tipo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id`, `nombre`, `tipo`, `numero_tipo`) VALUES
(2, 'Primaria', 'Grado', '1'),
(3, 'Primaria', 'Grado', '2'),
(4, 'Primaria', 'Grado', '3'),
(5, 'Primaria', 'Grado', '4'),
(6, 'Primaria', 'Grado', '5'),
(7, 'Primaria', 'Grado', '6'),
(8, 'Bachillerato', 'Año', '1'),
(9, 'Bachillerato', 'Año', '2'),
(10, 'Bachillerato', 'Año', '3'),
(11, 'Bachillerato', 'Año', '4'),
(16, 'Bachillerato', 'Año', '5');

--
-- Disparadores `nivel`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_NIVEL_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_NIVEL_BU` BEFORE UPDATE ON `nivel` FOR EACH ROW INSERT INTO nivel_update VALUES(OLD.id, OLD.nombre, OLD.tipo, OLD.numero_tipo, NEW.id, NEW.nombre, NEW.tipo, NEW.numero_tipo, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_NIVEL_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_NIVEL_AD` AFTER DELETE ON `nivel` FOR EACH ROW INSERT INTO nivel_delete VALUES(OLD.id, OLD.nombre, OLD.tipo, OLD.numero_tipo, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `NIVEL_AI`;
DELIMITER $$
CREATE TRIGGER `NIVEL_AI` AFTER INSERT ON `nivel` FOR EACH ROW INSERT INTO nivel_insert VALUES(NEW.id, NEW.nombre, NEW.tipo, NEW.numero_tipo, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_delete`
--

DROP TABLE IF EXISTS `nivel_delete`;
CREATE TABLE IF NOT EXISTS `nivel_delete` (
  `id` int(255) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `numero_tipo` varchar(150) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_delete`
--

INSERT INTO `nivel_delete` (`id`, `nombre`, `tipo`, `numero_tipo`, `usuario`, `deleted_at`) VALUES
(1, 'Primaria', 'Grado', '2', 'root@localhost', '2020-10-22 21:15:11'),
(1, 'awf123123', '', '', 'root@localhost', '2020-10-23 01:25:10'),
(2, '1231231', '', '', 'root@localhost', '2020-10-23 01:31:37'),
(3, 'awf123123', '', '', 'root@localhost', '2020-10-23 01:36:55'),
(4, 'Primaria', '', '', 'root@localhost', '2020-10-23 01:36:57'),
(1, 'Primaria', '', '', 'root@localhost', '2020-10-23 01:50:11'),
(13, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 01:37:01'),
(14, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 02:29:56'),
(15, 'Bachillerato', 'Año', '5', 'root@localhost', '2020-10-27 02:31:17'),
(16, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 02:38:26'),
(20, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 02:49:29'),
(19, 'Primaria', 'Grado', '2', 'root@localhost', '2020-10-27 02:49:33'),
(18, 'Bachillerato', 'Año', '3', 'root@localhost', '2020-10-27 02:49:41'),
(17, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 02:49:48'),
(12, 'Bachillerato', 'Año', '5', 'root@localhost', '2020-11-04 14:09:08'),
(13, 'Bachillerato', 'Año', '5', 'root@localhost', '2020-11-05 20:13:40'),
(14, 'Primaria', 'Año', '1', 'root@localhost', '2020-11-05 20:14:09'),
(15, 'Bachillerato', 'Año', '5', 'root@localhost', '2020-11-07 16:34:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_insert`
--

DROP TABLE IF EXISTS `nivel_insert`;
CREATE TABLE IF NOT EXISTS `nivel_insert` (
  `id` int(255) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `numero_tipo` varchar(150) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_insert`
--

INSERT INTO `nivel_insert` (`id`, `nombre`, `tipo`, `numero_tipo`, `usuario`, `created_at`) VALUES
(1, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-22 20:57:20'),
(1, 'awf123123', '', '', 'root@localhost', '2020-10-23 01:23:59'),
(2, '1231231', '', '', 'root@localhost', '2020-10-23 01:28:58'),
(3, 'awf123123', '', '', 'root@localhost', '2020-10-23 01:31:47'),
(4, 'Primaria', '', '', 'root@localhost', '2020-10-23 01:36:24'),
(1, 'Primaria', '', '', 'root@localhost', '2020-10-23 01:48:47'),
(2, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-23 01:51:23'),
(3, 'Primaria', 'Grado', '2', 'root@localhost', '2020-10-23 01:51:50'),
(4, 'Primaria', 'Grado', '3', 'root@localhost', '2020-10-23 01:51:58'),
(5, 'Primaria', 'Grado', '4', 'root@localhost', '2020-10-23 01:52:04'),
(6, 'Primaria', 'Grado', '5', 'root@localhost', '2020-10-23 01:52:11'),
(7, 'Primaria', 'Grado', '6', 'root@localhost', '2020-10-23 01:52:19'),
(8, 'Bachillerato', 'Año', '1', 'root@localhost', '2020-10-23 01:57:53'),
(9, 'Bachillerato', 'Año', '2', 'root@localhost', '2020-10-23 01:59:13'),
(10, 'Bachillerato', 'Año', '3', 'root@localhost', '2020-10-23 02:01:56'),
(11, 'Bachillerato', 'Año', '4', 'root@localhost', '2020-10-23 02:02:07'),
(12, 'Bachillerato', 'Año', '5', 'root@localhost', '2020-10-23 02:02:13'),
(13, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 01:36:27'),
(14, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 02:28:32'),
(15, 'Bachillerato', 'Año', '5', 'root@localhost', '2020-10-27 02:30:44'),
(16, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 02:32:39'),
(17, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 02:39:36'),
(18, 'Bachillerato', 'Año', '3', 'root@localhost', '2020-10-27 02:41:15'),
(19, 'Primaria', 'Grado', '2', 'root@localhost', '2020-10-27 02:41:48'),
(20, 'Primaria', 'Grado', '1', 'root@localhost', '2020-10-27 02:42:25'),
(13, 'Bachillerato', 'Año', '5', 'root@localhost', '2020-11-04 14:09:35'),
(14, 'Primaria', 'Año', '1', 'root@localhost', '2020-11-05 20:13:59'),
(15, 'Bachillerato', 'Año', '5', 'root@localhost', '2020-11-05 20:14:21'),
(16, 'Bachillerato', 'Año', '5', 'root@localhost', '2020-11-07 16:35:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_update`
--

DROP TABLE IF EXISTS `nivel_update`;
CREATE TABLE IF NOT EXISTS `nivel_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_nombre` varchar(150) DEFAULT NULL,
  `anterior_tipo` varchar(100) DEFAULT NULL,
  `anterior_numero_tipo` varchar(150) DEFAULT NULL,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_nombre` varchar(150) DEFAULT NULL,
  `nuevo_tipo` varchar(100) DEFAULT NULL,
  `nuevo_numero_tipo` varchar(150) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_update`
--

INSERT INTO `nivel_update` (`anterior_id`, `anterior_nombre`, `anterior_tipo`, `anterior_numero_tipo`, `nuevo_id`, `nuevo_nombre`, `nuevo_tipo`, `nuevo_numero_tipo`, `usuario`, `updated_at`) VALUES
(1, 'Primaria', 'Grado', '1', 1, 'Primaria', 'Grado', '2', 'root@localhost', '2020-10-22 21:09:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(255) NOT NULL,
  `estudiante_id` int(255) NOT NULL,
  `materia_id` int(255) NOT NULL,
  `primera_nota` varchar(120) DEFAULT NULL,
  `segunda_nota` varchar(120) DEFAULT NULL,
  `tercera_nota` varchar(120) DEFAULT NULL,
  `cuarta_nota` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nota_estudiante` (`estudiante_id`),
  KEY `fk_nota_materia` (`materia_id`),
  KEY `fk_nota_usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id`, `usuario_id`, `estudiante_id`, `materia_id`, `primera_nota`, `segunda_nota`, `tercera_nota`, `cuarta_nota`) VALUES
(9, 8, 1, 3, '15', '20', '10', '05'),
(10, 6, 1, 7, '20', '20', '20', '20'),
(11, 6, 2, 7, '10', '15', '10', '05');

--
-- Disparadores `nota`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_NOTA_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_NOTA_BU` BEFORE UPDATE ON `nota` FOR EACH ROW INSERT INTO nota_update VALUES(OLD.id, OLD.estudiante_id, OLD.materia_id, OLD.primera_nota, OLD.segunda_nota, OLD.tercera_nota, OLD.cuarta_nota, OLD.usuario_id, NEW.id, NEW.estudiante_id, NEW.materia_id, NEW.primera_nota, NEW.segunda_nota, NEW.tercera_nota, NEW.cuarta_nota, NEW.usuario_id, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_NOTA_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_NOTA_AD` AFTER DELETE ON `nota` FOR EACH ROW INSERT INTO nota_delete VALUES(OLD.id, OLD.estudiante_id, OLD.materia_id, OLD.primera_nota, OLD.segunda_nota, OLD.tercera_nota, OLD.cuarta_nota, OLD.usuario_id, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `NOTA_AI`;
DELIMITER $$
CREATE TRIGGER `NOTA_AI` AFTER INSERT ON `nota` FOR EACH ROW INSERT INTO nota_insert VALUES(NEW.id, NEW.estudiante_id, NEW.materia_id, NEW.primera_nota, NEW.segunda_nota, NEW.tercera_nota, NEW.cuarta_nota, NEW.usuario_id, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_delete`
--

DROP TABLE IF EXISTS `nota_delete`;
CREATE TABLE IF NOT EXISTS `nota_delete` (
  `id` int(255) DEFAULT NULL,
  `estudiante_id` int(255) DEFAULT NULL,
  `materia_id` int(255) DEFAULT NULL,
  `primera_nota` varchar(120) DEFAULT NULL,
  `segunda_nota` varchar(120) DEFAULT NULL,
  `tercera_nota` varchar(120) DEFAULT NULL,
  `cuarta_nota` varchar(120) DEFAULT NULL,
  `nota_final` varchar(120) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota_delete`
--

INSERT INTO `nota_delete` (`id`, `estudiante_id`, `materia_id`, `primera_nota`, `segunda_nota`, `tercera_nota`, `cuarta_nota`, `nota_final`, `usuario`, `deleted_at`) VALUES
(5, 3, 1, '05', '05', '05', '05', '0', 'root@localhost', '2020-11-02 23:05:16'),
(4, 2, 1, '20', '05', '05', '10', '0', 'root@localhost', '2020-11-02 23:05:20'),
(3, 2, 9, '05', '05', '10', '15', '0', 'root@localhost', '2020-11-02 23:05:24'),
(2, 11, 9, '10', '10', '20', '05', '0', 'root@localhost', '2020-11-02 23:05:28'),
(1, 1, 1, '15', '15', '10', '05', '0', 'root@localhost', '2020-11-02 23:05:30'),
(6, 2, 7, '05', '05', '05', '10', '6', 'root@localhost', '2020-11-05 20:03:41'),
(7, 1, 7, '10', '15', '15', '20', '6', 'root@localhost', '2020-11-05 20:10:26'),
(8, 1, 7, '20', '10', '15', '05', '6', 'root@localhost', '2020-11-07 03:34:45'),
(11, 2, 7, '20', '20', '20', '20', '6', 'root@localhost', '2020-11-07 04:49:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_insert`
--

DROP TABLE IF EXISTS `nota_insert`;
CREATE TABLE IF NOT EXISTS `nota_insert` (
  `id` int(255) DEFAULT NULL,
  `estudiante_id` int(255) DEFAULT NULL,
  `materia_id` int(255) DEFAULT NULL,
  `primera_nota` varchar(120) DEFAULT NULL,
  `segunda_nota` varchar(120) DEFAULT NULL,
  `tercera_nota` varchar(120) DEFAULT NULL,
  `cuarta_nota` varchar(120) DEFAULT NULL,
  `nota_final` varchar(120) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota_insert`
--

INSERT INTO `nota_insert` (`id`, `estudiante_id`, `materia_id`, `primera_nota`, `segunda_nota`, `tercera_nota`, `cuarta_nota`, `nota_final`, `usuario`, `created_at`) VALUES
(1, 1, 1, '15', '15', '10', '05', NULL, 'root@localhost', '2020-11-02 22:14:36'),
(2, 11, 9, '10', '10', '20', '05', NULL, 'root@localhost', '2020-11-02 22:38:57'),
(3, 2, 9, '05', '05', '10', '15', NULL, 'root@localhost', '2020-11-02 22:42:51'),
(4, 2, 1, '20', '05', '05', '10', NULL, 'root@localhost', '2020-11-02 22:46:42'),
(5, 3, 1, '05', '05', '05', '05', NULL, 'root@localhost', '2020-11-02 22:49:46'),
(6, 2, 7, '05', '05', '05', '10', '6', 'root@localhost', '2020-11-02 23:09:42'),
(7, 1, 7, '10', '15', '15', '20', '6', 'root@localhost', '2020-11-05 20:04:10'),
(8, 1, 7, '20', '10', '15', '05', '6', 'root@localhost', '2020-11-06 00:53:13'),
(9, 1, 3, '15', '20', '10', '05', '8', 'root@localhost', '2020-11-06 19:44:13'),
(10, 1, 7, '20', '20', '20', '20', '6', 'root@localhost', '2020-11-07 03:34:50'),
(11, 2, 7, '20', '20', '20', '20', '6', 'root@localhost', '2020-11-07 03:53:10'),
(11, 2, 7, '10', '15', '10', '05', '6', 'root@localhost', '2020-11-07 16:40:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_update`
--

DROP TABLE IF EXISTS `nota_update`;
CREATE TABLE IF NOT EXISTS `nota_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_estudiante_id` int(255) DEFAULT NULL,
  `anterior_materia_id` int(255) DEFAULT NULL,
  `anterior_primera_nota` varchar(120) DEFAULT NULL,
  `anterior_segunda_nota` varchar(120) DEFAULT NULL,
  `anterior_tercera_nota` varchar(120) DEFAULT NULL,
  `anterior_cuarta_nota` varchar(120) DEFAULT NULL,
  `anterior_nota_final` varchar(120) DEFAULT NULL,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_estudiante_id` int(255) DEFAULT NULL,
  `nuevo_materia_id` int(255) DEFAULT NULL,
  `nuevo_primera_nota` varchar(120) DEFAULT NULL,
  `nuevo_segunda_nota` varchar(120) DEFAULT NULL,
  `nuevo_tercera_nota` varchar(120) DEFAULT NULL,
  `nuevo_cuarta_nota` varchar(120) DEFAULT NULL,
  `nuevo_nota_final` varchar(120) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

DROP TABLE IF EXISTS `pago`;
CREATE TABLE IF NOT EXISTS `pago` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(255) NOT NULL,
  `tipo_pago` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `nombre_pago` varchar(50) NOT NULL,
  `transferencia` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pago_estudiante` (`estudiante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `estudiante_id`, `tipo_pago`, `descripcion`, `nombre_pago`, `transferencia`, `created_at`, `updated_at`) VALUES
(5, 3, 'transferencia', 'pago de Inscripcion de75 mil pesos en transferencia', 'inscripcion', 'Anotación 2020-02-11 223445.png', '2020-10-27', '2020-10-27'),
(11, 3, 'efectivo', 'pago de matricula de 50 mil pesos abono en efectivo', 'matricula', 'NULL', '2020-10-27', '2020-10-27'),
(12, 3, 'transferencia', 'pago de matricula de 75 mil pesos', 'matricula', 'Base_Datos.png', '2020-10-27', '2020-10-27'),
(13, 3, 'efectivo', 'pago de matricula 40 mil pesos abono en efectivo', 'matricula', 'NULL', '2020-10-27', '2020-10-27'),
(14, 2, 'transferencia', 'pagando inscripcion del institute en transferencia', 'inscripcion', 'Caja Blanca.jpg', '2020-10-27', '2020-10-27'),
(15, 1, 'transferencia', 'pagando la inscripcion del instituto de 75 mil pesos ', 'inscripcion', 'Diagrama_tienda.png', '2020-10-27', '2020-10-27'),
(17, 5, 'transferencia', 'pago de inscripcion 75 mil pesos en transferencia', 'inscripcion', 'instagram-mobile-ios-iphone-ss-1920.jpg', '2020-10-29', '2020-10-29'),
(22, 10, 'transferencia', 'pago de inscripcion por transferencia de 75 mil pesos', 'inscripcion', 'Anotación 2020-02-11 223445.png', '2020-10-30', '2020-10-30'),
(23, 11, 'transferencia', 'pago de inscripcion por transferencia de 75 mil pesos', 'inscripcion', 'Diagrama1.png', '2020-11-02', '2020-11-02'),
(24, 12, 'efectivo', 'pago de inscripcion', 'inscripcion', 'NULL', '2020-11-06', '2020-11-06');

--
-- Disparadores `pago`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_PAGO_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_PAGO_BU` BEFORE UPDATE ON `pago` FOR EACH ROW INSERT INTO pago_update VALUES(OLD.id, OLD.estudiante_id, OLD.tipo_pago, OLD.descripcion, OLD.nombre_pago, OLD.transferencia, NEW.id, NEW.estudiante_id, NEW.tipo_pago, NEW.descripcion, NEW.nombre_pago, NEW.transferencia, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_PAGO_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_PAGO_AD` AFTER DELETE ON `pago` FOR EACH ROW INSERT INTO pago_delete VALUES(OLD.id, OLD.estudiante_id, OLD.tipo_pago, OLD.descripcion, OLD.nombre_pago, OLD.transferencia, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `PAGO_AI`;
DELIMITER $$
CREATE TRIGGER `PAGO_AI` AFTER INSERT ON `pago` FOR EACH ROW INSERT INTO pago_insert VALUES(NEW.id, NEW.estudiante_id, NEW.tipo_pago, NEW.descripcion, NEW.nombre_pago, NEW.transferencia, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_delete`
--

DROP TABLE IF EXISTS `pago_delete`;
CREATE TABLE IF NOT EXISTS `pago_delete` (
  `id` int(255) DEFAULT NULL,
  `estudiante_id` int(255) DEFAULT NULL,
  `tipo_pago` varchar(200) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `nombre_pago` varchar(100) DEFAULT NULL,
  `transferencia` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago_delete`
--

INSERT INTO `pago_delete` (`id`, `estudiante_id`, `tipo_pago`, `descripcion`, `nombre_pago`, `transferencia`, `usuario`, `deleted_at`) VALUES
(1, 3, 'efectivo', 'AFAWAWFAWAWFAWF', 'inscripcion', '', 'root@localhost', '2020-10-27 17:14:43'),
(2, 3, 'efectivo', 'awfawfawfawfaw', 'inscripcion', '', 'root@localhost', '2020-10-27 17:18:16'),
(3, 3, 'efectivo', 'asfawfawfawf', 'inscripcion', '', 'root@localhost', '2020-10-27 17:18:18'),
(4, 3, 'trasnsferencia', 'afawfawf', 'inscripcion', '', 'root@localhost', '2020-10-27 17:51:15'),
(7, 3, 'efectivo', 'pago de matricula 70 mil pesos abono en efectivo', 'matricula', 'NULL', 'root@localhost', '2020-10-27 18:59:38'),
(6, 3, 'efectivo', 'pago de matricula de 75 mil pesos en efectivo', 'matricula', 'NULL', 'root@localhost', '2020-10-27 18:59:41'),
(8, 3, 'efectivo', 'awfawfawfawfawf', 'matricula', 'NULL', 'root@localhost', '2020-10-27 19:08:42'),
(9, 3, 'efectivo', 'afawfawfawawf', 'matricula', 'NULL', 'root@localhost', '2020-10-27 19:08:45'),
(10, 3, 'efectivo', 'afawfawfawawf', 'matricula', 'NULL', 'root@localhost', '2020-10-27 19:09:23'),
(18, 6, 'transferencia', 'dawfafaawfaw', 'inscripcion', 'Anotación 2020-02-11 223445.png', 'root@localhost', '2020-10-30 23:16:31'),
(19, 7, 'transferencia', 'awfawfaw', 'inscripcion', '72ee98840e7754c96470e895d2eec0d4.png', 'root@localhost', '2020-10-30 23:16:33'),
(20, 8, 'transferencia', 'asfafawf', 'inscripcion', 'Caja Blanca.jpg', 'root@localhost', '2020-10-30 23:16:35'),
(21, 9, 'transferencia', 'dawfawf', 'inscripcion', 'Caja Blanca.jpg', 'root@localhost', '2020-10-30 23:16:38'),
(16, 4, 'transferencia', 'pago de inscripcion 4to año', 'inscripcion', 'app.jpg', 'root@localhost', '2020-11-05 17:23:15'),
(26, 13, 'transferencia', 'awfawfaawf', 'matricula', 'Caja Blanca.jpg', 'root@localhost', '2020-11-07 16:44:20'),
(25, 13, 'efectivo', 'awfawfawf', 'inscripcion', 'NULL', 'root@localhost', '2020-11-07 16:44:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_insert`
--

DROP TABLE IF EXISTS `pago_insert`;
CREATE TABLE IF NOT EXISTS `pago_insert` (
  `id` int(255) DEFAULT NULL,
  `estudiante_id` int(255) DEFAULT NULL,
  `tipo_pago` varchar(200) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `nombre_pago` varchar(100) DEFAULT NULL,
  `transferencia` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago_insert`
--

INSERT INTO `pago_insert` (`id`, `estudiante_id`, `tipo_pago`, `descripcion`, `nombre_pago`, `transferencia`, `usuario`, `created_at`) VALUES
(1, 3, 'efectivo', 'AFAWAWFAWAWFAWF', 'inscripcion', '', 'root@localhost', '2020-10-27 17:12:43'),
(2, 3, 'efectivo', 'awfawfawfawfaw', 'inscripcion', '', 'root@localhost', '2020-10-27 17:16:06'),
(3, 3, 'efectivo', 'asfawfawfawf', 'inscripcion', '', 'root@localhost', '2020-10-27 17:17:00'),
(4, 3, 'trasnsferencia', 'afawfawf', 'inscripcion', '', 'root@localhost', '2020-10-27 17:47:24'),
(5, 3, 'transferencia', 'pago de Inscripcion de75 mil pesos en transferencia', 'inscripcion', 'Anotación 2020-02-11 223445.png', 'root@localhost', '2020-10-27 18:55:52'),
(6, 3, 'efectivo', 'pago de matricula de 75 mil pesos en efectivo', 'matricula', 'NULL', 'root@localhost', '2020-10-27 18:56:51'),
(7, 3, 'efectivo', 'pago de matricula 70 mil pesos abono en efectivo', 'matricula', 'NULL', 'root@localhost', '2020-10-27 18:58:09'),
(8, 3, 'efectivo', 'awfawfawfawfawf', 'matricula', 'NULL', 'root@localhost', '2020-10-27 19:01:38'),
(9, 3, 'efectivo', 'afawfawfawawf', 'matricula', 'NULL', 'root@localhost', '2020-10-27 19:02:22'),
(10, 3, 'efectivo', 'afawfawfawawf', 'matricula', 'NULL', 'root@localhost', '2020-10-27 19:08:01'),
(11, 3, 'efectivo', 'pago de matricula de 50 mil pesos abono en efectivo', 'matricula', 'NULL', 'root@localhost', '2020-10-27 19:09:53'),
(12, 3, 'transferencia', 'pago de matricula de 75 mil pesos', 'matricula', 'Base_Datos.png', 'root@localhost', '2020-10-27 19:12:41'),
(13, 3, 'efectivo', 'pago de matricula 40 mil pesos abono en efectivo', 'matricula', 'NULL', 'root@localhost', '2020-10-27 19:13:20'),
(14, 2, 'transferencia', 'pagando inscripcion del institute en transferencia', 'inscripcion', 'Caja Blanca.jpg', 'root@localhost', '2020-10-27 19:35:42'),
(15, 1, 'transferencia', 'pagando la inscripcion del instituto de 75 mil pesos ', 'inscripcion', 'Diagrama_tienda.png', 'root@localhost', '2020-10-27 22:55:36'),
(16, 4, 'transferencia', 'pago de inscripcion 4to año', 'inscripcion', 'app.jpg', 'root@localhost', '2020-10-29 23:07:07'),
(17, 5, 'transferencia', 'pago de inscripcion 75 mil pesos en transferencia', 'inscripcion', 'instagram-mobile-ios-iphone-ss-1920.jpg', 'root@localhost', '2020-10-30 00:13:12'),
(18, 6, 'transferencia', 'dawfafaawfaw', 'inscripcion', 'Anotación 2020-02-11 223445.png', 'root@localhost', '2020-10-30 22:42:55'),
(19, 7, 'transferencia', 'awfawfaw', 'inscripcion', '72ee98840e7754c96470e895d2eec0d4.png', 'root@localhost', '2020-10-30 22:44:30'),
(20, 8, 'transferencia', 'asfafawf', 'inscripcion', 'Caja Blanca.jpg', 'root@localhost', '2020-10-30 22:46:11'),
(21, 9, 'transferencia', 'dawfawf', 'inscripcion', 'Caja Blanca.jpg', 'root@localhost', '2020-10-30 22:47:37'),
(22, 10, 'transferencia', 'pago de inscripcion por transferencia de 75 mil pesos', 'inscripcion', 'Anotación 2020-02-11 223445.png', 'root@localhost', '2020-10-31 01:01:57'),
(23, 11, 'transferencia', 'pago de inscripcion por transferencia de 75 mil pesos', 'inscripcion', 'Diagrama1.png', 'root@localhost', '2020-11-02 14:37:04'),
(24, 12, 'efectivo', 'pago de inscripcion', 'inscripcion', 'NULL', 'root@localhost', '2020-11-06 19:32:55'),
(25, 13, 'efectivo', 'awfawfawf', 'inscripcion', 'NULL', 'root@localhost', '2020-11-07 16:41:42'),
(26, 13, 'transferencia', 'awfawfaawf', 'matricula', 'Caja Blanca.jpg', 'root@localhost', '2020-11-07 16:42:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_update`
--

DROP TABLE IF EXISTS `pago_update`;
CREATE TABLE IF NOT EXISTS `pago_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_estudiante_id` int(255) DEFAULT NULL,
  `anterior_tipo_pago` varchar(200) DEFAULT NULL,
  `anterior_descripcion` varchar(100) DEFAULT NULL,
  `anterior_nombre_pago` varchar(100) DEFAULT NULL,
  `anterior_transferencia` varchar(100) DEFAULT NULL,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_estudiante_id` int(255) DEFAULT NULL,
  `nuevo_tipo_pago` varchar(200) DEFAULT NULL,
  `nuevo_descripcion` varchar(100) DEFAULT NULL,
  `nuevo_nombre_pago` varchar(100) DEFAULT NULL,
  `nuevo_transferencia` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

DROP TABLE IF EXISTS `seccion`;
CREATE TABLE IF NOT EXISTS `seccion` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(255) NOT NULL,
  `nombre_seccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_seccion_estudiante` (`estudiante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id`, `estudiante_id`, `nombre_seccion`) VALUES
(17, 3, 'B'),
(18, 1, 'A'),
(19, 2, 'A'),
(21, 5, 'B'),
(26, 10, 'A'),
(27, 11, 'B'),
(28, 12, 'A');

--
-- Disparadores `seccion`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_SECCION_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_SECCION_BU` BEFORE UPDATE ON `seccion` FOR EACH ROW INSERT INTO seccion_update VALUES(OLD.id, OLD.estudiante_id, OLD.nombre_seccion, NEW.id,  NEW.estudiante_id, NEW.nombre_seccion, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_SECCION_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_SECCION_AD` AFTER DELETE ON `seccion` FOR EACH ROW INSERT INTO seccion_delete VALUES(OLD.id, OLD.estudiante_id, OLD.nombre_seccion, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `SECCION_AI`;
DELIMITER $$
CREATE TRIGGER `SECCION_AI` AFTER INSERT ON `seccion` FOR EACH ROW INSERT INTO seccion_insert VALUES(NEW.id, NEW.estudiante_id, NEW.nombre_seccion, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_delete`
--

DROP TABLE IF EXISTS `seccion_delete`;
CREATE TABLE IF NOT EXISTS `seccion_delete` (
  `id` int(255) DEFAULT NULL,
  `estudiante_id` int(255) DEFAULT NULL,
  `nombre_seccion` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion_delete`
--

INSERT INTO `seccion_delete` (`id`, `estudiante_id`, `nombre_seccion`, `usuario`, `deleted_at`) VALUES
(22, 6, 'A', 'root@localhost', '2020-10-30 23:17:06'),
(23, 7, 'A', 'root@localhost', '2020-10-30 23:17:09'),
(24, 8, 'B', 'root@localhost', '2020-10-30 23:17:11'),
(25, 9, 'B', 'root@localhost', '2020-10-30 23:17:14'),
(20, 4, 'A', 'root@localhost', '2020-11-05 17:23:42'),
(29, 13, 'A', 'root@localhost', '2020-11-07 16:45:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_insert`
--

DROP TABLE IF EXISTS `seccion_insert`;
CREATE TABLE IF NOT EXISTS `seccion_insert` (
  `id` int(255) DEFAULT NULL,
  `estudiante_id` int(255) DEFAULT NULL,
  `nombre_seccion` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion_insert`
--

INSERT INTO `seccion_insert` (`id`, `estudiante_id`, `nombre_seccion`, `usuario`, `created_at`) VALUES
(17, 3, 'A', 'root@localhost', '2020-10-28 16:45:50'),
(18, 1, 'B', 'root@localhost', '2020-10-28 16:50:04'),
(19, 2, 'A', 'root@localhost', '2020-10-28 16:50:21'),
(20, 4, 'A', 'root@localhost', '2020-10-29 23:08:40'),
(21, 5, 'A', 'root@localhost', '2020-10-30 00:14:32'),
(22, 6, 'A', 'root@localhost', '2020-10-30 22:48:34'),
(23, 7, 'A', 'root@localhost', '2020-10-30 22:48:41'),
(24, 8, 'B', 'root@localhost', '2020-10-30 22:48:44'),
(25, 9, 'B', 'root@localhost', '2020-10-30 22:48:46'),
(26, 10, 'A', 'root@localhost', '2020-10-31 01:02:51'),
(27, 11, 'A', 'root@localhost', '2020-11-02 14:39:25'),
(28, 12, 'A', 'root@localhost', '2020-11-06 19:46:49'),
(29, 13, 'A', 'root@localhost', '2020-11-07 16:43:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_update`
--

DROP TABLE IF EXISTS `seccion_update`;
CREATE TABLE IF NOT EXISTS `seccion_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_estudiante_id` int(255) DEFAULT NULL,
  `anterior_nombre_seccion` varchar(100) DEFAULT NULL,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_estudiante_id` int(255) DEFAULT NULL,
  `nuevo_nombre_seccion` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion_update`
--

INSERT INTO `seccion_update` (`anterior_id`, `anterior_estudiante_id`, `anterior_nombre_seccion`, `nuevo_id`, `nuevo_estudiante_id`, `nuevo_nombre_seccion`, `usuario`, `updated_at`) VALUES
(17, 3, 'A', 17, 3, 'B', 'root@localhost', '2020-11-02 15:57:22'),
(21, 5, 'A', 21, 5, 'B', 'root@localhost', '2020-11-05 17:04:09'),
(27, 11, 'A', 27, 11, 'B', 'root@localhost', '2020-11-05 17:12:00'),
(18, 1, 'B', 18, 1, 'A', 'root@localhost', '2020-11-05 17:14:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(12) NOT NULL,
  `role` varchar(15) DEFAULT NULL,
  `primer_nombre` varchar(150) NOT NULL,
  `segundo_nombre` varchar(150) NOT NULL,
  `primer_apellido` varchar(150) NOT NULL,
  `segundo_apellido` varchar(150) NOT NULL,
  `telefono_celular` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sexo` varchar(150) NOT NULL,
  `direccion` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`),
  UNIQUE KEY `uq_cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `cedula`, `role`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `telefono_celular`, `email`, `sexo`, `direccion`) VALUES
(1, '21512304', 'admin', 'eyder', 'alejandro', 'garcia', 'vivas', '04141245789', 'admin@admin.com', 'Masculino', 'barrio obrero calle 10 carrera 18 17 casa m-1502'),
(4, '12563489', 'user', 'Paco', 'Alejandro', 'Lopez', 'Gomez', '4125369874', 'paco@paco.com', 'Masculino', 'final avenida san lorenzo, calle 16 con carrera 12 y 13 casa m#12'),
(5, '28230413', 'user', 'Miguel', 'Andrade', 'Bustamante', 'Vivas', '4247758091', 'miguel@miguel.com', 'Masculino', 'calle principal, av ferrero tamayo con carrera 12 y14 casa m-223'),
(6, '10146203', 'user', 'Maria', 'Jose', 'Huiza', 'Mendez', '4126547896', 'mariah@gmail.com', 'Femenino', 'Av los agustinos, calle principal con carrera 6 y7 subiendo por el preescolar san benito casa m-253'),
(8, '45637890', 'user', 'Edgar', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira');

--
-- Disparadores `usuario`
--
DROP TRIGGER IF EXISTS `ACTUALIZA_USUARIO_BU`;
DELIMITER $$
CREATE TRIGGER `ACTUALIZA_USUARIO_BU` BEFORE UPDATE ON `usuario` FOR EACH ROW INSERT INTO usuario_update VALUES(OLD.id, OLD.cedula, OLD.role, OLD.primer_nombre, OLD.segundo_nombre, OLD.primer_apellido, OLD.segundo_apellido, OLD.telefono_celular, OLD.email, OLD.sexo, OLD.direccion, NEW.id, NEW.cedula, NEW.role, NEW.primer_nombre, NEW.segundo_nombre, NEW.primer_apellido, NEW.segundo_apellido, NEW.telefono_celular, NEW.email, NEW.sexo, NEW.direccion, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ELIMINA_USUARIO_AD`;
DELIMITER $$
CREATE TRIGGER `ELIMINA_USUARIO_AD` AFTER DELETE ON `usuario` FOR EACH ROW INSERT INTO usuario_delete VALUES(OLD.id, OLD.cedula, OLD.role, OLD.primer_nombre, OLD.segundo_nombre, OLD.primer_apellido, OLD.segundo_apellido, OLD.telefono_celular, OLD.email, OLD.sexo, OLD.direccion, CURRENT_USER(), NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `USUARIO_AI`;
DELIMITER $$
CREATE TRIGGER `USUARIO_AI` AFTER INSERT ON `usuario` FOR EACH ROW INSERT INTO usuario_insert VALUES(NEW.id, NEW.cedula, NEW.role, NEW.primer_nombre, NEW.segundo_nombre, NEW.primer_apellido, NEW.segundo_apellido, NEW.telefono_celular, NEW.email, NEW.sexo, NEW.direccion, CURRENT_USER(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_delete`
--

DROP TABLE IF EXISTS `usuario_delete`;
CREATE TABLE IF NOT EXISTS `usuario_delete` (
  `id` int(255) DEFAULT NULL,
  `cedula` varchar(12) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL,
  `primer_nombre` varchar(150) DEFAULT NULL,
  `segundo_nombre` varchar(150) DEFAULT NULL,
  `primer_apellido` varchar(150) DEFAULT NULL,
  `segundo_apellido` varchar(150) DEFAULT NULL,
  `telefono_celular` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `sexo` varchar(150) DEFAULT NULL,
  `direccion` text,
  `usuario` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_delete`
--

INSERT INTO `usuario_delete` (`id`, `cedula`, `role`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `telefono_celular`, `email`, `sexo`, `direccion`, `usuario`, `deleted_at`) VALUES
(9, '12345678', 'user', 'awfawf', 'awfawf', 'awfawf', 'awfaw', '1234567891', 'afwfaawf@gmail.com', 'Masculino', 'awfawfaw', 'root@localhost', '2020-11-04 20:13:59'),
(10, '98345627', 'user', 'holaaaa', 'bien', 'awfawf', 'awfawf', '12345678912', 'awfawawfawf@gmail.com', 'Masculino', 'holaaaaaaaaaaaaaaaa', 'root@localhost', '2020-11-04 20:17:40'),
(7, '23415678', 'user', 'Jesus', 'Alexis', 'Arias', 'Fuentes', '4147748971', 'alexis@alexis.com', 'Masculino', 'Terminal de pasajeros calle 7 con carrera 11 y 12', 'root@localhost', '2020-11-04 20:22:20'),
(9, '32415678', 'user', 'awfawf', 'awfawf', 'awfawf', 'awfawf', '21345678943', 'awfaa@asdfas.com', 'Masculino', 'dawdawdawd', 'root@localhost', '2020-11-06 01:24:06'),
(9, '12345678', 'user', 'awfawf', 'awfawf', 'awfawf', 'awfawf', '12345678912', 'awdawd@wawfawf.com', 'Masculino', 'awfawfaw', 'root@localhost', '2020-11-07 03:28:41'),
(9, '12345678', 'user', 'awfawf', 'aawf', 'awfawf', 'awfawf', '12345678945', 'awfaa@asdfas.com', 'Femenino', 'awfawfawf', 'root@localhost', '2020-11-07 16:38:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_insert`
--

DROP TABLE IF EXISTS `usuario_insert`;
CREATE TABLE IF NOT EXISTS `usuario_insert` (
  `id` int(255) DEFAULT NULL,
  `cedula` varchar(12) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL,
  `primer_nombre` varchar(150) DEFAULT NULL,
  `segundo_nombre` varchar(150) DEFAULT NULL,
  `primer_apellido` varchar(150) DEFAULT NULL,
  `segundo_apellido` varchar(150) DEFAULT NULL,
  `telefono_celular` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `sexo` varchar(150) DEFAULT NULL,
  `direccion` text,
  `usuario` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_insert`
--

INSERT INTO `usuario_insert` (`id`, `cedula`, `role`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `telefono_celular`, `email`, `sexo`, `direccion`, `usuario`, `created_at`) VALUES
(1, '21512304', 'admin', 'eyder', 'alejandro', 'garcia', 'vivas', '04141245789', 'admin@admin', 'Masculino', 'barrio obrero calle 10 carrera 18 17 casa m-1502', 'root@localhost', '2020-10-22 22:40:44'),
(4, '12563489', 'user', 'Paco', 'Alejandro', 'Lopez', 'Gomez', '4125369874', 'paco@paco.com', 'Masculino', 'final avenida san lorenzo, calle 16 con carrera 12 y 13 casa m#12', 'root@localhost', '2020-10-23 16:01:16'),
(5, '28230413', 'user', 'Miguel', 'Andrade', 'Bustamante', 'Vivas', '4247758091', 'miguel@miguel.com', 'Masculino', 'calle principal, av ferrero tamayo con carrera 12 y14 casa m-223', 'root@localhost', '2020-10-23 16:04:45'),
(6, '10146203', 'user', 'Maria', 'Jose', 'Huiza', 'Mendez', '4126547896', 'mariah@gmail.com', 'Femenino', 'Av los agustinos, calle principal con carrera 6 y7 subiendo por el preescolar san benito casa m-253', 'root@localhost', '2020-10-23 16:06:29'),
(7, '23415678', 'user', 'Jesus', 'Alexis', 'Arias', 'Fuentes', '4147748971', 'alexis@alexis.com', 'Masculino', 'Terminal de pasajeros calle 7 con carrera 11 y 12', 'root@localhost', '2020-10-26 15:47:00'),
(8, '45637890', 'user', 'Edgar', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 'root@localhost', '2020-10-28 22:33:55'),
(9, '12345678', 'user', 'awfawf', 'awfawf', 'awfawf', 'awfaw', '1234567891', 'afwfaawf@gmail.com', 'Masculino', 'awfawfaw', 'root@localhost', '2020-11-04 20:13:55'),
(10, '12345678', 'user', 'awfawf', 'awfawf', 'awfawf', 'awfawf', '1234567891', 'awfawawfawf@gmail.com', 'Femenino', 'awfawfwaf', 'root@localhost', '2020-11-04 20:16:33'),
(9, '32415678', 'user', 'awfawf', 'awfawf', 'awfawf', 'awfawf', '21345678943', 'awfaa@asdfas.com', 'Masculino', 'dawdawdawd', 'root@localhost', '2020-11-06 01:23:39'),
(9, '12345678', 'user', 'awfawf', 'awfawf', 'awfawf', 'awfawf', '12345678912', 'awdawd@wawfawf.com', 'Masculino', 'awfawfaw', 'root@localhost', '2020-11-07 03:28:37'),
(9, '12345678', 'user', 'awfawf', 'aawf', 'awfawf', 'awfawf', '12345678945', 'awfaa@asdfas.com', 'Femenino', 'awfawfawf', 'root@localhost', '2020-11-07 16:38:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_update`
--

DROP TABLE IF EXISTS `usuario_update`;
CREATE TABLE IF NOT EXISTS `usuario_update` (
  `anterior_id` int(255) DEFAULT NULL,
  `anterior_cedula` varchar(12) DEFAULT NULL,
  `anterior_role` varchar(15) DEFAULT NULL,
  `anterior_primer_nombre` varchar(150) DEFAULT NULL,
  `anterior_segundo_nombre` varchar(150) DEFAULT NULL,
  `anterior_primer_apellido` varchar(150) DEFAULT NULL,
  `anterior_segundo_apellido` varchar(150) DEFAULT NULL,
  `anterior_telefono_celular` varchar(100) DEFAULT NULL,
  `anterior_email` varchar(150) DEFAULT NULL,
  `anterior_sexo` varchar(150) DEFAULT NULL,
  `anterior_direccion` text,
  `nuevo_id` int(255) DEFAULT NULL,
  `nuevo_cedula` varchar(12) DEFAULT NULL,
  `nuevo_role` varchar(15) DEFAULT NULL,
  `nuevo_primer_nombre` varchar(150) DEFAULT NULL,
  `nuevo_segundo_nombre` varchar(150) DEFAULT NULL,
  `nuevo_primer_apellido` varchar(150) DEFAULT NULL,
  `nuevo_segundo_apellido` varchar(150) DEFAULT NULL,
  `nuevo_telefono_celular` varchar(100) DEFAULT NULL,
  `nuevo_email` varchar(150) DEFAULT NULL,
  `nuevo_sexo` varchar(150) DEFAULT NULL,
  `nuevo_direccion` text,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_update`
--

INSERT INTO `usuario_update` (`anterior_id`, `anterior_cedula`, `anterior_role`, `anterior_primer_nombre`, `anterior_segundo_nombre`, `anterior_primer_apellido`, `anterior_segundo_apellido`, `anterior_telefono_celular`, `anterior_email`, `anterior_sexo`, `anterior_direccion`, `nuevo_id`, `nuevo_cedula`, `nuevo_role`, `nuevo_primer_nombre`, `nuevo_segundo_nombre`, `nuevo_primer_apellido`, `nuevo_segundo_apellido`, `nuevo_telefono_celular`, `nuevo_email`, `nuevo_sexo`, `nuevo_direccion`, `usuario`, `updated_at`) VALUES
(1, '21512304', 'admin', 'eyder', 'alejandro', 'garcia', 'vivas', '04141245789', 'admin@admin', 'Masculino', 'barrio obrero calle 10 carrera 18 17 casa m-1502', 1, '21512304', 'admin', 'eyder', 'alejandro', 'garcia', 'vivas', '04141245789', 'admin@admin.com', 'Masculino', 'barrio obrero calle 10 carrera 18 17 casa m-1502', 'root@localhost', '2020-10-23 00:08:40'),
(8, '45637890', 'user', 'Edgar', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 8, '45637890', 'user', 'Edgarrr', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomasss final avenida tachira', 'root@localhost', '2020-11-04 17:27:01'),
(8, '45637890', 'user', 'Edgarrr', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomasss final avenida tachira', 8, '45637890', 'user', 'Edgar', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 'root@localhost', '2020-11-04 17:27:16'),
(10, '12345678', 'user', 'awfawf', 'awfawf', 'awfawf', 'awfawf', '1234567891', 'awfawawfawf@gmail.com', 'Femenino', 'awfawfwaf', 10, '98345627', 'user', 'holaaaa', 'bien', 'awfawf', 'awfawf', '12345678912', 'awfawawfawf@gmail.com', 'Masculino', 'holaaaaaaaaaaaaaaaa', 'root@localhost', '2020-11-04 20:17:33'),
(8, '45637890', 'user', 'Edgar', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 8, '45637890', 'user', 'Edgarrr', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 'root@localhost', '2020-11-04 20:39:13'),
(8, '45637890', 'user', 'Edgarrr', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 8, '45637890', 'user', 'Edgar', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 'root@localhost', '2020-11-04 20:39:21'),
(8, '45637890', 'user', 'Edgar', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 8, '45637890', 'user', 'Edgarrrr', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 'root@localhost', '2020-11-07 03:28:59'),
(8, '45637890', 'user', 'Edgarrrr', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 8, '45637890', 'user', 'Edgar', 'Jorge', 'garcia', 'Vivas', '4147122559', 'edgar@gmail.com', 'Masculino', 'las lomas final avenida tachira', 'root@localhost', '2020-11-07 03:29:09');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control_pago`
--
ALTER TABLE `control_pago`
  ADD CONSTRAINT `fk_control_p_pago` FOREIGN KEY (`pago_id`) REFERENCES `pago` (`id`);

--
-- Filtros para la tabla `det_mat_prof`
--
ALTER TABLE `det_mat_prof`
  ADD CONSTRAINT `fk_det_mat_horario` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`id`),
  ADD CONSTRAINT `fk_det_mat_nivel` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`),
  ADD CONSTRAINT `fk_det_materia` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `fk_det_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_nivel` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscripcion_estudiante` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_estudiante` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id`),
  ADD CONSTRAINT `fk_nota_materia` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `fk_nota_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_pago_estudiante` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id`);

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `fk_seccion_estudiante` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
