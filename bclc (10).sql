-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 01:47 PM
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
(1, 'Md. Imran Hossain', 'admin', '01771045019', 'mdimranhossain985@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(2, 'Imran', 'subadmin', '01687663654', 'imrancsecity@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(3, 'Md. Imran', 'subadmin', '01771045019', 'admin@admin.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(4, 'Md. Imran', 'subadmin', '01771045019', 'test@admin.com', NULL, '$2a$12$GYZx235ezFaYYa3Oxornx.6fa1p8nBm20t4eA9yD./orC2oH/eUcy', '', 1, NULL, NULL, NULL),
(5, 'jislam', 'subadmin', '01771045019', 'jislam@admin.com', NULL, '$2a$12$RSDqi65XW57ZYf0JwGN9/eo4fNS.xqUdsfLiPPdqoY0SUW8ofoKeq', '', 1, NULL, NULL, NULL),
(6, 'N K Joha', 'subadmin', '01771045019', 'nkzoha@gmail.com', NULL, '$2y$10$8dbajWp9YGEYqRPXTxWegeiF0N/CmijMt5Osugwq.J4sdWsmfum02', '', 1, NULL, NULL, NULL),
(7, 'Jabed Akhter', 'subadmin', '01771045019', 'jabedakhter@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL),
(8, 'Tamanna', 'subadmin', '01771045019', 'tamanna@gmail.com', NULL, '$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu', '', 1, NULL, NULL, NULL);

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
  `case_category_id` int(11) DEFAULT NULL,
  `case_class_id` int(11) DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `relevant_law_sections_id` int(11) DEFAULT NULL,
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
  `other_claim` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_alligation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_court_id` int(11) DEFAULT NULL,
  `trial_court_judgement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_grounds_judgement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_court_id` int(11) DEFAULT NULL,
  `appeal_court_judgement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_grounds_judgement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appeal_court_judgement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_lawyer_id` int(11) DEFAULT NULL,
  `total_legal_bill_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_received_lawyer_id` int(11) DEFAULT NULL,
  `case_papers_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tadbirkar_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tender_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tender_no_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supreme_court_category_id` int(11) DEFAULT NULL,
  `supreme_court_subcategory_id` int(11) DEFAULT NULL,
  `case_no_hcd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_filing_hcd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hcd_court_id` int(11) DEFAULT NULL,
  `law_sections_id` int(11) DEFAULT NULL,
  `order` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no_memo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_petitioner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_designation_id` int(11) DEFAULT NULL,
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
  `documents_lawyers_appointment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents_sent_to_law_chamber` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents_received_field_programe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ground_appeal_revision` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appellate_court_cases`
--

INSERT INTO `appellate_court_cases` (`id`, `lower_court`, `case_no`, `division_id`, `district_id`, `thana_id`, `case_category_id`, `case_class_id`, `case_type_id`, `relevant_law_sections_id`, `section_id`, `date_of_filing`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `accused_name`, `accused_company_id`, `accused_address`, `accused_contact_no`, `other_claim`, `summary_facts_alligation`, `trial_court_id`, `trial_court_judgement_date`, `trial_grounds_judgement`, `appeal_court_id`, `appeal_court_judgement_date`, `appeal_grounds_judgement`, `appeal_court_judgement`, `panel_lawyer_id`, `total_legal_bill_amount`, `case_received_lawyer_id`, `case_papers_received`, `tadbirkar_details`, `tender_no`, `tender_no_date`, `supreme_court_category_id`, `supreme_court_subcategory_id`, `case_no_hcd`, `date_of_filing_hcd`, `hcd_court_id`, `law_sections_id`, `order`, `order_date`, `order_no_memo`, `appellant_petitioner_name`, `appellant_designation_id`, `appellant_address`, `opposite_party_name`, `opposite_party_designation_id`, `opposite_party_address`, `party_steps_taken_id`, `case_status_id`, `fixed_hearing_court_id`, `court_steps_taken_id`, `court_next_steps_date`, `assigned_lawyer_id`, `documents_lawyers_appointment`, `documents_sent_to_law_chamber`, `documents_received_field_programe`, `missing_documents_evidence`, `ground_appeal_revision`, `recommendations`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test 6 updated', 1, '2022-03-18', 'test 6 updated', 'test 9 updated', '2022-03-03', 6, 4, 'test 6', '2022-04-06', 2, 2, 'test 6', '2022-04-08', '2022-04-09', 'test 69', 2, 'test 87', 'test 45', 2, '43 Phillip St, Sydney NSW 2000, Australia', 3, 3, 2, 3, '2022-03-25', 1, 'test 2 updated', 'test 3 updated', 'test 4 updated', 'test 5 updated', 'test 6 updated', 'test 7 updated', 0, NULL, NULL, '2022-03-23 22:56:41', '2022-03-23 23:15:42'),
(2, NULL, '654643', 3, 3, 2, 2, 5, 2, 2, 3, '2022-03-15', 'asdf', 2, '6', 'Aminur Rahman Smith Aminur', '01998744563', 2, 'Aminur Rahman Smith Aminur', NULL, '43 Phillip St, Sydney NSW 2000, Australia', '01998745638', 'test 1', 'test 2', 2, '2022-03-10', 'test 3', 2, '2022-03-07', 'test 4', 'test 5', 1, 'test 6', 1, '2022-03-10', 'test 7', 'test 8', '2022-02-28', 6, 4, 'test 9', '2022-03-25', 2, 2, 'test 10', '2022-03-19', '2022-04-08', 'test 11', 2, 'test 12', 'test 13', 2, 'test 14', 3, 3, 2, 1, '2022-04-07', 1, 'test 15', 'test 16', 'test 17', 'test 18', 'test 19', 'test 20', 0, NULL, NULL, '2022-03-23 23:00:11', '2022-03-23 23:00:11'),
(3, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test 5', 1, '2022-04-02', 'test 6', 'test 7', '2022-03-19', 6, 4, 'test', '2022-04-02', 2, 2, 'test 3', '2022-03-31', '2022-04-01', 'test 9', 2, '43 Phillip St, Sydney NSW 2000, Australia', 'test 3', 2, 'test 4', 3, 2, 2, 3, '2022-04-08', 1, 'test 5', 'test 6', 'test 7', 'test 8', 'test 9', 'test 10', 0, NULL, NULL, '2022-03-23 23:03:12', '2022-03-23 23:15:56');

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
(1, 1, '164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-16 05:00:10', '2022-03-16 05:00:10'),
(2, 1, '164742841018164664984298Ethnicity.png', 0, NULL, NULL, '2022-03-16 05:00:10', '2022-03-16 05:00:10'),
(3, 1, '164792825535164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 23:50:55', '2022-03-21 23:50:55'),
(4, 1, '164792825518164509798992byden.jpg', 0, NULL, NULL, '2022-03-21 23:50:55', '2022-03-21 23:50:55'),
(5, 2, '164801578796164792221728164509798992byden.jpg', 0, NULL, NULL, '2022-03-23 00:09:47', '2022-03-23 00:09:47'),
(6, 2, '164801578778164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-23 00:09:47', '2022-03-23 00:09:47'),
(7, 1, '164809780145164792825535164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-23 22:56:41', '2022-03-23 22:56:41'),
(8, 1, '16480978017216474106851byden (1).jpg', 0, NULL, NULL, '2022-03-23 22:56:41', '2022-03-23 22:56:41'),
(9, 2, '16480980113516474106851byden (1).jpg', 0, NULL, NULL, '2022-03-23 23:00:11', '2022-03-23 23:00:11'),
(10, 2, '164809801148164792825535164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-23 23:00:11', '2022-03-23 23:00:11'),
(11, 3, '164809819213164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-23 23:03:12', '2022-03-23 23:03:12'),
(12, 3, '16480981926916474106851byden (1).jpg', 0, NULL, NULL, '2022-03-23 23:03:12', '2022-03-23 23:03:12'),
(13, 1, '164809894245164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-23 23:15:42', '2022-03-23 23:15:42'),
(14, 1, '1648098942716474106851byden (1).jpg', 0, NULL, NULL, '2022-03-23 23:15:42', '2022-03-23 23:15:42');

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
(1, 2, 'Cash Payment', 3, 'Criminal Cases', '4546151', 1, '78000', '2022-03-07', NULL, NULL, NULL, '36000', NULL, NULL, 0, NULL, NULL, '2022-03-16 04:11:26', '2022-03-16 04:11:26'),
(2, 3, 'Digital Payment', 3, 'Special Quassi - Judicial Cases', '654643', 1, '780000', '2022-03-14', NULL, NULL, NULL, '258000', 3, NULL, 0, NULL, NULL, '2022-03-16 04:11:48', '2022-03-16 04:11:48'),
(3, 2, 'Digital Payment', 4, 'Special Quassi - Judicial Cases', '654643', 1, '3698500', '2022-03-17', NULL, NULL, NULL, '38000', 3, NULL, 0, NULL, NULL, '2022-03-16 04:12:48', '2022-03-16 04:12:48'),
(4, 3, 'Digital Payment', 3, 'Civil Cases', '4546151', 1, '356000', '2022-03-24', NULL, NULL, NULL, '258000', 3, NULL, 0, NULL, NULL, '2022-03-16 04:13:26', '2022-03-16 04:13:26'),
(5, 2, 'Bank Payment', 3, 'Civil Cases', '4546151', 1, '69000', '2022-03-17', 2, 2, '6946546874', '500000', NULL, NULL, 0, NULL, NULL, '2022-03-16 04:41:41', '2022-03-16 04:41:41'),
(6, 2, 'Digital Payment', 3, 'Civil Cases', '4546151', 1, '780000', '2022-03-18', NULL, NULL, NULL, '258000', 2, NULL, 0, NULL, NULL, '2022-03-16 04:42:10', '2022-03-16 04:42:10'),
(7, 3, 'Digital Payment', 4, 'Civil Cases', '4546151', 1, '565656', '2022-03-24', NULL, NULL, NULL, '377000', 3, NULL, 0, NULL, NULL, '2022-03-16 04:42:43', '2022-03-16 04:42:43'),
(8, 3, 'Bank Payment', 4, 'Supreme Court of Bangladesh', '65464321313', 1, NULL, '2022-03-17', 2, 2, '6946546874', '100000', NULL, NULL, 0, NULL, NULL, '2022-03-16 04:52:24', '2022-03-16 04:52:24'),
(9, 1, 'Cash Payment', 2, 'High Court Division', '65464321313', 1, '780000', '2022-03-24', NULL, NULL, NULL, '38000', NULL, NULL, 0, NULL, NULL, '2022-03-16 04:58:29', '2022-03-16 04:58:29'),
(10, 2, 'Bank Payment', 4, 'Appellate Court Division', '4546151', 1, '69000', '2022-03-24', 2, 2, '6946546874', '100000', NULL, NULL, 0, NULL, NULL, '2022-03-16 05:00:31', '2022-03-16 05:00:31'),
(11, 1, 'Cash Payment', 4, 'Civil Cases', '4546151', 1, '780000', '2022-03-24', NULL, NULL, NULL, '38000', NULL, NULL, 0, NULL, NULL, '2022-03-16 05:49:53', '2022-03-16 05:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `civil_cases`
--

CREATE TABLE `civil_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_category_id` int(11) DEFAULT NULL,
  `client_subcategory_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `case_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_status_id` int(11) DEFAULT NULL,
  `property_type_id` int(11) DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `case_subcategory_id` int(11) DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `external_council_name_id` int(11) DEFAULT NULL,
  `external_council_associates_id` int(11) DEFAULT NULL,
  `relevant_law_id` int(11) DEFAULT NULL,
  `relevant_sections_id` int(11) DEFAULT NULL,
  `plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_designaiton_id` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plaintiff_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `subsequent_plaintiff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nature_of_suit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendant_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendant_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defendant_company_id` int(11) DEFAULT NULL,
  `last_order_court_id` int(11) DEFAULT NULL,
  `additional_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disbursement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_cash_receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_notes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_disposed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_legal_bill_amount_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_lawyer_id` int(11) DEFAULT NULL,
  `notes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_claim` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_facts_demands` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missing_documents_evidence_information` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civil_cases`
--

INSERT INTO `civil_cases` (`id`, `case_no`, `client_category_id`, `client_subcategory_id`, `date_of_filing`, `division_id`, `case_year`, `district_id`, `ref_no`, `amount`, `location`, `case_status_id`, `property_type_id`, `case_category_id`, `case_subcategory_id`, `case_type_id`, `name_of_the_court_id`, `external_council_name_id`, `external_council_associates_id`, `relevant_law_id`, `relevant_sections_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `next_date`, `plaintiff_contact_number`, `next_date_fixed_id`, `company_id`, `zone_id`, `area_id`, `subsequent_plaintiff_name`, `nature_of_suit`, `defendant_name`, `defendant_address`, `defendant_company_id`, `last_order_court_id`, `additional_order`, `disbursement_date`, `date_of_cash_receipt`, `case_notes`, `date_of_disposed`, `total_legal_bill_amount_cost`, `assigned_lawyer_id`, `notes`, `other_claim`, `summary_facts_demands`, `missing_documents_evidence_information`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '4546151', 2, 3, '2022-02-28', 2, '2026', 2, '35', '356200', 'Dhaka', 3, 2, 3, 3, 2, 1, 1, 1, 2, 2, 'test', 2, '2022-03-09', '01456698785', 3, 1, 2, 2, 'test3', 'test', 'test 12 updated', 'test 13', 2, 2, 'test5', '2022-03-08', '2022-03-26', 'test 645', '2022-04-06', '810000', 1, 'test 87 updated', 'test 98 updated', 'test 78 updated', 'test 54 updated', 'test 65 updated', 0, NULL, NULL, '2022-03-27 01:38:18', '2022-03-27 01:39:32'),
(2, '454615145', 2, 3, '2022-03-09', 1, '2022', 4, '3546546', '2454545', 'Dhaka', 2, 2, 1, 1, 2, 1, 1, 1, 2, 1, 'test1', 2, '2022-03-17', '01456698785', 3, 2, 2, 2, 'test3', 'test', 'test 2', 'test 3', 2, 3, 'test 122', '2022-03-07', '2022-04-07', 'test 485', '2022-02-28', 'test 54', 1, 'test 87', 'test 77', 'test 99', 'test 45', 'test 45', 0, NULL, NULL, '2022-03-27 01:46:20', '2022-03-27 03:42:10'),
(3, '6546435456465', 2, 3, '2022-03-09', 3, '2026', 3, 'test15', '2454545', 'Dhaka', 3, 1, 1, 2, 2, 2, 1, 1, 2, 2, 'test', 2, '2022-03-15', 'asdf', 3, 2, 2, 2, 'test3', 'test', 'test 1', 'test 2', 1, 2, 'test 3', '2022-03-06', '2022-03-05', 'test 4', '2022-03-02', 'test 5', 1, 'test 6', 'test 7', 'test 8', 'test 9', 'test 10 updated', 0, NULL, NULL, '2022-03-27 05:10:14', '2022-03-27 05:11:53');

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
(1, 1, '16474106851byden.jpg', 0, NULL, NULL, '2022-03-16 00:04:45', '2022-03-16 00:04:45'),
(2, 1, '164741068538asdfasdf.pdf', 0, NULL, NULL, '2022-03-16 00:04:45', '2022-03-16 00:04:45'),
(3, 1, '16483611061116480981926916474106851byden (1).jpg', 0, NULL, NULL, '2022-03-27 00:05:06', '2022-03-27 00:05:06'),
(4, 1, '164836110677164792106643164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 00:05:06', '2022-03-27 00:05:06'),
(5, 2, '164836122353164809819213164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 00:07:03', '2022-03-27 00:07:03'),
(6, 2, '164836122355164792106681164553223132no_images.png', 0, NULL, NULL, '2022-03-27 00:07:03', '2022-03-27 00:07:03'),
(7, 2, '164836373792164792106681164553223132no_images.png', 0, NULL, NULL, '2022-03-27 00:48:57', '2022-03-27 00:48:57'),
(8, 2, '164836373749164792106643164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 00:48:57', '2022-03-27 00:48:57'),
(9, 1, '164836669897164809819213164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 01:38:18', '2022-03-27 01:38:18'),
(10, 1, '164836669863164792106681164553223132no_images.png', 0, NULL, NULL, '2022-03-27 01:38:18', '2022-03-27 01:38:18'),
(11, 1, '164836677212164792106643164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 01:39:32', '2022-03-27 01:39:32'),
(12, 1, '16483667725216474106851byden (1).jpg', 0, NULL, NULL, '2022-03-27 01:39:32', '2022-03-27 01:39:32'),
(13, 3, '164837941431164792106643164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 05:10:14', '2022-03-27 05:10:14'),
(14, 3, '16483794146716480981926916474106851byden (1).jpg', 0, NULL, NULL, '2022-03-27 05:10:14', '2022-03-27 05:10:14');

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
(1, 1, 1, '2022-03-17', 3, 1, '2022-04-07', 2, 'test', 'test', 'test', 'Disposed', 0, NULL, NULL, '2022-03-16 00:05:21', '2022-03-16 00:05:21');

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
  `client_category_id` int(11) DEFAULT NULL,
  `client_subcategory_id` int(11) DEFAULT NULL,
  `date_of_case_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_category_id` int(11) DEFAULT NULL,
  `case_subcategory_id` int(11) DEFAULT NULL,
  `case_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `trial_court` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsequent_case_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `company_organization_id` int(11) DEFAULT NULL,
  `name_of_the_court_id` int(11) DEFAULT NULL,
  `date_of_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `thana_id` int(11) DEFAULT NULL,
  `relevant_law_id` int(11) DEFAULT NULL,
  `relevant_sections_id` int(11) DEFAULT NULL,
  `alligation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `accused_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_contact_no` int(11) DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date_fixed_id` int(11) DEFAULT NULL,
  `case_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Dumping data for table `criminal_cases`
--

INSERT INTO `criminal_cases` (`id`, `case_no`, `client_category_id`, `client_subcategory_id`, `date_of_case_received`, `case_category_id`, `case_subcategory_id`, `case_year`, `case_type_id`, `trial_court`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `company_organization_id`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `thana_id`, `relevant_law_id`, `relevant_sections_id`, `alligation`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `accused_address`, `accused_contact_no`, `next_date`, `next_date_fixed_id`, `case_notes`, `assigned_lawyer_id`, `total_legal_bill_amount`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '4546151', 2, 3, '2022-03-15', 3, 3, 'test14', 2, 'test 1', 'test 2', 2, 2, 1, 1, 2, '2022-03-15', 3, 3, 2, 2, 3, 'asdf 32', 'asdf 32', 'Aminur Rahman Smith Aminur', '01998744563', 2, 1, 1, 3, 3, 'Aminur Rahman Smith Aminur', 2, '43 Phillip St, Sydney NSW 2000, Australia', 1998745632, '2022-03-15', 3, 'test21', 1, '25600', 'test updated', 'test 2 updated', 'test 3 updated', 'test 4 updated', 'test 5 updated', 0, NULL, NULL, '2022-03-27 22:02:15', '2022-03-27 23:42:52'),
(2, '6546', 3, 1, '2022-03-08', 1, 1, '2023', 2, 'test', '4545', 1, 1, 1, 2, 2, '2022-03-31', 3, 3, 2, 2, 3, 'asdf', 'asdf', 'Aminur Rahman Smith Aminur', '01998744563', 2, 1, 1, 3, 3, 'Aminur Rahman Smith Aminur', 2, '43 Phillip St, Sydney NSW 2000, Australia', 1998745632, '2022-03-09', 3, 'test40', 1, '25600', 'test 1 update', 'test 2 update', 'test 3 udpate', 'test 4 update', 'test 5 update', 0, NULL, NULL, '2022-03-27 22:04:24', '2022-03-27 23:37:46');

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
(1, 1, '164741083064asdfasdf.pdf', 0, NULL, NULL, '2022-03-16 00:07:10', '2022-03-16 00:07:10'),
(2, 1, '16474108304byden.jpg', 0, NULL, NULL, '2022-03-16 00:07:10', '2022-03-16 00:07:10'),
(3, 1, '16484401354816480981926916474106851byden (1).jpg', 0, NULL, NULL, '2022-03-27 22:02:15', '2022-03-27 22:02:15'),
(4, 1, '164844013544164792825535164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 22:02:15', '2022-03-27 22:02:15'),
(5, 2, '16484402645716480981926916474106851byden (1).jpg', 0, NULL, NULL, '2022-03-27 22:04:24', '2022-03-27 22:04:24'),
(6, 2, '16484402648164809819213164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 22:04:24', '2022-03-27 22:04:24'),
(7, 1, '164844430665164792106643164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 23:11:46', '2022-03-27 23:11:46'),
(8, 1, '16484443065816480981926916474106851byden (1).jpg', 0, NULL, NULL, '2022-03-27 23:11:46', '2022-03-27 23:11:46'),
(9, 2, '164844437379164792106681164553223132no_images.png', 0, NULL, NULL, '2022-03-27 23:12:53', '2022-03-27 23:12:53'),
(10, 2, '164844437382164809819213164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-27 23:12:53', '2022-03-27 23:12:53');

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
(1, 'test', '164743046653164664984298Ethnicity.png', 0, NULL, NULL, '2022-03-16 05:34:26', '2022-03-16 05:34:26');

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
(1, 1, 3, 2, 2, 1, 'CS khatian 1', '35465464', 'sa khatian 3', 'sa dag 4', 'rs khatian 5', 'rs dag 6', 'bs khatian 7', 'bs dag 8', '1', '1000 sft', 'deed no 11', '2022-03-31', '13 test', '14 test', NULL, NULL, NULL, 'Aminur Rahman Smith Aminur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-03-16 05:08:26', '2022-03-27 21:58:27');

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

-- --------------------------------------------------------

--
-- Table structure for table `high_court_cases`
--

CREATE TABLE `high_court_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `case_received_lawyer_id` int(11) DEFAULT NULL,
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
  `sections_id` int(11) DEFAULT NULL,
  `order` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no_memo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_petitioner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appellant_designation_id` int(11) DEFAULT NULL,
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
-- Dumping data for table `high_court_cases`
--

INSERT INTO `high_court_cases` (`id`, `case_no`, `division_id`, `district_id`, `thana_id`, `case_class_id`, `case_type_id`, `law_id`, `relevant_law_id`, `relevant_sections_id`, `section_id`, `date_of_filing`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `accused_name`, `accused_company_id`, `accused_address`, `accused_contact_no`, `other_claim`, `summary_facts_alligation`, `trial_court_id`, `trial_court_judgement_date`, `trial_grounds_judgement`, `appeal_court_id`, `appeal_court_judgement_date`, `appeal_grounds_judgement`, `appeal_court_judgement`, `panel_lawyer_id`, `total_legal_bill_amount`, `case_received_lawyer_id`, `case_papers_received`, `tadbirkar_details`, `tender_no`, `tender_no_date`, `case_category_id`, `case_subcategory_id`, `case_no_hcd`, `date_of_filing_hcd`, `hcd_court_id`, `laws_id`, `sections_id`, `order`, `order_date`, `order_no_memo`, `appellant_petitioner_name`, `appellant_designation_id`, `appellant_address`, `opposite_party_name`, `opposite_party_designation_id`, `opposite_party_address`, `party_steps_taken_id`, `case_status_id`, `fixed_hearing_court_id`, `court_steps_taken_id`, `court_next_steps_date`, `assigned_lawyer_id`, `documents_lawyers_appointment`, `documents_sent_to_law_chamber`, `documents_received_field_programe`, `missing_documents_evidence`, `ground_appeal_revision`, `recommendations`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '4546151', 3, 3, 1, 5, 2, 2, 2, 3, 4, '2022-03-29', 'test1', 2, '01456698785', 'Aminur Rahman Smith Aminur', '01998744568', 2, 'Aminur Rahman Smith Aminur', 2, '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 'test1', 'test 2', 2, '2022-03-23', 'test 3', 2, '2022-03-03', 'test 4', 'test 5', 1, 'test 6', 1, '2022-03-23', 'test 7', 'test 8', '2022-03-08', 1, 2, 'asdf23465', '2022-03-22', 2, NULL, 3, 'test', '2022-03-16', '2022-03-15', NULL, 2, '43 Phillip St, Sydney NSW 2000, Australia', 'Aminur Rahman Smith Aminur', 2, '43 Phillip St, Sydney NSW 2000, Australia', 3, 1, 2, 3, '2022-03-16', 1, 'tes 6456', 'test asf', 'asdf', 'adrtre', 'TERTR', 'GHJHGJ', 0, NULL, NULL, '2022-03-28 04:41:56', '2022-03-28 05:46:22');

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
(1, 1, '16474282232164733878840byden.jpg', 0, NULL, NULL, '2022-03-16 04:57:03', '2022-03-16 04:57:03'),
(2, 1, '164742822345164664984298Ethnicity.png', 0, NULL, NULL, '2022-03-16 04:57:03', '2022-03-16 04:57:03'),
(3, 1, '164783621952164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-20 22:16:59', '2022-03-20 22:16:59'),
(4, 1, '164783621975164725962475john.jpg', 0, NULL, NULL, '2022-03-20 22:16:59', '2022-03-20 22:16:59'),
(5, 1, '16478444329164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 00:33:52', '2022-03-21 00:33:52'),
(6, 1, '164784443296164733878840byden.jpg', 0, NULL, NULL, '2022-03-21 00:33:52', '2022-03-21 00:33:52'),
(7, 2, '164784526641164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 00:47:46', '2022-03-21 00:47:46'),
(8, 2, '164784526612164725962490byden.jpg', 0, NULL, NULL, '2022-03-21 00:47:46', '2022-03-21 00:47:46'),
(9, 2, '16478472589116449247777asdfasdf (1).pdf', 0, NULL, NULL, '2022-03-21 01:20:58', '2022-03-21 01:20:58'),
(10, 2, '164784725881164725962475john (1).jpg', 0, NULL, NULL, '2022-03-21 01:20:58', '2022-03-21 01:20:58'),
(11, 3, '164792106681164553223132no_images.png', 0, NULL, NULL, '2022-03-21 21:51:06', '2022-03-21 21:51:06'),
(12, 3, '164792106643164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 21:51:06', '2022-03-21 21:51:06'),
(13, 6, '164792152849164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 21:58:48', '2022-03-21 21:58:48'),
(14, 6, '164792152830164553223132no_images.png', 0, NULL, NULL, '2022-03-21 21:58:48', '2022-03-21 21:58:48'),
(15, 7, '164792221792164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 22:10:17', '2022-03-21 22:10:17'),
(16, 7, '164792221728164509798992byden.jpg', 0, NULL, NULL, '2022-03-21 22:10:17', '2022-03-21 22:10:17'),
(17, 8, '164792234857164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 22:12:28', '2022-03-21 22:12:28'),
(18, 11, '16479246947164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 22:51:34', '2022-03-21 22:51:34'),
(19, 12, '164792518136164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 22:59:41', '2022-03-21 22:59:41'),
(20, 12, '16479251815164509798992byden.jpg', 0, NULL, NULL, '2022-03-21 22:59:41', '2022-03-21 22:59:41'),
(21, 14, '164792533373164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-21 23:02:13', '2022-03-21 23:02:13'),
(22, 14, '164792533386164509798992byden.jpg', 0, NULL, NULL, '2022-03-21 23:02:13', '2022-03-21 23:02:13'),
(23, 1, '164809885478164792825535164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-23 23:14:14', '2022-03-23 23:14:14'),
(24, 1, '16480988541716474106851byden (1).jpg', 0, NULL, NULL, '2022-03-23 23:14:14', '2022-03-23 23:14:14'),
(25, 1, '164845620150164809819213164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-28 02:30:01', '2022-03-28 02:30:01'),
(26, 1, '164845620177164792106681164553223132no_images.png', 0, NULL, NULL, '2022-03-28 02:30:01', '2022-03-28 02:30:01'),
(27, 3, '164845660438164792106681164553223132no_images.png', 0, NULL, NULL, '2022-03-28 02:36:44', '2022-03-28 02:36:44'),
(28, 3, '164845660413164792106643164553201653asdfasdf.pdf', 0, NULL, NULL, '2022-03-28 02:36:44', '2022-03-28 02:36:44'),
(29, 1, '16484641163616480981926916474106851byden (1).jpg', 0, NULL, NULL, '2022-03-28 04:41:56', '2022-03-28 04:41:56'),
(30, 1, '164846411628164809819213164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-28 04:41:56', '2022-03-28 04:41:56'),
(31, 1, '164846478737164809819213164742841054164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-28 04:53:07', '2022-03-28 04:53:07'),
(32, 1, '16484647874516480981926916474106851byden (1).jpg', 0, NULL, NULL, '2022-03-28 04:53:07', '2022-03-28 04:53:07');

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
(1, 1, 2, '2022-03-18', 1, 1, '2022-03-10', 3, 'test accused', 'test', 'test', 'test', 'Disposed', 0, NULL, NULL, '2022-03-16 04:57:37', '2022-03-16 04:57:37'),
(2, 2, 1, '2022-03-17', 3, 1, '2022-03-31', 2, 'test', 'test 1', 'test 2', 'test 3', 'Disposed', 0, NULL, NULL, '2022-03-21 05:38:26', '2022-03-21 05:38:26');

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
  `trial_court` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `labour_cases` (`id`, `case_no`, `date_of_case_received`, `case_category_nature_id`, `case_type_id`, `trial_court`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `police_station`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `relevant_law_sections_id`, `alligation_id`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `opposite_party_name`, `opposite_party_address`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `total_legal_bill_amount`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '65464356465', '2022-03-17', '2', 2, 'test', '7788965', 1, '2', 1, '65464356465', 2, 'Lalbagh', 2, '2022-03-17', 2, 2, 2, 2, '356200', 'Aminur Rahman Smith Aminur', '01998744563', 2, 1, 1, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 2, 'qqqq', 1, '2022-03-17', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 3, 'test1', 1, '01456698785', 2, 'test40', 1, 1, 'test', 'test', 'test', '97600', 'test', 'test', 0, NULL, NULL, '2022-03-16 00:11:14', '2022-03-16 02:39:54');

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
(1, 1, '164741107482asdfasdf.pdf', 0, NULL, NULL, '2022-03-16 00:11:14', '2022-03-16 00:11:14'),
(2, 1, '16474110743byden.jpg', 0, NULL, NULL, '2022-03-16 00:11:14', '2022-03-16 00:11:14');

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
(1, 1, 2, '2022-03-17', 3, 1, '2022-03-31', 3, 'test accused', 'test', 'test', 'tset', 'Next Date', 0, NULL, NULL, '2022-03-16 00:11:49', '2022-03-16 00:11:49');

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
(1, 1, 3, 2, 2, 1, 'CS khatian 1', '35465464', 'sa khatian 3', 'sa dag 4', 'rs khatian 5', 'rs dag 6', 'bs khatian 7', 'bs dag 8', 'rrrr', '10', '11 test', '2022-03-31', '13 test', '14 test', 'boundary 15', 'dispute 16', 'any suit 17', 'Aminur Rahman Smith Aminur', '17 sadf', '18 kjh', 'm case no', '20 ertre', '23 test', '2022-03-03', 'Aminur Rahman Smith Aminur', 'Yes', 'elect 98', 'test gas', 'test sewerage', 'test warter', '2022-03-18', '2022-03-25', 0, NULL, NULL, '2022-03-16 05:03:23', '2022-03-16 05:03:23'),
(2, 2, 3, 1, 2, 1, 'CS khatian 1', 'cs dag 2', 'sa khatian 3', 'sa dag 4', 'rs khatian 5', 'rs dag 6', 'bs khatian 7', 'bs dag 8', '1', 'land area 10', 'deed no 11', '2022-03-24', '13 test', '14 test', NULL, NULL, NULL, 'Aminur Rahman Smith Aminur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-03-16 05:05:49', '2022-03-16 05:06:01');

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
(1, 1, '164742860314164664984298Ethnicity.png', 0, NULL, NULL, '2022-03-16 05:03:23', '2022-03-16 05:03:23'),
(2, 1, '16474286033016449247777asdfasdf (1).pdf', 0, NULL, NULL, '2022-03-16 05:03:23', '2022-03-16 05:03:23');

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
(283, '2014_10_12_000000_create_users_table', 20),
(284, '2014_10_12_100000_create_password_resets_table', 20),
(285, '2014_10_12_200000_add_two_factor_columns_to_users_table', 20),
(286, '2019_08_19_000000_create_failed_jobs_table', 20),
(287, '2019_12_14_000001_create_personal_access_tokens_table', 20),
(288, '2020_11_15_100619_create_sessions_table', 20),
(289, '2020_11_15_133901_create_admins_table', 20),
(290, '2022_01_23_065415_create_setup_designations_table', 20),
(291, '2022_01_24_050641_create_setup_case_categories_table', 20),
(292, '2022_01_24_090201_create_setup_case_statuses_table', 20),
(293, '2022_01_24_092137_create_setup_case_types_table', 20),
(294, '2022_01_25_052801_create_setup_property_types_table', 20),
(295, '2022_01_25_062602_create_setup_compliance_categories_table', 20),
(296, '2022_01_31_063010_create_setup_person_titles_table', 20),
(297, '2022_01_31_070832_create_setup_external_councils_table', 20),
(298, '2022_02_01_042900_create_setup_courts_table', 20),
(299, '2022_02_01_064505_create_setup_compliance_types_table', 20),
(301, '2022_02_02_101211_create_setup_divisions_table', 20),
(302, '2022_02_02_102424_create_setup_districts_table', 20),
(303, '2022_02_03_115304_create_setup_law_sections_table', 20),
(304, '2022_02_03_174007_create_civil_cases_files_table', 20),
(305, '2022_02_05_042409_create_setup_next_date_reasons_table', 20),
(306, '2022_02_05_095928_create_setup_court_last_orders_table', 20),
(307, '2022_02_05_104823_create_setup_external_council_files_table', 20),
(309, '2022_02_06_133706_create_setup_regions_table', 20),
(310, '2022_02_07_051606_create_setup_areas_table', 20),
(311, '2022_02_07_053103_create_setup_branches_table', 20),
(312, '2022_02_07_063805_create_setup_programs_table', 20),
(313, '2022_02_07_064505_create_setup_alligations_table', 20),
(314, '2022_02_08_133409_create_contact_infos_table', 20),
(315, '2022_02_09_092253_create_criminal_cases_files_table', 20),
(316, '2022_02_12_103417_create_setup_companies_table', 20),
(317, '2022_02_12_111247_create_setup_company_types_table', 20),
(318, '2022_02_12_120355_create_setup_internal_councils_table', 20),
(319, '2022_02_12_120617_create_setup_internal_council_files_table', 20),
(320, '2022_02_13_062358_create_setup_external_council_associates_files_table', 20),
(321, '2022_02_13_063316_create_setup_external_council_associates_table', 20),
(322, '2022_02_16_073059_create_labour_cases_table', 20),
(323, '2022_02_16_122342_create_labour_cases_files_table', 20),
(324, '2022_02_17_064635_create_quassi_judicial_cases_table', 20),
(325, '2022_02_17_071328_create_quassi_judicial_cases_files_table', 20),
(326, '2022_02_17_090404_create_supreme_court_cases_table', 20),
(327, '2022_02_17_090617_create_supreme_court_cases_files_table', 20),
(329, '2022_02_17_104722_create_high_court_cases_files_table', 20),
(331, '2022_02_17_115024_create_appellate_court_cases_files_table', 20),
(332, '2022_02_23_100709_create_civil_case_status_logs_table', 20),
(333, '2022_02_24_092255_create_criminal_case_status_logs_table', 20),
(334, '2022_02_24_112509_create_labour_case_status_logs_table', 20),
(335, '2022_02_26_050811_create_quassi_judicial_case_status_logs_table', 20),
(336, '2022_02_26_075141_create_supreme_court_case_status_logs_table', 20),
(337, '2022_02_26_092935_create_high_court_case_status_logs_table', 20),
(338, '2022_02_26_103647_create_appellate_court_case_status_logs_table', 20),
(339, '2022_03_01_061808_create_setup_bill_types_table', 20),
(340, '2022_03_01_063826_create_setup_banks_table', 20),
(341, '2022_03_01_072242_create_setup_bank_branches_table', 20),
(342, '2022_03_01_093042_create_setup_digital_payments_table', 20),
(343, '2022_03_02_041449_create_case_billings_table', 20),
(344, '2022_03_03_100737_create_setup_thanas_table', 20),
(345, '2022_03_03_110811_create_setup_seller_buyers_table', 20),
(346, '2022_03_05_094634_create_land_information_table', 20),
(347, '2022_03_05_100641_create_land_information_files_table', 20),
(348, '2022_03_07_044224_create_flat_information_table', 20),
(349, '2022_03_07_051253_create_flat_information_files_table', 20),
(350, '2022_03_07_052042_create_setup_floors_table', 20),
(351, '2022_03_07_055414_create_setup_flat_numbers_table', 20),
(352, '2022_03_08_110826_create_regulatory_compliances_table', 20),
(353, '2022_03_09_070843_create_social_compliances_table', 20),
(354, '2022_03_13_104748_create_external_files_table', 20),
(355, '2022_03_16_063902_create_setup_supreme_court_categories_table', 21),
(357, '2022_03_16_085702_create_setup_supreme_court_subcategories_table', 22),
(358, '2022_03_20_090552_create_setup_court_classes_table', 23),
(359, '2022_03_20_092651_create_setup_case_classes_table', 24),
(360, '2022_03_20_093859_create_setup_sections_table', 25),
(365, '2022_02_17_114951_create_appellate_court_cases_table', 27),
(368, '2022_03_24_064203_create_setup_client_categories_table', 30),
(369, '2022_03_24_070908_create_setup_client_subcategories_table', 31),
(370, '2022_03_24_102157_create_setup_case_categories_table', 32),
(372, '2022_03_24_110935_create_setup_case_subcategories_table', 33),
(376, '2022_02_01_094805_create_civil_cases_table', 34),
(377, '2022_03_27_103111_create_setup_laws_table', 35),
(380, '2022_02_05_123938_create_criminal_cases_table', 36),
(383, '2022_02_17_104706_create_high_court_cases_table', 37);

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
  `trial_court` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `quassi_judicial_cases` (`id`, `case_no`, `date_of_case_received`, `case_category_nature_id`, `case_type_id`, `trial_court`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `police_station`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `relevant_law_sections_id`, `alligation_id`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `opposite_party_name`, `opposite_party_address`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `total_legal_bill_amount`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '654643', '2022-03-18', '2', 2, 'test', '7788965', 2, '2', 1, '654643', 2, 'Lalbagh', 2, '2022-03-31', 2, 2, 2, 2, '2454545', 'Aminur Rahman Smith Aminur', '01998744568', 2, 1, 1, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 3, 'test asdf', 2, '2022-04-06', '43 Phillip St, Sydney NSW 2000, Australia', '01998745638', 3, 'asdf', 2, 'asdf', 2, 'test21', 1, 1, 'test', 'test', 'test', '25600', 'test', 'test', 0, NULL, NULL, '2022-03-16 00:14:00', '2022-03-23 23:56:53'),
(2, '65464345', '2022-03-11', '1', 2, 'test', '7783223', 2, '1', 1, '65464345', 1, 'Lalbagh', 1, '2022-03-23', 3, 3, 2, 2, '2454545', 'Aminur Rahman Smith Aminur', '01998744563', 2, 1, 1, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 3, 2, 'Aminur Rahman Smith Aminur', 2, '2022-04-07', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 3, 'test1', 2, 'test2', 2, 'test21', 1, 1, 'test', 'test', 'test', '77600', 'test', 'test', 0, NULL, NULL, '2022-03-22 03:21:24', '2022-03-22 23:44:09');

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
(1, 1, '16474112404asdfasdf.pdf', 0, NULL, NULL, '2022-03-16 00:14:00', '2022-03-16 00:14:00'),
(2, 1, '16474112408byden.jpg', 0, NULL, NULL, '2022-03-16 00:14:00', '2022-03-16 00:14:00'),
(3, 2, '164794088468164509724711asdfasdf.pdf', 0, NULL, NULL, '2022-03-22 03:21:24', '2022-03-22 03:21:24'),
(4, 2, '16479408847116474282232164733878840byden.jpg', 0, NULL, NULL, '2022-03-22 03:21:24', '2022-03-22 03:21:24');

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
(1, 'Aminur Rahman Smith Aminur', 1, 'Aminur Rahman Smith Aminur', 'asdf', '2022-03-17', '2022-03-24', '2022-03-26', 'asdf updated', 'adsf updated', 'Aminur Rahman Smith Aminur', 'asdf', '2022-03-24', '2022-04-01', '2022-03-25', 'asdf updated', 'asdf updated', 'aaa', 'asdf', 'sewerage', 'test water', '2022-03-17', '2022-03-25', 0, NULL, NULL, '2022-03-16 05:18:50', '2022-03-16 05:18:50');

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
('pXuS4L0YajJlu1PXp6CesenZwaWs8TMCx5anmjo1', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZEV1TzNqS2pYaktCQTFrT1pYQUdrcFJIRWh1ZndRdGZ2dHZXSTBVcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjI6Imh0dHA6Ly9sb2NhbGhvc3QvZGxlZ2FsLXNvZnR3YXJlL3B1YmxpYy9hZG1pbi9oaWdoLWNvdXJ0LWNhc2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoicGFnZSI7czo5OiJkYXNoYm9hcmQiO30=', 1648467984);

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
(1, 'Dhakeshwari', 0, NULL, NULL, '2022-03-15 23:48:24', '2022-03-15 23:48:24'),
(2, 'Shahjahanpur', 0, NULL, NULL, '2022-03-15 23:48:29', '2022-03-15 23:48:46');

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
(1, 'Sonali Bank', 0, NULL, NULL, '2022-03-15 23:51:24', '2022-03-15 23:51:47'),
(2, 'Rupali Bank', 0, NULL, NULL, '2022-03-15 23:51:28', '2022-03-15 23:51:28'),
(3, 'Sonali Bank', 0, NULL, NULL, '2022-03-15 23:51:32', '2022-03-15 23:51:39');

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
(1, 1, 'Shahjahanpur', 1, NULL, NULL, '2022-03-15 23:51:59', '2022-03-15 23:52:17'),
(2, 2, 'Lalbag', 0, NULL, NULL, '2022-03-15 23:52:06', '2022-03-15 23:52:06');

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
(1, 'Panel Layer Payment', 0, NULL, NULL, '2022-03-15 23:50:28', '2022-03-15 23:50:28'),
(2, 'Miscellaneous', 0, NULL, NULL, '2022-03-15 23:50:33', '2022-03-15 23:50:33'),
(3, 'Panel Layer Payment', 0, NULL, NULL, '2022-03-15 23:50:37', '2022-03-15 23:50:42');

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
(1, 'Chalkbazar', 0, NULL, NULL, '2022-03-15 23:48:55', '2022-03-15 23:49:17'),
(2, 'Posta Branch', 1, NULL, NULL, '2022-03-15 23:49:00', '2022-03-15 23:49:15');

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
(1, 'High Court Division', 'Contempt Cases', 0, NULL, NULL, '2022-03-24 04:44:58', '2022-03-24 04:44:58'),
(2, 'Special Quassi - Judicial Cases', 'Contempt Cases', 0, NULL, NULL, '2022-03-24 04:45:21', '2022-03-24 04:59:30'),
(3, 'Appellate Court Division', 'Civil Cases', 0, NULL, NULL, '2022-03-24 04:59:58', '2022-03-24 05:00:09');

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
(1, 'test', 0, NULL, NULL, '2022-03-20 03:30:59', '2022-03-20 03:30:59'),
(2, 'test 2', 0, NULL, NULL, '2022-03-20 03:31:03', '2022-03-20 03:31:03'),
(3, 'test 3', 0, NULL, NULL, '2022-03-20 03:31:07', '2022-03-20 03:31:07'),
(5, 'test 5', 0, NULL, NULL, '2022-03-20 03:31:15', '2022-03-20 03:31:21');

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
(1, 'Active', 0, NULL, NULL, '2022-03-15 23:42:03', '2022-03-15 23:42:03'),
(2, 'Inactive', 0, NULL, NULL, '2022-03-15 23:42:07', '2022-03-15 23:42:07'),
(3, 'Ongoing', 0, NULL, NULL, '2022-03-15 23:42:18', '2022-03-15 23:42:25');

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
(1, 'High Court Division', 1, 'Financila Organizations', 0, NULL, NULL, '2022-03-24 05:54:11', '2022-03-24 05:54:11'),
(2, 'High Court Division', 1, 'Financila Organizations', 0, NULL, NULL, '2022-03-24 05:54:36', '2022-03-24 05:54:36'),
(3, 'Appellate Court Division', 3, 'test financial Cases', 0, NULL, NULL, '2022-03-24 05:54:58', '2022-03-24 06:01:07');

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
(1, 'Civil Case', 0, NULL, NULL, '2022-03-15 23:42:31', '2022-03-15 23:43:02'),
(2, 'Criminal Cases', 0, NULL, NULL, '2022-03-15 23:42:39', '2022-03-15 23:42:39');

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
(1, 'Individual', 0, NULL, NULL, '2022-03-24 01:44:40', '2022-03-24 01:44:40'),
(2, 'Organization', 0, NULL, NULL, '2022-03-24 01:44:54', '2022-03-24 01:44:54'),
(3, 'Company', 0, NULL, NULL, '2022-03-24 01:45:03', '2022-03-24 01:45:03'),
(4, 'Bank', 0, NULL, NULL, '2022-03-24 01:45:09', '2022-03-24 01:45:09'),
(5, 'NBF', 0, NULL, NULL, '2022-03-24 01:45:16', '2022-03-24 01:45:16');

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
(3, 2, 'WHO', 0, NULL, NULL, '2022-03-24 03:17:03', '2022-03-24 03:17:03'),
(4, 4, 'City Bank Limited', 0, NULL, NULL, '2022-03-24 03:17:20', '2022-03-24 03:17:20');

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
(1, 1, 'ASD Company', 'Smith', 1, 0, NULL, NULL, '2022-03-15 23:55:43', '2022-03-15 23:55:43'),
(2, 2, 'ABC Company', 'Stefen', 2, 0, NULL, NULL, '2022-03-15 23:55:52', '2022-03-15 23:56:01');

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
(1, 'Owened', 0, NULL, NULL, '2022-03-15 23:54:58', '2022-03-15 23:55:21'),
(2, 'Privates', 0, NULL, NULL, '2022-03-15 23:55:02', '2022-03-16 01:06:52');

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
(1, 'test 2 compliance', 0, NULL, NULL, '2022-03-15 23:56:26', '2022-03-15 23:56:47'),
(2, 'Test compliance', 0, NULL, NULL, '2022-03-15 23:56:30', '2022-03-15 23:56:39');

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
(1, '2', 'test', 0, NULL, NULL, '2022-03-15 23:56:56', '2022-03-16 01:31:47'),
(2, '2', 'rtyert', 0, NULL, NULL, '2022-03-15 23:57:04', '2022-03-15 23:57:36');

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
(1, 'Shadharghat', 0, NULL, NULL, '2022-03-15 23:43:12', '2022-03-15 23:43:29'),
(2, 'Court Kachari', 0, NULL, NULL, '2022-03-15 23:43:17', '2022-03-15 23:43:24');

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
(1, 'Case Hearings', 0, NULL, NULL, '2022-03-15 23:44:23', '2022-03-15 23:44:47'),
(2, 'Appelled', 0, NULL, NULL, '2022-03-15 23:44:32', '2022-03-15 23:44:32'),
(3, 'Hearing purpose', 0, NULL, NULL, '2022-03-15 23:44:41', '2022-03-15 23:44:41');

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
(1, 'Professor', 0, NULL, NULL, '2022-03-15 23:39:40', '2022-03-15 23:39:40'),
(2, 'Lawyers', 0, NULL, NULL, '2022-03-15 23:39:48', '2022-03-15 23:39:58');

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
(1, 'Bkash', 0, NULL, NULL, '2022-03-15 23:52:31', '2022-03-15 23:52:31'),
(2, 'Nagad', 0, NULL, NULL, '2022-03-15 23:52:36', '2022-03-15 23:52:36'),
(3, 'Rockets', 0, NULL, NULL, '2022-03-15 23:52:42', '2022-03-15 23:52:55');

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
(1, 2, 'werw', 1, NULL, NULL, '2022-03-15 23:58:02', '2022-03-15 23:59:10'),
(2, 2, 'werw', 0, NULL, NULL, '2022-03-15 23:58:08', '2022-03-15 23:58:48'),
(3, 3, 'Pirojpur', 0, NULL, NULL, '2022-03-15 23:58:17', '2022-03-15 23:58:17'),
(4, 1, 'Shahjalal Majhar', 0, NULL, NULL, '2022-03-15 23:59:06', '2022-03-15 23:59:06');

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
(1, 'Sylhet', 0, NULL, NULL, '2022-03-15 23:57:46', '2022-03-15 23:57:46'),
(2, 'Noakhali', 0, NULL, NULL, '2022-03-15 23:57:50', '2022-03-15 23:57:50'),
(3, 'Barishal', 0, NULL, NULL, '2022-03-15 23:57:54', '2022-03-15 23:57:54');

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
(1, 1, 'Jack', 'Smith', 'Aminur', 'asdf@adf', '01996321542', '01698774123', '01996321542', '01996321542', NULL, 0, NULL, NULL, '2022-03-15 23:38:01', '2022-03-15 23:38:11');

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
(1, 1, 2, 'Stefen', 'Smith', 'Aminur', 'asdf@adf', '01996321542', '01698774123', '01996321542', '01996321542', NULL, 0, NULL, NULL, '2022-03-15 23:38:36', '2022-03-15 23:38:56');

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
(1, 1, '164740911679asdfasdf.pdf', 0, NULL, NULL, '2022-03-15 23:38:36', '2022-03-15 23:38:36'),
(2, 1, '164740911675byden.jpg', 0, NULL, NULL, '2022-03-15 23:38:36', '2022-03-15 23:38:36');

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
(1, 1, '164740908182asdfasdf.pdf', 0, NULL, NULL, '2022-03-15 23:38:01', '2022-03-15 23:38:01'),
(2, 1, '164740908110byden.jpg', 0, NULL, NULL, '2022-03-15 23:38:01', '2022-03-15 23:38:01');

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
(1, 3, 'C1', 0, NULL, NULL, '2022-03-15 23:54:31', '2022-03-15 23:54:31'),
(2, 1, 'B1', 0, NULL, NULL, '2022-03-15 23:54:37', '2022-03-15 23:54:48'),
(3, 3, 'D1', 0, NULL, NULL, '2022-03-15 23:54:43', '2022-03-15 23:54:43');

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
(1, '1st', 0, NULL, NULL, '2022-03-15 23:53:45', '2022-03-15 23:54:06'),
(2, '2 nd', 0, NULL, NULL, '2022-03-15 23:53:49', '2022-03-15 23:54:20'),
(3, '3rd', 0, NULL, NULL, '2022-03-15 23:53:55', '2022-03-15 23:53:55');

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
(1, 1, 'Kibria', 'Smith', 'Aminur', 'asdf@adf', '01996321542', '01698774123', '01996321542', '01996321542', NULL, 0, NULL, NULL, '2022-03-15 23:39:21', '2022-03-15 23:39:34');

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
(1, 1, '164740916184asdfasdf.pdf', 0, NULL, NULL, '2022-03-15 23:39:21', '2022-03-15 23:39:21'),
(2, 1, '164740916188byden.jpg', 0, NULL, NULL, '2022-03-15 23:39:21', '2022-03-15 23:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `setup_laws`
--

CREATE TABLE `setup_laws` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `setup_laws` (`id`, `law_name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, NULL, NULL, '2022-03-27 04:39:32', '2022-03-27 04:41:09'),
(2, 'test 2', 0, NULL, NULL, '2022-03-27 04:40:00', '2022-03-27 04:40:56');

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
(1, 'Section 32', 0, NULL, NULL, '2022-03-15 23:57:11', '2022-03-16 01:07:18'),
(2, 'Section 12', 0, NULL, NULL, '2022-03-15 23:57:15', '2022-03-15 23:57:15');

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
(1, 'Appeared', 0, NULL, NULL, '2022-03-15 23:43:40', '2022-03-15 23:43:40'),
(2, 'Appeals', 1, NULL, NULL, '2022-03-15 23:43:45', '2022-03-15 23:43:59'),
(3, 'Appealed', 0, NULL, NULL, '2022-03-15 23:43:51', '2022-03-15 23:43:51');

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
(1, 'Professors', 0, NULL, NULL, '2022-03-15 23:37:10', '2022-03-15 23:37:32'),
(2, 'Dr.', 0, NULL, NULL, '2022-03-15 23:37:16', '2022-03-15 23:37:16'),
(3, 'Mr.', 0, NULL, NULL, '2022-03-15 23:37:22', '2022-03-15 23:37:22'),
(4, 'werewr asdf', 1, NULL, NULL, '2022-03-24 03:49:36', '2022-03-24 03:49:54');

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
(1, 'Additional Program', 0, NULL, NULL, '2022-03-15 23:49:27', '2022-03-15 23:49:27'),
(2, 'Optional Program', 0, NULL, NULL, '2022-03-15 23:49:34', '2022-03-15 23:49:46');

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
(1, 'Private Property', 0, NULL, NULL, '2022-03-15 23:56:07', '2022-03-15 23:56:19'),
(2, 'Owened', 0, NULL, NULL, '2022-03-15 23:56:11', '2022-03-15 23:56:11');

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
(1, 'Lalbag', 0, NULL, NULL, '2022-03-15 23:46:36', '2022-03-15 23:48:15'),
(2, 'Shantinagar', 0, NULL, NULL, '2022-03-15 23:48:01', '2022-03-15 23:48:01');

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
(4, '44', 0, NULL, NULL, '2022-03-20 03:46:00', '2022-03-20 03:46:00');

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
(1, 1, 'Buyer', 'Stefen Hokings', 'asdf@adf', '01996321542', '01698774123', '01996321542', NULL, '43 Phillip St, Sydney NSW 2000, Australia', 'test', '16474099990byden.jpg', 0, NULL, NULL, '2022-03-15 23:53:19', '2022-03-15 23:53:38'),
(2, 2, 'Seller', 'Aminur Rahman Smith Aminur', 'asdf@adf', '01996321542', '01698774123', '01887669542', NULL, '43 Phillip St, Sydney NSW 2000, Australia', 'test', '16474285171164725962475john.jpg', 0, NULL, NULL, '2022-03-16 05:01:57', '2022-03-16 05:01:57');

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
(6, 'High Court Division', 'Contempt Cases', 0, NULL, NULL, '2022-03-20 05:55:15', '2022-03-20 05:55:15');

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
(1, 3, 'Kawkhali', 0, NULL, NULL, '2022-03-15 23:59:32', '2022-03-27 22:58:48'),
(2, 3, 'Bhandaria', 0, NULL, NULL, '2022-03-15 23:59:39', '2022-03-15 23:59:52');

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
(1, 'test updated', 'test updated', 'test aaaaaaaa', 'asdf', 'asdf', 'asdf', 'test', 'test', 'asdf', 'asdf', 'asdf', 'asdf updated', 'asdf d', 0, NULL, NULL, '2022-03-16 05:19:36', '2022-03-16 05:43:04');

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
  `trial_court` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `supreme_court_cases` (`id`, `case_no`, `date_of_case_received`, `case_category_nature_id`, `case_type_id`, `trial_court`, `subsequent_case_no`, `zone_id`, `area_id`, `branch_id`, `member_no`, `program_id`, `police_station`, `name_of_the_court_id`, `date_of_filing`, `division_id`, `district_id`, `relevant_law_sections_id`, `alligation_id`, `amount`, `name_of_the_complainant`, `complainant_contact_no`, `complainant_designation_id`, `external_council_name_id`, `external_council_associates_id`, `opposite_party_name`, `opposite_party_address`, `case_status_id`, `last_order_court_id`, `accused_name`, `accused_company_id`, `next_date`, `accused_address`, `accused_contact_no`, `next_date_fixed_id`, `plaintiff_name`, `plaintiff_designaiton_id`, `plaintiff_contact_number`, `company_id`, `case_notes`, `panel_lawyer_id`, `assigned_lawyer_id`, `other_claim`, `summary_facts_alligation`, `prayer_claims_by_psg`, `total_legal_bill_amount`, `missing_documents_evidence`, `comments`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '65464321313', '2022-03-18', '2', 2, 'test', '7788965', 1, '1', 1, '546464', 1, 'Lalbagh', 2, '2022-03-23', 2, 2, 2, 1, '35000', 'Aminur Rahman Smith Aminur', '01998744568', 2, 1, 1, 'Aminur Rahman Smith Aminur', '43 Phillip St, Sydney NSW 2000, Australia', 2, 2, 'Aminur Rahman Smith Aminur', 2, '2022-03-07', '43 Phillip St, Sydney NSW 2000, Australia', '01998745632', 3, 'asdf', 1, '01456698785', 1, 'test21', 1, 1, 'testr', 'test', 'test', '97600', 'test', 'test', 0, NULL, NULL, '2022-03-16 04:52:00', '2022-03-16 04:55:08');

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
(1, 1, '164742792070164664984298Ethnicity.png', 0, NULL, NULL, '2022-03-16 04:52:00', '2022-03-16 04:52:00'),
(2, 1, '164742792040164664984221asdfasdf.pdf', 0, NULL, NULL, '2022-03-16 04:52:00', '2022-03-16 04:52:00');

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
-- Indexes for table `setup_case_types`
--
ALTER TABLE `setup_case_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_client_categories`
--
ALTER TABLE `setup_client_categories`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appellate_court_cases`
--
ALTER TABLE `appellate_court_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appellate_court_cases_files`
--
ALTER TABLE `appellate_court_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `appellate_court_case_status_logs`
--
ALTER TABLE `appellate_court_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_billings`
--
ALTER TABLE `case_billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `civil_cases`
--
ALTER TABLE `civil_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `civil_cases_files`
--
ALTER TABLE `civil_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `civil_case_status_logs`
--
ALTER TABLE `civil_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `criminal_cases`
--
ALTER TABLE `criminal_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `criminal_cases_files`
--
ALTER TABLE `criminal_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `criminal_case_status_logs`
--
ALTER TABLE `criminal_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `external_files`
--
ALTER TABLE `external_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flat_information`
--
ALTER TABLE `flat_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flat_information_files`
--
ALTER TABLE `flat_information_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `high_court_cases`
--
ALTER TABLE `high_court_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `high_court_cases_files`
--
ALTER TABLE `high_court_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `high_court_case_status_logs`
--
ALTER TABLE `high_court_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labour_cases`
--
ALTER TABLE `labour_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labour_cases_files`
--
ALTER TABLE `labour_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labour_case_status_logs`
--
ALTER TABLE `labour_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `land_information`
--
ALTER TABLE `land_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `land_information_files`
--
ALTER TABLE `land_information_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quassi_judicial_case_status_logs`
--
ALTER TABLE `quassi_judicial_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regulatory_compliances`
--
ALTER TABLE `regulatory_compliances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_areas`
--
ALTER TABLE `setup_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_banks`
--
ALTER TABLE `setup_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_bank_branches`
--
ALTER TABLE `setup_bank_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `setup_case_categories`
--
ALTER TABLE `setup_case_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_case_classes`
--
ALTER TABLE `setup_case_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_case_statuses`
--
ALTER TABLE `setup_case_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_case_subcategories`
--
ALTER TABLE `setup_case_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_case_types`
--
ALTER TABLE `setup_case_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_client_categories`
--
ALTER TABLE `setup_client_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_client_subcategories`
--
ALTER TABLE `setup_client_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_companies`
--
ALTER TABLE `setup_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_company_types`
--
ALTER TABLE `setup_company_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_compliance_categories`
--
ALTER TABLE `setup_compliance_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_compliance_types`
--
ALTER TABLE `setup_compliance_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_courts`
--
ALTER TABLE `setup_courts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_court_classes`
--
ALTER TABLE `setup_court_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setup_court_last_orders`
--
ALTER TABLE `setup_court_last_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_divisions`
--
ALTER TABLE `setup_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_external_councils`
--
ALTER TABLE `setup_external_councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_external_council_associates`
--
ALTER TABLE `setup_external_council_associates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_floors`
--
ALTER TABLE `setup_floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_internal_councils`
--
ALTER TABLE `setup_internal_councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_internal_council_files`
--
ALTER TABLE `setup_internal_council_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_laws`
--
ALTER TABLE `setup_laws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_law_sections`
--
ALTER TABLE `setup_law_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_next_date_reasons`
--
ALTER TABLE `setup_next_date_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_person_titles`
--
ALTER TABLE `setup_person_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_programs`
--
ALTER TABLE `setup_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_property_types`
--
ALTER TABLE `setup_property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_regions`
--
ALTER TABLE `setup_regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_sections`
--
ALTER TABLE `setup_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_seller_buyers`
--
ALTER TABLE `setup_seller_buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_supreme_court_categories`
--
ALTER TABLE `setup_supreme_court_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setup_supreme_court_subcategories`
--
ALTER TABLE `setup_supreme_court_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_thanas`
--
ALTER TABLE `setup_thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_compliances`
--
ALTER TABLE `social_compliances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supreme_court_cases`
--
ALTER TABLE `supreme_court_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supreme_court_cases_files`
--
ALTER TABLE `supreme_court_cases_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supreme_court_case_status_logs`
--
ALTER TABLE `supreme_court_case_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
