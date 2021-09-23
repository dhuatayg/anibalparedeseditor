-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2021 a las 00:18:26
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `anibal_paredes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `001_estado`
--

CREATE TABLE `001_estado` (
  `estado_id` int(11) NOT NULL,
  `estado_codigo` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_ind` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `001_estado`
--

INSERT INTO `001_estado` (`estado_id`, `estado_codigo`, `estado_nombre`, `estado_descripcion`, `estado_ind`) VALUES
(1, 'EST-000001', 'ACTIVO', 'ELEMENTO DISPONIBLE', 1),
(2, 'EST-000002', 'INACTIVO', 'ELEMENTO NO DISPONIBLE.', 1),
(3, 'EST-000003', 'ELIMINADO', 'ELEMENTO ELIMINADO', 1),
(4, 'EST-000004', 'TERMINADO', ' SE TERMINO LA PRODUCCIÓN.', 1),
(5, 'EST-000005', 'EN PRODUCCIÓN', 'LOS PRODUCTOS SE ENCUENTRAN EN PODUCCIÓN', 1),
(6, 'EST-000006', 'SIN PLANIFICAR', ' LA PROPDUCCION AUN NO SE HA PLANIFICADO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `002_rol`
--

CREATE TABLE `002_rol` (
  `rol_id` int(11) NOT NULL,
  `rol_codigo` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rol_nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rol_descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `002_rol`
--

INSERT INTO `002_rol` (`rol_id`, `rol_codigo`, `rol_nombre`, `rol_descripcion`, `estado_id`) VALUES
(1, 'ROL-000001', 'ADMINISTRADOR', 'ROL CON TODOS LOS PRIVILEGIOS.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `003_usuario`
--

CREATE TABLE `003_usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_codigo` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_documento` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_nombres` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_apellidos` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_usuario` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_clave` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `003_usuario`
--

INSERT INTO `003_usuario` (`usuario_id`, `usuario_codigo`, `usuario_documento`, `usuario_nombres`, `usuario_apellidos`, `usuario_usuario`, `usuario_clave`, `rol_id`, `estado_id`) VALUES
(1, 'USU-000001', '48015506', 'ANGEL POOL', 'CONTRERAS PAIMA', 'ACONTRERASP', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `004_maquina`
--

CREATE TABLE `004_maquina` (
  `maquina_id` int(11) NOT NULL,
  `maquina_codigo` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `maquina_nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `maquina_descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `maquina_cantidad` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `004_maquina`
--

INSERT INTO `004_maquina` (`maquina_id`, `maquina_codigo`, `maquina_nombre`, `maquina_descripcion`, `maquina_cantidad`, `area_id`, `estado_id`) VALUES
(3, 'MAQ-000001', 'IMPRESORA EPSON SURECOLOR T7270S', ' MODELO: SCT7270SRS', 10, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `005_area`
--

CREATE TABLE `005_area` (
  `area_id` int(11) NOT NULL,
  `area_codigo` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `area_nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `area_descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `005_area`
--

INSERT INTO `005_area` (`area_id`, `area_codigo`, `area_nombre`, `area_descripcion`, `estado_id`) VALUES
(1, 'ARE-000001', 'ADMINISTRACIÓN', ' AREA ENCARGADA DE LA ADMINISTRACIÓN DE LA EMPRESA.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `006_fase`
--

CREATE TABLE `006_fase` (
  `fase_id` int(11) NOT NULL,
  `fase_codigo` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fase_nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fase_descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `006_fase`
--

INSERT INTO `006_fase` (`fase_id`, `fase_codigo`, `fase_nombre`, `fase_descripcion`, `area_id`, `estado_id`) VALUES
(1, 'FAS-000001', 'IMPRESIÓN', 'SE IMPRIME EL CONTENIDO EN LAS HOJAS.', 1, 1),
(2, 'FAS-000002', 'CORTE', 'SE REALIZA EL CORTE DE LOS PLIEGOS.', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `007_material`
--

CREATE TABLE `007_material` (
  `material_id` int(11) NOT NULL,
  `material_codigo` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `material_nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `material_descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `material_unidad` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `material_stock` int(11) DEFAULT NULL,
  `material_precio` decimal(11,0) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `007_material`
--

INSERT INTO `007_material` (`material_id`, `material_codigo`, `material_nombre`, `material_descripcion`, `material_unidad`, `material_stock`, `material_precio`, `estado_id`) VALUES
(1, 'MAT-000001', 'HOJAS A4', ' HOJAS DE TIPO A4 DE MEDIDA DE 21 X 29,7 CM.', 'UNIDAD', 1000, '34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `008_categoria`
--

CREATE TABLE `008_categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_codigo` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `categoria_nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `categoria_descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `008_categoria`
--

INSERT INTO `008_categoria` (`categoria_id`, `categoria_codigo`, `categoria_nombre`, `categoria_descripcion`, `estado_id`) VALUES
(1, 'CAT-000001', 'LIBRO', ' CONJUNTO DE HOJAS DE PAPEL UNIDAS POR UNO DE SUS LADOS FORMANDO UN SOLO VOLUMEN.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `009_cliente`
--

CREATE TABLE `009_cliente` (
  `cliente_id` int(11) NOT NULL,
  `cliente_codigo` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cliente_documento` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cliente_razon` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cliente_telefono` int(11) DEFAULT NULL,
  `cliente_correo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `009_cliente`
--

INSERT INTO `009_cliente` (`cliente_id`, `cliente_codigo`, `cliente_documento`, `cliente_razon`, `cliente_telefono`, `cliente_correo`, `estado_id`) VALUES
(1, 'CLI-000001', '20538732941', 'ANIBAL PAREDES EDITOR S.A.C.', 3311522, 'IMPRENTA@ANIBALPAREDES.COM', 1),
(2, 'CLI-000002', '20494739152', 'A-1 MULTISERVICIOS E INVERSIONES S.A.C.', 966804140, 'A_1_MULTI@VENTAS.COM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `010_producto`
--

CREATE TABLE `010_producto` (
  `producto_id` int(11) NOT NULL,
  `producto_codigo` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `producto_nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `producto_descripcion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `producto_stock` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `010_producto`
--

INSERT INTO `010_producto` (`producto_id`, `producto_codigo`, `producto_nombre`, `producto_descripcion`, `producto_stock`, `categoria_id`, `estado_id`) VALUES
(1, 'PRO-000001', 'QUIJOTE', 'HOLA', '41', 1, 1),
(2, 'PRO-000002', 'ODISEA', 'GÉNERO: EPOPEYA, GUERRA DE TROYA,  IDIOMA: ESPAÑOL', '50', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `011_producto_material`
--

CREATE TABLE `011_producto_material` (
  `producto_material_id` int(11) NOT NULL,
  `producto_material_cantidad` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `producto_material_monto` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `012_produccion`
--

CREATE TABLE `012_produccion` (
  `produccion_id` int(10) NOT NULL,
  `producto_id` int(10) NOT NULL,
  `produccion_codigo` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `produccion_inicio` date DEFAULT NULL,
  `produccion_fin` date DEFAULT NULL,
  `produccion_cantidad` int(10) DEFAULT NULL,
  `produccion_producido` int(10) DEFAULT NULL,
  `produccion_real` int(10) DEFAULT 0,
  `produccion_reprocesado` int(10) DEFAULT 0,
  `produccion_monto_material` decimal(10,0) NOT NULL,
  `produccion_monto_trabajo` decimal(10,0) NOT NULL,
  `produccion_monto_indirecto` decimal(10,0) NOT NULL,
  `produccion_total_produccion` decimal(10,0) NOT NULL,
  `estado_id` int(10) NOT NULL,
  `produccion_indicador` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `012_produccion`
--

INSERT INTO `012_produccion` (`produccion_id`, `producto_id`, `produccion_codigo`, `produccion_inicio`, `produccion_fin`, `produccion_cantidad`, `produccion_producido`, `produccion_real`, `produccion_reprocesado`, `produccion_monto_material`, `produccion_monto_trabajo`, `produccion_monto_indirecto`, `produccion_total_produccion`, `estado_id`, `produccion_indicador`) VALUES
(3, 1, 'OSI-000001', '2021-07-01', '2021-09-30', 315, 240, 240, 46, '0', '0', '0', '0', 5, 1),
(4, 1, 'OSI-000002', '2021-07-02', '2021-09-29', 347, 278, 278, 43, '0', '0', '0', '0', 1, NULL),
(5, 2, 'OSI-000003', '2021-07-03', '2021-09-24', 349, 232, 232, 48, '0', '0', '0', '0', 6, 1),
(6, 2, 'OSI-000004', '2021-07-04', '2021-09-27', 361, 282, 282, 32, '0', '0', '0', '0', 6, 1),
(11, 1, 'OSI-000005', '2021-07-06', '2021-09-19', 315, 240, 240, 48, '0', '0', '0', '0', 1, 1),
(13, 1, 'OSI-000006', '2021-07-07', '2021-09-19', 339, 231, 231, 29, '0', '0', '0', '0', 1, 1),
(14, 1, 'OSI-000007', '2021-07-08', '2021-09-19', 377, 310, 310, 41, '0', '0', '0', '0', 1, 1),
(16, 1, 'OSI-000008', '2021-07-09', '2021-09-19', 377, 284, 284, 50, '0', '0', '0', '0', 1, 1),
(17, 1, 'OSI-000009', '2021-07-10', '2021-09-19', 333, 245, 245, 39, '0', '0', '0', '0', 1, 1),
(18, 1, 'OSI-000010', '2021-07-11', '2021-09-19', 437, 329, 329, 48, '0', '0', '0', '0', 1, 1),
(22, 1, 'OSI-000011', '2021-07-13', '2021-09-19', 315, 240, 240, 29, '0', '0', '0', '0', 1, 1),
(24, 1, 'OSI-000012', '2021-07-14', '2021-09-19', 275, 234, 234, 39, '0', '0', '0', '0', 1, 1),
(25, 1, 'OSI-000013', '2021-07-15', '2021-09-19', 368, 242, 242, 42, '0', '0', '0', '0', 1, 1),
(27, 1, 'OSI-000014', '2021-07-16', '2021-09-19', 370, 276, 276, 35, '0', '0', '0', '0', 1, 1),
(28, 1, 'OSI-000015', '2021-07-17', '2021-09-19', 326, 245, 245, 46, '0', '0', '0', '0', 1, 1),
(29, 1, 'OSI-000016', '2021-07-18', '2021-09-19', 302, 256, 256, 34, '0', '0', '0', '0', 1, 1),
(30, 1, 'OSI-000017', '2021-09-20', '2021-09-19', 348, 275, 275, 47, '0', '0', '0', '0', 1, 1),
(31, 1, 'OSI-000018', '2021-07-21', '2021-09-19', 352, 296, 296, 32, '0', '0', '0', '0', 1, 1),
(32, 1, 'OSI-000019', '2021-07-22', '2021-09-19', 445, 328, 328, 32, '0', '0', '0', '0', 1, 1),
(33, 1, 'OSI-000020', '2021-07-23', '2021-09-19', 370, 268, 268, 49, '0', '0', '0', '0', 1, 1),
(34, 1, 'OSI-000021', '2021-07-24', '2021-09-19', 330, 255, 255, 41, '0', '0', '0', '0', 1, 1),
(35, 1, 'OSI-000022', '2021-07-25', '2021-09-19', 359, 309, 309, 46, '0', '0', '0', '0', 1, 1),
(37, 1, 'OSI-000023', '2021-07-26', '2021-09-19', 414, 303, 303, 29, '0', '0', '0', '0', 1, 1),
(38, 1, 'OSI-000024', '2021-07-28', '0000-00-00', 318, 235, 235, 43, '0', '0', '0', '0', 1, 1),
(39, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', '0', '0', '0', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `013_trabajo`
--

CREATE TABLE `013_trabajo` (
  `trabajo_id` int(10) NOT NULL,
  `produccion_id` int(10) NOT NULL,
  `trabajo_fecha` date DEFAULT NULL,
  `trabajo_nempleados` int(5) NOT NULL,
  `trabajo_horas` int(10) NOT NULL,
  `trabajo_tasa` int(10) NOT NULL,
  `trabajo_monto` int(10) NOT NULL,
  `estado_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `014_indirecto`
--

CREATE TABLE `014_indirecto` (
  `indirecto_id` int(10) NOT NULL,
  `produccion_id` int(10) NOT NULL,
  `indirecto_descripcion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `indirecto_valor` decimal(10,0) NOT NULL,
  `estado_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `015_proceso_produccion`
--

CREATE TABLE `015_proceso_produccion` (
  `proceso_produccion_id` int(10) NOT NULL,
  `produccion_id` int(10) NOT NULL,
  `fase_id` int(10) NOT NULL,
  `proceso_produccion_total` int(10) NOT NULL,
  `proceso_produccion_realizado` int(10) NOT NULL,
  `proceso_produccion_indicador` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `016_timeline`
--

CREATE TABLE `016_timeline` (
  `timeline_id` int(10) NOT NULL,
  `proceso_produccion_id` int(10) NOT NULL,
  `timeline_fecha` date DEFAULT NULL,
  `timeline_cantidad` int(10) DEFAULT NULL,
  `timeline_reprocesado` int(10) NOT NULL DEFAULT 0,
  `timeline_incidencia` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `timeline_indicador` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `001_estado`
--
ALTER TABLE `001_estado`
  ADD PRIMARY KEY (`estado_id`);

--
-- Indices de la tabla `002_rol`
--
ALTER TABLE `002_rol`
  ADD PRIMARY KEY (`rol_id`),
  ADD KEY `estado_rol_fk` (`estado_id`);

--
-- Indices de la tabla `003_usuario`
--
ALTER TABLE `003_usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `id_rol` (`rol_id`),
  ADD KEY `estado_usuario_fk` (`estado_id`);

--
-- Indices de la tabla `004_maquina`
--
ALTER TABLE `004_maquina`
  ADD PRIMARY KEY (`maquina_id`),
  ADD KEY `estado_maquina_fk` (`estado_id`),
  ADD KEY `area_maquina_fk` (`area_id`);

--
-- Indices de la tabla `005_area`
--
ALTER TABLE `005_area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `estado_area_fk` (`estado_id`);

--
-- Indices de la tabla `006_fase`
--
ALTER TABLE `006_fase`
  ADD PRIMARY KEY (`fase_id`),
  ADD KEY `area_fase_fk` (`area_id`),
  ADD KEY `estado_fase_fk` (`estado_id`);

--
-- Indices de la tabla `007_material`
--
ALTER TABLE `007_material`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `estado_material_fk` (`estado_id`);

--
-- Indices de la tabla `008_categoria`
--
ALTER TABLE `008_categoria`
  ADD PRIMARY KEY (`categoria_id`),
  ADD KEY `estado_categoria_fk` (`estado_id`);

--
-- Indices de la tabla `009_cliente`
--
ALTER TABLE `009_cliente`
  ADD PRIMARY KEY (`cliente_id`),
  ADD KEY `estado_cliente_fk` (`estado_id`);

--
-- Indices de la tabla `010_producto`
--
ALTER TABLE `010_producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_producto_fk` (`categoria_id`),
  ADD KEY `estado_producto_fk` (`estado_id`);

--
-- Indices de la tabla `011_producto_material`
--
ALTER TABLE `011_producto_material`
  ADD PRIMARY KEY (`producto_material_id`),
  ADD KEY `material_pm_fk` (`material_id`),
  ADD KEY `producto_pm_fk` (`producto_id`);

--
-- Indices de la tabla `012_produccion`
--
ALTER TABLE `012_produccion`
  ADD PRIMARY KEY (`produccion_id`),
  ADD KEY `fk_produccion_producto_idx` (`producto_id`),
  ADD KEY `fk_produccion_proceso_idx` (`estado_id`);

--
-- Indices de la tabla `013_trabajo`
--
ALTER TABLE `013_trabajo`
  ADD PRIMARY KEY (`trabajo_id`),
  ADD KEY `fk_trabajo_produccion_idx` (`produccion_id`),
  ADD KEY `fk_trabajo_estado` (`estado_id`);

--
-- Indices de la tabla `014_indirecto`
--
ALTER TABLE `014_indirecto`
  ADD PRIMARY KEY (`indirecto_id`),
  ADD KEY `fk_indirecto_produccion` (`produccion_id`),
  ADD KEY `fk_indirecto_estado` (`estado_id`);

--
-- Indices de la tabla `015_proceso_produccion`
--
ALTER TABLE `015_proceso_produccion`
  ADD PRIMARY KEY (`proceso_produccion_id`),
  ADD KEY `fk_produccion_proc_produccion` (`produccion_id`),
  ADD KEY `fk_fase_proc_produccion` (`fase_id`) USING BTREE;

--
-- Indices de la tabla `016_timeline`
--
ALTER TABLE `016_timeline`
  ADD PRIMARY KEY (`timeline_id`),
  ADD KEY `fk_timeline_proceso_produccion` (`proceso_produccion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `001_estado`
--
ALTER TABLE `001_estado`
  MODIFY `estado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `002_rol`
--
ALTER TABLE `002_rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `003_usuario`
--
ALTER TABLE `003_usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `004_maquina`
--
ALTER TABLE `004_maquina`
  MODIFY `maquina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `005_area`
--
ALTER TABLE `005_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `006_fase`
--
ALTER TABLE `006_fase`
  MODIFY `fase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `007_material`
--
ALTER TABLE `007_material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `008_categoria`
--
ALTER TABLE `008_categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `009_cliente`
--
ALTER TABLE `009_cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `010_producto`
--
ALTER TABLE `010_producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `011_producto_material`
--
ALTER TABLE `011_producto_material`
  MODIFY `producto_material_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `012_produccion`
--
ALTER TABLE `012_produccion`
  MODIFY `produccion_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `013_trabajo`
--
ALTER TABLE `013_trabajo`
  MODIFY `trabajo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `014_indirecto`
--
ALTER TABLE `014_indirecto`
  MODIFY `indirecto_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `015_proceso_produccion`
--
ALTER TABLE `015_proceso_produccion`
  MODIFY `proceso_produccion_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `016_timeline`
--
ALTER TABLE `016_timeline`
  MODIFY `timeline_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `002_rol`
--
ALTER TABLE `002_rol`
  ADD CONSTRAINT `estado_rol_fk` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `003_usuario`
--
ALTER TABLE `003_usuario`
  ADD CONSTRAINT `estado_usuario_fk` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rol_usuario_fk` FOREIGN KEY (`rol_id`) REFERENCES `002_rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `004_maquina`
--
ALTER TABLE `004_maquina`
  ADD CONSTRAINT `area_maquina_fk` FOREIGN KEY (`area_id`) REFERENCES `005_area` (`area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estado_maquina_fk` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `005_area`
--
ALTER TABLE `005_area`
  ADD CONSTRAINT `estado_area_fk` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `006_fase`
--
ALTER TABLE `006_fase`
  ADD CONSTRAINT `area_fase_fk` FOREIGN KEY (`area_id`) REFERENCES `005_area` (`area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estado_fase_fk` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `007_material`
--
ALTER TABLE `007_material`
  ADD CONSTRAINT `estado_material_fk` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `008_categoria`
--
ALTER TABLE `008_categoria`
  ADD CONSTRAINT `estado_categoria_fk` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `009_cliente`
--
ALTER TABLE `009_cliente`
  ADD CONSTRAINT `estado_cliente_fk` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`);

--
-- Filtros para la tabla `010_producto`
--
ALTER TABLE `010_producto`
  ADD CONSTRAINT `categoria_producto_fk` FOREIGN KEY (`categoria_id`) REFERENCES `008_categoria` (`categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estado_producto_fk` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `011_producto_material`
--
ALTER TABLE `011_producto_material`
  ADD CONSTRAINT `material_pm_fk` FOREIGN KEY (`material_id`) REFERENCES `007_material` (`material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `producto_pm_fk` FOREIGN KEY (`producto_id`) REFERENCES `010_producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `012_produccion`
--
ALTER TABLE `012_produccion`
  ADD CONSTRAINT `fk_produccion_estado` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`),
  ADD CONSTRAINT `fk_produccion_producto` FOREIGN KEY (`producto_id`) REFERENCES `010_producto` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `013_trabajo`
--
ALTER TABLE `013_trabajo`
  ADD CONSTRAINT `fk_trabajo_estado` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`),
  ADD CONSTRAINT `fk_trabajo_produccion` FOREIGN KEY (`produccion_id`) REFERENCES `012_produccion` (`produccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `014_indirecto`
--
ALTER TABLE `014_indirecto`
  ADD CONSTRAINT `fk_indirecto_estado` FOREIGN KEY (`estado_id`) REFERENCES `001_estado` (`estado_id`),
  ADD CONSTRAINT `fk_indirecto_produccion` FOREIGN KEY (`produccion_id`) REFERENCES `012_produccion` (`produccion_id`);

--
-- Filtros para la tabla `015_proceso_produccion`
--
ALTER TABLE `015_proceso_produccion`
  ADD CONSTRAINT `fk_fase_proc_produccion` FOREIGN KEY (`fase_id`) REFERENCES `006_fase` (`fase_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produccion_proc_produccion` FOREIGN KEY (`produccion_id`) REFERENCES `012_produccion` (`produccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `016_timeline`
--
ALTER TABLE `016_timeline`
  ADD CONSTRAINT `fk_timeline_proceso_produccion` FOREIGN KEY (`proceso_produccion_id`) REFERENCES `015_proceso_produccion` (`proceso_produccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
