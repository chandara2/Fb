-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 11:56 AM
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
(1, '1644314857.jpg', 'Et accusamus rerum q', 'Consequatur Exercit', 'Repudiandae eum sit', 'potisuhyw@mailinator.com', '+1 (405) 903-2162', 'Veniam neque amet', 'In debitis ut mollit', 'Officia expedita acc', '2022-02-08 03:07:37', '2022-02-08 03:07:37');

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
(1, 1, 'Administrator', '1644311478.png', 'Catering', '410', 'https://www.vote.org.uk', 'Esse laborum Dicta', 'Labore enim illo ver', 'Ad placeat eu quia', 'Luke Spence', 'Occaecat qui est ali', 'caxewe@mailinator.com', '+1 (453) 231-1646', '2022-02-08 02:11:18', '2022-02-08 02:11:18'),
(2, 2, 'Job Hiring', '1644311737.png', 'Vehicle Repair Maintenance', '774', 'https://www.lexenugico.info', 'Elit est aut nisi', 'Accusamus similique', 'Sit Nam enim vitae e', 'September Brewer', 'Rem ea anim id moles', 'pofukogy@mailinator.com', '+1 (191) 393-3324', '2022-02-08 02:15:37', '2022-02-08 02:15:37'),
(3, 3, 'Craig Diaz Traders', '1644403096.png', 'Government', '20', 'https://www.pivew.cm', 'Voluptatem cupiditat', 'Est consequatur Et', 'Repellendus Volupta', 'Isadora Sanford', 'Laboris in fugiat eu', 'fizido@mailinator.com', '+1 (767) 641-8314', '2022-02-09 03:38:16', '2022-02-09 03:38:16'),
(4, 4, 'Frye Stephenson Co', '1644479963.png', 'Advisory Consultancy', '349', 'https://www.jewalep.co', 'Tempore velit duci', 'Rerum mollitia ex vo', 'Pariatur Incididunt', 'Olga Vincent', 'In in corporis debit', 'nawydukal@mailinator.com', '+1 (345) 271-4286', '2022-02-10 00:59:23', '2022-02-10 00:59:23'),
(5, 5, 'Christensen and Stephenson Co', '1644484760.png', 'Chemical Plastic Paper Petrochemical', '989', 'https://www.cypime.org.uk', 'Asperiores elit eli', 'Deserunt magna ut es', 'Minus tempore sit q', 'Alfreda Henry', 'Minima qui et at dol', 'goqow@mailinator.com', '+1 (269) 693-2595', '2022-02-10 02:19:20', '2022-02-10 02:19:20'),
(6, 6, 'Griffin and Daugherty Trading', '1644485856.png', 'Engineering', '905', 'https://www.how.ws', 'Occaecat harum eu se', 'Quis vel maiores mol', 'Aut magni rerum volu', 'Lydia Schmidt', 'Voluptas consequat', 'widuji@mailinator.com', '+1 (655) 257-9238', '2022-02-10 02:37:36', '2022-02-10 02:37:36');

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
(1, 1, 1, 'Admin1', 'Nisi qui consectetur', 'Tempor sint velit od', '2022-03-12', '2022-03-12', 'Marketing', 1, 'Accounting Audit Tax Services', 'Voluptatum perspicia', 'Kratié', 'Iure quasi neque nis', '>$2000', 'Et sunt aut nobis d', 'Sed proident volupt', 1, 'Omnis nesciunt mole', '2022-02-08 02:11:45', '2022-02-08 02:11:45'),
(2, 1, 1, 'Admin2', 'Quia aliquip et sit', 'Ut sunt harum omnis', '2022-03-12', '2022-03-12', 'Administration', 1, 'Real Estate', 'Eos in nisi sapient', 'Siem Reap', 'Est molestiae except', 'Negotiable', 'Sed et maxime vero s', 'Architecto numquam r', 1, 'Quia voluptate ullam', '2022-02-08 02:12:56', '2022-02-08 02:12:56'),
(3, 1, 1, 'Admin3', 'Cupidatat veritatis', 'Soluta labore dolore', '2022-03-12', '2022-03-12', 'Administration', 1, 'Telecommunication', 'Ea odit dolores magn', 'Preah Sihanouk', 'Saepe excepteur aspe', 'Negotiable', 'Necessitatibus volup', 'Et lorem nisi offici', 1, 'Error nihil omnis la', '2022-02-08 02:13:14', '2022-02-08 02:13:14'),
(4, 1, 1, 'Admin4', 'Dolorem cum labore m', 'Quaerat nihil magna', '2022-03-12', '2022-03-12', 'Resort Casino', 1, 'Accounting Audit Tax Services', 'Eveniet quo volupta', 'Koh Kong', 'Vitae officiis illum', '$200-$500', 'Incididunt officia q', 'Veniam aut architec', 1, 'Expedita eum aut adi', '2022-02-08 02:13:37', '2022-02-08 02:13:37'),
(5, 1, 1, 'Admin5', 'Sint enim repellendu', 'Voluptatem voluptat', '2022-03-12', '2022-03-12', 'Logistics Shipping Deliver Warehouse', 1, 'Accounting Audit Tax Services', 'Dolore officia susci', 'Stung Treng', 'Dolorem voluptatibus', '$500-$999', 'Dolore est sunt qui', 'Accusamus laborum Q', 1, 'Voluptas ut eius dol', '2022-02-08 02:13:57', '2022-02-08 02:13:57'),
(6, 1, 1, 'Admin6', 'Nam ex dolor eum rep', 'Aut corporis est vol', '2022-03-12', '2022-03-12', 'Project Management', 1, 'Energy Power Water Oil Gas', 'Provident nostrum a', 'Banteay Meanchey', 'Blanditiis perferend', '$1000-$2000', 'Laborum Voluptatibu', 'Aute consectetur si', 1, 'Ullamco debitis null', '2022-02-08 02:14:14', '2022-02-08 02:14:14'),
(7, 1, 1, 'Admin7', 'Voluptatem eveniet', 'Aut voluptatem Eu a', '2022-02-14', '2022-02-14', 'Management', 1, 'Recruiting Services', 'Et in aut consequatu', 'Banteay Meanchey', 'Atque quod possimus', '>$2000', 'In aute omnis volupt', 'Ut incididunt volupt', 1, 'A exercitationem ess', '2022-02-08 02:14:31', '2022-02-08 02:14:31'),
(8, 2, 1, 'Agency1', 'Dolor id occaecat qu', 'Ad amet vitae vel v', '2022-03-12', '2022-03-12', 'Education Training', 1, 'Wholesale Retail', 'Omnis vitae id non l', 'Stung Treng', 'In unde officiis sit', '$1000-$2000', 'Error rerum at enim', 'Possimus suscipit d', 1, 'Quae porro eum quia', '2022-02-08 02:16:00', '2022-02-08 02:18:17'),
(9, 2, 1, 'Agency2', 'Et a omnis reiciendi', 'Officiis ut veniam', '2022-03-12', '2022-03-12', 'Management', 2, 'Wholesale Retail', 'Praesentium obcaecat', 'Phnom Penh', 'Nobis earum sed sit', '>$2000', 'Occaecat in ut enim', 'Harum ipsum reiciend', 2, 'Dicta earum maiores', '2022-02-08 02:16:17', '2022-02-08 02:18:17'),
(10, 2, 1, 'Agency3', 'At id suscipit quo d', 'Eveniet quibusdam v', '2022-03-12', '2022-03-12', 'Travel Agent Ticket Sales', 1, 'Stationery Books Toys', 'Voluptas autem in of', 'Kampot', 'Aspernatur consequat', '>$6000', 'Voluptatem Dolorem', 'Quis asperiores earu', 1, 'Reiciendis rem atque', '2022-02-08 02:16:36', '2022-02-08 02:18:18'),
(11, 2, 1, 'Agency4', 'Quod vel qui sint q', 'Sit ut quis at null', '2022-02-13', '2022-02-13', 'Travel Agent Ticket Sales', 2, 'Legal Services', 'Esse quisquam sit pr', 'Takéo', 'In dolore iste hic c', '$500-$999', 'Quia aut culpa comm', 'Veritatis et dolorem', 2, 'Quis fugiat odio ev', '2022-02-08 02:16:55', '2022-02-08 02:18:20'),
(12, 2, 1, 'Agency5', 'Ullamco autem quia b', 'Nulla iste elit rep', '2022-02-15', '2022-02-15', 'Customer Service', 1, 'Architecture Building Construction', 'Enim anim nemo et vo', 'Tboung Khmum', 'Nobis mollitia dolor', 'Negotiable', 'Aut sint consequuntu', 'Amet eum amet et e', 1, 'Incidunt accusantiu', '2022-02-08 02:17:30', '2022-02-08 02:18:20'),
(13, 2, 1, 'Agency7', 'Exercitation in anim', 'Veniam voluptatem', '2022-02-19', '2022-02-19', 'QC QA', 2, 'Medical Pharmaceutical', 'Deleniti accusantium', 'Tboung Khmum', 'Laboris quo magnam s', 'Negotiable', 'Incididunt reiciendi', 'Omnis sapiente alias', 1, 'Vitae molestiae sed', '2022-02-08 02:17:50', '2022-02-08 02:18:20'),
(14, 1, 1, 'Libero accusantium v', 'Ut ea adipisicing ip', 'Duis itaque hic ipsu', '2022-03-05', '2022-03-12', 'Human Resource', 1, 'Human Resource', 'Non laborum consequu', 'Takéo', 'Maxime aut doloremqu', '<$200', 'Quam nobis dolore ve', 'Rerum qui vel in tot', 1, 'Aut eius cum magnam', '2022-02-08 02:36:17', '2022-02-08 02:36:17'),
(15, 3, 1, 'Consequuntur quam pr', 'Iure qui consequatur', 'Tenetur vitae maiore', '2022-02-26', '2022-02-26', 'Technician Maintenance', 1, 'Real Estate Leasing Acquisition', 'Est rem sint et reru', 'Tboung Khmum', 'Unde voluptatem ame', '>$2000', 'Ex totam sint consec', 'Rem non qui aut expe', 1, 'Qui sed ea deserunt', '2022-02-09 03:38:27', '2022-02-09 03:39:07'),
(16, 3, 1, 'Distinctio Velit i', 'Enim tempore deseru', 'Quidem velit occaec', '2022-03-12', '2022-03-12', 'Bank Insurance', 3, 'Tourism', 'Similique sint non d', 'Kampong Speu', 'Quaerat totam exerci', '>$6000', 'Excepteur obcaecati', 'Nulla expedita id la', 3, 'Qui rem expedita ut', '2022-02-09 03:38:40', '2022-02-09 03:39:07'),
(17, 4, 1, 'Amet tenetur distin', 'Dolores officiis sim', 'Assumenda qui labore', '2022-03-12', '2022-03-12', 'Accounting', 100, 'Accounting Audit Tax Services', 'Corporis dicta nobis', 'Banteay Meanchey', 'Ea aspernatur non so', '<$200', 'Numquam porro incidi', 'Quod ut illo deserun', 1, 'Eveniet nostrud fac', '2022-02-10 01:00:37', '2022-02-10 01:39:55'),
(18, 1, 1, 'Adipisci sed nihil e', 'Vitae nihil dolorem', 'Culpa dolorem adipi', '2022-03-12', '2022-03-12', 'Translation Interpretation', 2, 'Recruiting Services', 'Commodo neque dolore', 'Pursat', 'Dicta iste ut odio a', 'Negotiable', 'Dolore tempore modi', 'Neque quas earum eni', 2, 'Fugit quaerat provi', '2022-02-10 01:40:27', '2022-02-10 01:40:27'),
(19, 1, 1, 'Aute ipsa excepturi', 'Et aut deleniti omni', 'Proident quis sed q', '2022-02-15', '2022-02-15', 'Architecture Engineering', 2, 'Entertainment', 'Fuga Odit commodi v', 'Phnom Penh', 'Nihil a eos velit n', '$1000-$2000', 'Ad illum perferendi', 'In corrupti optio', 2, 'Reprehenderit qui ni', '2022-02-10 01:47:48', '2022-02-10 01:47:48'),
(20, 5, 1, 'Non exercitationem c', 'Magna aut mollit con', 'Do voluptate eius di', '2022-03-12', '2022-03-12', 'Assistant Secretary', 2, 'Advertising Media Publishing Printing', 'Recusandae Aut inci', 'Kampong Cham', 'Eiusmod consequatur', '>$6000', 'Et ipsum est sit p', 'Laudantium autem li', 2, 'Saepe sed excepteur', '2022-02-10 02:20:00', '2022-02-10 03:06:47'),
(21, 6, 1, 'Optio consequuntur', 'Est elit est minim', 'Qui assumenda velit', '2022-02-25', '2022-02-26', 'Assistant Secretary', 1, 'Airline', 'Commodi et quia cons', 'Phnom Penh', 'Et officia voluptate', '$1000-$2000', 'Facere et maxime non', 'Cupidatat excepteur', 1, 'Aut vel id eligendi', '2022-02-10 03:05:08', '2022-02-10 03:06:49'),
(22, 6, 1, 'DARA', 'In consequat Deseru', 'Vel quia exercitatio', '2022-03-03', '2022-02-25', 'Project Management', 1, 'Information Technology', 'Quam rerum ad offici', 'Kandal', 'Consequat Dolorum m', 'Negotiable', 'Ut ducimus molestia', 'Quis irure non dolor', 1, 'Illum necessitatibu', '2022-02-10 03:05:50', '2022-02-10 03:06:50'),
(23, 2, 1, 'IT MANAGER ING', 'Exercitation recusan', 'Officia exercitation', '2022-03-12', '2022-03-05', 'QC QA', 1, 'Engineering', 'Esse sunt eos magn', 'Kampong Thom', 'Voluptas eiusmod nem', '>$2000', 'Consectetur volupta', 'Reprehenderit sunt', 2, 'Rerum aliquam iure e', '2022-02-10 03:13:31', '2022-02-10 03:18:23'),
(24, 2, 1, 'DARA JOB', 'Cupiditate minima ut', 'Quis et nihil vero m', '2022-03-12', '2022-02-17', 'Logistics Shipping Deliver Warehouse', 1, 'Wholesale Retail', 'Sit voluptatibus eu', 'Oddar Meanchey', 'Assumenda ipsum ulla', '$200-$500', 'In quasi aut sit vit', 'Eveniet occaecat ir', 1, 'Perspiciatis amet', '2022-02-10 03:17:30', '2022-02-10 03:18:23'),
(25, 2, 1, 'POLICE', 'Quis qui voluptate c', 'Voluptatem rerum Nam', '2022-02-19', '2022-02-19', 'Medical Health Nursing', 1, 'Medical Pharmaceutical', 'Enim tenetur iste qu', 'Phnom Penh', 'Cillum est aute labo', '$200-$500', 'Magna cupidatat sed', 'Quam debitis eos eu', 1, 'Optio sapiente pari', '2022-02-10 03:20:03', '2022-02-10 03:32:49'),
(26, 2, 1, 'Rem eu odit ab optio', 'Quasi nostrum molest', '2', '2022-03-12', '2022-03-12', 'Media Advertising', 2, 'Agriculture Foresty Fishing', 'Tempora magnam sequi', 'Kampong Chhnang', 'Qui facilis alias co', '$500-$999', 'Sunt facere et ut a', 'Soluta incidunt rep', 1, 'Sed adipisicing et p', '2022-02-10 03:21:33', '2022-02-10 03:32:49'),
(27, 2, 1, 'ADOBE', 'Et consequuntur hic', 'Quidem eum duis beat', '2022-03-12', '2022-02-26', 'Architecture Engineering', 1, 'Security Fire Electronic Access Controls', 'Impedit ipsam vitae', 'Phnom Penh', 'Cum deleniti veniam', '$500-$999', 'Eius quo fugit duis', 'Quis aute dolor illo', 1, 'Velit voluptatibus e', '2022-02-10 03:23:58', '2022-02-10 03:32:49'),
(28, 2, 1, 'Microsoft WORD', 'Corrupti dolore eni', 'Mollit ipsa est qua', '2022-03-12', '2022-03-12', 'Travel Agent Ticket Sales', 1, 'Performance Musical Artistic', 'Saepe nihil enim nos', 'Pursat', 'Dolores temporibus a', '>$6000', 'Facere dolores offic', 'Ratione voluptas sus', 1, 'Suscipit sit sit co', '2022-02-10 03:25:59', '2022-02-10 03:32:50');

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
(3, 'Architecture Engineering', NULL, NULL),
(4, 'Assistant Secretary', NULL, NULL),
(5, 'Audit Taxation', NULL, NULL),
(6, 'Bank Insurance', NULL, NULL),
(7, 'Cashier Receptionist', NULL, NULL),
(8, 'Catering Restaurant', NULL, NULL),
(9, 'Consultancy', NULL, NULL),
(10, 'Cook Cleaner Maid', NULL, NULL),
(11, 'Customer Service', NULL, NULL),
(12, 'Design', NULL, NULL),
(13, 'Driver Security', NULL, NULL),
(14, 'Education Training', NULL, NULL),
(15, 'Finance', NULL, NULL),
(16, 'Hotel Hospitality', NULL, NULL),
(17, 'Human Resource', NULL, NULL),
(18, 'IT', NULL, NULL),
(19, 'Lawyer Legal Service', NULL, NULL),
(20, 'Logistics Shipping Deliver Warehouse', NULL, NULL),
(21, 'Management', NULL, NULL),
(22, 'Manufacturing', NULL, NULL),
(23, 'Marketing', NULL, NULL),
(24, 'Media Advertising', NULL, NULL),
(25, 'Medical Health Nursing', NULL, NULL),
(26, 'Merchandising Purchasing', NULL, NULL),
(27, 'Operation Production', NULL, NULL),
(28, 'Others', NULL, NULL),
(29, 'Project Management', NULL, NULL),
(30, 'QC QA', NULL, NULL),
(31, 'Resort Casino', NULL, NULL),
(32, 'Sales', NULL, NULL),
(33, 'Technician Maintenance', NULL, NULL),
(34, 'Telecommunication', NULL, NULL),
(35, 'Translation Interpretation', NULL, NULL),
(36, 'Travel Agent Ticket Sales', NULL, NULL);

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
(1, 'Accounting Audit Tax Services', NULL, NULL),
(2, 'Advertising Media Publishing Printing', NULL, NULL),
(3, 'Advisory Consultancy', NULL, NULL),
(4, 'Agriculture Foresty Fishing', NULL, NULL),
(5, 'Airline', NULL, NULL),
(6, 'Architecture Building Construction', NULL, NULL),
(7, 'Automotive - Vehicle', NULL, NULL),
(8, 'Banking Finance', NULL, NULL),
(9, 'Catering', NULL, NULL),
(10, 'Chemical Plastic Paper Petrochemical', NULL, NULL),
(11, 'Civil Services', NULL, NULL),
(12, 'Clothing Garment Textile', NULL, NULL),
(13, 'Cosmetics Beauty', NULL, NULL),
(14, 'Education', NULL, NULL),
(15, 'Electronics Electrical Mechanical Equipment', NULL, NULL),
(16, 'Energy Power Water Oil Gas', NULL, NULL),
(17, 'Engineering', NULL, NULL),
(18, 'Entertainment', NULL, NULL),
(19, 'Food Beverages', NULL, NULL),
(20, 'General Business Services', NULL, NULL),
(21, 'Government', NULL, NULL),
(22, 'Health Personal Care', NULL, NULL),
(23, 'Hotel Hospitality', NULL, NULL),
(24, 'Human Resource', NULL, NULL),
(25, 'Industrial Machinery Automation Equipment', NULL, NULL),
(26, 'Information Technology', NULL, NULL),
(27, 'Insurance', NULL, NULL),
(28, 'Jewellery Gems Watches', NULL, NULL),
(29, 'Legal Services', NULL, NULL),
(30, 'Logistics Freight Shipping Delivery Warehouse', NULL, NULL),
(31, 'Manufacturing', NULL, NULL),
(32, 'Medical Pharmaceutical', NULL, NULL),
(33, 'NGO Charity Social Services', NULL, NULL),
(34, 'Others', NULL, NULL),
(35, 'Packaging', NULL, NULL),
(36, 'Performance Musical Artistic', NULL, NULL),
(37, 'Property Development Management', NULL, NULL),
(38, 'Real Estate', NULL, NULL),
(39, 'Real Estate Leasing Acquisition', NULL, NULL),
(40, 'Recruiting Services', NULL, NULL),
(41, 'Security Fire Electronic Access Controls', NULL, NULL),
(42, 'Sports Recreation', NULL, NULL),
(43, 'Stationery Books Toys', NULL, NULL),
(44, 'Telecommunication', NULL, NULL),
(45, 'Tourism', NULL, NULL),
(46, 'Trading', NULL, NULL),
(47, 'Vehicle Repair Maintenance', NULL, NULL),
(48, 'Wholesale Retail', NULL, NULL);

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
(1, 1, 'Cain Ramos', 'Stuart Bass', 'admin', '+1 (368) 407-3211', '$2y$10$1lN.Sw/Ng.aJE0TshtfrleoHVYg.RTlJh/tPDZPp.nxg2vptz5/8i', 1, NULL, '2022-02-08 02:10:20', '2022-02-08 02:10:20'),
(2, 2, 'Eliana Vinson', 'Ann Casey', 'agency', '+1 (628) 563-7255', '$2y$10$y64zRSlSVsH9EhJzrdRnVeetARFXcJd5ZhT4NV5T24CYsNqA.T58y', 1, NULL, '2022-02-08 02:15:00', '2022-02-08 02:15:00'),
(3, 2, 'Gary Hayden', 'Ariana Haynes', 'doxopycubo', '+1 (168) 971-5218', '$2y$10$68mQZDoF0iqwYQCE9SK8HOblTFtSCN5rGEeZcCoysLVkXmUQgXmBi', 1, NULL, '2022-02-09 03:38:04', '2022-02-09 03:38:04'),
(4, 2, 'Yardley Carroll', 'Harper Bright', 'wujejycire', '+1 (562) 208-3237', '$2y$10$1YSDmQglEE63TU3nwokqiepVkf.ods7Ehx0xwz9hFt7XzhrxaKbti', 1, NULL, '2022-02-10 00:59:11', '2022-02-10 00:59:11'),
(5, 2, 'Cailin Golden', 'Vernon Dodson', 'fuguk', '+1 (507) 945-4962', '$2y$10$ZXDc6eruHOCQU19mpMinCOEWWz3EWVa4N1eByX5hv/ZDL5dnVHccO', 1, NULL, '2022-02-10 02:18:24', '2022-02-10 02:18:24'),
(6, 2, 'Noelani Dawson', 'Teagan Fuentes', 'zuwylebad', '+1 (149) 654-9415', '$2y$10$dkJRW44XIIY0aP2s966REuW7T8yjfxtIvlmUlSpm7LL2NGrHT3hf.', 1, NULL, '2022-02-10 02:20:08', '2022-02-10 02:20:08');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
