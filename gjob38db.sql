-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 08:02 AM
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
(1, 2, 'Haney and Romero Associates', '1644552213.png', 'Health Personal Care', '276', 'https://www.betojetasolyno.co.uk', 'Ut quae et qui rerum', 'Quia quam magnam qui', 'Sed nostrum deserunt', 'Yoko Parsons', 'Dicta ea fugiat veri', 'lyzivaxef@mailinator.com', '+1 (925) 478-3764', '2022-02-10 21:03:33', '2022-02-10 21:03:33'),
(2, 1, 'Camjobs38', '1644552786.png', 'Recruiting Services', '10', 'https://laravel.com', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta non explicabo maiores dolores, adipisci expedita provident qui praesentium omnis commodi, dolore neque unde aliquid est labore facilis atque officiis eum.\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta non explicabo maiores dolores, adipisci expedita provident qui praesentium omnis commodi, dolore neque unde aliquid est labore facilis atque officiis eum.\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta non explicabo maiores dolores, adipisci expedita provident qui praesentium omnis commodi, dolore neque unde aliquid est labore facilis atque officiis eum.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta non explicabo maiores dolores, adipisci expedita provident qui praesentium omnis commodi, dolore neque unde aliquid est labore facilis atque officiis eum.', 'Banteay Meanchey', 'Dem Puthrea, Poi Pet, Banteay Meanchey, Cambodia', 'Chan Dara', 'Administrator', 'hr@crown.com', '+1 (163) 114-9226', '2022-02-10 21:13:06', '2022-02-10 21:13:06'),
(3, 4, 'Stevens and Chandler Co', '1644552926.jpg', 'Information Technology', '314', 'https://www.vyvedula.ca', 'Voluptatem reprehend', 'Vel accusamus quo no', 'Qui quas reiciendis', 'Sloane Salas', 'Dolor eum eiusmod so', 'rahipo@mailinator.com', '+1 (142) 368-2846', '2022-02-10 21:15:26', '2022-02-10 21:15:26');

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
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `uid`, `slide`, `created_at`, `updated_at`) VALUES
(3, 1, '1644561545.png', '2022-02-10 23:39:05', '2022-02-10 23:39:05'),
(4, 1, '1644561674.jfif', '2022-02-10 23:41:14', '2022-02-10 23:41:14'),
(6, 1, '1644561791.jfif', '2022-02-10 23:43:11', '2022-02-10 23:43:11'),
(7, 1, '1644561798.png', '2022-02-10 23:43:18', '2022-02-10 23:43:18');

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
  `hiring` smallint(6) DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_exp` smallint(6) DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `uid`, `approved`, `title`, `age`, `contact`, `expired_job`, `expired_post`, `function`, `hiring`, `industry`, `language`, `location`, `qualification`, `salary`, `sex`, `term`, `year_of_exp`, `detail`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'IT Support', 'Ab sunt est offici', 'Aut ipsum sint nob', '2022-03-12', '2022-03-12', 'Management', 1, 'Agriculture Foresty Fishing', 'Ullamco enim qui rei', 'Kampong Cham', 'Recusandae Alias al', 'Negotiable', 'Nihil quasi proident', 'Vel minim mollitia i', 1, 'Dignissimos et dolor', '2022-02-10 21:03:48', '2022-02-10 23:59:58'),
(2, 2, 1, 'Accountant', 'Eum qui consequuntur', 'Laborum Fugiat non', '2022-02-13', '2022-02-13', 'Technician Maintenance', 5, 'Vehicle Repair Maintenance', 'Hic ut explicabo Qu', 'Koh Kong', 'Dicta quia impedit', '>$2000', 'Aliquid minim minim', 'Aut eligendi adipisc', 1, 'Aliqua Placeat qui', '2022-02-10 21:04:11', '2022-02-10 23:59:58'),
(3, 1, 1, 'HR Manager', 'Id pariatur Est n', 'Aute consectetur vol', '2022-02-19', '2022-02-19', 'Medical Health Nursing', 1, 'Automotive - Vehicle', 'Est magnam qui in ma', 'Kandal', 'Veniam minus aute q', '$500-$999', 'Exercitation error r', 'Ex ea modi culpa bl', 1, 'Anim eos ducimus o', '2022-02-10 21:13:35', '2022-02-10 21:13:35'),
(4, 4, 1, 'Nulla dolores non ne', 'Dolor repudiandae ex', 'Est elit eum fugia', '2022-03-12', '2022-03-12', 'Education Training', 1, 'Logistics Freight Shipping Delivery Warehouse', 'Alias tempore conse', 'Pailin', 'Voluptate amet sint', '<$200', 'Cum ullam aut sit n', 'Quod nobis temporibu', 1, 'Obcaecati deleniti a', '2022-02-10 21:15:44', '2022-02-10 23:59:58'),
(5, 1, 1, 'Quaerat ipsum corpo', 'Qui architecto dolor', 'Velit et praesentium', '2022-03-12', '2022-03-12', 'Travel Agent Ticket Sales', 1, 'Real Estate Leasing Acquisition', 'Inventore velit blan', 'Preah Vihear', 'Facere officia molli', '<$200', 'Assumenda sit dicta', 'Vitae ex porro aut s', 1, 'Corporis et est nesc', '2022-02-11 00:00:11', '2022-02-11 00:00:11'),
(6, 1, 1, 'Enim consequuntur do', 'Velit deserunt sed t', 'Tempor fugiat quod q', '2022-03-12', '2022-03-12', 'Manufacturing', 1, 'Human Resource', 'Consectetur soluta', 'Kep', 'Laboriosam enim sus', '$200-$500', 'Dolore commodi qui d', 'Consequatur earum un', 1, 'Voluptatibus archite', '2022-02-11 00:00:22', '2022-02-11 00:00:22'),
(7, 1, 1, 'Natus nulla voluptat', 'Natus illo nihil nob', 'Minim dolorem et ius', '2022-02-19', '2022-03-12', 'Cashier Receptionist', 1, 'Performance Musical Artistic', 'Exercitation repelle', 'Koh Kong', 'Ex ut ut aspernatur', '$1000-$2000', 'Sit eiusmod suscipi', 'Aut ad ab at quis pr', 1, 'Beatae nobis volupta', '2022-02-11 00:00:34', '2022-02-11 00:00:34'),
(8, 1, 1, 'Nisi placeat et dol', 'Quo eiusmod fuga Eo', 'Dolore ad quos accus', '2022-02-25', '2022-02-25', 'Architecture Engineering', 1, 'Cosmetics Beauty', 'Fugiat dolore cumque', 'Koh Kong', 'Quis harum quia id e', '>$2000', 'Explicabo Maiores n', 'Sint laboriosam ir', 1, 'Minima sunt odio mo', '2022-02-11 00:00:47', '2022-02-11 00:00:47'),
(9, 1, 1, 'Aliquam a ad deserun', 'Est quia cupiditate', 'In amet nesciunt a', '2022-03-05', '2022-03-05', 'Assistant Secretary', 1, 'Accounting Audit Tax Services', 'Optio velit est ve', 'Battambang', 'Quae eiusmod in vel', '$1000-$2000', 'Magnam expedita fuga', 'Velit possimus quia', 1, 'Nisi mollitia qui fa', '2022-02-11 00:00:57', '2022-02-11 00:00:57'),
(10, 1, 1, 'Officia commodo earu', 'Voluptatem officia u', 'Lorem repudiandae op', '2022-03-12', '2022-03-05', 'Management', 1, 'Logistics Freight Shipping Delivery Warehouse', 'Dolore soluta archit', 'Mondulkiri', 'Autem sed vitae dolo', '$200-$500', 'Et aperiam sed volup', 'Et at ex sapiente pa', 1, 'Ut aspernatur velit', '2022-02-11 00:01:11', '2022-02-11 00:01:11');

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
(12, '2022_01_24_022030_create_abouts_table', 1),
(13, '2022_02_11_023747_create_homepages_table', 1);

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
(1, 1, 'Chan', 'Dara', 'admin', '0885275842', '$2y$10$obkaIJPS1WfOiv9gLjekMOQ8aCI076iUfP0db6TdxJikJNrfx10ES', 1, NULL, '2022-02-10 21:02:46', '2022-02-10 21:02:46'),
(2, 2, 'Evan Pickett', 'Lester Reynolds', 'agency', '+1 (169) 564-8349', '$2y$10$rjGCDiHrUDl8JV8oRSoRC.ct./XDCtghlmnZ9oa6espbjthaUAdUO', 0, NULL, '2022-02-10 21:03:03', '2022-02-10 23:11:30'),
(3, 3, 'Lani King', 'Kareem Malone', 'user', '+1 (725) 177-3661', '$2y$10$93jtv.5o8kE5/S/rLby96uZCk6BbwZPAJMiQZ0cLkbLDCkQWKT8fK', 1, NULL, '2022-02-10 21:04:25', '2022-02-10 21:04:25'),
(4, 2, 'Hedwig Moreno', 'Fuller Little', 'qypuqimevi', '+1 (141) 836-1758', '$2y$10$Ew6xZ8UQlCjjPBchi7yi9.JQ1NyRJ0lN8y/jXiq/0jMSqHBpuTTre', 1, NULL, '2022-02-10 21:15:11', '2022-02-10 21:15:11');

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
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homepages_uid_foreign` (`uid`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD CONSTRAINT `company_infos_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `homepages`
--
ALTER TABLE `homepages`
  ADD CONSTRAINT `homepages_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
