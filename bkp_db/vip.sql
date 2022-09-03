-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2022 a las 15:03:14
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vip`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '0000_00_00_000000_mautic_api_consumer_key', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_de_opcion` varchar(55) DEFAULT NULL,
  `no_listar_campos` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acciones_extra` varchar(250) DEFAULT NULL,
  `no_mostrar_campos_abm` varchar(500) DEFAULT NULL,
  `permisos` char(5) DEFAULT NULL,
  `seteo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `nombre_de_opcion`, `no_listar_campos`, `created_at`, `updated_at`, `acciones_extra`, `no_mostrar_campos_abm`, `permisos`, `seteo`) VALUES
(2, 'User', 'password|remember_token|', '2018-10-30 22:35:50', '2018-10-30 22:35:50', NULL, NULL, NULL, NULL),
(6, 'Encabezados', 'titulo_mensaje_2|titulo_mensaje_3|titulo_mensaje_4|titulo_mensaje_5|mensaje_2|mensaje_3|mensaje_4|mensaje_5', '2019-07-11 03:42:10', '2019-07-11 03:43:13', 'ver listas,fa fa-list,ver-listas', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fernandomadoz@hotmail.com', '$2y$10$yeDX91rfzu9DxfLSEoIXCOhXmcbaonxQ/W41e0qJOrulh51Egd8am', '2019-01-29 21:22:21'),
('gnosis.araruama@gmail.com', '$2y$10$BaShLwBsEaP0Bb734rSK9uZHJvdAEpz10Q/HcNziAYlgr/JfWFyiS', '2019-04-22 23:05:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_de_usuario`
--

CREATE TABLE `roles_de_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_de_usuario` varchar(45) NOT NULL,
  `nivel_de_acceso` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles_de_usuario`
--

INSERT INTO `roles_de_usuario` (`id`, `rol_de_usuario`, `nivel_de_acceso`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 1, '2018-10-30 22:38:21', '2018-12-12 17:43:14'),
(2, 'Gestor', 2, '2018-10-30 22:38:28', '2019-10-10 13:39:01'),
(3, '', 0, '2018-12-12 17:43:29', '2019-03-02 04:37:17'),
(4, '', 0, '2019-03-02 04:37:25', '2019-03-02 04:37:25'),
(5, '', 0, '2019-03-13 15:34:54', '2019-03-13 15:34:54'),
(6, '', 0, '2019-03-16 17:11:01', '2019-03-22 15:32:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scans`
--

CREATE TABLE `scans` (
  `id` int(10) UNSIGNED NOT NULL,
  `tarjeta_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `scans`
--

INSERT INTO `scans` (`id`, `tarjeta_id`, `user_id`, `created_at`, `updated_at`) VALUES
(15, 6, 2, '2019-10-10 17:03:10', '2019-10-10 17:03:10'),
(16, 6, 2, '2019-10-10 17:03:15', '2019-10-10 17:03:15'),
(17, 6, 1, '2019-10-10 18:26:18', '2019-10-10 18:26:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cantidad_de_personas` int(10) UNSIGNED NOT NULL,
  `fecha_de_vencimiento` date NOT NULL,
  `nro_de_celular_a_enviar` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `nombre`, `cantidad_de_personas`, `fecha_de_vencimiento`, `nro_de_celular_a_enviar`, `created_at`, `updated_at`) VALUES
(2, 'Fernando', 2, '2019-10-10', '3804201747', '2019-10-10 14:09:09', '2019-10-10 14:09:09'),
(3, 'Fernando', 2, '2019-10-10', '22', '2019-10-10 14:19:23', '2019-10-10 14:19:23'),
(4, 'Fernando Miguel Madoz', 3, '2019-10-10', '3804201747', '2019-10-10 15:07:16', '2019-10-10 16:24:48'),
(5, 'Fernando', 5, '2019-10-10', '3804201747', '2019-10-10 15:44:27', '2019-10-10 15:44:27'),
(6, 'Fernando M', 5, '2019-10-10', '3804201747', '2019-10-10 16:35:00', '2019-10-10 16:35:00'),
(7, 'Fernando', 222, '2019-10-10', '3804201747', '2019-10-10 21:31:56', '2019-10-10 21:31:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol_de_usuario_id` int(10) UNSIGNED DEFAULT NULL,
  `telegram_chat_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `rol_de_usuario_id`, `telegram_chat_id`, `celular`) VALUES
(1, 'Fernando', 'fernandomadoz@hotmail.com', '$2y$10$ce/BlY9WgswNehJBHZGmWu8agaMCc2ce.YS3z9kWqFaysM9.8wAO6', 'wKI14EDPRX8LkssXbdw0iLf8tSF247mxg5tVgpjFLaltBfwPND4ftVknEjTj', '2018-10-24 03:09:31', '2019-04-04 01:24:07', 1, '632979534', '+5493804201747'),
(2, 'Nacho', 'igmadoz@hotmail.com', '$2y$10$x9mEZV2EeAkHtjN1ZSBELOlYiqiN.heKObNDYFlXlr4JDlnUG2R6.', 'OmXqubBMjJ27w15UO7OAL0so5AGvTuMxqfod51aYaC6ORUrpDcVvAenMfcPH', '2019-10-10 13:27:40', '2019-10-10 13:36:36', 2, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `roles_de_usuario`
--
ALTER TABLE `roles_de_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `scans`
--
ALTER TABLE `scans`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `FK_users_2` (`rol_de_usuario_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `roles_de_usuario`
--
ALTER TABLE `roles_de_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `scans`
--
ALTER TABLE `scans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_2` FOREIGN KEY (`rol_de_usuario_id`) REFERENCES `roles_de_usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
