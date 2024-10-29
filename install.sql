-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2024 a las 22:10:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasiodb`
--

-- Crear la base de datos
DROP DATABASE IF EXISTS gimnasiodb;

CREATE DATABASE IF NOT EXISTS `gimnasiodb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Usar la base de datos
USE `gimnasiodb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendado`
--

CREATE TABLE `agendado` (
  `nombre_cliente` varchar(50) NOT NULL,
  `nombre_gimnasio` varchar(50) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `mes` date NOT NULL,
  `pago` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agendado`
--

INSERT INTO `agendado` (`nombre_cliente`, `nombre_gimnasio`, `activo`, `mes`, `pago`) VALUES
('AlejandraPower', 'Local Ciudad Vieja', 1, '2024-02-01', 1),
('AlejandraPower', 'Local Ciudad Vieja', 1, '2024-03-01', 1),
('AlejandraPower', 'Local Ciudad Vieja', 1, '2024-04-01', 1),
('AlejandraPower', 'Local Ciudad Vieja', 1, '2024-05-01', 1),
('AlejandraPower', 'Local Ciudad Vieja', 1, '2024-06-01', 1),
('AlejandraPower', 'Local Ciudad Vieja', 1, '2024-07-01', 1),
('AlejandraPower', 'Local Ciudad Vieja', 1, '2024-08-01', 1),
('AlejandraPower', 'Local Ciudad Vieja', 1, '2024-09-01', 0),
('AlejandraPower', 'Local Ciudad Vieja', 1, '2024-10-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2023-04-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2023-05-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2023-06-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2023-07-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2023-08-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2023-09-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2023-10-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2023-11-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2024-04-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2024-05-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2024-06-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2024-07-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2024-08-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2024-09-01', 1),
('AndreaPro1', 'Local Central Ciudad Vieja', 1, '2024-10-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-01-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-02-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-04-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-05-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-06-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-07-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-08-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-09-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-10-01', 0),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-11-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2023-12-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2024-01-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2024-02-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2024-04-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2024-05-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2024-06-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2024-07-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2024-08-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2024-09-01', 1),
('AntonioTrainer', 'Local grande Carrasco', 1, '2024-10-01', 0),
('CamiFit2', 'Local Central Ciudad Vieja', 0, '2023-01-01', 0),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2023-02-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2023-03-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2023-04-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2023-05-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2023-06-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2023-08-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2023-09-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2023-10-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2023-11-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2024-02-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2024-03-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2024-04-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2024-05-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2024-06-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2024-08-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2024-09-01', 1),
('CamiFit2', 'Local Central Ciudad Vieja', 1, '2024-10-01', 1),
('CarlaGym3', 'Local Malvín', 1, '2024-04-01', 1),
('CarlaGym3', 'Local Malvín', 1, '2024-05-01', 1),
('CarlaGym3', 'Local Malvín', 1, '2024-06-01', 1),
('CarlaGym3', 'Local Malvín', 1, '2024-07-01', 1),
('CarlaGym3', 'Local Malvín', 1, '2024-08-01', 1),
('CarlaGym3', 'Local Malvín', 1, '2024-09-01', 1),
('CarlaGym3', 'Local Malvín', 1, '2024-10-01', 1),
('CarlosFit9', 'Local Buceo Luis Alberto de Herrera', 1, '2023-07-01', 1),
('CarlosFit9', 'Local Buceo Luis Alberto de Herrera', 1, '2023-08-01', 1),
('CarlosFit9', 'Local Buceo Luis Alberto de Herrera', 1, '2023-09-01', 1),
('CarlosFit9', 'Local Buceo Luis Alberto de Herrera', 1, '2023-10-01', 1),
('CarlosFit9', 'Local Buceo Luis Alberto de Herrera', 1, '2023-11-01', 0),
('CarlosFit9', 'Local Buceo Luis Alberto de Herrera', 1, '2024-07-01', 1),
('CarlosFit9', 'Local Buceo Luis Alberto de Herrera', 1, '2024-08-01', 1),
('CarlosFit9', 'Local Buceo Luis Alberto de Herrera', 1, '2024-09-01', 1),
('CarlosFit9', 'Local Buceo Luis Alberto de Herrera', 1, '2024-10-01', 1),
('cliente', 'Local Buceo Luis Alberto de Herrera', 1, '2023-09-01', 1),
('cliente', 'Local Buceo Luis Alberto de Herrera', 1, '2023-10-01', 0),
('cliente', 'Local Buceo Luis Alberto de Herrera', 1, '2024-09-01', 1),
('cliente', 'Local Buceo Luis Alberto de Herrera', 1, '2024-10-01', 0),
('DiegoPower', 'Local Ciudad Vieja', 1, '2023-06-01', 1),
('DiegoPower', 'Local Ciudad Vieja', 1, '2023-07-01', 1),
('DiegoPower', 'Local Ciudad Vieja', 1, '2023-08-01', 1),
('DiegoPower', 'Local Ciudad Vieja', 1, '2023-09-01', 1),
('DiegoPower', 'Local Ciudad Vieja', 1, '2023-10-01', 0),
('DiegoPower', 'Local Ciudad Vieja', 1, '2023-11-01', 1),
('DiegoPower', 'Local Ciudad Vieja', 1, '2024-06-01', 1),
('DiegoPower', 'Local Ciudad Vieja', 1, '2024-07-01', 1),
('DiegoPower', 'Local Ciudad Vieja', 1, '2024-08-01', 1),
('DiegoPower', 'Local Ciudad Vieja', 1, '2024-09-01', 1),
('DiegoPower', 'Local Ciudad Vieja', 1, '2024-10-01', 0),
('ElenaPower', 'Local grande Carrasco', 1, '2023-03-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2023-04-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2023-05-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2023-06-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2023-07-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2023-08-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2023-09-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2023-10-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2023-11-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2024-03-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2024-04-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2024-05-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2024-06-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2024-07-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2024-08-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2024-09-01', 1),
('ElenaPower', 'Local grande Carrasco', 1, '2024-10-01', 1),
('EmilioPro', 'Local Centro 18 de Julio', 0, '2023-10-01', 1),
('EmilioPro', 'Local Centro 18 de Julio', 0, '2024-10-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-01-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-02-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-03-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-04-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-05-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-06-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-07-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-08-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-09-01', 1),
('FelipePro1', 'Local Central Ciudad Vieja', 1, '2024-10-01', 1),
('FlorenciaPro2', 'Local grande Carrasco', 1, '2024-01-01', 1),
('FlorenciaPro2', 'Local grande Carrasco', 1, '2024-02-01', 1),
('FlorenciaPro2', 'Local grande Carrasco', 1, '2024-03-01', 1),
('FlorenciaPro2', 'Local grande Carrasco', 1, '2024-04-01', 1),
('FlorenciaPro2', 'Local grande Carrasco', 1, '2024-05-01', 1),
('FlorenciaPro2', 'Local grande Carrasco', 1, '2024-06-01', 1),
('FlorenciaPro2', 'Local grande Carrasco', 1, '2024-07-01', 1),
('FlorenciaPro2', 'Local grande Carrasco', 0, '2024-10-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2023-04-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2023-05-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2023-06-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2023-07-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2023-08-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2023-09-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2023-10-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2024-04-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2024-05-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2024-06-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2024-07-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2024-08-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2024-09-01', 1),
('FlorenciaTop', 'Local Malvín', 1, '2024-10-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-01-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-02-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-03-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-04-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-05-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-07-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-08-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-09-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-10-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2023-11-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2024-01-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2024-02-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2024-03-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2024-04-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2024-05-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2024-07-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2024-08-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2024-09-01', 1),
('FranciscaFit', 'Local Central Ciudad Vieja', 1, '2024-10-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2023-04-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2023-05-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2023-06-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2023-07-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2023-08-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2023-09-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2023-10-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2024-04-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2024-05-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2024-06-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2024-07-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2024-08-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2024-09-01', 1),
('GustavoFit', 'Local Centro 18 de Julio', 1, '2024-10-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2023-03-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2023-04-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2023-05-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2023-06-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2023-07-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2023-08-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2023-09-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2023-10-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2023-11-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2024-03-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2024-04-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2024-05-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2024-06-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2024-07-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2024-08-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2024-09-01', 1),
('IgnacioTrainer', 'Local Malvín', 1, '2024-10-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2023-06-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2023-07-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2023-08-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2023-09-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2023-10-01', 0),
('IsabelTop', 'Local pequeño Pocitos', 1, '2023-11-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2024-06-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2024-07-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2024-08-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2024-09-01', 1),
('IsabelTop', 'Local pequeño Pocitos', 1, '2024-10-01', 1),
('juan23', 'Local Buceo Luis Alberto de Herrera', 1, '2024-04-01', 1),
('juan23', 'Local Buceo Luis Alberto de Herrera', 1, '2024-05-01', 1),
('juan23', 'Local Buceo Luis Alberto de Herrera', 1, '2024-06-01', 1),
('juan23', 'Local Buceo Luis Alberto de Herrera', 1, '2024-07-01', 1),
('juan23', 'Local Buceo Luis Alberto de Herrera', 1, '2024-08-01', 1),
('juan23', 'Local Buceo Luis Alberto de Herrera', 1, '2024-09-01', 0),
('juan23', 'Local Buceo Luis Alberto de Herrera', 1, '2024-10-01', 1),
('JuliaGym', 'Local pequeño Centro', 1, '2024-01-01', 1),
('JuliaGym', 'Local pequeño Centro', 1, '2024-02-01', 1),
('JuliaGym', 'Local pequeño Centro', 1, '2024-03-01', 1),
('JuliaGym', 'Local pequeño Centro', 1, '2024-04-01', 1),
('JuliaGym', 'Local pequeño Centro', 1, '2024-05-01', 1),
('JuliaGym', 'Local pequeño Centro', 0, '2024-09-01', 1),
('JuliaGym', 'Local pequeño Centro', 0, '2024-10-01', 1),
('JulianPower', 'Local Ciudad Vieja', 1, '2024-08-01', 1),
('JulianPower', 'Local Ciudad Vieja', 1, '2024-09-01', 1),
('JulianPower', 'Local Ciudad Vieja', 1, '2024-10-01', 1),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-01-01', 1),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-02-01', 1),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-03-01', 1),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-04-01', 1),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-05-01', 0),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-06-01', 1),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-07-01', 1),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-08-01', 1),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-09-01', 1),
('LeoTrainer', 'Local Central Ciudad Vieja', 1, '2023-10-01', 1),
('MarcosPro', 'Local grande Carrasco', 1, '2024-09-01', 1),
('MarcosPro', 'Local grande Carrasco', 1, '2024-10-01', 1),
('MartinGym', 'Local Ciudad Vieja', 1, '2024-08-01', 1),
('MartinGym', 'Local Ciudad Vieja', 1, '2024-09-01', 1),
('MartinGym', 'Local Ciudad Vieja', 1, '2024-10-01', 1),
('MatiasFit8', 'Local pequeño Pocitos', 1, '2024-08-01', 1),
('MatiasFit8', 'Local pequeño Pocitos', 1, '2024-09-01', 0),
('MatiasFit8', 'Local pequeño Pocitos', 1, '2024-10-01', 0),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-01-01', 1),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-02-01', 1),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-03-01', 1),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-04-01', 1),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-05-01', 1),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-06-01', 1),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-07-01', 1),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-08-01', 1),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-09-01', 1),
('MarcelaGym2', 'Local grande Carrasco', 1, '2023-10-01', 0),
('NataliaFit2', 'Local Buceo Luis Alberto de Herrera', 1, '2024-08-01', 1),
('NataliaFit2', 'Local Buceo Luis Alberto de Herrera', 1, '2024-09-01', 1),
('NataliaFit2', 'Local Buceo Luis Alberto de Herrera', 1, '2024-10-01', 1),
('pablo10', 'Local Central Ciudad Vieja', 1, '2023-03-01', 1),
('pablo10', 'Local Central Ciudad Vieja', 1, '2023-04-01', 1),
('pablo10', 'Local Central Ciudad Vieja', 1, '2023-05-01', 1),
('pablo10', 'Local Central Ciudad Vieja', 1, '2023-06-01', 1),
('pablo10', 'Local Central Ciudad Vieja', 1, '2023-07-01', 1),
('pablo10', 'Local Central Ciudad Vieja', 1, '2023-08-01', 1),
('pablo10', 'Local Central Ciudad Vieja', 1, '2023-09-01', 1),
('pablo10', 'Local Central Ciudad Vieja', 1, '2023-10-01', 0),
('Pedro24', 'Local Buceo Luis Alberto de Herrera', 1, '2024-09-01', 0),
('Pedro24', 'Local Buceo Luis Alberto de Herrera', 1, '2024-10-01', 0),
('RicardoTrainer', 'Local pequeño Centro', 1, '2024-08-01', 1),
('RicardoTrainer', 'Local pequeño Centro', 1, '2024-09-01', 1),
('RicardoTrainer', 'Local pequeño Centro', 1, '2024-10-01', 1),
('SofiaFitness5', 'Local Buceo Luis Alberto de Herrera', 1, '2024-08-01', 1),
('SofiaFitness5', 'Local Buceo Luis Alberto de Herrera', 1, '2024-09-01', 1),
('SofiaFitness5', 'Local Buceo Luis Alberto de Herrera', 1, '2024-10-01', 1),
('SofiaForce', 'Local grande Carrasco', 1, '2024-08-01', 1),
('SofiaForce', 'Local grande Carrasco', 1, '2024-09-01', 1),
('SofiaForce', 'Local grande Carrasco', 1, '2024-10-01', 1),
('ValePro6', 'Local Malvín', 1, '2024-09-01', 1),
('ValePro6', 'Local Malvín', 1, '2024-10-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` bigint(20) NOT NULL,
  `cumplimientoDeRutina` int(11) DEFAULT NULL,
  `resistenciaAnaerobica` int(11) DEFAULT NULL,
  `fuerzaMuscular` int(11) DEFAULT NULL,
  `resistenciaMuscular` int(11) DEFAULT NULL,
  `flexibilidad` int(11) DEFAULT NULL,
  `resistenciaALaMonotonia` int(11) DEFAULT NULL,
  `resiliencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id`, `cumplimientoDeRutina`, `resistenciaAnaerobica`, `fuerzaMuscular`, `resistenciaMuscular`, `flexibilidad`, `resistenciaALaMonotonia`, `resiliencia`) VALUES
