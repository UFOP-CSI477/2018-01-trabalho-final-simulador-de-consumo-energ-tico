-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Jul-2018 às 21:11
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sysconsumo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `distributors`
--

CREATE TABLE `distributors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarifa` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `distributors`
--

INSERT INTO `distributors` (`id`, `name`, `uf`, `tarifa`, `created_at`, `updated_at`) VALUES
(1, 'CEMIG', 'MG', 0.587, '2018-06-24 01:36:32', '2018-06-25 01:54:54'),
(2, 'Eletroacre', 'AC', 0.51, '2018-07-05 14:41:27', '2018-07-05 14:41:27'),
(3, 'Ceal', 'AL', 0.516, '2018-07-05 14:42:12', '2018-07-05 14:42:12'),
(4, 'AmE', 'AM', 0.604, '2018-07-05 14:43:53', '2018-07-05 14:43:53'),
(5, 'CEA', 'AP', 0.537, '2018-07-05 14:44:42', '2018-07-05 14:44:42'),
(6, 'Coelba', 'BA', 0.519, '2018-07-05 14:45:07', '2018-07-05 14:45:07'),
(7, 'DMED', 'MG', 0.414, '2018-07-05 14:45:43', '2018-07-05 14:45:43'),
(8, 'EMG', 'MG', 0.565, '2018-07-05 14:51:30', '2018-07-05 14:51:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipments`
--

CREATE TABLE `equipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `time_use` double(4,2) NOT NULL DEFAULT '0.00',
  `watts` double(8,2) NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `equipments`
--

INSERT INTO `equipments` (`id`, `name`, `amount`, `time_use`, `watts`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 'Geladeira', 1, 24.00, 118.00, 2, '2018-07-04 18:36:06', '2018-07-04 19:25:18'),
(3, 'Microondas', 1, 0.50, 700.00, 2, '2018-07-04 21:36:04', '2018-07-04 21:36:04'),
(4, 'Lâmpada', 2, 8.00, 65.00, 2, '2018-07-04 21:36:46', '2018-07-04 21:36:46'),
(5, 'Televisão', 1, 5.00, 250.00, 1, '2018-07-06 03:30:44', '2018-07-06 03:30:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_19_002525_create_aparelhos_table', 1),
(4, '2018_06_19_003038_create_comodos_table', 1),
(5, '2018_06_19_003102_create_distribuidores_table', 1),
(6, '2018_06_19_003123_create_relatorios_table', 1),
(7, '2018_06_19_003202_create_comodo_has_relatorio_table', 1),
(8, '2018_07_04_155724_alter_table_equipments', 2),
(9, '2018_07_04_162346_alter_table_equipments', 3),
(10, '2018_07_04_184251_alter_table_users', 4),
(11, '2018_07_04_184615_alter_table_users', 5),
(12, '2018_07_05_115403_alter_table_reports', 6),
(13, '2018_07_05_211450_alter_table_reports_date', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `watts` double(8,2) NOT NULL,
  `spend` double(8,2) NOT NULL,
  `tax` int(11) NOT NULL DEFAULT '0',
  `room` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `distr_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `reports`
--

INSERT INTO `reports` (`id`, `date_start`, `date_finish`, `watts`, `spend`, `tax`, `room`, `user_id`, `distr_id`, `created_at`, `updated_at`) VALUES
(5, '2018-07-09', '2018-07-16', 8.75, 5136.25, 1, 1, 1, 1, '2018-07-06 04:21:33', '2018-07-06 04:21:33'),
(4, '2018-06-11', '2018-07-11', 164.16, 170711.34, 1, 0, 1, 1, '2018-07-06 04:18:46', '2018-07-06 04:18:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sala', 1, '2018-06-25 05:10:10', '2018-06-25 05:10:10'),
(2, 'Cozinha', 1, '2018-06-25 06:26:27', '2018-07-02 18:16:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `room_has_report`
--

CREATE TABLE `room_has_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `distributor_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brenda Lima', 'brenda@mail.com', '$2y$10$F1xImiWyz1a8wXNBIarn.uSwL15j8HMaj87VF9h3Z3d4z/rxgHcDa', 1, 1, '61cQrPph39wYLoP4V2pMWlrq8OY00C4THtWDOBRsJcgj4eNtKqdZtnj754OT', '2018-07-02 01:01:55', '2018-07-06 01:48:23'),
(2, 'Administrador', 'adm@mail.com', '$2y$10$swW7ySWOI3Yodg0qo3qOjeZAUfYDm/XamCU9zEwxgv8OcDon8J/SW', 0, 0, 'SriaZorWPQwRjRopgjCh2nGPOnEqquudoCIpIuG5Fu2uugwE5sC2p1826Iz4', '2018-07-02 02:36:18', '2018-07-02 02:36:18'),
(3, 'Joaquina da Silva', 'joaquina@mail.com', '$2y$10$uQdfceAXsSXQILYEoBcwqeI83OJreeBkF4jmDU5hJqZcjQ/r1Bjya', 1, 1, 'x2Nb2or6DBRd4MG5NDA4kgYIRCRpSSZ0kGCmKYEmoPhGB7Y4dYtEB81kXhcB', '2018-07-04 22:58:15', '2018-07-04 22:58:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipments_room_id_foreign` (`room_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`),
  ADD KEY `reports_distr_id_foreign` (`distr_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `room_has_report`
--
ALTER TABLE `room_has_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_has_report_room_id_foreign` (`room_id`),
  ADD KEY `room_has_report_report_id_foreign` (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_distributor_id_foreign` (`distributor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room_has_report`
--
ALTER TABLE `room_has_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
