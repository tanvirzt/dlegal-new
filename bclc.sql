-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 05:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bclc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Imran Hossain', 'admin', '01687663654', 'mdimranhossain985@gmail.com', NULL, '$2y$10$6v9T2W4HwjWrWdYOUDyaM.Mqs8QXW0A6VywuKUxN.6F0G4If2bX4S', '43675.jpg', 1, NULL, NULL, '2020-11-18 02:26:30'),
(2, 'Imran', 'subadmin', '01687663654', 'imrancsecity@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '22748.jpg', 1, NULL, NULL, '2020-11-18 02:13:34'),
(3, 'Md. Imran', 'subadmin', '01771045019', 'admin@admin.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `civil_cases`
--

CREATE TABLE `civil_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `case_category_nature_id` int(11) DEFAULT NULL,
  `external_council_name_id` int(11) DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsequent_plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_order_court` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disbursement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_date_of_cash_receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_disposed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendent_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_cash_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `relevant_law_sections_id` int(11) DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `name_of_suit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_incident` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_incident_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_identification_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_identification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_upload` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civil_cases`
--

INSERT INTO `civil_cases` (`id`, `case_no`, `division_id`, `district_id`, `amount`, `case_status_id`, `case_category_nature_id`, `external_council_name_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `subsequent_plaintiff_name`, `last_order_court`, `additional_order`, `disbursement_date`, `last_date_of_cash_receipt`, `date_of_disposed`, `date_of_filing`, `defendent_name`, `defendent_address`, `defendent_contact_no`, `date_of_cash_received`, `case_year`, `ref_no`, `location`, `property_type`, `name_of_the_court_id`, `relevant_law_sections_id`, `contact_no`, `next_date`, `next_date_fixed_id`, `name_of_suit`, `date_of_incident`, `date_of_incident_to`, `first_identification_person`, `date_of_identification`, `case_notes`, `document_upload`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '65464321313', 2, 1, '60000', 1, 2, 3, '4', 5, '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', 22, 23, '24', '25', 26, '27', '28', '29', '30', '31', '32', '', 0, NULL, NULL, '2022-02-03 01:07:10', '2022-02-03 01:07:10'),
(2, 'werewr', 2, 3, '2000', 4, 4, NULL, 'sdffd', 4, '346684', 'asdfdsf', 'erwere', 'sfdsf', 'vcxvxcvxc', 'sdfdsfsd', 'werewr', 'xzcxc', 'vbcbcvb', 'fgdf', 'ewrewr', 'vcxvxfd', 'sdfsdf', 'cvvbvcxb', 'dfdsf', 'xcxbvcb', 5, 5, '546544', '45645', 56, 'Md Imran Hossain', 'test', 'set', 'set', 'set', 'set', NULL, 0, NULL, NULL, '2022-02-03 11:51:01', '2022-02-03 11:51:01'),
(3, 'werewr', 2, 3, '2000', 4, 4, NULL, 'sdffd', 4, '346684', 'asdfdsf', 'erwere', 'sfdsf', 'vcxvxcvxc', 'sdfdsfsd', 'werewr', 'xzcxc', 'vbcbcvb', 'fgdf', 'ewrewr', 'vcxvxfd', 'sdfsdf', 'cvvbvcxb', 'dfdsf', 'xcxbvcb', 5, 5, '546544', '45645', 56, 'Md Imran Hossain', 'test', 'set', 'set', 'set', 'set', NULL, 0, NULL, NULL, '2022-02-03 11:51:54', '2022-02-03 11:51:54'),
(4, 'werewr', 2, 3, '2000', 4, 4, NULL, 'sdffd', 4, '346684', 'asdfdsf', 'erwere', 'sfdsf', 'vcxvxcvxc', 'sdfdsfsd', 'werewr', 'xzcxc', 'vbcbcvb', 'fgdf', 'ewrewr', 'vcxvxfd', 'sdfsdf', 'cvvbvcxb', 'dfdsf', 'xcxbvcb', 5, 5, '546544', '45645', 56, 'Md Imran Hossain', 'test', 'set', 'set', 'set', 'set', NULL, 0, NULL, NULL, '2022-02-03 11:52:01', '2022-02-03 11:52:01'),
(5, '6565465', 3, 3, '45564656', 6, 5, NULL, 'frdfds', 4, 'cxvcx', 'rwere', 'dsfdsf', 'xcvcxv', 'sdfdsf', 'xcvcxvxc', 'jghgfh', 'vcbvc', 'ertert', 'fgdfg', 'vcbvcb', 'vbnbv', 'gfhfd', 'bvc', 'gfdg', 'cvvcv', 5, 8, 'fdgfgdf', 'sdfds', 1415654, 'ccfsd', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 11:53:24', '2022-02-03 11:53:24'),
(6, '6565465', 3, 3, '45564656', 6, 5, NULL, 'frdfds', 4, 'cxvcx', 'rwere', 'dsfdsf', 'xcvcxv', 'sdfdsf', 'xcvcxvxc', 'jghgfh', 'vcbvc', 'ertert', 'fgdfg', 'vcbvcb', 'vbnbv', 'gfhfd', 'bvc', 'gfdg', 'cvvcv', 5, 8, 'fdgfgdf', 'sdfds', 1415654, 'ccfsd', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 11:53:54', '2022-02-03 11:53:54'),
(7, '6565465', 3, 3, '45564656', 6, 5, NULL, 'frdfds', 4, 'cxvcx', 'rwere', 'dsfdsf', 'xcvcxv', 'sdfdsf', 'xcvcxvxc', 'jghgfh', 'vcbvc', 'ertert', 'fgdfg', 'vcbvcb', 'vbnbv', 'gfhfd', 'bvc', 'gfdg', 'cvvcv', 5, 8, 'fdgfgdf', 'sdfds', 1415654, 'ccfsd', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 11:54:02', '2022-02-03 11:54:02'),
(8, '36546545415645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 11:58:29', '2022-02-03 11:58:29'),
(9, '36546545415645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:00:14', '2022-02-03 12:00:14'),
(10, '36546545415645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:00:52', '2022-02-03 12:00:52'),
(11, '36546545415645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:01:07', '2022-02-03 12:01:07'),
(12, '36546545415645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:01:15', '2022-02-03 12:01:15'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfdsf', NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:03:55', '2022-02-03 12:03:55'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfdsf', NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:05:00', '2022-02-03 12:05:00'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfdsf', NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:05:20', '2022-02-03 12:05:20'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfdsf', NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:05:34', '2022-02-03 12:05:34'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfdsf', NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:09:51', '2022-02-03 12:09:51'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfdsfd', NULL, NULL, 0, NULL, NULL, '2022-02-03 12:10:25', '2022-02-03 12:10:25'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werewr', NULL, NULL, 0, NULL, NULL, '2022-02-03 12:13:18', '2022-02-03 12:13:18'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werewr', NULL, NULL, 0, NULL, NULL, '2022-02-03 12:14:04', '2022-02-03 12:14:04'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werewr', NULL, NULL, 0, NULL, NULL, '2022-02-03 12:15:54', '2022-02-03 12:15:54'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werewr', NULL, NULL, 0, NULL, NULL, '2022-02-03 12:16:16', '2022-02-03 12:16:16'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werewr', NULL, NULL, 0, NULL, NULL, '2022-02-03 12:16:23', '2022-02-03 12:16:23'),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werewr', NULL, NULL, 0, NULL, NULL, '2022-02-03 12:16:29', '2022-02-03 12:16:29'),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfdsfsdf', NULL, 0, NULL, NULL, '2022-02-03 12:21:04', '2022-02-03 12:21:04'),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfdsf', NULL, 0, NULL, NULL, '2022-02-03 12:24:09', '2022-02-03 12:24:09'),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werewre', NULL, 0, NULL, NULL, '2022-02-03 12:25:31', '2022-02-03 12:25:31'),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3565515', NULL, 0, NULL, NULL, '2022-02-03 12:26:26', '2022-02-03 12:26:26'),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werwer', NULL, 0, NULL, NULL, '2022-02-03 12:27:11', '2022-02-03 12:27:11'),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werwer', NULL, 0, NULL, NULL, '2022-02-03 12:27:37', '2022-02-03 12:27:37'),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werwer', NULL, 0, NULL, NULL, '2022-02-03 12:28:01', '2022-02-03 12:28:01'),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werwer', NULL, 0, NULL, NULL, '2022-02-03 12:28:12', '2022-02-03 12:28:12'),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'werwer', NULL, 0, NULL, NULL, '2022-02-03 12:28:39', '2022-02-03 12:28:39'),
(34, '32153151', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:31:29', '2022-02-03 12:31:29'),
(35, '32153151', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:32:03', '2022-02-03 12:32:03'),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:32:50', '2022-02-03 12:32:50'),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:33:06', '2022-02-03 12:33:06'),
(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:33:21', '2022-02-03 12:33:21'),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:33:53', '2022-02-03 12:33:53'),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3565515', NULL, 0, NULL, NULL, '2022-02-03 12:41:20', '2022-02-03 12:41:20'),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3565515', NULL, 0, NULL, NULL, '2022-02-03 12:42:18', '2022-02-03 12:42:18'),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6356', NULL, 0, NULL, NULL, '2022-02-03 12:43:17', '2022-02-03 12:43:17'),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:50:22', '2022-02-03 12:50:22'),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:50:58', '2022-02-03 12:50:58'),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:51:21', '2022-02-03 12:51:21'),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:51:51', '2022-02-03 12:51:51'),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:52:11', '2022-02-03 12:52:11'),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:52:39', '2022-02-03 12:52:39'),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:53:06', '2022-02-03 12:53:06'),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:53:18', '2022-02-03 12:53:18'),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfdsfds', NULL, 0, NULL, NULL, '2022-02-03 12:55:27', '2022-02-03 12:55:27'),
(52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:56:01', '2022-02-03 12:56:01'),
(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 12:59:59', '2022-02-03 12:59:59'),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-03 13:09:09', '2022-02-03 13:09:09'),
(55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfasdfasdf', NULL, 0, NULL, NULL, '2022-02-03 13:12:41', '2022-02-03 13:12:41'),
(56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ewrewr', 'sdfsdf', NULL, 0, NULL, NULL, '2022-02-03 13:14:19', '2022-02-03 13:14:19'),
(57, '35653165', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-04 08:50:11', '2022-02-04 08:50:11'),
(58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-04 08:53:16', '2022-02-04 08:53:16'),
(59, '6565465', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-04 09:23:26', '2022-02-04 09:23:26'),
(60, '564486454512', 1, NULL, '30000', NULL, NULL, NULL, 'sdffd', NULL, '01771045019', 'rwere', 'dsfdsf', '546541132', 'sdfdsf', 'sdfdsfsd', 'jghgfh', 'xzcxc', 'ertert', '17/A, Shantibagh', 'ewrewr', 'vcxvxfd', 'gfhfd', '6546531', 'Dhaka', 'test', NULL, NULL, '+8801771045019', '45645', NULL, 'Md Imran Hossain', 'test', 'test', 'test', 'dsfdsfd', 'test', NULL, 0, NULL, NULL, '2022-02-04 10:16:57', '2022-02-04 10:16:57'),
(61, '314351354', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-04 10:18:46', '2022-02-04 10:18:46'),
(62, '6546465454', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-04 10:20:30', '2022-02-04 10:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `civil_cases_files`
--

CREATE TABLE `civil_cases_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civil_cases_files`
--

INSERT INTO `civil_cases_files` (`id`, `case_id`, `uploaded_document`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '2022-02-03 12:24:09', '2022-02-03 12:24:09'),
(2, NULL, NULL, '2022-02-03 12:25:31', '2022-02-03 12:25:31'),
(3, NULL, NULL, '2022-02-03 12:26:26', '2022-02-03 12:26:26'),
(4, NULL, NULL, '2022-02-03 12:28:39', '2022-02-03 12:28:39'),
(5, NULL, '', '2022-02-03 12:41:20', '2022-02-03 12:41:20'),
(6, NULL, '962Screenshot (4).png', '2022-02-03 12:42:18', '2022-02-03 12:42:18'),
(7, NULL, '46418Screenshot (3).png', '2022-02-03 12:43:17', '2022-02-03 12:43:17'),
(8, NULL, '164391452763.png', '2022-02-03 12:55:27', '2022-02-03 12:55:27'),
(9, NULL, '16439145271.png', '2022-02-03 12:55:27', '2022-02-03 12:55:27'),
(10, NULL, '164391456116.png', '2022-02-03 12:56:01', '2022-02-03 12:56:01'),
(11, NULL, '164391456144.png', '2022-02-03 12:56:01', '2022-02-03 12:56:01'),
(12, NULL, '164391479914.png', '2022-02-03 12:59:59', '2022-02-03 12:59:59'),
(13, NULL, '164391479978.png', '2022-02-03 12:59:59', '2022-02-03 12:59:59'),
(14, NULL, '164391479941.png', '2022-02-03 12:59:59', '2022-02-03 12:59:59'),
(15, NULL, '164391479920.png', '2022-02-03 12:59:59', '2022-02-03 12:59:59'),
(16, NULL, '164391479914.png', '2022-02-03 13:00:00', '2022-02-03 13:00:00'),
(17, NULL, '164391534942.png', '2022-02-03 13:09:09', '2022-02-03 13:09:09'),
(18, NULL, '164391534950.png', '2022-02-03 13:09:09', '2022-02-03 13:09:09'),
(19, NULL, '164391556182Screenshot (29).png.png', '2022-02-03 13:12:41', '2022-02-03 13:12:41'),
(20, NULL, '164391556152Screenshot (69).png.png', '2022-02-03 13:12:41', '2022-02-03 13:12:41'),
(21, NULL, '164391556145Screenshot (70).png.png', '2022-02-03 13:12:41', '2022-02-03 13:12:41'),
(22, 56, '164391565971Screenshot (3).png.png', '2022-02-03 13:14:19', '2022-02-03 13:14:19'),
(23, 56, '16439156598Screenshot (4).png.png', '2022-02-03 13:14:19', '2022-02-03 13:14:19'),
(24, 57, '164398621181Screenshot (1).png', '2022-02-04 08:50:11', '2022-02-04 08:50:11'),
(25, 57, '164398621186Screenshot (2).png', '2022-02-04 08:50:11', '2022-02-04 08:50:11'),
(26, 59, '164398820668Screenshot (1).png', '2022-02-04 09:23:26', '2022-02-04 09:23:26'),
(27, 60, '164399141787Screenshot (2).png', '2022-02-04 10:16:57', '2022-02-04 10:16:57'),
(28, 60, '164399141712Screenshot (5).png', '2022-02-04 10:16:57', '2022-02-04 10:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_11_15_100619_create_sessions_table', 1),
(7, '2020_11_15_133901_create_admins_table', 2),
(10, '2022_01_23_065415_create_setup_designations_table', 3),
(11, '2022_01_24_050641_create_setup_case_categories_table', 3),
(12, '2022_01_24_090201_create_setup_case_statuses_table', 4),
(13, '2022_01_24_092137_create_setup_case_types_table', 5),
(14, '2022_01_25_052801_create_setup_property_types_table', 6),
(15, '2022_01_25_062602_create_setup_compliance_categories_table', 7),
(16, '2022_01_31_063010_create_setup_person_titles_table', 8),
(17, '2022_01_31_070832_create_setup_external_councils_table', 9),
(19, '2022_02_01_042900_create_setup_courts_table', 10),
(20, '2022_02_01_064505_create_setup_compliance_types_table', 11),
(31, '2022_02_01_094805_create_civil_cases_table', 12),
(32, '2022_02_02_101211_create_setup_divisions_table', 12),
(33, '2022_02_02_102424_create_setup_districts_table', 12),
(34, '2022_02_03_115304_create_setup_law_sections_table', 13),
(35, '2022_02_03_174007_create_civil_cases_files_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MIHkzR2f3hfYs2gvWNXGkpqpX217FaINeJVZ7VuV', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ2hWY0tuVXEzSGpxN010dlU5bnpFZkczdlE5NHU3azQ2d3NLQUo2RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9sb2NhbGhvc3QvYmNsYy1zb2Z0d2FyZS9wdWJsaWMvYWRtaW4vZGlzdHJpY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJwYWdlIjtzOjk6ImRhc2hib2FyZCI7fQ==', 1643992822);

-- --------------------------------------------------------

--
-- Table structure for table `setup_case_categories`
--

CREATE TABLE `setup_case_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_case_categories`
--

INSERT INTO `setup_case_categories` (`id`, `case_category_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'eee', 0, NULL, NULL, '2022-01-23 23:30:28', '2022-01-24 02:11:19'),
(2, 'qqqqq', 1, NULL, NULL, '2022-01-23 23:31:04', '2022-01-24 02:11:26'),
(3, 'qqqqqqqqqq', 0, NULL, NULL, '2022-01-23 23:31:18', '2022-01-24 02:12:53'),
(4, 'werewr', 0, NULL, NULL, '2022-01-23 23:31:50', '2022-01-23 23:31:50'),
(5, 'None asdfdsf', 0, NULL, NULL, '2022-01-24 01:03:40', '2022-01-24 01:19:06'),
(6, 'werwer', 0, NULL, NULL, '2022-01-24 02:13:47', '2022-01-24 02:13:47'),
(7, '5', 0, NULL, NULL, '2022-02-03 00:19:49', '2022-02-03 00:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `setup_case_statuses`
--

CREATE TABLE `setup_case_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_status_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_case_statuses`
--

INSERT INTO `setup_case_statuses` (`id`, `case_status_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'werewr sdfdsfds', 0, NULL, NULL, '2022-01-24 03:15:31', '2022-01-24 03:34:13'),
(2, 'werewr ddddd', 0, NULL, NULL, '2022-01-24 03:15:38', '2022-01-24 03:43:29'),
(3, 'dsfsdf', 1, NULL, NULL, '2022-01-24 03:15:45', '2022-01-24 06:13:43'),
(4, 'werewr', 0, NULL, NULL, '2022-01-24 03:33:56', '2022-01-24 03:33:56'),
(5, 'fdgfdgdfgfd', 0, NULL, NULL, '2022-01-24 03:34:03', '2022-01-24 03:34:03'),
(6, 'Active', 0, NULL, NULL, '2022-01-25 07:07:18', '2022-01-25 07:07:18'),
(7, 'Inactive', 0, NULL, NULL, '2022-01-25 07:07:25', '2022-01-25 07:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `setup_case_types`
--

CREATE TABLE `setup_case_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_types_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_case_types`
--

INSERT INTO `setup_case_types` (`id`, `case_types_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ewrewrw', 1, NULL, NULL, '2022-01-24 04:09:37', '2022-01-24 05:26:08'),
(2, 'wqerweqr', 0, NULL, NULL, '2022-01-24 04:09:44', '2022-01-24 04:09:44'),
(3, 'xfccxzc', 0, NULL, NULL, '2022-01-24 04:09:46', '2022-01-24 04:09:46'),
(4, 'jhghfhgfh', 0, NULL, NULL, '2022-01-24 04:09:49', '2022-01-24 04:09:49'),
(5, 'asdw', 0, NULL, NULL, '2022-01-24 04:09:52', '2022-01-24 04:09:52'),
(6, 'lkljl', 0, NULL, NULL, '2022-01-24 04:09:55', '2022-01-24 04:10:05'),
(7, 'rretert', 0, NULL, NULL, '2022-01-24 04:32:25', '2022-01-24 04:32:25'),
(8, 'fhfghfhgf', 0, NULL, NULL, '2022-01-24 04:32:32', '2022-01-24 04:32:44'),
(9, 'jjjjjj hhhh', 0, NULL, NULL, '2022-01-24 04:32:52', '2022-01-24 04:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `setup_compliance_categories`
--

CREATE TABLE `setup_compliance_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compliance_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_compliance_categories`
--

INSERT INTO `setup_compliance_categories` (`id`, `compliance_category_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'werwer', 0, NULL, NULL, '2022-01-25 00:35:24', '2022-01-25 00:35:24'),
(2, 'werewr', 1, NULL, NULL, '2022-01-25 00:35:27', '2022-01-25 00:36:15'),
(3, 'fgfdgfd dfdfdf', 0, NULL, NULL, '2022-01-25 00:35:29', '2022-01-25 00:36:22'),
(4, 'xcvcv', 0, NULL, NULL, '2022-01-25 00:35:31', '2022-01-25 00:35:31'),
(5, 'swsedwsew', 0, NULL, NULL, '2022-01-25 00:36:30', '2022-01-25 00:36:30'),
(6, 'werewr', 0, NULL, NULL, '2022-02-01 00:57:45', '2022-02-01 00:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `setup_compliance_types`
--

CREATE TABLE `setup_compliance_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compliance_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compliance_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_compliance_types`
--

INSERT INTO `setup_compliance_types` (`id`, `compliance_category_id`, `compliance_type_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '3', 'werewrew', 0, NULL, NULL, '2022-02-01 01:35:31', '2022-02-01 01:35:31'),
(2, '4', 'we re wr', 0, NULL, NULL, '2022-02-01 01:35:40', '2022-02-01 02:54:20'),
(3, '6', 'test', 0, NULL, NULL, '2022-02-01 01:35:48', '2022-02-01 01:35:48'),
(4, '6', 'test2', 0, NULL, NULL, '2022-02-01 01:35:58', '2022-02-01 01:35:58'),
(5, '6', 'werewr asdfdsf', 0, NULL, NULL, '2022-02-01 01:40:56', '2022-02-01 01:40:56'),
(6, '6', 'werewr asdfsdf', 0, NULL, NULL, '2022-02-01 01:41:03', '2022-02-01 01:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `setup_courts`
--

CREATE TABLE `setup_courts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `court_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_courts`
--

INSERT INTO `setup_courts` (`id`, `court_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'we rw erw er', 1, NULL, NULL, '2022-01-31 22:38:28', '2022-01-31 22:43:59'),
(2, 'werewr', 0, NULL, NULL, '2022-01-31 22:38:32', '2022-01-31 22:38:32'),
(3, 'vvcbvc', 0, NULL, NULL, '2022-01-31 22:38:34', '2022-01-31 22:38:34'),
(4, 'fdgfdg', 0, NULL, NULL, '2022-01-31 22:38:36', '2022-01-31 22:38:36'),
(5, 'ghjg sdfsd', 0, NULL, NULL, '2022-01-31 22:38:39', '2022-01-31 22:38:39'),
(6, 'xccxcx', 0, NULL, NULL, '2022-01-31 22:38:41', '2022-01-31 22:38:41'),
(7, 'werewr', 0, NULL, NULL, '2022-01-31 22:39:19', '2022-01-31 22:39:19'),
(8, 'fdgfdg', 0, NULL, NULL, '2022-01-31 22:39:21', '2022-01-31 22:39:21'),
(9, 'df dfg', 0, NULL, NULL, '2022-01-31 22:39:24', '2022-01-31 22:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `setup_designations`
--

CREATE TABLE `setup_designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_designations`
--

INSERT INTO `setup_designations` (`id`, `designation_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'wwwww', 1, NULL, NULL, '2022-01-23 23:31:30', '2022-01-24 02:46:36'),
(2, 'qqqqqqq', 1, NULL, NULL, '2022-01-23 23:31:33', '2022-01-24 02:12:21'),
(3, 'bbbbb', 0, NULL, NULL, '2022-01-23 23:31:36', '2022-01-24 02:10:13'),
(4, 'Professor', 0, NULL, NULL, '2022-01-24 02:44:53', '2022-01-24 02:44:59'),
(5, 'Lawyer', 0, NULL, NULL, '2022-01-25 07:04:49', '2022-01-25 07:04:49'),
(6, 'werewr', 1, NULL, NULL, '2022-01-31 02:57:35', '2022-01-31 02:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `setup_districts`
--

CREATE TABLE `setup_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_districts`
--

INSERT INTO `setup_districts` (`id`, `division_id`, `district_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Savar', 0, NULL, NULL, '2022-02-03 01:03:39', '2022-02-03 01:03:39'),
(2, 1, 'Shahjalal Majar', 0, NULL, NULL, '2022-02-03 21:31:05', '2022-02-03 21:31:05'),
(3, 3, 'Feni', 0, NULL, NULL, '2022-02-04 10:40:20', '2022-02-04 10:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `setup_divisions`
--

CREATE TABLE `setup_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_divisions`
--

INSERT INTO `setup_divisions` (`id`, `division_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Sylhet', 0, NULL, NULL, '2022-02-03 01:03:25', '2022-02-03 01:03:25'),
(2, 'Dhaka', 0, NULL, NULL, '2022-02-03 01:03:28', '2022-02-03 01:03:28'),
(3, 'Noakhali', 0, NULL, NULL, '2022-02-03 01:03:30', '2022-02-03 01:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `setup_external_councils`
--

CREATE TABLE `setup_external_councils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_upload` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_external_councils`
--

INSERT INTO `setup_external_councils` (`id`, `title_id`, `first_name`, `middle_name`, `last_name`, `email`, `work_phone`, `home_phone`, `mobile_phone`, `emergency_contact`, `document_upload`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Aminur Rahman', 'Smith', 'Aminur', 'asdf@adf', '234151', '5564654', '01998876465', '0156549875', NULL, 1, NULL, NULL, '2022-01-31 05:03:40', '2022-01-31 06:11:31'),
(2, 2, 'Imran', 'Hossain', 'None', 'test@gmail.com', '01996325478', '01698774123', '01887669542', '0156549875', NULL, 0, NULL, NULL, '2022-01-31 05:47:18', '2022-01-31 05:47:18'),
(3, 2, 'imran', 'hossain', 'khan', 'testtest@gmail.com', '01996321542', '01996321542', '01996321542', '01996321542', '', 0, NULL, NULL, '2022-02-01 03:04:20', '2022-02-01 03:04:20'),
(4, 3, 'Aminur Rahman', 'Smith', 'Aminur', 'asdf@adf', '01996325478', '01996321542', '01887669542', '0156549875', '', 0, NULL, NULL, '2022-02-01 03:05:52', '2022-02-01 03:05:52'),
(5, 3, 'werwr', 'sdfdsf', 'hgfghgf', 'sdfsdf', 'fghgfh', 'ytrytry', 'fghgfh', 'cvbvcbv', '', 0, NULL, NULL, '2022-02-01 03:07:56', '2022-02-01 03:07:56'),
(6, 2, 'Aminur Rahman', 'Smith', 'Aminur', 'asdf@adf', '01996325478', '01996321542', '01887669542', '0156549875', '', 0, NULL, NULL, '2022-02-01 03:10:26', '2022-02-01 03:10:26'),
(7, 3, 'dfgfdgf', 'dsfdsf', 'werewr', 'sdfdsf', 'fdgfdg', 'sdfsadsa', 'sdfds', 'sdfdaf', '', 0, NULL, NULL, '2022-02-01 03:21:13', '2022-02-01 03:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `setup_law_sections`
--

CREATE TABLE `setup_law_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `law_section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_law_sections`
--

INSERT INTO `setup_law_sections` (`id`, `law_section_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'werewrw', 0, NULL, NULL, '2022-02-03 06:58:39', '2022-02-03 06:58:39'),
(2, 'sdfdsfd werewr sdfdsf sdfdsf', 1, NULL, NULL, '2022-02-03 06:58:41', '2022-02-03 07:00:01'),
(3, 'werewr', 0, NULL, NULL, '2022-02-03 06:58:43', '2022-02-03 07:00:10'),
(4, 'zxcxcds', 0, NULL, NULL, '2022-02-03 06:58:45', '2022-02-03 06:58:45'),
(5, 'sdfsdf', 0, NULL, NULL, '2022-02-03 06:58:47', '2022-02-03 06:58:47'),
(6, 'werewre', 1, NULL, NULL, '2022-02-03 06:58:50', '2022-02-03 07:00:30'),
(7, 'xccxcz', 0, NULL, NULL, '2022-02-03 06:58:53', '2022-02-03 06:58:53'),
(8, 'gfdgfdg', 0, NULL, NULL, '2022-02-03 06:58:57', '2022-02-03 06:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `setup_person_titles`
--

CREATE TABLE `setup_person_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_title_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_person_titles`
--

INSERT INTO `setup_person_titles` (`id`, `person_title_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dr.', 1, NULL, NULL, '2022-01-31 00:45:48', '2022-01-31 05:46:03'),
(2, 'Professor', 0, NULL, NULL, '2022-01-31 00:49:11', '2022-01-31 05:45:54'),
(3, 'Mr.', 0, NULL, NULL, '2022-01-31 05:46:16', '2022-01-31 05:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `setup_property_types`
--

CREATE TABLE `setup_property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_property_types`
--

INSERT INTO `setup_property_types` (`id`, `property_type_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'qqqqqqqq          aaaaaaaaaa', 0, NULL, NULL, '2022-01-25 00:06:13', '2022-01-25 00:17:38'),
(2, 'ssss asdfdsf', 0, NULL, NULL, '2022-01-25 00:06:17', '2022-01-31 23:51:27'),
(3, 'Private Property', 0, NULL, NULL, '2022-01-25 07:06:38', '2022-01-25 07:06:38'),
(4, 'werewr asdfdsf', 0, NULL, NULL, '2022-01-31 23:45:07', '2022-01-31 23:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'MD. IMRAN HOSSAIN', 'mdimranhossain985@gmail.com', NULL, '$2y$10$/HnX68JVvgC7TsyEw0AyIOFrzAX4UsCDLWwLMvKlcozvuAPKG2.Ea', NULL, NULL, '7QOVOZIJ80I8SA26PL11OAHakv8u8Oumm55ih8JzYlyuuCuXLsKw2HAQLVBW', NULL, NULL, '2020-11-15 04:25:27', '2020-11-15 04:25:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `civil_cases`
--
ALTER TABLE `civil_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `civil_cases_files`
--
ALTER TABLE `civil_cases_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setup_case_categories`
--
ALTER TABLE `setup_case_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_case_statuses`
--
ALTER TABLE `setup_case_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_case_types`
--
ALTER TABLE `setup_case_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_compliance_categories`
--
ALTER TABLE `setup_compliance_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_compliance_types`
--
ALTER TABLE `setup_compliance_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_courts`
--
ALTER TABLE `setup_courts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_designations`
--
ALTER TABLE `setup_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_districts`
--
ALTER TABLE `setup_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_divisions`
--
ALTER TABLE `setup_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_external_councils`
--
ALTER TABLE `setup_external_councils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_law_sections`
--
ALTER TABLE `setup_law_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_person_titles`
--
ALTER TABLE `setup_person_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_property_types`
--
ALTER TABLE `setup_property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `civil_cases`
--
ALTER TABLE `civil_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `civil_cases_files`
--
ALTER TABLE `civil_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_case_categories`
--
ALTER TABLE `setup_case_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_case_statuses`
--
ALTER TABLE `setup_case_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_case_types`
--
ALTER TABLE `setup_case_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setup_compliance_categories`
--
ALTER TABLE `setup_compliance_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_compliance_types`
--
ALTER TABLE `setup_compliance_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_courts`
--
ALTER TABLE `setup_courts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setup_designations`
--
ALTER TABLE `setup_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_districts`
--
ALTER TABLE `setup_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_divisions`
--
ALTER TABLE `setup_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_external_councils`
--
ALTER TABLE `setup_external_councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_law_sections`
--
ALTER TABLE `setup_law_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setup_person_titles`
--
ALTER TABLE `setup_person_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_property_types`
--
ALTER TABLE `setup_property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
