-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 11:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gjob38db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `banner`, `mission`, `goal`, `value`, `email`, `phone`, `address`, `social`, `operating`, `created_at`, `updated_at`) VALUES
(1, '1643966758.jpg', 'Autem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fuAutem enim cum ut fu', 'Voluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eoVoluptates labore eo', 'Iure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur distiIure excepteur disti', 'bipogeli@mailinator.com', '+1 (999) 588-3434', 'Cillum soluta harum', 'Rerum labore Nam vol', 'Eligendi suscipit do', '2022-02-04 02:25:58', '2022-02-04 02:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_profile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`id`, `uid`, `company`, `logo`, `industry`, `number_staff`, `website`, `company_profile`, `province`, `detail_location`, `contact_name`, `contact_position`, `contact_email`, `contact_phone`, `created_at`, `updated_at`) VALUES
(1, 2, 'Church and Nielsen Associates', '1643966173.png', 'Advertising/Media/Publishing/Printing', '88', 'https://www.widufiho.mobi', 'In sed vel in et nis\r\nIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nisIn sed vel in et nis', 'Ut impedit numquam', 'Saepe quos consectet', 'Eagan Lewis', 'Quas voluptas incidu', 'zywem@mailinator.com', '+1 (343) 574-3037', '2022-02-04 02:16:13', '2022-02-04 02:16:13'),
(2, 1, 'Camjobs38 Knox Yates Plc', '1643966307.png', 'Medical/Pharmaceutical', '10', 'https://www.horebuhu.org.uk', 'Qui est et officiis \r\nQui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis Qui est et officiis', 'Ut excepteur quia ra', 'Sint dolor veniam', 'Erich Wilkins', 'Tempor animi sit qu', 'qytefenu@mailinator.com', '+1 (796) 436-8901', '2022-02-04 02:18:27', '2022-02-04 02:18:27'),
(3, 4, 'Spears Mcfarland Inc', '1643966420.png', 'Food & Beverages', '244', 'https://www.quxafuzo.me.uk', 'Company Profile\r\nModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferenModi qui in perferen', 'Libero quasi tempore', 'Dolorum eum magna in', 'Jesse Ayala', 'Hic porro maiores mo', 'cezewegybi@mailinator.com', '+1 (879) 458-1735', '2022-02-04 02:20:20', '2022-02-04 02:20:20'),
(4, 5, 'Edwards Kerr Inc', '1643966499.png', 'Stationery/Books/Toys', '203', 'https://www.terogidojoluguj.ws', 'Et ex sed modi ipsa', 'Facilis quibusdam cu', 'A quia ratione aliqu', 'Jillian Ingram', 'Reprehenderit iste', 'silugit@mailinator.com', '+1 (717) 716-3221', '2022-02-04 02:21:39', '2022-02-04 02:21:39');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_job` date DEFAULT NULL,
  `expired_post` date DEFAULT NULL,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hiring` tinyint(4) DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_exp` tinyint(4) DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `uid`, `approved`, `title`, `age`, `contact`, `expired_job`, `expired_post`, `function`, `hiring`, `industry`, `language`, `location`, `qualification`, `salary`, `sex`, `term`, `year_of_exp`, `detail`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'IT', 'Placeat est est v', 'Amet id ex rerum do', '2022-03-12', '2022-03-12', 'Medical/Health/Nursing', 5, 'NGO/Charity/Social Services', 'Placeat amet iste', 'Banteay Meanchey', 'Voluptate do dolorem', '$200-$500', 'Et esse iste reprehe', 'Dolor accusamus et v', 1, 'Sed voluptatem autem', '2022-02-04 02:16:29', '2022-02-04 02:19:43'),
(2, 2, 1, 'Programmer', 'Et aut mollit qui vo', 'Sunt dolore facilis', '2022-02-08', '2022-02-08', 'Others', 1, 'Hotel/Hospitality', 'Rerum accusantium an', 'Preah Sihanouk', 'Pariatur Accusantiu', '<$200', 'Et facere eaque alia', 'Fugiat est enim com', 1, 'Ullamco sunt quia ex', '2022-02-04 02:16:54', '2022-02-04 02:19:42'),
(3, 2, 1, 'Networking', 'Sunt soluta velit il', 'Quidem rerum sed asp', '2022-02-10', '2022-02-10', 'Customer Service', 5, 'Electronics/Electrical/Mechanical Equipment', 'Illum distinctio E', 'Prey Veng', 'Adipisicing ea modi', 'Negotiable', 'Dolorem totam esse t', 'Voluptate nihil aut', 1, 'Exercitationem ea eu', '2022-02-04 02:17:14', '2022-02-04 02:19:42'),
(4, 1, 1, 'Account Manager', 'Perspiciatis offici', 'Officia tempora temp', '2022-02-07', '2022-02-07', 'Logistics/Shipping/Deliver/Warehouse', 1, 'Advisory/Consultancy', 'Cupidatat cum quo pr', 'Kratié', 'Dolor quod doloremqu', '>$6000', 'Veniam non fugiat', 'Pariatur Nisi ea ad', 5, 'Voluptatem Neque te', '2022-02-04 02:18:54', '2022-02-04 02:18:54'),
(5, 1, 1, 'Purchasing Officer', 'Laudantium dolor ei', 'Delectus distinctio', '2022-03-12', '2022-03-12', 'Design', 1, 'Civil Services', 'Eum duis sint minim', 'Preah Sihanouk', 'Magnam ut ipsum cup', '<$200', 'Explicabo Obcaecati', 'Natus numquam pariat', 1, 'Qui in voluptatem e', '2022-02-04 02:19:18', '2022-02-04 02:19:18'),
(6, 1, 1, 'Tax Controller', 'In omnis omnis est o', 'Sit velit ad adipisi', '2022-02-19', '2022-02-19', 'Sales', 5, 'Health/Personal Care', 'At distinctio Minus', 'Kratié', 'Aperiam accusantium', '>$6000', 'Et culpa eligendi do', 'Est ut fugit dolor', 2, 'Id officia placeat', '2022-02-04 02:19:39', '2022-02-04 02:19:39'),
(7, 4, 1, 'Administrator', 'Distinctio Qui dict', 'Expedita rerum dolor', '2022-03-05', '2022-03-05', 'Cook/Cleaner/Maid', 1, 'Civil Services', 'Ipsam inventore quo', 'Preah Sihanouk', 'Ea optio voluptas a', '>$2000', 'Maxime rerum quis qu', 'Cillum proident ali', 5, 'Iure fuga Provident', '2022-02-04 02:20:43', '2022-02-04 02:22:52'),
(8, 4, 1, 'Minim non accusamus', 'Magnam molestiae qui', 'Voluptate natus recu', '2022-03-12', '2022-02-26', 'Driver/Security', 2, 'Information Technology', 'Earum et saepe culpa', 'Oddar Meanchey', 'Error voluptas volup', 'Negotiable', 'Iusto et quas dolori', 'Totam voluptatem Es', 2, 'Tempora quas possimu', '2022-02-04 02:21:01', '2022-02-04 02:22:52'),
(9, 4, 1, 'Dolorem aut quaerat', 'Atque error velit oc', 'Eveniet vitae deser', '2022-03-12', '2022-03-12', 'Education/Training', 1, 'Telecommunication', 'Aliquip aspernatur m', 'Kampong Cham', 'Nihil hic error et s', '$200-$500', 'Ut illum dolor odit', 'A reprehenderit aut', 1, 'Hic voluptatem iste', '2022-02-04 02:21:15', '2022-02-04 02:22:52'),
(10, 5, 1, 'Qui vitae non iste s', 'Voluptatem fugiat a', 'Eu voluptate aut ut', '2022-02-06', '2022-02-06', 'Education/Training', 1, 'Chemical/Plastic/Paper/Petrochemical', 'Minus deserunt iste', 'Mondulkiri', 'Quia quia repellendu', '<$200', 'Explicabo Sed maxim', 'Quidem ipsum ea sunt', 1, 'Porro dolorum evenie', '2022-02-04 02:21:53', '2022-02-04 02:22:53'),
(11, 5, 1, 'Exercitationem ut om', 'Exercitationem quia', 'Quo dolorum proident', '2022-02-11', '2022-02-11', 'Human Resource', 2, 'Government', 'Quidem nulla facere', 'Battambang', 'Neque non commodo al', '$200-$500', 'Eu et possimus ipsu', 'Dignissimos magna ip', 2, 'Ex quasi earum dolor', '2022-02-04 02:22:06', '2022-02-04 02:22:58'),
(12, 5, 1, 'Error laudantium ob', 'Voluptatum atque cum', 'Aperiam eum modi et', '2022-02-08', '2022-02-09', 'Driver/Security', 1, 'Agriculture/Foresty/Fishing', 'Duis commodo omnis a', 'Siem Reap', 'Qui velit repudianda', '>$2000', 'Ducimus necessitati', 'Dolorum eum accusamu', 1, 'Quidem magnam enim l', '2022-02-04 02:22:21', '2022-02-04 02:22:58'),
(13, 5, 1, 'Sunt voluptates qui', 'Velit in neque libe', 'Suscipit nesciunt d', '2022-03-12', '2022-03-12', 'Merchandising/Purchasing', 1, 'Performance/Musical/Artistic', 'Dolorum quia quidem', 'Stung Treng', 'Hic commodi perferen', 'Negotiable', 'Et ut et fuga In qu', 'Et autem dolor possi', 1, 'Nulla aperiam sed co', '2022-02-04 02:22:33', '2022-02-04 02:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `job_functions`
--

CREATE TABLE `job_functions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_functions`
--

INSERT INTO `job_functions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting', NULL, NULL),
(2, 'Administration', NULL, NULL),
(3, 'Architecture/Engineering', NULL, NULL),
(4, 'Assistant/Secretary', NULL, NULL),
(5, 'Audit/Taxation', NULL, NULL),
(6, 'Bank/Insurance', NULL, NULL),
(7, 'Cashier/Receptionist', NULL, NULL),
(8, 'Catering/Restaurant', NULL, NULL),
(9, 'Consultancy', NULL, NULL),
(10, 'Cook/Cleaner/Maid', NULL, NULL),
(11, 'Customer Service', NULL, NULL),
(12, 'Design', NULL, NULL),
(13, 'Driver/Security', NULL, NULL),
(14, 'Education/Training', NULL, NULL),
(15, 'Finance', NULL, NULL),
(16, 'Hotel/Hospitality', NULL, NULL),
(17, 'Human Resource', NULL, NULL),
(18, 'IT', NULL, NULL),
(19, 'Lawyer/Legal Service', NULL, NULL),
(20, 'Logistics/Shipping/Deliver/Warehouse', NULL, NULL),
(21, 'Management', NULL, NULL),
(22, 'Manufacturing', NULL, NULL),
(23, 'Marketing', NULL, NULL),
(24, 'Media/Advertising', NULL, NULL),
(25, 'Medical/Health/Nursing', NULL, NULL),
(26, 'Merchandising/Purchasing', NULL, NULL),
(27, 'Operation/Production', NULL, NULL),
(28, 'Others', NULL, NULL),
(29, 'Project Management', NULL, NULL),
(30, 'QC/QA', NULL, NULL),
(31, 'Resort/Casino', NULL, NULL),
(32, 'Sales', NULL, NULL),
(33, 'Technician/Maintenance', NULL, NULL),
(34, 'Telecommunication', NULL, NULL),
(35, 'Translation/Interpretation', NULL, NULL),
(36, 'Travel Agent/Ticket Sales', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_industries`
--

CREATE TABLE `job_industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_industries`
--

INSERT INTO `job_industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting/Audit/Tax Services', NULL, NULL),
(2, 'Advertising/Media/Publishing/Printing', NULL, NULL),
(3, 'Advisory/Consultancy', NULL, NULL),
(4, 'Agriculture/Foresty/Fishing', NULL, NULL),
(5, 'Airline', NULL, NULL),
(6, 'Architecture/Building/Construction', NULL, NULL),
(7, 'Automotive - Vehicle', NULL, NULL),
(8, 'Banking & Finance', NULL, NULL),
(9, 'Catering', NULL, NULL),
(10, 'Chemical/Plastic/Paper/Petrochemical', NULL, NULL),
(11, 'Civil Services', NULL, NULL),
(12, 'Clothing/Garment/Textile', NULL, NULL),
(13, 'Cosmetics & Beauty', NULL, NULL),
(14, 'Education', NULL, NULL),
(15, 'Electronics/Electrical/Mechanical Equipment', NULL, NULL),
(16, 'Energy/Power/Water/Oil & Gas', NULL, NULL),
(17, 'Engineering', NULL, NULL),
(18, 'Entertainment', NULL, NULL),
(19, 'Food & Beverages', NULL, NULL),
(20, 'General Business Services', NULL, NULL),
(21, 'Government', NULL, NULL),
(22, 'Health/Personal Care', NULL, NULL),
(23, 'Hotel/Hospitality', NULL, NULL),
(24, 'Human Resource', NULL, NULL),
(25, 'Industrial Machinery/Automation Equipment', NULL, NULL),
(26, 'Information Technology', NULL, NULL),
(27, 'Insurance', NULL, NULL),
(28, 'Jewellery/Gems/Watches', NULL, NULL),
(29, 'Legal Services', NULL, NULL),
(30, 'Logistics/Freight/Shipping/Delivery/Warehouse', NULL, NULL),
(31, 'Manufacturing', NULL, NULL),
(32, 'Medical/Pharmaceutical', NULL, NULL),
(33, 'NGO/Charity/Social Services', NULL, NULL),
(34, 'Others', NULL, NULL),
(35, 'Packaging', NULL, NULL),
(36, 'Performance/Musical/Artistic', NULL, NULL),
(37, 'Property Development/Management', NULL, NULL),
(38, 'Real Estate', NULL, NULL),
(39, 'Real Estate Leasing/Acquisition', NULL, NULL),
(40, 'Recruiting Services', NULL, NULL),
(41, 'Security/Fire/Electronic Access Controls', NULL, NULL),
(42, 'Sports & Recreation', NULL, NULL),
(43, 'Stationery/Books/Toys', NULL, NULL),
(44, 'Telecommunication', NULL, NULL),
(45, 'Tourism', NULL, NULL),
(46, 'Trading', NULL, NULL),
(47, 'Vehicle Repair & Maintenance', NULL, NULL),
(48, 'Wholesale/Retail', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE `job_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Banteay Meanchey', NULL, NULL),
(2, 'Battambang', NULL, NULL),
(3, 'Kampong Cham', NULL, NULL),
(4, 'Kampong Chhnang', NULL, NULL),
(5, 'Kampong Speu', NULL, NULL),
(6, 'Kampong Thom', NULL, NULL),
(7, 'Kampot', NULL, NULL),
(8, 'Kandal', NULL, NULL),
(9, 'Koh Kong', NULL, NULL),
(10, 'Kratié', NULL, NULL),
(11, 'Mondulkiri', NULL, NULL),
(12, 'Phnom Penh', NULL, NULL),
(13, 'Preah Vihear', NULL, NULL),
(14, 'Prey Veng', NULL, NULL),
(15, 'Pursat', NULL, NULL),
(16, 'Ratanak Kiri', NULL, NULL),
(17, 'Siem Reap', NULL, NULL),
(18, 'Preah Sihanouk', NULL, NULL),
(19, 'Stung Treng', NULL, NULL),
(20, 'Svay Rieng', NULL, NULL),
(21, 'Takéo', NULL, NULL),
(22, 'Oddar Meanchey', NULL, NULL),
(23, 'Kep', NULL, NULL),
(24, 'Pailin', NULL, NULL),
(25, 'Tboung Khmum', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_salaries`
--

CREATE TABLE `job_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_salaries`
--

INSERT INTO `job_salaries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Negotiable', NULL, NULL),
(2, '<$200', NULL, NULL),
(3, '$200-$500', NULL, NULL),
(4, '$500-$999', NULL, NULL),
(5, '$1000-$2000', NULL, NULL),
(6, '>$2000', NULL, NULL),
(7, '>$6000', NULL, NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_13_064306_create_usergroups_table', 1),
(6, '2022_01_15_063918_create_jobs_table', 1),
(7, '2022_01_17_065749_create_company_infos_table', 1),
(8, '2022_01_17_072909_create_job_functions_table', 1),
(9, '2022_01_17_072934_create_job_industries_table', 1),
(10, '2022_01_17_072952_create_job_locations_table', 1),
(11, '2022_01_17_073014_create_job_salaries_table', 1),
(12, '2022_01_24_022030_create_abouts_table', 1);

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
-- Table structure for table `usergroups`
--

CREATE TABLE `usergroups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usergroups`
--

INSERT INTO `usergroups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Agency', NULL, NULL),
(3, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gid` bigint(20) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `gid`, `fname`, `gname`, `username`, `phone`, `password`, `visible`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quentin Hull', 'Madaline Shaffer', 'admin', '+1 (472) 278-3122', '$2y$10$KwIyad6wHAfGV8OMhoNhPe/wH5bfA24S9Yl1maDzDYGlfLIGnRqAi', 1, NULL, '2022-02-04 02:14:54', '2022-02-04 02:14:54'),
(2, 2, 'Molly Stanton', 'Colt Kelly', 'agency', '+1 (398) 692-1025', '$2y$10$UGGsCTpvu8mmTD4ATcoWbOg.RRQmSWn1wEpqEpol16LI0UWOwRtpK', 1, NULL, '2022-02-04 02:15:24', '2022-02-04 02:15:24'),
(3, 3, 'Elijah Bush', 'Ezekiel Kidd', 'user', '+1 (848) 951-3907', '$2y$10$TGeIWp84ihxIh5aVFta1KOI0tL3/lXQI8sZ5YP9ZzkfgEM00Se7oK', 1, NULL, '2022-02-04 02:17:27', '2022-02-04 02:17:27'),
(4, 2, 'Quinlan Santana', 'Montana Conrad', 'wotohagino', '+1 (382) 386-1279', '$2y$10$84kI7iQE1UzCRtXO/RYXU.3wLtWVScvO4.ilcgpN/8dpl4ICNv3be', 1, NULL, '2022-02-04 02:19:54', '2022-02-04 02:19:54'),
(5, 2, 'Halee Mcleod', 'Faith Foster', 'muhixe', '+1 (113) 426-6426', '$2y$10$QbP0XY3YDQCMkcErbQmivOw63W3rT1H7Vtb4ZsOmiSOaotS9F2/ZK', 1, NULL, '2022-02-04 02:21:23', '2022-02-04 02:21:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_infos_uid_foreign` (`uid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_uid_foreign` (`uid`);

--
-- Indexes for table `job_functions`
--
ALTER TABLE `job_functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_industries`
--
ALTER TABLE `job_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_salaries`
--
ALTER TABLE `job_salaries`
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
-- Indexes for table `usergroups`
--
ALTER TABLE `usergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_functions`
--
ALTER TABLE `job_functions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `job_industries`
--
ALTER TABLE `job_industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `job_locations`
--
ALTER TABLE `job_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `job_salaries`
--
ALTER TABLE `job_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usergroups`
--
ALTER TABLE `usergroups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD CONSTRAINT `company_infos_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
