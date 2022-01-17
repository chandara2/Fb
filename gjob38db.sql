-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 12:02 PM
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
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) NOT NULL,
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
  `uid` bigint(20) NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hiring` tinyint(4) DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_function` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_exp` tinyint(4) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `uid`, `age`, `contact`, `deadline`, `detail`, `hiring`, `industry`, `job_function`, `job_title`, `language`, `location`, `qualification`, `salary`, `sex`, `term`, `year_of_exp`, `visible`, `created_at`, `updated_at`) VALUES
(2, 1, 'Dolor quis deserunt', 'Anim exercitationem', '1982-12-01', 'In in sunt pariatur', 1, 'Autem dolore velit p', 'Ipsum iure harum lo', 'Mollitia architecto', 'Repellendus Corrupt', 'Dolor quis deserunt', 'Fugiat in et rem ven', 'Ut ducimus ut autem', 'Suscipit in sunt vol', 'Ut pariatur Quaerat', 2, 1, '2022-01-16 23:07:24', '2022-01-16 23:07:24'),
(3, 1, 'Et aut voluptas reru', 'Quibusdam error fugi', '1995-09-19', 'Harum eos laborum o', 76, 'Totam ratione sit v', 'A ducimus eum fugit', 'Consequat In cupidi', 'Ratione quam est qui', 'Et aut voluptas reru', 'Voluptas aut debitis', 'Vel tempora quae ear', 'Quis magnam quis a d', 'Sit aliquid magni r', 5, 1, '2022-01-16 23:10:07', '2022-01-16 23:10:07'),
(4, 1, 'Ad qui exercitation', 'Ut qui maxime tenetu', '1995-10-20', 'Vero maxime fugiat a', 38, 'In et duis officia e', 'Ea fuga Sit blandit', 'Voluptatibus beatae', 'In mollit aperiam as', 'Ad qui exercitation', 'Incididunt sit et i', 'Qui rerum laboris ea', 'In aut consequatur e', 'Eum harum assumenda', 1, 1, '2022-01-16 23:29:52', '2022-01-16 23:29:52'),
(5, 1, 'Rerum ex facilis rep', 'Est autem tempore', '1973-01-22', 'Esse velit et itaqu', 73, 'Necessitatibus labor', 'Nostrud dolor autem', 'Laborum Adipisci vo', 'Molestias anim maxim', 'Rerum ex facilis rep', 'Repellendus Enim po', 'Numquam quis eaque s', 'Voluptatibus aut cum', 'Possimus sunt veli', 2, 1, '2022-01-16 23:31:33', '2022-01-16 23:31:33'),
(6, 1, 'Est ipsum et volupt', 'Temporibus necessita', '1996-03-09', 'Reprehenderit elige', 74, 'Amet blanditiis sin', 'Aut corporis non nem', 'In deserunt veniam', 'Voluptas labore accu', 'Est ipsum et volupt', 'Voluptatem facere qu', 'Suscipit provident', 'Non necessitatibus p', 'Id dolore exercitat', 8, 1, '2022-01-16 23:31:58', '2022-01-16 23:31:58'),
(7, 1, 'Sed labore et atque', 'Quia vero porro exce', '1999-04-14', 'Vel eligendi expedit', 40, 'Alias quam sequi eve', 'Voluptatem error rec', 'Voluptatibus ut sint', 'Aperiam maiores esse', 'Sed labore et atque', 'Cum nostrud molestia', 'Do ad enim nulla ea', 'Sunt sunt vero numq', 'Harum nihil aute cum', 2, 1, '2022-01-16 23:35:30', '2022-01-16 23:35:30'),
(8, 1, 'Repellendus Sed aut', 'Ea dolore iste obcae', '1979-01-15', 'Nihil voluptate in a', 83, 'Non libero duis ulla', 'Voluptas vitae ut qu', 'Eligendi earum solut', 'Numquam sit autem d', 'Repellendus Sed aut', 'Qui quasi non tempor', 'Temporibus ducimus', 'Elit dolore optio', 'Labore proident ita', 2, 1, '2022-01-16 23:36:38', '2022-01-16 23:36:38'),
(9, 1, 'Eiusmod quia nisi no', 'Sint natus pariatur', '2022-11-19', 'Molestias et aut ut', 4, 'Veniam dolor ad mol', 'Sunt aut enim eligen', 'Enim enim beatae lab', 'Ut soluta quia nihil', 'Eiusmod quia nisi no', 'Proident molestias', 'In cillum reprehende', 'Tempore laudantium', 'Omnis blanditiis ull', 100, 1, '2022-01-16 23:39:06', '2022-01-16 23:39:06'),
(10, 1, 'Molestias commodo qu', 'Explicabo Aliquam v', '2008-07-12', 'Enim ipsam ullam eni', 40, 'Minim necessitatibus', 'Illum nisi nostrum', 'Sed quia consequatur', 'Provident quo volup', 'Molestias commodo qu', 'Omnis dolorem sequi', 'Voluptas non dolor e', 'Ratione aspernatur i', 'Consectetur atque de', 100, 1, '2022-01-16 23:39:14', '2022-01-16 23:39:14'),
(11, 1, 'Impedit exercitatio', 'Quas et ducimus inc', '1970-07-24', 'Assumenda repudianda', 86, 'Dolor enim vero sed', 'Eum et quia odio dol', 'Non quia occaecat as', 'Non deserunt adipisc', 'Impedit exercitatio', 'Sed magna sequi temp', 'Esse sunt pariatur', 'Molestias ad cillum', 'Repudiandae pariatur', 100, 1, '2022-01-16 23:39:22', '2022-01-16 23:39:22'),
(12, 1, 'Consectetur et Nam m', 'At ut qui aliquam qu', '1998-10-14', 'Odit consectetur di', 10, 'Aperiam eveniet odi', 'Ut commodo duis temp', 'Mollitia ut deserunt', 'Et rerum aliquam est', 'Consectetur et Nam m', 'Blanditiis voluptati', 'Itaque asperiores su', 'Corrupti commodo ad', 'Voluptate sint porro', 100, 1, '2022-01-16 23:39:27', '2022-01-16 23:39:27'),
(13, 1, 'Voluptatem Debitis', 'Non consectetur labo', '1979-02-16', 'Nulla sequi quo numq', 70, 'Est officiis quisqu', 'Nemo non aut at fuga', 'Enim cum magna in fu', 'In dicta quam blandi', 'Voluptatem Debitis', 'Iure modi corrupti', 'Architecto architect', 'Quo minus aliquip in', 'Iste provident sed', 100, 1, '2022-01-16 23:39:34', '2022-01-16 23:39:34'),
(14, 1, 'Sunt tenetur sit ad', 'Itaque quidem vero v', '1980-07-19', 'Dolore nihil dolor f', 21, 'Aliquip magni tempor', 'Suscipit quo illum', 'Sed molestiae atque', 'Ipsum nemo reprehend', 'Sunt tenetur sit ad', 'Possimus velit ipsu', 'Fugit dolorem digni', 'Nemo eos cillum ut c', 'Recusandae Irure ne', 100, 1, '2022-01-16 23:39:39', '2022-01-16 23:39:39'),
(15, 1, 'Quia cumque enim err', 'Atque ut corrupti q', '1990-12-04', 'Qui iusto quis vel i', 24, 'Est et mollit est q', 'Labore architecto te', 'Eius molestiae nihil', 'Ex non non id aliqu', 'Quia cumque enim err', 'Sunt aliqua Consequ', 'Quasi aliqua Ad id', 'Provident placeat', 'In illum sapiente i', 100, 1, '2022-01-16 23:39:52', '2022-01-16 23:39:52'),
(16, 1, 'Dolor incidunt nisi', 'Laboris eiusmod exer', '1996-08-18', 'Vero id consequatur', 34, 'Voluptatibus veritat', 'Porro culpa et nost', 'At pariatur Archite', 'Illum ut quos nostr', 'Dolor incidunt nisi', 'Explicabo Provident', 'Ut labore sit lorem', 'Ea consectetur nisi', 'Qui assumenda neque', 100, 1, '2022-01-16 23:39:58', '2022-01-16 23:39:58'),
(17, 1, 'Non aut est quaerat', 'Culpa sed harum off', '2010-03-09', 'Veniam repudiandae', 40, 'Enim sint aut disti', 'Ipsum aperiam simil', 'Ipsum pariatur Acc', 'Excepturi consectetu', 'Non aut est quaerat', 'Quasi ut saepe dolor', 'Laborum corrupti mi', 'Omnis voluptas volup', 'Vitae sit qui sed ne', 100, 1, '2022-01-16 23:40:03', '2022-01-16 23:40:03'),
(18, 1, 'Provident adipisici', 'Debitis ea sed hic d', '1976-04-18', 'Accusamus dolorum vo', 43, 'Labore non aut quia', 'Quas et occaecat vol', 'Velit dolor blandit', 'Reiciendis atque sus', 'Provident adipisici', 'Consequatur porro du', 'Assumenda mollitia a', 'At quidem ea accusan', 'Pariatur Itaque sin', 100, 1, '2022-01-16 23:40:09', '2022-01-16 23:40:09'),
(19, 1, 'Consequatur Sequi e', 'Fugiat tenetur nesc', '1992-10-28', 'Aspernatur accusamus', 24, 'Sunt illum hic Nam', 'Obcaecati veritatis', 'Quidem tenetur non n', 'Veniam nihil est a', 'Consequatur Sequi e', 'Perspiciatis conseq', 'Unde cum in quia at', 'Modi pariatur Ad ci', 'Quo dolore soluta in', 100, 1, '2022-01-16 23:40:17', '2022-01-16 23:40:17'),
(20, 1, 'Id quaerat sit numqu', 'Reprehenderit aut do', '2014-07-24', 'Nisi sed amet et do', 63, 'Aspernatur a possimu', 'Duis nesciunt volup', 'Voluptatem nobis eiu', 'Laboris maxime volup', 'Id quaerat sit numqu', 'Deleniti quo ut qui', 'Corrupti dolores qu', 'Exercitationem magna', 'Ullamco et aliqua C', 100, 1, '2022-01-16 23:40:24', '2022-01-16 23:40:24'),
(21, 1, 'Eveniet illum odio', 'Voluptas est volupt', '2012-11-06', 'Irure suscipit eveni', 32, 'Quia perspiciatis s', 'Suscipit vel dolor q', 'Ipsum eligendi omnis', 'Fuga Tempora a omni', 'Eveniet illum odio', 'Recusandae Dolor pr', 'Est nesciunt dolore', 'Corrupti qui amet', 'Velit at eu quis la', 100, 1, '2022-01-16 23:40:30', '2022-01-16 23:40:30'),
(22, 1, 'Ullamco optio enim', 'Cumque voluptas odio', '1995-09-24', 'Ut sit quas dolor s', 71, 'Necessitatibus iste', 'Cupidatat quo quam p', 'Irure numquam sunt u', 'Labore dicta ullamco', 'Ullamco optio enim', 'Sed et sit exceptur', 'Praesentium enim dol', 'Labore reprehenderit', 'Voluptatum est conse', 100, 1, '2022-01-16 23:40:35', '2022-01-16 23:40:35'),
(23, 1, 'Eveniet reprehender', 'Itaque quo aspernatu', '2011-08-03', 'Provident eligendi', 34, 'In vitae dolores mag', 'Dolorem et dolorem o', 'Excepteur est quia v', 'Soluta minima aute l', 'Eveniet reprehender', 'Consequat Qui dolor', 'Dolor ut aliqua Non', 'Eveniet ipsam in ve', 'Nihil dolore pariatu', 100, 1, '2022-01-16 23:40:40', '2022-01-16 23:40:40'),
(24, 1, 'Doloribus deserunt s', 'Excepteur earum veli', '1972-02-28', 'Earum in omnis harum', 78, 'Dolore amet quis no', 'Nesciunt et qui eni', 'Asperiores molestias', 'Quidem qui reprehend', 'Doloribus deserunt s', 'Adipisci non consequ', 'Odio placeat qui re', 'Qui inventore non re', 'Rerum nobis doloribu', 100, 1, '2022-01-16 23:40:46', '2022-01-16 23:40:46'),
(25, 1, 'Ut fugiat cupidatat', 'Aliquam delectus si', '2014-06-21', 'Minima minima magni', 99, 'Consectetur expedit', 'Modi alias in sit d', 'Enim aut exercitatio', 'Fuga Adipisci tempo', 'Ut fugiat cupidatat', 'Sequi qui nesciunt', 'Velit illo enim erro', 'Voluptatem Ab numqu', 'Dolore ut illo delec', 100, 1, '2022-01-16 23:40:51', '2022-01-16 23:40:51'),
(26, 1, 'Tempor maiores aut v', 'Inventore fugiat qu', '2016-03-21', 'Id culpa suscipit t', 17, 'Sit suscipit volupta', 'Ad rerum sunt molest', 'Velit ullam numquam', 'Corrupti necessitat', 'Tempor maiores aut v', 'Est laborum Dolore', 'Et debitis voluptas', 'Commodo delectus Na', 'Excepturi voluptas s', 100, 1, '2022-01-16 23:40:57', '2022-01-16 23:40:57'),
(27, 1, 'Ut lorem eu accusant', 'Sequi voluptate dolo', '1993-08-09', 'Aut et est ipsa qua', 90, 'Quia temporibus eu e', 'Eos commodo aperiam', 'Do fugiat veniam in', 'Est at vel neque qui', 'Ut lorem eu accusant', 'Sint impedit tempor', 'Doloribus nostrum de', 'Amet qui mollitia i', 'Consequatur qui quis', 100, 1, '2022-01-16 23:46:57', '2022-01-16 23:46:57'),
(28, 1, 'Odit necessitatibus', 'Sed non nostrum id t', '1986-05-15', 'Harum aut nostrud re', 31, 'Agriculture/Foresty/Fishing', NULL, 'Quae eum laborum Ut', 'Dolor consequatur I', 'Kratié', 'Voluptas in odio eum', NULL, 'Minus optio dolore', 'Magnam culpa Nam id', 100, 1, '2022-01-17 01:40:12', '2022-01-17 01:40:12'),
(29, 1, 'Qui id aliqua Veli', 'Eos voluptas nesciu', '1977-04-12', 'Dolore sint nostrum', 95, 'Performance/Musical/Artistic', NULL, 'IT Support', 'Eum necessitatibus t', 'Preah Sihanouk', 'Qui vitae unde eius', NULL, 'Quod elit aut sunt', 'Quia fugit quo libe', 100, 1, '2022-01-17 01:40:58', '2022-01-17 01:40:58'),
(30, 1, 'Eum laboris nisi hic', 'Ea in temporibus dic', '1987-02-26', 'Qui aperiam praesent', 76, 'Engineering', NULL, 'Iusto deserunt nisi', 'Explicabo Quos cons', 'Takéo', 'Cumque deserunt aliq', NULL, 'Iste consequatur cum', 'A est maxime illum', 100, 1, '2022-01-17 01:44:53', '2022-01-17 01:44:53'),
(31, 1, 'Dolore hic corporis', 'Similique ea consect', '1988-11-12', 'Quidem quasi qui lab', 21, 'Sports & Recreation', NULL, 'Aliquip velit dolor', 'Et ad perferendis om', 'Tboung Khmum', 'Saepe omnis odit cup', NULL, 'Rem eos exercitatio', 'Est ea et modi quis', 100, 1, '2022-01-17 01:47:12', '2022-01-17 01:47:12'),
(32, 1, 'Repellendus Rerum a', 'Rerum quisquam do vo', '1982-11-26', 'Mollit illo fuga Do', 40, 'Information Technology', NULL, 'Sit eos eiusmod volu', 'Inventore nobis cons', 'Banteay Meanchey', 'Lorem aut ex maxime', NULL, 'Ut sunt sunt in aper', 'Laboris tempore und', 100, 1, '2022-01-17 01:48:01', '2022-01-17 01:48:01'),
(33, 1, 'Ipsam adipisicing ea', 'Sunt laudantium lab', '2022-01-17', 'Et et veniam quaera', 5, 'Education', NULL, 'Esse aliquip amet', 'Duis eaque eum fugit', 'Pursat', 'Veniam ut sit repu', NULL, 'Eveniet dolor ea ci', 'Est amet quisquam u', 100, 1, '2022-01-17 02:01:31', '2022-01-17 02:01:31'),
(34, 1, 'Aute est ut cillum', 'Sunt minima sint con', '2022-01-17', 'Itaque molestias ut', 76, 'Telecommunication', NULL, 'Cupiditate assumenda', 'Illo culpa nisi ea e', 'Ratanak Kiri', 'Harum sunt quia sin', NULL, 'Rerum laborum quasi', 'Sit debitis aut lor', 100, 1, '2022-01-17 03:16:46', '2022-01-17 03:16:46');

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
(7, '2022_01_17_065749_create_company_infos_table', 2),
(8, '2022_01_17_072909_create_job_functions_table', 3),
(9, '2022_01_17_072934_create_job_industries_table', 3),
(10, '2022_01_17_072952_create_job_locations_table', 3),
(11, '2022_01_17_073014_create_job_salaries_table', 3);

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
(1, 1, 'Chan', 'Dara', 'admin', '+1 (287) 506-3784', '$2y$10$Yx8t0W.0efV8473EEl8vS.kCUhG2RdBIJMXs0psMD/iY3wN86uETu', 1, NULL, '2022-01-14 23:58:07', '2022-01-14 23:58:07'),
(4, 1, 'Camden Chaney', 'Cairo Hardin', 'weqoj', '+1 (989) 163-4584', '$2y$10$d7Y3CMV9IhhJmmJvMxdWE.3C6RDpAhG0x4e1h9InYBp8Ba2oYVypG', 1, NULL, '2022-01-15 19:49:25', '2022-01-15 19:49:25'),
(5, 2, 'Sieng', 'SiengSieng', 'SiengSieng1', '+1 (573) 856-1071', '$2y$10$YJYZOvIbC7R9uAKwq.FUSuHRs1VIaV71NJRXIJUEMsIcaPLTe.UIK', 1, NULL, '2022-01-15 19:53:13', '2022-01-16 19:45:25'),
(6, 3, 'Tashya Lara', 'Paula Coffey', 'bojohyhon', '+1 (235) 711-5618', '$2y$10$miuG5e9r5NBNqV26hlJidOcuPlRvUHcPEBlB6DGzADRvvLgCA6f9q', 1, NULL, '2022-01-15 19:54:44', '2022-01-15 19:54:44'),
(7, 2, 'TaShya House', 'Shelly Ray', 'tiletisu', '+1 (612) 597-5543', '$2y$10$KuIRIoVLZ2T0JoFq8aaDgOABeh3rsaZ7V61a60B/XR/zafZKac94q', 1, NULL, '2022-01-15 19:54:56', '2022-01-15 19:54:56'),
(10, 3, 'Ciara Conway', 'Xenos Foley', 'lapixyl', '+1 (977) 945-6266', '$2y$10$5sSHkimEv/1CXR/FVnIVNeeopeAmkOz8u7Qwv9gEGLOUO3GV3t4ti', 1, NULL, '2022-01-15 23:48:12', '2022-01-15 23:48:12'),
(11, 3, 'Cain Beck', 'Dara Ayala', 'sibes', '+1 (711) 804-3453', '$2y$10$L/KjwdubR2cSxNq7wJTxgejYNmvh7aUaYhMyCbnieJsswJ94LGnTe', 1, NULL, '2022-01-15 23:48:18', '2022-01-15 23:48:18'),
(12, 2, 'Jonas Norton', 'Ima Dodson', 'gyjavaqu', '+1 (922) 423-4891', '$2y$10$Q1wgzmbcqXaESS5NplUF5uOXOJIYYLMjAPXEYCzK8Nhd/IWgt7XEq', 1, NULL, '2022-01-15 23:48:22', '2022-01-15 23:48:22'),
(13, 2, 'Reece Peterson', 'Buffy Cline', 'xefamulucy', '+1 (835) 591-9822', '$2y$10$LxJARIWH6VTzsWMnImCxwuO/xoyWp3UazKXFIBPGiXM6fXtR6510y', 1, NULL, '2022-01-15 23:48:27', '2022-01-15 23:48:27'),
(14, 2, 'Blossom Holden', 'Jade Gould', 'vezulebi', '+1 (724) 466-2154', '$2y$10$ghjQWlBM31u.F6imW6Nyueedskf8I87Uh1Mo6thx053/Xbaz8KkhW', 1, NULL, '2022-01-15 23:48:34', '2022-01-15 23:48:34'),
(15, 2, 'Madison Padilla', 'Camden Robbins', 'ryfizataqi', '+1 (311) 689-9736', '$2y$10$zna0Rr4jPFOBFzMlek3uzO1o.f6hNk1uLK3DsRiBeDJ7DIzNus7de', 1, NULL, '2022-01-15 23:48:39', '2022-01-15 23:48:39'),
(16, 2, 'Hollee Roth', 'Zelda Anthony', 'tucidok', '+1 (136) 216-2791', '$2y$10$9Ujd6h83/HmWiiyuxzJTFOJ012naH6aLCi0jHYC7rbBIeWvK9Y83q', 1, NULL, '2022-01-15 23:48:44', '2022-01-15 23:48:44'),
(17, 2, 'Hall Fields', 'Michelle Velazquez', 'sainang007', '+1 (594) 542-2389', '$2y$10$FPbabpkx.cqrB4XYtD28XecJ7pSuDIj/fCxQUFfnD6d6PnTdQVm0y', 1, NULL, '2022-01-16 03:16:09', '2022-01-16 03:16:09'),
(18, 1, 'India Howard', 'Travis Leonard', 'xywafyvi', '+1 (759) 753-6574', '$2y$10$VixATIHDWElEHRfhnH11C..NAt4V3FssQ/FcjxbwZo/DJgY8MOULG', 1, NULL, '2022-01-16 03:17:18', '2022-01-16 03:17:18'),
(19, 3, 'Pamela Vega', 'Josephine Noble', 'user', '+1 (623) 223-3447', '$2y$10$B1OQgu5fpbHy0gi8UrFA2e9hZr/ssEsD5CoKF8XREqnjUOvUMdRV2', 1, NULL, '2022-01-16 03:28:04', '2022-01-16 03:28:04'),
(20, 2, 'Blaine Reid', 'Prescott Duke', 'agency', '+1 (966) 468-9854', '$2y$10$BlulKZFy6Ih9educThpQ3uProOH8sx3sBnenMq04bgCIf3JZCqysq', 1, NULL, '2022-01-16 03:42:17', '2022-01-16 03:42:17'),
(21, 2, 'chandara', 'reamdavid', 'chandavid', '+1 (148) 374-8471', '$2y$10$QxlBecXy/4J9GuxnofrWsek6b/5vP4MAceCOTQMcL6CbDvy72217i', 1, NULL, '2022-01-16 19:05:27', '2022-01-16 19:05:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
