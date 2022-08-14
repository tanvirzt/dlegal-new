-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2022 at 04:40 PM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlegalinfo_bclc`
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
(1, 'Md. Imran Hossain', 'admin', '01771045019', 'mdimranhossain9851@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(2, 'Imran', 'subadmin', '01687663654', 'imrancsecity@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(3, 'Md. Imran', 'subadmin', '01771045019', 'admin@admin.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(4, 'Md. Imran', 'subadmin', '01771045019', 'test@admin.com', NULL, '$2a$12$GYZx235ezFaYYa3Oxornx.6fa1p8nBm20t4eA9yD./orC2oH/eUcy', '', 1, NULL, NULL, NULL),
(7, 'Jabed Akhter', 'subadmin', '01771045019', 'jabedakhter@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(8, 'Tamanna', 'subadmin', '01771045019', 'tamanna@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(9, 'N. K. Zoha', 'subadmin', '01717-406688', 'nkzoha@gmail.com', NULL, '$2y$10$/KNEtF1h4Hd/.sh/dgkfWuUGuCE1dFlZkVmhMCiuWfNKJf97NKBga', '', 1, NULL, '2022-06-26 09:55:48', '2022-06-26 09:55:48'),
(10, 'Md. Niamul Kabir', 'subadmin', '01717406688', 'niamulkabir.adv@gmail.com', NULL, '$2y$10$pFsWhdexBgazhtHUA6RqAevrg4TbJWEQuVrXUTgmh3KV9DJ0vtiAG', '', 1, NULL, '2022-06-26 10:00:55', '2022-06-26 10:00:55'),
(11, 'Md. Imran Hossain', 'subadmin', '01771045019', 'imran.zaimahtech@gmail.com', NULL, '$2y$10$rHTLmkHtgCZqFjo9d8BcM.mmvOkqCzuwQAc5Sra.WUGS0Y9zIL25a', '', 1, NULL, '2022-06-26 10:02:01', '2022-06-26 10:02:01'),
(12, 'Md. Johirul Islam', 'subadmin', '01820703940', 'jislam@admin.com', NULL, '$2y$10$9xOXdh29s0HuP4YkKUsaM.12mbAh8DGg/d9emxsaQtzMwlpByWbEy', '', 1, NULL, '2022-06-26 10:05:41', '2022-06-26 10:05:41'),
(13, 'Mr. Imran None', 'subadmin', '01771045019', 'mdimranhossain985@gmail.com', NULL, '$2y$10$HL0sSBzhfi60n6EW5YgImOGMk/94IpHLDWzBt6dXijGeG1fv0H4HG', '', 1, NULL, '2022-06-26 10:37:39', '2022-06-26 10:37:39'),
(14, 'Md. Mushfiqur Rahman', 'subadmin', '01996325478', 'musfiq371@gmail.com', NULL, '$2y$10$0DWoe6MTUMwqoysO8BouIeJq/5s6lT8NX4kXbnihLo4DqQRkWLLYq', '', 1, NULL, '2022-06-26 10:54:10', '2022-06-26 10:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `appellate_court_cases`
--

CREATE TABLE `appellate_court_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lower_court` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `thana_id` int(11) DEFAULT NULL,
  `case_class_id` int(11) DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `law_id` int(11) DEFAULT NULL,
  `relevant_law_id` int(11) DEFAULT NULL,
  `relevant_sections_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_complainant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_designation_id` int(11) DEFAULT NULL,
  `accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_company_id` int(11) DEFAULT NULL,
  `accused_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_court_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_court_judgement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_grounds_judgement` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_court_id` int(11) DEFAULT NULL,
  `appeal_court_judgement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_grounds_judgement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_court_judgement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_received_lawyer_id` int(11) DEFAULT NULL,
  `case_papers_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tadbirkar_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tender_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tender_no_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `case_subcategory_id` int(11) DEFAULT NULL,
  `case_no_acd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_filing_acd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acd_court_id` int(11) DEFAULT NULL,
  `laws_id` int(11) DEFAULT NULL,
  `sections_id` int(11) DEFAULT NULL,
  `order` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no_memo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_petitioner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_designation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_designation_id` int(11) DEFAULT NULL,
  `opposite_party_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `party_steps_taken_id` int(11) DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `fixed_hearing_court_id` int(11) DEFAULT NULL,
  `court_steps_taken_id` int(11) DEFAULT NULL,
  `court_next_steps_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_lawyer_id` int(11) DEFAULT NULL,
  `documents_lawyers_appointment` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents_sent_to_law_chamber` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents_received_field_programe` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ground_appeal_revision` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendations` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appellate_court_cases`
--

INSERT INTO `appellate_court_cases` (`id`, `lower_court`, `case_no`, `division_id`, `district_id`, `thana_id`, `case_class_id`, `case_type_id`, `law_id`, `relevant_law_id`, `relevant_sections_id`, `section_id`, `date_of_filing`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `accused_name`, `accused_company_id`, `accused_address`, `accused_contact_no`, `other_claim`, `summary_facts_alligation`, `trial_court_id`, `trial_court_judgement_date`, `trial_grounds_judgement`, `appeal_court_id`, `appeal_court_judgement_date`, `appeal_grounds_judgement`, `appeal_court_judgement`, `panel_lawyer_id`, `total_legal_bill_amount`, `case_received_lawyer_id`, `case_papers_received`, `tadbirkar_details`, `tender_no`, `tender_no_date`, `case_category_id`, `case_subcategory_id`, `case_no_acd`, `date_of_filing_acd`, `acd_court_id`, `laws_id`, `sections_id`, `order`, `order_date`, `order_no_memo`, `appellant_petitioner_name`, `appellant_designation_id`, `appellant_address`, `opposite_party_name`, `opposite_party_designation_id`, `opposite_party_address`, `party_steps_taken_id`, `case_status_id`, `fixed_hearing_court_id`, `court_steps_taken_id`, `court_next_steps_date`, `assigned_lawyer_id`, `documents_lawyers_appointment`, `documents_sent_to_law_chamber`, `documents_received_field_programe`, `missing_documents_evidence`, `ground_appeal_revision`, `recommendations`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Yes', '654643', 3, 3, 2, 3, 2, 2, 2, 3, 4, '2022-03-17', 'asdf', 2, 'test', 'Aminur Rahman Smith Aminur', '01998744563', 2, 'Aminur Rahman Smith Aminur', 2, '43 Phillip St, Sydney NSW 2000, Australia', '01998745638', 'test', 'test', '2', '2022-04-01', 'test', 1, '2022-03-19', 'test', 'test', 1, 'test', 1, '2022-03-17', 'test', 'test 2', '2022-03-15', 3, 3, 'testasdf', '2022-03-15', 2, 2, 2, 'est', '2022-03-09', '2022-04-01', 'est', '1', 'estr', 'Aminur Rahman Smith Aminur', 2, '43 Phillip St, Sydney NSW 2000, Australia', 3, 3, 2, 3, '2022-03-10', 1, 'test', 'asdf', 'wer', 'sdfds', 'sdafds', 'ertert', 0, NULL, NULL, '2022-03-31 04:47:46', '2022-03-31 06:21:11');

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
-- Table structure for table `bill_schedules`
--

CREATE TABLE `bill_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_schedule_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_schedules`
--

INSERT INTO `bill_schedules` (`id`, `bill_schedule_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'erere', 0, NULL, NULL, '2022-06-12 10:08:43', '2022-06-12 10:09:22'),
(2, 'werwe', 0, NULL, NULL, '2022-06-12 10:09:17', '2022-06-12 10:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `cases_notifications`
--

CREATE TABLE `cases_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cases_notifications`
--

INSERT INTO `cases_notifications` (`id`, `case_id`, `case_no`, `case_type`, `received_by`, `send_by`, `is_read`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, '5465145 of 2021                                                                \r\n                                                                test 544444444/2023', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 07:10:54', '2022-06-26 07:10:54'),
(2, 3, '5465145 of 2021                                                \r\n                                                test 544444444/2023', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 07:27:23', '2022-06-26 07:27:23'),
(3, 9, '194 of 2021', 'Criminal Cases', 'nkzoha@gmail.com', 'imran.zaimahtech@gmail.com', 'Yes', 0, NULL, NULL, '2022-06-26 10:07:37', '2022-07-16 07:49:02'),
(4, 9, '194 of 2021', 'Criminal Cases', 'nkzoha@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:08:15', '2022-06-26 10:08:15'),
(5, 9, '194 of 2021', 'Criminal Cases', 'nkzoha@gmail.com', 'imran.zaimahtech@gmail.com', 'Yes', 0, NULL, NULL, '2022-06-26 10:10:21', '2022-07-16 07:49:19'),
(6, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:11:34', '2022-06-26 10:11:34'),
(7, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:12:57', '2022-06-26 10:12:57'),
(8, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:15:59', '2022-06-26 10:15:59'),
(9, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:16:17', '2022-06-26 10:16:17'),
(10, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:18:03', '2022-06-26 10:18:03'),
(11, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:18:24', '2022-06-26 10:18:24'),
(12, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:19:31', '2022-06-26 10:19:31'),
(13, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:21:34', '2022-06-26 10:21:34'),
(14, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:22:13', '2022-06-26 10:22:13'),
(15, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:24:29', '2022-06-26 10:24:29'),
(16, 23, '426 of 2018', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:27:48', '2022-06-26 10:27:48'),
(17, 23, '426 of 2018', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:29:30', '2022-06-26 10:29:30'),
(18, 23, '426 of 2018', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:29:51', '2022-06-26 10:29:51'),
(19, 23, '426 of 2018', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:33:56', '2022-06-26 10:33:56'),
(20, 23, '426 of 2018', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:35:53', '2022-06-26 10:35:53'),
(21, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'mdimranhossain985@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:38:02', '2022-06-26 10:38:02'),
(22, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'mdimranhossain985@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:40:58', '2022-06-26 10:40:58'),
(23, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'jislam@admin.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:41:12', '2022-06-26 10:41:12'),
(24, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'mdimranhossain985@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:41:59', '2022-06-26 10:41:59'),
(25, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'jislam@admin.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:52:48', '2022-06-26 10:52:48'),
(26, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'musfiq371@gmail.com', 'imran.zaimahtech@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 10:54:39', '2022-06-26 10:54:39'),
(27, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:02:10', '2022-06-26 11:02:10'),
(28, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:02:32', '2022-06-26 11:02:32'),
(29, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:04:40', '2022-06-26 11:04:40'),
(30, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:05:35', '2022-06-26 11:05:35'),
(31, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:05:58', '2022-06-26 11:05:58'),
(32, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:07:59', '2022-06-26 11:07:59'),
(33, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:08:42', '2022-06-26 11:08:42'),
(34, 14, 'BLA (wages) 60 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:15:18', '2022-06-26 11:15:18'),
(35, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:45:14', '2022-06-26 11:45:14'),
(36, 16, 'C.R. 1341 of 2021', 'Criminal Cases', 'jislam@admin.com', 'jabedakhter@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 11:56:43', '2022-06-26 11:56:43'),
(37, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 12:02:54', '2022-06-26 12:02:54'),
(38, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 12:03:48', '2022-06-26 12:03:48'),
(39, 13, 'BLA(complaint) 248 of 2021', 'Criminal Cases', 'mdimranhossain985@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-26 12:05:58', '2022-06-26 12:05:58'),
(40, 26, 'C.R. 20333 of 2018', 'Criminal Cases', 'jislam@admin.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-06-26 16:12:40', '2022-06-26 16:12:40'),
(41, 31, 'C.R. 311 of 2017,\r\n                                                Sessions\r\n                        13371/2018', 'Criminal Cases', 'mdimranhossain985@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-06-29 14:44:59', '2022-06-29 14:44:59'),
(42, 31, 'C.R. 311 of 2017,\r\n                                                Sessions\r\n                        13371/2018', 'Criminal Cases', 'musfiq371@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-02 04:47:27', '2022-07-02 04:47:27'),
(43, 9, '194 of 2021', 'Criminal Cases', 'imran.zaimahtech@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-02 11:49:10', '2022-07-02 11:49:10'),
(44, 34, '1544 of 2015                        \r\n                        23000/2019', 'Criminal Cases', 'jislam@admin.com', 'jislam@admin.com', 'Yes', 0, NULL, NULL, '2022-07-06 11:38:49', '2022-07-26 11:58:26'),
(45, 40, 'C.R. 594 of 2016 ,                         Sessions\r\n                        10606/2016', 'Criminal Cases', 'jislam@admin.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-07 08:58:12', '2022-07-07 08:58:12'),
(46, 40, 'C.R. 594 of 2016 ,                         Sessions\r\n                        10606/2016', 'Criminal Cases', 'jislam@admin.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-07 08:59:51', '2022-07-07 08:59:51'),
(47, 40, 'C.R. 594 of 2016,\r\n                                                                                                Sessions\r\n                                                10606/2016', 'Criminal Cases', 'jislam@admin.com', 'jislam@admin.com', 'Yes', 0, NULL, NULL, '2022-07-07 09:00:17', '2022-07-20 12:26:11'),
(48, 40, 'C.R. 594 of 2016,\r\n                                                                                                Sessions\r\n                                                10606/2016', 'Criminal Cases', 'jislam@admin.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-07 09:05:51', '2022-07-07 09:05:51'),
(49, 40, 'C.R. 594 of 2016,\r\n                                                                                                Sessions\r\n                                                10606/2016', 'Criminal Cases', 'jislam@admin.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-07 09:06:29', '2022-07-07 09:06:29'),
(50, 40, 'C.R. 594 of 2016,\r\n                                                                                                Sessions\r\n                                                10606/2016', 'Criminal Cases', 'jislam@admin.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-07 09:07:06', '2022-07-07 09:07:06'),
(51, 40, 'C.R. 594 of 2016 ,                         Sessions\r\n                        10606/2016', 'Criminal Cases', 'nkzoha@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-07 09:12:23', '2022-07-07 09:12:23'),
(52, 40, 'C.R. 594 of 2016 ,                         Sessions\r\n                        10606/2016', 'Criminal Cases', 'jislam@admin.com', 'jislam@admin.com', 'Yes', 0, NULL, NULL, '2022-07-07 09:33:06', '2022-07-18 04:02:29'),
(53, 9, '194 of 2021', 'Criminal Cases', 'nkzoha@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-18 10:51:33', '2022-07-18 10:51:33'),
(54, 9, '194 of 2021', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-18 10:51:33', '2022-07-18 10:51:33'),
(55, 21, 'Nari O Shishu Case No. 471 of 2020', 'Criminal Cases', 'nkzoha@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-18 11:01:50', '2022-07-18 11:01:50'),
(56, 21, 'Nari O Shishu Case No. 471 of 2020', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-18 11:01:50', '2022-07-18 11:01:50'),
(57, 49, 'Nari O Shishu Case No. 471 of 2020', 'Criminal Cases', 'nkzoha@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-18 11:02:05', '2022-07-18 11:02:05'),
(58, 49, 'Nari O Shishu Case No. 471 of 2020', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-18 11:02:05', '2022-07-18 11:02:05'),
(59, 49, 'Nari O Shishu Case No. 471 of 2020', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-18 11:02:05', '2022-07-18 11:02:05'),
(60, 47, 'C.R. 160 of 2018,\r\n                                                                                                Sessions\r\n                                                19240/2018', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-18 11:48:59', '2022-07-18 11:48:59'),
(61, 47, 'C.R. 160 of 2018,\r\n                                                                                                Sessions\r\n                                                19240/2018', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-18 11:48:59', '2022-07-18 11:48:59'),
(62, 46, 'C.R. 160 of 2018,\r\n                                                                                                Sessions\r\n                                                19240/2018', 'Criminal Cases', 'nkzoha@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-19 05:20:56', '2022-07-19 05:20:56'),
(63, 46, 'C.R. 160 of 2018,\r\n                                                                                                Sessions\r\n                                                19240/2018', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-19 05:20:56', '2022-07-19 05:20:56'),
(64, 46, 'C.R. 160 of 2018,\r\n                                                                                                Sessions\r\n                                                19240/2018', 'Criminal Cases', 'nkzoha@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-19 05:21:36', '2022-07-19 05:21:36'),
(65, 46, 'C.R. 160 of 2018,\r\n                                                                                                Sessions\r\n                                                19240/2018', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-19 05:21:37', '2022-07-19 05:21:37'),
(66, 48, 'C.R. 160 of 2018 ,                         Sessions\r\n                        19240/2018', 'Criminal Cases', 'nkzoha@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-19 05:22:06', '2022-07-19 05:22:06'),
(67, 48, 'C.R. 160 of 2018 ,                         Sessions\r\n                        19240/2018', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-19 05:22:07', '2022-07-19 05:22:07'),
(68, 54, 'C.R. 1580 of 2015 ,                         Sessions\r\n                        12959/2017', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-21 05:14:10', '2022-07-21 05:14:10'),
(69, 13, '194 of 2021', 'Criminal Cases', 'nkzoha@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-21 11:17:11', '2022-07-21 11:17:11'),
(70, 18, 'AT 426 of 2018', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'nkzoha@gmail.com', NULL, 0, NULL, NULL, '2022-07-22 16:10:23', '2022-07-22 16:10:23'),
(71, 52, '20002 of 2021', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-23 12:17:27', '2022-07-23 12:17:27'),
(72, 52, '20002 of 2021', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-23 12:19:46', '2022-07-23 12:19:46'),
(73, 60, 'G.R. 3232 of 2018', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-25 06:13:43', '2022-07-25 06:13:43'),
(74, 53, 'G.R. 3232 of 2018', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-25 06:14:27', '2022-07-25 06:14:27'),
(75, 53, 'G.R. 3232 of 2018', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-25 06:14:50', '2022-07-25 06:14:50'),
(76, 53, 'G.R. 3232 of 2018', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-25 06:15:28', '2022-07-25 06:15:28'),
(77, 53, 'G.R. 3232 of 2018', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-25 06:15:42', '2022-07-25 06:15:42'),
(78, 55, 'C.R. 323232 of 2021', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-25 16:10:15', '2022-07-25 16:10:15'),
(79, 55, 'C.R. 323232 of 2021', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-25 17:28:28', '2022-07-25 17:28:28'),
(80, 61, 'C.R. 323232 of 2021', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'nkzoha@gmail.com', NULL, 0, NULL, NULL, '2022-07-25 17:39:34', '2022-07-25 17:39:34'),
(81, 61, 'C.R. 323232 of 2021', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'nkzoha@gmail.com', NULL, 0, NULL, NULL, '2022-07-25 17:45:21', '2022-07-25 17:45:21'),
(82, 56, 'C.R. 323232 of 2021', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'nkzoha@gmail.com', NULL, 0, NULL, NULL, '2022-07-25 17:48:34', '2022-07-25 17:48:34'),
(83, 57, 'C.R. 323232 of 2021', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'nkzoha@gmail.com', NULL, 0, NULL, NULL, '2022-07-25 17:48:58', '2022-07-25 17:48:58'),
(84, 61, 'C.R. 323232 of 2021', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'nkzoha@gmail.com', NULL, 0, NULL, NULL, '2022-07-25 17:51:22', '2022-07-25 17:51:22'),
(85, 48, '194 of 2021', 'Criminal Cases', 'nkzoha@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-27 07:48:25', '2022-07-27 07:48:25'),
(86, 48, '194 of 2021', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-27 07:48:26', '2022-07-27 07:48:26'),
(87, 64, 'C.R. 1545 of 2015 ,                         Sessions\r\n                        22999/2019', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-27 10:17:13', '2022-07-27 10:17:13'),
(88, 68, 'C.R. 1545 of 2015,\r\n                                                                                                Sessions\r\n                                                22999/2019', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-27 10:20:23', '2022-07-27 10:20:23'),
(89, 68, 'C.R. 1545 of 2015,\r\n                                                                                                Sessions\r\n                                                22999/2019', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-07-27 10:26:34', '2022-07-27 10:26:34'),
(90, 48, '194 of 2021', 'Criminal Cases', 'nkzoha@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-28 13:36:41', '2022-07-28 13:36:41'),
(91, 48, '194 of 2021', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-07-28 13:36:41', '2022-07-28 13:36:41'),
(92, 13, '194 of 2021', 'Criminal Cases', 'nkzoha@gmail.com', 'mdimranhossain985@gmail.com', 'Yes', 0, NULL, NULL, '2022-07-28 13:37:34', '2022-07-30 15:44:57'),
(93, 76, 'C.R. 19999 of 2022', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-08-01 11:50:52', '2022-08-01 11:50:52'),
(94, 76, 'C.R. 19999 of 2022', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'mdimranhossain985@gmail.com', NULL, 0, NULL, NULL, '2022-08-01 11:52:04', '2022-08-01 11:52:04'),
(95, 70, 'C.R. 1545 of 2015,\r\n                                                                                                Sessions\r\n                                                22999/2019', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-08-03 16:03:18', '2022-08-03 16:03:18'),
(96, 80, 'C.R. 2030 of 2024', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-08-03 16:05:22', '2022-08-03 16:05:22'),
(97, 81, 'C.R. 2520 of 2024', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-08-04 17:31:09', '2022-08-04 17:31:09'),
(98, 83, 'C.R. 2520 of 2024', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-08-07 05:20:17', '2022-08-07 05:20:17'),
(99, 83, 'C.R. 2520 of 2024', 'Criminal Cases', 'niamulkabir.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-08-07 06:38:50', '2022-08-07 06:38:50'),
(100, 85, 'C.R. 1542 of 2015 ,                         Sessions\r\n                        2267/2018', 'Criminal Cases', 'johirulislam.adv@gmail.com', 'jislam@admin.com', NULL, 0, NULL, NULL, '2022-08-08 06:04:07', '2022-08-08 06:04:07');

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
(2, 2, 'Cash Payment', 19, 'Criminal Cases', 'CR Case No. 1580/2015', 2, '250000', '2022-03-03', NULL, NULL, NULL, '100000', NULL, NULL, 0, NULL, NULL, '2022-03-02 01:34:28', '2022-03-23 03:38:47'),
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
(19, 2, 'Digital Payment', 1, 'Labour Cases', '65464321313', 2, '870100', '2022-03-18', NULL, NULL, NULL, '36000', 2, NULL, 0, NULL, NULL, '2022-03-03 00:50:40', '2022-03-03 00:50:40'),
(20, 1, 'Bank Payment', 3, 'High Court Division', '544', 2, '250000', '2022-03-16', 2, 2, '6946546877465', '100000', NULL, NULL, 0, NULL, NULL, '2022-03-06 01:49:50', '2022-03-06 01:49:50'),
(21, 1, 'Digital Payment', 24, 'Criminal Cases', 'BLA(wages)- 194/2021', 5, '690000', '2022-03-24', NULL, NULL, NULL, '690000', 1, NULL, 0, NULL, NULL, '2022-03-07 22:33:56', '2022-06-01 10:02:34'),
(22, 1, 'Cash Payment', 4, 'Civil Cases', '4546151', 2, '87500', '2022-03-24', NULL, NULL, NULL, '36000', NULL, NULL, 0, NULL, NULL, '2022-03-07 22:34:15', '2022-03-07 22:34:15'),
(23, 1, 'Digital Payment', 5, 'Civil Cases', '654663', 2, '356000', '2022-03-10', NULL, NULL, NULL, '36000', 1, NULL, 0, NULL, NULL, '2022-03-07 22:35:57', '2022-03-07 22:35:57'),
(24, 1, 'Cash Payment', 3, 'Criminal Cases', '6546', NULL, '500', '2022-03-28', NULL, NULL, NULL, '500', NULL, NULL, 0, NULL, NULL, '2022-03-28 01:05:11', '2022-03-28 01:05:11'),
(25, 2, 'Cash Payment', 17, 'Criminal Cases', 'BLA(wages)- 194/2021', 4, '485000', '2022-03-30', NULL, NULL, NULL, '400000', NULL, NULL, 0, NULL, NULL, '2022-04-03 03:45:43', '2022-06-01 10:00:18'),
(26, 1, 'Bank Payment', 20, 'Criminal Cases', 'BLA(wages)- 194/2021', 5, '500000', '2022-05-25', 2, 2, '254368', '370000', NULL, NULL, 0, NULL, NULL, '2022-06-01 09:54:01', '2022-06-01 09:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `chambers`
--

CREATE TABLE `chambers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chamber_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_office_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chamber_telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chamber_mobile_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chamber_mobile_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chamber_email_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chamber_email_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_office_address_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_office_address_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_of_chamber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_of_chamber_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_of_chamber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_of_chamber_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountant_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_clerk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_clerk_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letterhead_write_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letterhead_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chambers`
--

INSERT INTO `chambers` (`id`, `chamber_name`, `chamber_logo`, `main_office_address`, `chamber_telephone`, `chamber_mobile_one`, `chamber_mobile_two`, `chamber_email_one`, `chamber_email_two`, `branch_office_address_one`, `branch_office_address_two`, `head_of_chamber`, `head_of_chamber_signature`, `admin_of_chamber`, `admin_of_chamber_signature`, `accountant`, `accountant_signature`, `head_clerk`, `head_clerk_signature`, `letterhead_write_up`, `letterhead_address`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ocean Maxwell', '164725962490byden-1.jpg', 'Mollit aspernatur ex', '+1 (938) 789-3336', 'Minima atque obcaeca', 'Dolorem atque nesciu', 'zysitim@mailinator.com', 'qipemale@mailinator.com', 'Adipisicing officia', 'Autem sed qui ration', 'Non aut quis quam eu', 'Qui cumque sunt tem', 'Nihil temporibus non', 'Pariatur Sed quibus', 'Aute ea dolorem eu r', 'Itaque est a commodi', 'Accusamus aut aliqua', 'Quia tenetur corpori', 'Nihil distinctio Si', 'Numquam consequat C', NULL, NULL, NULL, '2022-08-14 10:39:00', '2022-08-14 10:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `chamber_accounts`
--

CREATE TABLE `chamber_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_id` int(11) DEFAULT NULL,
  `chamber_accounts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chamber_accounts`
--

INSERT INTO `chamber_accounts` (`id`, `chamber_id`, `chamber_accounts`, `account_name`, `account_number`, `bank_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 'Debitis aliqua Volu', 'TaShya Whitaker', '371', 'Hiram Robertson', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28'),
(4, 1, 'Laboris dolore nulla', 'Phelan Goff', '247', 'Quentin Holcomb', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `chamber_associates`
--

CREATE TABLE `chamber_associates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_id` int(11) DEFAULT NULL,
  `associate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `associate_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chamber_associates`
--

INSERT INTO `chamber_associates` (`id`, `chamber_id`, `associate`, `associate_signature`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 'Enim ullamco molesti', 'Enim mollitia veniam', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28'),
(4, 1, 'Laborum sit similiqu', 'Velit placeat adip', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `chamber_clerks`
--

CREATE TABLE `chamber_clerks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_id` int(11) DEFAULT NULL,
  `clerk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clerk_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chamber_clerks`
--

INSERT INTO `chamber_clerks` (`id`, `chamber_id`, `clerk`, `clerk_signature`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 'Non sint odio repel', 'Et consequatur offi', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28'),
(4, 1, 'Dignissimos perferen', 'Ad quos facere vel s', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28'),
(5, 1, 'rwer asdf', 'asdf sadf', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `chamber_partners`
--

CREATE TABLE `chamber_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_id` int(11) DEFAULT NULL,
  `partner_of_chamber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_of_chamber_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chamber_partners`
--

INSERT INTO `chamber_partners` (`id`, `chamber_id`, `partner_of_chamber`, `partner_of_chamber_signature`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 'Esse voluptatum accu', 'Culpa asperiores pr', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28'),
(4, 1, 'Nobis exercitation o', 'Deserunt in aspernat', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `chamber_staff`
--

CREATE TABLE `chamber_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counsel_role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counsel_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llb_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llb_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_contact_number_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_email_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_experience_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_experience_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_joining` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chamber_staff`
--

INSERT INTO `chamber_staff` (`id`, `chamber_name`, `counsel_role_id`, `counsel_name`, `father_name`, `mother_name`, `spouse_name`, `present_address`, `permanent_address`, `date_of_birth`, `nid_number`, `mobile_number`, `email`, `emergency_contact`, `relation`, `professional_name`, `ssc_year`, `ssc_institution`, `hsc_year`, `hsc_institution`, `llb_year`, `llb_institution`, `professional_contact_number`, `professional_contact_number_write`, `professional_email`, `professional_email_write`, `professional_experience_one`, `professional_experience_two`, `date_of_joining`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dolan Avery', 'Accountant', 'Serina Allen', 'Norman Brady', 'Genevieve Turner', 'Ciaran Dyer', 'Provident facilis u', 'Neque omnis sapiente', '19-Jan-1983', '984', '551', 'qimenovaj@mailinator.com', 'Laborum quia invento', 'Omnis maxime iusto p', 'Samantha Parker', '1981', 'Aut odit quo id unde', '1996', 'Eaque voluptate labo', '2002', 'In nulla consequatur', '777', '917', 'fowewuzek@mailinator.com', 'cagequ@mailinator.com', 'Aut omnis id distinc', 'Exercitationem lorem', '24-Apr-2022', NULL, NULL, NULL, '2022-08-07 12:20:12', '2022-08-07 12:20:12'),
(2, 'Abigail Obrien', 'Accountant', 'Channing Gordon', 'Naida Jenkins', 'Christen Clements', 'Flynn Mueller', 'Nihil qui qui blandi', 'Nostrum ullamco proi', '25-Sep-1987', '262', '252', 'damokiv@mailinator.com', 'Optio fugiat rerum', 'In odit qui totam su', 'Liberty Gutierrez', '1971', 'Cupiditate commodo c', '2005', 'Incididunt dicta rep', '1980', 'Provident magnam ul', '719', '755', 'hufibynow@mailinator.com', 'rypohynol@mailinator.com', 'Proident excepteur', 'Proident vel et odi', '13-Dec-2007', NULL, NULL, NULL, '2022-08-07 12:25:38', '2022-08-07 12:25:38'),
(3, 'Zane Christian', 'Admin of Chamber', 'Dustin Rogers', 'April Weaver', 'Lillith Dunlap', 'Amber Salas', 'Ad aliqua Possimus', 'Sit et corporis ist', '07-02-2012', '647', '331', 'lenyhovec@mailinator.com', 'Placeat numquam qui', 'Eos illo aliquid vo', 'Latifah Contreras', '1999', 'Quibusdam ex dicta a', '1993', 'Inventore nihil susc', '2001', 'In iusto officiis si', '943', '196', 'gikozum@mailinator.com', 'ropi@mailinator.com', 'Aut proident placea', 'In aut maxime dolor', '06-05-2006', NULL, NULL, NULL, '2022-08-08 12:19:12', '2022-08-08 12:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `chamber_staff_documents_receiveds`
--

CREATE TABLE `chamber_staff_documents_receiveds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_staff_id` int(11) DEFAULT NULL,
  `received_documents_id` int(11) DEFAULT NULL,
  `received_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_type_id` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chamber_staff_documents_receiveds`
--

INSERT INTO `chamber_staff_documents_receiveds` (`id`, `chamber_staff_id`, `received_documents_id`, `received_documents`, `received_documents_date`, `received_documents_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 10, 'Qui esse beatae cum', '1978-06-14', 1, 0, NULL, NULL, '2022-08-07 12:20:30', '2022-08-07 12:20:30'),
(4, 1, 4, 'test asdf', '2022-09-08', 3, 0, NULL, NULL, '2022-08-07 12:20:30', '2022-08-07 12:20:30'),
(5, 2, 6, 'Nihil laborum Alias', '1979-02-19', 3, 0, NULL, NULL, '2022-08-07 12:25:38', '2022-08-07 12:25:38'),
(6, 2, 4, 'asdf', '2022-09-07', 1, 0, NULL, NULL, '2022-08-07 12:25:38', '2022-08-07 12:25:38'),
(7, 3, 4, 'Quia dolorem placeat', '2000-10-18', 1, 0, NULL, NULL, '2022-08-08 12:19:12', '2022-08-08 12:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `chamber_staff_documents_requireds`
--

CREATE TABLE `chamber_staff_documents_requireds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_staff_id` int(11) DEFAULT NULL,
  `required_wanting_documents_id` int(11) DEFAULT NULL,
  `required_wanting_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_type_id` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chamber_staff_documents_requireds`
--

INSERT INTO `chamber_staff_documents_requireds` (`id`, `chamber_staff_id`, `required_wanting_documents_id`, `required_wanting_documents`, `required_wanting_documents_date`, `required_wanting_documents_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 10, 'Commodo sit odit ea', '2013-02-02', 1, 0, NULL, NULL, '2022-08-07 12:20:30', '2022-08-07 12:20:30'),
(4, 1, 4, 'adsf asdfasdf asdfa sdf asdfadsf asdf', '2022-09-07', 3, 0, NULL, NULL, '2022-08-07 12:20:30', '2022-08-07 12:20:30'),
(5, 1, 6, 'rweaf', '2022-09-10', 3, 0, NULL, NULL, '2022-08-07 12:20:30', '2022-08-07 12:20:30'),
(6, 2, 12, 'Dolor sint aut est', '2007-01-13', 2, 0, NULL, NULL, '2022-08-07 12:25:38', '2022-08-07 12:25:38'),
(7, 2, 5, 'asd asdf', '2022-09-07', 3, 0, NULL, NULL, '2022-08-07 12:25:38', '2022-08-07 12:25:38'),
(8, 3, 14, 'Laborum doloremque s', '1978-06-13', 2, 0, NULL, NULL, '2022-08-08 12:19:12', '2022-08-08 12:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `chamber_support_staff`
--

CREATE TABLE `chamber_support_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_id` int(11) DEFAULT NULL,
  `support_staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_staff_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chamber_support_staff`
--

INSERT INTO `chamber_support_staff` (`id`, `chamber_id`, `support_staff`, `support_staff_signature`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 'Excepturi aliquam vo', 'Nulla aliqua Itaque', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28'),
(4, 1, 'Dolore ex et quis ni', 'Atque corrupti sed', 0, NULL, NULL, '2022-08-14 10:39:28', '2022-08-14 10:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `civil_cases`
--

CREATE TABLE `civil_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appeal_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `in_favour_of` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_of_receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_contact_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_category_id` int(11) DEFAULT NULL,
  `client_subcategory_id` int(11) DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_division_id` int(11) DEFAULT NULL,
  `client_district_id` int(11) DEFAULT NULL,
  `client_thana_id` int(11) DEFAULT NULL,
  `received_documents` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_missing_documents` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_case_status_id` int(11) DEFAULT NULL,
  `update_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_next_date_fixed_id` int(11) DEFAULT NULL,
  `case_proceedings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_case_notes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_day_presence_id` int(11) DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `case_subcategory_id` int(11) DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `case_infos_case_no` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `law` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_division_id` int(11) DEFAULT NULL,
  `case_infos_district_id` int(11) DEFAULT NULL,
  `case_infos_thana_id` int(11) DEFAULT NULL,
  `allegation_claim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_of_money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `another_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendant_representative_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendant_representative_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advocate_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_lawyer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `status_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_next_date_fixed_id` int(11) DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_original_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_date_of_judgement_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_summary_of_judgement_order` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_case_category_id` int(11) DEFAULT NULL,
  `appeal_case_subcategory_id` int(11) DEFAULT NULL,
  `appeal_case_type_id` int(11) DEFAULT NULL,
  `appeal_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellate_filing_court` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_law` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_allegation_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_amount_of_money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_another_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_summary_facts` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_name_of_the_appellant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_representative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_representative_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_respondent_opposite_party` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_opposite_representative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_opposite_representative_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_original_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_date_of_judgement_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_summary_of_judgement_order` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_appeal_case_category_id` int(11) DEFAULT NULL,
  `revision_case_subcategory_id` int(11) DEFAULT NULL,
  `revision_case_type_id` int(11) DEFAULT NULL,
  `revision_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_filing_court` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_law` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_allegation_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_amount_of_money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_another_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_summary_facts` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_name_of_the_appellant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_representative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_representative_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_respondent_opposite_party` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_opposite_representative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision_opposite_representative_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civil_cases`
--

INSERT INTO `civil_cases` (`id`, `appeal_case`, `revision_case`, `client`, `case_no`, `name_of_the_court_id`, `next_date`, `next_date_fixed_id`, `in_favour_of`, `received_date`, `received_from`, `mode_of_receipt`, `receiver_contact_details`, `received_by`, `client_category_id`, `client_subcategory_id`, `client_name`, `client_address`, `client_division_id`, `client_district_id`, `client_thana_id`, `received_documents`, `required_missing_documents`, `update_case_status_id`, `update_next_date`, `update_next_date_fixed_id`, `case_proceedings`, `update_case_notes`, `next_day_presence_id`, `case_category_id`, `case_subcategory_id`, `case_type_id`, `case_infos_case_no`, `name_of_the_court`, `date_of_filing`, `law`, `section`, `case_infos_division_id`, `case_infos_district_id`, `case_infos_thana_id`, `allegation_claim`, `amount_of_money`, `another_claim`, `summary_facts`, `plaintiff_name`, `representative_name`, `representative_details`, `defendant_name`, `defendant_representative_name`, `defendant_representative_details`, `advocate_name`, `assigned_lawyer`, `case_status_id`, `status_next_date`, `status_next_date_fixed_id`, `comments`, `appeal_original_case_no`, `appeal_subsequent_case_no`, `appeal_date_of_judgement_order`, `appeal_summary_of_judgement_order`, `appeal_case_category_id`, `appeal_case_subcategory_id`, `appeal_case_type_id`, `appeal_case_no`, `appellate_filing_court`, `appeal_date_of_filing`, `appeal_law`, `appeal_section`, `appeal_allegation_claim`, `appeal_amount_of_money`, `appeal_another_claim`, `appeal_summary_facts`, `appeal_name_of_the_appellant`, `appeal_representative`, `appeal_representative_details`, `appeal_respondent_opposite_party`, `appeal_opposite_representative`, `appeal_opposite_representative_details`, `revision_original_case_no`, `revision_subsequent_case_no`, `revision_date_of_judgement_order`, `revision_summary_of_judgement_order`, `revision_appeal_case_category_id`, `revision_case_subcategory_id`, `revision_case_type_id`, `revision_case_no`, `revision_filing_court`, `revision_date_of_filing`, `revision_law`, `revision_section`, `revision_allegation_claim`, `revision_amount_of_money`, `revision_another_claim`, `revision_summary_facts`, `revision_name_of_the_appellant`, `revision_representative`, `revision_representative_details`, `revision_respondent_opposite_party`, `revision_opposite_representative`, `revision_opposite_representative_details`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Jack', '564687', 1, '2022-04-15', 1, '1', '2022-03-29', 'werw', 'asdf', 'ewte asdf', 'werew adsf', 3, 1, 'wrt ewr', 'test asdf', 3, 3, 2, 'test asdf', 'test test', 3, '2022-04-29', 3, '2022-04-13', 'test asdf test', 2, 4, 4, 1, 'test ste', 'test test test, test', '2022-04-12', 'retet', 'sdfg', 3, 3, 2, 'er trt', 'ad sfg', 'test aaaa fasdf', 'test 32132', 'Smith', 'test asdf', 'test test', 'test test', 'test test test', 'test est ttset', 'Aminur Rahman', 'Smith Aminur', 2, '2022-05-03', 1, 'test 546651', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-09 01:28:10', '2022-04-09 21:54:22'),
(2, NULL, 'Revision Case', 'Jack', '564687', 1, '2022-04-13', 1, '1', '2022-04-06', 'werw', 'asdf', 'test test', 'werew', 3, 1, 'test test', 'test', 3, 3, 1, 'test', 'test', 3, '2022-04-15', 3, '2022-04-22', 'test', 2, 5, 5, 2, 'test sadfasdf', 'test asdfsdaf', '2022-04-21', 'test', 'sdfg', 3, 3, 2, 'test asdf', '246541', 'test asdf test adf', 'test asdf tes adfdsf', 'Aminur', 'test dafgfd asdfds sdfgfd', 'yersy adsf', 'dfghfdgf dfgfd', 'gfhgfcvb cfvgbfd', 'dfgfdg', 'Aminur', 'th Aminur', 3, '2022-04-19', 3, 'sdf try sdfdsfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cvbn', 'gth', '2022-03-29', 'fghfgh', 5, 5, 2, 'cvbvcgf', 'gfhgfh', '2022-04-20', 'test test test', 'asdfds gffdg sdafd', 'xcvxb', 'dfghfdg', 'xcv', 'dgdfg', 'Aminur Rahman Smith Aminur', 'Aminur Rahman Smith Aminur', 'fdsgfdg', 'zxcvb', 'edgtret', 'nvbcn', 0, NULL, NULL, '2022-04-09 03:51:39', '2022-04-09 21:58:36'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mdimranhossain985@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-10 21:52:42', '2022-04-10 21:52:42'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mdimranhossain985@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-10 21:52:56', '2022-04-10 21:52:56'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mdimranhossain985@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-10 21:53:04', '2022-04-10 21:53:04');

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
-- Dumping data for table `civil_case_status_logs`
--

INSERT INTO `civil_case_status_logs` (`id`, `case_id`, `updated_court_id`, `updated_next_date`, `updated_next_date_fixed_id`, `updated_panel_lawyer_id`, `order_date`, `updated_case_status_id`, `updated_accused_name`, `update_description`, `case_proceedings`, `case_notes`, `next_date_fixed_reason`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2022-03-18', 3, 1, '2022-03-25', 3, NULL, 'test 52', 'test45', 'test4', 'Disposed', 0, NULL, NULL, '2022-03-30 04:27:44', '2022-03-30 04:27:44'),
(2, 3, 1, '2022-03-17', 1, 1, '2022-03-25', 2, NULL, 'ewrtewr', 'asdfsd', 'asdfds', 'No Next Date', 0, NULL, NULL, '2022-03-30 04:32:49', '2022-03-30 04:32:49'),
(3, 4, 18, '2022-04-13', 2, 5, '2022-03-10', 5, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-03-31 06:09:40', '2022-03-31 06:09:40');

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
-- Table structure for table `counsels`
--

CREATE TABLE `counsels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counsel_role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counsel_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llb_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llb_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llm_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llm_instution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_council_enrollment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_council_enrollment_sanad_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_bar_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_bar_membership_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `practicing_bar_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `practicing_bar_membership_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_court_enrollment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_court_enrollment_membership_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_council_fees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_council_fees_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_bar_mem_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_bar_mem_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scba_memb_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scba_memb_fee_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_contact_number_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_email_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_associates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_associates_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_experience_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_experience_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_joining` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counsels`
--

INSERT INTO `counsels` (`id`, `chamber_name`, `counsel_role_id`, `counsel_name`, `father_name`, `mother_name`, `spouse_name`, `present_address`, `permanent_address`, `date_of_birth`, `nid_number`, `mobile_number`, `email`, `emergency_contact`, `relation`, `professional_name`, `ssc_year`, `ssc_institution`, `hsc_year`, `hsc_institution`, `llb_year`, `llb_institution`, `llm_year`, `llm_instution`, `bar_council_enrollment_date`, `bar_council_enrollment_sanad_no`, `mother_bar_name`, `mother_bar_membership_number`, `practicing_bar_date`, `practicing_bar_membership_number`, `high_court_enrollment_date`, `high_court_enrollment_membership_number`, `bar_council_fees`, `bar_council_fees_write`, `district_bar_mem_fee`, `district_bar_mem_write`, `scba_memb_fee`, `scba_memb_fee_write`, `professional_contact_number`, `professional_contact_number_write`, `professional_email`, `professional_email_write`, `name_of_associates`, `name_of_associates_write`, `professional_experience_one`, `professional_experience_two`, `date_of_joining`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Veda Kane', 'Head Clerk', 'Lilah Flowers', 'Plato Zamora', 'Nissim Wheeler', 'Jenette Cervantes', 'Consectetur ex culpa', 'Vero numquam esse co', '21-Jan-2015', '584', '552', 'lahi@mailinator.com', 'Magnam tenetur autem', 'Velit ut quo eaque', 'Jordan Wilcox', '2010', 'Cupidatat repellendu', '2005', 'Maxime minim asperio', '1989', 'Libero nihil aut nih', '2003', 'In animi ad eius iu', '23-Oct-1986', 'Provident deserunt', 'Vance Blake', '668', '21-Jan-1975', '822', '03-Jul-1980', '105', 'Cupidatat quia minim', 'Non aliquip molestia', 'Magna quia similique', 'Repellendus Libero', 'Dolor sit qui aut qu', 'Incididunt provident', '513', '922', 'jykocuw@mailinator.com', 'gesopim@mailinator.com', 'Delilah Garner', 'Alexander Pruitt', 'Alexander Pruitt', 'Qui ut laudantium v', '07-May-2017', NULL, NULL, NULL, '2022-08-07 07:44:37', '2022-08-07 09:28:42'),
(4, 'Hop Keith', 'Admin of Chamber', 'Colleen Woodward', 'Yael Boyer', 'Kaye Franks', 'Alice Gomez', 'Ea ad Nam incidunt', 'Consequatur iure si', '16-Jun-2008', '512', '748', 'byjyqar@mailinator.com', 'Laudantium et ab es', 'Ea est eaque enim ma', 'Amela Farley', '2002', 'Quis natus molestiae', '2012', 'In ab non nisi conse', '2011', 'Sed proident offici', '2010', 'Quasi corporis vitae', '26-Sep-2020', 'Minus sed reprehende', 'Kessie Madden', '886', '28-Oct-2011', '359', '17-Jan-2008', '314', 'Non officia distinct', 'Reiciendis molestiae', 'Quisquam in sed quo', 'Ut excepteur do debi', 'Aspernatur lorem rec', 'Amet ipsa soluta c', '949', '657', 'busirah@mailinator.com', 'nogugoky@mailinator.com', 'Lareina Ruiz', 'Cora Farmer', 'Cora Farmer', 'Duis nihil esse quib', '05-Mar-2022', NULL, NULL, '2022-08-07 09:44:50', '2022-08-07 09:43:53', '2022-08-07 09:44:50'),
(5, 'Charde Kirkland', 'Admin of Chamber', 'Lareina Cleveland', 'Nina Carroll', 'Whilemina Green', 'Kiona Collins', 'Sed asperiores eu ei', 'Dolor dignissimos no', '30-Aug-1999', '306', '679', 'xufab@mailinator.com', 'Iste do sed harum co', 'Aut consequat Sequi', 'Todd Mcgowan', '1986', 'Eligendi est rerum', '2000', 'Sed dolor officiis t', '1975', 'Atque sunt distincti', '1980', 'Sed maxime facere es', '06-Mar-2020', 'Ex veniam alias cul', 'Orla Mccoy', '624', '08-Jan-2015', '134', '19-Jun-2021', '368', 'Est laboriosam ea s', 'Repellendus Impedit', 'Asperiores animi in', 'Repudiandae exercita', 'Cumque rerum enim au', 'Blanditiis perferend', '750', '377', 'pezec@mailinator.com', 'boludo@mailinator.com', 'Lavinia Luna', 'Finn Morrow', 'Finn Morrow', 'Doloremque aute sint', '22-Sep-2015', NULL, NULL, NULL, '2022-08-07 09:45:55', '2022-08-07 09:49:40'),
(6, 'Roth Green', 'Head of Chamber', 'Madeson Strong', 'Scarlet Foley', 'Octavius Boyle', 'Judah Morin', 'Aliquid amet eum al', 'Iste et at ut dignis', '22-08-2000', '397', '996', 'kisohe@mailinator.com', 'Non laboriosam volu', 'Et quo non pariatur', 'Savannah Bird', '2005', 'Ad fugit in culpa s', '2016', 'Qui est recusandae', '2016', 'Officia odit in volu', '1972', 'Magnam cupiditate vo', '03-06-2006', 'Harum fuga Vero cup', 'Chiquita Raymond', '461', '27-02-1995', '712', '06-06-2018', '590', 'Nisi non sed aut occ', 'Delectus molestias', 'Ipsum dolorum velit', 'Est sint consequuntu', 'Cupiditate consectet', 'Nemo aut ut in quo f', '854', '117', 'paso@mailinator.com', 'bykaxadely@mailinator.com', 'Charissa Mann', 'Mona Vaughan', 'Id quasi ullamco eli', 'Suscipit iste dolore', '18-08-1982', NULL, NULL, NULL, '2022-08-08 12:18:47', '2022-08-08 12:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `counsel_documents_receiveds`
--

CREATE TABLE `counsel_documents_receiveds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counsel_id` int(11) DEFAULT NULL,
  `received_documents_id` int(11) DEFAULT NULL,
  `received_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_type_id` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counsel_documents_receiveds`
--

INSERT INTO `counsel_documents_receiveds` (`id`, `counsel_id`, `received_documents_id`, `received_documents`, `received_documents_date`, `received_documents_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 2, 14, 'Minus nihil sit magn', '1982-03-14', 1, 0, NULL, NULL, '2022-08-07 09:22:39', '2022-08-07 09:22:39'),
(4, 2, 6, 'testasdf', '2022-09-06', 3, 0, NULL, NULL, '2022-08-07 09:22:39', '2022-08-07 09:22:39'),
(5, 2, 5, 'test adsf erew', '2022-08-24', 2, 0, NULL, NULL, '2022-08-07 09:22:39', '2022-08-07 09:22:39'),
(6, 3, 14, 'Minus nihil sit magn', '1982-03-14', 1, 0, NULL, NULL, '2022-08-07 09:24:41', '2022-08-07 09:24:41'),
(7, 3, 6, 'testasdf', '2022-09-06', 3, 0, NULL, NULL, '2022-08-07 09:24:41', '2022-08-07 09:24:41'),
(8, 3, 15, 'test asfa adf asdfa', '2022-09-07', 1, 0, NULL, NULL, '2022-08-07 09:24:41', '2022-08-07 09:24:41'),
(15, 1, 14, 'Minus nihil sit magn', '1982-03-14', 1, 0, NULL, NULL, '2022-08-07 09:28:42', '2022-08-07 09:28:42'),
(16, 1, 14, 'Minus nihil sit magn', '1982-03-14', 1, 0, NULL, NULL, '2022-08-07 09:28:42', '2022-08-07 09:28:42'),
(17, 1, 6, 'testasdf', '2022-09-06', 3, 0, NULL, NULL, '2022-08-07 09:28:42', '2022-08-07 09:28:42'),
(23, 4, 5, 'Voluptatem adipisic', '1971-01-06', 2, 0, NULL, NULL, '2022-08-07 09:44:44', '2022-08-07 09:44:44'),
(24, 4, 3, 'rtytr', '2022-08-30', 3, 0, NULL, NULL, '2022-08-07 09:44:44', '2022-08-07 09:44:44'),
(25, 4, 12, 'test asdf asdf', '2022-09-06', 3, 0, NULL, NULL, '2022-08-07 09:44:44', '2022-08-07 09:44:44'),
(37, 5, 13, 'Quas cupiditate proi', '2016-09-29', 3, 0, NULL, NULL, '2022-08-07 12:17:05', '2022-08-07 12:17:05'),
(38, 5, 5, 'ee ee e', '2022-09-07', 2, 0, NULL, NULL, '2022-08-07 12:17:05', '2022-08-07 12:17:05'),
(39, 6, 6, 'Fugiat nulla harum', '2017-02-20', 3, 0, NULL, NULL, '2022-08-08 12:18:47', '2022-08-08 12:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `counsel_documents_requireds`
--

CREATE TABLE `counsel_documents_requireds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counsel_id` int(11) DEFAULT NULL,
  `required_wanting_documents_id` int(11) DEFAULT NULL,
  `required_wanting_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_type_id` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counsel_documents_requireds`
--

INSERT INTO `counsel_documents_requireds` (`id`, `counsel_id`, `required_wanting_documents_id`, `required_wanting_documents`, `required_wanting_documents_date`, `required_wanting_documents_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 2, 8, 'Nulla ullam doloremq', '1996-07-21', 2, 0, NULL, NULL, '2022-08-07 09:22:39', '2022-08-07 09:22:39'),
(4, 2, 5, 'ewr adsf', '2022-09-06', 3, 0, NULL, NULL, '2022-08-07 09:22:39', '2022-08-07 09:22:39'),
(5, 2, 6, 'test adf tetr asf', '2022-09-10', 1, 0, NULL, NULL, '2022-08-07 09:22:39', '2022-08-07 09:22:39'),
(6, 3, 8, 'Nulla ullam doloremq', '1996-07-21', 2, 0, NULL, NULL, '2022-08-07 09:24:41', '2022-08-07 09:24:41'),
(7, 3, 5, 'ewr adsf', '2022-09-06', 3, 0, NULL, NULL, '2022-08-07 09:24:41', '2022-08-07 09:24:41'),
(8, 3, 9, 'ereadf asdf af', '2022-08-17', 3, 0, NULL, NULL, '2022-08-07 09:24:41', '2022-08-07 09:24:41'),
(15, 1, 8, 'Nulla ullam doloremq', '1996-07-21', 2, 0, NULL, NULL, '2022-08-07 09:28:42', '2022-08-07 09:28:42'),
(16, 1, 5, 'ewr adsf', '2022-09-06', 3, 0, NULL, NULL, '2022-08-07 09:28:42', '2022-08-07 09:28:42'),
(17, 1, 9, 'etds adffas dadsffa asdf', '2022-09-06', 3, 0, NULL, NULL, '2022-08-07 09:28:42', '2022-08-07 09:28:42'),
(18, 1, 6, 'test adf asdf asdf', '2022-08-31', 1, 0, NULL, NULL, '2022-08-07 09:28:42', '2022-08-07 09:28:42'),
(24, 4, 10, 'Sunt ut molestiae se', '2000-06-13', 1, 0, NULL, NULL, '2022-08-07 09:44:44', '2022-08-07 09:44:44'),
(25, 4, 6, 'test asdfa dsf', '2022-08-29', 2, 0, NULL, NULL, '2022-08-07 09:44:44', '2022-08-07 09:44:44'),
(26, 4, 16, 'test asdf asdf asdf', '2022-09-09', 3, 0, NULL, NULL, '2022-08-07 09:44:44', '2022-08-07 09:44:44'),
(36, 5, 4, 'Enim iusto molestiae', '1999-03-01', 1, 0, NULL, NULL, '2022-08-07 12:17:05', '2022-08-07 12:17:05'),
(37, 5, 3, 'test asdf', '2022-09-07', 3, 0, NULL, NULL, '2022-08-07 12:17:05', '2022-08-07 12:17:05'),
(38, 5, 6, 'ad asf asd', '2022-09-07', 2, 0, NULL, NULL, '2022-08-07 12:17:05', '2022-08-07 12:17:05'),
(39, 6, 6, 'Ut vero dolore labor', '1992-10-01', 2, 0, NULL, NULL, '2022-08-08 12:18:47', '2022-08-08 12:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases`
--

CREATE TABLE `criminal_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_case_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal_issue_id` int(11) DEFAULT NULL,
  `legal_issue_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal_service_id` int(11) DEFAULT NULL,
  `legal_service_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_informant_id` int(11) DEFAULT NULL,
  `complainant_informant_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_id` int(11) DEFAULT NULL,
  `accused_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_favour_of_id` int(11) DEFAULT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_fixed_for_id` int(11) DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `received_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_of_receipt_id` int(11) DEFAULT NULL,
  `referrer_id` int(11) DEFAULT NULL,
  `referrer_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by_id` int(11) DEFAULT NULL,
  `cabinet_id` int(11) DEFAULT NULL,
  `self_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_party_id` int(11) DEFAULT NULL,
  `client_category_id` int(11) DEFAULT NULL,
  `client_subcategory_id` int(11) DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_group_id` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_group_write` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_profession_id` int(11) DEFAULT NULL,
  `client_profession_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_division_id` int(11) DEFAULT NULL,
  `client_divisoin_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_district_id` int(11) DEFAULT NULL,
  `client_district_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_thana_id` int(11) DEFAULT NULL,
  `client_thana_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_representative_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_representative_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_coordinator_tadbirkar_id` int(11) DEFAULT NULL,
  `coordinator_tadbirkar_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_coordinator_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_party_id` int(11) DEFAULT NULL,
  `opposition_category_id` int(11) DEFAULT NULL,
  `opposition_subcategory_id` int(11) DEFAULT NULL,
  `opposition_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_group_id` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_group_write` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_profession_id` int(11) DEFAULT NULL,
  `opposition_profession_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_division_id` int(11) DEFAULT NULL,
  `opposition_divisoin_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_district_id` int(11) DEFAULT NULL,
  `opposition_district_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_thana_id` int(11) DEFAULT NULL,
  `opposition_thana_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_representative_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_representative_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_coordinator_tadbirkar_id` int(11) DEFAULT NULL,
  `opposition_coordinator_tadbirkar_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_coordinator_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lawyer_advocate_id` int(11) DEFAULT NULL,
  `lawyer_advocate_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_lawyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lawyers_remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_division_id` int(11) DEFAULT NULL,
  `case_infos_district_id` int(11) DEFAULT NULL,
  `case_infos_thana_id` int(11) DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `case_subcategory_id` int(11) DEFAULT NULL,
  `case_infos_case_title_id` int(11) DEFAULT NULL,
  `case_infos_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_case_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_court_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_court_short_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_short_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_sub_seq_case_title_id` int(11) DEFAULT NULL,
  `case_infos_sub_seq_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_sub_seq_case_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_sub_seq_court_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_sub_seq_court_short_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_seq_court_short_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `law_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `law_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `matter_id` int(11) DEFAULT NULL,
  `matter_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `case_infos_complainant_informant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_informant_representative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_infos_accused_representative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prosecution_witness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defense_witness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_day_notes_id` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_remarks_or_steps_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases`
--

INSERT INTO `criminal_cases` (`id`, `created_case_id`, `client`, `legal_issue_id`, `legal_issue_write`, `legal_service_id`, `legal_service_write`, `complainant_informant_id`, `complainant_informant_write`, `accused_id`, `accused_write`, `in_favour_of_id`, `case_no`, `name_of_the_court_id`, `next_date`, `updated_fixed_for_id`, `next_date_fixed_id`, `received_date`, `mode_of_receipt_id`, `referrer_id`, `referrer_write`, `referrer_details`, `received_by_id`, `cabinet_id`, `self_number`, `received_by_write`, `client_party_id`, `client_category_id`, `client_subcategory_id`, `client_id`, `client_name_write`, `client_business_name`, `client_group_id`, `client_group_write`, `client_address`, `client_mobile`, `client_email`, `client_profession_id`, `client_profession_write`, `client_division_id`, `client_divisoin_write`, `client_district_id`, `client_district_write`, `client_thana_id`, `client_thana_write`, `client_representative_name`, `client_representative_details`, `client_coordinator_tadbirkar_id`, `coordinator_tadbirkar_write`, `client_coordinator_details`, `opposition_party_id`, `opposition_category_id`, `opposition_subcategory_id`, `opposition_id`, `opposition_write`, `opposition_business_name`, `opposition_group_id`, `opposition_group_write`, `opposition_address`, `opposition_mobile`, `opposition_email`, `opposition_profession_id`, `opposition_profession_write`, `opposition_division_id`, `opposition_divisoin_write`, `opposition_district_id`, `opposition_district_write`, `opposition_thana_id`, `opposition_thana_write`, `opposition_representative_name`, `opposition_representative_details`, `opposition_coordinator_tadbirkar_id`, `opposition_coordinator_tadbirkar_write`, `opposition_coordinator_details`, `lawyer_advocate_id`, `lawyer_advocate_write`, `assigned_lawyer_id`, `lawyers_remarks`, `received_documents_id`, `received_documents`, `received_documents_date`, `required_wanting_documents_id`, `required_wanting_documents`, `required_wanting_documents_date`, `case_infos_division_id`, `case_infos_district_id`, `case_infos_thana_id`, `case_category_id`, `case_subcategory_id`, `case_infos_case_title_id`, `case_infos_case_no`, `case_infos_case_year`, `case_infos_court_id`, `case_infos_court_short_id`, `court_short_write`, `case_infos_sub_seq_case_title_id`, `case_infos_sub_seq_case_no`, `case_infos_sub_seq_case_year`, `case_infos_sub_seq_court_id`, `case_infos_sub_seq_court_short_id`, `sub_seq_court_short_write`, `law_id`, `law_write`, `section_id`, `section_write`, `date_of_filing`, `case_status_id`, `matter_id`, `matter_write`, `case_type_id`, `case_infos_complainant_informant_name`, `complainant_informant_representative`, `case_infos_accused_name`, `case_infos_accused_representative`, `prosecution_witness`, `defense_witness`, `updated_day_notes_id`, `updated_remarks_or_steps_taken`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'LCR-01', 'Premier Cement Mills Limited', 1, NULL, 1, NULL, NULL, 'Premier Cement Mills Limited', NULL, 'Mizanur Rahman', 6, 'BLA(wages)- 194/2021', NULL, '2022-05-28', NULL, NULL, '2022-05-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Premier Cement Mills Limited', 'G M Fazle Rabbi', 'Mizanur Rahman', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-28 06:10:38', '2022-05-28 06:12:32'),
(2, 'LCR-02', 'Premier Cement Mills Limited', 1, NULL, 1, NULL, NULL, 'Mizanur Rahman', NULL, 'Premier Cement Mills Limited', 6, 'BLA(wages)- 194/2021', NULL, '2022-05-28', NULL, NULL, '2022-05-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-28 06:15:40', '2022-06-07 15:39:42'),
(3, 'LCR-03', 'Partex Agro Limited', 3, NULL, 3, NULL, NULL, 'Partex Agro Limited', NULL, NULL, 1, NULL, NULL, '2021-08-22', NULL, NULL, '2021-03-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-28 06:30:12', '2022-06-07 15:39:47'),
(4, 'LCR-04', 'Partex Cables Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '428/20214', NULL, '2022-05-28', NULL, NULL, '2022-05-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-28 06:32:11', '2022-06-07 15:39:52'),
(5, 'LCR-05', 'Partex Agro Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-28', NULL, NULL, '2022-05-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-28 06:33:39', '2022-06-07 15:40:03'),
(6, 'LCR-06', 'Abdul Kaiyum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'The State & Others', NULL, 'AT Case No.-426/2018', 13, '2022-08-03', NULL, 16, '2022-04-03', 2, NULL, 'Adv. Foisal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, NULL, 9, NULL, 8, '426', '2018', NULL, NULL, '', 8, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Abdul Quaiyum', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-28 06:34:08', '2022-06-07 05:20:49'),
(7, 'LCR-07', 'Partex PVC Industries Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-28', NULL, NULL, '2022-05-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-28 06:35:49', '2022-06-07 15:39:57'),
(8, 'LCR-08', 'Partex PVC Industries Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-11', NULL, NULL, '2022-08-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-28 06:37:24', '2022-06-07 05:20:39'),
(9, 'LCR-09', 'Premier Cement Mills Limited', 3, NULL, 1, NULL, NULL, 'Mizanur Rahman', NULL, 'Premier Cement Mills Limited', 6, 'BLA(wages)- 194/2021', NULL, '2022-08-02', 5, 5, '2021-09-26', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, NULL, 'Premier Cement Mills Limited', 'Cement Manufacturing and Marketing', NULL, NULL, 'T.K Bhaban, Karwan Bazar, Dhaka', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'G M Fazle Rabbi', 'Deputy Manager, Administration and Legal Affairs, PCML\r\nContact: 0100000000', 3, NULL, 'CFO, PCML', 5, 1, 13, NULL, 'Mizanur Rahman', 'Abc', NULL, NULL, 'Abc', '01000000000', 'abc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc', 'abc', NULL, NULL, 'abc', NULL, 'LEX CASTLE', NULL, NULL, '', ', ', '', '', ', ', '', 3, 20, 176, 1, NULL, 6, '194', '2021', NULL, 'DLC-1', '', NULL, '', '', NULL, NULL, '', NULL, '', '132(1)', '', '12/9/2021', NULL, 6, NULL, 13, 'Mizanur Rahman', '', 'Premier Cement Mills Limited', 'G M Fazle Rabbi', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-05-28 06:38:22', '2022-08-13 20:02:51'),
(10, 'LCR-010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-29', NULL, NULL, '2022-05-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Charge Form, Complaint, Investigation Report, Legal Notice by 1st Party, Legal Notice by 2nd Party', ', ', '2022-05-25, ', NULL, ', ', ', ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-29 10:45:24', '2022-05-30 03:51:00'),
(11, 'LCR-011', 'Partex PVC Industries Limited', 1, NULL, NULL, 'to file case', NULL, NULL, NULL, 'Khaza Md. Ali Azgor', NULL, 'CR Case No. 428/2019', NULL, '2022-07-13', NULL, 6, '2022-04-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 3, 'Star Particle Board Mills Limited', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 138, NULL, NULL, NULL, NULL, 'Golam Regwanul Haque', NULL, 6, 3, 7, 'Smith Aminur', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 8, NULL, 57, NULL, NULL, 'hhhhhhhhhhhhhhhh', NULL, NULL, 'gggggggggggggggggggggggg', 5, NULL, 'Md. Johirul Islam, Md. Zohurul Haque, Tamzid Islam none', NULL, 'Charge Sheet, Investigation Report', 'Complaint, written statement, investigating Report, Legal Notice, sdgsdgsdg, , ', ', 2022-05-03, 2022-04-06, 2022-03-10, 2022-04-07, 2022-05-03, 2021-09-09, ', 'Charge Form, Letter by 2nd Party', 'Letter by 1st party, ', ', 2022-05-28, 2022-05-19, ', 3, 21, 183, 7, 12, 1, '594', '2021', 'Metropolitan Magistrate Court No. 25', NULL, '', 1, '17809', '2022', '3rd Joint  Metro Session Court', NULL, 'JMS-3', NULL, 'Penal Code, 1860, CrPC, 1860', '138, 138 and 140, 144, 33', '420 and 506, 435, 450', '9/3/2022', NULL, NULL, NULL, NULL, 'Star Particle Boards Mills Limited', 'Md. Khondakar Ayenul Haque', 'Abul Kalam Azad', 'test', 'test', 'test', 'Submitted Complaint Hazira, ', NULL, 1, NULL, NULL, '2022-05-30 05:49:36', '2022-06-05 10:52:09'),
(12, 'LCR-012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-09', NULL, 7, '2022-05-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Golam Regwanul Haque', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, 'Md. Zohurul Haque', NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, 157, 7, NULL, 6, '60', '2021', '3rd Labour Court', 'DLC-3', '', 6, '', '', NULL, NULL, '', NULL, 'Bangladesh Labour Act, 2006', NULL, '132(1)and132 (5)', '29/8/2021', 23, 4, NULL, 3, 'Mohammad Ainal Hossain', '', 'Daily Banik Barta and Others', '', NULL, NULL, 'Completed case filing successfully, ', NULL, 1, NULL, NULL, '2022-05-30 06:54:01', '2022-05-31 15:56:44'),
(13, 'LCR-013', 'Shah Alam', NULL, NULL, 3, NULL, NULL, NULL, NULL, 'RDRS', 5, NULL, NULL, '2022-10-16', NULL, NULL, '2022-05-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, NULL, 'Md. Shah Alam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', 'Md. Zohurul Haque', NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, 158, NULL, NULL, 7, '248', '2021', '3rd Labour Court', 'DLC-3', '', NULL, '', '', NULL, NULL, '', NULL, '', '33', '', NULL, NULL, NULL, 'Reinstitution of Service', NULL, 'Shah Alam', '', 'RDRS Bangladesh', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-05-31 01:21:26', '2022-08-11 19:53:13'),
(14, 'LCR-014', 'Mohammad Ainal Hossain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13', 7, 7, '2022-05-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 13, NULL, 'Mohammad Ainal Hossain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 3, 7, NULL, 'Daily Banik Barta and Others', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, 157, NULL, NULL, 6, '60', '2021', '3rd Labour Court', 'DLC-3', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '132(1)and132 (5)', '29-8-2021', NULL, 6, NULL, NULL, 'Mohammad Ainal Hossain', '', 'Daily Banik Barta and Others', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-05-31 15:52:05', '2022-08-11 19:54:25'),
(15, 'LCR-015', 'Star Particle Boards Mills Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-01', NULL, NULL, '2022-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 3, 7, 'Star Particle Board Mills Limited', '', 'test', NULL, NULL, 'test', 'test', 'test', 2, NULL, 6, NULL, 49, NULL, 382, NULL, 'Md. Khondokar Ayenul Haque', NULL, NULL, NULL, 'v', 1, 3, 7, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', 2, 16, 104, 7, 12, 1, '999', '2019', 'Metropolitan Magistrate Court No. 22', NULL, '', NULL, '', '', NULL, NULL, '', NULL, 'Penal Code, 1860', NULL, '420 and 506', '14/6/2022', 50, 3, NULL, 8, 'Star Particle Boards Mills Limited', 'Md. Khondakar Ayenul Haque', 'Mizanur Rahamn', 'test', 'test', 'test', NULL, NULL, 1, NULL, NULL, '2022-06-01 05:21:34', '2022-06-01 09:15:54'),
(16, 'LCR-016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-26', NULL, 15, '2022-06-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 3, NULL, 'Md. Siraj Mia', 'Sonar Modina Electric', NULL, NULL, NULL, NULL, NULL, 1, NULL, 8, NULL, 66, NULL, 513, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, 'Md. Johirul Islam, Tamzid Islam Tamzid', NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, 176, NULL, NULL, 1, '1341', '2021', 'Metropolitan Magistrate Court No. 06', 'MM-06', '', NULL, '', '', NULL, NULL, '', NULL, 'The Negotiable Instrument Act, 1881', NULL, '138', '2-12-2021', NULL, 5, NULL, NULL, 'Partex Cables Limited', 'Md. Khondakar Ayenul Haque', 'Md. Siraj Mia', '', NULL, NULL, 'Completed case filing successfully, ', NULL, 0, NULL, NULL, '2022-06-05 10:00:59', '2022-08-10 16:02:23'),
(17, 'LCR-017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-26', NULL, 10, '2022-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, NULL, 'Mohammad Alimuzzaman Milton', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 159, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 7, NULL, 'Giant Agro Processing Ltd', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 178, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, 178, NULL, NULL, 1, '715', '2021', 'Metropolitan Magistrate Court No. 18', 'MM-18', '', 4, '1987', '2022', '4th Joint  Metro Session Court', 'JMS-4', '', NULL, 'The Negotiable Instrument Act, 1881', '138', '', NULL, NULL, NULL, NULL, 1, 'Giant Agro Processing Ltd', 'Nazrul Islam Bhuiyan', 'Mohammad Alimuzzaman Milton', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 13:28:59', '2022-08-10 17:02:50'),
(18, 'LCR-018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-16', NULL, 11, '2022-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, 'Md. Joynul Abedin', NULL, NULL, NULL, NULL, '01724313348', NULL, NULL, NULL, 3, NULL, 27, NULL, 232, NULL, NULL, NULL, NULL, NULL, NULL, 7, 3, 7, NULL, 'The ACME Laboratories Ltd and Others', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, NULL, 9, 14, 6, '78', '2018', '3rd Labour Court', 'DLC-3', '', NULL, '', '', NULL, NULL, '', NULL, '', '132(1)', '', NULL, 22, 3, NULL, 3, 'Md. Joynul Abedin', '', 'The ACME Laboratories Ltd and Others', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 13:49:55', '2022-08-10 17:02:22'),
(19, 'LCR-019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-14', NULL, 7, '2022-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 3, 7, NULL, 'Gentle Park and Others', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 136, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 13, NULL, 'Saleh Ahmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, NULL, NULL, NULL, 6, '528', '2020', '1st Labour Court', 'DLC-1', '', NULL, '', '', NULL, NULL, '', NULL, '', '132(1)', '', NULL, NULL, 6, NULL, NULL, 'Saleh Ahmed', '', 'Gentle Park and Others', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 14:10:46', '2022-08-11 19:20:00'),
(20, 'LCR-020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-07', NULL, 8, '2022-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, 149, 10, NULL, 9, '318', '2021', '4th Joint  District Judge Court', 'JDJC-4', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '10-10-2021', NULL, NULL, NULL, 2, 'Md. Nasir Uddin and Others', '', 'Munsi Sanwar Hossain and Others', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 14:49:09', '2022-08-10 17:01:16'),
(21, 'LCR-021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-12', NULL, NULL, '2022-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', NULL, NULL, NULL, 7, 7, 11, '471', '2020', 'Nari O Shishu Nirjaton Damon Tribunal No. 09', 'NSNDT-9', '', NULL, '', '', NULL, NULL, '', NULL, 'Nari O Shishu Nirjaton Damon Ain, 2000', NULL, '9(3) and 30', NULL, NULL, NULL, NULL, 1, 'Mst. Salma Akter', '', 'Md. Jewel', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 15:04:13', '2022-08-10 17:00:31'),
(22, 'LCR-022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-07', NULL, 8, '2022-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', NULL, NULL, NULL, NULL, NULL, 12, '03', '2022', NULL, NULL, 'SAJ (Dhamrai)', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, 'Land', NULL, 'Md. Delower Hossain', '', '', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 15:58:03', '2022-08-11 19:49:11'),
(23, 'LCR-023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13', 16, 16, '2022-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, ', ', ', ', NULL, ', ', ', ', 3, 20, NULL, NULL, NULL, 8, '426', '2018', NULL, 'DAT-1', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Abdul Quaiyum', '', 'The State and Others', '', NULL, NULL, ', TP reason: Client has not provided relevant documents to the  Lawyer  for  hearing.', NULL, 0, NULL, NULL, '2022-06-08 16:29:30', '2022-08-10 16:56:14'),
(24, 'LCR-024', 'Partex PVC Industries Limited', 3, NULL, 1, NULL, 2, NULL, 1, NULL, 6, '999', 9, '2022-06-22', NULL, 16, '2022-06-22', 4, 3, NULL, 'test', 1, NULL, NULL, NULL, 5, 3, 7, 'Star Particle Board Mills Limited', '', 'test', NULL, NULL, 'test', '01724313348', 'test', 1, NULL, 5, NULL, 43, NULL, 333, NULL, 'Golam Regwanul Haque', 'ihihkmmlm', 1, NULL, 'teeeessssttt', 3, 2, 12, 'Smith Aminur', '', 'M/S. Foam Corner', NULL, NULL, 'ttteeeeesssst', 'test', 'test', 1, NULL, 4, NULL, 33, NULL, 270, NULL, 'test', 'tttteeeesssstttt', 1, NULL, 'tttttteeeeessssttt', NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-22 08:31:28', '2022-06-22 08:45:19'),
(25, 'LCR-025', '65465456546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-26', NULL, NULL, '2022-06-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, 1, '2125245', '2021', 'Metropolitan Magistrate Court No. 18', NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-26 15:22:22', '2022-06-26 16:03:34'),
(26, 'LCR-026', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-26', NULL, NULL, '2022-06-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, 1, '20333', '2018', NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-26 16:08:08', '2022-06-26 16:37:02'),
(27, 'LCR-027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-30', NULL, 3, '2022-06-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, 1, '787878778', '2025', 'Metropolitan Magistrate Court No. 20', 'MM-20', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-06-26 16:44:46', '2022-06-26 16:49:46'),
(28, 'LCR-00028', 'hluyhhkhkhnjklijklmj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-28', NULL, NULL, '2022-06-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-28 11:22:32', '2022-06-28 11:41:31'),
(29, 'LCR-00029', 'jjjjjjjjjjjjjjjjjjjjjjjjjj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-28', NULL, NULL, '2022-06-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-28 11:50:08', '2022-06-28 11:50:23'),
(30, 'LCR-00030', 'Partex PVC Industries Limited', 3, NULL, 3, NULL, NULL, 'Partex PVC Industries Limited', NULL, 'Md. Sumon Ali', 1, 'CR Case No. 3220/2017', NULL, '2018-12-23', NULL, 4, '2021-03-08', 2, NULL, 'Delower Hossain', 'Business Controller', NULL, 2, '04', NULL, 1, 3, NULL, NULL, 'Partex PVC Industries Limited', NULL, NULL, NULL, 'Western Shanta Tower, Tejgaon, Dhaka-1208', NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Khondokar Ayenul Haque', 'Md. Khondokar Ayenul Haque, Credit Recovery Officer Accounts and Finance, Partex Srtar Group,', NULL, 'Md. Khondokar Ayenul Haque', NULL, 4, 2, NULL, NULL, 'Md. Sumon Ali', 'M/S. Lovely Traders', NULL, NULL, 'M/S. Lovely Traders, Pabna Road, Alobagh (in front of Alta Clinic), P.O.- Eswardi, P.S.- Eswardi, district- Pabna.', NULL, NULL, 1, NULL, 6, NULL, 51, NULL, 391, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 'Md. Johirul Islam', NULL, '', ', ', '', '', ', ', '', 3, 20, 175, 1, NULL, 1, '3220', '2017', 'Metropolitan Magistrate Court No. 25', 'MM-25', '', 4, '11475', '2019', '3rd Joint  Metro Session Court', 'JMS-3', '', 'The Negotiable Instrument Act, 1881', '', '138', '', '31-12-2017', 22, NULL, 'Recovery of Money', 1, 'Partex PVC Industries Limited', 'Md. Khondakar Ayenul Haque', 'Md. Sumon Ali', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-06-28 16:22:33', '2022-06-29 14:34:18'),
(31, 'LCR-00031', 'Partex PVC Industries Limited', 3, NULL, 1, NULL, NULL, 'Partex PVC Industries Limited', NULL, 'Md. Tarek Rahman', 1, 'CR Case No. 311/2017', NULL, '2022-07-02', NULL, NULL, '2022-06-29', 2, NULL, 'Delower Hossain', 'Business Controller', NULL, 2, '04', NULL, 1, 3, NULL, NULL, 'Partex PVC Industries Limited', NULL, NULL, NULL, 'Western Shanta Tower, Tejgaon, Dhaka-1208', NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Khondokar Ayenul Haque', 'Md. Khondokar Ayenul Haque, Credit Recovery Officer Accounts and Finance, Partex Srtar Group.', NULL, 'Md. Khondokar Ayenul Haque', NULL, 4, 2, NULL, NULL, 'Md. Tarek Rahman', NULL, NULL, NULL, 'Tarek Plastic Door, Dream Plaza, 110, Sen Para Parbata, Begum Rokeya Sarani, Mirpur Dhaka.', NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 158, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 'Md. Johirul Islam, Md. Nasir', NULL, '', ', ', '', '', ', ', '', 3, 20, 175, NULL, NULL, NULL, '311', '2017', NULL, 'MM-25', '', NULL, '13371', '2018', '6th Joint  Metro Session Court', 'JMS-6', '', NULL, 'The Negotiable Instrument Act, 1881', '138', '', '19-2-2017', NULL, 5, NULL, NULL, 'Partex PVC Industries Limited', 'Md. Khondakar Ayenul Haque', 'Md. Tarek Rahman', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-06-29 09:06:14', '2022-07-05 07:15:13'),
(32, 'LCR-00032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-25', 4, 6, '2022-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, NULL, NULL, 'Partex Laminates Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 3, 7, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, NULL, '170001', '2021', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', '30-6-2022', NULL, NULL, NULL, NULL, 'Johirui Islam', '', 'TEST 2', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-07-02 05:29:59', '2022-07-06 11:15:38'),
(33, 'LCR-00033', 'Jack Smith', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-04', NULL, NULL, '2022-07-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', 2, 16, NULL, NULL, NULL, NULL, '454525825', '2000', NULL, NULL, '', NULL, '', '', NULL, NULL, '', 'The Code of Criminal Procedure, 1860', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'test765', '', 'Johirul Islam', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-04 05:46:07', '2022-07-06 11:15:46'),
(34, 'LCR-00034', 'Partex Agro Limited', 2, NULL, 1, NULL, NULL, 'Partex Agro Limited', NULL, 'Md. Ashfakur Rahman', 1, 'CR Case No. 1544/2015', NULL, '2022-09-14', NULL, NULL, '2022-07-05', 2, NULL, 'Delower Hossain', NULL, NULL, 2, '04', 'Md. Johirul Islam', 1, 3, 7, 'Partex Agro Limited', '', NULL, NULL, NULL, 'Shanta Western Tower, Level- 13, Bir Uttom Mir Shawakot Sarak, 186 Tejgaon,', NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Faisal Mahmud', 'Regulatory Executive, Partex Agro Limited', NULL, 'Md. Faisal Mahmud', NULL, 4, 2, 3, NULL, 'Md. Ashfakur Rahman', NULL, NULL, NULL, 'Village- Dodsara Road,P.O.- Kortchandpur, P.S.- Kortchandpur, Dist.- Jhenaidah', NULL, NULL, 1, NULL, 4, 'Khulna Barishal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 'Md. Johirul Islam, Md. Nasir null null', NULL, '', ', ', '', '', ', ', '', 3, 20, 175, NULL, NULL, NULL, '1544', '2015', NULL, '', '', NULL, '23000', '2019', '2nd Joint  Metro Session Court', 'JMS-2', '', NULL, 'The Negotiable Instrument Act, 1881', '138', '', '23-7-2015', 59, NULL, NULL, NULL, 'Partex Agro Limited', 'Md. Faisal Mahmud', 'Md. Ashfakur Rahman', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-07-05 05:32:00', '2022-07-06 11:36:12'),
(35, 'LCR-00035', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-05', NULL, NULL, '2022-07-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TEST', 3, 'TEST', 20, 'Sylhet', 134, 'Khulshi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Charge Form, Letter by 2nd Party, Letter by 1st Party', 'Complaint, Cgarge sheet, investigating Report, ', '2022-05-31, 2022-07-07, 2022-06-29', 'Written Statement, Legal Notice by 1st Party', 'Letter by 1st party, Letter by 2nd party, ', '2022-07-19, 2022-07-29', NULL, NULL, NULL, NULL, NULL, NULL, '200000', '2022', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', '26-7-2022', NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-05 07:13:10', '2022-07-06 11:15:32'),
(36, 'LCR-00036', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-06', NULL, NULL, '2022-07-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, NULL, '3333', '2023', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Masud Rana', '', 'Rafiqul Islam', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-06 11:12:24', '2022-07-06 11:15:26'),
(37, 'LCR-00037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-06', NULL, NULL, '2022-07-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, NULL, '4444', '2023', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Rafiqul Islam', '', 'Masud Rana', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-06 11:13:21', '2022-07-06 11:15:21'),
(38, 'LCR-00038', 'Saifuddin Muhammed Tariq', NULL, NULL, NULL, NULL, NULL, 'Salahuddin Mohammad Faruq', NULL, 'Saifuddin Muhammed Tariq and others', 6, 'Civil Suit No. 234/2022', NULL, '2022-07-28', 8, 8, '2022-07-06', 4, NULL, 'Jakir Hossain', 'House- 366, Modhubag, Shantinagar-1217, Hatirjheel, Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 'Md. null Nasir', NULL, '', ', ', '', '', ', ', '', 3, 20, NULL, 1, NULL, 1, '234', '2022', '1st Joint  Metro Session Court', 'JMS-1', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-07-06 15:45:46', '2022-07-06 17:29:38'),
(39, 'LCR-00039', 'Saifuddin Muhammed Tariq', NULL, NULL, NULL, NULL, NULL, 'Salahuddin Mohammad Faruq', NULL, 'Saifuddin Muhammed Tariq and others', 6, 'Civil Suit No. 234/2022', NULL, '2022-11-17', 8, 7, '2022-07-06', 4, NULL, 'Jakir Hossain', 'House-366, Modhubag, Shantinagar-1217, Hatirjheel, Dhaka.', NULL, NULL, NULL, NULL, 6, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, 'Prof', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, '', ', ', '', '', ', ', '', 3, 20, NULL, 1, NULL, 1, '234', '2022', '1st Joint  Metro Session Court', 'JMS-1', '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', '3-4-2022', 13, NULL, NULL, 13, 'Salahuddin Mohammad Faruq', '', 'Saifuddin Muhammed Tariq and others', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-07-06 17:59:13', '2022-08-10 16:53:29'),
(40, 'LCR-00040', 'Partex PVC Industries Limited', 2, NULL, 1, NULL, NULL, 'Partex PVC Industries Limited', NULL, 'Md. Aminur Rahman', 1, 'CR Case No. 594/2016', NULL, '2017-10-03', 4, 6, '2022-07-07', 2, NULL, 'Delower Hossain', 'Delower Hossain, Business Controller', NULL, 2, '04', 'Md. Johirul Islam', 1, 3, 7, NULL, 'Partex PVC Industries Limited', 'Test', NULL, NULL, 'Shanta Western Tower, Level-13, Bir Uttam Mir Showkot Sarak. !86 Tejgaon I/A, Dhaka-1208', '01700000000', 'Test@gmail.com', 1, NULL, 3, 'Gazipr', 20, 'Tongi', 160, 'Tongi', 'Md. Shofiqul Islam', 'Md. Shofiqul Islam, Senior Officer, Sales, PPIL', NULL, 'Md. Shofiqul Islam', 'Md. Shofiqul Islam, Senior Officer, Sales, PPIL', 4, 2, 3, NULL, 'Md. Aminur Rahman', 'Sun V Steal', NULL, NULL, 'Md. Aminur Rahman, Son of Late Habibur Rahman, Permanent Address: Katnar Para, Santahar Road, Bagura Sadar, Bagura Pouroshova, Bagura.', '01800000000', 'Nothing@gmail.com', 1, NULL, 6, 'Test Zone', NULL, 'Test Area', NULL, 'Test Branch', 'Md. Aminur Rahman', 'Md. Aminur Rahman, Son of Late Habibur Rahman, Permanent Address: Katnar Para, Santahar Road, Bagura Sadar, Bagura Pouroshova, Bagura.', NULL, 'Md. Aminur Rahman', 'Md. Aminur Rahman, Son of Late Habibur Rahman, Permanent Address: Katnar Para, Santahar Road, Bagura Sadar, Bagura Pouroshova, Bagura.', 2, NULL, 'Md. Johirul Islam', 'The incident of rape took place on 04.03.2021 but the plaintiff made GD on 06.03.2021 i.e. 3 days after the incident.', 'Legal Notice by 1st Party, Petition, Plaint, Written Statement', 'NID Card, investigating Report, Complaint, investigating Report, Nothing TEst, ', '2016-04-06, 2022-07-29, 2022-07-27, 2022-07-14, 2022-07-01', 'Charge Form, Complaint, Investigation Report, Legal Notice by 1st Party', 'Letter by 1st party, Test Matter, Letter by 2nd  party, Letter by 1st party, Letter by 1st party, ', '2022-08-16, 2022-08-17, 2022-08-10, 2022-08-25, 2022-08-24', 3, 20, 160, 1, NULL, 1, '594', '2016', 'Metropolitan Magistrate Court No. 25', 'MM-25', '', 4, '10606', '2016', '1st Joint  Metro Session Court', 'JMS-1', '', NULL, 'The Negotiable Instrument Act, 1881', NULL, '138', '7-4-2016', NULL, NULL, 'Recovery of Money', 1, 'Partex PVC Industries Limited', 'Md. Shofiqul Islam', 'Md. Aminur Rahamn', 'test', 'test', 'test', ', ', NULL, 0, NULL, NULL, '2022-07-07 07:20:40', '2022-07-07 10:17:36'),
(41, 'LCR-00041', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CR-571/2022', 3, '2022-07-27', NULL, NULL, '2022-06-07', NULL, NULL, 'Md. Asha', 'Court Staff, Chuadanga Court', NULL, NULL, NULL, NULL, 4, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '', ', ', '', '', ', ', '', 3, 20, NULL, 1, NULL, 2, '581', '2022', 'Metropolitan Magistrate Court No. 25', 'MM-25', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, 5, NULL, 1, '', '', '', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-07-16 15:08:00', '2022-08-13 20:38:47'),
(48, 'LCR-00042', 'Partex Laminates Limited', 2, NULL, 3, NULL, NULL, 'Partex Laminates Limited', NULL, 'Abdullah Al Mamun', 1, 'CR Case No. 160/2018', NULL, '2022-08-14', 10, 11, '2022-07-17', 2, NULL, 'Delower Hossain', 'Business Controller', NULL, 2, '04', 'Md. Niamul Kabir', 1, 3, NULL, NULL, 'Partex Laminates Limited', NULL, NULL, NULL, 'Shanta Western Tower, Level-13, Bir Uttam Mir Shawkot Sarak, 186, Tejgaon I/A, Dhaka-1208.', '01700000000', 'Test@gmail.com', 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Khondokar Ayenul Haque', 'Md. Khondokar Ayenul Haque, Officer Credit Recovery', NULL, 'Md. Khondokar Ayenul Haque', 'Officer Credit Recovery, PSG', 4, 2, NULL, NULL, 'Abdullah Al Mamun', NULL, NULL, NULL, 'Villa- Dakkkin Chandipur (Baro Molla Bari), Post- Dash Para, P.S.- Ramgonj, Dist- Lakshmipur', '01800000000', 'Tes 2@gmail.com', 1, NULL, 2, NULL, 10, NULL, 79, NULL, 'test', NULL, NULL, NULL, NULL, 2, NULL, 'Md. Johirul Islam, Md. null Nasir', NULL, '', ', ', '', '', ', ', '', 3, 20, 175, 1, NULL, 1, '160', '2018', 'Metropolitan Magistrate Court No. 06', 'MM-06', '', 4, '19240', '2018', '7th Joint  Metro Session Court', 'JMS-7', '', NULL, '', '138', '', '12-2-2017', 22, NULL, 'Recovery of Money', 1, 'Partex Laminates Limited', 'Md. Khondakar Ayenul Haque', 'Abdullah Al Mamun', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-07-17 06:30:06', '2022-07-18 15:33:54'),
(49, 'LCR-00043', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17', NULL, NULL, '2022-07-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, NULL, 14, NULL, 93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, NULL, '1331', '2023', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-17 06:53:34', '2022-07-17 06:55:14'),
(50, 'LCR-00044', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17', NULL, NULL, '2022-07-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, 1, '13951', '2018', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-17 08:16:11', '2022-07-17 08:16:43'),
(51, 'LCR-00045', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17', NULL, NULL, '2022-07-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, 1, '1392', '2017', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-17 08:30:43', '2022-07-17 09:58:19'),
(52, 'LCR-00046', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17', NULL, NULL, '2022-07-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Partex Agro Limited', 'Premier Cement Mills Limited, Md. Joynul Abedin, Mohammad Alimuzzaman Milton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mizanur Rahman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ', ', '', '', ', ', '', NULL, NULL, NULL, NULL, NULL, NULL, '3006', '2022', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-17 15:05:35', '2022-07-18 06:21:37'),
(53, 'LCR-00047', 'Star Particle Board Mills Limited', 2, NULL, 3, NULL, NULL, 'Star Particle Board Mills Limited', NULL, 'Mr. Sajidur Rahaman', 1, 'CR Case No.377/21', 3, '2022-07-21', NULL, 6, '2022-07-19', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 7, 'Star Particle Board Mills Limited', '', NULL, NULL, NULL, 'Shanta Western Tower, Level 13\r\nTejgaon Industrial Police Dhaka-1208', '01700713429', NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Mizanur Rahaman', NULL, NULL, NULL, NULL, 4, 2, 3, NULL, 'Mr. Sajidur Rahaman', NULL, NULL, NULL, 'House No. 104/103, Brown Compound , Barisal sadar, Barisal', NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 175, 1, NULL, 1, '377', '2021', 'Metropolitan Magistrate Court No. 25', 'MM-25', '', NULL, '', '', NULL, '', '', 'The Negotiable Instrument Act, 1881', '', '138', '', '24-3-2021', 6, NULL, NULL, 1, 'Star Particle Board Mills Limited', 'Md. Mizanur Rahaman', 'Mr. Sajidur Rahaman', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-07-19 16:42:37', '2022-07-19 16:52:10'),
(54, 'LCR-00048', 'Partex Agro Limited', 2, NULL, 3, NULL, 2, NULL, NULL, 'Md. Ariful Haque Biswas', 1, 'CR Case No - 1580/2015', 3, '2022-07-24', NULL, 12, '2022-07-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 8, 'Partex Agro Limited', '', NULL, NULL, NULL, 'Shanta western tower , Level 13 , Bir Uttom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 175, 1, NULL, 1, '1580', '2015', 'Metropolitan Magistrate Court No. 25', 'MM-25', '', 4, '12959', '2017', '7th Joint  Metro Session Court', 'JMS-7', '', NULL, '', '138', '', '30-7-2015', NULL, NULL, NULL, 1, 'Partex Agro Limited', 'Md. Mizanur Rahaman', 'Md. Ariful Haque Biswas', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-19 17:11:43', '2022-08-10 15:29:11'),
(55, 'LCR-00049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-09', NULL, 12, '2022-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, 7, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 'Test Zone', 1, 'Test Area', 5, 'Test  Branch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Test Zone 2', 16, 'Test Area 2', 107, 'Test Branch 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '546522', '2022', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, 55, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-21 10:43:54', '2022-07-23 11:49:33'),
(56, 'LCR-00050', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-30', NULL, 16, '2022-07-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 175, NULL, NULL, NULL, '20002', '2021', 'Metropolitan Magistrate Court No. 06', 'MM-06', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, 54, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-23 11:56:54', '2022-07-25 15:09:35');
INSERT INTO `criminal_cases` (`id`, `created_case_id`, `client`, `legal_issue_id`, `legal_issue_write`, `legal_service_id`, `legal_service_write`, `complainant_informant_id`, `complainant_informant_write`, `accused_id`, `accused_write`, `in_favour_of_id`, `case_no`, `name_of_the_court_id`, `next_date`, `updated_fixed_for_id`, `next_date_fixed_id`, `received_date`, `mode_of_receipt_id`, `referrer_id`, `referrer_write`, `referrer_details`, `received_by_id`, `cabinet_id`, `self_number`, `received_by_write`, `client_party_id`, `client_category_id`, `client_subcategory_id`, `client_id`, `client_name_write`, `client_business_name`, `client_group_id`, `client_group_write`, `client_address`, `client_mobile`, `client_email`, `client_profession_id`, `client_profession_write`, `client_division_id`, `client_divisoin_write`, `client_district_id`, `client_district_write`, `client_thana_id`, `client_thana_write`, `client_representative_name`, `client_representative_details`, `client_coordinator_tadbirkar_id`, `coordinator_tadbirkar_write`, `client_coordinator_details`, `opposition_party_id`, `opposition_category_id`, `opposition_subcategory_id`, `opposition_id`, `opposition_write`, `opposition_business_name`, `opposition_group_id`, `opposition_group_write`, `opposition_address`, `opposition_mobile`, `opposition_email`, `opposition_profession_id`, `opposition_profession_write`, `opposition_division_id`, `opposition_divisoin_write`, `opposition_district_id`, `opposition_district_write`, `opposition_thana_id`, `opposition_thana_write`, `opposition_representative_name`, `opposition_representative_details`, `opposition_coordinator_tadbirkar_id`, `opposition_coordinator_tadbirkar_write`, `opposition_coordinator_details`, `lawyer_advocate_id`, `lawyer_advocate_write`, `assigned_lawyer_id`, `lawyers_remarks`, `received_documents_id`, `received_documents`, `received_documents_date`, `required_wanting_documents_id`, `required_wanting_documents`, `required_wanting_documents_date`, `case_infos_division_id`, `case_infos_district_id`, `case_infos_thana_id`, `case_category_id`, `case_subcategory_id`, `case_infos_case_title_id`, `case_infos_case_no`, `case_infos_case_year`, `case_infos_court_id`, `case_infos_court_short_id`, `court_short_write`, `case_infos_sub_seq_case_title_id`, `case_infos_sub_seq_case_no`, `case_infos_sub_seq_case_year`, `case_infos_sub_seq_court_id`, `case_infos_sub_seq_court_short_id`, `sub_seq_court_short_write`, `law_id`, `law_write`, `section_id`, `section_write`, `date_of_filing`, `case_status_id`, `matter_id`, `matter_write`, `case_type_id`, `case_infos_complainant_informant_name`, `complainant_informant_representative`, `case_infos_accused_name`, `case_infos_accused_representative`, `prosecution_witness`, `defense_witness`, `updated_day_notes_id`, `updated_remarks_or_steps_taken`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(60, 'LCR-00051', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-30', 4, NULL, '2022-07-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 3, NULL, 'Tahmidur Rahman', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 'Gazipr', 16, 'Tongi', 109, 'Tongi', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 6, 'Sylhet', 52, 'Chittagong', 404, 'Test Branch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '3232', '2018', NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'M A Jahirul Haque', '', 'Tahmidur Rahman', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-07-25 05:38:09', '2022-07-25 15:09:42'),
(61, 'LCR-00052', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-10', 12, NULL, '2022-07-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 'Khulna', 1, 'Barishal', 5, 'Bakerganj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, NULL, 22, NULL, 194, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 136, 1, NULL, 1, '323232', '2021', 'Metropolitan Magistrate Court No. 06', 'MM-06', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, 'Cheque dishnour', 1, '', '', '', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-07-25 15:10:16', '2022-07-27 06:12:12'),
(62, 'LCR-00053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-26', NULL, NULL, '2022-07-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-26 09:04:36', '2022-07-26 09:05:10'),
(63, 'LCR-00054', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-26', NULL, NULL, '2022-07-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3333', '2022', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-26 12:47:07', '2022-07-27 06:12:23'),
(64, 'LCR-00055', 'Partex Agro Limited', 2, NULL, NULL, 'to file case', NULL, 'Partex Agro Limited', NULL, 'Md. Zakaria Islam', 1, 'CR Case No. 1545/2015', NULL, NULL, 12, NULL, '2022-07-27', 2, NULL, 'Delower Hossain', 'Md. Delwar Hossain, Business Controller', NULL, 2, '04', 'Md. Johirul Islam', 1, 3, 7, NULL, 'Partex Agro Limited', 'Partex Agro Limited', NULL, NULL, 'Western Shanta Tower, Level- 13, Bir Utam, Nir Showkat Sarak, 186, Tejgaon I/A, Dhaka-1218', '01700000000', 'nkzoha@gmail.com', NULL, 'Business', 3, 'Gazipr', 20, 'Tongi', 175, 'Tongi', 'Md. Faisal Mahmud', 'Md. Faisal Mahmud, Regulatory Executive, PAL', NULL, 'Md. Delower Hossan', 'Md. Delwar Hossain, Business Controller', 4, 2, 3, NULL, 'Md. Zakaria Islam', 'Zeba Enterprise', NULL, NULL, 'Vil- Sherpur Road, Kanozbari, Bagura Pouroshova, P.S.- Bagura Sadar, Dist- Bagura-5800.', '01800000000', 'Test2@gmail.com', 1, NULL, 6, NULL, 52, NULL, 399, NULL, 'Md. Zakaria Islam', 'Md. Zakaria Islam, Vil- Sherpur Road, Kanozbari, Bagura Pouroshova, P.S.- Bagura Sadar, Dist- Bagura-5800.', NULL, 'Md. Aminur Rahman', 'Md. Zakaria Islam, Vil- Sherpur Road, Kanozbari, Bagura Pouroshova, P.S.- Bagura Sadar, Dist- Bagura-5800.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 160, 1, NULL, 1, '1545', '2015', 'Metropolitan Magistrate Court No. 19', 'MM-19', '', 4, '22999', '2019', '3rd Joint  Metro Session Court', 'JMS-3', '', NULL, 'The Negotiable Instrument Act, 1881', NULL, '138', '23-7-2015', NULL, NULL, 'Recovery of Money', 1, 'Partex Agro Limited', 'Md. Faisal Mahmud', 'Md. Zakaria Islam', 'Md. Zakaria Islam', 'Md. Faisal Mahmud', 'Md. Zakaria Islam', ', ', NULL, 0, NULL, NULL, '2022-07-27 06:11:57', '2022-08-02 16:23:34'),
(65, 'LCR-00056', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-27', NULL, NULL, '2022-07-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-27 07:01:09', '2022-07-27 07:01:46'),
(66, 'LCR-00057', 'Partex Laminates Limited', 2, NULL, 3, NULL, NULL, 'Partex Laminates Limited', NULL, 'Md. Sajib', NULL, 'CR Case No - 641/ 2022', NULL, '2022-10-19', NULL, NULL, '2022-07-27', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 8, NULL, '', 'Partex Laminates Limited', NULL, NULL, 'Shanta Western Tower Level-13, Bir Uttom Mir showkot Road, 186, Tejgaon Industrial Area , Dhaka - 1208', '01700713429', NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Mizanur Rahaman', NULL, NULL, NULL, NULL, 4, 2, 3, NULL, '', 'New Mim Enterprise', NULL, NULL, 'village - Shibpur , P.O-Shikaripara P.S- Nababganj District- Dhaka', NULL, NULL, 1, NULL, 3, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 175, 1, NULL, NULL, '641', '2022', 'Metropolitan Magistrate Court No. 06', 'MM-06', '', NULL, '', '', NULL, NULL, '', NULL, 'The Negotiable Instrument Act 1881', '138', '', '31-5-2022', 21, NULL, NULL, 1, 'Partex Laminates Limited', 'Md. Mizanur Rahaman', 'Md. Sajib', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 13:02:03', '2022-08-01 14:10:56'),
(67, 'LCR-00058', 'Partex Furniture Industries Limited', 2, NULL, 3, NULL, NULL, 'Partex Furniture Industries Limited', NULL, 'Md.Mizanur Rahman', NULL, 'CR Case No.642/22', 6, '2022-10-19', NULL, 8, '2022-07-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 8, NULL, '', 'Partex Furniture Industries Limited', NULL, NULL, 'Shanta western Tower ,Level 13 , Bir Uttom Mir Showkot Road ,186, Tejgaon Industrial Area ,Dhaka -1208', '01700713429', NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Mizanur Rahaman', NULL, NULL, NULL, NULL, 4, 2, 3, NULL, 'Mizanur Rahman', NULL, NULL, NULL, 'Super Market, Sadar Road , Borguna , Barishal', NULL, NULL, 1, NULL, 1, NULL, 2, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 175, 1, NULL, 1, '642', '2022', 'Metropolitan Magistrate Court No. 06', 'MM-06', '', NULL, '', '', NULL, '', '', 'The Negotiable Instrument Act, 1881', '', '138', '', '31-5-2022', NULL, NULL, NULL, 1, 'Partex Furniture Industries Limited', 'Md. Mizanur Rahaman', 'Md. Mizanur Rahman', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 13:37:30', '2022-08-01 14:08:06'),
(68, 'LCR-00059', 'Partex Laminates Limited', 3, NULL, 3, NULL, NULL, 'Partex Laminates Limited', NULL, 'Md. Mohiuddin', NULL, 'CR Case No - 1881/2019', 3, '2022-08-04', NULL, 6, '2022-07-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 8, NULL, '', NULL, NULL, NULL, 'Shanta Western Tower, Level 13, Bir Uttom Mir Showkot Ali Road 186, Tejgaon Industrial Area Dhaka -1208', '01700713429', NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Mizanur Rahaman', NULL, NULL, NULL, NULL, 4, 2, 3, NULL, '', NULL, NULL, NULL, 'Apon Nibas Block - G ,Road-1, Plot-59, Uttor Kattoli Kornel Hat CDA Abasik Elaka P.S- Pahartoli, Chottogram', NULL, NULL, 1, NULL, 2, NULL, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 175, 1, NULL, 1, '1881', '2019', 'Metropolitan Magistrate Court No. 06', 'MM-06', '', NULL, '', '', NULL, NULL, '', NULL, '', '138', '', '6-11-2019', NULL, NULL, NULL, 1, 'Partex Laminates Limited', 'Md. Mizanur Rahaman', 'Md. Mohiuddin', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 14:08:24', '2022-08-08 15:23:28'),
(69, 'LCR-00060', 'Partex Laminates Limited', 3, NULL, 3, NULL, 3, NULL, NULL, 'Abdul Mannan', NULL, 'CR Case No. 1882/19', NULL, '2022-08-04', NULL, 6, '2022-07-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 8, NULL, 'Partex Laminates Limited', NULL, NULL, NULL, 'Shanta Western Tower, Level 13, Bir Uttom Mir Showkot Ali Road 186, Tejgaon Industrial Area Dhaka -1208', '01700713429', NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Mizanur Rahaman', NULL, NULL, NULL, NULL, 4, 2, 3, NULL, '', 'M\\S Mannan Furniture', NULL, NULL, 'Rahaman Villa Ishan Mohajon Road Sebakola P.O-kornelhat P.S- Akbar Shah ,Chottogram', NULL, NULL, 1, NULL, 2, NULL, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 175, 1, NULL, 1, '1882', '2019', 'Metropolitan Magistrate Court No. 06', 'MM-06', '', NULL, '', '', NULL, NULL, '', NULL, '', '138', '', '7-11-2019', NULL, 5, NULL, 1, 'Partex Laminates Limited', 'Md. Mizanur Rahaman', 'Abdul Mannan', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 14:55:07', '2022-08-01 15:26:16'),
(70, 'LCR-00061', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-27', NULL, NULL, '2022-07-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 135, NULL, NULL, NULL, '3333333', '2021', 'Metropolitan Magistrate Court No. 22', 'MM-22', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '13-7-2022', NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-27 15:57:45', '2022-07-28 17:04:38'),
(71, 'LCR-00062', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-28', NULL, NULL, '2022-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25652', '2023', NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-28 06:58:11', '2022-08-01 15:09:02'),
(72, 'LCR-00063', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, '2022-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '88888', '2020', NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-28 14:59:04', '2022-07-28 17:04:28'),
(73, 'LCR-00064', 'Jack Smith', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2022-07-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-31 12:27:08', '2022-07-31 13:04:51'),
(74, 'LCR-00065', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2002', '2021', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-31 13:42:54', '2022-08-01 04:45:35'),
(75, 'LCR-00066', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-01', NULL, NULL, '2022-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3002', '2021', NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-08-01 04:46:04', '2022-08-01 10:18:11'),
(76, 'LCR-00067', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-01', NULL, NULL, '2022-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '19999', '2022', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-08-01 10:18:39', '2022-08-01 15:09:22'),
(77, 'LCR-00068', 'Partex Agro Limited', 2, NULL, 3, NULL, 2, NULL, NULL, 'Md. Gias Uddin', NULL, 'CR Case No - 864/2020', 3, NULL, NULL, NULL, '2022-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 8, NULL, 'Partex Agro Limited', 'Partex Agro Limited', '1', NULL, 'Shanta Western Tower Level-13, Bir Uttom Mir Showkot Road 186 , Tejgaon industrial Area, Dhaka 1208', '01700713429', NULL, 1, NULL, 3, NULL, 20, NULL, 175, NULL, 'Md. Mizanur Rahaman', NULL, NULL, NULL, NULL, 4, 2, 3, NULL, 'Md. Gias Uddin', NULL, NULL, NULL, 'Village -Ujjolpur ,Dotter Hat, Noakhali Sadar Noakhali', NULL, NULL, 1, NULL, 2, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 175, 1, NULL, 1, '864', '2020', 'Metropolitan Magistrate Court No. 25', 'MM-25', '', NULL, '', '', NULL, '', '', 'The Negotiable Instrument Act, 1881', '', '138', '', '22-3-2020', NULL, NULL, NULL, 1, 'Partex Agro Limited', 'Md. Mizanur Rahaman', 'Md. Gias Uddin', '', NULL, NULL, ', ', NULL, 0, NULL, NULL, '2022-08-01 14:55:16', '2022-08-13 13:39:41'),
(78, 'LCR-00069', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-04', NULL, NULL, '2022-08-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '52528', '2024', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', '2-8-2022', NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-08-03 10:18:53', '2022-08-03 17:04:15'),
(79, 'LCR-00070', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-04', NULL, NULL, '2022-08-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '4561', '2024', NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '01-07-2022', NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-08-03 11:37:09', '2022-08-03 12:09:49'),
(80, 'LCR-00071', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2022-08-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-03 11:39:43', '2022-08-03 11:40:33'),
(81, 'LCR-00072', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, '2022-08-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2030', '2024', NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '06-10-2021', 50, NULL, NULL, NULL, '', '', '', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-08-03 12:09:42', '2022-08-03 17:04:22'),
(82, 'LCR-00073', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2022-08-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '789', '2022', NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-03 15:42:40', '2022-08-03 15:44:36'),
(83, 'LCR-00074', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-22', NULL, NULL, '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2520', '2024', NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, ', ', NULL, 1, NULL, NULL, '2022-08-04 17:13:04', '2022-08-07 09:36:47'),
(84, 'LCR-00075', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2022-08-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 135, 1, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, 1, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-07 09:00:43', '2022-08-07 09:36:37'),
(85, 'LCR-00076', 'Partex Agro Limited', 2, NULL, NULL, 'to file case', NULL, 'Partex Agro Limited', NULL, 'Md. Abdul Hamid', 1, 'CR Case No. 1442/2015', 3, '2021-06-16', 8, 8, '2022-08-07', 2, NULL, 'Delower Hossain', 'Business Controller', NULL, 2, '04', 'Md. Johirul Islam', 1, 3, 7, NULL, 'Partex Agro Limited', 'Partex Agro Limited', '1', NULL, 'Western Shanta Tower, Bir Uttam Mir Shawkat Sarak, Tejgaon, Dhaka-1208', '01700000000', 'Test@gmail.com', NULL, 'Business', 3, 'Gazipr', 20, 'Tongi', 175, 'Tongi', 'Md. Khondokar Ayenul Haque', 'Md. Khondokar Ayenul Haque, Credit Recovery Officer Accounts and Finance, Partex Srtar Group', 1, NULL, 'Md. Khondokar Ayenul Haque, Credit Recovery Officer Accounts and Finance, Partex Srtar Group', 4, 2, 3, NULL, 'Md. Abdul Hamid', NULL, NULL, NULL, 'Kastunagar, P.O.- Kastunagar, P.S.- Danut, Dist.- Bagura', '01800000000', 'Tes 2@gmail.com', 2, 'TEST', 6, 'Test Zone', 52, 'Test Area', 401, 'Test Branch', 'Md. Abdul Hamid', 'Md. Abdul Hamid, Kastunagar, P.O.- Kastunagar, P.S.- Danut, Dist.- Bagura', NULL, 'No', 'Noting yet', 2, 'test', 'Md. Johirul Islam, Md.  Nasir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, 175, 1, NULL, 1, '1542', '2015', 'Metropolitan Magistrate Court No. 25', 'MM-25', '', 4, '2267', '2018', '7th Joint  Metro Session Court', 'JMS-7', '', NULL, 'The Negotiable Instrument Act, 1881', '138', '', '01-09-2015', NULL, NULL, 'Recovery of Money', 1, 'Partex Agro Limited', 'Md. Khondakar Ayenul Haque', 'Md. Abdul Hamid', 'Md. Abdul Hamid', 'Md. Khondakar Ayenul Haque', 'Md. Abdul Hamid', ', ', NULL, 0, NULL, NULL, '2022-08-07 10:34:46', '2022-08-13 13:39:19'),
(86, 'LCR-00077', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2022-08-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-08 06:22:38', '2022-08-08 06:22:58'),
(87, 'LCR-00078', 'Partex PVC Industries Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-22', NULL, NULL, '2022-08-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 3, 7, NULL, 'Partex PVC Industries Limited', 'Union Plastic Industries Limited', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 2, 3, NULL, 'Mr. Md. Luthfur Rahman', 'Union Plastic Industries Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, NULL, NULL, NULL, 12, '25', '2018', '1st Additional District Judge Court', 'ADJC-1', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, 9, NULL, NULL, 'Partex PVC Industries Limited', '', 'Mr. Md. Luthfur Rahman', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 16:34:40', '2022-08-13 13:39:00'),
(88, 'LCR-00079', 'Partex PVC Industries Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-01', NULL, 16, '2022-08-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 3, 7, NULL, 'Partex PVC Industries Limited', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 2, 3, NULL, 'Md. Luthfur Rahman', 'Union Plastic Industries Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LEX CASTLE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, NULL, NULL, NULL, 12, '27', '2018', '1st Additional District Judge Court', 'ADJC-1', '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, 9, NULL, NULL, 'Partex PVC Industries Limited', '', 'Md. Luthfur Rahman', '', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 16:36:14', '2022-08-13 13:38:38'),
(89, 'LCR-00080', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 'Johirui Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, NULL, 'Imran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2080', '2024', NULL, NULL, '', NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-10 08:21:49', '2022-08-10 17:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases_billings`
--

CREATE TABLE `criminal_cases_billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `bill_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_for_the_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_particulars_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_particulars` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_type_id` int(11) DEFAULT NULL,
  `bill_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_schedule_id` int(11) DEFAULT NULL,
  `bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_submitted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode_id` int(11) DEFAULT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases_billings`
--

INSERT INTO `criminal_cases_billings` (`id`, `case_id`, `bill_date`, `bill_for_the_date`, `bill_particulars_id`, `bill_particulars`, `bill_type_id`, `bill_type`, `bill_schedule_id`, `bill_amount`, `bill_submitted`, `payment_received`, `payment_mode_id`, `payment_amount`, `due_amount`, `paid_due`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, '15-6-2022', '17-6-2022', 'qwer, qwerwe', 'wrew', 2, 'asdf', 1, '30000', '15-6-2022', '23-6-2022', 2, NULL, '30000', 'Due', 0, NULL, NULL, '2022-06-13 04:50:11', '2022-06-13 06:38:39'),
(2, 5, '8-6-2022', '18-6-2022', 'qwer, qwerwe', 'awer', 2, 'asdf', 1, '78000', '10-6-2022', '25-6-2022', 2, NULL, '78000', 'Due', 0, NULL, NULL, '2022-06-13 04:53:37', '2022-06-13 04:53:37'),
(3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Paid', 1, NULL, NULL, '2022-06-13 04:58:41', '2022-06-13 06:32:10'),
(4, 5, '8-6-2022', '9-7-2022', 'qwerwe', 'awer', 1, 'adsf', 1, '78000', '29-6-2022', '24-6-2022', 2, NULL, '78000', 'Due', 0, NULL, NULL, '2022-06-13 05:35:29', '2022-06-13 05:35:29'),
(5, 5, '13-6-2022', '13-6-2022', NULL, 'awer', 2, 'adsf', 1, '30000', '13-6-2022', '13-6-2022', 2, NULL, '30000', 'Due', 0, NULL, NULL, '2022-06-13 05:41:12', '2022-06-13 06:19:40'),
(6, 25, '13-6-2022', '22-6-2022', NULL, 'test', 1, NULL, 2, '5000000', '22-6-2022', '30-6-2022', 2, '400000', '4600000', 'Due', 0, NULL, NULL, '2022-06-26 15:28:22', '2022-06-26 15:28:22'),
(7, 9, '7-6-2022', '16-6-2022', NULL, 'test', 1, NULL, 1, '32000', '22-6-2022', '30-6-2022', 2, '25000', '7000', 'Due', 0, NULL, NULL, '2022-06-28 17:01:34', '2022-08-03 14:26:12'),
(8, 31, '28-7-2022', '7-7-2022', 'qwerwe', NULL, 1, NULL, 1, '150000', '22-7-2022', NULL, 2, '10000', '140000', 'Due', 1, NULL, NULL, '2022-07-02 04:53:43', '2022-07-02 04:56:33'),
(9, 31, '30-6-2022', '22-6-2022', NULL, 'Hajira Fee', 1, NULL, NULL, '30000', '30-6-2022', '1-7-2022', NULL, '25000', '5000', 'Due', 0, NULL, NULL, '2022-07-02 04:55:32', '2022-07-02 17:18:56'),
(10, 31, '16-6-2022', '28-6-2022', NULL, 'Hajira Fee', 1, NULL, NULL, '50000', '1-7-2022', '2-7-2022', NULL, '50000', '0', 'Paid', 0, NULL, NULL, '2022-07-02 05:02:14', '2022-07-02 05:02:14'),
(11, 34, '3-7-2022', '30-6-2022', NULL, 'Hajira Fee', 1, NULL, NULL, '100000', '6-7-2022', NULL, NULL, '48000', '52000', 'Due', 0, NULL, NULL, '2022-07-06 12:06:48', '2022-07-06 12:06:48'),
(12, 38, '6-7-2022', '6-7-2022', 'The case has been received.', 'Civil Suit no.234/2022', 3, NULL, NULL, '10000', '6-7-2022', '6-7-2022', 1, '10000', '0', 'Paid', 0, NULL, NULL, '2022-07-06 17:17:18', '2022-07-06 17:22:22'),
(13, 40, '3-7-2022', '15-6-2022', 'The case has been received.', NULL, 1, NULL, NULL, '15000', '4-7-2022', '7-7-2022', 1, '10000', '5000', 'Due', 0, NULL, NULL, '2022-07-07 09:37:17', '2022-07-07 09:37:48'),
(14, 40, '20-6-2022', '19-6-2022', 'Today is Fixed for W/A. We filled complainant Hajira.', NULL, 1, NULL, NULL, '5000', '21-6-2022', '25-7-2022', 3, '3000', '2000', 'Due', 0, NULL, NULL, '2022-07-07 09:40:21', '2022-07-07 09:40:21'),
(15, 40, '6-6-2022', '5-6-2022', 'The case has been received.', NULL, 2, NULL, NULL, '7000', '7-6-2022', '12-6-2022', 2, '7000', '0', 'Paid', 0, NULL, NULL, '2022-07-07 09:42:04', '2022-07-07 09:42:04'),
(16, 40, '4-7-2022', '3-7-2022', 'The case has been received.', NULL, 1, NULL, NULL, '15000', '4-7-2022', '5-7-2022', 4, '15000', '0', 'Paid', 0, NULL, NULL, '2022-07-07 09:43:29', '2022-07-07 09:43:29'),
(17, 61, '2-7-2022', '12-8-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Paid', 1, NULL, NULL, '2022-07-26 11:55:59', '2022-07-26 11:56:07'),
(18, 41, '24-7-2022', '24-7-2022', 'The case has been received.', 'submitted bail petition and granted', 1, NULL, NULL, '5000', NULL, '24-7-2022', 2, '4000', '1000', 'Due', 0, NULL, NULL, '2022-07-27 16:56:36', '2022-07-27 17:00:46'),
(19, 64, '18-05-2022', '10-01-2022', NULL, 'Till June 2020', NULL, NULL, NULL, '5000', NULL, NULL, 1, '4000', '1000', 'Due', 0, NULL, NULL, '2022-08-03 16:07:00', '2022-08-03 16:07:00'),
(20, 83, '11-08-2022', '27-08-2022', 'The case has been received.', NULL, NULL, NULL, NULL, '78000', '27-08-2022', '25-08-2022', 1, '35000', '43000', 'Due', 0, NULL, NULL, '2022-08-06 05:08:20', '2022-08-06 05:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases_case_steps`
--

CREATE TABLE `criminal_cases_case_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criminal_case_id` int(11) DEFAULT NULL,
  `case_infos_allegation_claim_id` int(11) DEFAULT NULL,
  `case_infos_allegation_claim_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recovery_seizure_articles` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_of_money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `another_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_info_remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `random_case_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_filing_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_filing_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taking_cognizance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taking_cognizance_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taking_cognizance_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrest_surrender_cw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrest_surrender_cw_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrest_surrender_cw_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_bail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_bail_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_bail_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_court_transfer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_court_transfer_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_court_transfer_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_charge_framed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_charge_framed_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_charge_framed_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_witness_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_witness_from_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_witness_from_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_witness_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_witness_to_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_witness_to_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_argument` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_argument_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_argument_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_judgement_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_judgement_order_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_judgement_order_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_summary_of_cases` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_summary_of_cases_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_summary_of_cases_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_steps_remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases_case_steps`
--

INSERT INTO `criminal_cases_case_steps` (`id`, `criminal_case_id`, `case_infos_allegation_claim_id`, `case_infos_allegation_claim_write`, `recovery_seizure_articles`, `amount_of_money`, `another_claim`, `summary_facts`, `case_info_remarks`, `random_case_id`, `case_steps_filing`, `case_steps_filing_note`, `case_steps_filing_type_id`, `taking_cognizance`, `taking_cognizance_note`, `taking_cognizance_type_id`, `arrest_surrender_cw`, `arrest_surrender_cw_note`, `arrest_surrender_cw_type_id`, `case_steps_bail`, `case_steps_bail_note`, `case_steps_bail_type_id`, `case_steps_court_transfer`, `case_steps_court_transfer_note`, `case_steps_court_transfer_type_id`, `case_steps_charge_framed`, `case_steps_charge_framed_note`, `case_steps_charge_framed_type_id`, `case_steps_witness_from`, `case_steps_witness_from_note`, `case_steps_witness_from_type_id`, `case_steps_witness_to`, `case_steps_witness_to_note`, `case_steps_witness_to_type_id`, `case_steps_argument`, `case_steps_argument_note`, `case_steps_argument_type_id`, `case_steps_judgement_order`, `case_steps_judgement_order_note`, `case_steps_judgement_order_type_id`, `case_steps_summary_of_cases`, `case_steps_summary_of_cases_note`, `case_steps_summary_of_cases_type_id`, `case_steps_remarks`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6/3/2019', NULL, 'Yes', NULL, NULL, 'Yes', NULL, NULL, 'Yes', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-16 10:05:32', '2022-05-16 10:37:49'),
(2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11/8/2021', NULL, 'No', '11/8/2021', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'Yes', '24/3/2022', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-17 11:00:42', '2022-05-18 05:48:51'),
(3, 3, 2, NULL, NULL, '558434/-', NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, 'Yes', NULL, NULL, 'Yes', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-18 09:27:27', '2022-05-28 06:32:53'),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-18 10:53:48', '2022-05-18 10:53:48'),
(5, 5, NULL, NULL, NULL, '1630980/-', NULL, NULL, NULL, NULL, '2/6/2021', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-19 10:28:44', '2022-05-19 10:28:44'),
(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-19 10:47:34', '2022-05-19 10:47:34'),
(7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13/11/2019', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-19 10:51:26', '2022-05-19 10:55:50'),
(8, 8, NULL, NULL, NULL, '1000000/-', NULL, NULL, NULL, NULL, '13/8/2015', NULL, 'Yes', NULL, NULL, 'Yes', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-23 04:53:05', '2022-05-25 10:47:11'),
(9, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 06:10:38', '2022-05-28 06:10:38'),
(10, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 06:15:40', '2022-05-28 06:15:40'),
(11, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 06:30:12', '2022-05-28 06:30:12'),
(12, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 06:32:11', '2022-05-28 06:32:11'),
(13, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 06:33:39', '2022-05-28 06:33:39'),
(14, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 06:34:08', '2022-05-28 06:34:08'),
(15, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 06:35:49', '2022-05-28 06:35:49'),
(16, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 06:37:24', '2022-05-28 06:37:24'),
(17, 9, NULL, NULL, NULL, '7156584', NULL, NULL, NULL, NULL, '12/9/2021', 'Petition (copy) Petition copy is preserved for reference', '0', '12/9/2021', NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', 'abc', 0, NULL, NULL, '2022-05-28 06:38:22', '2022-07-31 18:54:35'),
(18, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Photocopy', 'Yes', '16/6/2021', 'copy', 'Yes', '29/5/2022', 'Photocopy', 'Yes', NULL, NULL, 'Yes', NULL, NULL, 'No', '28/1/2020', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-29 10:45:24', '2022-05-29 10:48:43'),
(19, 11, NULL, NULL, 'test', '1000000', 'test', 'test', 'test', NULL, '9/3/2022', 'Photocopy', 'Yes', '18/5/2022', 'copy', 'Yes', '4/5/2022', 'Photocopy', 'Yes', '3/5/2022', 'Photocopy', 'No', '1/5/2022', 'Photocopy', 'No', '1/6/2022', 'Photocopy', 'No', '11/5/2022', 'Photocopy', 'No', '17/5/2022', 'Photocopy', 'No', '3/5/2022', NULL, 'No', '2/5/2022', NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-30 05:49:36', '2022-05-30 06:40:53'),
(20, 12, NULL, 'Compensation', NULL, NULL, NULL, NULL, NULL, NULL, '29/8/2021', 'Photocopy', 'No', '2/5/2022', 'copy', 'No', '11/5/2022', 'Photocopy', 'No', '25/5/2022', 'Photocopy', 'No', NULL, 'Photocopy', 'No', '3/5/2022', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-30 06:54:01', '2022-05-31 15:33:57'),
(21, 13, NULL, NULL, NULL, NULL, NULL, NULL, 'Next Date >>> 16-10-2022', NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-31 01:21:26', '2022-06-26 16:48:31'),
(22, 14, NULL, 'Compensation', NULL, '1405197', NULL, NULL, NULL, NULL, '29-8-2021', 'Petition (copy)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-31 15:52:05', '2022-08-10 16:32:08'),
(23, 15, NULL, NULL, NULL, '1876040', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-01 05:21:34', '2022-06-01 05:24:18'),
(24, 16, NULL, NULL, NULL, '150000', NULL, NULL, NULL, NULL, '2-12-2021', NULL, 'No', '2-12-2021', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-05 10:00:59', '2022-08-10 16:02:23'),
(25, 17, NULL, NULL, NULL, '275000', NULL, NULL, NULL, NULL, NULL, 'Petition (copy)', 'Yes', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 13:28:59', '2022-06-28 10:59:22'),
(26, 18, NULL, NULL, NULL, '495766', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 13:49:55', '2022-06-08 13:49:55'),
(27, 19, NULL, 'Compensation', NULL, '119550', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 14:10:46', '2022-06-08 14:10:46'),
(28, 20, NULL, NULL, NULL, '2800000', NULL, NULL, NULL, NULL, '10-10-2021', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 14:49:09', '2022-06-08 14:52:21'),
(29, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', '27-3-2022', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 15:04:13', '2022-06-08 15:04:13'),
(30, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 15:58:03', '2022-06-08 15:58:03'),
(31, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-08 16:29:30', '2022-06-08 16:29:30'),
(32, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-22 08:31:28', '2022-06-22 08:31:28'),
(33, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 15:22:22', '2022-06-26 15:22:22'),
(34, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 16:08:08', '2022-06-26 16:08:08'),
(35, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 16:44:46', '2022-06-26 16:44:46'),
(36, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-28 11:22:32', '2022-06-28 11:22:32'),
(37, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-28 11:50:08', '2022-06-28 11:50:08'),
(38, 30, 1, NULL, NULL, '210000', NULL, NULL, NULL, NULL, '31-12-2017', 'Photocopy', 'Yes', '31-12-2017', NULL, 'Yes', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, NULL, 'Yes', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-28 16:22:33', '2022-06-29 08:57:14'),
(39, 31, 1, NULL, NULL, '270544', NULL, NULL, NULL, NULL, '19-2-2017', 'Photocopy', 'Yes', '19-2-2017', NULL, 'Yes', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'Yes', NULL, NULL, 'Yes', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 09:06:14', '2022-06-29 09:06:46'),
(40, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30-6-2022', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-02 05:29:59', '2022-07-04 05:44:57'),
(41, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-04 05:46:07', '2022-07-04 05:46:07'),
(42, 34, NULL, NULL, NULL, '200000', NULL, NULL, NULL, NULL, '23-7-2015', NULL, 'No', '23-7-2015', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', '28-3-2019', NULL, 'No', '4-10-2020', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-05 05:32:00', '2022-07-05 05:32:00'),
(43, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '26-7-2022', 'Photocopy', 'Yes', '6-7-2022', 'Photocopy', 'Yes', '11-7-2022', 'Photocopy', 'Yes', '18-7-2022', NULL, 'Yes', '7-7-2022', 'Photocopy', 'No', '12-7-2022', 'Photocopy', 'Yes', '27-7-2022', NULL, 'No', '14-7-2022', 'Photocopy', 'Yes', '28-7-2022', 'Photocopy', 'Yes', '29-7-2022', NULL, 'No', NULL, NULL, NULL, 'On 16.10.2018 at 11.30 pm, the plaintiff\'s cousin Md. Rafiqul Islam son of late Ayub Ali told Ejher named', 0, NULL, NULL, '2022-07-05 07:13:10', '2022-07-05 10:22:56'),
(44, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 11:12:24', '2022-07-06 11:12:24'),
(45, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 11:13:21', '2022-07-06 11:13:21'),
(46, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 15:45:46', '2022-07-06 15:45:46'),
(47, 39, NULL, 'Partition', NULL, NULL, NULL, NULL, NULL, NULL, '3-4-2022', NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 17:59:13', '2022-07-06 17:59:13'),
(48, 40, 1, NULL, 'The incident of rape took place on 04.03.2021 but the plaintiff made GD on 06.03.2021 i.e. 3 days after the incident.', '1339844', 'The incident of rape took place on 04.03.2021 but the plaintiff made GD on 06.03.2021 i.e. 3 days after the incident.', 'The incident of rape took place on 04.03.2021 but the plaintiff made GD on 06.03.2021 i.e. 3 days after the incident.', 'The incident of rape took place on 04.03.2021 but the plaintiff made GD on 06.03.2021 i.e. 3 days after the incident.', NULL, '7-4-2016', 'Photocopy', 'Yes', '7-4-2016', 'copy', 'Yes', '6-7-2016', 'Photocopy', 'No', '28-11-2016', 'Photocopy', 'Yes', '28-11-2016', 'Photocopy', 'Yes', '4-4-2019', 'Photocopy', 'No', '17-10-2019', 'Photocopy', 'No', '11-3-2020', 'Photocopy', 'Yes', '19-5-2022', 'Photocopy', 'No', NULL, NULL, 'No', NULL, NULL, NULL, 'No evidence mentioned in the Ejahar was recovered from the accused.', 0, NULL, NULL, '2022-07-07 07:20:40', '2022-07-07 08:47:15'),
(49, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-13 11:15:06', '2022-07-13 11:15:06'),
(66, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, 0, NULL, NULL, '2022-07-17 06:32:14', '2022-07-17 06:32:14'),
(67, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, 0, NULL, NULL, '2022-07-17 06:35:19', '2022-07-17 06:35:19'),
(69, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, 0, NULL, NULL, '2022-07-17 06:39:16', '2022-07-17 06:39:16'),
(71, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, 0, NULL, NULL, '2022-07-17 06:40:55', '2022-07-17 06:40:55'),
(72, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, 0, NULL, NULL, '2022-07-17 06:42:02', '2022-07-17 06:42:02'),
(73, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, NULL, 'No', NULL, 0, NULL, NULL, '2022-07-17 07:00:10', '2022-07-17 07:00:10'),
(74, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31-5-2022', NULL, NULL, '31-05-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-17 07:28:37', '2022-08-08 16:05:53'),
(75, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31-5-2022', '31/05/22', NULL, '31-05-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-17 07:29:21', '2022-08-08 15:51:08'),
(76, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '1-8-2022', NULL, '1', '2-8-2022', NULL, '0', '3-8-2022', NULL, '0', '4-8-2022', NULL, '1', '5-8-2022', NULL, '0', '13-8-2022', NULL, '0', '24-8-2022', NULL, '1', '25-8-2022', NULL, '0', '31-8-2022', NULL, '1', '30-8-2022', NULL, '0', NULL, 0, NULL, NULL, '2022-08-01 04:46:04', '2022-08-01 09:13:14'),
(77, 76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, NULL, '0', NULL, 0, NULL, NULL, '2022-08-01 10:18:39', '2022-08-01 10:18:39'),
(78, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6-11-2019', NULL, NULL, '06-11-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2022-08-08 15:32:49'),
(79, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7-11-2019', 'Fuga Nobis et moles', '3', '13-2-2012', 'Explicabo Velit dol', '1', '30-1-2018', 'Dolore sapiente quas', '1', '31-10-1979', 'Excepturi eos sed es', '2', '7-3-1970', 'Nostrud fugiat enim', '1', '6-12-2002', 'Reprehenderit ipsum', '2', '5-8-1972', 'Omnis mollit id dolo', '1', '10-6-1995', 'Dolorem voluptas ver', '3', '28-11-2012', 'Placeat natus magna', '1', '6-7-1996', 'Ut ea adipisicing du', '1', '10-8-1974', 'Eum ut culpa necess', '2', 'Ut esse repudiandae', 0, NULL, NULL, NULL, '2022-08-02 12:11:01'),
(80, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(81, 77, 1, NULL, NULL, '500000', NULL, NULL, NULL, NULL, '22-3-2020', 'retyrj', '1', '18-8-2022', 'werew', '3', '19-8-2022', 'sfwe', '1', '20-8-2022', 'wer', '1', '21-8-2022', 'asdf', '1', '22-8-2022', 'gfhgf', '3', '23-8-2022', 'ertre', '2', '20-8-2022', 'fgh', '1', '8-9-2022', 'cvb', '1', '26-8-2022', 'dfg', '3', '7-9-2022', 'cvbxc', '1', 'fwerew gfg sdfg ert dfsgfdg ertsdfg', 0, NULL, NULL, '2022-08-01 14:55:16', '2022-08-02 11:15:15'),
(82, 78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2-8-2022', NULL, NULL, '1-8-2022', NULL, NULL, '2-8-2022', NULL, NULL, '3-8-2022', NULL, NULL, '4-8-2022', NULL, NULL, '5-8-2022', NULL, NULL, '6-8-2022', NULL, NULL, '7-8-2022', NULL, NULL, '9-8-2022', NULL, NULL, '8-8-2022', NULL, NULL, '4-8-2022', NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 10:18:53', '2022-08-03 10:18:53'),
(83, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24-3-2021', NULL, NULL, '24-03-2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2022-08-08 16:13:45'),
(84, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(85, 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01-07-2022', NULL, '2', '01-08-2022', NULL, '3', '02-08-2022', NULL, '1', '03-08-2022', NULL, '3', '04-08-2022', NULL, '2', '24-08-2022', NULL, '3', '02-08-2022', NULL, '1', '01-08-2022', NULL, '3', '01-08-2022', NULL, '2', '06-08-2022', NULL, '3', '09-08-2022', NULL, '1', NULL, 0, NULL, NULL, '2022-08-03 11:37:09', '2022-08-03 11:42:11'),
(86, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 11:39:43', '2022-08-03 11:39:43'),
(87, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '06-10-2021', NULL, '3', '01-08-2022', NULL, '2', '02-08-2022', NULL, '1', '04-08-2022', NULL, '2', '05-08-2022', NULL, '3', '05-08-2022', NULL, '1', '06-08-2022', NULL, '3', '07-08-2022', NULL, '3', '08-08-2022', NULL, '2', '09-08-2022', NULL, '1', '08-08-2022', NULL, '3', NULL, 0, NULL, NULL, '2022-08-03 12:09:42', '2022-08-03 12:11:53'),
(88, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 15:42:40', '2022-08-03 15:42:40'),
(89, 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'filling was successful on this date', '1', '01-08-2022', NULL, '2', '02-08-2022', NULL, '3', '03-08-2022', NULL, '1', '04-08-2022', NULL, '3', '05-08-2022', NULL, '1', '06-08-2022', NULL, '2', '07-08-2022', NULL, '3', '08-08-2022', NULL, '2', '09-08-2022', NULL, '1', '10-08-2022', NULL, '2', NULL, 0, NULL, NULL, '2022-08-04 17:13:04', '2022-08-07 06:36:34'),
(90, 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-07 09:00:43', '2022-08-07 09:00:43'),
(91, 85, NULL, 'Dishnour Cheque', 'No recovery articles', '100000', 'Nothing', 'Summary of Facts Summary of Facts Summary of Facts Summary of Facts Summary of Facts Summary of Facts Summary of Facts Summary of Facts Summary of Facts Summary of Facts Summary of Facts Summary of Facts', 'Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks Remarks', NULL, '01-09-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02-08-2022', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-07 10:34:46', '2022-08-07 10:34:46'),
(92, 86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 06:22:38', '2022-08-08 06:22:38'),
(93, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09-08-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 16:34:40', '2022-08-10 15:08:19'),
(94, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 16:36:14', '2022-08-08 16:36:14'),
(95, 54, NULL, NULL, NULL, '500000', NULL, NULL, NULL, NULL, '30-7-2015', NULL, NULL, '30-07-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2022-08-10 15:29:11'),
(96, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-10 08:21:49', '2022-08-10 08:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases_documents_receiveds`
--

CREATE TABLE `criminal_cases_documents_receiveds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `received_documents_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases_documents_receiveds`
--

INSERT INTO `criminal_cases_documents_receiveds` (`id`, `case_id`, `received_documents_id`, `received_documents`, `received_documents_date`, `received_documents_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(12, 23, 'Petition', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-22 15:03:47', '2022-07-22 15:03:47'),
(13, 23, 'Written Statement', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-22 15:03:47', '2022-07-22 15:03:47'),
(21, 30, 'Investigation Report', 'rrr', '2022-07-04', NULL, 0, NULL, NULL, '2022-07-23 05:06:36', '2022-07-23 05:06:36'),
(22, 30, 'Legal Notice by 2nd Party', 'eeeeiii', NULL, NULL, 0, NULL, NULL, '2022-07-23 05:06:36', '2022-07-23 05:06:36'),
(40, 56, 'Charge Form', 'Petition', '2022-07-05', NULL, 0, NULL, NULL, '2022-07-25 05:35:37', '2022-07-25 05:35:37'),
(41, 56, 'Investigation Report', 'charge sheet', '2022-07-13', NULL, 0, NULL, NULL, '2022-07-25 05:35:37', '2022-07-25 05:35:37'),
(48, 60, 'Charge Sheet', 'Complaint', '2022-07-14', NULL, 0, NULL, NULL, '2022-07-25 05:52:05', '2022-07-25 05:52:05'),
(49, 60, 'Cheque Dishonour', 'NID Card', '2022-07-13', NULL, 0, NULL, NULL, '2022-07-25 05:52:05', '2022-07-25 05:52:05'),
(50, 60, 'Charge Sheet', 'investigating Report', NULL, NULL, 0, NULL, NULL, '2022-07-25 05:52:05', '2022-07-25 05:52:05'),
(69, 61, 'Charge Sheet', NULL, '2022-06-29', NULL, 0, NULL, NULL, '2022-07-26 06:04:05', '2022-07-26 06:04:05'),
(70, 61, 'Cheque Dishonour', 'werewr', '2022-07-22', NULL, 0, NULL, NULL, '2022-07-26 06:04:05', '2022-07-26 06:04:05'),
(71, 61, 'Letter by 2nd Party', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 06:04:05', '2022-07-26 06:04:05'),
(79, 63, 'Charge Sheet', 'Complaint', '2022-07-05', NULL, 0, NULL, NULL, '2022-07-26 13:15:33', '2022-07-26 13:15:33'),
(86, 65, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 07:01:09', '2022-07-27 07:01:09'),
(87, 65, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 07:01:09', '2022-07-27 07:01:09'),
(105, 68, 'Cheque', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 14:08:24', '2022-07-27 14:08:24'),
(108, 69, 'Charge Form', NULL, '2022-07-12', NULL, 0, NULL, NULL, '2022-07-27 15:33:08', '2022-07-27 15:33:08'),
(109, 66, 'Cheque', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 15:47:54', '2022-07-27 15:47:54'),
(120, 72, 'Cheque', NULL, '2022-07-13', NULL, 0, NULL, NULL, '2022-07-28 14:59:04', '2022-07-28 14:59:04'),
(121, 72, NULL, 'petition', '2022-07-18', NULL, 0, NULL, NULL, '2022-07-28 14:59:04', '2022-07-28 14:59:04'),
(122, 72, NULL, 'plaint', '2022-07-19', NULL, 0, NULL, NULL, '2022-07-28 14:59:04', '2022-07-28 14:59:04'),
(134, 71, 'Cheque', NULL, '2022-07-19', NULL, 0, NULL, NULL, '2022-07-30 14:40:32', '2022-07-30 14:40:32'),
(135, 73, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-31 12:27:08', '2022-07-31 12:27:08'),
(136, 74, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-31 13:42:54', '2022-07-31 13:42:54'),
(153, 75, 'Cheque', NULL, '2022-08-17', NULL, 0, NULL, NULL, '2022-08-01 09:36:03', '2022-08-01 09:36:03'),
(154, 75, NULL, 'Complaint', NULL, NULL, 0, NULL, NULL, '2022-08-01 09:36:03', '2022-08-01 09:36:03'),
(155, 75, NULL, 'investigating Report', '2022-08-17', NULL, 0, NULL, NULL, '2022-08-01 09:36:03', '2022-08-01 09:36:03'),
(156, 75, 'Charge Form', 'Nothing TEst', NULL, NULL, 0, NULL, NULL, '2022-08-01 09:36:03', '2022-08-01 09:36:03'),
(157, 75, NULL, 'NID Card', '2022-08-09', NULL, 0, NULL, NULL, '2022-08-01 09:36:03', '2022-08-01 09:36:03'),
(158, 75, 'Legal Notice (Served)', NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 09:36:03', '2022-08-01 09:36:03'),
(159, 76, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 10:18:39', '2022-08-01 10:18:39'),
(161, 77, '16', 'asdf', NULL, NULL, 0, NULL, NULL, '2022-08-02 11:13:50', '2022-08-02 11:13:50'),
(162, 77, '10', 'asf', '2022-08-17', '1', 0, NULL, NULL, '2022-08-02 11:13:50', '2022-08-02 11:13:50'),
(167, 64, '7', 'investigating Report', '2022-06-09', '3', 0, NULL, NULL, '2022-08-02 16:34:02', '2022-08-02 16:34:02'),
(168, 64, '9', 'Complaint', '2022-07-20', '2', 0, NULL, NULL, '2022-08-02 16:34:02', '2022-08-02 16:34:02'),
(169, 78, '16', NULL, '2022-08-02', NULL, 0, NULL, NULL, '2022-08-03 10:18:53', '2022-08-03 10:18:53'),
(172, 41, '15', NULL, '2022-08-17', '3', 0, NULL, NULL, '2022-08-03 11:36:03', '2022-08-03 11:36:03'),
(173, 41, NULL, 'charge sheet', '2022-08-30', '2', 0, NULL, NULL, '2022-08-03 11:36:03', '2022-08-03 11:36:03'),
(174, 79, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 11:37:09', '2022-08-03 11:37:09'),
(175, 80, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 11:39:43', '2022-08-03 11:39:43'),
(177, 81, '16', NULL, '2022-08-02', '3', 0, NULL, NULL, '2022-08-03 12:12:37', '2022-08-03 12:12:37'),
(178, 82, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 15:42:40', '2022-08-03 15:42:40'),
(179, 9, NULL, 'test 1', '2022-07-13', '3', 0, NULL, NULL, '2022-08-04 16:46:17', '2022-08-04 16:46:17'),
(180, 9, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-04 16:46:17', '2022-08-04 16:46:17'),
(181, 9, NULL, 'test 2', '2022-07-29', NULL, 0, NULL, NULL, '2022-08-04 16:46:17', '2022-08-04 16:46:17'),
(184, 83, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-04 17:33:40', '2022-08-04 17:33:40'),
(185, 84, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-07 09:00:43', '2022-08-07 09:00:43'),
(186, 85, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-07 10:34:46', '2022-08-07 10:34:46'),
(187, 86, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 06:22:38', '2022-08-08 06:22:38'),
(188, 87, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 16:34:40', '2022-08-08 16:34:40'),
(191, 89, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-10 08:24:14', '2022-08-10 08:24:14'),
(195, 14, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-10 16:33:32', '2022-08-10 16:33:32'),
(196, 88, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-11 19:42:34', '2022-08-11 19:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases_documents_requireds`
--

CREATE TABLE `criminal_cases_documents_requireds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `required_wanting_documents_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases_documents_requireds`
--

INSERT INTO `criminal_cases_documents_requireds` (`id`, `case_id`, `required_wanting_documents_id`, `required_wanting_documents`, `required_wanting_documents_date`, `required_wanting_documents_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 23, 'Legal Notice by 1st Party', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-22 15:03:47', '2022-07-22 15:03:47'),
(13, 30, 'Petition', 'tttt', '2022-07-05', NULL, 0, NULL, NULL, '2022-07-23 05:06:36', '2022-07-23 05:06:36'),
(14, 30, 'Legal Notice by 1st Party', 'yyyyyeeee', NULL, NULL, 0, NULL, NULL, '2022-07-23 05:06:36', '2022-07-23 05:06:36'),
(24, 56, 'Complaint', 'Gratuity Policy (Approved)', '2022-08-09', NULL, 0, NULL, NULL, '2022-07-25 05:35:37', '2022-07-25 05:35:37'),
(25, 56, 'Written Statement', 'Charge form', NULL, NULL, 0, NULL, NULL, '2022-07-25 05:35:37', '2022-07-25 05:35:37'),
(26, 56, 'Plaint', 'Financial Statement', '2022-08-10', NULL, 0, NULL, NULL, '2022-07-25 05:35:37', '2022-07-25 05:35:37'),
(31, 60, 'Legal Notice by 2nd Party', 'Letter by 1st party', '2022-06-29', NULL, 0, NULL, NULL, '2022-07-25 05:52:05', '2022-07-25 05:52:05'),
(32, 60, 'Petition', 'Letter by 1st party', NULL, NULL, 0, NULL, NULL, '2022-07-25 05:52:05', '2022-07-25 05:52:05'),
(33, 60, 'Complaint', 'Letter by 1st party', '2022-07-14', NULL, 0, NULL, NULL, '2022-07-25 05:52:05', '2022-07-25 05:52:05'),
(47, 61, 'Charge Sheet', 'Letter by 1st party', '2022-07-12', NULL, 0, NULL, NULL, '2022-07-26 06:04:05', '2022-07-26 06:04:05'),
(48, 61, 'Cheque Dishonour', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 06:04:05', '2022-07-26 06:04:05'),
(59, 65, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 07:01:09', '2022-07-27 07:01:09'),
(60, 65, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 07:01:09', '2022-07-27 07:01:09'),
(80, 72, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-28 14:59:04', '2022-07-28 14:59:04'),
(85, 71, 'Cheque Dishonour', NULL, '2022-07-05', NULL, 0, NULL, NULL, '2022-07-30 14:40:32', '2022-07-30 14:40:32'),
(86, 73, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-31 12:27:08', '2022-07-31 12:27:08'),
(87, 74, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-31 13:42:54', '2022-07-31 13:42:54'),
(98, 75, NULL, 'Letter by 1st party', '2022-08-09', NULL, 0, NULL, NULL, '2022-08-01 09:36:03', '2022-08-01 09:36:03'),
(99, 75, 'Cheque Dishonour', NULL, '2022-08-17', NULL, 0, NULL, NULL, '2022-08-01 09:36:03', '2022-08-01 09:36:03'),
(100, 75, NULL, 'Letter by 2nd t party', '2022-08-24', NULL, 0, NULL, NULL, '2022-08-01 09:36:03', '2022-08-01 09:36:03'),
(101, 76, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 10:18:39', '2022-08-01 10:18:39'),
(103, 77, '5', 'uytu', NULL, '1', 0, NULL, NULL, '2022-08-02 11:13:50', '2022-08-02 11:13:50'),
(104, 77, NULL, 'sdfhfd', NULL, '3', 0, NULL, NULL, '2022-08-02 11:13:50', '2022-08-02 11:13:50'),
(107, 64, '7', 'Letter by 1st party', '2022-08-16', '2', 0, NULL, NULL, '2022-08-02 16:34:02', '2022-08-02 16:34:02'),
(108, 78, NULL, 'test asdf', '2022-08-02', NULL, 0, NULL, NULL, '2022-08-03 10:18:53', '2022-08-03 10:18:53'),
(111, 41, '9', NULL, '2022-08-15', '2', 0, NULL, NULL, '2022-08-03 11:36:03', '2022-08-03 11:36:03'),
(112, 41, NULL, 'legal notice', '2022-08-08', '3', 0, NULL, NULL, '2022-08-03 11:36:03', '2022-08-03 11:36:03'),
(113, 79, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 11:37:09', '2022-08-03 11:37:09'),
(114, 80, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 11:39:43', '2022-08-03 11:39:43'),
(116, 81, NULL, 'Charge Sheet', '2022-08-17', '1', 0, NULL, NULL, '2022-08-03 12:12:37', '2022-08-03 12:12:37'),
(117, 82, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 15:42:40', '2022-08-03 15:42:40'),
(118, 9, NULL, 'test 3', '2022-07-07', NULL, 0, NULL, NULL, '2022-08-04 16:46:17', '2022-08-04 16:46:17'),
(119, 9, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-04 16:46:17', '2022-08-04 16:46:17'),
(120, 9, NULL, 'test 6', '2022-07-08', NULL, 0, NULL, NULL, '2022-08-04 16:46:17', '2022-08-04 16:46:17'),
(121, 9, NULL, 'test 4', '2022-08-06', NULL, 0, NULL, NULL, '2022-08-04 16:46:17', '2022-08-04 16:46:17'),
(124, 83, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-04 17:33:40', '2022-08-04 17:33:40'),
(125, 84, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-07 09:00:43', '2022-08-07 09:00:43'),
(126, 85, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-07 10:34:46', '2022-08-07 10:34:46'),
(127, 86, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 06:22:38', '2022-08-08 06:22:38'),
(128, 87, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 16:34:40', '2022-08-08 16:34:40'),
(131, 89, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-10 08:24:14', '2022-08-10 08:24:14'),
(135, 14, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-10 16:33:32', '2022-08-10 16:33:32'),
(136, 88, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-11 19:42:34', '2022-08-11 19:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases_files`
--

CREATE TABLE `criminal_cases_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases_files`
--

INSERT INTO `criminal_cases_files` (`id`, `case_id`, `uploaded_document`, `uploaded_date`, `documents_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 25, '1656256942320220222_Cr Appeal_Chuadanga_the Arms Act 1878_19A_Baker Ali & Saker Ali__BAIL.doc', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-06-26 15:22:22', '2022-06-26 15:22:22'),
(7, 25, '16562580551820220223_Chuadanga_Damurhuda_498_US 36(1) table 14(kha) of MDNA, 2018 _Md. Swapon Ali.doc', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-06-26 15:40:55', '2022-06-26 15:40:55'),
(8, 25, '16562580781Chuadanga_498_US 36(1) smaroni 14 (Kha) & 41  MDNA,  2018 _Md Shis Uddin @Polash_09.01.2022.doc', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-06-26 15:41:18', '2022-06-26 15:41:18'),
(9, 26, '165626134897Seizure List...04.doc', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-06-26 16:35:48', '2022-06-26 16:35:48'),
(10, 23, '165632282228Dlegal.docx', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-06-27 09:40:22', '2022-06-27 09:40:22'),
(13, 30, 'Plaint_ CR Case No. 3220 of 2017.pdf', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-06-29 09:59:57', '2022-06-29 09:59:57'),
(14, 13, '165632282228Dlegal.docx', NULL, NULL, 0, 'mdimranhossain985@gmail.com', NULL, '2022-06-30 10:18:15', '2022-06-30 10:18:15'),
(15, 13, '165632282228Dlegal.doc', NULL, NULL, 0, 'mdimranhossain985@gmail.com', NULL, '2022-06-30 10:18:45', '2022-06-30 10:18:45'),
(16, 13, '164741107482asdfasdf.pdf', NULL, NULL, 0, 'mdimranhossain985@gmail.com', NULL, '2022-06-30 10:19:03', '2022-06-30 10:19:03'),
(17, 13, '164966692153164509798992byden (1) (2) (3).jpg', NULL, NULL, 0, 'mdimranhossain985@gmail.com', NULL, '2022-06-30 10:22:03', '2022-06-30 10:22:03'),
(19, 31, 'Plaint_ CR Case No- 311 of 2017.pdf', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-04 06:10:05', '2022-07-04 06:10:05'),
(21, 40, 'Hajira _ SESSION 10912 of 20.doc', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-07 07:20:40', '2022-07-07 07:20:40'),
(22, 40, 'Time Petition_CR Non GR 53 0f 21.docx', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-07 07:20:40', '2022-07-07 07:20:40'),
(23, 40, 'Hajira _ SESSION 10912 of 20.doc', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-07 08:50:29', '2022-07-07 08:50:29'),
(24, 40, 'Hajira _ SESSION 10912 of 20.doc', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-07 08:50:51', '2022-07-07 08:50:51'),
(26, 48, '20220720-psg-pal-ln-md-sarwar-hossain.docx', '03-08-2022', '2', 0, 'mdimranhossain985@gmail.com', NULL, '2022-07-20 12:45:25', '2022-08-03 11:32:49'),
(27, 61, 'Case__Common__ Info.docx', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-25 16:13:34', '2022-07-25 16:13:34'),
(30, 64, 'ACI Questions (1).docx', NULL, '3', 0, 'nkzoha@gmail.com', NULL, '2022-07-27 10:43:36', '2022-08-04 05:46:24'),
(31, 64, '20220608_Chuadanga_498_US 302, 34 and 201 of Penal Code, 1860 _Md. Babor Ali and Mst. Muslima Begum.doc', NULL, '3', 0, 'nkzoha@gmail.com', NULL, '2022-07-27 10:44:10', '2022-08-04 15:33:25'),
(32, 64, 'New Document.docx', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-27 10:45:41', '2022-07-27 10:45:41'),
(33, 64, 'Test. New Document.docx', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-27 10:46:18', '2022-07-27 10:46:18'),
(34, 64, 'Plaint_ CR Case No. 311 of 2017.pdf', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-27 10:46:42', '2022-07-27 10:46:42'),
(35, 64, 'Plaint_ CR Case No. 311 of 2017.pdf', NULL, NULL, 0, 'jislam@admin.com', NULL, '2022-07-27 10:48:33', '2022-07-27 10:48:33'),
(36, 77, 'bclc-dashboard.pdf', '27-8-2022', '2', 0, 'jislam@admin.com', NULL, '2022-08-02 11:10:51', '2022-08-04 08:38:29'),
(37, 77, 'bclc-dashboardpdf.pdf', '25-8-2022', '1', 0, 'jislam@admin.com', NULL, '2022-08-03 04:23:04', '2022-08-04 08:37:36'),
(38, 78, 'asd. fas. d_f.pdf', NULL, NULL, 0, 'mdimranhossain985@gmail.com', NULL, '2022-08-03 10:18:53', '2022-08-03 10:18:53'),
(39, 81, 'asd-fas-d-f.pdf', '12-08-2022', '3', 0, 'mdimranhossain985@gmail.com', NULL, '2022-08-03 12:13:55', '2022-08-03 12:14:16'),
(40, 64, 'occupency-certificate-rajuk.pdf', '14-10-2020', '1', 0, 'nkzoha@gmail.com', NULL, '2022-08-03 15:43:18', '2022-08-03 15:43:18'),
(41, 82, 'seizure-list-04.doc', '25-08-2022', NULL, 0, 'jislam@admin.com', NULL, '2022-08-03 15:43:32', '2022-08-03 15:43:32'),
(42, 9, 'bclc-dashboard.pdf', '24-08-2022', '1', 0, 'mdimranhossain985@gmail.com', NULL, '2022-08-04 06:23:38', '2022-08-04 06:23:49'),
(43, 83, 'bclc-dashboard.pdf', '10-08-2022', '3', 0, 'mdimranhossain985@gmail.com', NULL, '2022-08-06 04:59:01', '2022-08-06 04:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases_letter_notices`
--

CREATE TABLE `criminal_cases_letter_notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `letter_notice_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_notice_documents_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_notice_documents_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_notice_particulars_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_notice_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases_letter_notices`
--

INSERT INTO `criminal_cases_letter_notices` (`id`, `case_id`, `letter_notice_date`, `letter_notice_documents_id`, `letter_notice_documents_write`, `letter_notice_particulars_write`, `letter_notice_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 73, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-31 12:27:08', '2022-07-31 12:27:08'),
(21, 74, '2022-07-06', 'Cheque', NULL, 'Test', NULL, 0, NULL, NULL, '2022-07-31 13:57:51', '2022-07-31 13:57:51'),
(22, 74, '2022-07-21', 'Cheque Dishonour', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-31 13:57:51', '2022-07-31 13:57:51'),
(23, 74, '2022-07-21', NULL, 'charge Sheet', 'Test', NULL, 0, NULL, NULL, '2022-07-31 13:57:51', '2022-07-31 13:57:51'),
(35, 75, '2022-08-10', 'Cheque', NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 09:35:43', '2022-08-01 09:35:43'),
(36, 75, '2022-08-11', 'Cheque Dishonour', NULL, 'Test', NULL, 0, NULL, NULL, '2022-08-01 09:35:43', '2022-08-01 09:35:43'),
(37, 76, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 10:18:39', '2022-08-01 10:18:39'),
(41, 78, '2022-08-01', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 10:18:53', '2022-08-03 10:18:53'),
(42, 79, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 11:37:09', '2022-08-03 11:37:09'),
(43, 80, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 11:39:43', '2022-08-03 11:39:43'),
(44, 81, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 12:09:42', '2022-08-03 12:09:42'),
(45, 82, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 15:42:40', '2022-08-03 15:42:40'),
(49, 64, '2021-06-23', '3', NULL, 'abcccc faaag sdgvsf sdfcvb dvfb jhgbsdhgbigb', '2', 0, NULL, NULL, '2022-08-03 15:47:48', '2022-08-03 15:47:48'),
(50, 64, '2022-03-08', NULL, 'Letter', 'xyzzzz gdyihg uigdighui uiryuih jksghsuighbu', '3', 0, NULL, NULL, '2022-08-03 15:47:48', '2022-08-03 15:47:48'),
(55, 83, '2022-08-09', '16', NULL, 'Test', '2', 0, NULL, NULL, '2022-08-07 06:19:04', '2022-08-07 06:19:04'),
(56, 83, '2022-08-10', NULL, 'Cheque Dishnour', NULL, '1', 0, NULL, NULL, '2022-08-07 06:19:04', '2022-08-07 06:19:04'),
(57, 83, '2022-08-17', '9', NULL, 'Test', '2', 0, NULL, NULL, '2022-08-07 06:19:04', '2022-08-07 06:19:04'),
(58, 83, '2022-09-01', NULL, 'charge Sheet', NULL, '3', 0, NULL, NULL, '2022-08-07 06:19:04', '2022-08-07 06:19:04'),
(59, 84, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-07 09:00:43', '2022-08-07 09:00:43'),
(64, 85, '2015-05-10', '16', NULL, NULL, '1', 0, NULL, NULL, '2022-08-07 15:54:23', '2022-08-07 15:54:23'),
(65, 85, '2015-05-20', '15', NULL, NULL, '1', 0, NULL, NULL, '2022-08-07 15:54:23', '2022-08-07 15:54:23'),
(66, 85, '2015-05-28', '14', NULL, NULL, '2', 0, NULL, NULL, '2022-08-07 15:54:23', '2022-08-07 15:54:23'),
(67, 86, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 06:22:38', '2022-08-08 06:22:38'),
(68, 77, '2020-01-22', '16', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 14:58:28', '2022-08-08 14:58:28'),
(69, 77, '2020-01-23', '15', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 14:58:28', '2022-08-08 14:58:28'),
(70, 77, '2020-05-02', '10', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 14:58:28', '2022-08-08 14:58:28'),
(77, 69, '2019-07-04', '16', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:13:33', '2022-08-08 15:13:33'),
(78, 69, '2019-08-29', '15', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:13:33', '2022-08-08 15:13:33'),
(79, 69, '2019-09-19', '14', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:13:33', '2022-08-08 15:13:33'),
(101, 68, '2019-07-04', '16', NULL, 'Cheque No. 3215092', '1', 0, NULL, NULL, '2022-08-08 15:43:19', '2022-08-08 15:43:19'),
(102, 68, '2019-08-28', '15', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:43:19', '2022-08-08 15:43:19'),
(103, 68, '2019-07-04', '16', NULL, 'Cheque No. 3215093', '1', 0, NULL, NULL, '2022-08-08 15:43:19', '2022-08-08 15:43:19'),
(104, 68, '2019-08-28', '15', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:43:19', '2022-08-08 15:43:19'),
(105, 68, '2019-07-04', '16', NULL, 'Cheque No. 3215094', '1', 0, NULL, NULL, '2022-08-08 15:43:19', '2022-08-08 15:43:19'),
(106, 68, '2019-08-28', '15', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:43:19', '2022-08-08 15:43:19'),
(107, 68, '2019-09-19', '14', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:43:19', '2022-08-08 15:43:19'),
(108, 67, '2022-03-21', '16', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:54:54', '2022-08-08 15:54:54'),
(109, 67, '2022-03-22', '15', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:54:54', '2022-08-08 15:54:54'),
(110, 67, '2022-04-20', '14', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 15:54:54', '2022-08-08 15:54:54'),
(111, 66, '2022-03-22', '16', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 16:08:40', '2022-08-08 16:08:40'),
(112, 66, '2022-03-27', '15', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 16:08:40', '2022-08-08 16:08:40'),
(113, 66, '2022-04-20', '14', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 16:08:40', '2022-08-08 16:08:40'),
(114, 53, '2021-06-01', '16', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 16:19:30', '2022-08-08 16:19:30'),
(115, 53, '2021-01-27', '15', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 16:19:30', '2022-08-08 16:19:30'),
(116, 53, '2021-08-02', '14', NULL, NULL, '1', 0, NULL, NULL, '2022-08-08 16:19:30', '2022-08-08 16:19:30'),
(120, 89, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-10 08:24:14', '2022-08-10 08:24:14'),
(124, 87, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-10 15:24:35', '2022-08-10 15:24:35'),
(125, 54, '2015-05-11', '16', NULL, NULL, '3', 0, NULL, NULL, '2022-08-10 15:27:58', '2022-08-10 15:27:58'),
(126, 54, '2015-05-25', '15', NULL, NULL, '3', 0, NULL, NULL, '2022-08-10 15:27:58', '2022-08-10 15:27:58'),
(127, 54, '2015-07-06', '14', NULL, NULL, '1', 0, NULL, NULL, '2022-08-10 15:27:58', '2022-08-10 15:27:58'),
(131, 14, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-10 16:33:32', '2022-08-10 16:33:32'),
(132, 88, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-11 19:42:34', '2022-08-11 19:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_cases_send_messages`
--

CREATE TABLE `criminal_cases_send_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_sms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_cases_send_messages`
--

INSERT INTO `criminal_cases_send_messages` (`id`, `case_id`, `case_no`, `client_name`, `send_sms`, `send_mail`, `client_mobile`, `client_email`, `messages`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 64, 'C.R. 1545 of 2015 ,                         Sessions\r\n                        22999/2019', NULL, '0', '1', '01700000000', 'nkzoha@gmail.com', 'CRIMINAL CASE NO. C.R. 1545 OF 2015 , SESSIONS 22999 OF 2019\r\n\r\nNext Date: 31-07-2022', 0, NULL, NULL, '2022-07-28 14:19:14', '2022-07-28 14:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_case_activity_logs`
--

CREATE TABLE `criminal_case_activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `activity_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_action` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_progress` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_mode_id` int(11) DEFAULT NULL,
  `activity_mode_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_spend_manual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_engaged_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_engaged_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_forwarded_to_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_forwarded_to_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_case_activity_logs`
--

INSERT INTO `criminal_case_activity_logs` (`id`, `case_id`, `activity_date`, `activity_action`, `activity_progress`, `activity_mode_id`, `activity_mode_write`, `start_time`, `end_time`, `total_time`, `time_spend_manual`, `activity_engaged_id`, `activity_engaged_write`, `activity_forwarded_to_id`, `activity_forwarded_to_write`, `activity_remarks`, `activity_requirements`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '9/1/2019', 'Arranged a meeting', 'Meeting Successful', 4, NULL, '2019-01-09T17:30', '2019-01-09T18:40', '1.1666666666666667 Hrs', NULL, 'Shahin Alom Talukder', NULL, NULL, 'Zahirul Haque', NULL, NULL, 0, NULL, NULL, '2022-05-16 11:07:26', '2022-05-16 11:07:26'),
(2, 1, '7/2/2019', 'Sent file for Summary', 'made summary successfully', 1, NULL, '2019-02-07T16:00', '2019-02-10T17:00', '73 Hrs', NULL, 'Md. Zohurul Haque', NULL, '4', NULL, NULL, NULL, 0, NULL, NULL, '2022-05-16 11:15:28', '2022-05-17 07:31:21'),
(3, 2, '10/6/2021', 'Arranged a meeting', 'Meeting Successful', 2, NULL, '2021-06-17T11:20', '2021-06-17T12:20', '1 Hrs', NULL, 'Md. Zohurul Haque', NULL, NULL, 'Md. Johiru Islam', NULL, NULL, 0, NULL, NULL, '2022-05-17 11:18:12', '2022-05-17 11:18:12'),
(4, 3, '10/3/2021', 'Arranged a meeting', 'Meeting Successful', 3, NULL, '2021-03-10T14:00', '2021-03-10T15:10', '1.1666666666666667 Hrs', NULL, 'Shahin Alom Talukder', NULL, '5', NULL, NULL, NULL, 0, NULL, NULL, '2022-05-18 09:46:46', '2022-05-18 09:46:46'),
(5, 3, '16/3/2021', 'Sent file for Summary', 'made summary successfully', 2, NULL, NULL, NULL, NULL, NULL, 'Md. Zohurul Haque', NULL, '4', NULL, NULL, NULL, 0, NULL, NULL, '2022-05-18 09:47:30', '2022-05-18 09:47:30'),
(6, 8, '2015-06-10', 'Arranged a meeting', 'Meeting Successful', 4, NULL, '2015-06-10T12:40', '2015-06-10T13:40', '1 Hrs', NULL, NULL, 'Md. Niamul Kabir', NULL, 'Md. Johiru Islam', NULL, NULL, 0, NULL, NULL, '2022-05-23 05:52:37', '2022-05-23 05:53:01'),
(7, 8, '2015-06-16', 'Sent file for Sending Legal Notice', 'Sent Legal Notice', 2, NULL, NULL, NULL, NULL, NULL, 'Shahin Alom Talukder', NULL, NULL, 'Zahirul Haque', NULL, NULL, 0, NULL, NULL, '2022-05-23 05:55:23', '2022-05-23 05:55:23'),
(8, 11, '2022-05-03', 'Arranged a meeting', 'Meeting Successful', 3, NULL, '2022-05-03T13:14', '2022-05-03T14:14', '1 Hrs', NULL, 'Md. Zohurul Haque', NULL, '4', NULL, NULL, NULL, 0, NULL, NULL, '2022-05-30 06:14:01', '2022-05-30 06:14:01'),
(9, 9, '1970-01-01', 'Arranged a meeting', 'Meeting Successful', 4, NULL, '2021-08-20T14:20', '2021-09-10T15:30', '21.05 Days', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-01 05:17:08', '2022-07-28 13:41:18'),
(10, 9, '2022-06-03', 'Sent file for Summary', 'made summary successfully', 2, NULL, '2022-06-03T10:20', '2022-06-03T11:35', '1.25 Hrs', NULL, NULL, NULL, NULL, 'Md. Johirul Islam', NULL, NULL, 0, NULL, NULL, '2022-06-01 05:20:12', '2022-07-21 11:14:35'),
(11, 16, '2021-10-07', 'Arranged a meeting', 'Meeting Successful', 4, NULL, '2021-10-07T11:16', '2021-10-07T13:20', '2.066666666666667 Hrs', NULL, NULL, 'Md. Niamul Kabir', NULL, 'Md. Johiru Islam', NULL, NULL, 0, NULL, NULL, '2022-06-05 10:15:18', '2022-06-05 10:15:18'),
(12, 16, '2021-11-16', 'Sent file for Summary', 'made summary successfully', 2, NULL, '2021-11-16T10:20', '2021-11-22T17:20', '151 Hrs', NULL, 'Md. Johirul Islam', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-05 10:17:28', '2022-06-05 17:08:01'),
(13, 9, '2022-08-03', 'Prepared final draft', 'Sent final draft to Panel lawyer', 1, NULL, '2022-06-03T17:10', '2022-06-08T18:25', '5.05 Days', NULL, 'Md. Johirul Islam', NULL, '1', 'Salimullah Sarker', NULL, NULL, 1, NULL, NULL, '2022-06-19 16:22:49', '2022-07-28 13:40:59'),
(14, 9, '2022-06-26', NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 10:11:34', '2022-06-26 10:11:34'),
(15, 9, '2022-06-26', NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 10:12:57', '2022-06-26 10:12:57'),
(16, 9, '2022-07-02', NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 10:15:59', '2022-07-02 11:49:10'),
(17, 23, '2022-06-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 10:27:48', '2022-06-26 10:33:05'),
(18, 23, '1970-01-01', 'abc', 'xyz', 1, 'test', '2022-07-06T20:10', '2022-07-06T21:00', '0.83 Hrs', NULL, 'Md. Johirul Islam, Md. Niamul Kabir, N. Zoha', NULL, '6', NULL, 'mnk', 'test', 0, NULL, NULL, '2022-06-26 10:35:53', '2022-07-22 16:10:23'),
(19, 13, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, 1, NULL, NULL, '2022-06-26 10:38:02', '2022-06-26 16:40:06'),
(20, 13, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 1, NULL, NULL, '2022-06-26 10:41:59', '2022-06-26 16:40:18'),
(21, 13, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 1, NULL, NULL, '2022-06-26 10:52:48', '2022-06-26 16:40:31'),
(22, 14, '2022-06-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 11:15:18', '2022-06-26 11:15:18'),
(23, 16, '2022-06-27', NULL, NULL, 4, NULL, '2022-06-26T17:56', NULL, NULL, NULL, 'Md. Johirul Islam', NULL, '4', NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 11:56:43', '2022-06-26 11:56:43'),
(24, 13, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, 1, NULL, NULL, '2022-06-26 12:03:48', '2022-06-26 16:40:41'),
(25, 26, '2022-06-30', 'Prepared final draft', 'Sent final draft to Panel lawyer', 1, 'please take the next step', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 16:12:40', '2022-06-26 16:12:40'),
(26, 30, '2017-09-13', 'Arranged a Meeting', 'Meeting Successful', 4, NULL, '2017-09-13T20:30', '2017-09-13T21:27', '0.95 Hrs', NULL, 'Md. Johirul Islam', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 14:38:30', '2022-06-29 14:38:30'),
(27, 30, '2017-09-13', 'Arranged a Meeting', 'Meeting Successful', 4, NULL, '2017-09-13T20:30', '2017-09-13T21:27', '0.95 Hrs', NULL, 'Md. Johirul Islam', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 14:38:39', '2022-06-29 14:38:39'),
(28, 30, '2017-09-13', 'Arranged a Meeting', 'Meeting Successful', 4, NULL, '2017-09-13T20:30', '2017-09-13T21:27', '0.95 Hrs', NULL, 'Md. Johirul Islam', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 14:39:03', '2022-06-29 14:39:03'),
(29, 30, '2017-09-13', 'Arranged a Meeting', 'Meeting Successful', 4, NULL, '2017-09-13T20:30', '2017-09-13T21:27', '0.95 Hrs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 14:39:09', '2022-06-29 14:39:09'),
(30, 30, '2022-06-16', 'Arranged a Meeting', 'Meeting Successful', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 14:39:24', '2022-06-29 14:39:24'),
(31, 31, '2022-08-06', 'Prepared final draft', 'Sent final draft to Panel lawyer', 2, NULL, '2022-06-08T20:43', '2022-06-08T22:30', '1.78 Hrs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-29 14:43:56', '2022-07-02 04:47:43'),
(32, 31, '2022-06-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-29 14:44:26', '2022-07-02 04:46:59'),
(33, 31, '2022-06-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, 1, NULL, NULL, '2022-06-29 14:44:59', '2022-07-02 04:46:51'),
(34, 31, '2022-07-13', 'Sent file for Summary', 'made summary successfully', 2, NULL, NULL, NULL, NULL, NULL, 'Md. Nasir', NULL, '6', NULL, NULL, NULL, 1, NULL, NULL, '2022-07-02 04:47:27', '2022-07-02 04:47:35'),
(35, 31, '2021-08-03', 'Arranged a meeting', 'Received file of this case', 2, NULL, '2021-03-08T11:20', '2021-03-08T12:38', '1.30 Hrs', NULL, NULL, 'Md. Niamul Kabir', NULL, 'Md. Johiru Islam', NULL, NULL, 0, NULL, NULL, '2022-07-02 05:06:54', '2022-07-02 05:09:26'),
(36, 31, '2021-05-12', 'Sent file for Sending Legal Notice', 'Meeting Successful', 2, NULL, '2021-05-12T14:10', '2021-05-12T15:11', '1.02 Hrs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-02 05:08:14', '2022-07-02 05:08:14'),
(37, 9, '2022-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-02 11:49:44', '2022-07-02 11:49:44'),
(38, 34, '2022-07-04', 'Arranged a Meeting', 'Meeting Successful', 2, NULL, '2022-07-04T15:40', '2022-07-04T18:38', '2.97 Hrs', NULL, 'Md. Nasir', NULL, '4', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 11:38:49', '2022-07-06 11:38:49'),
(39, 38, '2022-06-07', 'Primary discussion and received the case', 'Provided Wakalotnama for signature', 4, 'Need to get NOC from previous Advocate.', '2022-07-06T20:45', '2022-07-06T22:30', '1.75 Hrs', NULL, 'Md.  Nasir', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 17:26:01', '2022-07-06 17:33:19'),
(40, 40, '2021-12-15', 'Arranged a meeting', 'Meeting Successful', 4, 'Discussed about whole matter', '2022-06-01T11:57', '2022-06-01T15:53', '3.93 Hrs', NULL, NULL, 'Md. Niamul Kabir', '4', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 08:58:12', '2022-07-07 09:06:29'),
(41, 40, '2022-03-08', 'Sent file for Summary', 'made summary successfully', 4, 'Discussed about how to continue the process of the case smoothly.', '2022-06-08T10:30', '2022-06-08T11:10', '0.67 Hrs', NULL, NULL, 'Md. Niamul Kabir', '4', 'Zahirul Haque', NULL, NULL, 0, NULL, NULL, '2022-07-07 08:59:51', '2022-07-07 09:07:06'),
(42, 40, '2022-07-07', 'Sent file for Sending Legal Notice', 'Sent Legal Notice', 3, 'Discussed about Sending Legal Notices', '2022-07-07T17:11', '2022-07-07T18:13', '1.03 Hrs', NULL, NULL, 'Md. Niamul Kabir', '1', 'Md. Johirul Islam', NULL, NULL, 0, NULL, NULL, '2022-07-07 09:12:23', '2022-07-07 09:12:23'),
(43, 40, '2022-06-09', 'Sent file for Sending Legal Notice', 'Received file of this case', 4, NULL, '2022-06-09T13:25', '2022-06-09T15:30', '2.08 Hrs', NULL, NULL, 'Md. Niamul Kabir', NULL, 'Md. Johirul Islam', NULL, NULL, 0, NULL, NULL, '2022-07-07 09:30:26', '2022-07-07 09:30:26'),
(44, 40, '2022-06-15', 'Sent file for Summary', 'Received file of this case', 3, NULL, '2022-06-15T11:34', '2022-06-19T12:35', '4.04 Days', NULL, NULL, 'Md. Niamul Kabir', '4', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 09:33:06', '2022-07-07 09:33:06'),
(45, 40, '2022-04-13', 'Arranged a meeting', 'Meeting Successful', 4, 'Discussed about whole matter', '2022-04-13T16:35', '2022-04-13T17:36', '1.02 Hrs', NULL, NULL, 'Md. Niamul Kabir', NULL, 'Md. Johiru Islam', NULL, NULL, 0, NULL, NULL, '2022-07-07 09:34:31', '2022-07-07 09:34:31'),
(46, 48, '2022-02-09', 'Arranged a meeting', 'Meeting Successful', 4, NULL, '2022-02-09T10:10', '2022-02-09T14:06', '3.93 Hrs', NULL, 'Md. Niamul Kabir', NULL, '2, 1', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-17 07:05:50', '2022-07-19 05:21:36'),
(47, 48, '1970-01-01', 'Sent file for Summary', 'made summary successfully', 2, NULL, '2022-05-25T11:10', '2022-05-27T17:10', '2.25 Days', NULL, 'N. Zoha', NULL, '6, 2', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-17 08:08:10', '2022-07-18 11:48:59'),
(48, 9, '2022-07-30', 'asdf', 'asdf sd', 1, NULL, '2022-06-30T16:50', '2022-07-24T16:52', '24.00 Days', NULL, 'Md. Niamul Kabir, N. Zoha', 'asdf', '2, 1', 'test test', NULL, NULL, 1, NULL, NULL, '2022-07-18 10:51:33', '2022-07-28 13:39:55'),
(49, 21, '2022-05-07', 'asdf', 'In progress', 1, NULL, '2022-07-04T17:01', '2022-07-22T17:01', '18.00 Days', NULL, 'Md. Niamul Kabir, N. Zoha', NULL, '6, 2, 1', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-18 11:01:50', '2022-07-18 11:02:05'),
(50, 48, '2022-07-07', 'asdf', 'In progress', 1, 'rewre', '2022-07-14T11:21', '2022-07-29T11:21', '15.00 Days', NULL, 'Md. Niamul Kabir', NULL, '2, 1', 'ewfdsa', NULL, NULL, 0, NULL, NULL, '2022-07-19 05:22:06', '2022-07-19 05:22:06'),
(51, 54, '1993-08-31', 'Quo est incidunt p Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo', 'Eos velit commodo Eos velit commodo  Eos velit commodo  Eos velit commodo  Eos velit commodo Eos velit commodo vEos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo', 3, 'Mollitia labore volu', '2020-05-21T09:12', '1981-05-02T17:43', '-342327.48 Hrs', NULL, 'Md. Niamul Kabir, N. Zoha', 'A velit quam cupida', '2', 'Magnam ut laborum U', 'Odio mollitia id fu Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo', 'Est pariatur Aut nEos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo Eos velit commodo', 1, NULL, NULL, '2022-07-21 05:14:10', '2022-07-21 05:15:45'),
(52, 56, '2022-07-13', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village under Damurhuda police stationTwo persons are coming towards Darshana Bazaar on foot with illegal drugs by the side of Hefjokhana of Buichitala village under Darshana police station.On the paved road 1.5 km east of 92 of Main Pillar-74 under Darshana Police Station.', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village under Damurhuda police stationTwo persons are coming towards Darshana Bazaar on foot with illegal drugs by the side of Hefjokhana of Buichitala village under Darshana police station.On the paved road 1.5 km east of 92 of Main Pillar-74 under Darshana Police Station.', 2, NULL, '2022-07-13T12:16', '2022-07-13T15:22', '3.10 Hrs', NULL, 'Md. Niamul Kabir', NULL, '6', NULL, 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village under Damurhuda police stationTwo persons are coming towards Darshana Bazaar on foot with illegal drugs by the side of Hefjokhana of Buichitala village under Darshana police station.On the paved road 1.5 km east of 92 of Main Pillar-74 under Darshana Police Station.', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village under Damurhuda police stationTwo persons are coming towards Darshana Bazaar on foot with illegal drugs by the side of Hefjokhana of Buichitala village under Darshana police station.On the paved road 1.5 km east of 92 of Main Pillar-74 under Darshana Police Station.', 0, NULL, NULL, '2022-07-23 12:16:19', '2022-07-23 12:19:46'),
(53, 60, '2022-06-07', 'Arranged a meeting', 'Meeting was successful', 4, NULL, '2022-07-13T13:13', '2022-07-13T14:14', '1.02 Hrs', NULL, 'Md. Niamul Kabir', NULL, '6', NULL, 'On 16.10.2018 at 11.30 pm, the plaintiff\'s cousin Md. Rafiqul Islam son of late Ayub Ali told Ejher named witness No. 2 Tutul Ahmed, that his father Abdur Rahman was lying unconscious in front of the gate of his house. Upon receiving the news, the plaintiff and witness No. 2 of his brother and witness No. 3 Kazali Begum quickly appeared in front of the gate of Rafiqul\'s house and saw that their father was lying on his right side. The plaintiff, the plaintiff\'s brother and Rafiqul hurriedly placed Abdur Rahman on the verandah of Rafiqul\'s house and informed witness No. 4 of the village doctor Ra', 'On 16.10.2018 at 11.30 pm, the plaintiff\'s cousin Md. Rafiqul Islam son of late Ayub Ali told Ejher named witness No. 2 Tutul Ahmed, that his father Abdur Rahman was lying unconscious in front of the gate of his house. Upon receiving the news, the plaintiff and witness No. 2 of his brother and witness No. 3 Kazali Begum quickly appeared in front of the gate of Rafiqul\'s house and saw that their father was lying on his right side. The plaintiff, the plaintiff\'s brother and Rafiqul hurriedly placed Abdur Rahman on the verandah of Rafiqul\'s house', 0, NULL, NULL, '2022-07-25 06:13:43', '2022-07-25 06:15:42'),
(54, 60, '1970-01-01', 'Sent a file to draft and Served Legal Notice', 'Legal Notice drafted and ready to serve', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'the plaintiff felt doubt in the mind about such statement of the witness No. 1, then the he asked his cousin Rafiqul about the exact cause of death of his father, Rafiqul hesitates and says different reason at different times. When the plaintiff and witness No. 1 were forcibly questioned, Rafiqul and his wife Julia Khatun said that the accused No.3 Muslima Begum came to Rafiqul\'s house on 16.10.2018 at 11.20 pm and reported that Abdur Rahman is lying unconscious in the house of the accused No. 3. After receiving the news without informing the plaintiff’s house, Rafiqul and Rafiqul\'s wife left t', 'the plaintiff felt doubt in the mind about such statement of the witness No. 1, then the he asked his cousin Rafiqul about the exact cause of death of his father, Rafiqul hesitates and says different reason at different times. When the plaintiff and witness No. 1 were forcibly questioned, Rafiqul and his wife Julia Khatun said that the accused No.3 Muslima Begum came to Rafiqul\'s house on 16.10.2018 at 11.20 pm and reported that Abdur Rahman is lying unconscious in the house of the accused No. 3. After receiving the news without informing the plaintiff’s house, Rafiqul and Rafiqul\'s wife left t', 0, NULL, NULL, '2022-07-25 06:17:51', '2022-07-25 06:19:59'),
(55, 61, '2022-07-06', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village under Damurhuda police station from under the bed in accused No. 1 Mst. Shakina Khatun\'s bedroom in a plastic shopping bag Two persons are coming towards Darshana Bazaar on foot with illegal drugs by the side of Hefjokhana of Buichitala village under Darshana police station.', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village under Damurhuda police station from under the bed in accused No. 1 Mst. Shakina Khatun\'s bedroom in a plastic shopping bag Two persons are coming towards Darshana Bazaar on foot with illegal drugs by the side of Hefjokhana of Buichitala village under Darshana police station.', 4, NULL, '2022-07-19T10:09', '2022-07-19T11:15', '1.10 Hrs', NULL, 'Md. Niamul Kabir', NULL, '6', NULL, 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village under Damurhuda police station from under the bed in accused No. 1 Mst. Shakina Khatun\'s bedroom in a plastic shopping bag Two persons are coming towards Darshana Bazaar on foot with illegal drugs by the side of Hefjokhana of Buichitala village under Darshana police station.', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village under Damurhuda police station from under the bed in accused No. 1 Mst. Shakina Khatun\'s bedroom in a plastic shopping bag Two persons are coming towards Darshana Bazaar on foot with illegal drugs by the side of Hefjokhana of Buichitala village under Darshana police station.', 0, NULL, NULL, '2022-07-25 16:09:33', '2022-07-25 17:28:28'),
(56, 61, '2022-07-23', 'Received a copy of undertaking of Mr. Alamgir', 'Forwarded to Adv Johir for drafting', 1, NULL, NULL, NULL, NULL, NULL, 'Md. Niamul Kabir', NULL, '6', NULL, NULL, 'Preparing draft notice considering the relevant documents', 0, NULL, NULL, '2022-07-25 17:39:34', '2022-07-25 17:48:34'),
(57, 61, '2022-07-24', 'Prepared draft Legal notice', 'Draft Done', 1, NULL, '2022-07-25T11:00', '2022-07-25T12:30', '1.50 Hrs', NULL, 'Md. Johirul Islam', NULL, '2', NULL, NULL, 'Please check and confirm the draft.', 0, NULL, NULL, '2022-07-25 17:45:21', '2022-07-25 17:48:58'),
(58, 61, '2022-07-25', 'Finalized draft', 'Final draft done', 1, NULL, '2022-07-25T20:50', '2022-07-25T21:20', '0.50 Hrs', NULL, 'Md. Niamul Kabir', NULL, '6', NULL, NULL, 'To be printed and served', 0, NULL, NULL, '2022-07-25 17:51:22', '2022-07-25 17:51:22'),
(59, 9, '2021-09-26', 'Virtual Meeting regarding present stage of the case', 'Decided to defend based on documents', 3, NULL, '2022-07-25T15:00', '2022-07-25T15:30', '0.50 Hrs', NULL, 'Md. Niamul Kabir', 'imran', NULL, NULL, 'Also present\r\n* Selim Reza, CFO\r\n* Fazle Rabbi, Deputy Manager', NULL, 0, NULL, NULL, '2022-07-25 17:58:53', '2022-08-03 14:27:09'),
(60, 61, '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 04:37:56', '2022-07-26 04:37:56'),
(61, 61, '2022-05-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 04:42:27', '2022-07-26 04:42:27'),
(62, 61, '2022-04-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 04:42:52', '2022-07-26 04:42:52'),
(63, 61, '2022-03-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 04:43:17', '2022-07-26 04:43:17'),
(64, 61, '2022-03-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 04:43:55', '2022-07-26 04:43:55'),
(65, 61, '2022-04-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 04:44:24', '2022-07-26 04:44:24'),
(66, 61, '2022-06-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 04:45:08', '2022-07-26 04:45:08'),
(67, 64, '2015-04-15', 'Arrange A meeting', 'Discuss about to served notice and case filling', 4, NULL, '2015-04-15T12:21', '2015-04-15T13:15', '0.90 Hrs', NULL, 'Md. Niamul Kabir', NULL, '6', NULL, 'On 16.10.2018 at 11.30 pm, the plaintiff\'s cousin Md. Rafiqul Islam son of late Ayub Ali told Ejher named witness No. 2 Tutul Ahmed, that his father Abdur Rahman was lying unconscious in front of the gate of his house. Upon receiving the news, the plaintiff and witness No. 2 of his brother and witness No. 3 Kazali Begum quickly appeared in front of the gate of Rafiqul\'s house and saw that their father was lying on his right side. The plaintiff, the plaintiff\'s brother and Rafiqul hurriedly placed Abdur Rahman on the verandah of Rafiqul\'s house and informed witness No. 4 of the village doctor Ramzan Ali, witness No. 4 examined the father of the plaintiff and declared him dead. Rafiqul and his wife Julia told the plaintiff and the plaintiff\'s relatives that the plaintiff\'s father had died of a heart attack.', 'On 16.10.2018 at 11.30 pm, the plaintiff\'s cousin Md. Rafiqul Islam son of late Ayub Ali told Ejher named witness No. 2 Tutul Ahmed, that his father Abdur Rahman was lying unconscious in front of the gate of his house. Upon receiving the news, the plaintiff and witness No. 2 of his brother and witness No. 3 Kazali Begum quickly appeared in front of the gate of Rafiqul\'s house and saw that their father was lying on his right side. The plaintiff, the plaintiff\'s brother and Rafiqul hurriedly placed Abdur Rahman on the verandah of Rafiqul\'s house and informed witness No. 4 of the village doctor Ramzan Ali, witness No. 4 examined the father of the plaintiff and declared him dead. Rafiqul and his wife Julia told the plaintiff and the plaintiff\'s relatives that the plaintiff\'s father had died of a heart attack.', 0, NULL, NULL, '2022-07-27 10:17:13', '2022-07-27 10:17:13'),
(68, 64, '2015-04-30', 'Sent all the document to take action', 'receive document', 2, NULL, '2015-04-30T11:20', '2015-04-30T12:24', '1.07 Hrs', NULL, 'Md. Niamul Kabir', NULL, '6', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 10:19:02', '2022-07-27 10:26:34'),
(69, 64, '2015-05-03', 'discuss about sending legal notice', 'Legal notice drafting final', 3, NULL, '2015-05-03T11:30', '2015-05-03T12:15', '0.75 Hrs', '30 Min', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 10:30:49', '2022-07-27 17:41:11'),
(70, 64, '1970-01-01', 'Preparing report', 'prepared a draft report', 4, NULL, '2022-07-10T10:00', '2022-07-26T16:00', '16 days 6 hours 0 minutes', '3 Hrs', 'Md. Johirul Islam', NULL, '2', 'Salimullah Sarker', 'Draft done', NULL, 0, NULL, NULL, '2022-07-27 17:45:07', '2022-08-03 16:03:18'),
(71, 9, '2022-12-07', 'kjlk;', 'fiygojjjo', 4, NULL, NULL, NULL, NULL, '60 Min', 'Md. Niamul Kabir, N. Zoha', 'imran', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-30 15:40:08', '2022-08-03 08:55:09'),
(72, 75, '2022-10-08', 'adfd sadfasdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 05:45:29', '2022-08-01 05:45:39'),
(73, 76, '2022-08-03', 'asdf', 'wer', 1, 'wer', '2022-08-19T17:50', '2022-09-03T17:50', '15 days 0 hours 0 minutes', 'werewaf', 'Md. Niamul Kabir', NULL, '6', NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 11:50:52', '2022-08-01 11:50:52'),
(74, 76, '2022-08-30', 'tes tas df gf gd sdf asdf', NULL, 1, 'eta sdf afg dfg', '2022-08-04T17:51', '2022-08-27T17:51', '23 days 0 hours 0 minutes', 'asfd', 'N. Zoha', NULL, '2', NULL, 'asdf asdf adsf a', 'test asd asd', 0, NULL, NULL, '2022-08-01 11:52:04', '2022-08-01 11:52:04'),
(75, 76, '2022-06-06', 'asd fwer', 'asdf asdf dgf', NULL, NULL, '2022-08-05T17:52', '2022-08-30T17:52', '25 days 0 hours 0 minutes', 'easdf', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 11:52:44', '2022-08-01 11:52:44'),
(76, 23, '2022-08-01', 'Discussed the progress of the file with the client.', 'Found a law point', NULL, 'Mobile', NULL, NULL, NULL, '15 Min', 'Md. Niamul Kabir', 'Md. Nasir', NULL, NULL, 'To search relevant Govt. Circular', NULL, 0, NULL, NULL, '2022-08-01 17:31:32', '2022-08-01 17:31:32'),
(77, 77, '2022-08-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-02 12:02:56', '2022-08-02 12:02:56'),
(78, 78, '2022-08-06', NULL, NULL, NULL, NULL, '2022-08-16T16:19', '2022-08-04T16:19', '-288.00 Hrs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 10:19:51', '2022-08-03 10:19:51'),
(79, 79, '2022-08-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 11:43:53', '2022-08-03 11:43:53'),
(80, 81, '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Md. Niamul Kabir', 'Md. Nasir', '6', 'Salimullah Sarker', NULL, NULL, 0, NULL, NULL, '2022-08-03 12:13:31', '2022-08-03 16:05:22'),
(81, 83, '2022-02-08', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village u', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'Salimullah Sarker', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village u', 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village u', 0, NULL, NULL, '2022-08-04 17:30:05', '2022-08-04 17:31:09'),
(82, 83, '2022-08-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N. Zoha', 'Md. Niamul Kabir', '6', 'Zahirul Haque', NULL, NULL, 0, NULL, NULL, '2022-08-07 05:20:17', '2022-08-07 05:20:17'),
(83, 83, '2022-08-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'Zahirul Haque', NULL, NULL, 0, NULL, NULL, '2022-08-07 06:38:50', '2022-08-07 06:38:50'),
(84, 85, '2022-08-18', 'Arranged a meeting', 'Meeting was successful', 2, NULL, NULL, NULL, NULL, NULL, 'Md. Niamul Kabir', NULL, '6', 'Zahirul Haque', NULL, NULL, 0, NULL, NULL, '2022-08-08 06:04:07', '2022-08-08 06:04:07'),
(85, 85, '2022-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-08 06:09:21', '2022-08-08 06:09:35'),
(86, 19, '2022-11-08', 'Informed Mr. Hassan regarding the case date and steps to be taken.', 'Mr. Hasan told that he will let us know after consulting client.', 5, 'Mobile', '2022-08-11T17:10', '2022-08-11T17:18', '0.13 Hrs', '8 Min', 'Md. Niamul Kabir', NULL, NULL, NULL, 'To give TP in next date.', 'to draft WS', 0, NULL, NULL, '2022-08-11 11:21:29', '2022-08-11 11:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_case_status_logs`
--

CREATE TABLE `criminal_case_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `updated_case_status_id` int(11) DEFAULT NULL,
  `updated_case_status_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_fixed_for_id` int(11) DEFAULT NULL,
  `updated_fixed_for_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_proceedings_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_proceedings_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_court_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_court_order_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_index_fixed_for_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_index_fixed_for_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_day_notes_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_day_notes_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_engaged_advocate_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_engaged_advocate_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_next_day_presence_id` int(11) DEFAULT NULL,
  `updated_remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criminal_case_status_logs`
--

INSERT INTO `criminal_case_status_logs` (`id`, `case_id`, `updated_case_status_id`, `updated_case_status_write`, `updated_order_date`, `updated_fixed_for_id`, `updated_fixed_for_write`, `court_proceedings_id`, `court_proceedings_write`, `updated_court_order_id`, `updated_court_order_write`, `updated_next_date`, `updated_index_fixed_for_id`, `updated_index_fixed_for_write`, `updated_day_notes_id`, `updated_day_notes_write`, `updated_engaged_advocate_id`, `updated_engaged_advocate_write`, `updated_next_day_presence_id`, `updated_remarks`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 19, NULL, '14/3/2019', 8, NULL, 'Filed complaint petition', NULL, 'Service Return (SR)', NULL, '14/5/2019', '8', NULL, 'Submitted Complaint Hazira', NULL, '2', NULL, 1, 'to file W/A petition', 0, NULL, NULL, '2022-05-16 10:25:45', '2022-05-17 07:30:42'),
(2, 1, 13, NULL, '14/5/2019', 8, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '20/7/2022', '4', NULL, 'Submitted Complaint Hazira', NULL, '2', NULL, 1, NULL, 0, NULL, NULL, '2022-05-16 11:00:52', '2022-05-17 07:31:38'),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dd/mm/yyyy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-16 11:35:48', '2022-05-16 11:38:05'),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dd/mm/yyyy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-16 11:36:30', '2022-05-16 11:38:12'),
(5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dd/mm/yyyy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-16 11:36:33', '2022-05-16 11:38:20'),
(6, 2, 30, NULL, '11/8/2021', 8, NULL, 'Filed complaint petition and issued Summon', NULL, 'Service Return (SR)', NULL, '7/10/2021', '8', NULL, 'Completed case filing successfully', NULL, '2', NULL, 1, 'if summon duly served to file W/A Petition', 0, NULL, NULL, '2022-05-17 11:07:30', '2022-05-17 11:08:07'),
(7, 2, 21, NULL, '7/10/2021', 4, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '30/12/2021', '4', NULL, 'Submitted Complaint Hazira', NULL, '1', NULL, 1, NULL, 0, NULL, NULL, '2022-05-17 11:15:39', '2022-05-17 11:15:39'),
(8, 3, 30, NULL, '2021-06-02', 14, NULL, 'Filed complaint petition and issued Summon', NULL, 'Service Return (SR)', NULL, '2021-07-14', '8', NULL, 'Completed case filing successfully, Submitted Complaint Hazira', NULL, '2', NULL, 1, NULL, 0, NULL, NULL, '2022-05-18 09:35:26', '2022-05-19 10:17:05'),
(9, 3, NULL, 'W/A', '2021-07-14', 8, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '2021-11-21', '4', NULL, 'Submitted Complaint Hazira', NULL, '1', NULL, 1, NULL, 0, NULL, NULL, '2022-05-18 09:37:33', '2022-05-19 10:15:33'),
(10, 3, NULL, 'W/A', '2021-11-21', 4, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '2022-03-20', '4', NULL, 'Submitted Complaint Hazira', NULL, '5', NULL, 1, 'to file WP&A petition', 0, NULL, NULL, '2022-05-18 09:44:33', '2022-05-19 10:16:37'),
(11, 5, 30, NULL, '2021-06-02', 14, NULL, 'Filed complaint petition and issued Summon', NULL, 'Issued Summon', NULL, '2021-07-14', '8', NULL, 'Completed case filing successfully, Submitted Complaint Hazira', NULL, '6', NULL, 1, NULL, 0, NULL, NULL, '2022-05-19 10:34:25', '2022-05-19 10:34:25'),
(12, 5, 13, NULL, '2021-07-14', 8, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '2021-11-21', '4', NULL, 'Submitted Complaint Hazira', NULL, '1', NULL, 1, NULL, 0, NULL, NULL, '2022-05-19 10:36:27', '2022-05-19 10:36:27'),
(13, 5, 21, NULL, '2021-11-21', 4, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '2022-03-20', NULL, NULL, 'Submitted Complaint Hazira', NULL, '5', NULL, 1, NULL, 0, NULL, NULL, '2022-05-19 10:39:17', '2022-05-19 10:43:26'),
(14, 7, 30, NULL, '2019-11-13', 14, NULL, 'Filed complaint petition and issued Summon', NULL, 'Issued Summon', NULL, '2020-01-14', '8', NULL, 'Completed case filing successfully', 'Submitted Complaint Hazira', '2', NULL, 1, NULL, 0, NULL, NULL, '2022-05-19 10:57:45', '2022-05-21 14:13:57'),
(15, 8, 30, NULL, '2015-08-13', 14, NULL, 'Filed complaint petition and issued Summon', NULL, 'Service Return (SR)', NULL, '2015-09-22', '8', NULL, 'Completed case filing successfully', NULL, '6', NULL, 1, NULL, 0, NULL, NULL, '2022-05-23 04:57:13', '2022-05-23 04:57:13'),
(16, 8, 13, NULL, '2015-09-22', 8, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '2016-02-01', '8', NULL, 'Submitted Complaint Hazira', NULL, '5', NULL, 1, NULL, 0, NULL, NULL, '2022-05-23 04:59:08', '2022-05-23 04:59:08'),
(17, 8, 13, NULL, '2016-02-01', 8, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '2016-06-14', '4', NULL, 'Submitted Complaint Hazira', NULL, '2', NULL, 1, NULL, 0, NULL, NULL, '2022-05-23 05:00:25', '2022-05-23 05:00:25'),
(18, 8, 21, NULL, '2016-06-14', 4, NULL, NULL, 'Accept Hajira', 'Warrant of Arrest', NULL, '2017-08-02', '4', NULL, 'Submitted Complaint Hazira', NULL, '1', NULL, 1, NULL, 0, NULL, NULL, '2022-05-23 05:02:23', '2022-05-23 05:02:23'),
(19, 8, 21, NULL, '2017-08-02', 4, NULL, 'Filed Petition', NULL, 'Warrant of Proclamation and Attachment (WP&A)', NULL, '2018-01-10', '6', NULL, 'Submitted Complaint Hazira', NULL, '2', NULL, 1, NULL, 0, NULL, NULL, '2022-05-23 05:22:39', '2022-05-23 05:22:39'),
(20, 2, 21, NULL, '2021-12-30', 4, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '2022-02-16', '4', NULL, NULL, NULL, '5', NULL, NULL, NULL, 0, NULL, NULL, '2022-05-24 12:56:54', '2022-05-24 12:57:54'),
(21, 1, NULL, NULL, '2022-05-25', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-25 11:58:22', '2022-05-25 11:58:22'),
(22, 8, 22, NULL, '2021-09-29', 11, NULL, 'Filed complaint petition', NULL, NULL, NULL, '2022-06-07', '11', NULL, 'Submitted Complaint Hazira', NULL, '5', NULL, 1, NULL, 0, NULL, NULL, '2022-05-26 05:55:45', '2022-05-26 05:55:45'),
(23, 7, 21, NULL, '2022-01-27', 4, NULL, NULL, 'Accept WP&A petition', NULL, NULL, '2022-06-05', '4', NULL, 'Submitted Complaint Hazira', NULL, '5', NULL, 1, 'petition of WP&A submitted on previous date and pending for hearing.', 0, NULL, NULL, '2022-05-26 06:14:27', '2022-05-26 06:14:27'),
(24, 9, 38, 'test', '2021-09-12', 15, NULL, 'Filed Petition', NULL, 'Issued Summon', NULL, '2021-11-25', '8', NULL, NULL, NULL, NULL, 'Md. Johirul Islam', NULL, 'testttt', 0, NULL, NULL, '2022-05-28 07:45:00', '2022-06-02 10:41:57'),
(25, 9, 13, NULL, '2021-11-25', 8, NULL, '2nd Party appeared by Wokalotnama', NULL, 'Wokalotnama accepted', 'Written Statement', '2021-12-23', '7', NULL, '2nd Party was present', NULL, 'Md. Johirul Islam', NULL, 1, 'To submit WS', 0, NULL, NULL, '2022-05-28 07:49:16', '2022-06-02 11:58:57'),
(26, 9, 23, NULL, '2021-12-23', 7, NULL, '2nd Party submitted TP for submitting WS', NULL, 'TP granted', NULL, '2022-02-20', '7', NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, '2022-05-28 07:58:38', '2022-05-28 07:58:38'),
(27, 9, 23, NULL, '2022-02-20', 7, NULL, '2nd Party submitted TP for submitting WS', NULL, 'TP granted', NULL, '2022-03-30', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 07:59:38', '2022-05-28 07:59:38'),
(28, 9, 23, NULL, '2022-03-30', 7, NULL, '2nd Party submitted TP for submitting WS', NULL, 'TP granted', NULL, '2022-04-26', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-28 08:00:24', '2022-05-28 08:00:24'),
(29, 9, 23, NULL, '2022-04-26', 7, NULL, '2nd Party submitted TP for submitting WS', NULL, NULL, 'TP granted for Last Time', '2022-05-18', '7', NULL, NULL, NULL, NULL, NULL, 1, 'To submit WS (Last Time)', 0, NULL, NULL, '2022-05-28 08:01:41', '2022-08-03 14:19:24'),
(30, 9, 23, NULL, '2022-05-31', 7, NULL, NULL, '* Submitted WS * Submitted application for non-maintenance of the Petition', 'Accepted WS', NULL, '2022-05-31', '5', NULL, NULL, NULL, NULL, NULL, 1, 'Hearing of non-maintenance of the Petition', 0, NULL, NULL, '2022-05-28 08:03:24', '2022-07-31 18:56:20'),
(31, 11, 13, NULL, '2022-02-02', 8, NULL, NULL, NULL, 'Service Return (SR), TP granted', NULL, '2022-03-30', '4', NULL, NULL, NULL, '5', NULL, 1, NULL, 0, NULL, NULL, '2022-05-30 06:11:00', '2022-05-30 07:29:18'),
(32, 11, 21, NULL, '2022-03-30', 8, NULL, NULL, NULL, 'Warrant of Proclamation and Attachment (WP&A)', NULL, '2022-05-18', '6', NULL, 'Submitted Complaint Hazira', NULL, '1', NULL, 1, NULL, 0, NULL, NULL, '2022-05-30 06:19:52', '2022-05-30 07:30:00'),
(33, 11, 6, NULL, '2022-05-18', 6, NULL, NULL, NULL, 'Warrant of Proclamation and Attachment (WP&A)', NULL, '2022-07-13', '6', NULL, 'Submitted Complaint Hazira', NULL, '5', NULL, 1, NULL, 0, NULL, NULL, '2022-05-30 06:25:39', '2022-05-30 07:30:35'),
(34, 13, 38, NULL, '2021-07-22', 8, NULL, 'Filed Petition', NULL, 'Issued Summon', NULL, '2021-12-13', '8', NULL, NULL, NULL, 'Md. Johirul Islam', NULL, NULL, NULL, 0, NULL, NULL, '2022-05-31 01:24:20', '2022-06-02 10:30:33'),
(35, 13, 13, NULL, '2021-12-13', 8, NULL, '2nd Party submitted TP for submitting WS', NULL, 'TP granted', NULL, '2022-03-24', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-31 01:26:40', '2022-05-31 01:26:40'),
(36, 13, 13, NULL, '2022-03-24', 8, NULL, '2nd Party submitted TP for submitting WS', NULL, 'TP granted', NULL, '2022-06-06', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-31 01:27:24', '2022-06-06 11:02:36'),
(37, 9, 23, NULL, '2022-05-31', 5, NULL, NULL, 'Partly Heard', 'Petition Hearing', NULL, '2022-06-23', '5', NULL, NULL, '1st party submitted reply to WS', NULL, NULL, 1, NULL, 0, NULL, NULL, '2022-05-31 10:21:05', '2022-06-19 16:30:22'),
(38, 14, 49, NULL, '2022-11-05', 10, NULL, '2nd Party submitted TP for submitting WS', NULL, 'Issued Summon', NULL, '2022-08-06', '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-01 09:16:57', '2022-06-01 09:17:17'),
(39, 16, 30, NULL, '2021-12-02', 14, NULL, 'Filed complaint petition and issued Summon', NULL, 'Service Return (SR)', NULL, '2022-02-08', '8', NULL, 'Completed case filing successfully', NULL, 'Md. Johirul Islam', NULL, 1, NULL, 0, NULL, NULL, '2022-06-05 10:02:47', '2022-06-05 16:15:42'),
(40, 13, 13, NULL, '2022-06-14', 8, NULL, NULL, NULL, NULL, NULL, '2022-07-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-05 10:03:09', '2022-06-06 11:03:18'),
(41, 16, 13, NULL, '2022-02-08', 8, NULL, NULL, NULL, 'Service Return (SR)', NULL, '2022-05-11', '8', NULL, 'Submitted Complaint Hazira', NULL, 'Tamzid Islam none', NULL, 1, NULL, 0, NULL, NULL, '2022-06-05 10:05:51', '2022-06-05 10:05:51'),
(42, 16, 21, NULL, '2022-05-11', 4, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '2022-08-08', '4', NULL, 'Submitted Complaint Hazira', NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, '2022-06-05 10:08:00', '2022-06-07 05:17:13'),
(43, 9, 23, NULL, '2022-06-23', 5, NULL, NULL, NULL, NULL, 'Time petition allowed for the last time', '2022-07-21', '5', NULL, NULL, NULL, 'Md. Zohurul Haque', NULL, NULL, 'Must submit Job description', 1, NULL, NULL, '2022-06-23 06:13:40', '2022-07-04 15:08:46'),
(44, 13, 28, NULL, '2022-06-06', 7, NULL, NULL, '2nd party submitted written statement and a petition for rejection of plaint', 'Petition Hearing', NULL, '2022-10-16', '5', NULL, '2nd Party was present', NULL, 'Md. Zohurul Haque', NULL, 1, NULL, 0, NULL, NULL, '2022-06-23 09:48:39', '2022-06-23 10:12:48'),
(45, 13, 28, NULL, '1970-01-01', 7, NULL, NULL, NULL, NULL, NULL, '2022-06-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-23 10:13:17', '2022-06-23 10:13:32'),
(46, 16, 21, NULL, '2022-08-08', 11, NULL, '2nd Party submitted TP for submitting WS', NULL, 'Petition Hearing', NULL, '2022-06-26', '15', NULL, 'Completed case filing successfully', NULL, 'Md. Zohurul Haque', NULL, 2, NULL, 0, NULL, NULL, '2022-06-26 11:55:56', '2022-06-26 11:55:56'),
(47, 27, NULL, NULL, '2022-01-05', 16, NULL, NULL, NULL, NULL, NULL, '2022-02-24', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 16:45:45', '2022-06-26 16:45:45'),
(48, 27, NULL, NULL, '1970-01-01', 16, NULL, NULL, NULL, NULL, NULL, '2022-06-30', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 16:46:17', '2022-06-26 16:46:17'),
(49, 31, 38, NULL, '2017-02-19', 14, NULL, 'Filed complaint petition and issued Summon', NULL, 'Issued Summon', NULL, '2017-05-21', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 10:38:20', '2022-06-29 10:38:20'),
(50, 31, 13, NULL, '2017-05-21', 8, NULL, NULL, 'Accept Haira', 'Service Return (SR)', NULL, '2017-10-12', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 10:39:54', '2022-06-29 10:46:46'),
(51, 31, 13, NULL, '2017-10-12', 8, NULL, 'Filed Petition', 'Accept Hajira', 'Warrant of Arrest', NULL, '2018-03-19', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 10:41:54', '2022-06-29 10:46:08'),
(52, 31, 21, NULL, '2018-03-19', 4, NULL, NULL, 'Accept Hajira', NULL, NULL, '2018-05-14', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 10:43:42', '2022-06-29 10:47:58'),
(53, 31, 6, NULL, '2018-05-14', 4, NULL, 'Filed Petition', 'Accept Hajira', 'Warrant of Proclamation and Attachment (WP&A)', NULL, '2018-09-13', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 10:49:24', '2022-06-29 10:49:50'),
(54, 31, 6, NULL, '1970-01-01', 4, NULL, NULL, NULL, NULL, NULL, '2019-04-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-29 10:52:12', '2022-06-29 10:52:22'),
(55, 31, 6, NULL, '1970-01-01', 4, NULL, NULL, NULL, NULL, NULL, '2018-10-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-29 10:59:16', '2022-06-29 10:59:25'),
(56, 31, 6, NULL, '1970-01-01', 4, NULL, NULL, NULL, NULL, NULL, '2022-10-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-29 11:00:40', '2022-07-02 04:49:24'),
(57, 31, 6, NULL, '1970-01-01', 4, NULL, NULL, NULL, NULL, NULL, '2018-10-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-29 11:00:46', '2022-07-02 04:49:09'),
(58, 30, 30, NULL, '2017-12-31', 15, NULL, 'Filed complaint petition', NULL, 'Issued Summon', NULL, '2018-05-03', '8', NULL, NULL, NULL, 'Md. Johirul Islam', NULL, NULL, NULL, 0, NULL, NULL, '2022-06-29 14:31:07', '2022-06-29 14:32:47'),
(59, 30, 13, NULL, '2018-03-05', 8, NULL, NULL, NULL, NULL, NULL, '2018-07-17', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-29 14:32:21', '2022-07-06 18:08:18'),
(60, 30, 13, NULL, '2018-07-17', 8, NULL, 'Filed Petition', NULL, 'Warrant of Arrest', NULL, '2018-12-23', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-29 14:34:18', '2022-07-06 18:08:37'),
(61, 31, 6, NULL, '1970-01-01', 4, NULL, NULL, NULL, NULL, NULL, '2019-04-21', '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-02 05:13:16', '2022-07-02 05:13:24'),
(62, 31, 6, NULL, '1970-01-01', 4, NULL, NULL, 'Accept Hajira', 'Warrant of Proclamation and Attachment (WP&A)', NULL, '2019-04-21', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-02 05:14:03', '2022-07-02 05:14:03'),
(63, 9, 23, NULL, '1970-01-01', 5, NULL, NULL, NULL, NULL, NULL, '2022-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-02 11:49:20', '2022-07-04 15:08:02'),
(64, 9, 23, NULL, '2022-02-07', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-02 11:50:10', '2022-07-04 15:08:12'),
(65, 31, 23, NULL, '1970-01-01', 6, NULL, NULL, NULL, NULL, NULL, '2022-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-02 16:02:07', '2022-07-02 16:03:44'),
(66, 31, 6, NULL, '2022-02-07', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-02 16:03:14', '2022-07-02 16:03:36'),
(67, 32, 28, NULL, '2022-05-12', 8, NULL, NULL, NULL, NULL, NULL, '2022-07-07', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-04 06:15:24', '2022-07-04 06:15:24'),
(68, 32, 24, NULL, '2022-07-07', 4, NULL, NULL, NULL, NULL, NULL, '2022-08-25', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-04 06:20:22', '2022-07-04 06:20:22'),
(69, 9, 23, NULL, '2022-06-23', 5, NULL, '2nd Party submitted TP for submitting Documents', NULL, 'TP granted', NULL, '2022-07-21', '5', NULL, NULL, NULL, NULL, NULL, 2, 'Relevant Documents to be submitted', 0, NULL, NULL, '2022-07-04 15:15:55', '2022-07-23 11:52:59'),
(70, 34, 22, NULL, '2022-06-28', NULL, NULL, '2nd Party submitted TP for submitting WS', NULL, 'Issued Summon', NULL, '2022-08-17', '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-06 11:18:40', '2022-07-06 11:19:04'),
(71, 34, 56, NULL, '2021-11-07', 10, NULL, NULL, NULL, NULL, 'Charged Framed', '2022-06-26', '11', NULL, NULL, NULL, 'Md. Johirul Islam', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 11:26:15', '2022-07-06 11:26:15'),
(72, 34, 22, NULL, '1970-01-01', 11, NULL, NULL, NULL, NULL, 'Time Petition Allowed', '2023-04-26', '11', NULL, NULL, NULL, 'Md. Nasir', NULL, NULL, NULL, 1, NULL, NULL, '2022-07-06 11:30:12', '2022-07-06 11:31:00'),
(73, 34, 22, NULL, '1970-01-01', 11, NULL, NULL, NULL, NULL, NULL, '2023-04-26', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-06 11:31:28', '2022-07-06 11:31:55'),
(74, 34, 56, NULL, '1970-01-01', 11, NULL, NULL, NULL, NULL, NULL, '2022-07-15', '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 11:34:24', '2022-07-06 11:34:24'),
(75, 34, 59, NULL, '1970-01-01', 14, NULL, NULL, NULL, NULL, NULL, '2022-07-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 11:34:56', '2022-07-06 11:35:29'),
(76, 34, 59, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 11:36:12', '2022-07-06 11:36:12'),
(77, 38, 38, NULL, '2022-04-03', 15, NULL, NULL, NULL, NULL, NULL, '2022-05-29', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 16:40:27', '2022-07-06 16:40:27'),
(78, 38, 38, NULL, '1970-01-01', 8, NULL, NULL, 'Service Return', NULL, 'Service Return', '2022-07-28', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-06 16:42:29', '2022-07-06 16:42:29'),
(79, 40, 13, NULL, '2016-04-07', 15, NULL, 'Filed complaint petition and issued Summon', NULL, 'Service Return (SR)', NULL, '2016-06-12', '8', NULL, 'Completed case filing successfully', NULL, 'Md. Johirul Islam', NULL, 1, 'If summon duly served then will have to be file Petition of W/A against the accused', 0, NULL, NULL, '2022-07-07 09:47:02', '2022-07-07 09:47:02'),
(80, 40, 13, NULL, '2016-12-06', 8, NULL, NULL, 'Accept Hajira', 'Service Return (SR)', NULL, '2016-11-28', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-07 09:48:14', '2022-07-07 09:53:03'),
(81, 40, 21, NULL, '2016-11-28', 8, NULL, NULL, 'File Petition of W/A', 'Warrant of Arrest', NULL, '2017-03-09', '4', NULL, NULL, NULL, 'Md. Johirul Islam', NULL, 1, NULL, 1, NULL, NULL, '2022-07-07 09:51:01', '2022-07-07 09:52:15'),
(82, 40, 13, NULL, '2016-12-06', 8, NULL, NULL, NULL, 'Service Return (SR)', NULL, '2016-11-28', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 09:53:43', '2022-07-07 09:53:43'),
(83, 40, 21, NULL, '1970-01-01', 8, NULL, NULL, 'File Petition of W/A', 'Warrant of Arrest', NULL, '2017-03-09', '4', NULL, NULL, NULL, NULL, 'Md. Johirul Islam', NULL, NULL, 0, NULL, NULL, '2022-07-07 09:55:12', '2022-07-07 09:55:12'),
(84, 40, 6, NULL, '2017-09-03', 4, NULL, NULL, NULL, NULL, NULL, '2017-10-03', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-07 09:58:34', '2022-07-07 09:58:34'),
(85, 48, 66, NULL, '2019-11-06', 10, NULL, NULL, NULL, NULL, NULL, '2022-01-26', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-17 07:00:43', '2022-07-17 07:00:43'),
(86, 48, 66, NULL, '2022-01-26', 10, NULL, NULL, 'Charge Hearing Completed', NULL, 'Framed Charge and fixed a date for Witness hearing', '2022-08-14', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-17 07:02:06', '2022-07-17 07:02:06'),
(87, 53, 6, NULL, '2022-07-19', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-19 16:45:07', '2022-07-19 16:45:07'),
(88, 9, NULL, NULL, '2022-07-21', 5, NULL, NULL, NULL, NULL, 'To submit original document', '2022-08-02', '5', NULL, NULL, NULL, NULL, NULL, 2, NULL, 0, NULL, NULL, '2022-07-23 11:51:34', '2022-08-13 20:02:51'),
(89, 60, 13, NULL, '2021-07-07', 14, NULL, NULL, NULL, NULL, NULL, '2021-09-23', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-25 06:06:35', '2022-07-25 06:06:35'),
(90, 60, 13, NULL, '2021-09-23', 8, NULL, NULL, NULL, NULL, NULL, '2021-11-16', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-25 06:07:14', '2022-07-25 06:07:14'),
(91, 60, 21, NULL, '2021-11-16', 8, NULL, NULL, NULL, NULL, NULL, '2022-02-07', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-25 06:08:13', '2022-07-25 06:08:25'),
(92, 60, 21, NULL, '2022-02-07', 4, NULL, NULL, NULL, NULL, NULL, '2022-04-28', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-25 06:09:06', '2022-07-25 06:09:06'),
(93, 60, 21, NULL, '2022-04-28', 4, NULL, NULL, NULL, NULL, NULL, '2022-06-21', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-25 06:09:43', '2022-07-25 06:09:43'),
(94, 60, 21, NULL, '2022-06-21', 4, NULL, NULL, NULL, NULL, NULL, '2022-08-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-25 06:10:19', '2022-07-25 06:10:19'),
(95, 61, 48, NULL, '2022-07-13', 14, NULL, NULL, NULL, NULL, NULL, '2022-09-22', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-25 15:14:06', '2022-07-26 04:35:43'),
(96, 61, 48, NULL, '2022-09-22', 8, NULL, NULL, NULL, NULL, NULL, '2022-10-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-26 04:30:18', '2022-07-26 04:35:22'),
(97, 61, 48, NULL, '2022-10-20', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-26 04:31:00', '2022-07-26 04:35:29'),
(98, 61, 48, NULL, '2021-06-10', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-26 04:31:56', '2022-07-26 04:35:51'),
(99, 61, NULL, NULL, '2021-08-18', NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-26 04:33:30', '2022-07-26 04:47:09'),
(100, 61, 51, NULL, '2022-06-30', 12, NULL, NULL, NULL, NULL, NULL, '2022-08-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-26 11:06:34', '2022-07-26 11:06:34'),
(101, 64, 14, NULL, '2015-09-01', 8, NULL, 'Filed complaint petition and issued Summon', NULL, 'Issued Summon', NULL, '2015-09-01', '8', NULL, 'Completed case filing successfully', NULL, NULL, 'Md. Johirul Islam', 1, NULL, 0, NULL, NULL, '2022-07-27 09:45:31', '2022-07-27 09:48:22'),
(102, 64, 13, NULL, '2015-09-01', 8, NULL, NULL, NULL, NULL, NULL, '2016-01-11', '8', NULL, 'Submitted Complaint Hazira', NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, '2022-07-27 09:50:12', '2022-07-27 09:50:12'),
(103, 64, 13, NULL, '2016-01-11', 8, NULL, NULL, 'File Petition of W/A', NULL, 'Issued W/A', '2016-05-24', '4', NULL, 'Submitted Complaint Hazira', NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, '2022-07-27 10:11:28', '2022-07-27 10:11:28'),
(104, 64, 28, NULL, '2016-05-24', 4, NULL, NULL, NULL, NULL, NULL, '2016-10-18', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 10:12:16', '2022-07-27 10:12:44'),
(105, 64, 28, NULL, '2016-10-18', 4, NULL, NULL, NULL, NULL, NULL, '2017-02-27', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 10:13:40', '2022-07-27 10:13:40'),
(106, 64, 28, NULL, '2016-10-18', 4, NULL, NULL, NULL, NULL, NULL, '2017-02-27', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 10:13:41', '2022-07-27 10:13:41'),
(107, 64, NULL, NULL, '2017-02-27', 4, NULL, NULL, NULL, NULL, NULL, '2017-07-12', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 10:14:33', '2022-07-27 15:51:25'),
(108, 41, 13, NULL, '2022-07-21', 8, NULL, NULL, NULL, 'Service Return (SR)', NULL, '2022-07-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 16:35:15', '2022-07-27 16:35:15'),
(109, 41, 13, NULL, '2022-07-27', NULL, NULL, NULL, 'Submitted Bail Petition upon calling record', 'Bail granted', NULL, '2022-07-27', NULL, NULL, NULL, NULL, 'Md. Johirul Islam', NULL, NULL, NULL, 1, NULL, NULL, '2022-07-27 16:39:49', '2022-07-27 16:50:29'),
(110, 41, 21, NULL, '2022-07-24', 4, NULL, NULL, 'Submitted Bail Petition upon calling record', 'Bail granted', NULL, '2022-07-27', NULL, NULL, NULL, NULL, 'Md. Johirul Islam', NULL, NULL, NULL, 0, NULL, NULL, '2022-07-27 16:52:11', '2022-07-27 16:53:45'),
(111, 64, NULL, NULL, '2022-07-12', 6, NULL, '2nd Party submitted TP for submitting WS', NULL, 'Petition Hearing', NULL, '2022-07-31', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-28 13:29:58', '2022-07-28 13:41:29'),
(112, 64, NULL, NULL, '2017-07-12', 6, NULL, 'Filed petition', NULL, 'Petition Hearing', NULL, '2022-06-30', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-28 13:33:02', '2022-07-28 13:34:08'),
(113, 64, NULL, NULL, '2022-05-18', 6, NULL, '2nd Party submitted TP for submitting WS', NULL, 'Petition Hearing', NULL, '2022-06-30', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-28 13:34:43', '2022-07-28 13:35:16'),
(114, 64, NULL, NULL, '2017-06-12', 10, NULL, 'Filed petition', NULL, 'Petition Hearing', NULL, '2022-06-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-07-28 13:36:25', '2022-07-28 13:40:13'),
(115, 75, NULL, NULL, '2022-08-01', NULL, NULL, NULL, NULL, NULL, 'weradf', '2022-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-01 05:43:49', '2022-08-01 09:47:45'),
(116, 75, NULL, NULL, '2022-08-01', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-01 09:46:53', '2022-08-01 09:47:04'),
(117, 76, 21, NULL, '2000-08-25', 14, '18-Nov-1982', '2nd Party submitted TP for submitting Documents, 2nd Party submitted TP for submitting WS, Bail granted and the Case is ready for trial', 'Do est dolorum corp', 'Issued Summon', NULL, '1986-07-30', '4', '03-Apr-1983', '2nd Party was present, gfhfgh', '18', NULL, NULL, NULL, 'Corrupti odio proid', 0, NULL, NULL, '2022-08-01 11:39:16', '2022-08-01 11:39:16'),
(118, 76, 21, 'active', '1986-07-30', 4, 'plplpl', NULL, NULL, NULL, NULL, '2022-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 11:39:39', '2022-08-01 11:39:39'),
(119, 76, 21, 'active', '2022-08-01', NULL, 'plplpl', NULL, NULL, NULL, NULL, '2022-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-01 11:40:03', '2022-08-01 11:40:03'),
(120, 39, 13, NULL, '2022-07-28', 8, NULL, '2nd Party appeared by Wokalotnama', NULL, 'Wokalotnama accepted', 'Next date for Written Statement', '2022-08-01', NULL, NULL, NULL, 'Submitted Wakalotnama on behalf of Defendant No.1-2', 'Md.  Nasir', NULL, NULL, '1. To submit another Wokalotnama\r\n2. To submit a TP for WS', 0, NULL, NULL, '2022-08-01 16:01:33', '2022-08-01 16:01:33'),
(121, 77, NULL, NULL, '2022-08-10', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-02 12:01:39', '2022-08-02 12:09:37'),
(122, 77, NULL, NULL, '2022-08-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-02 12:09:28', '2022-08-02 12:09:28'),
(123, 64, 66, NULL, '2022-07-31', 12, NULL, 'Bail granted and the Case is ready for trial', NULL, 'Bail granted', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-02 16:23:34', '2022-08-02 16:23:34'),
(124, 78, NULL, NULL, '2022-08-01', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 10:19:20', '2022-08-03 10:19:20'),
(125, 79, NULL, NULL, '2022-08-01', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 11:37:34', '2022-08-03 11:37:34'),
(126, 79, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-03 11:43:22', '2022-08-03 11:43:39'),
(127, 81, NULL, NULL, '2022-08-04', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-03 12:13:19', '2022-08-03 12:13:19'),
(128, 23, 39, NULL, '2022-11-13', 16, NULL, NULL, 'TP by the Petitioner', NULL, 'TP granted', '2022-11-13', '16', NULL, NULL, 'TP reason: Client has not provided relevant documents to the  Lawyer  for  hearing.', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-04 06:11:13', '2022-08-04 06:16:59'),
(129, 83, NULL, NULL, '2022-03-23', NULL, NULL, NULL, '* Submitted WS * Submitted application for non-maintenance of the Petition', NULL, NULL, '2022-05-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'house of arrested accused Mst. Shakina Khatun daughter of Late Itar Ali Mondol in Old Bastupur village', 0, NULL, NULL, '2022-08-04 17:14:54', '2022-08-04 17:20:50'),
(130, 83, NULL, NULL, '2022-08-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-04 17:17:27', '2022-08-04 17:21:05'),
(131, 83, NULL, NULL, '2022-05-18', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-06 04:56:13', '2022-08-06 04:56:13'),
(132, 14, 23, NULL, '2022-05-22', 7, NULL, '2nd Party submitted TP for submitting WS', NULL, 'TP granted', NULL, '2022-11-13', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-07 15:41:11', '2022-08-07 15:41:11'),
(133, 85, 13, NULL, '2021-06-09', 8, NULL, NULL, 'Accept WP&A petition', NULL, 'Accept Haira', '2021-12-23', NULL, NULL, NULL, NULL, 'Md. Johirul Islam, Md.  Nasir', NULL, NULL, NULL, 1, NULL, NULL, '2022-08-08 06:05:30', '2022-08-08 11:53:07'),
(134, 85, 13, NULL, '2022-01-05', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-08 06:08:39', '2022-08-08 06:08:58'),
(135, 85, 13, NULL, '2022-11-24', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-08 11:52:01', '2022-08-08 11:55:02'),
(136, 85, 13, NULL, '2021-01-12', 8, NULL, NULL, NULL, NULL, NULL, '2021-06-16', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-08 11:55:41', '2022-08-08 11:55:41'),
(137, 39, 23, NULL, '2022-08-01', 8, NULL, NULL, NULL, NULL, NULL, '2022-11-17', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-08-10 16:53:29', '2022-08-10 16:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `external_files`
--

CREATE TABLE `external_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `external_files`
--

INSERT INTO `external_files` (`id`, `file_name`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'new files', '164725962490byden.jpg', 0, NULL, NULL, '2022-03-14 06:07:04', '2022-03-14 06:07:04'),
(2, 'new files', '164725962475john.jpg', 0, NULL, NULL, '2022-03-14 06:07:04', '2022-03-14 06:07:04'),
(3, NULL, '164728342653LEX CASTLE_High Court_updated_09.03.2022.xlsx', 0, NULL, NULL, '2022-03-14 12:43:46', '2022-03-14 12:43:46');

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
-- Table structure for table `flat_information`
--

CREATE TABLE `flat_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_type_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `thana_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `cs_khatian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cs_dag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_khatian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_dag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rs_khatian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rs_dag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bs_khatian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bs_dag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khatian_dag_city_jorip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deed_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_deed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deed_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_dispute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_suit_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mouza_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mutation_khatian_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mutation_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mutation_khatian_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dcr_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dcr_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_office_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `flat_number_id` int(11) DEFAULT NULL,
  `flat_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat_compliance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electricity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sewerage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `water` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renew` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flat_information`
--

INSERT INTO `flat_information` (`id`, `property_type_id`, `district_id`, `thana_id`, `seller_id`, `buyer_id`, `cs_khatian`, `cs_dag`, `sa_khatian`, `sa_dag`, `rs_khatian`, `rs_dag`, `bs_khatian`, `bs_dag`, `khatian_dag_city_jorip`, `flat_area`, `deed_no`, `date_of_deed`, `deed_value`, `possession`, `boundary_wall`, `any_dispute`, `any_suit_case`, `flat_owner`, `mouza_name`, `mutation_khatian_no`, `mutation_case_no`, `mutation_khatian_owner`, `dcr_number`, `dcr_date`, `register_office_name`, `floor_id`, `flat_number_id`, `flat_size`, `flat_number`, `flat_compliance`, `electricity`, `gas`, `sewerage`, `water`, `expires`, `renew`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 2, 1, 3, 'CS khatian 1', 'cs dag 2', 'sa khatian 3', 'sa dag 4', 'rs khatian 5', 'rs dag 6', 'bs khatian 7', 'bs dag 8', 'khatian & dag city jorip  14', '1000 sft', 'deed no 11', '2022-03-09', '13 test', '14 test', 'boundary 15', 'dispute 16', 'any suit 17', 'Aminur Rahman Smith Aminur', '17 sadf', 'test mutation', 'm case no', '20 ertre', '23 test', '2022-03-16', 'Aminur Rahman Smith Aminur', 3, 3, '25000 sft', NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-03-07 04:44:02', '2022-03-07 05:08:37'),
(2, 3, 2, 4, 1, 3, 'CS khatian 1', 'cs dag 2', 'sa khatian 3', 'sa dag 4', 'rs khatian 5', 'rs dag 6', 'bs khatian 7', 'bs dag 8', 'khatian & dag city jorip  12', '1000 sft', 'deed no 11', '2022-03-17', '13 test', '14 test', 'boundary 15', 'dispute 16', 'any suit 17', 'Aminur Rahman Smith Aminur', '17 sadf', 'test mutation', 'm case no', '20 ertre', '23 test', '2022-03-02', 'Aminur Rahman Smith Aminur', 3, 3, '25000 sft', NULL, 'Yes', 'elect 2', 'test gas', 'test sewerage', 'test warter', '2022-03-17', NULL, 0, NULL, NULL, '2022-03-07 05:05:32', '2022-03-07 05:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `flat_information_files`
--

CREATE TABLE `flat_information_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flat_information_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flat_information_files`
--

INSERT INTO `flat_information_files` (`id`, `flat_information_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-07 04:44:02', '2022-03-07 04:44:02'),
(2, 1, '164664984298Ethnicity.png', 0, NULL, NULL, '2022-03-07 04:44:02', '2022-03-07 04:44:02'),
(3, 1, '164664984260john.jpg', 0, NULL, NULL, '2022-03-07 04:44:02', '2022-03-07 04:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `high_court_cases`
--

CREATE TABLE `high_court_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lower_court` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `thana_id` int(11) DEFAULT NULL,
  `case_class_id` int(11) DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `law_id` int(11) DEFAULT NULL,
  `relevant_law_id` int(11) DEFAULT NULL,
  `relevant_sections_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_complainant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_designation_id` int(11) DEFAULT NULL,
  `accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_company_id` int(11) DEFAULT NULL,
  `accused_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_court_id` int(11) DEFAULT NULL,
  `trial_court_judgement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_grounds_judgement` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_court_id` int(11) DEFAULT NULL,
  `appeal_court_judgement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_grounds_judgement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_court_judgement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_received_lawyer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_papers_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tadbirkar_details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tender_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tender_no_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `case_subcategory_id` int(11) DEFAULT NULL,
  `case_no_hcd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_filing_hcd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hcd_court_id` int(11) DEFAULT NULL,
  `laws_id` int(11) DEFAULT NULL,
  `sections` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no_memo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_petitioner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposite_party_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `party_steps_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_hearing_court` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_steps_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_next_steps_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_lawyer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents_lawyers_appointment` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents_sent_to_law_chamber` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents_received_field_programe` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ground_appeal_revision` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendations` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `high_court_cases`
--

INSERT INTO `high_court_cases` (`id`, `lower_court`, `case_no`, `division_id`, `district_id`, `thana_id`, `case_class_id`, `case_type_id`, `law_id`, `relevant_law_id`, `relevant_sections_id`, `section_id`, `date_of_filing`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `accused_name`, `accused_company_id`, `accused_address`, `accused_contact_no`, `other_claim`, `summary_facts_alligation`, `trial_court_id`, `trial_court_judgement_date`, `trial_grounds_judgement`, `appeal_court_id`, `appeal_court_judgement_date`, `appeal_grounds_judgement`, `appeal_court_judgement`, `panel_lawyer_id`, `total_legal_bill_amount`, `case_received_lawyer`, `case_papers_received`, `tadbirkar_details`, `tender_no`, `tender_no_date`, `case_category_id`, `case_subcategory_id`, `case_no_hcd`, `date_of_filing_hcd`, `hcd_court_id`, `laws_id`, `sections`, `order`, `order_date`, `order_no_memo`, `appellant_petitioner_name`, `appellant_designation`, `appellant_address`, `opposite_party_name`, `opposite_party_designation`, `opposite_party_address`, `party_steps_taken`, `case_status`, `fixed_hearing_court`, `court_steps_taken`, `court_next_steps_date`, `assigned_lawyer`, `documents_lawyers_appointment`, `documents_sent_to_law_chamber`, `documents_received_field_programe`, `missing_documents_evidence`, `ground_appeal_revision`, `recommendations`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Atiar Rahman-2, Adv, CDG', '2022-03-14', 'Shish Uddin', '00000/2022', '2022-04-06', 1, 2, '00000 of 2022', '2022-03-31', NULL, NULL, '498', 'abc', NULL, NULL, 'Md. Siddikur Rahman', NULL, 'Chuadanga', 'The State', NULL, NULL, NULL, 'Filed case in Section', NULL, 'To be mentioned in Motion Court', NULL, 'Md. Niamul Kabir', 'N/A', 'abc', 'xyz', 'xyz', 'abc', 'abc', 0, NULL, NULL, '2022-04-04 03:28:01', '2022-04-06 02:59:03'),
(2, 'Yes', '45451313', 3, NULL, NULL, 3, 2, 2, 2, 2, 1, '2022-04-21', 'asdf', NULL, 'test2', 'Aminur Rahman Smith Aminur', '01998744568', NULL, 'Aminur Rahman Smith Aminur', 2, '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 'ert', 'sdfds', 2, '2022-04-08', 'nfgbnfgh', 2, '2022-04-30', 'jhgjhg', 'cvbvc', 1, 'dgfdg', 'rtretre fdgfg hjjkhgjhg  fghfghgf', '2022-05-06', 'dgfdgf', 'test 8', '2022-04-28', 1, 2, 'asdf23465', '2022-04-27', 2, NULL, 'cvbcvxzfdgdf', 'dfgfdg', '2022-04-20', '2022-05-06', NULL, 'asdf', '43 Phillip St, Sydney NSW 2000, Australia', 'Aminur Rahman Smith Aminur', 'zxcv', '43 Phillip St, Sydney NSW 2000, Australia', 'ZXcv', 'sadf', 'Aminur Rahman Smith Aminur', 'cd udpate', '2022-04-28', 'Aminur Rahman Smith Aminur', 'fsdf', 'ertrg', 'fgdfg', 'xcvbdfg', 'zvgb fgdf', 'gfdg xvbdfg', 0, NULL, NULL, '2022-04-04 21:21:59', '2022-04-04 21:51:56');

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
(7, 1, '164586820516asdfasdf.pdf', 0, NULL, NULL, '2022-02-26 03:36:45', '2022-02-26 03:36:45'),
(8, 2, '164847034157164792106681164553223132no_images.png', 0, NULL, NULL, '2022-03-28 06:25:41', '2022-03-28 06:25:41'),
(9, 2, '164847034156164792106643164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-28 06:25:41', '2022-03-28 06:25:41');

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
-- Table structure for table `internal_counsels`
--

CREATE TABLE `internal_counsels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chamber_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_counsel_role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_counsel_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsc_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llb_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llb_institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llm_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llm_instution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_council_enrollment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_council_enrollment_sanad_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_bar_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_bar_membership_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `practicing_bar_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `practicing_bar_membership_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_court_enrollment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_court_enrollment_membership_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_council_fees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_council_fees_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_bar_mem_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_bar_mem_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scba_memb_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scba_memb_fee_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_contact_number_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_email_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_associates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_associates_write` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_experience_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_experience_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_joining` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `internal_counsels`
--

INSERT INTO `internal_counsels` (`id`, `chamber_name`, `internal_counsel_role_id`, `internal_counsel_name`, `father_name`, `mother_name`, `spouse_name`, `present_address`, `permanent_address`, `date_of_birth`, `nid_number`, `mobile_number`, `email`, `emergency_contact`, `relation`, `professional_name`, `ssc_year`, `ssc_institution`, `hsc_year`, `hsc_institution`, `llb_year`, `llb_institution`, `llm_year`, `llm_instution`, `bar_council_enrollment_date`, `bar_council_enrollment_sanad_no`, `mother_bar_name`, `mother_bar_membership_number`, `practicing_bar_date`, `practicing_bar_membership_number`, `high_court_enrollment_date`, `high_court_enrollment_membership_number`, `bar_council_fees`, `bar_council_fees_write`, `district_bar_mem_fee`, `district_bar_mem_write`, `scba_memb_fee`, `scba_memb_fee_write`, `professional_contact_number`, `professional_contact_number_write`, `professional_email`, `professional_email_write`, `name_of_associates`, `name_of_associates_write`, `professional_experience_one`, `professional_experience_two`, `date_of_joining`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Guinevere Richard', 'Clerk', 'Sarah Buchanan', 'Stephen Gordon', 'Norman Pope', 'Shaine Vega', 'Et consequatur Illu', 'Officiis iure aut el', '09-02-1991', '363', '909', 'dadizedo@mailinator.com', 'Aut nisi aut iusto e', 'Exercitationem et si', 'Austin Marks', '2008', 'Magna Nam adipisicin', '1982', 'Quam mollitia ea lab', '1998', 'Occaecat accusantium', '1975', 'Architecto dignissim', '03-07-1973', 'Mollit sit blanditii', 'Rahim Jimenez', '693', '29-03-2021', '397', '22-02-2016', '524', 'Quisquam dolorem ill', 'Minim assumenda ipsu', 'ert asdf asdf ghfg hfg asdf', 'Eos ut voluptas sed', 'testa aa dsf', 'Voluptatum quam culp', '361', '668', 'bumek@mailinator.com', 'vakyxa@mailinator.com', 'Jolie Stanley', 'Carly Sims', 'Carly Sims', 'Provident amet ali', '11-07-1980', NULL, NULL, NULL, '2022-08-13 12:10:09', '2022-08-13 12:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `internal_counsel_documents_receiveds`
--

CREATE TABLE `internal_counsel_documents_receiveds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `internal_counsel_id` int(11) DEFAULT NULL,
  `received_documents_id` int(11) DEFAULT NULL,
  `received_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_documents_type_id` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `internal_counsel_documents_receiveds`
--

INSERT INTO `internal_counsel_documents_receiveds` (`id`, `internal_counsel_id`, `received_documents_id`, `received_documents`, `received_documents_date`, `received_documents_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 5, 'Amet ut qui quasi i', '2009-11-03', 1, 0, NULL, NULL, '2022-08-13 12:10:29', '2022-08-13 12:10:29'),
(4, 1, 6, 'test adsf', '2022-09-06', 3, 0, NULL, NULL, '2022-08-13 12:10:29', '2022-08-13 12:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `internal_counsel_documents_requireds`
--

CREATE TABLE `internal_counsel_documents_requireds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `internal_counsel_id` int(11) DEFAULT NULL,
  `required_wanting_documents_id` int(11) DEFAULT NULL,
  `required_wanting_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_wanting_documents_type_id` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `internal_counsel_documents_requireds`
--

INSERT INTO `internal_counsel_documents_requireds` (`id`, `internal_counsel_id`, `required_wanting_documents_id`, `required_wanting_documents`, `required_wanting_documents_date`, `required_wanting_documents_type_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 13, 'Hic exercitation imp', '1971-11-13', 2, 0, NULL, NULL, '2022-08-13 12:10:29', '2022-08-13 12:10:29'),
(4, 1, 5, 'test adf asdf', '2022-09-02', 1, 0, NULL, NULL, '2022-08-13 12:10:29', '2022-08-13 12:10:29'),
(5, 1, 11, 'test adf', '2022-09-10', 3, 0, NULL, NULL, '2022-08-13 12:10:29', '2022-08-13 12:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `labour_cases`
--

CREATE TABLE `labour_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_subcategory_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_case_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_subcategory_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_court` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_organization_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_court_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relevant_law_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relevant_sections_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_first_party` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_party_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_party_designation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_council_name_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_council_associates_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_party_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_order_court_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_lawyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_claim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prayer_claims_by_psg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `labour_cases` (`id`, `case_no`, `case_year`, `client_category_id`, `client_subcategory_id`, `date_of_case_received`, `case_category_id`, `case_subcategory_id`, `case_type_id`, `trial_court`, `zone_id`, `area_id`, `branch_id`, `company_organization_id`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `thana_id`, `relevant_law_id`, `relevant_sections_id`, `alligation`, `amount`, `name_of_the_first_party`, `first_party_contact_no`, `first_party_designation_id`, `external_council_name_id`, `external_council_associates_id`, `second_party_name`, `second_party_address`, `case_status_id`, `last_order_court_id`, `next_date`, `next_date_fixed_id`, `case_notes`, `assigned_lawyer_id`, `total_legal_bill_amount`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '4546151', '2026', '2', '3', '2022-03-30', '8', '8', '1', 'test', '2', '2', '1', '2', '2', '2022-04-06', '3', '3', '1', '2', '3', 'asdf 32', '2454545', 'Aminur Rahman Smith Aminur', '5464568465', '2', '1', '1', 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', '3', '3', '2022-03-25', '3', 'test21', '1', '25600', 'wertewr update', 'asdfds update', 'erewr update', 'dfgdg update', 'sadfsda update', 0, NULL, NULL, '2022-03-29 04:38:30', '2022-03-29 22:48:21'),
(2, '45461512', '2026', '4', '4', '2022-03-17', '9', '9', '2', 'test', '2', '2', '1', '2', '1', '2022-03-10', '3', '3', '2', '2', '1', 'asdf 32', '356200', 'Aminur Rahman Smith Aminur', '5464568465', '2', '1', '1', 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', '3', '3', '2022-03-25', '3', 'test24', '1', '78600', 'test', 'test', 'test', 'test', 'test', 0, NULL, NULL, '2022-03-29 22:54:22', '2022-03-29 23:06:40'),
(3, 'BLA(wages)- 195/2021', '2021', '1', NULL, '2020-11-19', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, '20', NULL, NULL, NULL, NULL, '2', '4', NULL, NULL, 'Rafiq', NULL, NULL, NULL, NULL, 'Shamim', NULL, '8', '2', '2022-05-05', '5', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-03-31 06:18:06', '2022-08-07 08:38:06'),
(4, 'BLA(wages)- 194/2021', '2021', '3', '7', '2021-09-26', NULL, NULL, '3', NULL, NULL, NULL, NULL, '4', '22', NULL, '1', '1', NULL, '3', '5', '1st party is entitled to get service benefits, gratuity, compensation', '71,56,584/-', 'Md. Mizanur Rahman', NULL, NULL, '5', '5', 'Premier Cement Mills Ltd and Others', 'T.K Bhaban (12th Floor), 13 kawran Bazar, Tejgaon, Dhaka-1215', '23', NULL, NULL, '5', NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-02 00:04:04', '2022-04-02 00:42:49');

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
(3, 1, 1, '2022-02-11', 3, 2, '2022-03-04', 3, 'none', 'test 33', 'test 22', 'test 33', 'Disposed', 0, NULL, NULL, '2022-02-24 07:01:04', '2022-02-24 07:01:04'),
(4, 3, 20, '2022-05-05', 5, 5, '2022-03-09', 8, 'Shamim', 'test', 'test', 'test', 'Next Date', 0, NULL, NULL, '2022-03-31 06:19:54', '2022-03-31 06:19:54'),
(5, 4, 22, '2021-11-25', 5, 5, '2021-11-25', 13, 'Premier Cement Mills Limited', NULL, NULL, NULL, 'Next Date', 0, NULL, NULL, '2022-04-02 00:10:57', '2022-04-02 00:10:57'),
(6, 4, 22, '2021-12-23', 5, 5, '2021-12-23', 13, 'Premier Cement Mills Limited', NULL, NULL, NULL, 'Next Date', 0, NULL, NULL, '2022-04-02 00:13:06', '2022-04-02 00:13:06'),
(7, 4, 22, '2022-02-20', 5, 5, '2022-02-20', 23, 'Premier Cement Mills Limited', NULL, NULL, NULL, 'Next Date', 0, NULL, NULL, '2022-04-02 00:14:35', '2022-04-02 00:14:35'),
(8, 4, 22, '2022-03-30', 5, 5, '2022-03-30', 23, 'Premier Cement Mills Limited', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-02 00:15:17', '2022-04-02 00:15:17'),
(9, 4, 22, '2022-03-30', 7, 5, '2022-03-30', 23, 'Premier Cement Mills Ltd.', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-02 02:25:20', '2022-04-02 02:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `land_information`
--

CREATE TABLE `land_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_type_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `thana_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `cs_khatian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cs_dag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_khatian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_dag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rs_khatian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rs_dag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bs_khatian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bs_dag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khatian_dag_city_jorip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deed_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_deed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deed_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boundary_wall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_dispute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_suit_case` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mouza_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mutation_khatian_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mutation_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mutation_khatian_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dcr_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dcr_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_office_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_compliance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electricity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sewerage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `water` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renew` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_information`
--

INSERT INTO `land_information` (`id`, `property_type_id`, `district_id`, `thana_id`, `seller_id`, `buyer_id`, `cs_khatian`, `cs_dag`, `sa_khatian`, `sa_dag`, `rs_khatian`, `rs_dag`, `bs_khatian`, `bs_dag`, `khatian_dag_city_jorip`, `land_area`, `deed_no`, `date_of_deed`, `deed_value`, `possession`, `boundary_wall`, `any_dispute`, `any_suit_case`, `property_owner`, `mouza_name`, `mutation_khatian_no`, `mutation_case_no`, `mutation_khatian_owner`, `dcr_number`, `dcr_date`, `register_office_name`, `land_compliance`, `electricity`, `gas`, `sewerage`, `water`, `expires`, `renew`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 4, 1, 3, 'CS khatian 1', 'cs dag 2', 'sa khatian 3', 'sa dag 4', 'rs khatian 5', 'rs dag 6', 'bs khatian 7', 'bs dag 8', 'khatian & dag city jorip  9', 'land area 10', 'deed no 11', 'dod 12', '13 test', '14 test', 'boundary 15', 'dispute 16', 'any suit 17', 'Jack Smith', '17 sadf', 'test mutation', 'm case no', 'test khatian', '4654654DCR', '2022-03-17', 'Main office', 'No', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-03-06 00:24:05', '2022-03-12 00:42:09'),
(2, 3, 4, 3, 1, 3, 'CS khatian 1', 'cs dag 2', 'sa khatian 3', 'sa dag 4', 'rs khatian 5', 'rs dag 6', 'bs khatian 7', 'bs dag 8', 'aaaa', 'land area 10', 'deed no 11', '12 test', '13 test', '14 test', 'boundary 15', 'dispute 16', 'any suit 17', 'Stefen', '17 sadf', 'test mutation', 'm case no', '20 ertre', '23 test', '2022-03-15', 'test offfice', 'Yes', 'elect 98', 'test gas', 'test sewerage', 'test warter', '2022-03-31', '2022-03-30', 0, NULL, NULL, '2022-03-06 00:25:45', '2022-03-07 06:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `land_information_files`
--

CREATE TABLE `land_information_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_information_id` int(11) DEFAULT NULL,
  `uploaded_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_information_files`
--

INSERT INTO `land_information_files` (`id`, `land_information_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '164654784592byden.jpg', 0, NULL, NULL, '2022-03-06 00:24:05', '2022-03-06 00:24:05'),
(2, 1, '164654784550asdfasdf.pdf', 0, NULL, NULL, '2022-03-06 00:24:05', '2022-03-06 00:24:05'),
(3, 1, '164654784596Integra_Logo.png', 0, NULL, NULL, '2022-03-06 00:24:05', '2022-03-06 00:24:05'),
(4, 1, '164654828555Ethnicity.png', 0, NULL, NULL, '2022-03-06 00:31:25', '2022-03-06 00:31:25'),
(5, 1, '16465482851asdfasdf.pdf', 0, NULL, NULL, '2022-03-06 00:31:25', '2022-03-06 00:31:25');

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
(187, '2022_03_03_110811_create_setup_seller_buyers_table', 39),
(190, '2022_03_05_094634_create_land_information_table', 40),
(191, '2022_03_05_100641_create_land_information_files_table', 40),
(200, '2022_03_07_044224_create_flat_information_table', 41),
(201, '2022_03_07_051253_create_flat_information_files_table', 41),
(202, '2022_03_07_052042_create_setup_floors_table', 41),
(203, '2022_03_07_055414_create_setup_flat_numbers_table', 41),
(206, '2022_03_08_110826_create_regulatory_compliances_table', 42),
(209, '2022_03_09_070843_create_social_compliances_table', 43);

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
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_mode_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `payment_mode_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 0, NULL, NULL, '2022-06-12 10:59:09', '2022-07-06 17:20:30'),
(2, 'bKash', 0, NULL, NULL, '2022-06-12 10:59:44', '2022-07-06 17:20:45'),
(3, 'Nagad', 0, NULL, NULL, '2022-06-12 10:59:47', '2022-07-06 17:21:15'),
(4, 'Bank', 0, NULL, NULL, '2022-07-06 17:21:26', '2022-07-06 17:21:26');

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
  `case_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_category_id` int(11) DEFAULT NULL,
  `client_subcategory_id` int(11) DEFAULT NULL,
  `date_of_case_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `case_subcategory_id` int(11) DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `trial_court` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `member_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `thana_id` int(11) DEFAULT NULL,
  `relevant_laws_id` int(11) DEFAULT NULL,
  `relevant_sections_id` int(11) DEFAULT NULL,
  `alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prayer_claims_by_psg` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quassi_judicial_cases`
--

INSERT INTO `quassi_judicial_cases` (`id`, `case_no`, `case_year`, `client_category_id`, `client_subcategory_id`, `date_of_case_received`, `case_category_id`, `case_subcategory_id`, `case_type_id`, `trial_court`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `thana_id`, `relevant_laws_id`, `relevant_sections_id`, `alligation`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `opposite_party_name`, `opposite_party_address`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `total_legal_bill_amount`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '4546151', '2026', 3, 1, '2022-03-18', 2, 10, 1, 'test', '7788965', 2, 2, 1, '546464', 2, 2, '2022-03-31', 3, 3, 2, 2, 3, 'asdf', '356200', 'Aminur Rahman Smith Aminur', '01998744568', 2, 1, 1, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 3, 'Aminur Rahman Smith Aminur', 2, '2022-04-08', '43 Phillip St, Sydney NSW 2000, Australia', '01998745638', 3, 'asdf', 2, '01456698785', 2, 'test40', 1, 1, '25600', 'test', 'test', 'test', 'test', 'test', 0, NULL, NULL, '2022-03-30 00:39:09', '2022-03-30 00:39:09'),
(2, '6546', 'test14', 4, 4, '2022-03-18', 2, 13, 1, 'test', '7783223', 2, 2, 1, '541', 2, 2, '2022-03-24', 3, 3, 2, 2, 4, 'asdf 32', '30000', 'Aminur Rahman Smith Aminur', '01998744568', 2, 1, 1, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 3, 'Aminur Rahman Smith Aminur', 2, '2022-03-17', '43 Phillip St, Sydney NSW 2000, Australia', '01998745638', 3, 'test1 test', 2, 'test', 2, 'test24', 1, 1, 'test 6', 'test update', 'test udpate', 'test udpate', 'test udpate', 'test update', 0, NULL, NULL, '2022-03-30 00:41:20', '2022-03-30 01:30:39');

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
-- Table structure for table `regulatory_compliances`
--

CREATE TABLE `regulatory_compliances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `certificates_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compliance_category_id` int(11) DEFAULT NULL,
  `certificates_authority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificates_ministry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificates_getting_cl_first_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificates_expires` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificates_renew` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificates_special_provision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificates_special_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govt_authority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govt_ministry_dept` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govt_getting_cl_first_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govt_expires` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govt_renew` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govt_special_provision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govt_special_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utility_electricity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utility_gas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utility_sewerage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utility_water` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utility_expires` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utility_renew` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulatory_compliances`
--

INSERT INTO `regulatory_compliances` (`id`, `certificates_name`, `compliance_category_id`, `certificates_authority`, `certificates_ministry`, `certificates_getting_cl_first_date`, `certificates_expires`, `certificates_renew`, `certificates_special_provision`, `certificates_special_remarks`, `govt_authority`, `govt_ministry_dept`, `govt_getting_cl_first_date`, `govt_expires`, `govt_renew`, `govt_special_provision`, `govt_special_remarks`, `utility_electricity`, `utility_gas`, `utility_sewerage`, `utility_water`, `utility_expires`, `utility_renew`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bsc Certificates', 2, 'test Authority', 'asdf updated', '2022-03-04', '2022-03-11', '2022-03-12', 'asdf updated', 'adsf updated', 'Aminur Rahman Smith Aminur', 'asdf updaetd', '2022-03-14', '2022-03-25', '2022-03-11', 'asdf updated', 'asdf updated', 'elects test', 'asdf test updated', 'asdf test', 'test water test', '2022-03-02', '2022-03-24', 0, NULL, NULL, '2022-03-08 22:25:38', '2022-03-09 03:20:19'),
(2, 'Aminur Rahman Smith Aminur', 2, 'Aminur Rahman Smith Aminur', 'asdf', '2022-04-01', '2022-03-18', '2022-03-26', 'asdf', 'adsf', 'Aminur Rahman Smith Aminur', 'asdf', '2022-03-31', '2022-03-26', '2022-03-12', 'asdf', 'asdf', 'edq', 'gas', 'asdf', 'test water', '2022-03-17', '2022-03-25', 0, NULL, NULL, '2022-03-08 22:26:31', '2022-03-08 23:25:17'),
(3, 'Aminur Rahman Smith Aminur', 1, 'Aminur Rahman Smith Aminur', 'asdf updated', '2022-03-18', '2022-03-17', '2022-03-19', 'asd', 'adsf', 'Aminur Rahman Smith Aminur', 'asdf', '2022-03-11', '2022-03-03', '2022-03-17', 'asdf', 'asdf', 'test', 'asdf', 'sewerage', 'asdf', '2022-03-02', '2022-03-04', 1, NULL, NULL, '2022-03-08 23:40:31', '2022-03-09 01:07:50');

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
('2wiLFxq0vSjUxJ5VR3KhNHwJQj0RCxVCJPyCCx8d', NULL, '103.110.67.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTklVUGNtMm55eUV0QUpLU0cxMDVOajBrQ2p0WmRQbHl5cE9nNFFGVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly93d3cuZGxlZ2FsLmluZm8vZGV2L3B1YmxpYy9hZG1pbi92aWV3LWNyaW1pbmFsLWNhc2VzLzE5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O3M6NDoicGFnZSI7czo5OiJkYXNoYm9hcmQiO30=', 1660423411),
('CxW9OyTabjGYThsysFk8yJAIZM3UQUmUB4OC7y49', NULL, '103.205.68.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVkRhWlV4ZU1sQnVNcUg5NzhhbkdLTnJUQmtlQ1BxbUIxQXNVUnNidSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly93d3cuZGxlZ2FsLmluZm8vZGV2L3B1YmxpYy9hZG1pbi9lZGl0LWNvdW5zZWwvNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7czo0OiJwYWdlIjtzOjk6ImRhc2hib2FyZCI7fQ==', 1660393148),
('N0L4BCqGzJBt36A5F8vLz8sPNFpS656RXXwMy6jI', NULL, '103.205.68.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWlyNkFVNEFheGZUQ1Q2SjFzaVBEYmFwSVVSTnpsTExSYXJ5WktTQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly93d3cuZGxlZ2FsLmluZm8vZGV2L3B1YmxpYy9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoicGFnZSI7czo5OiJkYXNoYm9hcmQiO30=', 1660473579),
('NfnttXMGQXAtiAMKpuUgMfHFO3l0rD9XTvzZIZwl', NULL, '103.110.67.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRkg3Q05qZHpkRm5pWXFaWktKREFpZXZtVGV2V29aRThyN0ZGQnhYdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly93d3cuZGxlZ2FsLmluZm8vZGV2L3B1YmxpYy9hZG1pbi9jcmltaW5hbC1jYXNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjQ6InBhZ2UiO3M6OToiZGFzaGJvYXJkIjt9', 1660398048);

-- --------------------------------------------------------

--
-- Table structure for table `setup_accuseds`
--

CREATE TABLE `setup_accuseds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accused_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_accuseds`
--

INSERT INTO `setup_accuseds` (`id`, `accused_name`, `accused_mobile`, `accused_email`, `accused_address`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Stefen', '544651651', 'asdf@adf', '43 Phillip St, Sydney NSW 2000, Australia', 1, NULL, NULL, '2022-04-24 22:22:27', '2022-07-17 09:58:39'),
(2, 'jack', '895646565', 'asdf@adf', '43 Phillip St, Sydney NSW 2000, Australia', 1, NULL, NULL, '2022-04-24 22:22:42', '2022-07-17 09:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `setup_allegations`
--

CREATE TABLE `setup_allegations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `allegation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_allegations`
--

INSERT INTO `setup_allegations` (`id`, `allegation_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dishonor of Cheque', 0, NULL, NULL, '2022-04-10 03:52:42', '2022-04-20 14:00:55'),
(2, 'Outstanding Recovery', 1, NULL, NULL, '2022-04-10 03:52:48', '2022-06-28 10:56:13');

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
(2, 'Malibag', 1, NULL, NULL, '2022-02-15 05:25:41', '2022-03-14 21:56:36');

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
-- Table structure for table `setup_bill_particulars`
--

CREATE TABLE `setup_bill_particulars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_particulars_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_bill_particulars`
--

INSERT INTO `setup_bill_particulars` (`id`, `bill_particulars_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'rrrrrr', 1, NULL, NULL, '2022-06-12 09:57:43', '2022-06-12 09:59:17'),
(2, 'Today is Fixed for W/A. We filled complainant Hajira.', 0, NULL, NULL, '2022-06-12 09:58:04', '2022-07-06 16:52:19'),
(3, 'qwerwe', 1, NULL, NULL, '2022-06-12 09:59:12', '2022-07-06 16:50:33'),
(4, 'The case has been received.', 0, NULL, NULL, '2022-07-06 17:14:58', '2022-07-06 17:14:58'),
(5, 'The case has been received.', 1, NULL, NULL, '2022-07-06 17:15:06', '2022-07-06 17:22:12');

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
(1, 'Lawyer Payment', 0, NULL, NULL, '2022-03-01 00:28:41', '2022-07-27 16:58:23'),
(2, 'Miscellaneous', 0, NULL, NULL, '2022-03-01 00:29:04', '2022-03-01 00:29:04'),
(3, 'File Receive', 0, NULL, NULL, '2022-07-06 17:19:13', '2022-07-06 17:19:13');

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
-- Table structure for table `setup_cabinets`
--

CREATE TABLE `setup_cabinets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cabinet_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_cabinets`
--

INSERT INTO `setup_cabinets` (`id`, `cabinet_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Cabinet 1', 1, NULL, NULL, '2022-06-28 09:18:23', '2022-06-29 09:08:04'),
(2, 'Office Almirah', 0, NULL, NULL, '2022-06-28 09:18:30', '2022-06-29 09:08:20'),
(3, 'Test Cabinet 5', 1, NULL, NULL, '2022-06-28 09:18:40', '2022-06-28 10:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `setup_case_categories`
--

CREATE TABLE `setup_case_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_case_categories`
--

INSERT INTO `setup_case_categories` (`id`, `case_type`, `case_category`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Criminal', 'Criminal', 0, NULL, NULL, '2022-03-24 04:44:58', '2022-07-04 19:14:30'),
(2, 'Special Quassi - Judicial Cases', 'Contempt Cases', 1, NULL, NULL, '2022-03-24 04:45:21', '2022-06-27 16:50:11'),
(3, 'Civil', 'Civil', 0, NULL, NULL, '2022-03-24 04:59:58', '2022-07-04 19:14:41'),
(4, 'High Court Division', 'Civil', 1, NULL, NULL, '2022-04-06 02:23:10', '2022-06-26 15:51:22'),
(5, 'High Court Division', 'Writ', 1, NULL, NULL, '2022-04-06 02:23:56', '2022-06-27 16:52:58'),
(6, 'Criminal Cases', 'Test Category 1', 1, NULL, NULL, '2022-04-12 05:37:08', '2022-06-07 15:52:02'),
(7, 'Criminal Cases', 'Criminal', 1, NULL, NULL, '2022-04-13 02:32:07', '2022-06-27 16:50:03'),
(8, 'Civil Cases', 'Civil', 1, NULL, NULL, '2022-04-13 02:32:18', '2022-06-26 15:51:27'),
(9, 'Criminal Cases', 'Labour', 1, NULL, NULL, '2022-05-13 08:49:14', '2022-06-28 09:59:18'),
(10, 'Criminal Cases', 'Civil', 1, NULL, NULL, '2022-06-08 14:41:40', '2022-06-26 15:51:32'),
(11, 'Labour Cases', 'Civil', 1, NULL, NULL, '2022-06-28 11:05:10', '2022-06-28 11:13:26'),
(12, 'Labour Cases', 'Criminal', 1, NULL, NULL, '2022-06-28 11:05:24', '2022-06-28 11:13:22'),
(13, 'Criminal', 'Service', 1, NULL, NULL, '2022-06-29 09:17:13', '2022-07-05 17:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `setup_case_classes`
--

CREATE TABLE `setup_case_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_case_classes`
--

INSERT INTO `setup_case_classes` (`id`, `case_class_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Appellate Division', 0, NULL, NULL, '2022-03-20 03:30:59', '2022-06-07 17:25:38'),
(2, 'High Court Division', 0, NULL, NULL, '2022-03-20 03:31:03', '2022-06-07 17:25:17'),
(3, 'Quasi-judicial / Special Court', 0, NULL, NULL, '2022-03-20 03:31:07', '2022-06-07 17:24:52'),
(4, 'Service Matter', 0, NULL, NULL, '2022-03-20 03:31:11', '2022-06-28 11:08:23'),
(5, 'Criminal', 0, NULL, NULL, '2022-03-20 03:31:15', '2022-06-07 17:22:12'),
(6, 'Civil', 0, NULL, NULL, '2022-06-07 15:57:20', '2022-06-07 17:21:59'),
(7, 'Administrative', 0, NULL, NULL, '2022-06-13 09:03:53', '2022-07-02 16:11:40');

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
(1, 'Active', 1, NULL, NULL, '2022-02-15 05:14:05', '2022-03-16 04:33:14'),
(2, 'Inactive', 1, NULL, NULL, '2022-02-15 05:14:10', '2022-03-16 04:31:54'),
(3, 'Ongoing', 1, NULL, NULL, '2022-02-15 05:14:17', '2022-03-16 04:33:05'),
(4, 'Police Report', 0, NULL, NULL, '2022-03-16 04:34:46', '2022-03-16 04:34:46'),
(5, 'Proceedings', 0, NULL, NULL, '2022-03-16 04:35:12', '2022-03-16 04:35:12'),
(6, 'WP&A', 0, NULL, NULL, '2022-03-16 04:36:10', '2022-07-07 09:59:47'),
(7, 'PW', 0, NULL, NULL, '2022-03-16 04:36:23', '2022-03-16 04:36:23'),
(8, 'Re-call Witness', 0, NULL, NULL, '2022-03-16 04:36:56', '2022-03-16 04:36:56'),
(9, 'Repealed by Govt. Gazette', 0, NULL, NULL, '2022-03-16 04:37:47', '2022-03-16 04:37:47'),
(10, 'Responding Appeal Hearing', 0, NULL, NULL, '2022-03-16 04:38:11', '2022-03-16 04:38:11'),
(11, 'Retain for Transfer', 0, NULL, NULL, '2022-03-16 04:38:26', '2022-03-16 04:38:26'),
(12, 'Rule & Stay', 0, NULL, NULL, '2022-03-16 04:38:49', '2022-03-16 04:38:49'),
(13, 'Service Return (SR)', 0, NULL, NULL, '2022-03-16 04:39:16', '2022-03-16 04:39:16'),
(14, 'Settling Date (SD)', 0, NULL, NULL, '2022-03-16 04:40:09', '2022-03-16 04:40:09'),
(15, 'Status Quo', 0, NULL, NULL, '2022-03-16 04:40:27', '2022-03-16 04:40:27'),
(16, 'Stayed', 0, NULL, NULL, '2022-03-16 04:40:38', '2022-03-16 04:40:38'),
(17, 'Step (Todvir)', 0, NULL, NULL, '2022-03-16 04:41:40', '2022-03-16 04:41:40'),
(18, 'Submission of Court Fee', 0, NULL, NULL, '2022-03-16 04:42:07', '2022-03-16 04:42:07'),
(19, 'Summon', 0, NULL, NULL, '2022-03-16 04:42:15', '2022-03-16 04:42:15'),
(20, 'Taking cognizance', 0, NULL, NULL, '2022-03-16 04:42:39', '2022-03-16 04:42:39'),
(21, 'Warrant of Arrest', 0, NULL, NULL, '2022-03-16 04:43:14', '2022-05-23 05:13:23'),
(22, 'Witness', 0, NULL, NULL, '2022-03-16 04:43:37', '2022-03-16 04:43:37'),
(23, 'Written Statement', 0, NULL, NULL, '2022-03-16 04:43:49', '2022-03-16 04:43:49'),
(24, 'Pending for WP&A Process Fee', 0, NULL, NULL, '2022-03-16 05:13:24', '2022-03-16 05:13:24'),
(25, 'Pending for Summon Process Fee', 0, NULL, NULL, '2022-03-16 05:13:49', '2022-03-16 05:13:49'),
(26, 'Pending for Warrant of Arrest (W/A) Process Fee', 0, NULL, NULL, '2022-03-16 05:14:36', '2022-03-16 05:14:36'),
(27, 'Peremptory Hearing', 0, NULL, NULL, '2022-03-16 05:15:30', '2022-03-16 05:15:30'),
(28, 'Petition Hearing', 0, NULL, NULL, '2022-03-16 05:15:53', '2022-03-16 05:15:53'),
(29, 'Exparty Hearing', 0, NULL, NULL, '2022-03-16 05:17:04', '2022-03-16 05:17:04'),
(30, 'Filing Complaint', 0, NULL, NULL, '2022-03-16 05:17:21', '2022-03-16 05:17:21'),
(31, 'Filing FIR', 0, NULL, NULL, '2022-03-16 05:18:38', '2022-03-16 05:18:38'),
(32, 'Final Hearing', 0, NULL, NULL, '2022-03-16 05:18:53', '2022-03-16 05:18:53'),
(33, 'Framing of Charge', 0, NULL, NULL, '2022-03-16 05:19:12', '2022-03-16 05:19:12'),
(34, 'Framing of Issue', 0, NULL, NULL, '2022-03-16 05:19:34', '2022-03-16 05:19:34'),
(35, 'Further Investigation', 0, NULL, NULL, '2022-03-16 05:20:10', '2022-03-16 05:20:10'),
(36, 'Further Peremptory Hearing (FPH)', 0, NULL, NULL, '2022-03-16 05:20:43', '2022-03-16 05:20:43'),
(37, 'Further Witness', 0, NULL, NULL, '2022-03-16 05:21:08', '2022-03-16 05:21:08'),
(38, 'Filing Petition', 0, NULL, NULL, '2022-03-16 05:21:20', '2022-05-13 12:43:44'),
(39, 'Hearing', 0, NULL, NULL, '2022-03-16 05:21:29', '2022-03-16 05:21:29'),
(40, 'Inquiry', 0, NULL, NULL, '2022-03-16 05:22:01', '2022-03-16 05:22:01'),
(41, 'Investigation', 0, NULL, NULL, '2022-03-16 05:22:13', '2022-03-16 05:22:13'),
(42, 'Judgment', 0, NULL, NULL, '2022-03-16 05:22:24', '2022-03-16 05:22:24'),
(43, 'Naraji petition', 0, NULL, NULL, '2022-03-16 05:22:44', '2022-03-16 05:22:44'),
(44, 'LCR', 0, NULL, NULL, '2022-03-16 05:23:12', '2022-03-16 05:23:12'),
(45, 'Off Track', 0, NULL, NULL, '2022-03-16 05:24:50', '2022-03-16 05:24:50'),
(46, 'Paper Notifucation', 0, NULL, NULL, '2022-03-16 05:25:19', '2022-03-16 05:25:19'),
(47, 'Pending for ACC Report', 0, NULL, NULL, '2022-03-16 05:25:43', '2022-03-16 05:25:43'),
(48, '30 CPC', 0, NULL, NULL, '2022-03-16 05:26:56', '2022-03-16 05:26:56'),
(49, 'Acquittal', 0, NULL, NULL, '2022-03-16 05:27:18', '2022-03-16 05:27:18'),
(50, 'AD Return', 0, NULL, NULL, '2022-03-16 05:27:41', '2022-03-16 05:27:41'),
(51, 'Admission Hearing', 0, NULL, NULL, '2022-03-16 05:28:19', '2022-03-16 05:28:19'),
(52, 'ADR', 0, NULL, NULL, '2022-03-16 05:28:29', '2022-03-16 05:28:29'),
(53, 'Appeal', 0, NULL, NULL, '2022-03-16 05:28:44', '2022-03-16 05:28:44'),
(54, 'Appearance of the parties', 0, NULL, NULL, '2022-03-16 05:29:06', '2022-03-16 05:29:06'),
(55, 'Arguments', 0, NULL, NULL, '2022-03-16 05:29:29', '2022-03-16 05:29:29'),
(56, 'Case Dismissed', 0, NULL, NULL, '2022-03-16 05:30:00', '2022-03-16 05:30:00'),
(57, 'Cross Examination', 0, NULL, NULL, '2022-03-16 05:30:23', '2022-03-16 05:30:23'),
(58, 'Defense Witness', 0, NULL, NULL, '2022-03-16 05:30:45', '2022-03-16 05:30:45'),
(59, 'Discharge', 0, NULL, NULL, '2022-03-16 05:30:59', '2022-03-16 05:30:59'),
(60, 'Disposed off By Compromise', 0, NULL, NULL, '2022-03-16 05:31:40', '2022-03-16 05:31:40'),
(61, 'Disposed off By Judgment (In Disfavour)', 0, NULL, NULL, '2022-03-16 05:32:48', '2022-03-16 05:32:48'),
(62, 'Disposed off By Judgment (In favour)', 0, NULL, NULL, '2022-03-16 05:33:19', '2022-03-16 05:33:19'),
(63, 'Disposed off By Withdrawal', 0, NULL, NULL, '2022-03-16 05:34:02', '2022-03-16 05:34:02'),
(64, 'Examination of Accused', 0, NULL, NULL, '2022-03-16 05:34:30', '2022-03-16 05:34:30'),
(65, 'Ex-party Decree', 0, NULL, NULL, '2022-03-16 05:34:51', '2022-03-16 05:34:51'),
(66, 'Charge Hearing', 0, NULL, NULL, '2022-07-17 06:58:02', '2022-07-17 06:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `setup_case_subcategories`
--

CREATE TABLE `setup_case_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `case_subcategory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_case_subcategories`
--

INSERT INTO `setup_case_subcategories` (`id`, `case_type`, `case_category_id`, `case_subcategory`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'High Court Division', 1, 'Appeal', 0, NULL, NULL, '2022-03-24 05:54:11', '2022-04-06 02:26:03'),
(2, 'High Court Division', 1, 'Miscellaneous', 0, NULL, NULL, '2022-03-24 05:54:36', '2022-04-06 02:29:23'),
(3, 'Appellate Court Division', 3, 'test financial Cases', 0, NULL, NULL, '2022-03-24 05:54:58', '2022-03-24 06:01:07'),
(4, 'High Court Division', 1, 'Revision', 0, NULL, NULL, '2022-04-06 02:26:23', '2022-04-06 02:26:23'),
(5, 'High Court Division', 1, 'Quashment', 0, NULL, NULL, '2022-04-06 02:26:59', '2022-04-06 02:26:59'),
(6, 'Criminal Cases', 7, 'C.R.', 0, NULL, NULL, '2022-04-13 03:12:14', '2022-04-13 03:12:14'),
(7, 'Criminal Cases', 7, 'G.R.', 0, NULL, NULL, '2022-04-13 03:12:33', '2022-04-13 03:12:33'),
(8, 'Criminal Cases', 7, 'Cr. Revision', 0, NULL, NULL, '2022-04-13 03:13:04', '2022-04-13 03:13:04'),
(9, 'Civil Cases', 8, 'Civil Revision', 0, NULL, NULL, '2022-04-13 03:13:21', '2022-04-13 09:57:04'),
(10, 'Criminal Cases', 7, 'Cr. Appeal', 0, NULL, NULL, '2022-04-13 03:13:48', '2022-04-13 03:13:48'),
(11, 'Criminal Cases', 7, 'Sessions Case (SC)', 0, NULL, NULL, '2022-04-13 03:14:10', '2022-04-13 03:14:10'),
(12, 'Criminal Cases', 7, 'NIAct', 0, NULL, NULL, '2022-04-13 09:57:55', '2022-04-13 09:57:55'),
(13, 'Criminal Cases', 7, 'Complaint Register', 0, NULL, NULL, '2022-04-20 13:01:51', '2022-04-20 13:01:51'),
(14, 'Criminal Cases', 9, 'Wages', 0, NULL, NULL, '2022-05-13 08:50:04', '2022-05-13 08:50:04'),
(15, 'Criminal Cases', 9, 'Complaint', 0, NULL, NULL, '2022-05-31 17:40:56', '2022-05-31 17:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `setup_case_titles`
--

CREATE TABLE `setup_case_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_title_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_case_titles`
--

INSERT INTO `setup_case_titles` (`id`, `case_type`, `case_title_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Criminal', 'C.R.', 0, NULL, NULL, '2022-04-17 23:35:49', '2022-07-04 18:51:55'),
(2, 'Criminal', 'G.R.', 0, NULL, NULL, '2022-04-17 23:35:53', '2022-07-04 18:52:03'),
(3, 'Criminal', 'Petition', 0, NULL, NULL, '2022-04-17 23:35:59', '2022-07-04 18:54:19'),
(4, 'Criminal', 'Sessions', 0, NULL, NULL, '2022-04-20 13:06:03', '2022-07-04 18:52:14'),
(5, 'Criminal', 'SC', 0, NULL, NULL, '2022-04-20 13:06:20', '2022-07-04 18:52:23'),
(6, 'Criminal', 'BLA (wages)', 0, NULL, NULL, '2022-05-13 08:51:29', '2022-07-04 18:51:26'),
(7, 'Criminal', 'BLA (complaint)', 0, NULL, NULL, '2022-05-31 17:42:38', '2022-07-04 18:51:41'),
(8, 'Criminal', 'AT', 0, NULL, NULL, '2022-06-06 11:27:22', '2022-07-04 18:57:53'),
(9, 'Civil', 'Civil Suit', 0, NULL, NULL, '2022-06-08 14:43:29', '2022-07-04 18:52:36'),
(10, NULL, 'Nari O Shishu Case No.', 1, NULL, NULL, '2022-06-08 14:57:42', '2022-06-08 14:57:59'),
(11, 'Criminal', 'Nari O Shishu Case No.', 0, NULL, NULL, '2022-06-08 14:57:52', '2022-07-04 18:52:44'),
(12, 'Criminal', 'Civil Suit', 0, NULL, NULL, '2022-08-08 16:29:55', '2022-08-08 16:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `setup_case_types`
--

CREATE TABLE `setup_case_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
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

INSERT INTO `setup_case_types` (`id`, `case_type`, `case_category_id`, `case_types_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '5', 1, 'Complaint Register (C.R.)', 0, NULL, NULL, '2022-02-15 05:22:22', '2022-07-04 05:56:52'),
(2, '6', 3, 'Civil Suit', 0, NULL, NULL, '2022-02-15 05:22:34', '2022-06-28 10:22:48'),
(3, NULL, NULL, 'Labour Cases', 1, NULL, NULL, '2022-02-28 04:25:37', '2022-06-28 11:05:51'),
(4, NULL, NULL, 'Special / Quassi-Judicial Cases', 1, NULL, NULL, '2022-02-28 04:26:50', '2022-06-27 16:48:37'),
(5, NULL, NULL, 'Supreme Court of Bangladesh', 1, NULL, NULL, '2022-02-28 04:27:14', '2022-06-27 16:48:42'),
(6, NULL, NULL, 'High Court Division', 1, NULL, NULL, '2022-02-28 04:27:34', '2022-03-14 06:02:34'),
(7, NULL, NULL, 'Appellate Court Division', 1, NULL, NULL, '2022-02-28 04:27:49', '2022-03-14 06:02:12'),
(8, NULL, NULL, 'NIAct', 1, NULL, NULL, '2022-04-13 02:28:55', '2022-06-27 16:48:54'),
(9, NULL, NULL, 'Fraud', 1, NULL, NULL, '2022-04-13 02:29:05', '2022-06-27 16:48:28'),
(10, NULL, NULL, 'Fraud and Misappropriation', 1, NULL, NULL, '2022-04-13 02:29:35', '2022-06-27 16:48:23'),
(11, '6', 3, 'Artha rin Suit', 0, NULL, NULL, '2022-06-28 10:23:39', '2022-06-28 10:23:39'),
(12, '5', 1, 'General Register (G. R)', 0, NULL, NULL, '2022-06-28 11:14:16', '2022-06-28 11:14:16'),
(13, '5', 1, 'Petition', 0, NULL, NULL, '2022-07-02 07:23:03', '2022-07-02 07:23:03'),
(14, '5', 1, 'Nari O Shishu', 0, NULL, NULL, '2022-07-02 07:23:30', '2022-07-02 07:23:30'),
(15, '6', 3, 'Title Suit', 0, NULL, NULL, '2022-07-02 07:25:28', '2022-07-02 07:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `setup_clients`
--

CREATE TABLE `setup_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_clients`
--

INSERT INTO `setup_clients` (`id`, `client_name`, `client_mobile`, `client_email`, `client_address`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Star Particle Board Mills Limited', NULL, NULL, 'Shanta Western Tower, Level – 13 Bir Uttam Mir Shawkat Road, 186 Tejgaon I/A Dhaka – 1208, Bangladesh', 0, NULL, NULL, '2022-04-17 02:40:26', '2022-04-20 14:39:42'),
(2, 'Partex Agro Limited', NULL, NULL, NULL, 0, NULL, NULL, '2022-04-17 02:40:33', '2022-04-20 14:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `setup_client_categories`
--

CREATE TABLE `setup_client_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_client_categories`
--

INSERT INTO `setup_client_categories` (`id`, `client_category_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'PERSON', 0, NULL, NULL, '2022-03-24 01:44:40', '2022-04-02 00:32:24'),
(2, 'PROPRIETORSHIP', 0, NULL, NULL, '2022-03-24 01:44:54', '2022-04-20 14:23:17'),
(3, 'COMPANY', 0, NULL, NULL, '2022-03-24 01:45:03', '2022-04-20 14:22:51'),
(4, 'NGO', 0, NULL, NULL, '2022-03-24 01:45:09', '2022-04-02 00:31:01'),
(5, 'FIRM', 0, NULL, NULL, '2022-03-24 01:45:16', '2022-04-20 14:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `setup_client_names`
--

CREATE TABLE `setup_client_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_client_names`
--

INSERT INTO `setup_client_names` (`id`, `client_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Johirul Islam', 0, NULL, NULL, '2022-07-04 06:19:09', '2022-07-04 12:57:36'),
(2, 'test 2', 1, NULL, NULL, '2022-07-04 06:19:38', '2022-07-04 06:19:54'),
(3, 'test 3', 0, NULL, NULL, '2022-07-04 06:19:49', '2022-07-04 06:19:49'),
(4, 'complainant', 0, NULL, NULL, '2022-07-04 06:57:57', '2022-07-04 06:57:57'),
(5, 'Masud', 0, NULL, NULL, '2022-07-06 11:14:22', '2022-07-06 11:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `setup_client_subcategories`
--

CREATE TABLE `setup_client_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_category_id` int(11) DEFAULT NULL,
  `client_subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_client_subcategories`
--

INSERT INTO `setup_client_subcategories` (`id`, `client_category_id`, `client_subcategory_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'Zaimah Technologies Limited', 0, NULL, NULL, '2022-03-24 03:16:09', '2022-03-24 03:16:42'),
(2, 4, 'Premier Bank Limited', 0, NULL, NULL, '2022-03-24 03:16:26', '2022-03-24 03:16:26'),
(3, 2, 'Person', 0, NULL, NULL, '2022-03-24 03:17:03', '2022-04-20 14:21:23'),
(4, 4, 'City Bank Limited', 0, NULL, NULL, '2022-03-24 03:17:20', '2022-03-24 03:17:20'),
(5, 3, 'Bank', 0, NULL, NULL, '2022-04-02 00:34:03', '2022-04-02 00:34:03'),
(6, 3, 'Non Banking Financial Institution', 0, NULL, NULL, '2022-04-02 00:34:24', '2022-04-02 00:34:24'),
(7, 3, 'Private Limited Company', 0, NULL, NULL, '2022-04-02 00:35:23', '2022-04-02 00:35:23'),
(8, 3, 'Public Limited Company', 0, NULL, NULL, '2022-04-02 00:35:40', '2022-04-02 00:35:40'),
(9, 4, 'National NGO', 0, NULL, NULL, '2022-04-02 00:36:01', '2022-04-02 00:36:01'),
(10, 4, 'International NGO', 0, NULL, NULL, '2022-04-02 00:36:24', '2022-04-02 00:36:24'),
(11, 4, 'Foundation', 0, NULL, NULL, '2022-04-02 00:36:40', '2022-04-02 00:36:40'),
(12, 2, 'Company', 0, NULL, NULL, '2022-04-20 14:21:39', '2022-04-20 14:21:39'),
(13, 1, 'Ex-employee', 0, NULL, NULL, '2022-05-28 07:00:04', '2022-05-28 07:00:04'),
(14, 1, 'Private Service', 0, NULL, NULL, '2022-05-28 07:00:35', '2022-05-28 07:00:35'),
(15, 1, 'Business', 0, NULL, NULL, '2022-05-28 07:00:48', '2022-05-28 07:00:48');

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
(2, 2, 'ASD Company', 'Jack', 2, 0, NULL, NULL, '2022-02-15 05:12:36', '2022-02-26 06:06:56'),
(3, 2, 'Partex Star Group', 'Aziz Al Kaiser', 8, 0, NULL, NULL, '2022-03-16 01:08:48', '2022-03-16 01:10:03'),
(4, 2, 'Premier Cement Mills Limited', 'test', 8, 0, NULL, NULL, '2022-04-01 23:50:44', '2022-04-01 23:50:44');

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
-- Table structure for table `setup_complainants`
--

CREATE TABLE `setup_complainants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complainant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_complainants`
--

INSERT INTO `setup_complainants` (`id`, `complainant_name`, `complainant_mobile`, `complainant_email`, `complainant_address`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Star Particle Board Mills Limited', NULL, 'spbml@psgbd.com', 'adderes', 0, NULL, NULL, '2022-04-24 21:50:19', '2022-07-17 10:01:08'),
(2, 'Partex Agro Limited', NULL, 'pal@psgbd.com', 'Tejgaon, Dhaka', 0, NULL, NULL, '2022-04-24 21:50:27', '2022-07-17 10:01:32'),
(3, 'Partex Lamminates Limited', NULL, NULL, 'Shanta Western Tower, 186 Tejgaon, Dhaka-1208', 0, NULL, NULL, '2022-07-17 10:00:55', '2022-07-17 10:00:55');

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
(1, 'test', 0, NULL, NULL, '2022-02-26 06:11:36', '2022-03-08 23:36:39'),
(2, 'test 2 compliance', 0, NULL, NULL, '2022-03-08 04:51:15', '2022-03-14 04:45:21');

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
(1, '1', 'test 2', 0, NULL, NULL, '2022-02-26 06:11:52', '2022-03-08 04:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `setup_coordinators`
--

CREATE TABLE `setup_coordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinator_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_coordinators`
--

INSERT INTO `setup_coordinators` (`id`, `coordinator_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Client Himself', 0, NULL, NULL, '2022-04-10 22:10:24', '2022-04-20 10:14:03'),
(2, 'Client Representative', 0, NULL, NULL, '2022-04-10 22:10:35', '2022-04-20 10:13:55'),
(3, 'Client Coordinator', 0, NULL, NULL, '2022-05-28 06:52:26', '2022-05-28 06:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `setup_courts`
--

CREATE TABLE `setup_courts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_class_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `applicable_district_id` varchar(2555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_courts`
--

INSERT INTO `setup_courts` (`id`, `case_class_id`, `case_category_id`, `applicable_district_id`, `all_district`, `case_type`, `court_name`, `court_short_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '5', 1, 'Dhaka', NULL, 'Criminal Cases', 'Judge Court Dhaka', 'JDC1', 1, NULL, NULL, '2022-05-14 10:41:03', '2022-06-26 09:29:05'),
(2, NULL, NULL, 'Patuakhali, Feni', 'on', 'Criminal Cases', 'Court Kachari', 'CC1', 1, NULL, NULL, '2022-05-14 10:43:08', '2022-06-26 09:30:57'),
(3, 'Criminal', 1, 'Dhaka', NULL, NULL, 'Metropolitan Magistrate Court No. 25', 'MM-25', 0, NULL, NULL, '2022-05-17 10:44:10', '2022-07-05 17:18:28'),
(4, 'Criminal', 1, 'Dhaka', NULL, NULL, 'Metropolitan Magistrate Court No. 22', 'MM-22', 0, NULL, NULL, '2022-05-17 10:44:38', '2022-07-05 17:18:13'),
(5, 'Criminal', 1, 'Dhaka', NULL, NULL, 'Metropolitan Magistrate Court No. 19', 'MM-19', 0, NULL, NULL, '2022-05-17 10:44:57', '2022-07-05 17:18:53'),
(6, 'Criminal', 1, 'Dhaka', NULL, NULL, 'Metropolitan Magistrate Court No. 06', 'MM-06', 0, NULL, NULL, '2022-05-17 10:45:14', '2022-07-05 17:24:23'),
(7, 'Criminal', 1, 'Dhaka', NULL, NULL, '1st Joint  Metro Session Court', 'JMS-1', 0, NULL, NULL, '2022-05-17 10:45:29', '2022-07-05 17:19:28'),
(8, 'Criminal', 1, 'Dhaka', NULL, NULL, '2nd Joint  Metro Session Court', 'JMS-2', 0, NULL, NULL, '2022-05-17 10:45:49', '2022-07-05 17:19:44'),
(9, 'Criminal', 1, 'Dhaka', NULL, NULL, '3rd Joint  Metro Session Court', 'JMS-3', 0, NULL, NULL, '2022-05-17 10:46:08', '2022-07-05 17:20:03'),
(10, 'Criminal', 1, 'Dhaka', NULL, NULL, '1st Labour Court', 'DLC-1', 0, NULL, NULL, '2022-05-28 06:06:14', '2022-07-05 17:20:36'),
(11, 'Criminal', 1, 'Dhaka', NULL, NULL, '2nd  Labour Court', 'DLC-2', 0, NULL, NULL, '2022-05-28 06:06:31', '2022-07-05 17:20:52'),
(12, 'Criminal', 1, 'Dhaka', NULL, NULL, '3rd Labour Court', 'DLC-3', 0, NULL, NULL, '2022-05-28 06:06:57', '2022-07-05 17:21:02'),
(13, 'Criminal', 1, 'Dhaka', NULL, NULL, 'Administrative Tribunal-1, Dhaka', 'DAT-1', 0, NULL, NULL, '2022-06-06 11:14:13', '2022-07-05 17:21:33'),
(14, 'Criminal', 1, 'Dhaka', NULL, NULL, 'Metropolitan Magistrate Court No. 18', 'MM-18', 0, NULL, NULL, '2022-06-08 13:25:44', '2022-07-05 17:21:22'),
(15, 'Criminal', 1, 'Dhaka', NULL, NULL, 'Metropolitan Magistrate Court No. 20', 'MM-20', 0, NULL, NULL, '2022-06-08 13:32:25', '2022-07-05 17:21:59'),
(16, 'Criminal', 1, 'Dhaka', NULL, NULL, '4th Joint  Metro Session Court', 'JMS-4', 0, NULL, NULL, '2022-06-08 13:33:19', '2022-07-05 17:22:14'),
(17, 'Criminal', 1, 'Dhaka', NULL, NULL, '5th Joint  Metro Session Court', 'JMS-5', 0, NULL, NULL, '2022-06-08 13:33:38', '2022-07-05 17:22:39'),
(18, 'Criminal', 1, 'Dhaka', NULL, NULL, '6th Joint  Metro Session Court', 'JMS-6', 0, NULL, NULL, '2022-06-08 13:34:02', '2022-07-05 17:23:00'),
(19, 'Criminal', 1, 'Dhaka', NULL, NULL, '7th Joint  Metro Session Court', 'JMS-7', 0, NULL, NULL, '2022-06-08 13:34:23', '2022-07-05 17:23:15'),
(20, 'Criminal', 1, 'Dhaka', NULL, NULL, '4th Joint  District Judge Court', 'JDJC-4', 0, NULL, NULL, '2022-06-08 14:40:07', '2022-07-05 17:23:29'),
(21, 'Criminal', 1, 'Dhaka', NULL, NULL, 'Nari O Shishu Nirjaton Damon Tribunal No. 09', 'NSNDT-9', 0, NULL, NULL, '2022-06-08 14:59:52', '2022-07-05 17:23:43'),
(22, 'Criminal', 1, 'Dhaka', NULL, NULL, 'Senior Assistant Judge (Damrai)', 'SAJD', 0, NULL, NULL, '2022-06-08 15:56:37', '2022-07-05 17:24:06'),
(23, '5', 1, 'Barguna, Lakshmipur, Feni, Rangamati', 'on', NULL, 'test', NULL, 1, NULL, NULL, '2022-07-04 09:16:27', '2022-07-05 04:33:19'),
(24, 'Criminal', 1, 'Barguna, Chittagong, Khulna', NULL, NULL, 'Test Court', 'TC', 1, NULL, NULL, '2022-07-05 04:34:20', '2022-07-05 17:16:01'),
(25, 'Criminal', NULL, 'Dhaka', NULL, NULL, '1st Additional District Judge Court', 'ADJC-1', 0, NULL, NULL, '2022-08-08 17:14:01', '2022-08-08 17:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `setup_court_classes`
--

CREATE TABLE `setup_court_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_court_classes`
--

INSERT INTO `setup_court_classes` (`id`, `case_class_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test', 0, NULL, NULL, '2022-03-20 03:17:38', '2022-03-20 03:17:38'),
(2, 'test 2', 0, NULL, NULL, '2022-03-20 03:18:38', '2022-03-20 03:18:38'),
(3, 'test 3', 0, NULL, NULL, '2022-03-20 03:19:00', '2022-03-20 03:23:50'),
(4, 'test 4', 0, NULL, NULL, '2022-03-20 03:23:22', '2022-03-20 03:24:03'),
(5, 'test 5', 1, NULL, NULL, '2022-03-20 03:23:29', '2022-03-20 03:24:10');

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
(1, 'Issued Summon', 0, NULL, NULL, '2022-02-15 05:13:38', '2022-05-13 12:50:57'),
(2, 'Argument Hearing', 0, NULL, NULL, '2022-03-13 05:40:15', '2022-03-13 05:40:15'),
(3, 'Service Return (SR)', 0, NULL, NULL, '2022-03-16 01:05:03', '2022-03-16 01:05:03'),
(4, 'Warrant of Arrest', 0, NULL, NULL, '2022-03-16 01:05:20', '2022-03-16 01:05:20'),
(5, 'TP granted', 0, NULL, NULL, '2022-05-13 13:57:26', '2022-05-13 13:57:26'),
(6, 'Wokalotnama accepted', 0, NULL, NULL, '2022-05-13 13:57:49', '2022-05-13 13:57:49'),
(7, 'Warrant of Proclamation and Attachment (WP&A)', 0, NULL, NULL, '2022-05-23 05:20:29', '2022-05-23 05:20:29'),
(8, 'Accepted WS', 0, NULL, NULL, '2022-05-28 08:07:14', '2022-05-28 08:07:14'),
(9, 'Petition Hearing', 0, NULL, NULL, '2022-05-31 10:19:10', '2022-05-31 10:19:10'),
(10, 'Bail granted', 0, NULL, NULL, '2022-07-27 16:48:20', '2022-07-27 16:48:20'),
(11, 'Bail granted and the Case is ready for trial', 0, NULL, NULL, '2022-07-27 16:48:44', '2022-07-27 16:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `setup_court_proceedings`
--

CREATE TABLE `setup_court_proceedings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `court_proceeding_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_court_proceedings`
--

INSERT INTO `setup_court_proceedings` (`id`, `court_proceeding_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Filed complaint petition and issued Summon', 0, NULL, NULL, '2022-04-13 03:44:51', '2022-04-21 14:13:06'),
(2, 'Filed complaint petition', 0, NULL, NULL, '2022-04-13 03:45:12', '2022-04-21 14:27:32'),
(3, 'Witness Completed', 0, NULL, NULL, '2022-04-13 04:02:37', '2022-04-13 10:33:59'),
(4, 'Filed petition and issued Summon', 0, NULL, NULL, '2022-05-13 12:47:31', '2022-05-13 12:47:31'),
(5, 'Filed Petition', 1, NULL, NULL, '2022-05-13 12:48:07', '2022-07-27 16:44:38'),
(6, '2nd Party appeared by Wokalotnama', 0, NULL, NULL, '2022-05-13 13:38:03', '2022-05-13 13:38:03'),
(7, '2nd Party submitted TP for submitting WS', 0, NULL, NULL, '2022-05-13 13:39:05', '2022-05-13 13:39:05'),
(8, '2nd Party submitted TP for submitting Documents', 0, NULL, NULL, '2022-07-04 15:14:23', '2022-07-04 15:14:23'),
(9, 'Bail granted', 1, NULL, NULL, '2022-07-27 16:41:11', '2022-07-27 16:44:32'),
(10, 'Bail granted and the Case is ready for trial', 0, NULL, NULL, '2022-07-27 16:42:34', '2022-07-27 16:42:34'),
(11, 'Filed petition', 0, NULL, NULL, '2022-07-27 16:45:22', '2022-07-27 16:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `setup_court_shorts`
--

CREATE TABLE `setup_court_shorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_court_shorts`
--

INSERT INTO `setup_court_shorts` (`id`, `case_type`, `court_short_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Criminal Cases', 'MM-1', 0, NULL, NULL, '2022-04-24 22:54:57', '2022-04-25 18:28:05'),
(2, 'High Court Division', 'HC 1', 0, NULL, NULL, '2022-04-24 22:55:08', '2022-04-24 22:55:31'),
(3, 'Criminal Cases', 'MM-2', 0, NULL, NULL, '2022-04-25 18:28:16', '2022-04-25 18:28:16'),
(4, 'Criminal Cases', 'MM-3', 0, NULL, NULL, '2022-04-25 18:29:56', '2022-04-25 18:29:56'),
(5, 'Criminal Cases', 'DLC-1', 0, NULL, NULL, '2022-05-13 08:30:10', '2022-05-13 08:30:10'),
(6, 'Criminal Cases', 'DLC-2', 0, NULL, NULL, '2022-05-13 08:30:22', '2022-05-13 08:30:22'),
(7, 'Criminal Cases', 'DLC-3', 0, NULL, NULL, '2022-05-13 08:30:46', '2022-05-13 08:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `setup_day_notes`
--

CREATE TABLE `setup_day_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_notes_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_day_notes`
--

INSERT INTO `setup_day_notes` (`id`, `day_notes_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Completed case filing successfully', 0, NULL, NULL, '2022-04-13 04:02:33', '2022-04-21 14:29:58'),
(2, 'Submitted Complaint Hazira', 0, NULL, NULL, '2022-04-13 04:10:19', '2022-04-21 14:31:09'),
(3, '2nd Party was present', 0, NULL, NULL, '2022-04-13 04:10:55', '2022-05-13 17:13:08'),
(4, 'dsfdsf', 0, NULL, NULL, '2022-04-13 04:10:59', '2022-04-13 04:10:59'),
(5, 'gfhfgh', 0, NULL, NULL, '2022-04-13 04:11:11', '2022-04-13 04:11:11');

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
(1, 'Assistant Professor', 0, NULL, NULL, '2022-02-15 05:11:40', '2022-03-14 04:50:05'),
(2, 'Lawyer', 1, NULL, NULL, '2022-02-15 05:11:44', '2022-03-22 05:41:16'),
(3, 'Executive', 0, NULL, NULL, '2022-03-14 04:47:37', '2022-03-22 05:41:24'),
(4, 'Senior Executive', 0, NULL, NULL, '2022-03-14 04:48:53', '2022-03-14 04:48:53'),
(5, 'Junior Executive', 0, NULL, NULL, '2022-03-14 04:48:53', '2022-03-14 23:04:35'),
(6, 'Officer', 0, NULL, NULL, '2022-03-14 23:01:53', '2022-03-16 03:30:58'),
(7, 'Assistant General Manager', 0, NULL, NULL, '2022-03-15 00:22:28', '2022-03-15 00:22:28'),
(8, 'Managing Director (MD)', 0, NULL, NULL, '2022-03-16 01:09:17', '2022-03-16 01:09:17'),
(9, 'Credit Recovery Officer', 0, NULL, NULL, '2022-03-22 05:40:58', '2022-03-22 05:40:58');

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
(2, 'Nagad', 1, NULL, NULL, '2022-03-01 03:47:48', '2022-03-14 21:57:39'),
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
(1, 1, 'Barishal', 0, NULL, NULL, '2022-04-27 03:39:17', '2022-07-21 18:30:37'),
(2, 1, 'Barguna', 0, NULL, NULL, '2022-04-27 03:39:52', '2022-04-27 03:39:52'),
(3, 1, 'Bhola', 0, NULL, NULL, '2022-04-27 03:40:02', '2022-04-27 03:40:02'),
(4, 1, 'Jhalokati', 0, NULL, NULL, '2022-04-27 03:40:09', '2022-04-27 03:40:09'),
(5, 1, 'Patuakhali', 0, NULL, NULL, '2022-04-27 03:40:25', '2022-04-27 03:40:25'),
(6, 1, 'Pirojpur', 0, NULL, NULL, '2022-04-27 03:40:35', '2022-04-27 03:40:35'),
(7, 2, 'Brahmanbaria', 0, NULL, NULL, '2022-04-27 03:41:58', '2022-04-27 03:41:58'),
(8, 2, 'Cumilla', 0, NULL, NULL, '2022-04-27 03:42:09', '2022-07-21 18:31:02'),
(9, 2, 'Chandpur', 0, NULL, NULL, '2022-04-27 03:42:18', '2022-04-27 03:42:18'),
(10, 2, 'Lakshmipur', 0, NULL, NULL, '2022-04-27 03:42:29', '2022-04-27 03:42:29'),
(11, 2, 'Noakhali', 0, NULL, NULL, '2022-04-27 03:42:37', '2022-07-21 18:32:40'),
(12, 2, 'Feni', 0, NULL, NULL, '2022-04-27 03:42:44', '2022-04-27 03:42:44'),
(13, 2, 'Comilla(North Feni)', 1, NULL, NULL, '2022-04-27 03:45:33', '2022-04-27 10:03:54'),
(14, 2, 'Khagrachhari', 0, NULL, NULL, '2022-04-27 03:45:59', '2022-04-27 03:45:59'),
(15, 2, 'Rangamati', 0, NULL, NULL, '2022-04-27 03:46:09', '2022-04-27 03:46:09'),
(16, 2, 'Bandarban', 0, NULL, NULL, '2022-04-27 03:46:16', '2022-04-27 03:46:16'),
(17, 2, 'Chattogram', 0, NULL, NULL, '2022-04-27 03:46:23', '2022-07-21 18:35:06'),
(18, 2, 'Cox\'s Bazar', 0, NULL, NULL, '2022-04-27 03:46:29', '2022-04-27 03:46:29'),
(19, 2, 'Chittagong(South Feni)', 1, NULL, NULL, '2022-04-27 03:47:07', '2022-04-27 10:03:47'),
(20, 3, 'Dhaka', 0, NULL, NULL, '2022-04-27 03:47:48', '2022-04-27 03:47:48'),
(21, 3, 'Gazipur', 0, NULL, NULL, '2022-04-27 03:47:58', '2022-04-27 03:47:58'),
(22, 3, 'Kishoreganj', 0, NULL, NULL, '2022-04-27 03:48:06', '2022-04-27 03:48:06'),
(23, 3, 'Manikganj', 0, NULL, NULL, '2022-04-27 03:48:19', '2022-04-27 03:48:19'),
(24, 3, 'Munshiganj', 0, NULL, NULL, '2022-04-27 03:48:30', '2022-04-27 03:48:30'),
(25, 3, 'Narayanganj', 0, NULL, NULL, '2022-04-27 03:48:39', '2022-04-27 03:48:39'),
(26, 3, 'Narsingdi', 0, NULL, NULL, '2022-04-27 03:48:47', '2022-04-27 03:48:47'),
(27, 3, 'Tangail', 0, NULL, NULL, '2022-04-27 03:48:54', '2022-04-27 03:48:54'),
(28, 3, 'Faridpur', 0, NULL, NULL, '2022-04-27 03:49:02', '2022-04-27 03:49:02'),
(29, 3, 'Gopalganj', 0, NULL, NULL, '2022-04-27 03:49:14', '2022-04-27 03:49:14'),
(30, 3, 'Madaripur', 0, NULL, NULL, '2022-04-27 03:49:21', '2022-04-27 03:49:21'),
(31, 3, 'Rajbari', 0, NULL, NULL, '2022-04-27 03:49:30', '2022-04-27 03:49:30'),
(32, 3, 'Shariatpur', 0, NULL, NULL, '2022-04-27 03:49:38', '2022-04-27 03:49:38'),
(33, 4, 'Bagerhat', 0, NULL, NULL, '2022-04-27 03:50:52', '2022-04-27 03:50:52'),
(34, 4, 'Chuadanga', 0, NULL, NULL, '2022-04-27 03:51:01', '2022-04-27 03:51:01'),
(35, 4, 'Jashore', 0, NULL, NULL, '2022-04-27 03:51:13', '2022-04-27 03:51:13'),
(36, 4, 'Jhenaidah', 0, NULL, NULL, '2022-04-27 03:51:23', '2022-04-27 03:51:23'),
(37, 4, 'Khulna', 0, NULL, NULL, '2022-04-27 03:51:29', '2022-04-27 03:51:29'),
(38, 4, 'Kushtia', 0, NULL, NULL, '2022-04-27 03:51:39', '2022-04-27 03:51:39'),
(39, 4, 'Magura', 0, NULL, NULL, '2022-04-27 03:51:46', '2022-04-27 03:51:46'),
(40, 4, 'Meherpur', 0, NULL, NULL, '2022-04-27 03:51:52', '2022-04-27 03:51:52'),
(41, 4, 'Narail', 0, NULL, NULL, '2022-04-27 03:52:00', '2022-04-27 03:52:00'),
(42, 4, 'Satkhira', 0, NULL, NULL, '2022-04-27 03:52:09', '2022-04-27 03:52:09'),
(43, 5, 'Mymensingh', 0, NULL, NULL, '2022-04-27 03:53:06', '2022-04-27 03:53:06'),
(44, 5, 'Netrokona', 0, NULL, NULL, '2022-04-27 03:53:15', '2022-04-27 03:53:15'),
(45, 5, 'Jamalpur', 0, NULL, NULL, '2022-04-27 03:53:24', '2022-04-27 03:53:24'),
(46, 5, 'Sherpur', 0, NULL, NULL, '2022-04-27 03:53:33', '2022-04-27 03:53:33'),
(47, 6, 'Joypurhat', 0, NULL, NULL, '2022-04-27 03:55:48', '2022-04-27 03:55:48'),
(48, 6, 'Naogaon', 0, NULL, NULL, '2022-04-27 03:55:58', '2022-04-27 03:55:58'),
(49, 6, 'Nawabganj', 0, NULL, NULL, '2022-04-27 03:56:05', '2022-04-27 03:56:05'),
(50, 6, 'Natore', 0, NULL, NULL, '2022-04-27 03:56:11', '2022-04-27 03:56:11'),
(51, 6, 'Pabna', 0, NULL, NULL, '2022-04-27 03:56:18', '2022-04-27 03:56:18'),
(52, 6, 'Bogura', 0, NULL, NULL, '2022-04-27 03:56:26', '2022-07-21 18:37:53'),
(53, 6, 'Rajshahi', 0, NULL, NULL, '2022-04-27 03:56:32', '2022-04-27 03:56:32'),
(54, 6, 'Sirajganj', 0, NULL, NULL, '2022-04-27 03:56:38', '2022-04-27 03:56:38'),
(55, 7, 'Dinajpur', 0, NULL, NULL, '2022-04-27 03:57:56', '2022-04-27 03:57:56'),
(56, 7, 'Kurigram', 0, NULL, NULL, '2022-04-27 03:58:02', '2022-04-27 03:58:02'),
(57, 7, 'Gaibandha', 0, NULL, NULL, '2022-04-27 03:58:08', '2022-04-27 03:58:08'),
(58, 7, 'Lalmonirhat', 0, NULL, NULL, '2022-04-27 03:58:15', '2022-04-27 03:58:15'),
(59, 7, 'Nilphamari', 0, NULL, NULL, '2022-04-27 03:58:23', '2022-04-27 03:58:23'),
(60, 7, 'Panchagarh', 0, NULL, NULL, '2022-04-27 03:58:30', '2022-04-27 03:58:30'),
(61, 7, 'Rangpur', 0, NULL, NULL, '2022-04-27 03:58:37', '2022-04-27 03:58:37'),
(62, 7, 'Thakurgaon', 0, NULL, NULL, '2022-04-27 03:58:44', '2022-04-27 03:58:44'),
(63, 8, 'Habiganj', 0, NULL, NULL, '2022-04-27 03:59:40', '2022-04-27 03:59:40'),
(64, 8, 'Moulvibazar', 0, NULL, NULL, '2022-04-27 03:59:50', '2022-04-27 03:59:50'),
(65, 8, 'Sunamganj', 0, NULL, NULL, '2022-04-27 04:00:02', '2022-04-27 04:00:02'),
(66, 8, 'Sylhet', 0, NULL, NULL, '2022-04-27 04:00:11', '2022-04-27 04:00:11');

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
(1, 'Barishal', 0, NULL, NULL, '2022-04-27 03:35:43', '2022-07-21 18:33:08'),
(2, 'Chattogram', 0, NULL, NULL, '2022-04-27 03:36:40', '2022-07-21 18:33:51'),
(3, 'Dhaka', 0, NULL, NULL, '2022-04-27 03:37:15', '2022-04-27 03:37:15'),
(4, 'Khulna', 0, NULL, NULL, '2022-04-27 03:37:20', '2022-04-27 03:37:20'),
(5, 'Mymensingh', 0, NULL, NULL, '2022-04-27 03:37:28', '2022-04-27 03:37:28'),
(6, 'Rajshahi', 0, NULL, NULL, '2022-04-27 03:37:36', '2022-04-27 03:37:36'),
(7, 'Rangpur', 0, NULL, NULL, '2022-04-27 03:37:42', '2022-04-27 03:37:42'),
(8, 'Sylhet', 0, NULL, NULL, '2022-04-27 03:37:47', '2022-04-27 03:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `setup_documents`
--

CREATE TABLE `setup_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documents_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_documents`
--

INSERT INTO `setup_documents` (`id`, `documents_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, NULL, NULL, '2022-04-17 23:04:02', '2022-07-02 16:33:02'),
(2, 'test', 1, NULL, NULL, '2022-04-17 23:04:18', '2022-07-02 16:33:06'),
(3, 'Petition', 0, NULL, NULL, '2022-04-17 23:04:22', '2022-05-13 09:51:20'),
(4, 'Plaint', 0, NULL, NULL, '2022-05-13 09:51:43', '2022-05-13 09:51:43'),
(5, 'Complaint', 0, NULL, NULL, '2022-05-13 09:51:55', '2022-05-13 09:51:55'),
(6, 'Written Statement', 0, NULL, NULL, '2022-05-13 09:52:17', '2022-05-13 09:52:17'),
(7, 'Charge Sheet', 0, NULL, NULL, '2022-05-13 09:52:36', '2022-05-13 09:52:36'),
(8, 'Charge Form', 0, NULL, NULL, '2022-05-13 09:52:48', '2022-05-13 09:52:48'),
(9, 'Investigation Report', 0, NULL, NULL, '2022-05-13 09:53:07', '2022-05-13 09:53:07'),
(10, 'Legal Notice by 1st Party', 0, NULL, NULL, '2022-05-13 09:53:49', '2022-05-13 09:53:49'),
(11, 'Legal Notice by 2nd Party', 0, NULL, NULL, '2022-05-13 09:54:11', '2022-05-13 09:54:11'),
(12, 'Letter by 1st Party', 0, NULL, NULL, '2022-05-13 09:54:27', '2022-05-13 09:54:27'),
(13, 'Letter by 2nd Party', 0, NULL, NULL, '2022-05-13 09:54:41', '2022-05-13 09:54:41'),
(14, 'Legal Notice (Served)', 0, NULL, NULL, '2022-07-25 05:14:04', '2022-07-25 05:18:12'),
(15, 'Cheque Dishonour', 0, NULL, NULL, '2022-07-25 05:14:50', '2022-07-25 05:14:50'),
(16, 'Cheque', 0, NULL, NULL, '2022-07-25 05:15:39', '2022-07-25 05:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `setup_documents_types`
--

CREATE TABLE `setup_documents_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documents_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_documents_types`
--

INSERT INTO `setup_documents_types` (`id`, `documents_type_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ORG', 0, NULL, NULL, '2022-08-01 06:12:09', '2022-08-01 06:12:09'),
(2, 'CC', 0, NULL, NULL, '2022-08-01 06:12:28', '2022-08-01 06:12:28'),
(3, 'COPY', 0, NULL, NULL, '2022-08-01 06:12:36', '2022-08-01 06:13:24'),
(4, 'test', 1, NULL, NULL, '2022-08-01 06:13:28', '2022-08-01 06:13:34');

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
  `is_associate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whose_associate_id` int(11) DEFAULT NULL,
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

INSERT INTO `setup_external_councils` (`id`, `title_id`, `first_name`, `middle_name`, `last_name`, `is_associate`, `whose_associate_id`, `email`, `work_phone`, `home_phone`, `mobile_phone`, `emergency_contact`, `document_upload`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'N.', 'K.', 'Zoha', 'off', NULL, 'nkzoha@gmail.com', '01717-406688', NULL, NULL, '01996321542', NULL, 0, NULL, NULL, '2022-06-26 09:55:48', '2022-06-26 09:55:48'),
(2, 3, 'Md. Niamul', 'Niamul', 'Kabir', 'off', NULL, 'niamulkabir.adv@gmail.com', '01717406688', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 10:00:55', '2022-07-17 08:18:05'),
(3, 1, 'Md.', 'Imran', 'Hossain', 'off', NULL, 'imran.zaimahtech@gmail.com', '01771045019', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-26 10:02:01', '2022-07-17 08:18:34'),
(4, 3, 'Md.', 'Johirul', 'Islam', 'off', NULL, 'jislam@admin.com', '01820703940', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-26 10:05:41', '2022-07-17 08:18:40'),
(5, 2, 'Mr.', 'Imran', 'None', 'off', NULL, 'mdimranhossain985@gmail.com', '01771045019', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-06-26 10:37:39', '2022-07-17 08:18:47'),
(6, 3, 'Md. Johirul', 'Mushfiqur', 'Islam', 'off', NULL, 'johirulislam.adv@gmail.com', '01820703940', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 10:54:10', '2022-07-17 08:35:23');

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
(1, 5, 5, 'Tamzid', 'Islam', 'Tamzid', 'testtesttest@asdf.com', '01996325478', '01996321542', '01996321542', '0156549875', NULL, 1, NULL, NULL, '2022-02-15 04:50:29', '2022-06-29 09:07:30'),
(2, 5, 3, 'Md', 'Solimullah', 'Sarkar', 'solimullahsarkar@gmail.com', '01996325478', '01996321542', '01998876465', '54641654984', NULL, 0, NULL, NULL, '2022-02-15 05:03:28', '2022-06-06 11:56:49'),
(3, 2, 2, 'Jhon', 'Doe', 'Jack', 'smith@atesste', '01996325478', '01996321542', '01998876465', '01996321542', NULL, 1, NULL, NULL, '2022-02-15 05:04:04', '2022-06-06 11:55:30'),
(4, 2, 2, 'Stefen', 'Hokings', 'H', 'testtesttest@faasdfadsf.com', '01996325478', '01996321542', '01998876465', '54641654984', NULL, 1, NULL, NULL, '2022-02-15 05:04:53', '2022-06-06 11:55:24'),
(5, 2, 3, 'Md.', 'Johirul', 'Islam', 'Johirulislam.adv@gmail.com', '01820703940', NULL, '01515699937', '01821541755', NULL, 0, NULL, NULL, '2022-03-16 03:42:47', '2022-06-29 16:12:43'),
(6, 5, 3, 'Md.', 'Zohurul', 'Haque', 'zohurul.haque.cdla@gmail.com', '01712701286', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-13 09:49:17', '2022-05-13 09:49:17'),
(7, 2, 3, 'Md.', NULL, 'Nasir', 'nurislamnasir7@gmail.com', '01625707601', NULL, '01710816493', '01912239125', NULL, 0, NULL, NULL, '2022-06-29 16:10:46', '2022-07-06 17:29:18');

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

--
-- Dumping data for table `setup_external_council_associates_files`
--

INSERT INTO `setup_external_council_associates_files` (`id`, `external_council_associates_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, '164708153424164492477745byden (4).jpg', 0, NULL, NULL, '2022-03-12 04:38:54', '2022-03-12 04:38:54'),
(2, 4, '164708153467164707806045164654784592byden.jpg', 0, NULL, NULL, '2022-03-12 04:38:54', '2022-03-12 04:38:54');

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

--
-- Dumping data for table `setup_external_council_files`
--

INSERT INTO `setup_external_council_files` (`id`, `external_council_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '164707806045164654784592byden.jpg', 0, NULL, NULL, '2022-03-12 03:41:00', '2022-03-12 03:41:00'),
(2, 1, '164707806075164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-12 03:41:00', '2022-03-12 03:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `setup_flat_numbers`
--

CREATE TABLE `setup_flat_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `flat_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_flat_numbers`
--

INSERT INTO `setup_flat_numbers` (`id`, `floor_id`, `flat_number`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'A1', 0, NULL, NULL, '2022-03-07 02:42:10', '2022-03-07 02:42:10'),
(2, 2, 'B1', 0, NULL, NULL, '2022-03-07 02:42:15', '2022-03-07 02:42:15'),
(3, 3, 'C1', 0, NULL, NULL, '2022-03-07 02:42:20', '2022-03-07 02:42:20'),
(4, 4, 'D1', 0, NULL, NULL, '2022-03-07 02:42:24', '2022-03-07 02:42:24'),
(5, 5, 'adsf', 0, NULL, NULL, '2022-03-07 02:42:28', '2022-03-07 02:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `setup_floors`
--

CREATE TABLE `setup_floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_floors`
--

INSERT INTO `setup_floors` (`id`, `floor_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1st', 0, NULL, NULL, '2022-03-07 02:41:38', '2022-03-07 02:41:38'),
(2, '2nd', 0, NULL, NULL, '2022-03-07 02:41:41', '2022-03-07 02:41:41'),
(3, '3rd', 0, NULL, NULL, '2022-03-07 02:41:44', '2022-03-07 02:41:44'),
(4, '4th', 0, NULL, NULL, '2022-03-07 02:41:47', '2022-03-14 21:58:15'),
(5, '5th', 0, NULL, NULL, '2022-03-07 02:41:51', '2022-03-07 02:41:51'),
(6, '6th', 0, NULL, NULL, '2022-03-07 02:41:54', '2022-03-07 02:41:54'),
(7, '7th', 0, NULL, NULL, '2022-03-07 02:41:57', '2022-03-07 02:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `setup_groups`
--

CREATE TABLE `setup_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_groups`
--

INSERT INTO `setup_groups` (`id`, `group_name`, `created_by`, `updated_by`, `delete_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Partex Star Group, CX-1', NULL, NULL, NULL, NULL, '2022-08-10 12:29:30', '2022-08-13 13:35:25'),
(2, 'Group 2', NULL, NULL, NULL, NULL, '2022-08-10 12:29:35', '2022-08-10 12:29:35');

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
(1, 3, 'Md. Niamul Kabir', NULL, NULL, 'niamulkabir.adv@gmail.com', '01717-406688', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-15 05:27:43', '2022-07-17 08:10:53'),
(2, 3, 'Md. Johirul Islam', NULL, NULL, 'Johirulislam.adv@gmail.com', '01820703940', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-02-15 05:28:20', '2022-07-17 08:12:44'),
(3, 3, 'Md.', 'Niamul', 'Kabir', 'niamulkabir@gmail.com', '017406688', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-04-01 23:55:46', '2022-07-17 08:12:53'),
(4, 3, 'Md.', 'Zohurul', 'Haque', 'zohurul.haque.cdla@gmail.com', '01712701286', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-05-13 09:47:00', '2022-07-17 08:13:00'),
(5, 3, 'Md. Nasir', NULL, NULL, 'test@gamil.com', '01625707601', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-17 08:14:42', '2022-07-17 08:14:42'),
(6, 3, 'Test', NULL, NULL, 'test@gamil.com', '01857845774', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-17 08:28:46', '2022-07-17 08:28:46');

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

--
-- Dumping data for table `setup_internal_council_files`
--

INSERT INTO `setup_internal_council_files` (`id`, `internal_council_id`, `uploaded_document`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, '164707915393164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-12 03:59:13', '2022-03-12 03:59:13'),
(2, 2, '164707915315164664984260john.jpg', 0, NULL, NULL, '2022-03-12 03:59:13', '2022-03-12 03:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `setup_in_favour_ofs`
--

CREATE TABLE `setup_in_favour_ofs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `in_favour_of_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_in_favour_ofs`
--

INSERT INTO `setup_in_favour_ofs` (`id`, `in_favour_of_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Complainant', 0, NULL, NULL, '2022-04-18 01:58:37', '2022-04-20 08:29:03'),
(2, 'Petitioner', 0, NULL, NULL, '2022-04-18 01:58:41', '2022-04-20 08:29:17'),
(3, 'Informant', 0, NULL, NULL, '2022-04-20 08:29:31', '2022-04-20 08:29:31'),
(4, 'Accused', 0, NULL, NULL, '2022-04-20 08:29:39', '2022-04-20 08:29:39'),
(5, '1st Party', 0, NULL, NULL, '2022-04-20 08:30:05', '2022-04-20 08:30:05'),
(6, '2nd Party', 0, NULL, NULL, '2022-04-20 08:30:22', '2022-04-20 08:30:52'),
(7, 'Opposite Party', 0, NULL, NULL, '2022-04-20 08:30:36', '2022-04-20 08:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `setup_laws`
--

CREATE TABLE `setup_laws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `law_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_laws`
--

INSERT INTO `setup_laws` (`id`, `case_type`, `law_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Civil Cases', 'Cilvil Laws', 0, NULL, NULL, '2022-04-06 23:56:21', '2022-04-06 23:57:27'),
(2, 'Criminal Cases', 'The Negotiable Instrument Act, 1881', 0, NULL, NULL, '2022-04-06 23:56:29', '2022-04-20 13:41:34'),
(3, 'Labour Cases', 'Labour Laws', 0, NULL, NULL, '2022-04-06 23:56:37', '2022-04-06 23:57:34'),
(4, 'Special Quassi - Judicial Cases', 'Judicial Law', 0, NULL, NULL, '2022-04-06 23:56:48', '2022-04-06 23:56:48'),
(5, 'High Court Division', 'High Court Law', 0, NULL, NULL, '2022-04-06 23:57:03', '2022-04-06 23:57:03'),
(6, 'Appellate Court Division', 'Appellate Law', 0, NULL, NULL, '2022-04-06 23:57:14', '2022-04-06 23:57:14'),
(7, 'Criminal Cases', 'The Code of Criminal Procedure, 1860', 0, NULL, NULL, '2022-04-20 13:47:25', '2022-04-20 13:47:25'),
(8, 'Criminal Cases', 'Bangladesh Labour Act, 2006', 0, NULL, NULL, '2022-05-13 09:34:25', '2022-05-13 09:34:25');

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
(1, 'Section 12', 1, NULL, NULL, '2022-02-15 05:23:50', '2022-03-14 04:47:09'),
(2, 'Section 33', 0, NULL, NULL, '2022-02-15 05:23:57', '2022-02-15 05:23:57'),
(3, 'Section 44', 0, NULL, NULL, '2022-02-15 05:24:01', '2022-02-15 05:24:01'),
(4, 'Section 138 of NI Act 1881', 0, NULL, NULL, '2022-03-13 05:43:33', '2022-03-15 00:03:50'),
(5, '420 and 406 of Penal Code 1860', 0, NULL, NULL, '2022-03-15 00:04:29', '2022-03-15 00:04:29'),
(6, '132(1) and 132(2) of Bangladesh Labour Act, 2006', 0, NULL, NULL, '2022-03-15 09:21:20', '2022-03-15 09:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `setup_legal_issues`
--

CREATE TABLE `setup_legal_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `legal_issue_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_legal_issues`
--

INSERT INTO `setup_legal_issues` (`id`, `legal_issue_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Legal Issue 5', 1, NULL, NULL, '2022-04-10 02:32:47', '2022-06-29 07:01:16'),
(2, 'Recovery of Money', 0, NULL, NULL, '2022-04-10 02:32:55', '2022-04-20 08:19:19'),
(3, 'Litigation for Recovery of Money', 0, NULL, NULL, '2022-04-13 02:35:31', '2022-04-13 02:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `setup_legal_services`
--

CREATE TABLE `setup_legal_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `legal_service_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_legal_services`
--

INSERT INTO `setup_legal_services` (`id`, `legal_service_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'To appear and contest case', 0, NULL, NULL, '2022-04-10 02:54:51', '2022-04-20 08:21:22'),
(2, 'To send Legal Notice', 0, NULL, NULL, '2022-04-10 02:54:58', '2022-04-20 08:20:45'),
(3, 'To file case', 0, NULL, NULL, '2022-04-13 02:38:14', '2022-04-13 02:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `setup_matters`
--

CREATE TABLE `setup_matters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_class_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `matter_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_matters`
--

INSERT INTO `setup_matters` (`id`, `case_class_id`, `case_category_id`, `matter_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'test matter', 1, NULL, NULL, '2022-04-10 03:11:37', '2022-07-02 06:37:31'),
(2, NULL, NULL, 'To file and conduct case', 1, NULL, NULL, '2022-04-10 03:11:42', '2022-07-02 06:37:35'),
(3, NULL, NULL, 'Appear and Contest', 1, NULL, NULL, '2022-04-13 02:53:05', '2022-07-02 06:37:38'),
(4, NULL, NULL, 'Case file and proceeding continue', 1, NULL, NULL, '2022-04-13 02:54:30', '2022-07-02 06:37:43'),
(5, NULL, NULL, 'Recovery of Money', 0, NULL, NULL, '2022-07-02 06:38:17', '2022-07-02 06:38:17'),
(6, NULL, NULL, 'Wages', 0, NULL, NULL, '2022-07-04 18:45:04', '2022-07-04 18:45:04'),
(7, NULL, NULL, 'Succession', 0, NULL, NULL, '2022-07-05 17:02:35', '2022-07-05 17:02:35'),
(8, NULL, NULL, 'Partition of Land', 0, NULL, NULL, '2022-07-05 17:03:21', '2022-07-05 17:03:21'),
(9, 'Criminal', 1, 'Intellectual Property', 0, NULL, NULL, '2022-07-06 13:01:29', '2022-08-10 16:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `setup_modes`
--

CREATE TABLE `setup_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mode_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_modes`
--

INSERT INTO `setup_modes` (`id`, `mode_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Email', 0, NULL, NULL, '2022-04-12 23:52:23', '2022-04-13 00:03:37'),
(2, 'Hard Copy', 0, NULL, NULL, '2022-04-12 23:52:57', '2022-04-13 00:03:26'),
(3, 'WhatsApp', 0, NULL, NULL, '2022-04-12 23:53:00', '2022-04-20 09:20:22'),
(4, 'In Presence', 0, NULL, NULL, '2022-04-20 09:20:44', '2022-04-20 09:20:44'),
(5, 'Mobile', 0, NULL, NULL, '2022-08-11 11:22:24', '2022-08-11 11:22:24');

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
(1, 'Appeared', 1, NULL, NULL, '2022-02-15 05:24:34', '2022-03-14 21:50:51'),
(2, 'Appeal', 0, NULL, NULL, '2022-02-15 05:24:38', '2022-03-14 21:51:14'),
(3, 'To appear by Wokalatnama', 0, NULL, NULL, '2022-02-15 05:24:43', '2022-04-20 08:52:42'),
(4, 'Warrant of Arrest', 0, NULL, NULL, '2022-03-14 04:41:41', '2022-04-20 08:53:49'),
(5, 'Petition Hearing', 0, NULL, NULL, '2022-03-14 04:42:44', '2022-03-14 21:50:12'),
(6, 'WP&A', 0, NULL, NULL, '2022-03-22 05:43:25', '2022-07-02 16:07:24'),
(7, 'Written Statement', 0, NULL, NULL, '2022-04-02 02:22:26', '2022-04-02 02:22:26'),
(8, 'Service Return (SR)', 0, NULL, NULL, '2022-04-20 08:53:42', '2022-05-23 05:11:03'),
(9, 'Investigation Report', 0, NULL, NULL, '2022-04-20 09:00:27', '2022-04-20 09:00:27'),
(10, 'Charge Hearing', 0, NULL, NULL, '2022-04-20 09:00:52', '2022-04-20 09:00:52'),
(11, 'Witness', 0, NULL, NULL, '2022-04-20 09:01:14', '2022-07-06 11:17:33'),
(12, 'Argument', 0, NULL, NULL, '2022-04-20 09:08:54', '2022-04-20 09:08:54'),
(13, 'Proclamation of Judgement', 0, NULL, NULL, '2022-04-20 09:09:16', '2022-04-20 09:09:16'),
(14, 'Filing of Complaint Petition', 0, NULL, NULL, '2022-04-21 14:11:15', '2022-04-21 14:11:15'),
(15, 'Filing Petition', 0, NULL, NULL, '2022-05-13 12:45:43', '2022-05-13 12:45:43'),
(16, 'Hearing', 0, NULL, NULL, '2022-06-06 11:31:20', '2022-06-06 11:31:20'),
(17, 'Paper Publication', 0, NULL, NULL, '2022-07-27 14:38:12', '2022-07-27 14:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `setup_next_day_presences`
--

CREATE TABLE `setup_next_day_presences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `next_day_presence_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_next_day_presences`
--

INSERT INTO `setup_next_day_presences` (`id`, `next_day_presence_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Your presence', 0, NULL, NULL, '2022-04-06 22:41:01', '2022-04-06 22:42:30'),
(2, 'Your presence along with original documents', 0, NULL, NULL, '2022-04-06 22:41:59', '2022-04-06 22:41:59'),
(3, 'Your presence along with witnesses', 0, NULL, NULL, '2022-04-06 22:42:10', '2022-04-06 22:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `setup_oppositions`
--

CREATE TABLE `setup_oppositions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opposition_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposition_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_oppositions`
--

INSERT INTO `setup_oppositions` (`id`, `opposition_name`, `opposition_mobile`, `opposition_email`, `opposition_address`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Aminur', NULL, NULL, NULL, 0, NULL, NULL, '2022-04-18 01:36:12', '2022-04-18 01:37:48'),
(2, 'Smith Aminur', '545345', 'asdf@adf', '43 Phillip St, Sydney NSW 2000, Australia', 0, NULL, NULL, '2022-04-18 01:37:37', '2022-04-18 01:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `setup_particulars`
--

CREATE TABLE `setup_particulars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `particulars_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_particulars`
--

INSERT INTO `setup_particulars` (`id`, `particulars_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Particulars 1', 0, NULL, NULL, '2022-07-25 04:40:51', '2022-07-25 04:40:51'),
(2, 'Particulars 2', 0, NULL, NULL, '2022-07-25 04:41:00', '2022-07-25 04:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `setup_parties`
--

CREATE TABLE `setup_parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_parties`
--

INSERT INTO `setup_parties` (`id`, `party_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test', 0, NULL, NULL, '2022-04-17 01:19:15', '2022-04-17 01:19:15'),
(2, 'Test', 0, NULL, NULL, '2022-04-17 01:44:47', '2022-04-17 01:47:05'),
(3, 'Accused', 0, NULL, NULL, '2022-04-17 01:46:47', '2022-04-17 01:46:47'),
(4, 'Opposites', 0, NULL, NULL, '2022-04-17 02:15:33', '2022-04-17 02:15:33');

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
(2, 'Dr.', 0, NULL, NULL, '2022-02-15 04:49:40', '2022-02-15 04:49:40'),
(3, 'Advocate', 0, NULL, NULL, '2022-03-13 05:35:03', '2022-03-13 05:35:03'),
(4, 'Engineer', 1, NULL, NULL, '2022-03-14 04:50:48', '2022-03-14 04:51:01'),
(5, 'Lawyer', 0, NULL, NULL, '2022-03-22 05:41:41', '2022-03-22 05:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `setup_professions`
--

CREATE TABLE `setup_professions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profession_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_professions`
--

INSERT INTO `setup_professions` (`id`, `profession_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Business', 0, NULL, NULL, '2022-04-17 03:19:07', '2022-04-21 13:36:42'),
(2, 'Development', 0, NULL, NULL, '2022-04-17 03:19:22', '2022-04-21 13:37:06');

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
-- Table structure for table `setup_progress`
--

CREATE TABLE `setup_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `progress_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_progress`
--

INSERT INTO `setup_progress` (`id`, `progress_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test 2', 0, NULL, NULL, '2022-04-24 23:37:16', '2022-04-24 23:38:10'),
(2, 'No progress', 0, NULL, NULL, '2022-04-24 23:37:25', '2022-04-24 23:37:25'),
(3, 'Advanced Progress', 0, NULL, NULL, '2022-04-24 23:38:01', '2022-04-24 23:38:01');

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
(1, 'Owened', 1, NULL, NULL, '2022-02-15 05:14:46', '2022-03-14 04:44:51'),
(2, 'Private Property', 0, NULL, NULL, '2022-02-15 05:15:01', '2022-02-15 05:15:01'),
(3, 'Business Property', 0, NULL, NULL, '2022-02-15 05:15:08', '2022-02-15 05:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `setup_referrers`
--

CREATE TABLE `setup_referrers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referrer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_referrers`
--

INSERT INTO `setup_referrers` (`id`, `referrer_name`, `referrer_mobile`, `referrer_email`, `referrer_address`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Client himself', NULL, NULL, NULL, 0, NULL, NULL, '2022-04-17 00:46:13', '2022-04-20 09:23:07'),
(2, 'Advocate', NULL, NULL, NULL, 0, NULL, NULL, '2022-04-20 09:23:53', '2022-04-20 09:28:00'),
(3, 'Relative', NULL, NULL, NULL, 0, NULL, NULL, '2022-04-20 09:28:09', '2022-04-20 09:28:09'),
(4, 'Vice Chairman', NULL, NULL, NULL, 0, NULL, NULL, '2022-04-24 00:31:38', '2022-04-24 00:31:38'),
(5, 'Client Representative', NULL, NULL, NULL, 0, NULL, NULL, '2022-04-25 18:10:01', '2022-04-25 18:10:01');

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
-- Table structure for table `setup_sections`
--

CREATE TABLE `setup_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_sections`
--

INSERT INTO `setup_sections` (`id`, `section_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test', 0, NULL, NULL, '2022-03-20 03:45:48', '2022-03-20 03:46:12'),
(2, '144', 0, NULL, NULL, '2022-03-20 03:45:53', '2022-03-20 03:46:06'),
(3, '33', 0, NULL, NULL, '2022-03-20 03:45:57', '2022-03-20 03:45:57'),
(4, '138 and 140', 0, NULL, NULL, '2022-03-20 03:46:00', '2022-04-20 13:53:34'),
(5, '138', 0, NULL, NULL, '2022-04-01 23:46:24', '2022-04-20 13:53:10'),
(6, '132(1)', 0, NULL, NULL, '2022-05-13 09:35:14', '2022-05-13 09:35:14');

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
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_seller_buyers`
--

INSERT INTO `setup_seller_buyers` (`id`, `title_id`, `seller_or_buyer`, `seller_buyer_name`, `email`, `work_phone`, `home_phone`, `mobile_phone`, `emergency_contact`, `present_address`, `permanent_address`, `image`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Seller', 'Aminur Rahman Smith Aminur', 'asdf@adf', '01996325478', '01698774123', '01996321542', NULL, '43 Phillip St, Sydney NSW 2000, Australia', 'adsf', '16464571030no_images.png', 0, NULL, NULL, '2022-03-04 23:08:06', '2022-03-04 23:46:34'),
(2, 2, 'Buyer', 'Stefen Hokings', 'asdf@adf', '234151', '01996321542', '01998876465', NULL, '43 Phillip St, Sydney NSW 2000, Australia', 'terte', '16465497401Integra_Logo.png', 1, NULL, NULL, '2022-03-04 23:08:25', '2022-03-14 21:57:48'),
(3, 2, 'Buyer', 'Jack Smith', 'asdf@adf', '01996325478', '01996321542', '01996321542', NULL, '43 Phillip St, Sydney NSW 2000, Australia', 'test updated', '16465497220byden.jpg', 0, NULL, NULL, '2022-03-04 23:12:28', '2022-03-06 00:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `setup_supreme_court_categories`
--

CREATE TABLE `setup_supreme_court_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supreme_court_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supreme_court_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_supreme_court_categories`
--

INSERT INTO `setup_supreme_court_categories` (`id`, `supreme_court_type`, `supreme_court_category`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'High Court Division', 'Original Cases', 0, NULL, NULL, '2022-03-16 00:51:46', '2022-03-16 01:05:43'),
(2, 'Appellate Court Division', 'Civil Cases', 0, NULL, NULL, '2022-03-16 00:53:19', '2022-03-16 02:40:20'),
(3, 'Appellate Court Division', 'Contempt Case', 0, NULL, NULL, '2022-03-16 00:53:45', '2022-03-16 01:06:07'),
(4, 'Appellate Court Division', 'Jail Cases', 0, NULL, NULL, '2022-03-16 00:53:56', '2022-03-16 00:53:56'),
(5, 'Appellate Court Division', 'Criminal Cases (HD)', 0, NULL, NULL, '2022-03-16 01:04:43', '2022-03-16 01:05:34'),
(6, 'High Court Division', 'Contempt Cases', 1, NULL, NULL, '2022-03-20 05:55:15', '2022-03-23 01:47:16'),
(7, 'High Court Division', 'Writ Cases', 0, NULL, NULL, '2022-03-23 01:48:09', '2022-03-23 01:48:09'),
(8, 'High Court Division', 'Civil Appeal', 0, NULL, NULL, '2022-03-23 02:08:11', '2022-03-23 02:08:11'),
(9, 'High Court Division', 'Civil Revision', 0, NULL, NULL, '2022-03-23 02:08:36', '2022-03-23 02:08:36'),
(10, 'High Court Division', 'Criminal Cases (HD)', 0, NULL, NULL, '2022-03-23 02:10:20', '2022-03-23 02:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `setup_supreme_court_subcategories`
--

CREATE TABLE `setup_supreme_court_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supreme_court_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supreme_court_category_id` int(11) DEFAULT NULL,
  `supreme_court_subcategory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_supreme_court_subcategories`
--

INSERT INTO `setup_supreme_court_subcategories` (`id`, `supreme_court_type`, `supreme_court_category_id`, `supreme_court_subcategory`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'High Court Division', 1, 'Divorce Suit', 0, NULL, NULL, '2022-03-16 03:50:51', '2022-03-16 04:10:45'),
(2, 'Appellate Court Division', 2, 'Civil Appeal', 0, NULL, NULL, '2022-03-16 04:08:15', '2022-03-16 04:08:44'),
(3, 'Appellate Court Division', 2, 'Civil Petition', 0, NULL, NULL, '2022-03-16 04:08:34', '2022-03-16 04:08:34'),
(4, 'High Court Division', 6, 'Civil Appeal', 0, NULL, NULL, '2022-03-20 05:55:35', '2022-03-20 05:55:35');

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
(1, 1, 'Agailjhara', 0, NULL, NULL, '2022-04-27 04:18:30', '2022-04-27 04:18:30'),
(2, 1, 'Gournadi', 0, NULL, NULL, '2022-04-27 04:19:06', '2022-04-27 04:19:06'),
(3, 1, 'Bakergonj', 0, NULL, NULL, '2022-04-27 04:19:17', '2022-04-27 04:19:17'),
(4, 1, 'Banaripara', 0, NULL, NULL, '2022-04-27 04:19:23', '2022-04-27 04:19:23'),
(5, 1, 'Barishal Sadar', 0, NULL, NULL, '2022-04-27 04:19:37', '2022-04-27 04:19:37'),
(6, 1, 'Mehendigonj', 0, NULL, NULL, '2022-04-27 04:19:44', '2022-04-27 04:19:44'),
(7, 1, 'Muladi', 0, NULL, NULL, '2022-04-27 04:19:50', '2022-04-27 04:19:50'),
(8, 1, 'Wazirpur', 0, NULL, NULL, '2022-04-27 04:19:56', '2022-04-27 04:19:56'),
(9, 1, 'Hizla', 0, NULL, NULL, '2022-04-27 04:20:04', '2022-04-27 04:20:04'),
(10, 2, 'Amtali', 0, NULL, NULL, '2022-04-27 04:20:59', '2022-04-27 04:20:59'),
(11, 2, 'Bamna', 0, NULL, NULL, '2022-04-27 04:21:08', '2022-04-27 04:21:08'),
(12, 2, 'Barguna Sadar', 0, NULL, NULL, '2022-04-27 04:21:16', '2022-04-27 04:21:16'),
(13, 2, 'Betagi', 0, NULL, NULL, '2022-04-27 04:21:23', '2022-04-27 04:21:23'),
(14, 2, 'Patharghata', 0, NULL, NULL, '2022-04-27 04:21:31', '2022-04-27 04:21:31'),
(15, 2, 'Taltali', 0, NULL, NULL, '2022-04-27 04:21:37', '2022-04-27 04:21:37'),
(16, 3, 'Bhola Sadar', 0, NULL, NULL, '2022-04-27 04:22:47', '2022-04-27 04:22:47'),
(17, 3, 'Char Fasson', 0, NULL, NULL, '2022-04-27 04:22:55', '2022-04-27 04:22:55'),
(18, 3, 'Manpura', 0, NULL, NULL, '2022-04-27 04:31:11', '2022-04-27 04:31:11'),
(19, 3, 'Burhanuddin', 0, NULL, NULL, '2022-04-27 04:31:19', '2022-04-27 04:31:19'),
(20, 3, 'Tazumuddin', 0, NULL, NULL, '2022-04-27 04:31:26', '2022-04-27 04:31:26'),
(21, 3, 'Daulatkhan', 0, NULL, NULL, '2022-04-27 04:31:34', '2022-04-27 04:31:34'),
(22, 3, 'Lalmohan', 0, NULL, NULL, '2022-04-27 04:31:40', '2022-04-27 04:31:40'),
(23, 4, 'Kathalia', 0, NULL, NULL, '2022-04-27 04:33:20', '2022-04-27 04:33:20'),
(24, 4, 'Jhalokati Sadar', 0, NULL, NULL, '2022-04-27 04:33:30', '2022-04-27 04:33:30'),
(25, 4, 'Nalchity', 0, NULL, NULL, '2022-04-27 04:33:36', '2022-04-27 04:33:36'),
(26, 4, 'Rajapur', 0, NULL, NULL, '2022-04-27 04:33:43', '2022-04-27 04:33:43'),
(27, 5, 'Patuakhali Sadar', 0, NULL, NULL, '2022-04-27 04:34:40', '2022-04-27 04:34:40'),
(28, 5, 'Galachipa', 0, NULL, NULL, '2022-04-27 04:34:47', '2022-04-27 04:34:47'),
(29, 5, 'Dumki', 0, NULL, NULL, '2022-04-27 04:34:56', '2022-04-27 04:34:56'),
(30, 5, 'Mirzaganj', 0, NULL, NULL, '2022-04-27 04:35:07', '2022-04-27 04:35:07'),
(31, 5, 'Dasmina', 0, NULL, NULL, '2022-04-27 04:38:56', '2022-04-27 04:38:56'),
(32, 5, 'Bauphal', 0, NULL, NULL, '2022-04-27 04:39:09', '2022-04-27 04:39:09'),
(33, 5, 'Kalapara', 0, NULL, NULL, '2022-04-27 04:39:19', '2022-04-27 04:39:19'),
(34, 5, 'Rangabali', 0, NULL, NULL, '2022-04-27 04:39:27', '2022-04-27 04:39:27'),
(35, 6, 'Bhandaria', 0, NULL, NULL, '2022-04-27 04:40:05', '2022-04-27 04:40:05'),
(36, 6, 'Kawkhali', 0, NULL, NULL, '2022-04-27 04:40:18', '2022-04-27 04:40:18'),
(37, 6, 'Mathbaria', 0, NULL, NULL, '2022-04-27 04:40:32', '2022-04-27 04:40:32'),
(38, 6, 'Nazirpur', 0, NULL, NULL, '2022-04-27 04:40:40', '2022-04-27 04:40:40'),
(39, 6, 'Nesarabad', 0, NULL, NULL, '2022-04-27 04:40:51', '2022-04-27 04:40:51'),
(40, 6, 'Pirojpur Sadar', 0, NULL, NULL, '2022-04-27 04:40:58', '2022-04-27 04:40:58'),
(41, 6, 'Indurkani', 0, NULL, NULL, '2022-04-27 04:41:06', '2022-04-27 04:41:06'),
(42, 7, 'Brahmanbaria(B.Baria) Sadar', 0, NULL, NULL, '2022-04-27 04:42:32', '2022-04-27 04:42:32'),
(43, 7, 'Bijoynagar', 0, NULL, NULL, '2022-04-27 04:42:42', '2022-04-27 04:42:42'),
(44, 7, 'Akhaura', 0, NULL, NULL, '2022-04-27 04:42:53', '2022-04-27 04:42:53'),
(45, 7, 'Ashuganj', 0, NULL, NULL, '2022-04-27 04:43:01', '2022-04-27 04:43:01'),
(46, 7, 'Bancharampur', 0, NULL, NULL, '2022-04-27 04:43:10', '2022-04-27 04:43:10'),
(47, 7, 'Kasba', 0, NULL, NULL, '2022-04-27 04:43:17', '2022-04-27 04:43:17'),
(48, 7, 'Nabinagar', 0, NULL, NULL, '2022-04-27 04:43:24', '2022-04-27 04:43:24'),
(49, 7, 'Nasirnagar', 0, NULL, NULL, '2022-04-27 04:43:32', '2022-04-27 04:43:32'),
(50, 7, 'Sarail', 0, NULL, NULL, '2022-04-27 04:43:40', '2022-04-27 04:43:40'),
(51, 8, 'Comilla Sadar South', 0, NULL, NULL, '2022-04-27 04:44:33', '2022-04-27 04:44:33'),
(52, 8, 'Comilla Adarsa Sadar', 0, NULL, NULL, '2022-04-27 04:44:44', '2022-04-27 04:44:44'),
(53, 8, 'Barura', 0, NULL, NULL, '2022-04-27 04:44:53', '2022-04-27 04:44:53'),
(54, 8, 'Chandina', 0, NULL, NULL, '2022-04-27 04:45:01', '2022-04-27 04:45:01'),
(55, 8, 'Chauddagram', 0, NULL, NULL, '2022-04-27 04:45:08', '2022-04-27 04:45:08'),
(56, 8, 'Daudkandi', 0, NULL, NULL, '2022-04-27 04:45:16', '2022-04-27 04:45:16'),
(57, 8, 'Brahmanpara', 0, NULL, NULL, '2022-04-27 04:45:23', '2022-04-27 04:45:23'),
(58, 8, 'Homna', 0, NULL, NULL, '2022-04-27 04:45:29', '2022-04-27 04:45:29'),
(59, 8, 'Monohorgonj', 0, NULL, NULL, '2022-04-27 04:45:35', '2022-04-27 04:45:35'),
(60, 8, 'Laksam', 0, NULL, NULL, '2022-04-27 04:45:42', '2022-04-27 04:45:42'),
(61, 8, 'Debidwar', 0, NULL, NULL, '2022-04-27 04:45:51', '2022-04-27 04:45:51'),
(62, 8, 'Meghna', 0, NULL, NULL, '2022-04-27 04:45:57', '2022-04-27 04:45:57'),
(63, 8, 'Muradnagar', 0, NULL, NULL, '2022-04-27 04:46:09', '2022-04-27 04:46:09'),
(64, 8, 'Nangalkot', 0, NULL, NULL, '2022-04-27 04:46:16', '2022-04-27 04:46:16'),
(65, 8, 'Burichong', 0, NULL, NULL, '2022-04-27 04:46:23', '2022-04-27 04:46:23'),
(66, 8, 'Titas', 0, NULL, NULL, '2022-04-27 04:46:29', '2022-04-27 04:46:29'),
(67, 9, 'Chandpur Sadar', 0, NULL, NULL, '2022-04-27 04:54:56', '2022-04-27 04:54:56'),
(68, 9, 'Haziganj', 0, NULL, NULL, '2022-04-27 04:55:09', '2022-04-27 04:55:09'),
(69, 9, 'Shahrasti', 0, NULL, NULL, '2022-04-27 04:55:18', '2022-04-27 04:55:18'),
(70, 9, 'Haimchar', 0, NULL, NULL, '2022-04-27 04:55:27', '2022-04-27 04:55:27'),
(71, 9, 'Faridganj', 0, NULL, NULL, '2022-04-27 04:55:37', '2022-04-27 04:55:37'),
(72, 9, 'Kachua', 0, NULL, NULL, '2022-04-27 04:55:44', '2022-04-27 04:55:44'),
(73, 9, 'Matlab Uttar', 0, NULL, NULL, '2022-04-27 04:55:57', '2022-04-27 04:55:57'),
(74, 9, 'Matlab Dakkhin', 0, NULL, NULL, '2022-04-27 04:56:06', '2022-04-27 04:56:06'),
(75, 10, 'Lakshmipur (Laxmipur) Sadar', 0, NULL, NULL, '2022-04-27 04:57:10', '2022-04-27 04:57:10'),
(76, 10, 'Ramgati', 0, NULL, NULL, '2022-04-27 04:57:19', '2022-04-27 04:57:19'),
(77, 10, 'Komolnagar', 0, NULL, NULL, '2022-04-27 04:57:33', '2022-04-27 04:57:33'),
(78, 10, 'Raipur', 0, NULL, NULL, '2022-04-27 04:57:44', '2022-04-27 04:57:44'),
(79, 10, 'Ramganj', 0, NULL, NULL, '2022-04-27 04:57:51', '2022-04-27 04:57:51'),
(80, 12, 'Feni Sadar', 0, NULL, NULL, '2022-04-27 04:59:12', '2022-04-27 05:43:03'),
(81, 12, 'Daganbhuiyan', 0, NULL, NULL, '2022-04-27 05:43:24', '2022-04-27 05:43:24'),
(82, 12, 'Chhagalnaiya', 0, NULL, NULL, '2022-04-27 05:43:32', '2022-04-27 05:43:32'),
(83, 12, 'Porshuram', 0, NULL, NULL, '2022-04-27 05:43:39', '2022-04-27 05:43:39'),
(84, 12, 'Fulgazi', 0, NULL, NULL, '2022-04-27 05:43:45', '2022-04-27 05:43:45'),
(85, 12, 'Sonagazi', 0, NULL, NULL, '2022-04-27 05:43:52', '2022-04-27 05:43:52'),
(86, 14, 'Khagrachhari Sadar', 0, NULL, NULL, '2022-04-27 05:45:08', '2022-04-27 05:45:08'),
(87, 14, 'Panchhari', 0, NULL, NULL, '2022-04-27 05:45:17', '2022-04-27 05:45:17'),
(88, 14, 'Dighinala', 0, NULL, NULL, '2022-04-27 05:45:26', '2022-04-27 05:45:26'),
(89, 14, 'Manikchhari', 0, NULL, NULL, '2022-04-27 05:45:34', '2022-04-27 05:45:34'),
(90, 14, 'Lakshmichhari', 0, NULL, NULL, '2022-04-27 05:45:42', '2022-04-27 05:45:42'),
(91, 14, 'Ramgarh', 0, NULL, NULL, '2022-04-27 05:45:53', '2022-04-27 05:45:53'),
(92, 14, 'Mahalchhari', 0, NULL, NULL, '2022-04-27 05:46:04', '2022-04-27 05:46:04'),
(93, 14, 'Matiranga', 0, NULL, NULL, '2022-04-27 05:46:13', '2022-04-27 05:46:13'),
(94, 15, 'Rangamati Sadar', 0, NULL, NULL, '2022-04-27 05:46:57', '2022-04-27 05:46:57'),
(95, 15, 'Kaptai', 0, NULL, NULL, '2022-04-27 05:47:06', '2022-04-27 05:47:06'),
(96, 15, 'Kaukhali', 0, NULL, NULL, '2022-04-27 05:47:14', '2022-04-27 05:47:14'),
(97, 15, 'Nannerchar', 0, NULL, NULL, '2022-04-27 05:47:23', '2022-04-27 05:47:23'),
(98, 15, 'Bagaichhari', 0, NULL, NULL, '2022-04-27 05:47:30', '2022-04-27 05:47:30'),
(99, 15, 'Juraichhari', 0, NULL, NULL, '2022-04-27 05:47:37', '2022-04-27 05:47:37'),
(100, 15, 'Rajasthali', 0, NULL, NULL, '2022-04-27 05:47:44', '2022-04-27 05:47:44'),
(101, 15, 'Belaichhari', 0, NULL, NULL, '2022-04-27 05:47:51', '2022-04-27 05:47:51'),
(102, 15, 'Barkal', 0, NULL, NULL, '2022-04-27 05:47:58', '2022-04-27 05:47:58'),
(103, 15, 'Langadu', 0, NULL, NULL, '2022-04-27 05:48:04', '2022-04-27 05:48:04'),
(104, 16, 'Bandarban Sadar', 0, NULL, NULL, '2022-04-27 05:48:35', '2022-04-27 05:48:35'),
(105, 16, 'Lama', 0, NULL, NULL, '2022-04-27 05:48:42', '2022-04-27 05:48:42'),
(106, 16, 'Thanchi', 0, NULL, NULL, '2022-04-27 05:48:50', '2022-04-27 05:48:50'),
(107, 16, 'Alikadam', 0, NULL, NULL, '2022-04-27 05:48:57', '2022-04-27 05:48:57'),
(108, 16, 'Ruma', 0, NULL, NULL, '2022-04-27 05:49:05', '2022-04-27 05:49:05'),
(109, 16, 'Naikhongchhari', 0, NULL, NULL, '2022-04-27 05:49:14', '2022-04-27 05:49:14'),
(110, 16, 'Rowangcchari', 0, NULL, NULL, '2022-04-27 05:49:20', '2022-04-27 05:49:20'),
(111, 17, 'Anwara', 0, NULL, NULL, '2022-04-27 05:50:17', '2022-04-27 05:50:17'),
(112, 17, 'Banshkhali', 0, NULL, NULL, '2022-04-27 05:50:29', '2022-04-27 05:50:29'),
(113, 17, 'Boalkhali', 0, NULL, NULL, '2022-04-27 05:50:36', '2022-04-27 05:50:36'),
(114, 17, 'Chandanaish', 0, NULL, NULL, '2022-04-27 05:50:43', '2022-04-27 05:50:43'),
(115, 17, 'Fatikchhari', 0, NULL, NULL, '2022-04-27 05:50:50', '2022-04-27 05:50:50'),
(116, 17, 'Hathazari', 0, NULL, NULL, '2022-04-27 05:50:56', '2022-04-27 05:50:56'),
(117, 17, 'Lohagara', 0, NULL, NULL, '2022-04-27 05:51:03', '2022-04-27 05:51:03'),
(118, 17, 'Mirsharai', 0, NULL, NULL, '2022-04-27 05:51:09', '2022-04-27 05:51:09'),
(119, 17, 'Patiya', 0, NULL, NULL, '2022-04-27 05:51:15', '2022-04-27 05:51:15'),
(120, 17, 'Rangunia', 0, NULL, NULL, '2022-04-27 05:51:21', '2022-04-27 05:51:21'),
(121, 17, 'Raozan', 0, NULL, NULL, '2022-04-27 05:51:28', '2022-04-27 05:51:28'),
(122, 17, 'Sandwip', 0, NULL, NULL, '2022-04-27 05:51:34', '2022-04-27 05:51:34'),
(123, 17, 'Satkania', 0, NULL, NULL, '2022-04-27 05:51:42', '2022-04-27 05:51:42'),
(124, 17, 'Sitakunda', 0, NULL, NULL, '2022-04-27 05:51:49', '2022-04-27 05:51:49'),
(125, 17, 'Karnaphuli', 0, NULL, NULL, '2022-04-27 05:51:55', '2022-04-27 05:51:55'),
(126, 18, 'Cox\'s Bazar Sadar', 0, NULL, NULL, '2022-04-27 05:52:47', '2022-04-27 05:52:47'),
(127, 18, 'Teknaf', 0, NULL, NULL, '2022-04-27 05:52:55', '2022-04-27 05:52:55'),
(128, 18, 'Chakaria', 0, NULL, NULL, '2022-04-27 05:53:03', '2022-04-27 05:53:03'),
(129, 18, 'Maheshkhali', 0, NULL, NULL, '2022-04-27 05:53:09', '2022-04-27 05:53:09'),
(130, 18, 'Pekua', 0, NULL, NULL, '2022-04-27 05:53:15', '2022-04-27 05:53:15'),
(131, 18, 'Kutubdia', 0, NULL, NULL, '2022-04-27 05:53:22', '2022-04-27 05:53:22'),
(132, 18, 'Ukhia', 0, NULL, NULL, '2022-04-27 05:53:28', '2022-04-27 05:53:28'),
(133, 18, 'Ramu', 0, NULL, NULL, '2022-04-27 05:53:34', '2022-04-27 05:53:34'),
(134, 20, 'Adabor', 0, NULL, NULL, '2022-04-27 05:54:45', '2022-04-27 05:54:45'),
(135, 20, 'Badda', 0, NULL, NULL, '2022-04-27 05:54:54', '2022-04-27 05:54:54'),
(136, 20, 'Banani', 0, NULL, NULL, '2022-04-27 05:55:01', '2022-04-27 05:55:01'),
(137, 20, 'Bangshal', 0, NULL, NULL, '2022-04-27 05:55:07', '2022-04-27 05:55:07'),
(138, 20, 'Bimanbandar', 0, NULL, NULL, '2022-04-27 05:55:15', '2022-04-27 05:55:15'),
(139, 20, 'Bsahantek', 0, NULL, NULL, '2022-04-27 05:55:22', '2022-04-27 05:55:22'),
(140, 20, 'Cantonment', 0, NULL, NULL, '2022-04-27 05:55:29', '2022-04-27 05:55:29'),
(141, 20, 'Chalkbazar', 0, NULL, NULL, '2022-04-27 05:55:36', '2022-04-27 05:55:36'),
(142, 20, 'Dakhin Khan', 0, NULL, NULL, '2022-04-27 05:55:44', '2022-04-27 05:55:44'),
(143, 20, 'Darus-Salam', 0, NULL, NULL, '2022-04-27 05:55:53', '2022-04-27 05:55:53'),
(144, 20, 'Demra', 0, NULL, NULL, '2022-04-27 05:56:00', '2022-04-27 05:56:00'),
(145, 20, 'Dhanmondi', 0, NULL, NULL, '2022-04-27 05:56:07', '2022-04-27 05:56:07'),
(146, 20, 'Gandaria', 0, NULL, NULL, '2022-04-27 05:56:14', '2022-04-27 05:56:14'),
(147, 20, 'Gulshan', 0, NULL, NULL, '2022-04-27 05:56:20', '2022-04-27 05:56:20'),
(148, 20, 'Hazaribag', 0, NULL, NULL, '2022-04-27 05:56:26', '2022-04-27 05:56:26'),
(149, 20, 'Jattrabari', 0, NULL, NULL, '2022-04-27 05:56:34', '2022-04-27 05:56:34'),
(150, 20, 'Kafrul', 0, NULL, NULL, '2022-04-27 05:56:40', '2022-04-27 05:56:40'),
(151, 20, 'Kalabagan', 0, NULL, NULL, '2022-04-27 05:56:46', '2022-04-27 05:56:46'),
(152, 20, 'Kamrangirchar', 0, NULL, NULL, '2022-04-27 05:56:52', '2022-04-27 05:56:52'),
(153, 20, 'Khilgaon', 0, NULL, NULL, '2022-04-27 05:56:58', '2022-04-27 05:56:58'),
(154, 20, 'Khilkhet', 0, NULL, NULL, '2022-04-27 05:57:05', '2022-04-27 05:57:05'),
(155, 20, 'Kodomtali', 0, NULL, NULL, '2022-04-27 05:57:14', '2022-04-27 05:57:14'),
(156, 20, 'Kotwali', 0, NULL, NULL, '2022-04-27 05:57:24', '2022-04-27 05:57:24'),
(157, 20, 'Lalbagh', 0, NULL, NULL, '2022-04-27 05:57:30', '2022-04-27 05:57:30'),
(158, 20, 'Mirpur Model', 0, NULL, NULL, '2022-04-27 05:57:37', '2022-04-27 05:57:37'),
(159, 20, 'Mohammadpur', 0, NULL, NULL, '2022-04-27 05:57:43', '2022-04-27 05:57:43'),
(160, 20, 'Motijheel', 0, NULL, NULL, '2022-04-27 05:57:50', '2022-04-27 05:57:50'),
(161, 20, 'Mugda', 0, NULL, NULL, '2022-04-27 05:57:57', '2022-04-27 05:57:57'),
(162, 20, 'New Market', 0, NULL, NULL, '2022-04-27 05:58:04', '2022-04-27 05:58:04'),
(163, 20, 'Pallabi', 0, NULL, NULL, '2022-04-27 05:58:09', '2022-04-27 05:58:09'),
(164, 20, 'Paltan', 0, NULL, NULL, '2022-04-27 05:58:15', '2022-04-27 05:58:15'),
(165, 20, 'Ramna Model', 0, NULL, NULL, '2022-04-27 05:58:27', '2022-04-27 05:58:27'),
(166, 20, 'Rampura', 0, NULL, NULL, '2022-04-27 05:58:32', '2022-04-27 05:58:32'),
(167, 20, 'Rupnagar', 0, NULL, NULL, '2022-04-27 05:58:39', '2022-04-27 05:58:39'),
(168, 20, 'Sabujbag', 0, NULL, NULL, '2022-04-27 05:58:45', '2022-04-27 05:58:45'),
(169, 20, 'Shah Ali', 0, NULL, NULL, '2022-04-27 05:58:52', '2022-04-27 05:58:52'),
(170, 20, 'Shahbag', 0, NULL, NULL, '2022-04-27 05:58:58', '2022-04-27 05:58:58'),
(171, 20, 'Shahjahanpur', 0, NULL, NULL, '2022-04-27 05:59:03', '2022-04-27 05:59:03'),
(172, 20, 'Sutrapur', 0, NULL, NULL, '2022-04-27 05:59:10', '2022-04-27 05:59:10'),
(173, 20, 'Shyampur', 0, NULL, NULL, '2022-04-27 05:59:16', '2022-04-27 05:59:16'),
(174, 20, 'Sher-e-Bangla Nagar', 0, NULL, NULL, '2022-04-27 05:59:24', '2022-04-27 05:59:24'),
(175, 20, 'Tejgaon Industrial Police', 0, NULL, NULL, '2022-04-27 05:59:32', '2022-04-27 05:59:32'),
(176, 20, 'Tejgaon', 0, NULL, NULL, '2022-04-27 05:59:41', '2022-04-27 05:59:41'),
(177, 20, 'Turag', 0, NULL, NULL, '2022-04-27 05:59:47', '2022-04-27 05:59:47'),
(178, 20, 'Uttara East', 0, NULL, NULL, '2022-04-27 05:59:53', '2022-04-27 05:59:53'),
(179, 20, 'Uttara West', 0, NULL, NULL, '2022-04-27 06:00:02', '2022-04-27 06:00:02'),
(180, 20, 'Uttar Khan', 0, NULL, NULL, '2022-04-27 06:00:10', '2022-04-27 06:00:10'),
(181, 20, 'Vatara', 0, NULL, NULL, '2022-04-27 06:00:17', '2022-04-27 06:00:17'),
(182, 20, 'Wari', 0, NULL, NULL, '2022-04-27 06:00:24', '2022-04-27 06:00:24'),
(183, 21, 'Gazipur Sadar', 0, NULL, NULL, '2022-04-27 06:01:01', '2022-04-27 06:01:01'),
(184, 21, 'Kapasia', 0, NULL, NULL, '2022-04-27 06:01:08', '2022-04-27 06:01:08'),
(185, 21, 'Tongi', 0, NULL, NULL, '2022-04-27 06:01:31', '2022-04-27 06:01:31'),
(186, 21, 'Sripur', 0, NULL, NULL, '2022-04-27 06:01:37', '2022-04-27 06:01:37'),
(187, 21, 'Kaliganj', 0, NULL, NULL, '2022-04-27 06:01:44', '2022-04-27 06:01:44'),
(188, 21, 'Kaliakior', 0, NULL, NULL, '2022-04-27 06:01:52', '2022-04-27 06:01:52'),
(189, 22, 'Kishoreganj Sadar', 0, NULL, NULL, '2022-04-27 06:02:33', '2022-04-27 06:02:33'),
(190, 22, 'Bhairab', 0, NULL, NULL, '2022-04-27 06:02:43', '2022-04-27 06:02:43'),
(191, 22, 'Bajitpur', 0, NULL, NULL, '2022-04-27 06:02:51', '2022-04-27 06:02:51'),
(192, 22, 'Kuliarchar', 0, NULL, NULL, '2022-04-27 06:02:58', '2022-04-27 06:02:58'),
(193, 22, 'Pakundia', 0, NULL, NULL, '2022-04-27 06:03:07', '2022-04-27 06:03:07'),
(194, 22, 'Itna', 0, NULL, NULL, '2022-04-27 06:03:16', '2022-04-27 06:03:16'),
(195, 22, 'Karimganj', 0, NULL, NULL, '2022-04-27 06:03:24', '2022-04-27 06:03:24'),
(196, 22, 'Katiadi', 0, NULL, NULL, '2022-04-27 06:03:32', '2022-04-27 06:03:32'),
(197, 22, 'Austagram', 0, NULL, NULL, '2022-04-27 06:03:40', '2022-04-27 06:03:40'),
(198, 22, 'Mithamain', 0, NULL, NULL, '2022-04-27 06:03:48', '2022-04-27 06:03:48'),
(199, 22, 'Tarail', 0, NULL, NULL, '2022-04-27 06:03:56', '2022-04-27 06:03:56'),
(200, 22, 'Hossainpur', 0, NULL, NULL, '2022-04-27 06:04:04', '2022-04-27 06:04:04'),
(201, 22, 'Nikli', 0, NULL, NULL, '2022-04-27 06:04:14', '2022-04-27 06:04:14'),
(202, 23, 'Manikganj Sadar', 0, NULL, NULL, '2022-04-27 06:04:51', '2022-04-27 06:04:51'),
(203, 23, 'Singair', 0, NULL, NULL, '2022-04-27 06:05:02', '2022-04-27 06:05:02'),
(204, 23, 'Daulatpur', 0, NULL, NULL, '2022-04-27 06:05:14', '2022-04-27 06:05:14'),
(205, 23, 'Saturia', 0, NULL, NULL, '2022-04-27 06:05:22', '2022-04-27 06:05:22'),
(206, 23, 'Ghior', 0, NULL, NULL, '2022-04-27 06:05:31', '2022-04-27 06:05:31'),
(207, 23, 'Shivalaya', 0, NULL, NULL, '2022-04-27 06:05:38', '2022-04-27 06:05:38'),
(208, 23, 'Harirampur', 0, NULL, NULL, '2022-04-27 06:05:46', '2022-04-27 06:05:46'),
(209, 24, 'Munshiganj Sadar', 0, NULL, NULL, '2022-04-27 06:06:32', '2022-04-27 06:06:32'),
(210, 24, 'Sreenagar', 0, NULL, NULL, '2022-04-27 06:06:41', '2022-04-27 06:06:41'),
(211, 24, 'Lohajang', 0, NULL, NULL, '2022-04-27 06:06:50', '2022-04-27 06:06:50'),
(212, 24, 'Sirajdikhan', 0, NULL, NULL, '2022-04-27 06:06:58', '2022-04-27 06:06:58'),
(213, 24, 'Gazaria', 0, NULL, NULL, '2022-04-27 06:07:06', '2022-04-27 06:07:06'),
(214, 24, 'Tongibari', 0, NULL, NULL, '2022-04-27 06:07:15', '2022-04-27 06:07:15'),
(215, 25, 'Narayanganj Sadar', 0, NULL, NULL, '2022-04-27 06:07:48', '2022-04-27 06:07:48'),
(216, 25, 'Araihazar', 0, NULL, NULL, '2022-04-27 06:07:58', '2022-04-27 06:07:58'),
(217, 25, 'Rupganj', 0, NULL, NULL, '2022-04-27 06:08:09', '2022-04-27 06:08:09'),
(218, 25, 'Bandar', 0, NULL, NULL, '2022-04-27 06:08:18', '2022-04-27 06:08:18'),
(219, 25, 'Sonargaon', 0, NULL, NULL, '2022-04-27 06:08:27', '2022-04-27 06:08:27'),
(220, 25, 'Siddhirganj', 0, NULL, NULL, '2022-04-27 06:08:35', '2022-04-27 06:08:35'),
(221, 25, 'Fatullah', 0, NULL, NULL, '2022-04-27 06:08:43', '2022-04-27 06:08:43'),
(222, 26, 'Narsingdi Sadar', 0, NULL, NULL, '2022-04-27 06:09:14', '2022-04-27 06:09:14'),
(223, 26, 'Monohardi', 0, NULL, NULL, '2022-04-27 06:09:23', '2022-04-27 06:09:23'),
(224, 26, 'Belabo', 0, NULL, NULL, '2022-04-27 06:09:37', '2022-04-27 06:09:37'),
(225, 26, 'Raipura', 0, NULL, NULL, '2022-04-27 06:09:46', '2022-04-27 06:09:46'),
(226, 26, 'Shibpur', 0, NULL, NULL, '2022-04-27 06:09:55', '2022-04-27 06:09:55'),
(227, 26, 'Palash', 0, NULL, NULL, '2022-04-27 06:10:03', '2022-04-27 06:10:03'),
(228, 27, 'Tangail Sadar', 0, NULL, NULL, '2022-04-27 06:10:29', '2022-04-27 06:10:29'),
(229, 27, 'Basail', 0, NULL, NULL, '2022-04-27 06:10:35', '2022-04-27 06:10:35'),
(230, 27, 'Bhuapur', 0, NULL, NULL, '2022-04-27 06:10:41', '2022-04-27 06:10:41'),
(231, 27, 'Delduar', 0, NULL, NULL, '2022-04-27 06:10:48', '2022-04-27 06:10:48'),
(232, 27, 'Dhonbari', 0, NULL, NULL, '2022-04-27 06:10:54', '2022-04-27 06:10:54'),
(233, 27, 'Ghatail', 0, NULL, NULL, '2022-04-27 06:11:01', '2022-04-27 06:11:01'),
(234, 27, 'Gopalpur', 0, NULL, NULL, '2022-04-27 06:11:08', '2022-04-27 06:11:08'),
(235, 27, 'Kalihati', 0, NULL, NULL, '2022-04-27 06:11:16', '2022-04-27 06:11:16'),
(236, 27, 'Madhupur', 0, NULL, NULL, '2022-04-27 06:11:22', '2022-04-27 06:11:22'),
(237, 27, 'Mirzapur', 0, NULL, NULL, '2022-04-27 06:11:28', '2022-04-27 06:11:28'),
(238, 27, 'Nagarpur', 0, NULL, NULL, '2022-04-27 06:11:36', '2022-04-27 06:11:36'),
(239, 27, 'Sakhipur', 0, NULL, NULL, '2022-04-27 06:11:41', '2022-04-27 06:11:41'),
(240, 28, 'Faridpur Sadar', 0, NULL, NULL, '2022-04-27 06:12:18', '2022-04-27 06:12:18'),
(241, 28, 'Bhanga', 0, NULL, NULL, '2022-04-27 06:12:25', '2022-04-27 06:12:25'),
(242, 28, 'Madhukhali', 0, NULL, NULL, '2022-04-27 06:12:32', '2022-04-27 06:12:32'),
(243, 28, 'Sadarpur', 0, NULL, NULL, '2022-04-27 06:12:54', '2022-04-27 06:12:54'),
(244, 28, 'Alfadanga', 0, NULL, NULL, '2022-04-27 06:13:06', '2022-04-27 06:13:06'),
(245, 28, 'Boalmari', 0, NULL, NULL, '2022-04-27 06:13:13', '2022-04-27 06:13:13'),
(246, 28, 'Charbhadrasan', 0, NULL, NULL, '2022-04-27 06:13:19', '2022-04-27 06:13:19'),
(247, 28, 'Nagarkanda', 0, NULL, NULL, '2022-04-27 06:13:26', '2022-04-27 06:13:26'),
(248, 28, 'Shaltha', 0, NULL, NULL, '2022-04-27 06:13:32', '2022-04-27 06:13:32'),
(249, 29, 'Gopalganj Sadar', 0, NULL, NULL, '2022-04-27 06:14:26', '2022-04-27 06:14:26'),
(250, 29, 'Tungipara', 0, NULL, NULL, '2022-04-27 06:14:41', '2022-04-27 06:14:41'),
(251, 29, 'Kotalipara', 0, NULL, NULL, '2022-04-27 06:14:52', '2022-04-27 06:14:52'),
(252, 29, 'Kashiani', 0, NULL, NULL, '2022-04-27 06:15:11', '2022-04-27 06:15:11'),
(253, 29, 'Muksudpur', 0, NULL, NULL, '2022-04-27 06:15:21', '2022-04-27 06:15:21'),
(254, 30, 'Madaripur Sadar', 0, NULL, NULL, '2022-04-27 06:16:57', '2022-04-27 06:16:57'),
(255, 30, 'Shibchar', 0, NULL, NULL, '2022-04-27 06:17:07', '2022-04-27 06:17:07'),
(256, 30, 'Kalkini', 0, NULL, NULL, '2022-04-27 06:17:17', '2022-04-27 06:17:17'),
(257, 30, 'Rajoir', 0, NULL, NULL, '2022-04-27 06:17:25', '2022-04-27 06:17:25'),
(258, 31, 'Rajbari Sadar', 0, NULL, NULL, '2022-04-27 06:18:58', '2022-04-27 06:18:58'),
(259, 31, 'Baliakandi', 0, NULL, NULL, '2022-04-27 06:19:10', '2022-04-27 06:19:10'),
(260, 31, 'Kalukhali', 0, NULL, NULL, '2022-04-27 06:19:22', '2022-04-27 06:19:22'),
(261, 31, 'Goalandaghat', 0, NULL, NULL, '2022-04-27 06:19:34', '2022-04-27 06:19:34'),
(262, 31, 'Pangsha', 0, NULL, NULL, '2022-04-27 06:19:42', '2022-04-27 06:19:42'),
(263, 32, 'Shariatpur Sadar', 0, NULL, NULL, '2022-04-27 06:20:21', '2022-04-27 06:20:21'),
(264, 32, 'Bhedarganj', 0, NULL, NULL, '2022-04-27 06:20:29', '2022-04-27 06:20:29'),
(265, 32, 'Damudya', 0, NULL, NULL, '2022-04-27 06:20:38', '2022-04-27 06:20:38'),
(266, 32, 'Gosairhat', 0, NULL, NULL, '2022-04-27 06:20:45', '2022-04-27 06:20:45'),
(267, 32, 'Naria', 0, NULL, NULL, '2022-04-27 06:20:56', '2022-04-27 06:20:56'),
(268, 32, 'Shakhipur', 0, NULL, NULL, '2022-04-27 06:21:05', '2022-04-27 06:21:05'),
(269, 32, 'Zanjira', 0, NULL, NULL, '2022-04-27 06:21:15', '2022-04-27 06:21:15'),
(270, 33, 'Bagerhat Sadar', 0, NULL, NULL, '2022-04-27 06:21:52', '2022-04-27 06:21:52'),
(271, 33, 'Mongla', 0, NULL, NULL, '2022-04-27 06:22:01', '2022-04-27 06:22:01'),
(272, 33, 'Chitalmari', 0, NULL, NULL, '2022-04-27 06:22:09', '2022-04-27 06:22:09'),
(273, 33, 'Mollahat', 0, NULL, NULL, '2022-04-27 06:22:19', '2022-04-27 06:26:22'),
(274, 33, 'Sarankhola', 0, NULL, NULL, '2022-04-27 06:22:26', '2022-04-27 06:26:40'),
(275, 33, 'Rampal', 0, NULL, NULL, '2022-04-27 06:22:38', '2022-04-27 06:26:58'),
(276, 33, 'Fakirhat', 0, NULL, NULL, '2022-04-27 06:22:47', '2022-04-27 06:27:04'),
(277, 33, 'Morrelganj', 0, NULL, NULL, '2022-04-27 06:22:55', '2022-04-27 06:27:12'),
(278, 33, 'Kachua', 0, NULL, NULL, '2022-04-27 06:23:03', '2022-04-27 06:27:18'),
(279, 34, 'Chuadanga Sadar', 0, NULL, NULL, '2022-04-27 06:28:39', '2022-04-27 06:28:39'),
(280, 34, 'Alamdanga', 0, NULL, NULL, '2022-04-27 06:28:47', '2022-04-27 06:28:47'),
(281, 34, 'Damurhuda', 0, NULL, NULL, '2022-04-27 06:28:56', '2022-04-27 06:28:56'),
(282, 34, 'Jibonnagar', 0, NULL, NULL, '2022-04-27 06:29:04', '2022-04-27 06:29:04'),
(283, 35, 'Jessore Sadar', 0, NULL, NULL, '2022-04-27 06:29:42', '2022-04-27 06:29:42'),
(284, 35, 'Jhikargachha', 0, NULL, NULL, '2022-04-27 06:29:51', '2022-04-27 06:29:51'),
(285, 35, 'Manirampur', 0, NULL, NULL, '2022-04-27 06:29:58', '2022-04-27 06:29:58'),
(286, 35, 'Bagherpara', 0, NULL, NULL, '2022-04-27 06:30:08', '2022-04-27 06:30:08'),
(287, 35, 'Abhaynagar', 0, NULL, NULL, '2022-04-27 06:30:15', '2022-04-27 06:30:15'),
(288, 35, 'Keshabpur', 0, NULL, NULL, '2022-04-27 06:30:23', '2022-04-27 06:30:23'),
(289, 35, 'Sharsha', 0, NULL, NULL, '2022-04-27 06:30:30', '2022-04-27 06:30:30'),
(290, 35, 'Chaugachha', 0, NULL, NULL, '2022-04-27 06:30:38', '2022-04-27 06:30:38'),
(291, 36, 'Jhenaidah Sadar', 0, NULL, NULL, '2022-04-27 06:31:37', '2022-04-27 06:31:37'),
(292, 36, 'Shailkupa', 0, NULL, NULL, '2022-04-27 06:31:45', '2022-04-27 06:31:45'),
(293, 36, 'Harinakunda', 0, NULL, NULL, '2022-04-27 06:31:52', '2022-04-27 06:31:52'),
(294, 36, 'Maheshpur', 0, NULL, NULL, '2022-04-27 06:32:01', '2022-04-27 06:32:01'),
(295, 36, 'Kotchandpur', 0, NULL, NULL, '2022-04-27 06:32:09', '2022-04-27 06:32:09'),
(296, 36, 'Kaliganj', 0, NULL, NULL, '2022-04-27 06:32:18', '2022-04-27 06:32:18'),
(297, 37, 'Dumuria', 0, NULL, NULL, '2022-04-27 06:33:05', '2022-04-27 06:33:05'),
(298, 37, 'Batiaghata', 0, NULL, NULL, '2022-04-27 06:33:12', '2022-04-27 06:33:12'),
(299, 37, 'Dacope', 0, NULL, NULL, '2022-04-27 06:33:20', '2022-04-27 06:33:20'),
(300, 37, 'Phultala', 0, NULL, NULL, '2022-04-27 06:33:28', '2022-04-27 06:33:28'),
(301, 37, 'Dighalia', 0, NULL, NULL, '2022-04-27 06:33:38', '2022-04-27 06:33:38'),
(302, 37, 'Koyra', 0, NULL, NULL, '2022-04-27 06:33:46', '2022-04-27 06:33:46'),
(303, 37, 'Terokhada', 0, NULL, NULL, '2022-04-27 06:33:54', '2022-04-27 06:33:54'),
(304, 37, 'Rupsha', 0, NULL, NULL, '2022-04-27 06:34:02', '2022-04-27 06:34:02'),
(305, 37, 'Paikgachha', 0, NULL, NULL, '2022-04-27 06:34:10', '2022-04-27 06:34:10'),
(306, 38, 'Kushtia Sadar', 0, NULL, NULL, '2022-04-27 06:34:54', '2022-04-27 06:34:54'),
(307, 38, 'Mirpur', 0, NULL, NULL, '2022-04-27 06:35:03', '2022-04-27 06:35:03'),
(308, 38, 'Khoksa', 0, NULL, NULL, '2022-04-27 06:35:11', '2022-04-27 06:35:11'),
(309, 38, 'Bheramara', 0, NULL, NULL, '2022-04-27 06:35:19', '2022-04-27 06:35:19'),
(310, 38, 'Kumarkhali', 0, NULL, NULL, '2022-04-27 06:35:26', '2022-04-27 06:35:26'),
(311, 38, 'Daulatpur', 0, NULL, NULL, '2022-04-27 06:35:34', '2022-04-27 06:35:34'),
(312, 39, 'Magura Sadar', 0, NULL, NULL, '2022-04-27 06:36:12', '2022-04-27 06:36:12'),
(313, 39, 'Shalikha', 0, NULL, NULL, '2022-04-27 06:36:21', '2022-04-27 06:36:21'),
(314, 39, 'Sreepur', 0, NULL, NULL, '2022-04-27 06:36:29', '2022-04-27 06:36:29'),
(315, 39, 'Mohammadpur', 0, NULL, NULL, '2022-04-27 06:36:37', '2022-04-27 06:36:37'),
(316, 40, 'Meherpur Sadar', 0, NULL, NULL, '2022-04-27 06:37:16', '2022-04-27 06:37:16'),
(317, 40, 'Mujibnagar', 0, NULL, NULL, '2022-04-27 06:37:23', '2022-04-27 06:37:23'),
(318, 40, 'Gangni', 0, NULL, NULL, '2022-04-27 06:37:31', '2022-04-27 06:37:31'),
(319, 41, 'Narail Sadar', 0, NULL, NULL, '2022-04-27 06:38:22', '2022-04-27 06:38:22'),
(320, 41, 'Lohagara', 0, NULL, NULL, '2022-04-27 06:38:32', '2022-04-27 06:38:32'),
(321, 41, 'Kalia', 0, NULL, NULL, '2022-04-27 06:38:41', '2022-04-27 06:38:41'),
(322, 42, 'Satkhira Sadar', 0, NULL, NULL, '2022-04-27 06:39:19', '2022-04-27 06:39:19'),
(323, 42, 'Shyamnagar', 0, NULL, NULL, '2022-04-27 06:39:28', '2022-04-27 06:39:28'),
(324, 42, 'Assasuni', 0, NULL, NULL, '2022-04-27 06:39:40', '2022-04-27 06:39:40'),
(325, 42, 'Kaliganj', 0, NULL, NULL, '2022-04-27 06:39:49', '2022-04-27 06:39:49'),
(326, 42, 'Debhata', 0, NULL, NULL, '2022-04-27 06:39:57', '2022-04-27 06:39:57'),
(327, 42, 'Kalaroa', 0, NULL, NULL, '2022-04-27 06:40:04', '2022-04-27 06:40:04'),
(328, 42, 'Tala', 0, NULL, NULL, '2022-04-27 06:40:10', '2022-04-27 06:40:10'),
(329, 43, 'Mymensingh Sadar', 0, NULL, NULL, '2022-04-27 06:40:53', '2022-04-27 06:40:53'),
(330, 43, 'Muktagachha', 0, NULL, NULL, '2022-04-27 06:41:01', '2022-04-27 06:41:01'),
(331, 43, 'Valuka', 0, NULL, NULL, '2022-04-27 06:41:08', '2022-04-27 06:41:08'),
(332, 43, 'Haluaghat', 0, NULL, NULL, '2022-04-27 06:41:15', '2022-04-27 06:41:15'),
(333, 43, 'Gouripur', 0, NULL, NULL, '2022-04-27 06:41:23', '2022-04-27 06:41:23'),
(334, 43, 'Dhobaura', 0, NULL, NULL, '2022-04-27 06:41:30', '2022-04-27 06:41:30'),
(335, 43, 'Fulbaria', 0, NULL, NULL, '2022-04-27 06:41:38', '2022-04-27 06:41:38'),
(336, 43, 'Gafargaon', 0, NULL, NULL, '2022-04-27 06:41:45', '2022-04-27 06:41:45'),
(337, 43, 'Trishal', 0, NULL, NULL, '2022-04-27 06:41:53', '2022-04-27 06:41:53'),
(338, 43, 'Fulpur', 0, NULL, NULL, '2022-04-27 06:42:00', '2022-04-27 06:42:00'),
(339, 43, 'Nandail', 0, NULL, NULL, '2022-04-27 06:42:07', '2022-04-27 06:42:07'),
(340, 43, 'Ishwarganj', 0, NULL, NULL, '2022-04-27 06:42:15', '2022-04-27 06:42:15'),
(341, 44, 'Netrokona Sadar', 0, NULL, NULL, '2022-04-27 06:42:49', '2022-04-27 06:42:49'),
(342, 44, 'Kendua', 0, NULL, NULL, '2022-04-27 06:43:00', '2022-04-27 06:43:00'),
(343, 44, 'Mohangonj', 0, NULL, NULL, '2022-04-27 06:43:11', '2022-04-27 06:43:11'),
(344, 44, 'Khaliajuri', 0, NULL, NULL, '2022-04-27 06:43:23', '2022-04-27 06:43:23'),
(345, 44, 'Purbodhola', 0, NULL, NULL, '2022-04-27 06:43:32', '2022-04-27 06:43:32'),
(346, 44, 'Atpara', 0, NULL, NULL, '2022-04-27 06:43:40', '2022-04-27 06:43:40'),
(347, 44, 'Modon', 0, NULL, NULL, '2022-04-27 06:43:47', '2022-04-27 06:43:47'),
(348, 44, 'Kolmkakanda', 0, NULL, NULL, '2022-04-27 06:43:55', '2022-04-27 06:43:55'),
(349, 44, 'Barhatta', 0, NULL, NULL, '2022-04-27 06:44:03', '2022-04-27 06:44:03'),
(350, 44, 'Durgapur', 0, NULL, NULL, '2022-04-27 06:44:10', '2022-04-27 06:44:10'),
(351, 45, 'Jamalpur Sadar', 0, NULL, NULL, '2022-04-27 06:44:42', '2022-04-27 06:44:42'),
(352, 45, 'Baksiganj', 0, NULL, NULL, '2022-04-27 06:44:49', '2022-04-27 06:44:49'),
(353, 45, 'Dewanganj', 0, NULL, NULL, '2022-04-27 06:44:58', '2022-04-27 06:44:58'),
(354, 45, 'Islampur', 0, NULL, NULL, '2022-04-27 06:45:05', '2022-04-27 06:45:05'),
(355, 45, 'Madarganj', 0, NULL, NULL, '2022-04-27 06:45:14', '2022-04-27 06:45:14'),
(356, 45, 'Melandaha', 0, NULL, NULL, '2022-04-27 06:45:22', '2022-04-27 06:45:22'),
(357, 45, 'Sarishabari', 0, NULL, NULL, '2022-04-27 06:45:33', '2022-04-27 06:45:33'),
(358, 46, 'Sherpur Sadar', 0, NULL, NULL, '2022-04-27 06:46:05', '2022-04-27 06:46:05'),
(359, 46, 'Nakla', 0, NULL, NULL, '2022-04-27 06:46:15', '2022-04-27 06:46:15'),
(360, 46, 'Sreebardi', 0, NULL, NULL, '2022-04-27 06:46:24', '2022-04-27 06:46:24'),
(361, 46, 'Nalitabari', 0, NULL, NULL, '2022-04-27 06:46:34', '2022-04-27 06:46:34'),
(362, 46, 'Jhenaigati', 0, NULL, NULL, '2022-04-27 06:46:41', '2022-04-27 06:46:41'),
(363, 47, 'Joypurhat Sadar', 0, NULL, NULL, '2022-04-27 06:47:13', '2022-04-27 06:47:13'),
(364, 47, 'Akkelpur', 0, NULL, NULL, '2022-04-27 06:47:20', '2022-04-27 06:47:20'),
(365, 47, 'Khetlal', 0, NULL, NULL, '2022-04-27 06:47:28', '2022-04-27 06:47:28'),
(366, 47, 'Panchbibi', 0, NULL, NULL, '2022-04-27 06:47:38', '2022-04-27 06:47:38'),
(367, 47, 'Kalai', 0, NULL, NULL, '2022-04-27 06:47:47', '2022-04-27 06:47:47'),
(368, 48, 'Naogaon Sadar', 0, NULL, NULL, '2022-04-27 06:48:20', '2022-04-27 06:48:20'),
(369, 48, 'Atrai', 0, NULL, NULL, '2022-04-27 06:48:36', '2022-04-27 06:48:36'),
(370, 48, 'Dhamoirhat', 0, NULL, NULL, '2022-04-27 06:48:55', '2022-04-27 06:48:55'),
(371, 48, 'Badalgachhi', 0, NULL, NULL, '2022-04-27 06:49:07', '2022-04-27 06:49:07'),
(372, 48, 'Niamatpur', 0, NULL, NULL, '2022-04-27 06:49:16', '2022-04-27 06:49:16'),
(373, 48, 'Manda', 0, NULL, NULL, '2022-04-27 06:49:23', '2022-04-27 06:49:23'),
(374, 48, 'Mohadevpur', 0, NULL, NULL, '2022-04-27 06:49:31', '2022-04-27 06:49:31'),
(375, 48, 'Patnitala', 0, NULL, NULL, '2022-04-27 06:49:38', '2022-04-27 06:49:38'),
(376, 48, 'Porsha', 0, NULL, NULL, '2022-04-27 06:49:45', '2022-04-27 06:49:45'),
(377, 48, 'Sapahar', 0, NULL, NULL, '2022-04-27 06:49:53', '2022-04-27 06:49:53'),
(378, 48, 'Raninagar', 0, NULL, NULL, '2022-04-27 06:50:00', '2022-04-27 06:50:00'),
(379, 49, 'Gomastapur', 0, NULL, NULL, '2022-04-27 06:51:28', '2022-04-27 06:51:28'),
(380, 49, 'Nawabganj Sadar', 0, NULL, NULL, '2022-04-27 06:51:36', '2022-04-27 06:51:36'),
(381, 49, 'Nachole', 0, NULL, NULL, '2022-04-27 06:51:44', '2022-04-27 06:51:44'),
(382, 49, 'Bholahat', 0, NULL, NULL, '2022-04-27 06:51:54', '2022-04-27 06:51:54'),
(383, 49, 'Shibganj', 0, NULL, NULL, '2022-04-27 06:52:04', '2022-04-27 06:52:04'),
(384, 50, 'Natore Sadar', 0, NULL, NULL, '2022-04-27 06:52:59', '2022-04-27 06:52:59'),
(385, 50, 'Bagatipara', 0, NULL, NULL, '2022-04-27 06:53:06', '2022-04-27 06:53:06'),
(386, 50, 'Singra', 0, NULL, NULL, '2022-04-27 06:53:14', '2022-04-27 06:53:14'),
(387, 50, 'Boraigram', 0, NULL, NULL, '2022-04-27 06:53:22', '2022-04-27 06:53:22'),
(388, 50, 'Gurudaspur', 0, NULL, NULL, '2022-04-27 06:53:30', '2022-04-27 06:53:30'),
(389, 50, 'Lalpur', 0, NULL, NULL, '2022-04-27 06:53:41', '2022-04-27 06:53:41'),
(390, 51, 'Atgharia', 0, NULL, NULL, '2022-04-27 06:54:25', '2022-04-27 06:54:25'),
(391, 51, 'Ishwardi', 0, NULL, NULL, '2022-04-27 06:54:33', '2022-04-27 06:54:33'),
(392, 51, 'Chatmohar', 0, NULL, NULL, '2022-04-27 06:54:41', '2022-04-27 06:54:41'),
(393, 51, 'Pabna Sadar', 0, NULL, NULL, '2022-04-27 06:54:48', '2022-04-27 06:54:48'),
(394, 51, 'Faridpur', 0, NULL, NULL, '2022-04-27 06:54:56', '2022-04-27 06:54:56'),
(395, 51, 'Bera', 0, NULL, NULL, '2022-04-27 06:55:06', '2022-04-27 06:55:06'),
(396, 51, 'Bhangura', 0, NULL, NULL, '2022-04-27 06:55:16', '2022-04-27 06:55:16'),
(397, 51, 'Santhia', 0, NULL, NULL, '2022-04-27 06:55:24', '2022-04-27 06:55:24'),
(398, 51, 'Sujanagar', 0, NULL, NULL, '2022-04-27 06:55:31', '2022-04-27 06:55:31'),
(399, 52, 'Bogura Sadar', 0, NULL, NULL, '2022-04-27 06:56:11', '2022-04-27 06:56:11'),
(400, 52, 'Sherpur', 0, NULL, NULL, '2022-04-27 06:56:19', '2022-04-27 06:56:19'),
(401, 52, 'Dhunat', 0, NULL, NULL, '2022-04-27 06:56:27', '2022-04-27 06:56:27'),
(402, 52, 'Nandigram', 0, NULL, NULL, '2022-04-27 06:56:38', '2022-04-27 06:56:38'),
(403, 52, 'Kahaloo', 0, NULL, NULL, '2022-04-27 06:56:47', '2022-04-27 06:56:47'),
(404, 52, 'Adamdighi', 0, NULL, NULL, '2022-04-27 06:56:55', '2022-04-27 06:56:55'),
(405, 52, 'Dupchanchia', 0, NULL, NULL, '2022-04-27 06:57:03', '2022-04-27 06:57:03'),
(406, 52, 'Sariakandi', 0, NULL, NULL, '2022-04-27 06:57:10', '2022-04-27 06:57:10'),
(407, 52, 'Gabtali', 0, NULL, NULL, '2022-04-27 06:57:22', '2022-04-27 06:57:22'),
(408, 52, 'Shibganj', 0, NULL, NULL, '2022-04-27 06:57:30', '2022-04-27 06:57:30'),
(409, 52, 'Sonatala', 0, NULL, NULL, '2022-04-27 06:57:37', '2022-04-27 06:57:37'),
(410, 52, 'Shajahanpur', 0, NULL, NULL, '2022-04-27 06:57:45', '2022-04-27 06:57:45'),
(411, 53, 'Bagmara', 0, NULL, NULL, '2022-04-27 06:58:28', '2022-04-27 06:58:28'),
(412, 53, 'Paba', 0, NULL, NULL, '2022-04-27 06:58:41', '2022-04-27 06:58:41'),
(413, 53, 'Charghat', 0, NULL, NULL, '2022-04-27 06:58:50', '2022-04-27 06:58:50'),
(414, 53, 'Durgapur', 0, NULL, NULL, '2022-04-27 06:58:58', '2022-04-27 06:58:58'),
(415, 53, 'Godagari', 0, NULL, NULL, '2022-04-27 06:59:05', '2022-04-27 06:59:05'),
(416, 53, 'Mohanpur', 0, NULL, NULL, '2022-04-27 06:59:15', '2022-04-27 06:59:15'),
(417, 53, 'Bagha', 0, NULL, NULL, '2022-04-27 06:59:24', '2022-04-27 06:59:24'),
(418, 53, 'Puthia', 0, NULL, NULL, '2022-04-27 06:59:34', '2022-04-27 06:59:34'),
(419, 53, 'Tanore', 0, NULL, NULL, '2022-04-27 06:59:42', '2022-04-27 06:59:42'),
(420, 54, 'Sirajganj Sadar', 0, NULL, NULL, '2022-04-27 07:00:38', '2022-04-27 07:00:38'),
(421, 54, 'Chauhali', 0, NULL, NULL, '2022-04-27 07:00:49', '2022-04-27 07:00:49'),
(422, 54, 'Kamarkhanda', 0, NULL, NULL, '2022-04-27 07:01:07', '2022-04-27 07:01:07'),
(423, 54, 'Belkuchi', 0, NULL, NULL, '2022-04-27 07:01:17', '2022-04-27 07:01:17'),
(424, 54, 'Kazipur', 0, NULL, NULL, '2022-04-27 07:01:28', '2022-04-27 07:01:28'),
(425, 54, 'Raiganj', 0, NULL, NULL, '2022-04-27 07:01:37', '2022-04-27 07:01:37'),
(426, 54, 'Ullahpara', 0, NULL, NULL, '2022-04-27 07:01:53', '2022-04-27 07:01:53'),
(427, 54, 'Tarash', 0, NULL, NULL, '2022-04-27 07:02:01', '2022-04-27 07:02:01'),
(428, 54, 'Shahjadpur', 0, NULL, NULL, '2022-04-27 07:02:09', '2022-04-27 07:02:09'),
(429, 55, 'Dinajpur Sadar', 0, NULL, NULL, '2022-04-27 07:02:43', '2022-04-27 07:02:43'),
(430, 55, 'Birampur', 0, NULL, NULL, '2022-04-27 07:02:51', '2022-04-27 07:02:51'),
(431, 55, 'Biral', 0, NULL, NULL, '2022-04-27 07:02:58', '2022-04-27 07:02:58'),
(432, 55, 'Phulbari', 0, NULL, NULL, '2022-04-27 07:03:07', '2022-04-27 07:03:07'),
(433, 55, 'Hakimpur', 0, NULL, NULL, '2022-04-27 07:03:18', '2022-04-27 07:03:18'),
(434, 55, 'Khansama', 0, NULL, NULL, '2022-04-27 07:03:27', '2022-04-27 07:03:27'),
(435, 55, 'Nawabganj', 0, NULL, NULL, '2022-04-27 07:03:35', '2022-04-27 07:03:35'),
(436, 55, 'Parbatipur', 0, NULL, NULL, '2022-04-27 07:03:44', '2022-04-27 07:03:44'),
(437, 55, 'Birganj', 0, NULL, NULL, '2022-04-27 07:03:52', '2022-04-27 07:03:52'),
(438, 55, 'Kaharole', 0, NULL, NULL, '2022-04-27 07:04:00', '2022-04-27 07:04:00'),
(439, 55, 'Chirirbandar', 0, NULL, NULL, '2022-04-27 07:04:08', '2022-04-27 07:04:08'),
(440, 55, 'Ghoraghat', 0, NULL, NULL, '2022-04-27 07:04:15', '2022-04-27 07:04:15'),
(441, 55, 'Bochaganj', 0, NULL, NULL, '2022-04-27 07:04:26', '2022-04-27 07:04:26'),
(442, 56, 'Kurigram Sadar', 0, NULL, NULL, '2022-04-27 07:05:07', '2022-04-27 07:05:07'),
(443, 56, 'Phulbari', 0, NULL, NULL, '2022-04-27 07:05:14', '2022-04-27 07:05:14'),
(444, 56, 'Nageshwari', 0, NULL, NULL, '2022-04-27 07:05:22', '2022-04-27 07:05:22'),
(445, 56, 'Rajarha', 0, NULL, NULL, '2022-04-27 07:05:31', '2022-04-27 07:05:31'),
(446, 56, 'Bhurungamari', 0, NULL, NULL, '2022-04-27 07:05:39', '2022-04-27 07:05:39'),
(447, 56, 'Ulipur', 0, NULL, NULL, '2022-04-27 07:05:50', '2022-04-27 07:05:50'),
(448, 56, 'Char Rajibpur', 0, NULL, NULL, '2022-04-27 07:05:59', '2022-04-27 07:05:59'),
(449, 56, 'Rowmari', 0, NULL, NULL, '2022-04-27 07:06:07', '2022-04-27 07:06:07'),
(450, 56, 'Chilmari', 0, NULL, NULL, '2022-04-27 07:06:15', '2022-04-27 07:06:15'),
(451, 57, 'Gaibandha Sadar', 0, NULL, NULL, '2022-04-27 07:08:15', '2022-04-27 07:08:15'),
(452, 57, 'Palashbari', 0, NULL, NULL, '2022-04-27 07:17:07', '2022-04-27 07:17:07'),
(453, 57, 'Fulchhari', 0, NULL, NULL, '2022-04-27 07:17:16', '2022-04-27 07:17:16'),
(454, 57, 'Sadullapur', 0, NULL, NULL, '2022-04-27 07:17:27', '2022-04-27 07:17:27'),
(455, 57, 'Sundarganj', 0, NULL, NULL, '2022-04-27 07:36:35', '2022-04-27 07:36:35'),
(456, 57, 'Gobindaganj', 0, NULL, NULL, '2022-04-27 07:36:47', '2022-04-27 07:36:47'),
(457, 57, 'Saghata', 0, NULL, NULL, '2022-04-27 07:36:59', '2022-04-27 07:36:59'),
(458, 58, 'Lalmonirhat Sadar', 0, NULL, NULL, '2022-04-27 07:37:38', '2022-04-27 07:37:38'),
(459, 58, 'Patgram', 0, NULL, NULL, '2022-04-27 07:37:46', '2022-04-27 07:37:46'),
(460, 58, 'Aditmari', 0, NULL, NULL, '2022-04-27 07:37:56', '2022-04-27 07:37:56'),
(461, 58, 'Hatibandha', 0, NULL, NULL, '2022-04-27 07:38:04', '2022-04-27 07:38:04'),
(462, 58, 'Kaliganj', 0, NULL, NULL, '2022-04-27 07:38:12', '2022-04-27 07:38:12'),
(463, 59, 'Nilphamari Sadar', 0, NULL, NULL, '2022-04-27 07:38:41', '2022-04-27 07:38:41'),
(464, 59, 'Jaldhaka', 0, NULL, NULL, '2022-04-27 07:38:50', '2022-04-27 07:38:50'),
(465, 59, 'Saidpur', 0, NULL, NULL, '2022-04-27 07:38:57', '2022-04-27 07:38:57'),
(466, 59, 'Dimla', 0, NULL, NULL, '2022-04-27 07:39:05', '2022-04-27 07:39:05'),
(467, 59, 'Kishoreganj', 0, NULL, NULL, '2022-04-27 07:39:12', '2022-04-27 07:39:12'),
(468, 59, 'Domar', 0, NULL, NULL, '2022-04-27 07:39:19', '2022-04-27 07:39:19'),
(469, 60, 'Panchagarh Sadar', 0, NULL, NULL, '2022-04-27 07:40:16', '2022-04-27 07:40:16'),
(470, 60, 'Atwari', 0, NULL, NULL, '2022-04-27 07:40:25', '2022-04-27 07:40:25'),
(471, 60, 'Boda', 0, NULL, NULL, '2022-04-27 07:40:35', '2022-04-27 07:40:35'),
(472, 60, 'Debiganj', 0, NULL, NULL, '2022-04-27 07:40:43', '2022-04-27 07:40:43'),
(473, 60, 'Tetulia', 0, NULL, NULL, '2022-04-27 07:40:50', '2022-04-27 07:40:50'),
(474, 61, 'Rangpur Sadar', 0, NULL, NULL, '2022-04-27 07:41:44', '2022-04-27 07:41:44'),
(475, 61, 'Badarganj', 0, NULL, NULL, '2022-04-27 07:41:54', '2022-04-27 07:41:54'),
(476, 61, 'Kaunia', 0, NULL, NULL, '2022-04-27 07:42:03', '2022-04-27 07:42:03'),
(477, 61, 'Gangachhara', 0, NULL, NULL, '2022-04-27 07:42:12', '2022-04-27 07:42:12'),
(478, 61, 'Mithapukur', 0, NULL, NULL, '2022-04-27 07:42:19', '2022-04-27 07:42:19'),
(479, 61, 'Taraganj', 0, NULL, NULL, '2022-04-27 07:42:26', '2022-04-27 07:42:26'),
(480, 61, 'Pirganj', 0, NULL, NULL, '2022-04-27 07:42:34', '2022-04-27 07:42:34'),
(481, 61, 'Pirgachha', 0, NULL, NULL, '2022-04-27 07:42:41', '2022-04-27 07:42:41'),
(482, 62, 'Thakurgaon Sadar', 0, NULL, NULL, '2022-04-27 07:43:25', '2022-04-27 07:43:25'),
(483, 62, 'Baliadangi', 0, NULL, NULL, '2022-04-27 07:43:34', '2022-04-27 07:43:34'),
(484, 62, 'Pirganj', 0, NULL, NULL, '2022-04-27 07:43:41', '2022-04-27 07:43:41'),
(485, 62, 'Ranisankail', 0, NULL, NULL, '2022-04-27 07:43:50', '2022-04-27 07:43:50'),
(486, 62, 'Haripur', 0, NULL, NULL, '2022-04-27 07:43:57', '2022-04-27 07:43:57'),
(487, 63, 'Habiganj Sadar', 0, NULL, NULL, '2022-04-27 07:44:22', '2022-04-27 07:44:22'),
(488, 63, 'Lakhai', 0, NULL, NULL, '2022-04-27 07:44:32', '2022-04-27 07:44:32'),
(489, 63, 'Madhabpur', 0, NULL, NULL, '2022-04-27 07:44:40', '2022-04-27 07:44:40'),
(490, 63, 'Nabiganj', 0, NULL, NULL, '2022-04-27 07:44:50', '2022-04-27 07:44:50'),
(491, 63, 'Chunarughat', 0, NULL, NULL, '2022-04-27 07:44:58', '2022-04-27 07:44:58'),
(492, 63, 'Baniachang', 0, NULL, NULL, '2022-04-27 07:45:07', '2022-04-27 07:45:07'),
(493, 63, 'Bahubal', 0, NULL, NULL, '2022-04-27 07:45:14', '2022-04-27 07:45:14'),
(494, 63, 'Ajmiriganj', 0, NULL, NULL, '2022-04-27 07:45:22', '2022-04-27 07:45:22'),
(495, 64, 'Moulvibazar Sadar', 0, NULL, NULL, '2022-04-27 08:04:29', '2022-04-27 08:04:29'),
(496, 64, 'SreeMangal', 0, NULL, NULL, '2022-04-27 08:04:38', '2022-04-27 08:04:38'),
(497, 64, 'Kulaura', 0, NULL, NULL, '2022-04-27 08:04:52', '2022-04-27 08:04:52'),
(498, 64, 'Kamalganj', 0, NULL, NULL, '2022-04-27 08:05:04', '2022-04-27 08:05:04'),
(499, 64, 'Juri', 0, NULL, NULL, '2022-04-27 08:05:16', '2022-04-27 08:05:16'),
(500, 64, 'Barlekha', 0, NULL, NULL, '2022-04-27 08:05:26', '2022-04-27 08:05:26'),
(501, 64, 'Rajnagar', 0, NULL, NULL, '2022-04-27 08:05:36', '2022-04-27 08:05:36'),
(502, 65, 'Sunamganj Sadar', 0, NULL, NULL, '2022-04-27 08:06:12', '2022-04-27 08:06:12'),
(503, 65, 'Sunamganj South', 0, NULL, NULL, '2022-04-27 08:06:24', '2022-04-27 08:06:24'),
(504, 65, 'Chhatak', 0, NULL, NULL, '2022-04-27 08:06:33', '2022-04-27 08:06:33'),
(505, 65, 'Jagannathpur', 0, NULL, NULL, '2022-04-27 08:06:41', '2022-04-27 08:06:41'),
(506, 65, 'Bishwamvarpur', 0, NULL, NULL, '2022-04-27 08:06:49', '2022-04-27 08:06:49'),
(507, 65, 'Tahirpur', 0, NULL, NULL, '2022-04-27 08:06:57', '2022-04-27 08:06:57'),
(508, 65, 'Derai', 0, NULL, NULL, '2022-04-27 08:07:04', '2022-04-27 08:07:04'),
(509, 65, 'Dharampasha', 0, NULL, NULL, '2022-04-27 08:07:12', '2022-04-27 08:07:12'),
(510, 65, 'Sulla', 0, NULL, NULL, '2022-04-27 08:07:19', '2022-04-27 08:07:19'),
(511, 65, 'Dowarabazar', 0, NULL, NULL, '2022-04-27 08:07:27', '2022-04-27 08:07:27'),
(512, 65, 'Jamalganj', 0, NULL, NULL, '2022-04-27 08:07:34', '2022-04-27 08:07:34'),
(513, 66, 'Sylhet Sadar', 0, NULL, NULL, '2022-04-27 08:08:01', '2022-04-27 08:08:01'),
(514, 66, 'Beanibazar', 0, NULL, NULL, '2022-04-27 08:08:08', '2022-04-27 08:08:08'),
(515, 66, 'Golapganj', 0, NULL, NULL, '2022-04-27 08:08:17', '2022-04-27 08:08:17'),
(516, 66, 'Companiganj', 0, NULL, NULL, '2022-04-27 08:08:25', '2022-04-27 08:08:25'),
(517, 66, 'Fenchuganj', 0, NULL, NULL, '2022-04-27 08:08:32', '2022-04-27 08:08:32'),
(518, 66, 'Bishwanath', 0, NULL, NULL, '2022-04-27 08:08:42', '2022-04-27 08:08:42'),
(519, 66, 'Gowainghat', 0, NULL, NULL, '2022-04-27 08:08:49', '2022-04-27 08:08:49'),
(520, 66, 'Jaintiapur', 0, NULL, NULL, '2022-04-27 08:08:58', '2022-04-27 08:08:58'),
(521, 66, 'Kanaighat', 0, NULL, NULL, '2022-04-27 08:09:05', '2022-04-27 08:09:05'),
(522, 66, 'Balaganj', 0, NULL, NULL, '2022-04-27 08:09:13', '2022-04-27 08:09:13'),
(523, 66, 'South Shurma', 0, NULL, NULL, '2022-04-27 08:09:21', '2022-04-27 08:09:21'),
(524, 66, 'Zakiganj', 0, NULL, NULL, '2022-04-27 08:09:30', '2022-04-27 08:09:30'),
(525, 20, 'Hatirjheel', 0, NULL, NULL, '2022-07-21 18:54:44', '2022-07-21 18:54:44'),
(526, 17, 'Pahartali', 0, NULL, NULL, '2022-07-27 14:42:00', '2022-07-27 14:42:00'),
(527, 20, 'Nawabganj', 0, NULL, NULL, '2022-07-27 14:42:55', '2022-07-27 14:42:55'),
(528, 20, 'Keraniganj Model', 0, NULL, NULL, '2022-07-27 14:43:28', '2022-07-27 14:43:28'),
(529, 20, 'Keraniganj South', 0, NULL, NULL, '2022-07-27 14:43:51', '2022-07-27 14:43:51'),
(530, 20, 'Dohar', 0, NULL, NULL, '2022-07-27 14:44:17', '2022-07-27 14:44:17'),
(531, 20, 'Dhamrai', 0, NULL, NULL, '2022-07-27 14:44:33', '2022-07-27 14:44:33'),
(532, 20, 'Savar', 0, NULL, NULL, '2022-07-27 14:44:48', '2022-07-27 14:44:48'),
(533, 20, 'Sobujbagh', 0, NULL, NULL, '2022-07-27 14:51:39', '2022-07-27 14:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `social_compliances`
--

CREATE TABLE `social_compliances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employment_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hour_leave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compensation_benefit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hygine_safety` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welfare_security` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industrial_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labour_law_safety` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bnbc_safety` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fire_safety` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electrical_safety` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `natural_disaster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_of_conduct` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `international_standard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_compliances`
--

INSERT INTO `social_compliances` (`id`, `employment_condition`, `working_hour_leave`, `compensation_benefit`, `hygine_safety`, `welfare_security`, `industrial_relation`, `labour_law_safety`, `bnbc_safety`, `fire_safety`, `electrical_safety`, `natural_disaster`, `code_of_conduct`, `international_standard`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test updated', 'test updated', 'test updated', 'asdf', 'asdf', 'asdf', 'test updated', 'test updated', 'asdf', 'asdf', 'asdf', 'asdf updated', 'werwer', 1, NULL, NULL, '2022-03-09 03:51:00', '2022-03-09 22:32:28'),
(2, 'test 2', 'test 2', 'test 2', '2022-03-14', '2022-03-17', '2022-03-08', 'test a', 'test g', '2022-03-02', '2022-03-17', '2022-03-08', 'asdf we', 'asdf d', 0, NULL, NULL, '2022-03-09 03:52:55', '2022-03-09 22:32:42');

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
(2, '6985', '2022-01-31', '2', 1, '778', 2, '1', 2, '541', 2, 'Lalbagh', 1, '2022-02-15', 1, 2, 3, 2, '35000', 'Aminur Rahman Smith Aminur', '01998744563', 2, 2, 4, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 1, 'Jack', 2, '2022-02-09', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 3, 'Smith', 2, '01456698783', 2, 'test21', 2, 2, 'test 2', 'test 3', 'test 4', '40000', 'test 5', 'test 6', 1, NULL, NULL, '2022-02-26 01:35:10', '2022-03-07 06:10:22');

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
-- Indexes for table `bill_schedules`
--
ALTER TABLE `bill_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases_notifications`
--
ALTER TABLE `cases_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_billings`
--
ALTER TABLE `case_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chambers`
--
ALTER TABLE `chambers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber_accounts`
--
ALTER TABLE `chamber_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber_associates`
--
ALTER TABLE `chamber_associates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber_clerks`
--
ALTER TABLE `chamber_clerks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber_partners`
--
ALTER TABLE `chamber_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber_staff`
--
ALTER TABLE `chamber_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber_staff_documents_receiveds`
--
ALTER TABLE `chamber_staff_documents_receiveds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber_staff_documents_requireds`
--
ALTER TABLE `chamber_staff_documents_requireds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber_support_staff`
--
ALTER TABLE `chamber_support_staff`
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
-- Indexes for table `counsels`
--
ALTER TABLE `counsels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counsel_documents_receiveds`
--
ALTER TABLE `counsel_documents_receiveds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counsel_documents_requireds`
--
ALTER TABLE `counsel_documents_requireds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases`
--
ALTER TABLE `criminal_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases_billings`
--
ALTER TABLE `criminal_cases_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases_case_steps`
--
ALTER TABLE `criminal_cases_case_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases_documents_receiveds`
--
ALTER TABLE `criminal_cases_documents_receiveds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases_documents_requireds`
--
ALTER TABLE `criminal_cases_documents_requireds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases_files`
--
ALTER TABLE `criminal_cases_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases_letter_notices`
--
ALTER TABLE `criminal_cases_letter_notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_cases_send_messages`
--
ALTER TABLE `criminal_cases_send_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_case_activity_logs`
--
ALTER TABLE `criminal_case_activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal_case_status_logs`
--
ALTER TABLE `criminal_case_status_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `external_files`
--
ALTER TABLE `external_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flat_information`
--
ALTER TABLE `flat_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flat_information_files`
--
ALTER TABLE `flat_information_files`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `internal_counsels`
--
ALTER TABLE `internal_counsels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_counsel_documents_receiveds`
--
ALTER TABLE `internal_counsel_documents_receiveds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_counsel_documents_requireds`
--
ALTER TABLE `internal_counsel_documents_requireds`
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
-- Indexes for table `land_information`
--
ALTER TABLE `land_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_information_files`
--
ALTER TABLE `land_information_files`
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
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `regulatory_compliances`
--
ALTER TABLE `regulatory_compliances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setup_accuseds`
--
ALTER TABLE `setup_accuseds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_allegations`
--
ALTER TABLE `setup_allegations`
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
-- Indexes for table `setup_bill_particulars`
--
ALTER TABLE `setup_bill_particulars`
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
-- Indexes for table `setup_cabinets`
--
ALTER TABLE `setup_cabinets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_case_categories`
--
ALTER TABLE `setup_case_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_case_classes`
--
ALTER TABLE `setup_case_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_case_statuses`
--
ALTER TABLE `setup_case_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_case_subcategories`
--
ALTER TABLE `setup_case_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_case_titles`
--
ALTER TABLE `setup_case_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_case_types`
--
ALTER TABLE `setup_case_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_clients`
--
ALTER TABLE `setup_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_client_categories`
--
ALTER TABLE `setup_client_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_client_names`
--
ALTER TABLE `setup_client_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_client_subcategories`
--
ALTER TABLE `setup_client_subcategories`
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
-- Indexes for table `setup_complainants`
--
ALTER TABLE `setup_complainants`
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
-- Indexes for table `setup_coordinators`
--
ALTER TABLE `setup_coordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_courts`
--
ALTER TABLE `setup_courts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_court_classes`
--
ALTER TABLE `setup_court_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_court_last_orders`
--
ALTER TABLE `setup_court_last_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_court_proceedings`
--
ALTER TABLE `setup_court_proceedings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_court_shorts`
--
ALTER TABLE `setup_court_shorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_day_notes`
--
ALTER TABLE `setup_day_notes`
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
-- Indexes for table `setup_documents`
--
ALTER TABLE `setup_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_documents_types`
--
ALTER TABLE `setup_documents_types`
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
-- Indexes for table `setup_flat_numbers`
--
ALTER TABLE `setup_flat_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_floors`
--
ALTER TABLE `setup_floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_groups`
--
ALTER TABLE `setup_groups`
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
-- Indexes for table `setup_in_favour_ofs`
--
ALTER TABLE `setup_in_favour_ofs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_laws`
--
ALTER TABLE `setup_laws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_law_sections`
--
ALTER TABLE `setup_law_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_legal_issues`
--
ALTER TABLE `setup_legal_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_legal_services`
--
ALTER TABLE `setup_legal_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_matters`
--
ALTER TABLE `setup_matters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_modes`
--
ALTER TABLE `setup_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_next_date_reasons`
--
ALTER TABLE `setup_next_date_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_next_day_presences`
--
ALTER TABLE `setup_next_day_presences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_oppositions`
--
ALTER TABLE `setup_oppositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_particulars`
--
ALTER TABLE `setup_particulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_parties`
--
ALTER TABLE `setup_parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_person_titles`
--
ALTER TABLE `setup_person_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_professions`
--
ALTER TABLE `setup_professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_programs`
--
ALTER TABLE `setup_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_progress`
--
ALTER TABLE `setup_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_property_types`
--
ALTER TABLE `setup_property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_referrers`
--
ALTER TABLE `setup_referrers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_regions`
--
ALTER TABLE `setup_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_sections`
--
ALTER TABLE `setup_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_seller_buyers`
--
ALTER TABLE `setup_seller_buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_supreme_court_categories`
--
ALTER TABLE `setup_supreme_court_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_supreme_court_subcategories`
--
ALTER TABLE `setup_supreme_court_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_thanas`
--
ALTER TABLE `setup_thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_compliances`
--
ALTER TABLE `social_compliances`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `appellate_court_cases`
--
ALTER TABLE `appellate_court_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `bill_schedules`
--
ALTER TABLE `bill_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cases_notifications`
--
ALTER TABLE `cases_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `case_billings`
--
ALTER TABLE `case_billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `chambers`
--
ALTER TABLE `chambers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chamber_accounts`
--
ALTER TABLE `chamber_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chamber_associates`
--
ALTER TABLE `chamber_associates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chamber_clerks`
--
ALTER TABLE `chamber_clerks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chamber_partners`
--
ALTER TABLE `chamber_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chamber_staff`
--
ALTER TABLE `chamber_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chamber_staff_documents_receiveds`
--
ALTER TABLE `chamber_staff_documents_receiveds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chamber_staff_documents_requireds`
--
ALTER TABLE `chamber_staff_documents_requireds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chamber_support_staff`
--
ALTER TABLE `chamber_support_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `civil_cases`
--
ALTER TABLE `civil_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `civil_cases_files`
--
ALTER TABLE `civil_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `civil_case_status_logs`
--
ALTER TABLE `civil_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counsels`
--
ALTER TABLE `counsels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counsel_documents_receiveds`
--
ALTER TABLE `counsel_documents_receiveds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `counsel_documents_requireds`
--
ALTER TABLE `counsel_documents_requireds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `criminal_cases`
--
ALTER TABLE `criminal_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `criminal_cases_billings`
--
ALTER TABLE `criminal_cases_billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `criminal_cases_case_steps`
--
ALTER TABLE `criminal_cases_case_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `criminal_cases_documents_receiveds`
--
ALTER TABLE `criminal_cases_documents_receiveds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `criminal_cases_documents_requireds`
--
ALTER TABLE `criminal_cases_documents_requireds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `criminal_cases_files`
--
ALTER TABLE `criminal_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `criminal_cases_letter_notices`
--
ALTER TABLE `criminal_cases_letter_notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `criminal_cases_send_messages`
--
ALTER TABLE `criminal_cases_send_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `criminal_case_activity_logs`
--
ALTER TABLE `criminal_case_activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `criminal_case_status_logs`
--
ALTER TABLE `criminal_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `external_files`
--
ALTER TABLE `external_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flat_information`
--
ALTER TABLE `flat_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flat_information_files`
--
ALTER TABLE `flat_information_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `high_court_cases`
--
ALTER TABLE `high_court_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `high_court_cases_files`
--
ALTER TABLE `high_court_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `high_court_case_status_logs`
--
ALTER TABLE `high_court_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `internal_counsels`
--
ALTER TABLE `internal_counsels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `internal_counsel_documents_receiveds`
--
ALTER TABLE `internal_counsel_documents_receiveds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `internal_counsel_documents_requireds`
--
ALTER TABLE `internal_counsel_documents_requireds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `labour_cases`
--
ALTER TABLE `labour_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `labour_cases_files`
--
ALTER TABLE `labour_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `labour_case_status_logs`
--
ALTER TABLE `labour_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `land_information`
--
ALTER TABLE `land_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `land_information_files`
--
ALTER TABLE `land_information_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `regulatory_compliances`
--
ALTER TABLE `regulatory_compliances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_accuseds`
--
ALTER TABLE `setup_accuseds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_allegations`
--
ALTER TABLE `setup_allegations`
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
-- AUTO_INCREMENT for table `setup_bill_particulars`
--
ALTER TABLE `setup_bill_particulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_bill_types`
--
ALTER TABLE `setup_bill_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_branches`
--
ALTER TABLE `setup_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_cabinets`
--
ALTER TABLE `setup_cabinets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_case_categories`
--
ALTER TABLE `setup_case_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `setup_case_classes`
--
ALTER TABLE `setup_case_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_case_statuses`
--
ALTER TABLE `setup_case_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `setup_case_subcategories`
--
ALTER TABLE `setup_case_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setup_case_titles`
--
ALTER TABLE `setup_case_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setup_case_types`
--
ALTER TABLE `setup_case_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setup_clients`
--
ALTER TABLE `setup_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_client_categories`
--
ALTER TABLE `setup_client_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_client_names`
--
ALTER TABLE `setup_client_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_client_subcategories`
--
ALTER TABLE `setup_client_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setup_companies`
--
ALTER TABLE `setup_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_company_types`
--
ALTER TABLE `setup_company_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_complainants`
--
ALTER TABLE `setup_complainants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_compliance_categories`
--
ALTER TABLE `setup_compliance_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_compliance_types`
--
ALTER TABLE `setup_compliance_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_coordinators`
--
ALTER TABLE `setup_coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_courts`
--
ALTER TABLE `setup_courts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `setup_court_classes`
--
ALTER TABLE `setup_court_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_court_last_orders`
--
ALTER TABLE `setup_court_last_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setup_court_proceedings`
--
ALTER TABLE `setup_court_proceedings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setup_court_shorts`
--
ALTER TABLE `setup_court_shorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_day_notes`
--
ALTER TABLE `setup_day_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_designations`
--
ALTER TABLE `setup_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setup_digital_payments`
--
ALTER TABLE `setup_digital_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_districts`
--
ALTER TABLE `setup_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `setup_divisions`
--
ALTER TABLE `setup_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setup_documents`
--
ALTER TABLE `setup_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `setup_documents_types`
--
ALTER TABLE `setup_documents_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_external_councils`
--
ALTER TABLE `setup_external_councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_external_council_associates`
--
ALTER TABLE `setup_external_council_associates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_external_council_associates_files`
--
ALTER TABLE `setup_external_council_associates_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_external_council_files`
--
ALTER TABLE `setup_external_council_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_flat_numbers`
--
ALTER TABLE `setup_flat_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_floors`
--
ALTER TABLE `setup_floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_groups`
--
ALTER TABLE `setup_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_internal_councils`
--
ALTER TABLE `setup_internal_councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_internal_council_files`
--
ALTER TABLE `setup_internal_council_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_in_favour_ofs`
--
ALTER TABLE `setup_in_favour_ofs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_laws`
--
ALTER TABLE `setup_laws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setup_law_sections`
--
ALTER TABLE `setup_law_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_legal_issues`
--
ALTER TABLE `setup_legal_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_legal_services`
--
ALTER TABLE `setup_legal_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_matters`
--
ALTER TABLE `setup_matters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setup_modes`
--
ALTER TABLE `setup_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_next_date_reasons`
--
ALTER TABLE `setup_next_date_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `setup_next_day_presences`
--
ALTER TABLE `setup_next_day_presences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_oppositions`
--
ALTER TABLE `setup_oppositions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_particulars`
--
ALTER TABLE `setup_particulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_parties`
--
ALTER TABLE `setup_parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_person_titles`
--
ALTER TABLE `setup_person_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_professions`
--
ALTER TABLE `setup_professions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_programs`
--
ALTER TABLE `setup_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_progress`
--
ALTER TABLE `setup_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_property_types`
--
ALTER TABLE `setup_property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_referrers`
--
ALTER TABLE `setup_referrers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_regions`
--
ALTER TABLE `setup_regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_sections`
--
ALTER TABLE `setup_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_seller_buyers`
--
ALTER TABLE `setup_seller_buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_supreme_court_categories`
--
ALTER TABLE `setup_supreme_court_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setup_supreme_court_subcategories`
--
ALTER TABLE `setup_supreme_court_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_thanas`
--
ALTER TABLE `setup_thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT for table `social_compliances`
--
ALTER TABLE `social_compliances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
