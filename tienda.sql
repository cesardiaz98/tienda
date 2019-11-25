-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2019 a las 08:33:01
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------
create DATABASE tienda;
create user tienda identified by 'tiendaBueno';
use tienda;
grant all on tienda.* to tienda;

CREATE TABLE `compran` (
  `idCompra` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idUsuario` varchar(50) NOT NULL,
  `precio_total` float(8,2) NOT NULL,
  `fecha` date NOT NULL,
  `cantidadProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `precio` float(7,2) DEFAULT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `cantidad`, `precio`, `nombreProducto`, `descripcion`, `imagen`) VALUES
(1, 100, 650.00, 'iPhone 11', 'Cuenta con 4 GB de memoria y 64 / 128 / 512 GB de almacenamiento interno. iPhone 11 posee dos cámaras traseras. El sensor principal es de 12 MP y 26 mm, con una apertura f/1.8, un tamaño de píxel de 1.4 micras, Autofoco y OIS. ... El sensor secundario es un gran angular de 12 MP y 13 mm, con una apertura f/2.4.', './imagenes/iphone-11tabla.jpg'),
(2, 100, 800.00, 'iPhone 11 Pro', 'La pantalla Super Retina XDR del iPhone 11 Pro tiene un tamaño de 5,8 pulgadas, con una resolución de 2436 x 1125 píxeles, con tecnología OLED. Alcanza los 458 puntos por pulgada. El ratio de pantalla es 19,5:9.', './imagenes/iPhone_11_Pro.jpg'),
(3, 100, 500.00, 'Samsung galaxy S10', 'El Galaxy S10 tiene una pantalla QHD+ Dynamic AMOLED de 6.1 pulgadas, y está potenciado por el nuevo procesador Exynos 9820 de ocho núcleos o bien un Snapdragon 855, con 8GB de RAM y 128GB o 512GB de almacenamiento.', './imagenes/s10.jpg'),
(4, 100, 600.00, 'Samsung galaxy S10+', 'El Samsung Galaxy S10+ es el más poderoso de la serie Galaxy S10. Con una pantalla AMOLED QHD+ de 6.4 pulgadas, el Galaxy S10+ está potenciado por el procesador Exynos 9820 octa-core o Snapdragon 855, con opciones de 6GB o 12GB de RAM y 128GB, 512GB o 1TB de almacenamiento.', './imagenes/s10+.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`) VALUES
('cesardiaz', 'hola123'),
('mariad', 'a654321'),
('miguelgar', 'adios123'),
('olgaes', 'a123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compran`
--
ALTER TABLE `compran`
  ADD PRIMARY KEY (`idCompra`,`idProducto`,`idUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compran`
--
ALTER TABLE `compran`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