(47, 8, 10, 7, 13, 14, 6, 12),
(48, 8, 13, 10, 12, 15, 8, 12),
(49, 11, 14, 10, 15, 15, 13, 13),
(50, 8, 9, 7, 11, 13, 6, 12),
(51, 8, 7, 7, 10, 13, 6, 11),
(52, 12, 13, 14, 16, 16, 14, 12),
(53, 12, 12, 12, 12, 12, 12, 12),
(54, 10, 13, 10, 13, 15, 10, 12),
(55, 11, 13, 12, 13, 16, 12, 13),
(56, 13, 15, 12, 15, 16, 15, 15),
(57, 16, 16, 15, 13, 16, 14, 17),
(58, 10, 14, 15, 18, 12, 19, 19),
(59, 12, 13, 16, 12, 13, 13, 10),
(60, 12, 15, 18, 19, 19, 18, 12),
(61, 10, 12, 8, 15, 20, 20, 20),
(62, 13, 15, 18, 19, 20, 19, 19),
(63, 5, 16, 8, 7, 12, 20, 20),
(64, 12, 13, 14, 15, 15, 16, 16),
(65, 10, 12, 11, 14, 13, 15, 16),
(66, 16, 16, 17, 17, 18, 18, 19),
(67, 19, 17, 17, 14, 18, 18, 14),
(68, 13, 13, 12, 12, 11, 11, 10),
(69, 10, 11, 10, 10, 11, 11, 11),
(70, 20, 20, 20, 20, 20, 20, 20),
(71, 13, 13, 11, 15, 15, 16, 13),
(72, 15, 15, 16, 15, 17, 14, 14),
(73, 10, 10, 11, 10, 10, 11, 10),
(74, 11, 14, 14, 15, 14, 14, 15),
(75, 11, 11, 11, 18, 18, 18, 18),
(76, 19, 18, 17, 18, 19, 18, 17),
(77, 20, 19, 18, 19, 20, 20, 20),
(78, 17, 18, 16, 17, 18, 18, 16),
(79, 17, 13, 15, 11, 9, 8, 3),
(80, 17, 13, 15, 12, 10, 19, 18),
(81, 12, 12, 13, 14, 15, 15, 13),
(82, 17, 18, 16, 17, 19, 14, 14),
(83, 13, 13, 18, 16, 14, 14, 14),
(84, 14, 14, 19, 17, 15, 15, 15),
(85, 12, 14, 16, 13, 15, 17, 17),
(86, 20, 20, 20, 20, 20, 20, 20),
(87, 2, 4, 5, 8, 6, 9, 8),
(88, 10, 10, 9, 8, 7, 10, 12),
(89, 19, 8, 8, 8, 2, 2, 1),
(90, 12, 14, 12, 12, 19, 18, 17),
(91, 9, 8, 7, 6, 5, 3, 3),
(92, 10, 11, 12, 11, 12, 11, 12),
(93, 10, 9, 8, 7, 18, 16, 13),
(94, 12, 12, 18, 17, 16, 12, 13),
(95, 14, 14, 14, 14, 15, 15, 15),
(96, 17, 19, 18, 17, 19, 18, 17),
(97, 19, 19, 20, 20, 19, 20, 18),
(98, 17, 16, 17, 18, 17, 15, 15),
(99, 0, 0, 0, 0, 0, 0, 0),
(100, 20, 20, 20, 20, 20, 20, 20),
(101, 10, 20, 10, 13, 8, 8, 8),
(102, 19, 19, 20, 18, 19, 19, 19),
(103, 19, 19, 11, 12, 7, 17, 12),
(104, 19, 12, 8, 2, 2, 2, 1),
(105, 10, 20, 10, 20, 10, 20, 10),
(106, 10, 12, 17, 17, 17, 18, 18),
(107, 19, 19, 13, 9, 19, 2, 2),
(108, 20, 19, 18, 18, 13, 13, 13),
(109, 18, 18, 18, 18, 18, 18, 18),
(110, 20, 20, 19, 19, 20, 20, 18),
(111, 20, 19, 18, 17, 6, 5, 4),
(112, 20, 18, 13, 6, 12, 5, 14),
(113, 13, 13, 15, 14, 13, 12, 11),
(114, 13, 17, 18, 16, 19, 20, 20),
(115, 20, 19, 18, 17, 15, 13, 16),
(116, 20, 20, 20, 18, 17, 18, 18),
(117, 18, 18, 18, 18, 18, 18, 18),
(118, 20, 20, 19, 18, 19, 16, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nombre_de_usuario` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `cedula` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre_de_usuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `correo_electronico`, `cedula`) VALUES
('AlejandraPower', 'Alejandra', 'Correa', 'Vázquez', 'alejandrapower@gmail.com', 77668899),
('AndreaPro1', 'Andrea', 'Gutiérrez', 'Alonso  Email: marcospro@gmail.com', 'andrea.pro1@yahoo.com', 44556677),
('AntonioTrainer', 'Antonio', 'Díaz', 'Ferreira', 'antoniotrainer@gmail.com', 22001133),
('CamiFit2', 'Camila', 'González', 'Suárez', 'camifit2@hotmail.com', 23456789),
('CarlaGym3', 'Carla', 'Pereira', 'Vázquez', 'carlagym3@yahoo.com', 89012345),
('CarlosFit9', 'Carlos', 'López', 'Silva', 'carlosfit9@gmail.com', 33445566),
('cliente', 'Nombre', 'Apellido1', 'Apellido2', 'cliente@mail.com', 12345678),
('DiegoPower', 'Diego', 'Castro', 'Giménez', 'diegopower@gmail.com', 56789012),
('ElenaPower', 'Elena', 'Pereira', 'Cardozo', 'elenapower@gmail.com', 11002233),
('EmilioPro', 'Emilio', 'Castro', 'Varela', 'emiliopro@gmail.com', 44335566),
('FelipePro1', 'Felipe', 'Martínez', 'Barrios', 'felipepro1@outlook.com', 66557788),
('FlorenciaPro2', 'Florencia', 'Pardo', 'Fuentes', 'florenciapro2@outlook.com', 55334466),
('FlorenciaTop', 'Florencia', 'Barreto', 'Cabrera', 'florenciatop@gmail.com', 88990011),
('FranciscaFit', 'Francisca', 'Peña', 'Rodríguez', 'franciscafit@gmail.com', 10990022),
('GustavoFit', 'Gustavo', 'Gutiérrez', 'Martínez', 'gustavofit@outlook.com', 99001122),
('IgnacioTrainer', 'Ignacio', 'Benítez', 'Sosa', 'ignaciotrainer@gmail.com', 77889900),
('IsabelTop', 'Isabel', 'Domínguez', 'Machado', 'isabeltop@yahoo.com', 99880011),
('juan23', 'Juan', 'Pérez', 'Rodríguez', 'juan23@gmail.com', 12345678),
('JuliaGym', 'Julia', 'Rivero', 'Suárez', 'juliagym@hotmail.com', 1234567),
('JulianPower', 'Julián', 'Almeida', 'Sánchez', 'julianpower@gmail.com', 44223355),
('LeoTrainer', 'Leonardo', 'Méndez', 'Acosta', 'leotrainer@gmail.com', 78901234),
('MarcelaGym2', 'Marcela', 'Costa', 'Barrios', 'marcelagym2@hotmail.com', 33112244),
('MarcosPro', 'Marcos', 'Varela', 'Figueroa', 'marcospro@gmail.com', 55667788),
('MartinGym', 'Martín', 'Fagúndez', 'Aguirre', 'martingym@hotmail.com', 88779900),
('MatiasFit8', 'Matías', 'Fernández', 'Ramírez', 'matiasfit8@hotmail.com', 90123456),
('NataliaFit2', 'Natalia', 'Suárez', 'Figueira', 'nataliafit2@gmail.com', 33224455),
('pablo10', 'Pablo', 'Martínez', 'López', 'pablo10@outlook.com', 34567890),
('Pedro24', 'Pedro', 'Fernández', 'Gómez', 'pedro24@hotmail.com', 22334455),
('RicardoTrainer', 'Ricardo', 'Gómez', 'Silva', 'ricardotrainer@outlook.com', 22113344),
('SofiaFitness5', 'Sofía', 'Silva', 'Fernández', 'sofiafitness5@yahoo.com', 45678901),
('SofiaForce', 'Sofía', 'Morales', 'Gómez', 'sofiaforce@hotmail.com', 55446677),
('ValePro6', 'Valentina', 'Rodríguez', 'Pereira', 'valepro6@outlook.com', 67890123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_telefono`
--

CREATE TABLE `cliente_telefono` (
  `nombre_de_usuario` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente_telefono`
--

INSERT INTO `cliente_telefono` (`nombre_de_usuario`, `telefono`) VALUES
('AlejandraPower', '097876543'),
('AndreaPro1', '099321654'),
('AntonioTrainer', '098765432'),
('CamiFit2', '098765432'),
('CarlaGym3', '097123987'),
('CarlosFit9', '091654321'),
('cliente', '0999099099'),
('DiegoPower', '092876543'),
('ElenaPower', '094567890'),
('EmilioPro', '099876567'),
('FelipePro1', '092345765'),
('FlorenciaPro2', '097432111'),
('FlorenciaTop', '097123654'),
('FranciscaFit', '094567321'),
('GustavoFit', '092987654'),
('IgnacioTrainer', '098543210'),
('IsabelTop', '091987567'),
('juan23', '099123456'),
('JuliaGym', '094567890'),
('JulianPower', '093876789'),
('LeoTrainer', '091987654'),
('MarcelaGym2', '099432111'),
('MarcosPro', '094876543'),
('MartinGym', '093543211'),
('MatiasFit8', '099876543'),
('NataliaFit2', '091345678'),
('pablo10', '094123789'),
('Pedro24', '092123456'),
('RicardoTrainer', '093876543'),
('SofiaFitness5', '095345678'),
('SofiaForce', '098543212'),
('ValePro6', '093456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE `deportista` (
  `nombre_de_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deportista`
--

INSERT INTO `deportista` (`nombre_de_usuario`) VALUES
('AndreaPro1'),
('CamiFit2'),
('CarlaGym3'),
('CarlosFit9'),
('cliente'),
('DiegoPower'),
('ElenaPower'),
('EmilioPro'),
('FelipePro1'),
('FlorenciaTop'),
('GustavoFit'),
('IgnacioTrainer'),
('juan23'),
('JuliaGym'),
('LeoTrainer'),
('MarcosPro'),
('MatiasFit8'),
('NataliaFit2'),
('pablo10'),
('Pedro24'),
('RicardoTrainer'),
('SofiaFitness5'),
('SofiaForce'),
('ValePro6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`nombre`, `imagen`, `descripcion`) VALUES
('Crunch abdominal', 'imagen_Crunch abdominal_671576834d3595.18956416.png', 'Ejercicio que se centra en los músculos abdominales. Se realiza flexionando el torso hacia adelante mientras estás acostado boca arriba.'),
('Curl de bíceps', 'imagen_Curl de bíceps_6715754672e515.45152453.png', 'Ejercicio para los bíceps. Se realiza levantando una barra o mancuernas flexionando los codos.'),
('Dominadas', 'imagen_Dominadas_671573c51e66c8.19168376.png', 'Ejercicio que trabaja la espalda y los brazos. Consiste en levantar el cuerpo hasta que la barbilla supere una barra fija.'),
('Elevaciones laterales', 'imagen_Elevaciones laterales_67157642c91267.37990513.png', 'Ejercicio para los hombros en el que levantas mancuernas desde los costados hasta la altura de los hombros.'),
('Extensión de tríceps', 'imagen_Extensión de tríceps_671575b79f1e18.59935662.png', 'Ejercicio que trabaja los tríceps, consiste en extender los brazos desde una posición doblada sobre la cabeza o el torso.'),
('Flexiones', 'imagen_Flexiones_6715744e993d62.87569641.png', 'Ejercicio de peso corporal que trabaja pecho, hombros y tríceps. Consiste en bajar y levantar el cuerpo desde el suelo con los brazos.'),
('Hip thrust', 'imagen_Hip thrust_671576c216d757.76034153.png', 'Ejercicio para glúteos, donde se eleva la cadera hacia arriba con la espalda apoyada en un banco y una barra sobre la cadera.'),
('Peso muerto', 'imagen_Peso muerto_67157395f064e9.22117134.png', 'Ejercicio que involucra principalmente los músculos de la espalda baja, glúteos y piernas. Se realiza levantando una barra desde el suelo hasta la cintura.'),
('Plancha', 'imagen_Plancha_671575efceb417.06281659.png', 'Ejercicio isométrico que fortalece el core. Consiste en mantener el cuerpo recto en posición de push-up apoyado sobre los antebrazos.'),
('Press de banca', 'imagen_Press de banca_6715736a79cdc4.95254145.png', 'Ejercicio de pecho en el que te tumbas en un banco y empujas una barra o mancuernas hacia arriba desde el pecho.'),
('Press de pierna', 'imagen_Press de pierna_671577082bb7b3.51051578.png', 'Ejercicio de piernas en una máquina. Se empuja una plataforma con los pies, trabajando cuádriceps, isquiotibiales y glúteos.'),
('Press militar', 'imagen_Press militar_671573fa418eb6.12546008.png', 'Ejercicio para hombros que se realiza empujando una barra o mancuernas desde la altura de los hombros hacia arriba.'),
('Remo con barra', 'imagen_Remo con barra_671574a02836c7.35538291.png', 'Ejercicio para la espalda, se realiza inclinando el torso hacia adelante y levantando una barra hacia el abdomen.'),
('Sentadilla', 'imagen_Sentadilla_671573322e1e07.44119008.png', 'Ejercicio compuesto que trabaja principalmente los músculos de las piernas y glúteos. Consiste en bajar el cuerpo como si te fueras a sentar y volver a la posición inicial.'),
('Zancadas', 'imagen_Zancadas_67157618e7f6c8.14702179.png', 'Ejercicio de piernas que trabaja cuádriceps y glúteos. Se da un paso hacia adelante y se baja el cuerpo hasta que la rodilla de la pierna trasera casi toque el suelo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `nombre_de_usuario` varchar(50) NOT NULL,
  `cedula` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`nombre_de_usuario`, `cedula`) VALUES
('CoachCamiStrong', 89012345),
('CoachMati10', 12345678),
('CoachNicoFit', 56789012),
('EliteTrainerLeo', 90123456),
('entrenador', 56669998),
('ExpertTrainerPablo', 78901234),
('FitGuideLucas7', 34567890),
('MasterCoachDani', 1234567),
('PowerTrainerVale', 67890123),
('ProTrainerAna', 23456789),
('TrainerSofiPro', 45678901);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `nombre` varchar(50) NOT NULL,
  `deporte` varchar(50) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`nombre`, `deporte`, `imagen`) VALUES
('BasketPeñarol', 'Basquetbol', 'imagen_BasketPeñarol_6716e6ef1d5938.02877227.png'),
('Equipo1', 'Futbol', 'imagen_Equipo1_6716e7528389e5.50195787.png'),
('Equipo2', 'Basquetbol', 'imagen_Equipo2_6716e7719869a8.57040353.png'),
('Equipo3', 'Futbol', 'imagen_Equipo3_6716e7d1ca4316.08423915.png'),
('Femenino ARSM', 'Futbol', 'imagen_Femenino ARSM_6716e545d979c9.58936730.png'),
('MasculinoSerieC1', 'Futbol', 'imagen_MasculinoSerieC1_6716e5ea04a6a9.12524975.png'),
('MasculinoSerieC2', 'Futbol', 'imagen_MasculinoSerieC2_6716e606ea5e94.64964654.png'),
('SerieC1Masculino', 'Futbol', 'imagen_SerieC1Masculino_6716e64a5d7288.91939956.png'),
('sub24_Basket_Equipo1', 'Basquetbol', 'imagen_sub24_Basket_Equipo1_6716e8f130a757.13998321.png'),
('Sub25 Futbol', 'Futbol', 'imagen_Sub25 Futbol_6716e4a602a9d8.37003788.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`nombre`) VALUES
('Alto'),
('Bajo'),
('En evolución'),
('Inicio'),
('Medio'),
('Para seleccionar'),
('Principiante'),
('Satisfactorio'),
('Sin evolución');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estan`
--

CREATE TABLE `estan` (
  `nombre_equipo` varchar(50) NOT NULL,
  `nombre_deportista` varchar(50) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `posicion` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estan`
--

INSERT INTO `estan` (`nombre_equipo`, `nombre_deportista`, `tipo`, `posicion`, `activo`) VALUES
('BasketPeñarol', 'DiegoPower', 'jugador', '3', 1),
('BasketPeñarol', 'EmilioPro', 'jugador', '1', 1),
('BasketPeñarol', 'FelipePro1', 'jugador', '5', 1),
('BasketPeñarol', 'GustavoFit', 'jugador', '4', 1),
('BasketPeñarol', 'Pedro24', 'jugador', '2', 1),
('Equipo3', 'CarlosFit9', 'jugador', '10', 1),
('Equipo3', 'DiegoPower', 'jugador', '2', 1),
('Equipo3', 'EmilioPro', 'jugador', '1', 1),
('Equipo3', 'IgnacioTrainer', 'suplente', NULL, 1),
('Equipo3', 'LeoTrainer', 'suplente', NULL, 1),
('Equipo3', 'MarcosPro', 'jugador', '9', 1),
('Equipo3', 'MatiasFit8', 'suplente', NULL, 1),
('Equipo3', 'Pedro24', 'jugador', '11', 1),
('Femenino ARSM', 'AndreaPro1', 'jugador', '10', 1),
('Femenino ARSM', 'CamiFit2', 'jugador', '5', 1),
('Femenino ARSM', 'FlorenciaTop', 'jugador', '6', 1),
('Femenino ARSM', 'JuliaGym', 'jugador', '9', 1),
('Femenino ARSM', 'SofiaFitness5', 'jugador', '7', 1),
('Femenino ARSM', 'SofiaForce', 'jugador', '8', 1),
('MasculinoSerieC1', 'DiegoPower', 'suplente', NULL, 1),
('MasculinoSerieC1', 'EmilioPro', 'jugador', '1', 1),
('MasculinoSerieC1', 'FelipePro1', 'jugador', '5', 1),
('MasculinoSerieC1', 'GustavoFit', 'suplente', NULL, 1),
('MasculinoSerieC1', 'juan23', 'suplente', NULL, 1),
('MasculinoSerieC1', 'LeoTrainer', 'suplente', NULL, 1),
('MasculinoSerieC1', 'MatiasFit8', 'jugador', '2', 1),
('MasculinoSerieC1', 'pablo10', 'suplente', NULL, 1),
('MasculinoSerieC1', 'Pedro24', 'suplente', NULL, 1),
('MasculinoSerieC1', 'RicardoTrainer', 'suplente', NULL, 1),
('MasculinoSerieC2', 'FelipePro1', 'jugador', '2', 1),
('SerieC1Masculino', 'CarlosFit9', 'jugador', '3', 1),
('SerieC1Masculino', 'DiegoPower', 'jugador', '10', 1),
('SerieC1Masculino', 'EmilioPro', 'suplente', NULL, 1),
('SerieC1Masculino', 'IgnacioTrainer', 'jugador', '6', 1),
('SerieC1Masculino', 'juan23', 'suplente', NULL, 1),
('SerieC1Masculino', 'LeoTrainer', 'jugador', '2', 1),
('SerieC1Masculino', 'MarcosPro', 'suplente', NULL, 1),
('SerieC1Masculino', 'MatiasFit8', 'jugador', '5', 1),
('SerieC1Masculino', 'pablo10', 'jugador', '9', 1),
('SerieC1Masculino', 'Pedro24', 'jugador', '8', 1),
('SerieC1Masculino', 'RicardoTrainer', 'jugador', '7', 1),
('Sub25 Futbol', 'DiegoPower', 'jugador', '1', 1),
('Sub25 Futbol', 'EmilioPro', 'jugador', '2', 1),
('Sub25 Futbol', 'juan23', 'jugador', '5', 1),
('Sub25 Futbol', 'MarcosPro', 'suplente', NULL, 1),
('Sub25 Futbol', 'pablo10', 'suplente', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fisioterapia`
--

CREATE TABLE `fisioterapia` (
  `nombre_de_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fisioterapia`
--

INSERT INTO `fisioterapia` (`nombre_de_usuario`) VALUES
('AlejandraPower'),
('AntonioTrainer'),
('FlorenciaPro2'),
('FranciscaFit'),
('IsabelTop'),
('JulianPower'),
('MarcelaGym2'),
('MartinGym');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gimnasio`
--

CREATE TABLE `gimnasio` (
  `nombre` varchar(50) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gimnasio`
--

INSERT INTO `gimnasio` (`nombre`, `capacidad`, `activo`) VALUES
('Local Buceo Luis Alberto de Herrera', 150, 1),
('Local Central Ciudad Vieja', 240, 1),
('Local Centro 18 de Julio', 130, 1),
('Local Ciudad Vieja', 140, 1),
('Local grande Carrasco', 240, 1),
('Local Malvín', 160, 1),
('Local pequeño Centro', 70, 1),
('Local pequeño Pocitos', 70, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `le_corresponde`
--

CREATE TABLE `le_corresponde` (
  `fecha` date NOT NULL,
  `id` bigint(20) NOT NULL,
  `nombre_de_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `le_corresponde`
--

INSERT INTO `le_corresponde` (`fecha`, `id`, `nombre_de_usuario`) VALUES
('2024-09-22', 47, 'cliente'),
('2024-09-29', 48, 'cliente'),
('2024-11-06', 49, 'cliente'),
('2024-09-15', 50, 'cliente'),
('2024-09-09', 51, 'cliente'),
('2024-10-02', 54, 'cliente'),
('2024-10-08', 55, 'cliente'),
('2024-10-16', 56, 'cliente'),
('2024-10-22', 57, 'cliente'),
('2024-10-16', 58, 'AlejandraPower'),
('2024-10-22', 60, 'AlejandraPower'),
('2024-10-02', 61, 'AndreaPro1'),
('2024-10-22', 62, 'AndreaPro1'),
('2024-10-07', 63, 'AntonioTrainer'),
('2024-10-22', 64, 'AntonioTrainer'),
('2024-10-11', 65, 'CamiFit2'),
('2024-10-22', 66, 'CamiFit2'),
('2024-10-01', 67, 'CarlaGym3'),
('2024-10-22', 68, 'CarlaGym3'),
('2024-10-17', 69, 'CarlosFit9'),
('2024-10-22', 70, 'CarlosFit9'),
('2024-10-13', 71, 'DiegoPower'),
('2024-10-22', 72, 'DiegoPower'),
('2024-09-03', 73, 'ElenaPower'),
('2024-10-22', 74, 'ElenaPower'),
('2024-10-11', 75, 'EmilioPro'),
('2024-10-22', 76, 'EmilioPro'),
('2024-10-08', 77, 'FelipePro1'),
('2024-10-22', 78, 'FelipePro1'),
('2024-10-02', 79, 'FlorenciaPro2'),
('2024-10-22', 80, 'FlorenciaPro2'),
('2024-10-17', 81, 'FlorenciaTop'),
('2024-10-22', 82, 'FlorenciaTop'),
('2024-10-08', 83, 'FranciscaFit'),
('2024-10-22', 84, 'FranciscaFit'),
('2024-10-15', 85, 'GustavoFit'),
('2024-10-22', 86, 'GustavoFit'),
('2024-10-13', 87, 'IgnacioTrainer'),
('2024-10-22', 88, 'IgnacioTrainer'),
('2024-10-12', 89, 'IsabelTop'),
('2024-10-22', 90, 'IsabelTop'),
('2024-10-05', 91, 'juan23'),
('2024-10-22', 92, 'juan23'),
('2024-10-03', 93, 'JuliaGym'),
('2024-10-22', 94, 'JuliaGym'),
('2024-09-01', 95, 'JulianPower'),
('2024-10-22', 96, 'JulianPower'),
('2024-10-04', 97, 'LeoTrainer'),
('2024-10-22', 98, 'LeoTrainer'),
('2024-10-01', 99, 'MarcelaGym2'),
('2024-10-22', 100, 'MarcelaGym2'),
('2024-10-15', 101, 'MarcosPro'),
('2024-10-22', 102, 'MarcosPro'),
('2024-10-02', 103, 'MatiasFit8'),
('2024-10-22', 104, 'MatiasFit8'),
('2024-10-04', 105, 'NataliaFit2'),
('2024-10-22', 106, 'NataliaFit2'),
('2024-10-01', 107, 'pablo10'),
('2024-10-22', 108, 'pablo10'),
('2024-10-01', 109, 'Pedro24'),
('2024-10-22', 110, 'Pedro24'),
('2024-10-09', 111, 'RicardoTrainer'),
('2024-10-22', 112, 'RicardoTrainer'),
('2024-10-05', 113, 'SofiaFitness5'),
('2024-10-22', 114, 'SofiaFitness5'),
('2024-10-02', 115, 'SofiaForce'),
('2024-10-22', 116, 'SofiaForce'),
('2024-10-05', 117, 'ValePro6'),
('2024-10-22', 118, 'ValePro6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasa`
--

CREATE TABLE `pasa` (
  `nombre_cliente` varchar(50) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pasa`
--

INSERT INTO `pasa` (`nombre_cliente`, `nombre_estado`, `fecha_inicio`, `fecha_fin`, `id`) VALUES
('cliente', 'Bajo', '2024-09-22', '2024-10-22', 20),
('cliente', 'Bajo', '2024-09-29', '2024-10-22', 21),
('cliente', 'Medio', '2024-11-06', '2024-10-22', 22),
('cliente', 'Bajo', '2024-09-15', '2024-10-22', 23),
('cliente', 'Bajo', '2024-09-09', '2024-10-22', 24),
('cliente', 'Medio', '2024-10-02', '2024-10-22', 27),
('cliente', 'Medio', '2024-10-08', '2024-10-22', 28),
('cliente', 'Alto', '2024-10-16', '2024-10-22', 29),
('cliente', 'Alto', '2024-10-22', '2024-10-22', 30),
('AlejandraPower', 'Satisfactorio', '2024-10-15', '2024-10-22', 31),
('AlejandraPower', 'En evolución', '2024-10-22', '2024-10-22', 32),
('AlejandraPower', 'Satisfactorio', '2024-10-22', '2024-10-22', 33),
('AndreaPro1', 'Alto', '2024-10-09', '2024-10-22', 34),
('AndreaPro1', 'Para Seleccionar', '2024-10-22', '2024-10-22', 35),
('AntonioTrainer', 'En evolución', '2024-10-07', '2024-10-22', 36),
('AntonioTrainer', 'Satisfactorio', '2024-10-22', '2024-10-22', 37),
('CamiFit2', 'Medio', '2024-10-11', '2024-10-22', 38),
('CamiFit2', 'Para Seleccionar', '2024-10-22', '2024-10-22', 39),
('CarlaGym3', 'Alto', '2024-10-01', '2024-10-22', 40),
('CarlaGym3', 'Medio', '2024-10-22', '2024-10-22', 41),
('CarlosFit9', 'Bajo', '2024-10-17', '2024-10-22', 42),
('CarlosFit9', 'Para Seleccionar', '2024-10-22', '2024-10-22', 43),
('DiegoPower', 'Medio', '2024-10-13', '2024-10-22', 44),
('DiegoPower', 'Alto', '2024-10-22', '2024-10-22', 45),
('ElenaPower', 'Bajo', '2024-09-03', '2024-10-22', 46),
('ElenaPower', 'Medio', '2024-10-22', '2024-10-22', 47),
('EmilioPro', 'Alto', '2024-10-11', '2024-10-22', 48),
('EmilioPro', 'Para Seleccionar', '2024-10-22', '2024-10-22', 49),
('FelipePro1', 'Para Seleccionar', '2024-10-08', '2024-10-22', 50),
('FelipePro1', 'Para Seleccionar', '2024-10-22', '2024-10-22', 51),
('FlorenciaPro2', 'Sin evolución', '2024-10-02', '2024-10-22', 52),
('FlorenciaPro2', 'Satisfactorio', '2024-10-22', '2024-10-22', 53),
('FlorenciaTop', 'Medio', '2024-10-17', '2024-10-22', 54),
('FlorenciaTop', 'Alto', '2024-10-22', '2024-10-22', 55),
('FranciscaFit', 'Satisfactorio', '2024-10-08', '2024-10-22', 56),
('FranciscaFit', 'Satisfactorio', '2024-10-22', '2024-10-22', 57),
('GustavoFit', 'Alto', '2024-10-15', '2024-10-22', 58),
('GustavoFit', 'Para Seleccionar', '2024-10-22', '2024-10-22', 59),
('IgnacioTrainer', 'Bajo', '2024-10-13', '2024-10-22', 60),
('IgnacioTrainer', 'Bajo', '2024-10-22', '2024-10-22', 61),
('IsabelTop', 'Sin evolución', '2024-10-12', '2024-10-22', 62),
('IsabelTop', 'Satisfactorio', '2024-10-22', '2024-10-22', 63),
('juan23', 'Bajo', '2024-10-05', '2024-10-22', 64),
('juan23', 'Bajo', '2024-10-22', '2024-10-22', 65),
('JuliaGym', 'Medio', '2024-10-03', '2024-10-22', 66),
('JuliaGym', 'Alto', '2024-10-22', '2024-10-22', 67),
('JulianPower', 'Satisfactorio', '2024-09-01', '2024-10-22', 68),
('JulianPower', 'Satisfactorio', '2024-10-22', '2024-10-22', 69),
('LeoTrainer', 'Para Seleccionar', '2024-10-04', '2024-10-22', 70),
('LeoTrainer', 'Alto', '2024-10-22', '2024-10-22', 71),
('MarcelaGym2', 'Inicio', '2024-10-01', '2024-10-22', 72),
('MarcelaGym2', 'Satisfactorio', '2024-10-22', '2024-10-22', 73),
('MarcosPro', 'Bajo', '2024-10-15', '2024-10-22', 74),
('MarcosPro', 'Para Seleccionar', '2024-10-22', '2024-10-22', 75),
('MatiasFit8', 'Medio', '2024-10-01', '2024-10-22', 76),
('MatiasFit8', 'Bajo', '2024-10-22', '2024-10-22', 77),
('NataliaFit2', 'Alto', '2024-10-22', '2024-10-22', 78),
('NataliaFit2', 'Alto', '2024-10-22', '2024-10-22', 79),
('pablo10', 'Medio', '2024-10-22', '2024-10-22', 80),
('pablo10', 'Alto', '2024-10-22', '2024-10-22', 81),
('Pedro24', 'Para Seleccionar', '2024-10-01', '2024-10-22', 82),
('Pedro24', 'Para Seleccionar', '2024-10-22', '2024-10-22', 83),
('RicardoTrainer', 'Medio', '2024-10-09', '2024-10-22', 84),
('RicardoTrainer', 'Medio', '2024-10-22', '2024-10-22', 85),
('SofiaFitness5', 'Medio', '2024-10-05', '2024-10-22', 86),
('SofiaFitness5', 'Para Seleccionar', '2024-10-22', '2024-10-22', 87),
('SofiaForce', 'Alto', '2024-10-02', '2024-10-22', 88),
('SofiaForce', 'Para Seleccionar', '2024-10-22', NULL, 89),
('ValePro6', 'Para Seleccionar', '2024-10-05', NULL, 90),
('ValePro6', 'Para Seleccionar', '2024-10-22', NULL, 91);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_entrenamiento`
--

CREATE TABLE `plan_entrenamiento` (
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `objetivo` text DEFAULT NULL,
  `grilla` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plan_entrenamiento`
--

INSERT INTO `plan_entrenamiento` (`nombre`, `descripcion`, `objetivo`, `grilla`) VALUES
('Definición muscular', 'Un programa diseñado para reducir el porcentaje de grasa corporal mientras se mantiene la masa muscular, a través de ejercicios de alta intensidad.', 'Mejorar la definición muscular y reducir la grasa corporal, para lograr un físico más estético y tonificado.', 'grilla_Definición muscular_67157879f3b617.54847187.csv'),
('Desarrollo de espalda', 'Este plan se enfoca en trabajar los músculos de la espalda, incluyendo el dorsal ancho y el trapecio, a través de ejercicios de tracción y movimientos funcionales.', 'Desarrollar una espalda más fuerte y definida, mejorando la postura y la capacidad de levantar cargas pesadas.', 'grilla_Desarrollo de espalda_671577c9487450.83507263.csv'),
('Entrenamiento de bíceps', 'Una rutina específica para los bíceps que incorpora distintos tipos de curl para trabajar la parte frontal del brazo de manera eficiente.', 'Aumentar la masa y fuerza de los bíceps, mejorando tanto la estética como el rendimiento en ejercicios de tracción.', 'grilla_Entrenamiento de bíceps_6715781d34c6c0.69643083.csv'),
('Entrenamiento de core', 'Un plan centrado en fortalecer el core, con ejercicios que trabajan los músculos abdominales y de la zona lumbar para mejorar la estabilidad.', 'Mejorar la fuerza del núcleo y la estabilidad, esencial para la postura, equilibrio y prevención de lesiones en el tren inferior y superior.', 'grilla_Entrenamiento de core_6715783e563a86.95230331.csv'),
('Entrenamiento de cuerpo completo', 'Una rutina que trabaja todos los grupos musculares principales en cada sesión, utilizando ejercicios compuestos que activan múltiples músculos a la vez.', 'Desarrollar fuerza general y mejorar el equilibrio muscular en todo el cuerpo, ideal para principiantes o aquellos con poco tiempo.', 'grilla_Entrenamiento de cuerpo completo_67157868500d79.30046588.csv'),
('Fortalecimiento de glúteos', 'Este plan está enfocado en la tonificación y fortalecimiento de los glúteos, combinando ejercicios de aislamiento y movimientos compuestos.', 'Desarrollar unos glúteos más fuertes y tonificados, mejorando la estética y la fuerza en la parte inferior del cuerpo.', 'grilla_Fortalecimiento de glúteos_671577ed65d0d8.78373760.csv'),
('Fortalecimiento de piernas', 'Este plan se centra en desarrollar la fuerza de los músculos principales de las piernas, como cuádriceps, isquiotibiales y glúteos, a través de movimientos compuestos.', 'Mejorar la fuerza y estabilidad en la parte inferior del cuerpo, optimizando el rendimiento en actividades diarias y deportivas.', 'grilla_Fortalecimiento de piernas_671577a687e561.02861072.csv'),
('Fortalecimiento de tríceps', 'Este plan trabaja el tríceps a través de una variedad de ejercicios de empuje y extensión, con énfasis en la parte posterior del brazo.', 'Desarrollar unos tríceps más definidos y fuertes, mejorando el rendimiento en ejercicios de empuje y estabilización del brazo.', 'grilla_Fortalecimiento de tríceps_6715782ea0d995.15211764.csv'),
('Fuerza en hombros', 'Programa diseñado para fortalecer los músculos del hombro, combinando ejercicios de empuje vertical y movimientos de aislamiento.', 'Aumentar la fuerza y estabilidad de los hombros, mejorando el rendimiento en movimientos de empuje y previniendo lesiones.', 'grilla_Fuerza en hombros_671577d984fce1.96924097.csv'),
('Fuerza en tren inferior', 'Plan que se enfoca exclusivamente en los músculos del tren inferior, trabajando cuádriceps, isquiotibiales y glúteos con ejercicios pesados.', 'Aumentar la fuerza y resistencia de las piernas, optimizando el rendimiento en actividades deportivas o ejercicios de levantamiento de peso.', 'grilla_Fuerza en tren inferior_6715789280d0d6.03355886.csv'),
('Potencia y explosividad', 'Rutina que combina movimientos explosivos y levantamientos olímpicos, desarrollando fuerza y velocidad a través de ejercicios de alta intensidad.', 'Mejorar la potencia muscular y la capacidad de realizar movimientos rápidos y explosivos, ideal para deportes de rendimiento.', 'grilla_Potencia y explosividad_6715785b6986a7.98236956.csv'),
('Recuperación y movilidad', 'Programa diseñado para mejorar la flexibilidad y movilidad, a la vez que facilita la recuperación muscular a través de ejercicios suaves.', 'Aumentar la flexibilidad, mejorar el rango de movimiento y facilitar la recuperación muscular para evitar lesiones.', 'grilla_Recuperación y movilidad_671578b75c6fa6.73406901.csv'),
('Resistencia general', 'Programa equilibrado que utiliza ejercicios básicos para trabajar todo el cuerpo, diseñado para mejorar la resistencia muscular.', 'Aumentar la resistencia muscular y cardiovascular, permitiendo realizar ejercicios durante períodos más largos sin fatiga.', 'grilla_Resistencia general_6715784e3c9f57.90391062.csv'),
('Tono y definición en brazos', 'Un plan que se concentra en tonificar los brazos, trabajando bíceps y tríceps con ejercicios que enfatizan la definición muscular.', 'Lograr brazos más tonificados y definidos, mejorando la estética y fuerza en las extremidades superiores.', 'grilla_Tono y definición en brazos_671578a94c0128.15045597.csv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puede_usar`
--

CREATE TABLE `puede_usar` (
  `nombre_de_usuario` varchar(50) NOT NULL,
  `nombre_equipo` varchar(50) NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puede_usar`
--

INSERT INTO `puede_usar` (`nombre_de_usuario`, `nombre_equipo`, `activo`) VALUES
('agente_seleccionador', 'Femenino ARSM', 1),
('agente_seleccionador', 'Sub25 Futbol', 1),
('EquipoSeleccionadorNacional', 'MasculinoSerieC1', 1),
('EquipoSeleccionadorNacional', 'MasculinoSerieC2', 1),
('Peñarol_equipo_seleccionador', 'BasketPeñarol', 1),
('Peñarol_equipo_seleccionador', 'SerieC1Masculino', 1),
('seleccionador', 'Equipo1', 1),
('seleccionador', 'Equipo2', 1),
('seleccionador', 'Equipo3', 1),
('sub24BasketSeleccionador', 'sub24_Basket_Equipo1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza`
--

CREATE TABLE `realiza` (
  `nombre_cliente` varchar(50) NOT NULL,
  `nombre_plan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `realiza`
--

INSERT INTO `realiza` (`nombre_cliente`, `nombre_plan`) VALUES
('AlejandraPower', 'Entrenamiento de core'),
('AndreaPro1', 'Potencia y explosividad'),
('AntonioTrainer', 'Fuerza en tren inferior'),
('CamiFit2', 'Recuperación y movilidad'),
('CarlosFit9', 'Resistencia general'),
('cliente', 'Recuperación y movilidad'),
('DiegoPower', 'Fuerza en tren inferior'),
('ElenaPower', 'Entrenamiento de cuerpo completo'),
('EmilioPro', 'Entrenamiento de core'),
('FelipePro1', 'Resistencia general'),
('FlorenciaPro2', 'Fuerza en hombros'),
('FlorenciaTop', 'Entrenamiento de core'),
('FranciscaFit', 'Fuerza en tren inferior'),
('GustavoFit', 'Definición muscular'),
('IgnacioTrainer', 'Fortalecimiento de tríceps'),
('IsabelTop', 'Potencia y explosividad'),
('juan23', 'Desarrollo de espalda'),
('JuliaGym', 'Recuperación y movilidad'),
('JulianPower', 'Tono y definición en brazos'),
('LeoTrainer', 'Fuerza en hombros'),
('MarcelaGym2', 'Fortalecimiento de piernas'),
('MarcosPro', 'Fortalecimiento de glúteos'),
('MartinGym', 'Recuperación y movilidad'),
('MatiasFit8', 'Fuerza en tren inferior'),
('NataliaFit2', 'Desarrollo de espalda'),
('pablo10', 'Entrenamiento de core'),
('Pedro24', 'Potencia y explosividad'),
('RicardoTrainer', 'Fortalecimiento de glúteos'),
('SofiaFitness5', 'Fuerza en hombros'),
('SofiaForce', 'Fuerza en tren inferior'),
('ValePro6', 'Fuerza en tren inferior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_asignado`
--

CREATE TABLE `tiene_asignado` (
  `nombre_cliente` varchar(50) NOT NULL,
  `nombre_entrenador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiene_asignado`
--

INSERT INTO `tiene_asignado` (`nombre_cliente`, `nombre_entrenador`) VALUES
('AntonioTrainer', 'CoachNicoFit'),
('CamiFit2', 'PowerTrainerVale'),
('CarlosFit9', 'PowerTrainerVale'),
('cliente', 'ExpertTrainerPablo'),
('DiegoPower', 'EliteTrainerLeo'),
('ElenaPower', 'CoachMati10'),
('EmilioPro', 'EliteTrainerLeo'),
('FelipePro1', 'FitGuideLucas7'),
('FlorenciaPro2', 'FitGuideLucas7'),
('FlorenciaTop', 'PowerTrainerVale'),
('FranciscaFit', 'TrainerSofiPro'),
('GustavoFit', 'ExpertTrainerPablo'),
('IgnacioTrainer', 'MasterCoachDani'),
('IsabelTop', 'PowerTrainerVale'),
('juan23', 'ProTrainerAna'),
('JuliaGym', 'FitGuideLucas7'),
('JulianPower', 'ExpertTrainerPablo'),
('LeoTrainer', 'CoachCamiStrong'),
('MarcelaGym2', 'PowerTrainerVale'),
('MarcosPro', 'entrenador'),
('MartinGym', 'entrenador'),
('MatiasFit8', 'entrenador'),
('NataliaFit2', 'entrenador'),
('pablo10', 'entrenador'),
('Pedro24', 'entrenador'),
('RicardoTrainer', 'entrenador'),
('SofiaFitness5', 'entrenador'),
('SofiaForce', 'entrenador'),
('ValePro6', 'entrenador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre_de_usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_de_usuario`, `password`, `rol`, `imagen`) VALUES
('administrador', 'administrador', 'administrador', 'Default.png'),
('agente_seleccionador', 'd3345s56v', 'seleccionador', 'imagen_agente_seleccionador_6715981a2eb735.95519405.png'),
('AlejandraPower', 'Ale@power123', 'cliente', 'Default.png'),
('AnaGym24', '1204Anita444', 'gerente', 'imagen_AnaGym24_671592c052e8e2.13517541.png'),
('AndreaPro1', 'An!drea2022', 'cliente', 'Default.png'),
('AntonioTrainer', 'Ant@trainer22', 'cliente', 'imagen_AntonioTrainer_6716dc890a9de6.87043915.png'),
('avanzado', 'avanzado', 'avanzado', 'Default.png'),
('CamiFit2', 'Cami#Fit!22', 'cliente', 'imagen_CamiFit2_6716d81800bd79.31065958.png'),
('CarlaGym12', 'gasrevsc', 'avanzado', 'imagen_CarlaGym12_67159405a30ce4.35125816.png'),
('CarlaGym3', 'Car!la332', 'cliente', 'imagen_CarlaGym3_6716d906a2e887.90767356.png'),
('CarlosFit9', 'Car!los567', 'cliente', 'imagen_CarlosFit9_6716da07c59236.02683891.png'),
('cliente', 'cliente', 'cliente', 'Default.png'),
('CoachCamiStrong', 'dfw34df23', 'entrenador', 'imagen_CoachCamiStrong_67159e4f59fad5.89030053.png'),
('CoachMati10', 'mati988123', 'entrenador', 'imagen_CoachMati10_67159bd7b37ec3.56249659.png'),
('CoachNicoFit', 'fnoow3898fh32', 'entrenador', 'imagen_CoachNicoFit_67159c9176b985.66905356.png'),
('DaniFit20', '3wdani33Fit', 'gerente', 'imagen_DaniFit20_67159450303222.71708784.png'),
('DiegoPower', 'Die!go987', 'cliente', 'imagen_DiegoPower_6716d8870c0e84.12428277.png'),
('ElenaPower', 'Ele@power23', 'cliente', 'imagen_ElenaPower_6716db0716a9e5.46322177.png'),
('EliteTrainerLeo', 'LeoJuan10023', 'entrenador', 'imagen_EliteTrainerLeo_67159efc20db77.68551190.png'),
('EmilioPro', 'Emi#pro678', 'cliente', 'imagen_EmilioPro_6716db68528255.83888221.png'),
('entrenador', 'entrenador', 'entrenador', 'Default.png'),
('EquipoAdministrador', 'cL2$h7RvT6', 'administrador', 'imagen_EquipoAdministrador_67158fe710fa64.26431985.png'),
('EquipoSeleccionadorNacional', 'nacionalSelecc788882', 'seleccionador', 'imagen_EquipoSeleccionadorNacional_671596f60bbaa5.18600991.png'),
('ExpertTrainerPablo', 'PabloGarcia344412', 'entrenador', 'imagen_ExpertTrainerPablo_67159d84beeb32.71091109.png'),
('FelipePro1', 'Fel@pro5678', 'cliente', 'imagen_FelipePro1_6716dbac274084.83766773.png'),
('FerFit21', 'fessSSSS', 'avanzado', 'imagen_FerFit21_671594d87f8915.81841080.png'),
('FitGuideLucas7', 'akkfecesartadgfe', 'entrenador', 'imagen_FitGuideLucas7_67159c45bc7390.79386101.png'),
('FlorenciaPro2', ' Contraseña: ', 'cliente', 'imagen_FlorenciaPro2_6716dcf9016921.29662873.png'),
('FlorenciaTop', 'Flor@top12', 'cliente', 'Default.png'),
('FranciscaFit', 'Fran@fit23', 'cliente', 'imagen_FranciscaFit_6716dc5b371759.50092996.png'),
('gerente', 'gerente', 'gerente', 'Default.png'),
('GustavoFit', 'Gus@fit2023', 'cliente', 'imagen_GustavoFit_6716dac107c632.29176879.png'),
('IgnacioTrainer', 'Ign#2024Train', 'cliente', 'imagen_IgnacioTrainer_6716da7f8891a6.72035889.png'),
('IsabelTop', 'Isa@top78', 'cliente', 'Default.png'),
('juan23', ' Jua#n23Xx', 'cliente', 'imagen_juan23_6716d7e7a2cd17.12585831.png'),
('JuliaGym', 'Ju!lia2024', 'cliente', 'Default.png'),
('JulianPower', 'Jul#power22', 'cliente', 'imagen_JulianPower_6716dcd162e4e5.64352040.png'),
('LauraGym5', 'LautaMartinez1234', 'avanzado', 'imagen_LauraGym5_67159518096e34.36065620.png'),
('LeoPower9', 'r34df342s', 'avanzado', 'imagen_LeoPower9_67159424a235c2.18450827.png'),
('LeoTrainer', 'Leo#Trainer12', 'cliente', 'imagen_LeoTrainer_6716d8de89f6a0.61790527.png'),
('LucasRun3', 'Lucasssssss', 'gerente', 'imagen_LucasRun3_671592db8eb065.63940379.png'),
('MarcelaGym2', 'Mar@fit1234', 'cliente', 'Default.png'),
('MarcosPro', 'Mar#pro2022', 'cliente', 'imagen_MarcosPro_6716da4f706a65.44238375.png'),
('MartinGym', 'Mar#gym543', 'cliente', 'imagen_MartinGym_6716dbe99134d6.51341777.png'),
('MasterCoachDani', 'ae3f3awsdf', 'entrenador', 'imagen_MasterCoachDani_67159f16951671.87842907.png'),
('MatiasFit8', 'Ma!tias2023', 'cliente', 'Default.png'),
('Maxi5', 'maxi2000', 'gerente', 'imagen_Maxi5_6715927b28c4f2.58754462.png'),
('NataliaFit2', 'Nat@fit345', 'cliente', 'imagen_NataliaFit2_6716db4c139507.70750884.png'),
('NicoFit4', 'fitnico3333', 'gerente', 'imagen_NicoFit4_67159336d995d6.23876674.png'),
('pablo10', 'Pa!blo123', 'cliente', 'imagen_pablo10_6716d83d474cb7.56686707.png'),
('PabloFit7', 'X8l!P9qW5z', 'gerente', 'imagen_PabloFit7_671591d24d3a91.30586983.png'),
('Pedro24', 'Ped!ro987', 'cliente', 'imagen_Pedro24_6716d9d78561a8.26656575.png'),
('Peñarol_equipo_seleccionador', 'peñarol534', 'seleccionador', 'imagen_Peñarol_equipo_seleccionador_6715976d7bf2a7.63383996.png'),
('PowerTrainerVale', 'Vale33214', 'entrenador', 'imagen_PowerTrainerVale_67159cb7961ea9.06806882.png'),
('ProTrainerAna', 'dc3w6sv ', 'entrenador', 'imagen_ProTrainerAna_67159c29aa76a5.97435921.png'),
('RicardoTrainer', 'Ric@trainer44', 'cliente', 'imagen_RicardoTrainer_6716db2db5a4d8.92411411.png'),
('seleccionador', 'seleccionador', 'seleccionador', 'Default.png'),
('seleccionador2334', '7d77jka', 'gerente', 'imagen_seleccionador2334_6715986386ed04.48914232.png'),
('SofiaFitness5', 'Sofi#Fit!05', 'cliente', 'imagen_SofiaFitness5_6716d8640f74a7.52649713.png'),
('SofiaForce', 'Sofi#force567', 'cliente', 'imagen_SofiaForce_6716db8dd69848.11588946.png'),
('SofiaPro10', 'Z6v!x4N9jo', 'gerente', 'imagen_SofiaPro10_67159213512464.19657931.png'),
('sub24BasketSeleccionador', 'basket?sub24?5556432', 'seleccionador', 'imagen_sub24BasketSeleccionador_671597cff1c4e7.74747668.png'),
('TI_team', 'jU1p@F5KxR', 'administrador', 'imagen_TI_team_6715900de2e495.52142610.png'),
('TrainerSofiPro', 'afesDofi', 'entrenador', 'imagen_TrainerSofiPro_67159c69a5d1b7.52975054.png'),
('ValePro6', 'Va!le5432', 'cliente', 'imagen_ValePro6_6716d8b1f0afa2.78052576.png'),
('ValeStrong8', 'rP3$L8hTrP3$L8hT', 'gerente', 'imagen_ValeStrong8_6715930b191e01.69838420.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendado`
--
ALTER TABLE `agendado`
  ADD PRIMARY KEY (`nombre_cliente`,`mes`),
  ADD KEY `nombre_gimnasio` (`nombre_gimnasio`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nombre_de_usuario`);

--
-- Indices de la tabla `cliente_telefono`
--
ALTER TABLE `cliente_telefono`
  ADD PRIMARY KEY (`nombre_de_usuario`,`telefono`);

--
-- Indices de la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD PRIMARY KEY (`nombre_de_usuario`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`nombre_de_usuario`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `estan`
--
ALTER TABLE `estan`
  ADD PRIMARY KEY (`nombre_equipo`,`nombre_deportista`),
  ADD KEY `nombre_deportista` (`nombre_deportista`);

--
-- Indices de la tabla `fisioterapia`
--
ALTER TABLE `fisioterapia`
  ADD PRIMARY KEY (`nombre_de_usuario`);

--
-- Indices de la tabla `gimnasio`
--
ALTER TABLE `gimnasio`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `le_corresponde`
--
ALTER TABLE `le_corresponde`
  ADD PRIMARY KEY (`id`,`nombre_de_usuario`),
  ADD KEY `nombre_de_usuario` (`nombre_de_usuario`);

--
-- Indices de la tabla `pasa`
--
ALTER TABLE `pasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_cliente` (`nombre_cliente`),
  ADD KEY `nombre_estado` (`nombre_estado`);

--
-- Indices de la tabla `plan_entrenamiento`
--
ALTER TABLE `plan_entrenamiento`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `puede_usar`
--
ALTER TABLE `puede_usar`
  ADD PRIMARY KEY (`nombre_de_usuario`,`nombre_equipo`),
  ADD KEY `nombre_equipo` (`nombre_equipo`);

--
-- Indices de la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD PRIMARY KEY (`nombre_cliente`,`nombre_plan`),
  ADD KEY `nombre_plan` (`nombre_plan`);

--
-- Indices de la tabla `tiene_asignado`
--
ALTER TABLE `tiene_asignado`
  ADD PRIMARY KEY (`nombre_cliente`,`nombre_entrenador`),
  ADD KEY `nombre_entrenador` (`nombre_entrenador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre_de_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `pasa`
--
ALTER TABLE `pasa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agendado`
--
ALTER TABLE `agendado`
  ADD CONSTRAINT `agendado_ibfk_1` FOREIGN KEY (`nombre_cliente`) REFERENCES `cliente` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendado_ibfk_2` FOREIGN KEY (`nombre_gimnasio`) REFERENCES `gimnasio` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`nombre_de_usuario`) REFERENCES `usuario` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_telefono`
--
ALTER TABLE `cliente_telefono`
  ADD CONSTRAINT `cliente_telefono_ibfk_1` FOREIGN KEY (`nombre_de_usuario`) REFERENCES `cliente` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD CONSTRAINT `deportista_ibfk_1` FOREIGN KEY (`nombre_de_usuario`) REFERENCES `cliente` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `entrenador_ibfk_1` FOREIGN KEY (`nombre_de_usuario`) REFERENCES `usuario` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estan`
--
ALTER TABLE `estan`
  ADD CONSTRAINT `estan_ibfk_1` FOREIGN KEY (`nombre_equipo`) REFERENCES `equipo` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estan_ibfk_2` FOREIGN KEY (`nombre_deportista`) REFERENCES `deportista` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fisioterapia`
--
ALTER TABLE `fisioterapia`
  ADD CONSTRAINT `fisioterapia_ibfk_1` FOREIGN KEY (`nombre_de_usuario`) REFERENCES `cliente` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `le_corresponde`
--
ALTER TABLE `le_corresponde`
  ADD CONSTRAINT `le_corresponde_ibfk_1` FOREIGN KEY (`id`) REFERENCES `calificacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `le_corresponde_ibfk_2` FOREIGN KEY (`nombre_de_usuario`) REFERENCES `cliente` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pasa`
--
ALTER TABLE `pasa`
  ADD CONSTRAINT `pasa_ibfk_1` FOREIGN KEY (`nombre_cliente`) REFERENCES `cliente` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasa_ibfk_2` FOREIGN KEY (`nombre_estado`) REFERENCES `estado` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puede_usar`
--
ALTER TABLE `puede_usar`
  ADD CONSTRAINT `puede_usar_ibfk_1` FOREIGN KEY (`nombre_de_usuario`) REFERENCES `usuario` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puede_usar_ibfk_2` FOREIGN KEY (`nombre_equipo`) REFERENCES `equipo` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD CONSTRAINT `realiza_ibfk_1` FOREIGN KEY (`nombre_cliente`) REFERENCES `cliente` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realiza_ibfk_2` FOREIGN KEY (`nombre_plan`) REFERENCES `plan_entrenamiento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiene_asignado`
--
ALTER TABLE `tiene_asignado`
  ADD CONSTRAINT `tiene_asignado_ibfk_1` FOREIGN KEY (`nombre_cliente`) REFERENCES `cliente` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiene_asignado_ibfk_2` FOREIGN KEY (`nombre_entrenador`) REFERENCES `entrenador` (`nombre_de_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;