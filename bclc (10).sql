-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 12:46 PM
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
(3, 'Md. Imran', 'subadmin', '01771045019', 'admin@admin.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(4, 'test', '', '534654531', 'jabedakhter@gmail.com', NULL, '$2y$10$8dbajWp9YGEYqRPXTxWegeiF0N/CmijMt5Osugwq.J4sdWsmfum02', '', 0, NULL, NULL, NULL),
(5, 'Md. Niamul Kabir', '', '878646545', 'nkzoha@gmail.com', NULL, '$2y$10$8dbajWp9YGEYqRPXTxWegeiF0N/CmijMt5Osugwq.J4sdWsmfum02', '', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appellate_court_cases`
--

CREATE TABLE `appellate_court_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_case_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_nature_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `member_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `police_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `relevant_law_sections_id` int(11) DEFAULT NULL,
  `alligation_id` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_complainant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_designation_id` int(11) DEFAULT NULL,
  `external_council_name_id` int(11) DEFAULT NULL,
  `external_council_associates_id` int(11) DEFAULT NULL,
  `opposite_party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `last_order_court_id` int(11) DEFAULT NULL,
  `accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_company_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `assigned_lawyer_id` int(11) DEFAULT NULL,
  `other_claim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prayer_claims_by_psg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appellate_court_cases`
--

INSERT INTO `appellate_court_cases` (`id`, `case_no`, `date_of_case_received`, `case_category_nature_id`, `case_type_id`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `police_station`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `relevant_law_sections_id`, `alligation_id`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `opposite_party_name`, `opposite_party_address`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `total_legal_bill_amount`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '65464321313', '2022-02-02', '1', 2, '7788965', 1, '2', 1, '65464321313', 2, 'Lalbagh', 1, '2022-02-15', 1, 2, 1, 1, '39000', 'Aminur Rahman Smith Aminur', '01998744563', 1, 2, 4, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 1, 'Aminur Rahman Smith Aminur', 2, '2022-02-01', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 2, 'test1', 1, '01456698785', 1, 'test40', 1, 2, 'test claim updated', 'test alligations updated', 'claims by psg updated', '97600', 'file 1, file 2, file 3 updated', 'test comments updaetd', 0, NULL, NULL, '2022-02-18 22:40:43', '2022-02-26 04:39:46'),
(2, '6546', '2022-03-04', '1', 2, '7788965', 1, '2', 1, '546464', 2, 'Lalbagh', 1, '2022-02-17', 1, 2, 3, 2, '69000', 'Aminur Rahman Smith Aminur', '01998744563', 1, 2, 4, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 1, 'Aminur Rahman Smith Aminur', 1, '2022-02-09', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 3, 'test1', 2, '01456698785', 2, 'test40', 2, 2, 'test 9', 'test 9', 'test 9', '79600', 'test 9', 'test 9', 0, NULL, NULL, '2022-02-18 22:47:36', '2022-02-26 05:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `appellate_court_cases_files`
--

CREATE TABLE `appellate_court_cases_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appellate_court_cases_files`
--

INSERT INTO `appellate_court_cases_files` (`id`, `case_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '164524564339asdfasdf.pdf', 0, NULL, NULL, '2022-02-18 22:40:43', '2022-02-18 22:40:43'),
(2, 1, '16452456431byden.jpg', 0, NULL, NULL, '2022-02-18 22:40:43', '2022-02-18 22:40:43'),
(3, 1, '164524589178asdfasdf.pdf', 0, NULL, NULL, '2022-02-18 22:44:51', '2022-02-18 22:44:51'),
(4, 1, '16452458912Ethnicity.png', 0, NULL, NULL, '2022-02-18 22:44:51', '2022-02-18 22:44:51'),
(5, 1, '164524589160john.jpg', 0, NULL, NULL, '2022-02-18 22:44:51', '2022-02-18 22:44:51'),
(6, 2, '164524605669asdfasdf.pdf', 0, NULL, NULL, '2022-02-18 22:47:36', '2022-02-18 22:47:36'),
(7, 2, '164524605664Ethnicity.png', 0, NULL, NULL, '2022-02-18 22:47:36', '2022-02-18 22:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `appellate_court_case_status_logs`
--

CREATE TABLE `appellate_court_case_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `updated_court_id` int(11) DEFAULT NULL,
  `updated_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_next_date_fixed_id` int(11) DEFAULT NULL,
  `updated_panel_lawyer_id` int(11) DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_case_status_id` int(11) DEFAULT NULL,
  `updated_accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_proceedings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appellate_court_case_status_logs`
--

INSERT INTO `appellate_court_case_status_logs` (`id`, `case_id`, `updated_court_id`, `updated_next_date`, `updated_next_date_fixed_id`, `updated_panel_lawyer_id`, `order_date`, `updated_case_status_id`, `updated_accused_name`, `update_description`, `case_proceedings`, `case_notes`, `next_date_fixed_reason`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-10', 3, 2, '2022-03-12', 3, 'test', 'test 3', 'test 4', 'test 5', 'Disposed', 0, NULL, NULL, '2022-02-26 04:38:51', '2022-02-26 04:38:51'),
(2, 1, 1, '2022-02-18', 1, 2, '2022-03-12', 3, 'test 2', 'test 3', 'test 4', 'test 5', 'Disposed', 0, NULL, NULL, '2022-02-26 04:39:46', '2022-02-26 04:39:46'),
(3, 2, 1, '2022-02-10', 3, 2, '2022-03-04', 3, 'test 2', 'test 3', 'test 4', 'test 5', 'No Next Date', 0, NULL, NULL, '2022-02-26 04:40:38', '2022-02-26 04:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `case_billings`
--

CREATE TABLE `case_billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_type_id` int(11) DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_billing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digital_payment_type_id` int(11) DEFAULT NULL,
  `is_approved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_billings`
--

INSERT INTO `case_billings` (`id`, `bill_type_id`, `payment_type`, `district_id`, `case_type`, `case_no`, `panel_lawyer_id`, `bill_amount`, `date_of_billing`, `bank_id`, `branch_id`, `cheque_no`, `payment_amount`, `digital_payment_type_id`, `is_approved`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Digital Payment', 1, 'Civil Cases', '65464321', 2, '87000', '2022-03-18', NULL, NULL, '', '74000', 2, 'Approved', 1, NULL, NULL, '2022-03-02 01:34:07', '2022-03-03 00:35:16'),
(2, 2, 'Cash Payment', 1, 'Criminal Cases', '6546', 2, '250000', '2022-03-03', NULL, NULL, NULL, '100000', NULL, NULL, 0, NULL, NULL, '2022-03-02 01:34:28', '2022-03-02 01:34:28'),
(3, 1, 'Digital Payment', 1, 'Labour Cases', '65464321313', 2, '780000', '2022-03-17', NULL, NULL, NULL, '33000', 2, NULL, 0, NULL, NULL, '2022-03-02 01:49:03', '2022-03-02 04:02:09'),
(4, 2, 'Digital Payment', 4, 'Special Quassi - Judicial Cases', '6546', 2, '780000', '2022-03-11', NULL, NULL, NULL, '780000', 2, NULL, 1, NULL, NULL, '2022-03-02 01:49:50', '2022-03-02 05:41:57'),
(5, 2, 'Digital Payment', 4, 'Supreme Court of Bangladesh', '6985', 2, '69000', '2022-03-25', NULL, NULL, NULL, '37000', 2, NULL, 0, NULL, NULL, '2022-03-02 01:50:14', '2022-03-02 01:50:14'),
(6, 2, 'Digital Payment', 2, 'High Court Division', '544', 2, '7500', '2022-03-18', NULL, NULL, NULL, '145000', 2, 'Approved', 0, NULL, NULL, '2022-03-02 01:50:43', '2022-03-02 01:50:43'),
(7, 2, 'Bank Payment', 5, 'Appellate Court Division', '6546', 2, '54000', '2022-03-25', 1, 3, '6946546874', '368888', NULL, NULL, 0, NULL, NULL, '2022-03-02 01:51:42', '2022-03-02 03:57:33'),
(8, 1, 'Bank Payment', 1, 'Civil Cases', '65464321', 2, '780000', '2022-03-26', 1, 3, '6946546874', '100000', NULL, NULL, 1, NULL, NULL, '2022-03-02 04:42:52', '2022-03-03 00:34:14'),
(9, 1, 'Digital Payment', 4, 'Criminal Cases', '6399887745', 2, NULL, '2022-03-10', NULL, NULL, NULL, '639000', 3, NULL, 1, NULL, NULL, '2022-03-02 05:19:56', '2022-03-02 05:42:11'),
(10, 1, 'Bank Payment', 5, 'Criminal Cases', '6399887745', 2, '2654000', '2022-04-02', 2, 2, '875574', '98000', NULL, NULL, 1, NULL, NULL, '2022-03-02 05:21:34', '2022-03-02 05:40:57'),
(11, 2, 'Digital Payment', 2, 'Labour Cases', '65464321313', 2, '85700', '2022-03-11', NULL, NULL, NULL, '960000', 3, NULL, 0, NULL, NULL, '2022-03-02 05:44:56', '2022-03-02 05:44:56'),
(12, 1, 'Bank Payment', 3, 'Labour Cases', '65464321313', 2, '69000', '2022-03-05', 2, 2, '6946546874', '87600', NULL, NULL, 0, NULL, NULL, '2022-03-02 22:29:10', '2022-03-02 22:29:10'),
(13, 2, 'Digital Payment', 5, 'Labour Cases', '65464321313', 2, '85600', '2022-03-23', NULL, NULL, NULL, '38000', 2, NULL, 0, NULL, NULL, '2022-03-02 22:30:40', '2022-03-02 22:30:40'),
(14, 2, 'Digital Payment', 5, 'Labour Cases', '6546', 2, '780000', '2022-03-26', NULL, NULL, NULL, '38000', 3, NULL, 0, NULL, NULL, '2022-03-02 22:32:06', '2022-03-02 22:32:06'),
(15, 1, 'Bank Payment', 5, 'Special Quassi - Judicial Cases', '6DSD55', 2, '962000', '2022-04-02', 1, 3, '6946546874', '798000', NULL, NULL, 0, NULL, NULL, '2022-03-02 22:48:18', '2022-03-02 22:48:18'),
(16, 2, 'Bank Payment', 5, 'Supreme Court of Bangladesh', '321313', 2, '986000', '2022-03-24', 2, 2, '7584574', '8796000', NULL, NULL, 0, NULL, NULL, '2022-03-02 23:08:18', '2022-03-02 23:08:18'),
(17, 2, 'Digital Payment', 5, 'High Court Division', '544', 2, '690000', '2022-03-18', NULL, NULL, NULL, '38000', 3, NULL, 0, NULL, NULL, '2022-03-02 23:17:47', '2022-03-02 23:17:47'),
(18, 2, 'Bank Payment', 2, 'Appellate Court Division', '65464321313', 2, '87000', '2022-03-17', 2, 2, '879874', '875000', NULL, NULL, 0, NULL, NULL, '2022-03-02 23:26:58', '2022-03-02 23:26:58'),
(19, 2, 'Digital Payment', 1, 'Labour Cases', '65464321313', 2, '870100', '2022-03-18', NULL, NULL, NULL, '36000', 2, NULL, 0, NULL, NULL, '2022-03-03 00:50:40', '2022-03-03 00:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `civil_cases`
--

CREATE TABLE `civil_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `case_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `property_type_id` int(11) DEFAULT NULL,
  `case_category_nature_id` int(11) DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `external_council_name_id` int(11) DEFAULT NULL,
  `external_council_associates_id` int(11) DEFAULT NULL,
  `relevant_law_sections_id` int(11) DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `subsequent_plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_suit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendent_company_id` int(11) DEFAULT NULL,
  `date_of_incident` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_order_court_id` int(11) DEFAULT NULL,
  `date_of_incident_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_identification_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disbursement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_identification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_cash_receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_disposed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `power_of_attorny` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_legal_bill_amount_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `assigned_lawyer_id` int(11) DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_claim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civil_cases`
--

INSERT INTO `civil_cases` (`id`, `case_no`, `date_of_filing`, `division_id`, `case_year`, `district_id`, `ref_no`, `amount`, `location`, `case_status_id`, `property_type_id`, `case_category_nature_id`, `case_type_id`, `name_of_the_court_id`, `external_council_name_id`, `external_council_associates_id`, `relevant_law_sections_id`, `plaintiff_name`, `contact_number`, `plaintiff_designaiton_id`, `next_date`, `plaintiff_contact_number`, `next_date_fixed_id`, `company_id`, `zone_id`, `area_id`, `subsequent_plaintiff_name`, `name_of_suit`, `defendent_name`, `defendent_address`, `defendent_company_id`, `date_of_incident`, `last_order_court_id`, `date_of_incident_to`, `additional_order`, `first_identification_person`, `disbursement_date`, `date_of_identification`, `date_of_cash_receipt`, `case_notes`, `date_of_disposed`, `power_of_attorny`, `total_legal_bill_amount_cost`, `panel_lawyer_id`, `assigned_lawyer_id`, `notes`, `other_claim`, `summary_facts_alligation`, `missing_documents_evidence_information`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '65464321', '2022-02-24', 1, '2026', 1, '35465464815245', '60000', 'Dhaka', 3, 2, 2, 1, 1, 1, 1, 2, 'test1 asdf', '01771045019', 1, '2022-02-24', '01456698785', 2, 2, 2, 2, 'test test test asdfasdfdsaf', '5465456', 'test10', '43 Phillip St, Sydney NSW 2000, Australia', 1, '2022-02-09', 1, '2022-02-25', 'test5', 'test test', '2022-03-03', '2022-02-17', '2022-02-25', 'test21', '2022-02-24', 'sdfsdfdsf', '810000', 1, 1, 'test test test test', 'test test test', 'test test 65641564', 'test test test 65465461', 'test required', 0, NULL, NULL, '2022-02-15 05:32:57', '2022-02-26 04:21:58'),
(2, '4546151', '2022-02-18', 2, '2026', 3, 'test15 asdf', '35000', 'Dhaka', 3, 2, 2, 1, 1, 2, 4, 2, 'd test test', '01771045019', 2, '2022-02-13', '01456698785', 2, 2, 2, 2, 'test test test', 'Aminur Rahman Smith Aminur', 'test10', '43 Phillip St, Sydney NSW 2000, Australia', 2, '2022-02-19', 1, '2022-02-18', 'test5', 'Jhon', '2022-02-17', '2022-03-10', '2022-02-19', 'test24', '2022-03-03', 'none test', '810000', 2, 1, 'teststest', 'test test 465465', 'test test test test', 'qqqqqqq eeeeeee rrrrrrrr ttttttty      yyyyyyyyyyyy', 'test test sdfsadfsd', 0, NULL, NULL, '2022-02-15 21:53:20', '2022-03-01 05:57:34'),
(3, '654663', '2022-02-18', 3, '2026', 5, '5465', '36000', 'Dhaka', 3, 3, 2, 2, 1, 2, 4, 3, 'test 2', '01771045012', 2, '2022-03-11', '01456698782', 3, 2, 2, 2, 'test3', 'Aminur Rahman Smith Aminur', 'test10', '43 Phillip St, Sydney NSW 2000, Australia', 2, '2022-02-09', 1, '2022-02-17', 'test5', 'tesa', '2022-02-08', '2022-02-16', '2022-03-12', 'test21', '2022-02-24', 'sdfsdfdsf', '890000', NULL, 0, 'test 6', 'test 9', 'test 10', 'test 3', 'test 2', 1, NULL, NULL, '2022-02-27 23:05:12', '2022-02-28 00:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `civil_cases_files`
--

CREATE TABLE `civil_cases_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civil_cases_files`
--

INSERT INTO `civil_cases_files` (`id`, `case_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '16449247777asdfasdf.pdf', 0, NULL, NULL, '2022-02-15 05:32:57', '2022-02-15 05:32:57'),
(2, 1, '164492477745byden.jpg', 0, NULL, NULL, '2022-02-15 05:32:57', '2022-02-15 05:32:57'),
(3, 1, '164492477731john.jpg', 0, NULL, NULL, '2022-02-15 05:32:57', '2022-02-15 05:32:57'),
(4, 2, '164498360026asdfasdf.pdf', 0, NULL, NULL, '2022-02-15 21:53:20', '2022-02-15 21:53:20'),
(5, 2, '164498360033byden.jpg', 0, NULL, NULL, '2022-02-15 21:53:20', '2022-02-15 21:53:20'),
(6, 2, '164498360011Ethnicity.png', 1, NULL, NULL, '2022-02-15 21:53:20', '2022-02-19 04:07:09'),
(7, 2, '164498360060Integra_Logo.png', 0, NULL, NULL, '2022-02-15 21:53:20', '2022-02-15 21:53:20'),
(8, 3, '164602471210asdfasdf.pdf', 0, NULL, NULL, '2022-02-27 23:05:12', '2022-02-27 23:05:12'),
(9, 3, '164602471251byden.jpg', 0, NULL, NULL, '2022-02-27 23:05:12', '2022-02-27 23:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `civil_case_status_logs`
--

CREATE TABLE `civil_case_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `updated_court_id` int(11) DEFAULT NULL,
  `updated_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_next_date_fixed_id` int(11) DEFAULT NULL,
  `updated_panel_lawyer_id` int(11) DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_case_status_id` int(11) DEFAULT NULL,
  `update_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_proceedings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civil_case_status_logs`
--

INSERT INTO `civil_case_status_logs` (`id`, `case_id`, `updated_court_id`, `updated_next_date`, `updated_next_date_fixed_id`, `updated_panel_lawyer_id`, `order_date`, `updated_case_status_id`, `update_description`, `case_proceedings`, `case_notes`, `next_date_fixed_reason`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-03', 3, 2, '2022-02-17', 2, 'test desc', 'proceedings', 'test case notes', 'Disposed', 0, NULL, NULL, '2022-02-23 05:56:05', '2022-02-23 05:56:05'),
(2, 2, 1, '2022-02-04', 3, 2, '2022-03-12', 1, 'test 3', 'test 6', 'test 9', 'No Next Date', 0, NULL, NULL, '2022-02-23 05:58:01', '2022-02-23 05:58:01'),
(3, 2, 1, NULL, 2, 2, '2022-02-26', 3, 'test 99', 'test 55', 'test 22', 'No Next Date', 0, NULL, NULL, '2022-02-23 06:38:38', '2022-02-23 06:38:38'),
(4, 1, 1, '2022-02-18', 3, 2, '2022-02-25', 2, 'test 3', 'test 4', 'test 5', 'Disposed', 0, NULL, NULL, '2022-02-24 00:21:22', '2022-02-24 00:21:22'),
(5, 1, 1, '2022-02-11', 1, 1, '2022-03-05', 1, 'test case 99', 'test case 98', 'test case 97', 'Next Date', 0, NULL, NULL, '2022-02-24 00:54:04', '2022-02-24 00:54:04'),
(6, 1, 1, '2022-02-07', 2, 2, '2022-03-12', 3, 'test', 'test', 'test', 'Disposed', 0, NULL, NULL, '2022-02-24 03:49:25', '2022-02-24 03:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases`
--

CREATE TABLE `criminal_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_case_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_nature_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `member_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `police_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `relevant_law_sections_id` int(11) DEFAULT NULL,
  `alligation_id` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_complainant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_designation_id` int(11) DEFAULT NULL,
  `external_council_name_id` int(11) DEFAULT NULL,
  `external_council_associates_id` int(11) DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `last_order_court_id` int(11) DEFAULT NULL,
  `accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_company_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `assigned_lawyer_id` int(11) DEFAULT NULL,
  `other_claim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prayer_claims_by_psg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases`
--

INSERT INTO `criminal_cases` (`id`, `case_no`, `date_of_case_received`, `case_category_nature_id`, `case_type_id`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `police_station`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `relevant_law_sections_id`, `alligation_id`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `total_legal_bill_amount`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '6546', '2022-02-18', '2', 2, 'tewt', 2, '2', 2, '546464', 2, 'Lalbagh', 1, '2022-03-03', 3, 5, 3, 2, '56000', 'Aminur Rahman Smith Aminur', '01998744563', 2, 1, 2, 3, 1, 'Aminur Rahman Smith Aminur', NULL, '2022-02-06', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 3, 'test1', 2, '01456698785', 2, 'test21', 2, 2, 'no claim', 'all of summary', 'test and no claims by psg', '25600', 'all documents area available', 'test documents', 0, NULL, NULL, '2022-02-15 23:48:56', '2022-02-28 01:30:45'),
(2, '654643', '2022-02-03', '2', 1, '7788965', 2, '1', 2, '546464', 2, 'Lalbagh', 1, '2022-02-25', 2, 3, 3, 2, '68000', 'Aminur Rahman Smith Aminur', '01998744563', 1, 1, 2, 3, 1, 'Aminur Rahman Smith Aminur', 2, '2022-02-17', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 2, 'test plaintiff', 2, '01456698785', 2, 'no cases available', 2, 2, 'other claim', 'all facts', 'psg claims', '77600', 'case files 1, case files 2', 'case two updated with new value', 0, NULL, NULL, '2022-02-15 23:56:59', '2022-02-16 01:25:55'),
(3, '6399887745', '2022-02-01', '2', 2, '7788965', 2, '1', 2, '546464', 2, 'Lalbagh', 1, '2022-02-07', 2, 3, 1, 1, '2454545', 'Aminur Rahman Smith Aminur', '01998744563', 2, 2, 3, 3, 1, 'Aminur Rahman Smith Aminur', 2, '2022-02-17', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 3, 'test cases', 2, '01456698785', 2, 'no cases', 2, 2, 'test cases', 'no facts and summary available', 'claims by psg test', '78600', 'files 1, files 2, files 3', 'criminal case no 3 updated', 0, NULL, NULL, '2022-02-16 00:01:50', '2022-02-24 03:51:32'),
(4, '4546151', '2022-02-07', '2', 2, '77', 2, '2', 2, '546464', 2, 'Lalbagh', 1, '2022-03-02', 2, 3, 2, 2, '49000', 'Aminur Rahman Smith Aminur', '01998744563', 2, 2, 4, 3, 1, 'Aminur Rahman Smith Aminur', 1, '2022-02-01', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 1, 'test1', 2, '01456698785', 2, 'test21', 2, 2, 'test cases', 'test summary facts and alligations', 'claims by psg', '29600', 'test files 1, test files 2, test files 3', 'test with no comments.', 1, NULL, NULL, '2022-02-20 01:15:27', '2022-03-01 06:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases_files`
--

CREATE TABLE `criminal_cases_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases_files`
--

INSERT INTO `criminal_cases_files` (`id`, `case_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, '164534132765asdfasdf.pdf', 0, NULL, NULL, '2022-02-20 01:15:27', '2022-02-20 01:15:27'),
(2, 4, '164534132733byden.jpg', 0, NULL, NULL, '2022-02-20 01:15:27', '2022-02-20 01:15:27'),
(3, 4, '164534132786john.jpg', 0, NULL, NULL, '2022-02-20 01:15:27', '2022-02-20 01:15:27'),
(4, 4, '164534132711Integra_Logo.png', 0, NULL, NULL, '2022-02-20 01:15:27', '2022-02-20 01:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_case_status_logs`
--

CREATE TABLE `criminal_case_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `updated_court_id` int(11) DEFAULT NULL,
  `updated_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_next_date_fixed_id` int(11) DEFAULT NULL,
  `updated_panel_lawyer_id` int(11) DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_case_status_id` int(11) DEFAULT NULL,
  `updated_accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_proceedings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_case_status_logs`
--

INSERT INTO `criminal_case_status_logs` (`id`, `case_id`, `updated_court_id`, `updated_next_date`, `updated_next_date_fixed_id`, `updated_panel_lawyer_id`, `order_date`, `updated_case_status_id`, `updated_accused_name`, `update_description`, `case_proceedings`, `case_notes`, `next_date_fixed_reason`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2022-02-02', 2, 2, '2022-02-25', 3, 'test accused', 'test 36', 'test 96', 'test 65', 'Disposed', 0, NULL, NULL, '2022-02-24 05:51:19', '2022-02-24 05:51:19');

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
-- Table structure for table `high_court_cases`
--

CREATE TABLE `high_court_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_case_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_nature_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `member_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `police_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `relevant_law_sections_id` int(11) DEFAULT NULL,
  `alligation_id` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_complainant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_designation_id` int(11) DEFAULT NULL,
  `external_council_name_id` int(11) DEFAULT NULL,
  `external_council_associates_id` int(11) DEFAULT NULL,
  `opposite_party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `last_order_court_id` int(11) DEFAULT NULL,
  `accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_company_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `assigned_lawyer_id` int(11) DEFAULT NULL,
  `other_claim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prayer_claims_by_psg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `high_court_cases`
--

INSERT INTO `high_court_cases` (`id`, `case_no`, `date_of_case_received`, `case_category_nature_id`, `case_type_id`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `police_station`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `relevant_law_sections_id`, `alligation_id`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `opposite_party_name`, `opposite_party_address`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `total_legal_bill_amount`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '544', '2022-02-09', '1', 2, 'tewt', 2, '2', 1, '561', 1, 'tewst', 1, '2022-02-09', 2, 3, 2, 2, '69000', 'test a', '01998744568', 2, 2, 3, 'none', 'test 7', 1, 1, 'test 1', 2, '2022-02-17', 'test 5', '01998745638', 3, 'test 1', 2, '9966456', 2, 'test 3', 2, 2, 'test 3', 'test 5', 'test 3', '36100', 'test 2', 'test 9', 0, NULL, NULL, '2022-02-17 05:24:06', '2022-02-26 05:09:24'),
(2, '65464321313', '2022-02-10', '1', 2, '7788965', 2, '2', 2, '65464321313', 2, 'Lalbagh', 1, '2022-02-18', 3, 5, 3, 1, '87000', 'Aminur Rahman Smith Aminur', '01998744563', 1, 2, 4, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 2, 1, 'Aminur Rahman Smith Aminur', 1, '2022-01-31', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 1, 'test1', 1, '01456698785', 2, 'test21', 2, 2, 'test cases claim updated', 'summary facts & alligation updated', 'prayer or claims not sets updated', '25600', 'file 8, file 9, file 10 updated', 'test documents none updated', 0, NULL, NULL, '2022-02-17 05:27:27', '2022-02-26 03:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `high_court_cases_files`
--

CREATE TABLE `high_court_cases_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `high_court_cases_files`
--

INSERT INTO `high_court_cases_files` (`id`, `case_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, '164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-02-17 05:27:27', '2022-02-17 05:27:27'),
(2, 2, '164509724752byden.jpg', 0, NULL, NULL, '2022-02-17 05:27:27', '2022-02-17 05:27:27'),
(3, 2, '16450979893asdfasdf.pdf', 0, NULL, NULL, '2022-02-17 05:39:49', '2022-02-17 05:39:49'),
(4, 2, '164509798992byden.jpg', 0, NULL, NULL, '2022-02-17 05:39:49', '2022-02-17 05:39:49'),
(5, 1, '1645868205100byden.jpg', 0, NULL, NULL, '2022-02-26 03:36:45', '2022-02-26 03:36:45'),
(6, 1, '164586820532Ethnicity.png', 0, NULL, NULL, '2022-02-26 03:36:45', '2022-02-26 03:36:45'),
(7, 1, '164586820516asdfasdf.pdf', 0, NULL, NULL, '2022-02-26 03:36:45', '2022-02-26 03:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `high_court_case_status_logs`
--

CREATE TABLE `high_court_case_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `updated_court_id` int(11) DEFAULT NULL,
  `updated_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_next_date_fixed_id` int(11) DEFAULT NULL,
  `updated_panel_lawyer_id` int(11) DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_case_status_id` int(11) DEFAULT NULL,
  `updated_accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_proceedings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `high_court_case_status_logs`
--

INSERT INTO `high_court_case_status_logs` (`id`, `case_id`, `updated_court_id`, `updated_next_date`, `updated_next_date_fixed_id`, `updated_panel_lawyer_id`, `order_date`, `updated_case_status_id`, `updated_accused_name`, `update_description`, `case_proceedings`, `case_notes`, `next_date_fixed_reason`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-02-08', 3, 2, '2022-03-12', 3, 'test', 'test 3', 'test 2', 'test 9', 'Disposed', 0, NULL, NULL, '2022-02-26 03:32:33', '2022-02-26 03:32:33'),
(2, 2, 1, '2022-02-02', 3, 2, '2022-03-11', 3, 'test', 'test 9', 'test 8', 'test 7', 'Disposed', 0, NULL, NULL, '2022-02-26 03:33:10', '2022-02-26 03:33:10'),
(3, 2, 1, '2022-02-12', 3, 2, '2022-03-12', 2, 'asdf', 'test 9', 'test 9', 'test 5', 'No Next Date', 0, NULL, NULL, '2022-02-26 03:33:38', '2022-02-26 03:33:38'),
(4, 1, 1, '2022-02-09', 1, 2, '2022-03-11', 1, '6were', 'test 9', 'test 2', 'test 8', 'Next Date', 0, NULL, NULL, '2022-02-26 03:37:27', '2022-02-26 03:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `labour_cases`
--

CREATE TABLE `labour_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_case_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_nature_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `member_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `police_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `relevant_law_sections_id` int(11) DEFAULT NULL,
  `alligation_id` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_complainant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_designation_id` int(11) DEFAULT NULL,
  `external_council_name_id` int(11) DEFAULT NULL,
  `external_council_associates_id` int(11) DEFAULT NULL,
  `opposite_party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `last_order_court_id` int(11) DEFAULT NULL,
  `accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_company_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `assigned_lawyer_id` int(11) DEFAULT NULL,
  `other_claim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prayer_claims_by_psg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labour_cases`
--

INSERT INTO `labour_cases` (`id`, `case_no`, `date_of_case_received`, `case_category_nature_id`, `case_type_id`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `police_station`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `relevant_law_sections_id`, `alligation_id`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `opposite_party_name`, `opposite_party_address`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `total_legal_bill_amount`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-02-16 06:05:59', '2022-03-01 06:10:57'),
(2, '6546', '2022-01-30', '1', 2, '7788965', 1, '2', 1, '6546', 2, 'Lalbagh', 1, '2022-02-08', 2, 3, 3, 1, '60000', 'Aminur Rahman Smith Aminur', '01998744563', 1, 2, 4, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 1, 'Aminur Rahman Smith Aminur', 1, '2022-02-07', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 1, 'test1', 2, '01456698785', 2, 'test21', 2, 2, 'no claim update', 'test summary facts update', 'claims by psg update', '25600', 'files 1, files 2, files 3 test update', 'test test test test test user update', 0, NULL, NULL, '2022-02-16 06:33:20', '2022-02-24 05:31:42'),
(3, '65464321313', '2022-02-18', '1', 2, '7788965', 1, '2', 1, '65464321313', 2, 'Lalbagh', 1, '2022-01-30', 3, 4, 1, 1, '65000', 'Aminur Rahman Smith Aminur', '01998744563', 1, 1, 2, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 1, 'Aminur Rahman Smith Aminur', 2, '2022-01-30', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 1, 'test1', 2, '01456698785', 2, 'test21', 1, 1, 'test claim updates', 'no alligation updates', 'all psg updates', '256008978746', 'file 1, file 2, file 3 updates', 'test all the labour cases updates', 0, NULL, NULL, '2022-02-16 06:40:17', '2022-02-24 06:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `labour_cases_files`
--

CREATE TABLE `labour_cases_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labour_cases_files`
--

INSERT INTO `labour_cases_files` (`id`, `case_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, '164553201621byden.jpg', 0, NULL, NULL, '2022-02-22 06:13:36', '2022-02-22 06:13:36'),
(2, 3, '164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-02-22 06:13:36', '2022-02-22 06:13:36'),
(3, 3, '164553201672Ethnicity.png', 0, NULL, NULL, '2022-02-22 06:13:37', '2022-02-22 06:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `labour_case_status_logs`
--

CREATE TABLE `labour_case_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `updated_court_id` int(11) DEFAULT NULL,
  `updated_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_next_date_fixed_id` int(11) DEFAULT NULL,
  `updated_panel_lawyer_id` int(11) DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_case_status_id` int(11) DEFAULT NULL,
  `updated_accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_proceedings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labour_case_status_logs`
--

INSERT INTO `labour_case_status_logs` (`id`, `case_id`, `updated_court_id`, `updated_next_date`, `updated_next_date_fixed_id`, `updated_panel_lawyer_id`, `order_date`, `updated_case_status_id`, `updated_accused_name`, `update_description`, `case_proceedings`, `case_notes`, `next_date_fixed_reason`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2022-02-18', 2, 2, '2022-03-05', 3, 'new accused', 'test 66', 'test 33', 'test 22', 'Next Date', 0, NULL, NULL, '2022-02-24 06:07:26', '2022-02-24 06:07:26'),
(2, 3, 1, '2022-02-26', 3, 2, '2022-03-11', 3, 'accuseddd', 'adsf', 'asdf', 'asdf', 'Disposed', 0, NULL, NULL, '2022-02-24 06:08:48', '2022-02-24 06:08:48'),
(3, 1, 1, '2022-02-11', 3, 2, '2022-03-04', 3, 'none', 'test 33', 'test 22', 'test 33', 'Disposed', 0, NULL, NULL, '2022-02-24 07:01:04', '2022-02-24 07:01:04');

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
(74, '2022_02_13_053654_create_setup_external_council_associates_table', 19),
(117, '2014_10_12_000000_create_users_table', 20),
(118, '2014_10_12_100000_create_password_resets_table', 20),
(119, '2014_10_12_200000_add_two_factor_columns_to_users_table', 20),
(120, '2019_08_19_000000_create_failed_jobs_table', 20),
(121, '2019_12_14_000001_create_personal_access_tokens_table', 20),
(122, '2020_11_15_100619_create_sessions_table', 20),
(123, '2020_11_15_133901_create_admins_table', 20),
(124, '2022_01_23_065415_create_setup_designations_table', 20),
(125, '2022_01_24_050641_create_setup_case_categories_table', 20),
(126, '2022_01_24_090201_create_setup_case_statuses_table', 20),
(127, '2022_01_24_092137_create_setup_case_types_table', 20),
(128, '2022_01_25_052801_create_setup_property_types_table', 20),
(129, '2022_01_25_062602_create_setup_compliance_categories_table', 20),
(130, '2022_01_31_063010_create_setup_person_titles_table', 20),
(131, '2022_01_31_070832_create_setup_external_councils_table', 20),
(132, '2022_02_01_042900_create_setup_courts_table', 20),
(133, '2022_02_01_064505_create_setup_compliance_types_table', 20),
(134, '2022_02_01_094805_create_civil_cases_table', 20),
(135, '2022_02_02_101211_create_setup_divisions_table', 20),
(136, '2022_02_02_102424_create_setup_districts_table', 20),
(137, '2022_02_03_115304_create_setup_law_sections_table', 20),
(138, '2022_02_03_174007_create_civil_cases_files_table', 20),
(139, '2022_02_05_042409_create_setup_next_date_reasons_table', 20),
(140, '2022_02_05_095928_create_setup_court_last_orders_table', 20),
(141, '2022_02_05_104823_create_setup_external_council_files_table', 20),
(142, '2022_02_05_123938_create_criminal_cases_table', 20),
(143, '2022_02_06_133706_create_setup_regions_table', 20),
(144, '2022_02_07_051606_create_setup_areas_table', 20),
(145, '2022_02_07_053103_create_setup_branches_table', 20),
(146, '2022_02_07_063805_create_setup_programs_table', 20),
(147, '2022_02_07_064505_create_setup_alligations_table', 20),
(148, '2022_02_08_133409_create_contact_infos_table', 20),
(149, '2022_02_09_092253_create_criminal_cases_files_table', 20),
(150, '2022_02_12_103417_create_setup_companies_table', 20),
(151, '2022_02_12_111247_create_setup_company_types_table', 20),
(152, '2022_02_12_120355_create_setup_internal_councils_table', 20),
(153, '2022_02_12_120617_create_setup_internal_council_files_table', 20),
(154, '2022_02_13_062358_create_setup_external_council_associates_files_table', 20),
(155, '2022_02_13_063316_create_setup_external_council_associates_table', 20),
(156, '2022_02_16_073059_create_labour_cases_table', 21),
(157, '2022_02_16_122342_create_labour_cases_files_table', 22),
(158, '2022_02_17_064635_create_quassi_judicial_cases_table', 23),
(159, '2022_02_17_071328_create_quassi_judicial_cases_files_table', 23),
(160, '2022_02_17_090404_create_supreme_court_cases_table', 24),
(161, '2022_02_17_090617_create_supreme_court_cases_files_table', 24),
(162, '2022_02_17_104706_create_high_court_cases_table', 25),
(163, '2022_02_17_104722_create_high_court_cases_files_table', 25),
(164, '2022_02_17_114951_create_appellate_court_cases_table', 26),
(165, '2022_02_17_115024_create_appellate_court_cases_files_table', 26),
(167, '2022_02_23_100709_create_civil_case_status_logs_table', 27),
(170, '2022_02_24_092255_create_criminal_case_status_logs_table', 28),
(171, '2022_02_24_112509_create_labour_case_status_logs_table', 28),
(172, '2022_02_26_050811_create_quassi_judicial_case_status_logs_table', 29),
(173, '2022_02_26_075141_create_supreme_court_case_status_logs_table', 30),
(174, '2022_02_26_092935_create_high_court_case_status_logs_table', 31),
(175, '2022_02_26_103647_create_appellate_court_case_status_logs_table', 32),
(176, '2022_03_01_061808_create_setup_bill_types_table', 33),
(177, '2022_03_01_063826_create_setup_banks_table', 34),
(178, '2022_03_01_072242_create_setup_bank_branches_table', 35),
(181, '2022_03_01_093042_create_setup_digital_payments_table', 36),
(183, '2022_03_02_041449_create_case_billings_table', 37),
(184, '2022_03_03_100737_create_setup_thanas_table', 38),
(185, '2022_03_03_110811_create_setup_seller_buyers_table', 39);

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
-- Table structure for table `quassi_judicial_cases`
--

CREATE TABLE `quassi_judicial_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_case_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_nature_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `member_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `police_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `relevant_law_sections_id` int(11) DEFAULT NULL,
  `alligation_id` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_complainant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_designation_id` int(11) DEFAULT NULL,
  `external_council_name_id` int(11) DEFAULT NULL,
  `external_council_associates_id` int(11) DEFAULT NULL,
  `opposite_party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `last_order_court_id` int(11) DEFAULT NULL,
  `accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_company_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `assigned_lawyer_id` int(11) DEFAULT NULL,
  `other_claim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prayer_claims_by_psg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quassi_judicial_cases`
--

INSERT INTO `quassi_judicial_cases` (`id`, `case_no`, `date_of_case_received`, `case_category_nature_id`, `case_type_id`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `police_station`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `relevant_law_sections_id`, `alligation_id`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `opposite_party_name`, `opposite_party_address`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `total_legal_bill_amount`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '6DSD55', '2022-02-07', '1', 2, '7788965', 2, '2', 2, '654AerDSDSD5465', 2, 'Lalbagh', 1, '2022-02-01', 2, 3, 2, 2, '98000', 'Aminur Rahman Smith Aminur', '01998744563', 2, 1, 1, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 1, 'Aminur Rahman Smith Aminur', 2, '2022-02-10', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 2, 'test1', 2, '01456698785', 2, 'test40', 2, 2, 'test claim', 'test summary alligation', 'claims psg test', '25600', 'files 1, files 2, files 3', 'test comments', 0, NULL, NULL, '2022-02-17 01:32:03', '2022-02-25 23:42:15'),
(2, '6546', '2022-01-30', '1', 2, '7788965', 1, '2', 1, '6546', 2, 'Lalbagh', 1, '2022-02-08', 2, 3, 3, 1, '60000', 'Aminur Rahman Smith Aminur', '01998744563', 1, 2, 4, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 2, 1, 'Aminur Rahman Smith Aminur', 1, '2022-02-07', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 1, 'test1', 2, '01456698785', 2, 'test21', 2, 2, 'no claim update', 'test summary facts update', 'claims by psg update', '25600', 'files 1, files 2, files 3 test update', 'test test test test test user update', 0, NULL, NULL, '2022-02-17 01:40:38', '2022-02-26 05:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `quassi_judicial_cases_files`
--

CREATE TABLE `quassi_judicial_cases_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quassi_judicial_cases_files`
--

INSERT INTO `quassi_judicial_cases_files` (`id`, `case_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, '164508363862asdfasdf.pdf', 0, NULL, NULL, '2022-02-17 01:40:38', '2022-02-17 01:40:38'),
(2, 2, '164508363882byden.jpg', 0, NULL, NULL, '2022-02-17 01:40:38', '2022-02-17 01:40:38'),
(3, 2, '164508363829Ethnicity.png', 0, NULL, NULL, '2022-02-17 01:40:38', '2022-02-17 01:40:38'),
(4, 2, '164508427179asdfasdf.pdf', 0, NULL, NULL, '2022-02-17 01:51:11', '2022-02-17 01:51:11'),
(5, 2, '164508427111byden.jpg', 0, NULL, NULL, '2022-02-17 01:51:11', '2022-02-17 01:51:11'),
(6, 1, '164553223132no_images.png', 0, NULL, NULL, '2022-02-22 06:17:11', '2022-02-22 06:17:11'),
(7, 1, '164553223131john.jpg', 0, NULL, NULL, '2022-02-22 06:17:11', '2022-02-22 06:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `quassi_judicial_case_status_logs`
--

CREATE TABLE `quassi_judicial_case_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `updated_court_id` int(11) DEFAULT NULL,
  `updated_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_next_date_fixed_id` int(11) DEFAULT NULL,
  `updated_panel_lawyer_id` int(11) DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_case_status_id` int(11) DEFAULT NULL,
  `updated_accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_proceedings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quassi_judicial_case_status_logs`
--

INSERT INTO `quassi_judicial_case_status_logs` (`id`, `case_id`, `updated_court_id`, `updated_next_date`, `updated_next_date_fixed_id`, `updated_panel_lawyer_id`, `order_date`, `updated_case_status_id`, `updated_accused_name`, `update_description`, `case_proceedings`, `case_notes`, `next_date_fixed_reason`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-02', 1, 2, '2022-02-18', 3, 'none', 'test des', 'test pro', 'test notes', 'Disposed', 0, NULL, NULL, '2022-02-25 23:20:50', '2022-02-25 23:20:50'),
(2, 1, 1, '2022-02-18', 3, 2, '2022-03-04', 3, 'nones', 'test test', 'test test', 'test test', 'Disposed', 0, NULL, NULL, '2022-02-25 23:21:51', '2022-02-25 23:21:51'),
(3, 2, 1, '2022-02-09', 3, 2, '2022-03-12', 2, 'tweet', 'test 6', 'test 9', 'test 8', 'No Next Date', 0, NULL, NULL, '2022-02-25 23:33:44', '2022-02-25 23:33:44');

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
('87Y1zo3nPpu71JrlY3kckd5nj0sZk5gTtwHsYCOF', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYnFvSEs3Sm5kbXFYUkU0YnpRMmw1Ym9IaU5RMFBudjBRQ1JPTTBydiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly9sb2NhbGhvc3QvZGxlZ2FsLXNvZnR3YXJlL3B1YmxpYy9hZG1pbi9hZGQtc2VsbGVyLWJ1eWVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoicGFnZSI7czo5OiJkYXNoYm9hcmQiO30=', 1646307939);

-- --------------------------------------------------------

--
-- Table structure for table `setup_alligations`
--

CREATE TABLE `setup_alligations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alligation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_alligations`
--

INSERT INTO `setup_alligations` (`id`, `alligation_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'No alligation', 0, NULL, NULL, '2022-02-15 21:56:54', '2022-02-26 05:51:10'),
(2, 'test alligation', 0, NULL, NULL, '2022-02-15 21:57:00', '2022-02-15 21:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `setup_areas`
--

CREATE TABLE `setup_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_areas`
--

INSERT INTO `setup_areas` (`id`, `area_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Shantibag', 0, NULL, NULL, '2022-02-15 05:25:34', '2022-02-26 05:47:00'),
(2, 'Malibag', 0, NULL, NULL, '2022-02-15 05:25:41', '2022-02-15 05:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `setup_banks`
--

CREATE TABLE `setup_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_banks`
--

INSERT INTO `setup_banks` (`id`, `bank_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Sonali Bank', 0, NULL, NULL, '2022-03-01 00:46:56', '2022-03-01 00:47:40'),
(2, 'Rupali Bank', 0, NULL, NULL, '2022-03-01 00:47:02', '2022-03-01 00:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `setup_bank_branches`
--

CREATE TABLE `setup_bank_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_bank_branches`
--

INSERT INTO `setup_bank_branches` (`id`, `bank_id`, `bank_branch_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lalbag', 0, NULL, NULL, '2022-03-01 05:27:32', '2022-03-01 05:28:25'),
(2, 2, 'Posta', 0, NULL, NULL, '2022-03-01 05:27:45', '2022-03-01 05:27:45'),
(3, 1, 'Shahjahanpur', 0, NULL, NULL, '2022-03-01 05:28:08', '2022-03-01 05:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `setup_bill_types`
--

CREATE TABLE `setup_bill_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_bill_types`
--

INSERT INTO `setup_bill_types` (`id`, `bill_type_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Panel Layer Payment', 0, NULL, NULL, '2022-03-01 00:28:41', '2022-03-01 00:31:21'),
(2, 'Miscellaneous', 0, NULL, NULL, '2022-03-01 00:29:04', '2022-03-01 00:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `setup_branches`
--

CREATE TABLE `setup_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_branches`
--

INSERT INTO `setup_branches` (`id`, `branch_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Posta Branch', 0, NULL, NULL, '2022-02-15 21:56:14', '2022-02-26 05:48:21'),
(2, 'Islambag Branch', 1, NULL, NULL, '2022-02-15 21:56:22', '2022-02-26 05:48:26');

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
(1, 'Business Cases', 0, NULL, NULL, '2022-02-15 05:21:37', '2022-02-26 05:36:48'),
(2, 'Personal Cases', 0, NULL, NULL, '2022-02-15 05:21:45', '2022-02-15 05:21:45');

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
(1, 'Active', 0, NULL, NULL, '2022-02-15 05:14:05', '2022-02-26 05:38:23'),
(2, 'Inactive', 0, NULL, NULL, '2022-02-15 05:14:10', '2022-02-15 05:14:10'),
(3, 'Ongoing', 0, NULL, NULL, '2022-02-15 05:14:17', '2022-02-15 05:14:17');

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
(1, 'Criminal Cases', 0, NULL, NULL, '2022-02-15 05:22:22', '2022-02-28 04:25:28'),
(2, 'Civil Cases', 0, NULL, NULL, '2022-02-15 05:22:34', '2022-02-28 04:25:20'),
(3, 'Labour Cases', 0, NULL, NULL, '2022-02-28 04:25:37', '2022-02-28 04:25:37'),
(4, 'Special / Quassi-Judicial Cases', 0, NULL, NULL, '2022-02-28 04:26:50', '2022-02-28 04:26:50'),
(5, 'Supreme Court of Bangladesh', 0, NULL, NULL, '2022-02-28 04:27:14', '2022-02-28 04:27:14'),
(6, 'High Court Division', 0, NULL, NULL, '2022-02-28 04:27:34', '2022-02-28 04:27:34'),
(7, 'Appellate Court Division', 0, NULL, NULL, '2022-02-28 04:27:49', '2022-02-28 04:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `setup_companies`
--

CREATE TABLE `setup_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_type_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_companies`
--

INSERT INTO `setup_companies` (`id`, `company_type_id`, `company_name`, `owner_name`, `designation_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ABC Company', 'Smith', 1, 1, NULL, NULL, '2022-02-15 05:12:27', '2022-02-26 06:06:45'),
(2, 2, 'ASD Company', 'Jack', 2, 0, NULL, NULL, '2022-02-15 05:12:36', '2022-02-26 06:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `setup_company_types`
--

CREATE TABLE `setup_company_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_company_types`
--

INSERT INTO `setup_company_types` (`id`, `company_type_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Owened', 0, NULL, NULL, '2022-02-15 05:11:10', '2022-02-26 05:52:38'),
(2, 'Private', 0, NULL, NULL, '2022-02-15 05:11:12', '2022-02-15 05:11:12'),
(3, 'Business Company', 0, NULL, NULL, '2022-03-02 05:54:02', '2022-03-02 05:54:02');

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
(1, 'test', 0, NULL, NULL, '2022-02-26 06:11:36', '2022-02-26 06:11:36');

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
(1, '1', 'test 2', 0, NULL, NULL, '2022-02-26 06:11:52', '2022-02-26 06:11:52');

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
(1, 'Court Kachari', 0, NULL, NULL, '2022-02-15 05:22:56', '2022-02-26 05:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `setup_court_last_orders`
--

CREATE TABLE `setup_court_last_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `court_last_order_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_court_last_orders`
--

INSERT INTO `setup_court_last_orders` (`id`, `court_last_order_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Hearing purpose', 0, NULL, NULL, '2022-02-15 05:13:38', '2022-02-26 05:44:14');

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
(1, 'Professor', 1, NULL, NULL, '2022-02-15 05:11:40', '2022-02-26 05:35:27'),
(2, 'Lawyer', 0, NULL, NULL, '2022-02-15 05:11:44', '2022-02-15 05:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `setup_digital_payments`
--

CREATE TABLE `setup_digital_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `digital_payment_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_digital_payments`
--

INSERT INTO `setup_digital_payments` (`id`, `digital_payment_type_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bkash', 0, NULL, NULL, '2022-03-01 03:47:40', '2022-03-01 03:49:42'),
(2, 'Nagad', 0, NULL, NULL, '2022-03-01 03:47:48', '2022-03-01 03:47:48'),
(3, 'Rockets', 0, NULL, NULL, '2022-03-01 03:47:53', '2022-03-01 03:48:27');

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
(1, 1, 'Shahjahanpur', 0, NULL, NULL, '2022-02-15 05:07:14', '2022-02-26 06:36:50'),
(2, 1, 'Savar', 0, NULL, NULL, '2022-02-15 05:07:18', '2022-02-15 05:07:18'),
(3, 2, 'Shahjalal Majhar', 0, NULL, NULL, '2022-02-15 05:07:50', '2022-02-15 05:07:50'),
(4, 3, 'Pirojpur', 0, NULL, NULL, '2022-02-15 05:07:54', '2022-02-15 05:07:54'),
(5, 3, 'Jhalokathi', 0, NULL, NULL, '2022-02-15 05:08:14', '2022-02-15 05:08:14'),
(6, 3, 'testing', 0, NULL, NULL, '2022-02-26 06:36:17', '2022-02-26 06:36:37');

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
(1, 'Dhaka', 1, NULL, NULL, '2022-02-15 05:07:00', '2022-02-26 06:36:44'),
(2, 'Sylhet', 0, NULL, NULL, '2022-02-15 05:07:02', '2022-02-15 05:07:02'),
(3, 'Barishal', 0, NULL, NULL, '2022-02-15 05:07:06', '2022-02-15 05:07:06');

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
(1, 1, 'Aminur Rahman', 'Smith', 'Aminur', 'asdf@adf', '01996325478', '01996321542', '01887669542', '01996321542', NULL, 1, NULL, NULL, '2022-02-15 04:49:55', '2022-02-26 05:17:55'),
(2, 1, 'Jack', 'Smith', 'Khan', 'testtesteasdf@asdfasdf.com', '01996325478', '01996321542', '01996321542', '0156549875', NULL, 0, NULL, NULL, '2022-02-15 05:02:39', '2022-02-15 05:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `setup_external_council_associates`
--

CREATE TABLE `setup_external_council_associates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `external_council_id` int(11) DEFAULT NULL,
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
-- Dumping data for table `setup_external_council_associates`
--

INSERT INTO `setup_external_council_associates` (`id`, `external_council_id`, `title_id`, `first_name`, `middle_name`, `last_name`, `email`, `work_phone`, `home_phone`, `mobile_phone`, `emergency_contact`, `document_upload`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Jack', 'Smith', 'none', 'testtesttest@asdf.com', '01996325478', '01996321542', '01996321542', '0156549875', NULL, 0, NULL, NULL, '2022-02-15 04:50:29', '2022-02-26 05:19:43'),
(2, 1, 1, 'Shahin', 'Alom', 'Talukder', 'testasdfasdf@gmail.com', '01996325478', '01996321542', '01998876465', '54641654984', NULL, 0, NULL, NULL, '2022-02-15 05:03:28', '2022-02-15 05:03:28'),
(3, 2, 2, 'Jhon', 'Doe', 'Jack', 'smith@atesste', '01996325478', '01996321542', '01998876465', '01996321542', NULL, 0, NULL, NULL, '2022-02-15 05:04:04', '2022-02-15 05:04:04'),
(4, 2, 2, 'Stefen', 'Hokings', 'H', 'testtesttest@faasdfadsf.com', '01996325478', '01996321542', '01998876465', '54641654984', NULL, 0, NULL, NULL, '2022-02-15 05:04:53', '2022-02-15 05:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `setup_external_council_associates_files`
--

CREATE TABLE `setup_external_council_associates_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `external_council_associates_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setup_external_council_files`
--

CREATE TABLE `setup_external_council_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `external_council_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setup_internal_councils`
--

CREATE TABLE `setup_internal_councils` (
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
-- Dumping data for table `setup_internal_councils`
--

INSERT INTO `setup_internal_councils` (`id`, `title_id`, `first_name`, `middle_name`, `last_name`, `email`, `work_phone`, `home_phone`, `mobile_phone`, `emergency_contact`, `document_upload`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Stewert', 'Johan', 'Son', 'stwert@adsfasdf', '01996325478', '01996321542', '01998876465', '54641654984', NULL, 0, NULL, NULL, '2022-02-15 05:27:43', '2022-02-26 05:32:44'),
(2, 2, 'Jacks', 'Parrow', 'none', 'jacks@adsf', '01996325478', '01698774123', '01887669542', '01996321542', NULL, 0, NULL, NULL, '2022-02-15 05:28:20', '2022-02-15 05:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `setup_internal_council_files`
--

CREATE TABLE `setup_internal_council_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `internal_council_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Section 12', 0, NULL, NULL, '2022-02-15 05:23:50', '2022-02-26 06:29:47'),
(2, 'Section 33', 0, NULL, NULL, '2022-02-15 05:23:57', '2022-02-15 05:23:57'),
(3, 'Section 44', 0, NULL, NULL, '2022-02-15 05:24:01', '2022-02-15 05:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `setup_next_date_reasons`
--

CREATE TABLE `setup_next_date_reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `next_date_reason_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_next_date_reasons`
--

INSERT INTO `setup_next_date_reasons` (`id`, `next_date_reason_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Appeared', 1, NULL, NULL, '2022-02-15 05:24:34', '2022-02-26 05:42:54'),
(2, 'Appeal', 0, NULL, NULL, '2022-02-15 05:24:38', '2022-02-26 05:43:02'),
(3, 'Appeare', 0, NULL, NULL, '2022-02-15 05:24:43', '2022-02-15 05:24:43');

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
(1, 'Professor', 0, NULL, NULL, '2022-02-15 04:49:36', '2022-02-26 05:15:19'),
(2, 'Dr.', 0, NULL, NULL, '2022-02-15 04:49:40', '2022-02-15 04:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `setup_programs`
--

CREATE TABLE `setup_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_programs`
--

INSERT INTO `setup_programs` (`id`, `program_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'testtes', 0, NULL, NULL, '2022-02-15 21:55:49', '2022-02-26 05:49:34'),
(2, 'Additional Program', 1, NULL, NULL, '2022-02-15 21:55:55', '2022-02-26 05:49:50');

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
(1, 'Owened', 1, NULL, NULL, '2022-02-15 05:14:46', '2022-02-26 06:08:42'),
(2, 'Private Property', 0, NULL, NULL, '2022-02-15 05:15:01', '2022-02-15 05:15:01'),
(3, 'Business Property', 0, NULL, NULL, '2022-02-15 05:15:08', '2022-02-15 05:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `setup_regions`
--

CREATE TABLE `setup_regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_regions`
--

INSERT INTO `setup_regions` (`id`, `region_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Lalbag', 1, NULL, NULL, '2022-02-15 05:25:02', '2022-02-26 05:45:38'),
(2, 'Shantinagar', 0, NULL, NULL, '2022-02-15 05:25:10', '2022-02-15 05:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `setup_seller_buyers`
--

CREATE TABLE `setup_seller_buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_id` int(11) DEFAULT NULL,
  `seller_or_buyer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_buyer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_upload` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_seller_buyers`
--

INSERT INTO `setup_seller_buyers` (`id`, `title_id`, `seller_or_buyer`, `seller_buyer_name`, `email`, `work_phone`, `home_phone`, `mobile_phone`, `emergency_contact`, `address1`, `address2`, `document_upload`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Seller', 'Aminur Rahman Smith Aminur', 'asdf@adf', '01996325478', '01996321542', '01996321542', NULL, '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', NULL, 0, NULL, NULL, '2022-03-03 05:45:31', '2022-03-03 05:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `setup_thanas`
--

CREATE TABLE `setup_thanas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `thana_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_thanas`
--

INSERT INTO `setup_thanas` (`id`, `district_id`, `thana_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ashulia', 0, NULL, NULL, '2022-03-03 04:23:33', '2022-03-03 04:23:33'),
(2, 4, 'Kawkhali', 0, NULL, NULL, '2022-03-03 04:23:43', '2022-03-03 04:23:43'),
(3, 4, 'Bhandaria', 0, NULL, NULL, '2022-03-03 04:23:52', '2022-03-03 04:23:52'),
(4, 2, 'Zirabo', 0, NULL, NULL, '2022-03-03 04:24:16', '2022-03-03 04:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `supreme_court_cases`
--

CREATE TABLE `supreme_court_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_case_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_nature_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `member_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `police_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `relevant_law_sections_id` int(11) DEFAULT NULL,
  `alligation_id` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_complainant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_designation_id` int(11) DEFAULT NULL,
  `external_council_name_id` int(11) DEFAULT NULL,
  `external_council_associates_id` int(11) DEFAULT NULL,
  `opposite_party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `last_order_court_id` int(11) DEFAULT NULL,
  `accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_company_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `assigned_lawyer_id` int(11) DEFAULT NULL,
  `other_claim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prayer_claims_by_psg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supreme_court_cases`
--

INSERT INTO `supreme_court_cases` (`id`, `case_no`, `date_of_case_received`, `case_category_nature_id`, `case_type_id`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `police_station`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `relevant_law_sections_id`, `alligation_id`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `opposite_party_name`, `opposite_party_address`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `total_legal_bill_amount`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '321313', '2022-01-31', '1', 2, '7788', 1, '2', 2, '321313', 2, 'Lalbagh', 1, '2022-03-09', 2, 3, 3, 2, '65000', 'Aminur Rahman Smith Aminur', '01998744563', 2, 2, 4, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 1, 'Aminur Rahman Smith Aminur', 2, '2022-02-07', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 3, 'test1', 2, '01456698785', 2, 'test21', 2, 2, 'test claim none updated', 'facts and alligation none updated', 'no psg selected updated', '97600', 'file 1, file 2, file 3 updated', 'test comments of null updated', 0, NULL, NULL, '2022-02-17 04:17:17', '2022-02-26 01:53:48'),
(2, '6985', '2022-01-31', '2', 1, '778', 2, '1', 2, '541', 2, 'Lalbagh', 1, '2022-02-15', 1, 2, 3, 2, '35000', 'Aminur Rahman Smith Aminur', '01998744563', 2, 2, 4, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 1, 'Jack', 2, '2022-02-09', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 3, 'Smith', 2, '01456698783', 2, 'test21', 2, 2, 'test 2', 'test 3', 'test 4', '40000', 'test 5', 'test 6', 0, NULL, NULL, '2022-02-26 01:35:10', '2022-02-26 05:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `supreme_court_cases_files`
--

CREATE TABLE `supreme_court_cases_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supreme_court_cases_files`
--

INSERT INTO `supreme_court_cases_files` (`id`, `case_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '164509303746asdfasdf.pdf', 0, NULL, NULL, '2022-02-17 04:17:17', '2022-02-17 04:17:17'),
(2, 1, '164509303772byden.jpg', 0, NULL, NULL, '2022-02-17 04:17:17', '2022-02-17 04:17:17'),
(3, 1, '164509303726Ethnicity.png', 0, NULL, NULL, '2022-02-17 04:17:17', '2022-02-17 04:17:17'),
(4, 1, '164509401622asdfasdf.pdf', 0, NULL, NULL, '2022-02-17 04:33:36', '2022-02-17 04:33:36'),
(5, 1, '16450940161byden.jpg', 0, NULL, NULL, '2022-02-17 04:33:36', '2022-02-17 04:33:36'),
(6, 1, '164509401627Ethnicity.png', 0, NULL, NULL, '2022-02-17 04:33:36', '2022-02-17 04:33:36'),
(7, 2, '164586091045asdfasdf.pdf', 0, NULL, NULL, '2022-02-26 01:35:10', '2022-02-26 01:35:10'),
(8, 2, '164586091072byden.jpg', 0, NULL, NULL, '2022-02-26 01:35:10', '2022-02-26 01:35:10'),
(9, 2, '164586091037Ethnicity.png', 0, NULL, NULL, '2022-02-26 01:35:10', '2022-02-26 01:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `supreme_court_case_status_logs`
--

CREATE TABLE `supreme_court_case_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `updated_court_id` int(11) DEFAULT NULL,
  `updated_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_next_date_fixed_id` int(11) DEFAULT NULL,
  `updated_panel_lawyer_id` int(11) DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_case_status_id` int(11) DEFAULT NULL,
  `updated_accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_proceedings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supreme_court_case_status_logs`
--

INSERT INTO `supreme_court_case_status_logs` (`id`, `case_id`, `updated_court_id`, `updated_next_date`, `updated_next_date_fixed_id`, `updated_panel_lawyer_id`, `order_date`, `updated_case_status_id`, `updated_accused_name`, `update_description`, `case_proceedings`, `case_notes`, `next_date_fixed_reason`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-03', 1, 2, '2022-02-16', 3, 'nones', 'test 9', 'test 8', 'test 7', 'Next Date', 0, NULL, NULL, '2022-02-26 01:54:49', '2022-02-26 01:54:49'),
(2, 1, 1, '2022-02-03', 2, 2, '2022-03-12', 3, 'test accuse', 'test 2', 'test 3', 'test 6', 'Disposed', 0, NULL, NULL, '2022-02-26 01:55:58', '2022-02-26 01:55:58'),
(3, 2, 1, '2022-02-02', 3, 2, '2022-03-05', 3, 'no one', 'test 1', 'test 2', 'test 3', 'Disposed', 0, NULL, NULL, '2022-02-26 03:03:57', '2022-02-26 03:03:57');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appellate_court_cases`
--
ALTER TABLE `appellate_court_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appellate_court_cases_files`
--
ALTER TABLE `appellate_court_cases_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appellate_court_case_status_logs`
--
ALTER TABLE `appellate_court_case_status_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_billings`
--
ALTER TABLE `case_billings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `civil_case_status_logs`
--
ALTER TABLE `civil_case_status_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases`
--
ALTER TABLE `criminal_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases_files`
--
ALTER TABLE `criminal_cases_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_case_status_logs`
--
ALTER TABLE `criminal_case_status_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `high_court_cases`
--
ALTER TABLE `high_court_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `high_court_cases_files`
--
ALTER TABLE `high_court_cases_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `high_court_case_status_logs`
--
ALTER TABLE `high_court_case_status_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labour_cases`
--
ALTER TABLE `labour_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labour_cases_files`
--
ALTER TABLE `labour_cases_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labour_case_status_logs`
--
ALTER TABLE `labour_case_status_logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `quassi_judicial_cases`
--
ALTER TABLE `quassi_judicial_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quassi_judicial_cases_files`
--
ALTER TABLE `quassi_judicial_cases_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quassi_judicial_case_status_logs`
--
ALTER TABLE `quassi_judicial_case_status_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setup_alligations`
--
ALTER TABLE `setup_alligations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_areas`
--
ALTER TABLE `setup_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_banks`
--
ALTER TABLE `setup_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_bank_branches`
--
ALTER TABLE `setup_bank_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_bill_types`
--
ALTER TABLE `setup_bill_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_branches`
--
ALTER TABLE `setup_branches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `setup_companies`
--
ALTER TABLE `setup_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_company_types`
--
ALTER TABLE `setup_company_types`
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
-- Indexes for table `setup_court_last_orders`
--
ALTER TABLE `setup_court_last_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_designations`
--
ALTER TABLE `setup_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_digital_payments`
--
ALTER TABLE `setup_digital_payments`
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
-- Indexes for table `setup_external_council_associates`
--
ALTER TABLE `setup_external_council_associates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_external_council_associates_files`
--
ALTER TABLE `setup_external_council_associates_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_external_council_files`
--
ALTER TABLE `setup_external_council_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_internal_councils`
--
ALTER TABLE `setup_internal_councils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_internal_council_files`
--
ALTER TABLE `setup_internal_council_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_law_sections`
--
ALTER TABLE `setup_law_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_next_date_reasons`
--
ALTER TABLE `setup_next_date_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_person_titles`
--
ALTER TABLE `setup_person_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_programs`
--
ALTER TABLE `setup_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_property_types`
--
ALTER TABLE `setup_property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_regions`
--
ALTER TABLE `setup_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_seller_buyers`
--
ALTER TABLE `setup_seller_buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_thanas`
--
ALTER TABLE `setup_thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supreme_court_cases`
--
ALTER TABLE `supreme_court_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supreme_court_cases_files`
--
ALTER TABLE `supreme_court_cases_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supreme_court_case_status_logs`
--
ALTER TABLE `supreme_court_case_status_logs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appellate_court_cases`
--
ALTER TABLE `appellate_court_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appellate_court_cases_files`
--
ALTER TABLE `appellate_court_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `appellate_court_case_status_logs`
--
ALTER TABLE `appellate_court_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `case_billings`
--
ALTER TABLE `case_billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `civil_cases`
--
ALTER TABLE `civil_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `civil_cases_files`
--
ALTER TABLE `civil_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `civil_case_status_logs`
--
ALTER TABLE `civil_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `criminal_cases`
--
ALTER TABLE `criminal_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `criminal_cases_files`
--
ALTER TABLE `criminal_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `criminal_case_status_logs`
--
ALTER TABLE `criminal_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `high_court_cases`
--
ALTER TABLE `high_court_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `high_court_cases_files`
--
ALTER TABLE `high_court_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `high_court_case_status_logs`
--
ALTER TABLE `high_court_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `labour_cases`
--
ALTER TABLE `labour_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `labour_cases_files`
--
ALTER TABLE `labour_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `labour_case_status_logs`
--
ALTER TABLE `labour_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quassi_judicial_cases`
--
ALTER TABLE `quassi_judicial_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quassi_judicial_cases_files`
--
ALTER TABLE `quassi_judicial_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quassi_judicial_case_status_logs`
--
ALTER TABLE `quassi_judicial_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_alligations`
--
ALTER TABLE `setup_alligations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_areas`
--
ALTER TABLE `setup_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_banks`
--
ALTER TABLE `setup_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_bank_branches`
--
ALTER TABLE `setup_bank_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_bill_types`
--
ALTER TABLE `setup_bill_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_branches`
--
ALTER TABLE `setup_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_case_categories`
--
ALTER TABLE `setup_case_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_case_statuses`
--
ALTER TABLE `setup_case_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_case_types`
--
ALTER TABLE `setup_case_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_companies`
--
ALTER TABLE `setup_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_company_types`
--
ALTER TABLE `setup_company_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_compliance_categories`
--
ALTER TABLE `setup_compliance_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_compliance_types`
--
ALTER TABLE `setup_compliance_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_courts`
--
ALTER TABLE `setup_courts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_court_last_orders`
--
ALTER TABLE `setup_court_last_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_designations`
--
ALTER TABLE `setup_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_digital_payments`
--
ALTER TABLE `setup_digital_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_districts`
--
ALTER TABLE `setup_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_divisions`
--
ALTER TABLE `setup_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_external_councils`
--
ALTER TABLE `setup_external_councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_external_council_associates`
--
ALTER TABLE `setup_external_council_associates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_external_council_associates_files`
--
ALTER TABLE `setup_external_council_associates_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_external_council_files`
--
ALTER TABLE `setup_external_council_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_internal_councils`
--
ALTER TABLE `setup_internal_councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_internal_council_files`
--
ALTER TABLE `setup_internal_council_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_law_sections`
--
ALTER TABLE `setup_law_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_next_date_reasons`
--
ALTER TABLE `setup_next_date_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_person_titles`
--
ALTER TABLE `setup_person_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_programs`
--
ALTER TABLE `setup_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_property_types`
--
ALTER TABLE `setup_property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_regions`
--
ALTER TABLE `setup_regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_seller_buyers`
--
ALTER TABLE `setup_seller_buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_thanas`
--
ALTER TABLE `setup_thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supreme_court_cases`
--
ALTER TABLE `supreme_court_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supreme_court_cases_files`
--
ALTER TABLE `supreme_court_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supreme_court_case_status_logs`
--
ALTER TABLE `supreme_court_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
