-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Erstellungszeit: 16. Apr 2023 um 20:57
-- Server-Version: 10.3.34-MariaDB-1:10.3.34+maria~focal-log
-- PHP-Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
                                     `id` int(11) UNSIGNED NOT NULL,
                                     `user_id` int(11) UNSIGNED NOT NULL,
                                     `group` varchar(255) NOT NULL,
                                     `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
    (1, 10, 'user', '2023-04-16 10:48:49');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_identities`
--

CREATE TABLE `auth_identities` (
                                   `id` int(11) UNSIGNED NOT NULL,
                                   `user_id` int(11) UNSIGNED NOT NULL,
                                   `type` varchar(255) NOT NULL,
                                   `name` varchar(255) DEFAULT NULL,
                                   `secret` varchar(255) NOT NULL,
                                   `secret2` varchar(255) DEFAULT NULL,
                                   `expires` datetime DEFAULT NULL,
                                   `extra` text DEFAULT NULL,
                                   `force_reset` tinyint(1) NOT NULL DEFAULT 0,
                                   `last_used_at` datetime DEFAULT NULL,
                                   `created_at` datetime DEFAULT NULL,
                                   `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
    (1, 10, 'email_password', NULL, 'trash@menzi.info', '$2y$10$oqdqaX99I0uXhQKptTLNAezhcpzlpDRkdvRsP.OgBOpJjfncybLMu', NULL, NULL, 0, '2023-04-16 21:51:01', '2023-04-16 10:48:49', '2023-04-16 21:51:01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_logins`
--

CREATE TABLE `auth_logins` (
                               `id` int(11) UNSIGNED NOT NULL,
                               `ip_address` varchar(255) NOT NULL,
                               `user_agent` varchar(255) DEFAULT NULL,
                               `id_type` varchar(255) NOT NULL,
                               `identifier` varchar(255) NOT NULL,
                               `user_id` int(11) UNSIGNED DEFAULT NULL,
                               `date` datetime NOT NULL,
                               `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
                                                                                                                        (1, '172.25.0.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'email_password', 'trash@menzi.info', 10, '2023-04-16 18:18:59', 1),
                                                                                                                        (2, '172.25.0.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'email_password', 'trash@menzi.info', 10, '2023-04-16 21:51:01', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
                                          `id` int(11) UNSIGNED NOT NULL,
                                          `user_id` int(11) UNSIGNED NOT NULL,
                                          `permission` varchar(255) NOT NULL,
                                          `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
                                        `id` int(11) UNSIGNED NOT NULL,
                                        `selector` varchar(255) NOT NULL,
                                        `hashedValidator` varchar(255) NOT NULL,
                                        `user_id` int(11) UNSIGNED NOT NULL,
                                        `expires` datetime NOT NULL,
                                        `created_at` datetime NOT NULL,
                                        `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
                                     `id` int(11) UNSIGNED NOT NULL,
                                     `ip_address` varchar(255) NOT NULL,
                                     `user_agent` varchar(255) DEFAULT NULL,
                                     `id_type` varchar(255) NOT NULL,
                                     `identifier` varchar(255) NOT NULL,
                                     `user_id` int(11) UNSIGNED DEFAULT NULL,
                                     `date` datetime NOT NULL,
                                     `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `combination_betting`
--

CREATE TABLE `combination_betting` (
                                       `id` int(11) NOT NULL,
                                       `betting_id` int(11) NOT NULL,
                                       `sport` varchar(50) NOT NULL,
                                       `vs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `settings`
--

CREATE TABLE `settings` (
                            `id` int(11) NOT NULL,
                            `class` varchar(255) NOT NULL,
                            `key` varchar(255) NOT NULL,
                            `value` text NOT NULL,
                            `type` varchar(31) NOT NULL,
                            `context` varchar(255) NOT NULL,
                            `created_at` date NOT NULL,
                            `updated_at` date NOT NULL,
                            `sport_autofill` varchar(255) NOT NULL,
                            `currency` varchar(10) NOT NULL,
                            `combination` int(11) NOT NULL,
                            `stake` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `task`
--

CREATE TABLE `task` (
                        `id` int(11) NOT NULL,
                        `start` date NOT NULL,
                        `end` date NOT NULL,
                        `description` varchar(255) NOT NULL,
                        `priority` int(11) NOT NULL,
                        `status` int(11) NOT NULL,
                        `user_id` int(11) NOT NULL,
                        `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `task`
--

INSERT INTO `task` (`id`, `start`, `end`, `description`, `priority`, `status`, `user_id`, `title`) VALUES
    (3, '2023-04-08', '2023-04-14', 'asdf', 1, 0, 10, 'werq');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
                         `id` int(11) UNSIGNED NOT NULL,
                         `username` varchar(30) DEFAULT NULL,
                         `status` varchar(255) DEFAULT NULL,
                         `status_message` varchar(255) DEFAULT NULL,
                         `active` tinyint(1) NOT NULL DEFAULT 0,
                         `last_active` datetime DEFAULT NULL,
                         `created_at` datetime DEFAULT NULL,
                         `updated_at` datetime DEFAULT NULL,
                         `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
    (10, 'finnmenzi', NULL, NULL, 1, NULL, '2023-04-16 10:48:49', '2023-04-16 10:48:49', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
    ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `auth_identities`
--
ALTER TABLE `auth_identities`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `auth_logins`
--
ALTER TABLE `auth_logins`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
    ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `combination_betting`
--
ALTER TABLE `combination_betting`
    ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `task`
--
ALTER TABLE `task`
    ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `auth_identities`
--
ALTER TABLE `auth_identities`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `auth_logins`
--
ALTER TABLE `auth_logins`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `combination_betting`
--
ALTER TABLE `combination_betting`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `task`
--
ALTER TABLE `task`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
    ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `auth_identities`
--
ALTER TABLE `auth_identities`
    ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
    ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
    ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
