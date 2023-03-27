-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 05:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngint`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_pages`
--

CREATE TABLE `about_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_pages`
--

INSERT INTO `about_pages` (`id`, `title`, `sub_title`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, '<p style=\"text-align: center;\"><span style=\"font-size: 36pt; font-family: \'Tiro Gurmukhi\', serif;\">NG INTERNATIONAL COMPANY LIMITED</span></p>', '<p style=\"text-align: center;\"><span style=\"font-family: \'Tiro Gurmukhi\', serif; font-size: 20pt;\">Apparel Industry</span></p>', 'image/upload/about_page/1741077399200510-NG-International-about-us-image.gif', '<p><span style=\"font-family: \'EB Garamond\', serif; font-size: 14pt;\">We are&nbsp;<strong>NG International</strong>&nbsp;Trading Company Limited in Vietnam was founded in 2016. Being vertical manufacturers enables us to produce much faster with higher efficiency. By streamlining our process, we improve quality thus reducing costs and benefiting our customers. In addition, we collaborate with our supply of raw materials and chain factories, especially in the valued-added processes such as Embroidery, Printing, and Washing capabilities. Our factories are equipped with the most up-to-date manufacturing equipment and advanced production management system (PMS). This means embracing new technology and innovations that create efficient manufacturing processes with compliance and the highest quality standard products. We are capable to produce many kinds of high-quality garments under well-experienced international management. We highly guarantee that we are capable to provide you with many kinds of items such as the following: women&rsquo;s garments, Men&rsquo;s Clothing, Kids wear Apparel, Sportswear, Dresses, Casual Wear, Knitwear, Jackets, Coats, Tops, Tunics, Pants, Shirts, T-Shirts, Pyjamas PPE items (mask, Nitrile gloves, Headcover, Gown, Coverall, and Shoe covers)</span></p>', NULL, '2022-08-14 00:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `animated_main_sections`
--

CREATE TABLE `animated_main_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `selected_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `js` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `html` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animated_main_sections`
--

INSERT INTO `animated_main_sections` (`id`, `selected_id`, `name`, `style`, `js`, `html`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Horizontal Rotate Animated Slider', 'animateSlider', NULL, 'horizontal_animated_slider', 'The horizontal animation slider is rotating horizontally', NULL, NULL),
(2, 1, 'Cube Rotate Animated Slider', 'cubeRotate', NULL, 'cube_rotate', 'The slider rotates cube wise', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animated_sliders`
--

CREATE TABLE `animated_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animated_sliders`
--

INSERT INTO `animated_sliders` (`id`, `section_id`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`, `image_7`, `image_8`, `image_9`, `image_10`, `created_at`, `updated_at`) VALUES
(1, 1, '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animated_slider_images`
--

CREATE TABLE `animated_slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `selected_animation_id` bigint(20) UNSIGNED NOT NULL,
  `animation_main_section_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animated_slider_images`
--

INSERT INTO `animated_slider_images` (`id`, `selected_animation_id`, `animation_main_section_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406615124-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00'),
(2, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406619367-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00'),
(3, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406621889-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00'),
(4, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406624056-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00'),
(5, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406626373-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00'),
(6, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406629225-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00'),
(7, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406631960-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00'),
(8, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406634534-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00'),
(9, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406637145-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00'),
(10, 1, 1, 'image/upload/animatedSlide/uploadedimages/1740983406639320-20220812190600.png', '2022-08-12 13:36:00', '2022-08-12 13:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `animated_slider_texts`
--

CREATE TABLE `animated_slider_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animated_slider_texts`
--

INSERT INTO `animated_slider_texts` (`id`, `title`, `sub_title`, `content`, `created_at`, `updated_at`) VALUES
(1, '<h1 style=\"text-align: center;\"><span style=\"color: rgb(52, 73, 94); font-size: 36pt;\">The Garment Industry In Vietnam</span></h1>', '<h3><strong><em><span style=\"color: rgb(186, 55, 42);\">NG International</span></em></strong></h3>', '<p>Vietnam\'s textile and garment industry has been developing strongly and plays an increasingly important role in economic growth of the country. This industry also has a great impact on Vietnam\'s socio-economic development. At the same time, the textile and garment industry employs more than 1.6 million people, accounting for more than 12% of the industrial workforce and nearly 5% of the country\'s total labor force. This article aims to provide an overview of the Vietnam&rsquo;s textile and garment industry and the vision of Vietnam\'s textile and garment industry to 2030. The results show that Vietnam&rsquo;s textile and garment industry has contributed great value to Vietnam&rsquo;s exports and GDP as well as solving employment. However, the Vietnam&rsquo;s textile and garment industry still has some limitations. First, the mode of production is mainly based on the CMT (the mode of production produces the lowest added value). Second, the incomes and capacities of the labors have not matched with the development of the industry. Third, the size of enterprises is small, so the competitiveness of Vietnam&rsquo;s textile and garment industry is limited in the international arena.</p>', NULL, '2022-08-12 14:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `blog_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `blog_category`, `blog_title`, `blog_tags`, `blog_content`, `blog_video_url`, `created_at`, `updated_at`) VALUES
(5, 1, 'NG International', 'Selecting garment accessories, trims, and closures', 'NG International,Garment', '<p><span style=\"font-family: \'Tiro Gurmukhi\', serif; font-size: 12pt;\">Trims and accessories are used to enhance the aesthetic appeal of the garment. But any defect in the accessories used in the finished product is bound to invite customer complaints about a garment that is otherwise considered to be of good quality.</span></p>\r\n<p><span style=\"font-family: \'Tiro Gurmukhi\', serif; font-size: 12pt;\">In the&nbsp;<span class=\"topic-highlight\">garment industry</span>, trims and accessories are used in a wide variety and in huge quantities. This makes the 100% inspection of trims and accessories an almost impossible task. Moreover, inspection alone cannot assure quality. Hence, there is a need to establish an effective and efficient procurement system for trims as a preventive measure. This involves the following steps:</span></p>\r\n<ol style=\"list-style-type: upper-alpha;\">\r\n<li><span style=\"font-size: 12pt; font-family: \'Tiro Gurmukhi\', serif;\"><strong>Establishing the purchasing data</strong>. Before procurement of trims and accessories, it is necessary to develop specifications for the items to be purchased. It is always better to have standard trim cards (duly approved by buyers) for each style in duplicate, a copy of which may be sent to the vendors along with the purchase order. The purchase order should clearly mention the specifications of trims like color, shade, and measurement (width and length) with tolerance limit, and where applicable the appropriate standard to which the product should conform.</span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'Tiro Gurmukhi\', serif;\"><strong>Evaluation of vendor and preparation of approved vendor list.</strong>&nbsp;The organization should establish a suitable system for evaluation of vendors based on certain criteria with suitable weightage, which may include, but are not limited to, the following:</span>\r\n<ol>\r\n<li><span style=\"font-size: 12pt; font-family: \'Tiro Gurmukhi\', serif;\">Quality of supplied item (expressed in terms of percentage rejection)</span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'Tiro Gurmukhi\', serif;\">Price</span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'Tiro Gurmukhi\', serif;\">Delivery Schedule</span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'Tiro Gurmukhi\', serif;\">Availability of items both in terms of quantity and variety</span></li>\r\n<li><span style=\"font-size: 12pt; font-family: \'Tiro Gurmukhi\', serif;\">Responsiveness, etc.</span></li>\r\n</ol>\r\n</li>\r\n<li><span style=\"font-size: 12pt; font-family: \'Tiro Gurmukhi\', serif;\">Wherever necessary, the capability of the vendor may be judged on the basis of on-site assessment and review of the quality management system.</span></li>\r\n</ol>\r\n<p><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png\" alt=\"\" width=\"354\" height=\"266\" />&nbsp;</p>', 'ZL5OMrxfMrE', '2022-08-25 16:43:02', '2022-08-25 18:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_category`, `created_at`, `updated_at`) VALUES
(1, 'NG International', '2022-08-22 14:39:13', NULL),
(2, 'Men', '2022-08-22 14:39:26', NULL),
(3, 'Kids', '2022-08-22 14:39:37', NULL),
(4, 'Ladies', '2022-08-22 14:39:49', NULL),
(5, 'Apparel', '2022-08-22 14:40:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_id`, `image`, `count_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'image/upload/blog/1742172934655482-2022-08-25-22-13-02.png', 1, '2022-08-25 16:43:02', NULL),
(2, 5, 'image/upload/blog/1742172934659467-2022-08-25-22-13-02.png', 2, '2022-08-25 16:43:02', NULL),
(3, 5, 'image/upload/blog/1742172934662485-2022-08-25-22-13-02.png', 3, '2022-08-25 16:43:02', NULL),
(4, 5, 'image/upload/blog/1742172934665519-2022-08-25-22-13-02.png', 4, '2022-08-25 16:43:02', NULL),
(5, 5, 'image/upload/blog/1742172934667857-2022-08-25-22-13-02.png', 5, '2022-08-25 16:43:02', NULL),
(6, 5, 'image/upload/blog/1742172934670152-2022-08-25-22-13-02.png', 6, '2022-08-25 16:43:02', NULL),
(7, 5, 'image/upload/blog/1742172934673035-2022-08-25-22-13-02.png', 7, '2022-08-25 16:43:02', NULL),
(8, 5, 'image/upload/blog/1742172934675551-2022-08-25-22-13-02.png', 8, '2022-08-25 16:43:02', NULL),
(9, 5, 'image/upload/blog/1742172934677952-2022-08-25-22-13-02.png', 9, '2022-08-25 16:43:02', NULL),
(10, 5, 'image/upload/blog/1742172934680392-2022-08-25-22-13-02.png', 10, '2022-08-25 16:43:02', NULL),
(11, 5, 'image/upload/blog/1742172934682936-2022-08-25-22-13-02.png', 11, '2022-08-25 16:43:02', NULL),
(12, 5, 'image/upload/blog/1742172934687033-2022-08-25-22-13-02.png', 12, '2022-08-25 16:43:02', NULL),
(14, 5, 'image/upload/blog/1742177062263193-2022-08-25-23-18-38.png', 13, '2022-08-25 17:48:38', NULL),
(15, 5, 'image/upload/blog/1742177062271512-2022-08-25-23-18-38.png', 15, '2022-08-25 17:48:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 'NG International', '2022-08-22 16:01:42', NULL),
(2, 'Garments', '2022-08-22 16:01:42', NULL),
(3, 'Fabric', '2022-08-22 22:08:38', NULL),
(4, 'Apparel', '2022-08-23 09:27:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_pages`
--

CREATE TABLE `contact_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_pages`
--

INSERT INTO `contact_pages` (`id`, `title`, `sub_title`, `content`, `image`, `address`, `latitude`, `longitude`, `city`, `created_at`, `updated_at`) VALUES
(1, '<p style=\"text-align: center;\"><span style=\"font-size: 46pt; font-family: \'Tiro Gurmukhi\', serif;\"><span style=\"color: #000080;\">Contact Us</span></span></p>', '<p style=\"text-align: center;\"><span style=\"font-size: 20pt; font-family: \'Tiro Gurmukhi\', serif; color: #000080;\">NG International Vietnam</span></p>', '<p><span style=\"font-size: 14pt; font-family: DynaPuff, cursive;\">Email: <a title=\"marketing@nginternation.org\" href=\"mailto:marketing@nginternation.org\">marketing@nginternation.org</a></span></p>', 'image/upload/contact_page/1741104329020361NG-International-Contact-Page-Image.gif', 'Western Bakery, Millewa, Sri Lanka', '6.777888', '80.0632337', 'Kalutara', NULL, '2022-08-13 23:21:30');

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
-- Table structure for table `home_about_us`
--

CREATE TABLE `home_about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_path_01` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path_02` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path_03` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path_04` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path_05` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path_06` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path_07` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_about_us`
--

INSERT INTO `home_about_us` (`id`, `user_id`, `image_path_01`, `image_path_02`, `image_path_03`, `image_path_04`, `image_path_05`, `image_path_06`, `image_path_07`, `title`, `sub_title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'image/upload/home_about_us/1755092996583894.png', 'image/upload/home_about_us/1755092996688335.png', 'image/upload/home_about_us/1755092996768170.png', 'image/upload/home_about_us/1755092996898099.png', 'image/upload/home_about_us/1755092997010993.png', 'image/upload/home_about_us/1755092997090918.png', 'image/upload/home_about_us/1755092997171306.png', '<h1><span style=\"font-family: DynaPuff, cursive; font-size: 36pt;\"><strong>I have transformed your ideas into remarkable digital products</strong></span></h1>', '<h3>20+ Years Experience In this game, Means Product Designing</h3>', '<p>I love to work in User Experience &amp; User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience. I have been working</p>', '2023-01-14 12:02:34', '2023-01-15 08:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `home_services`
--

CREATE TABLE `home_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_top_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_sub_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_sub_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_services`
--

INSERT INTO `home_services` (`id`, `section_top_image`, `section_sub_image`, `section_title`, `section_content`, `section_sub_content`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'image/upload/home_service/01.png', 'image/upload/home_service/02.png', '<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h3>', '<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</strong></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'www.google.com', NULL, NULL),
(2, 'image/upload/home_service/03.png', 'image/upload/home_service/04.png', '<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h3>', '<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</strong></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'www.google.com', NULL, NULL),
(3, 'image/upload/home_service/05.png', 'image/upload/home_service/06.png', '<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h3>', '<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</strong></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'www.google.com', NULL, NULL),
(4, 'image/upload/home_service/07.png', 'image/upload/home_service/08.png', '<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h3>', '<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</strong></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'www.google.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_service_titles`
--

CREATE TABLE `home_service_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_service_titles`
--

INSERT INTO `home_service_titles` (`id`, `main_title`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_slides`
--

CREATE TABLE `home_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_slides`
--

INSERT INTO `home_slides` (`id`, `title`, `short_title`, `home_slide`, `video_url`, `created_at`, `updated_at`) VALUES
(1, '<h1 style=\"text-align: center;\"><span style=\"font-family: \'times new roman\', times, serif; font-size: 36pt; color: rgb(22, 145, 121);\"><em>NG International</em></span></h1>', '<p style=\"text-align: center;\"><span style=\"color: rgb(53, 152, 219);\"><strong>Vietnam is becoming an increasingly important country in garment exports</strong></span></p>', 'image/upload/homeSlide/uploadedImage/1740796661515367.png', 'ZL5OMrxfMrE', NULL, '2022-08-12 14:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

CREATE TABLE `image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_galleries`
--

INSERT INTO `image_galleries` (`id`, `user_id`, `image_path`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'image/upload/gallery/1742193221028724-gallery-image-2022-08-26-03-35-29.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193221028724-gallery-image-2022-08-26-03-35-29.png', '2022-08-25 22:05:29', NULL),
(2, 1, 'image/upload/gallery/1742193221314685-gallery-image-2022-08-26-03-35-29.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193221314685-gallery-image-2022-08-26-03-35-29.png', '2022-08-25 22:05:29', NULL),
(3, 1, 'image/upload/gallery/1742193239529118-gallery-image-2022-08-26-03-35-46.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193239529118-gallery-image-2022-08-26-03-35-46.png', '2022-08-25 22:05:46', NULL),
(4, 1, 'image/upload/gallery/1742193240414600-gallery-image-2022-08-26-03-35-47.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193240414600-gallery-image-2022-08-26-03-35-47.png', '2022-08-25 22:05:47', NULL),
(5, 1, 'image/upload/gallery/1742193240753316-gallery-image-2022-08-26-03-35-47.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193240753316-gallery-image-2022-08-26-03-35-47.png', '2022-08-25 22:05:47', NULL),
(6, 1, 'image/upload/gallery/1742193241657181-gallery-image-2022-08-26-03-35-48.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193241657181-gallery-image-2022-08-26-03-35-48.png', '2022-08-25 22:05:48', NULL),
(7, 1, 'image/upload/gallery/1742193241963925-gallery-image-2022-08-26-03-35-49.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193241963925-gallery-image-2022-08-26-03-35-49.png', '2022-08-25 22:05:49', NULL),
(8, 1, 'image/upload/gallery/1742193242783548-gallery-image-2022-08-26-03-35-49.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193242783548-gallery-image-2022-08-26-03-35-49.png', '2022-08-25 22:05:49', NULL),
(9, 1, 'image/upload/gallery/1742193243069831-gallery-image-2022-08-26-03-35-50.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193243069831-gallery-image-2022-08-26-03-35-50.png', '2022-08-25 22:05:50', NULL),
(10, 1, 'image/upload/gallery/1742193244177873-gallery-image-2022-08-26-03-35-51.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193244177873-gallery-image-2022-08-26-03-35-51.png', '2022-08-25 22:05:51', NULL),
(11, 1, 'image/upload/gallery/1742193244599064-gallery-image-2022-08-26-03-35-51.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193244599064-gallery-image-2022-08-26-03-35-51.png', '2022-08-25 22:05:51', NULL),
(12, 1, 'image/upload/gallery/1742193245446072-gallery-image-2022-08-26-03-35-52.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193245446072-gallery-image-2022-08-26-03-35-52.png', '2022-08-25 22:05:52', NULL),
(13, 1, 'image/upload/gallery/1742193246694707-gallery-image-2022-08-26-03-35-53.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193246694707-gallery-image-2022-08-26-03-35-53.png', '2022-08-25 22:05:53', NULL),
(14, 1, 'image/upload/gallery/1742193247359430-gallery-image-2022-08-26-03-35-54.png', 'http://127.0.0.1:8000/image/upload/gallery/1742193247359430-gallery-image-2022-08-26-03-35-54.png', '2022-08-25 22:05:54', NULL),
(23, 1, 'image/upload/gallery/1742199279356062-gallery-image-2022-08-26-05-11-46.png', 'http://127.0.0.1:8000/image/upload/gallery/1742199279356062-gallery-image-2022-08-26-05-11-46.png', '2022-08-25 23:41:46', NULL),
(24, 1, 'image/upload/gallery/1742510172475890-gallery-image-2022-08-29-15-33-17.png', 'http://127.0.0.1:8000/image/upload/gallery/1742510172475890-gallery-image-2022-08-29-15-33-17.png', '2022-08-29 10:03:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_statuses`
--

CREATE TABLE `login_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_statuses`
--

INSERT INTO `login_statuses` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'Reset_Password_The_After_Login', 'Reset Password The After Login', '2022-08-29 03:52:16', '2022-08-29 03:52:16'),
(2, 'Don_Not_Reset_The_Password_After_Login', 'Don Not Reset The Password After Login', '2022-08-29 03:52:16', '2022-08-29 03:52:16');

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
(5, '2022_08_01_062649_create_home_slides_table', 2),
(6, '2022_08_04_071242_create_user_roles_table', 3),
(7, '2022_08_10_105711_create_animated_sliders_table', 4),
(8, '2022_08_10_105850_create_animated_main_sections_table', 4),
(9, '2022_08_10_115601_create_selected_animations_table', 5),
(10, '2022_08_12_035518_create_animated_slider_images_table', 6),
(11, '2022_08_12_181148_create_animated_slider_texts_table', 7),
(12, '2022_08_13_182936_create_about_pages_table', 8),
(13, '2022_08_14_014931_create_contact_pages_table', 9),
(14, '2022_08_14_064510_create_blog_pages_table', 10),
(15, '2022_08_14_065728_create_blog_images_table', 11),
(17, '2014_01_07_073615_create_tagged_table', 12),
(18, '2014_01_07_073615_create_tags_table', 12),
(19, '2016_06_29_073615_create_tag_groups_table', 12),
(20, '2016_06_29_073615_update_tags_table', 12),
(21, '2020_03_13_083515_add_description_to_tags_table', 12),
(23, '2022_08_14_203139_create_blog_tags_table', 13),
(24, '2022_08_15_110804_laratrust_setup_tables', 14),
(25, '2022_08_19_083738_create_blog_categories_table', 15),
(26, '2022_08_23_030706_create_blogs_table', 16),
(27, '2022_08_25_124244_create_image_galleries_table', 17),
(32, '2022_08_29_005423_create_user_statuses_table', 18),
(33, '2022_08_29_035009_create_login_statuses_table', 19),
(35, '2023_01_14_100622_create_home_about_us_table', 20),
(36, '2023_01_15_133552_create_home_services_table', 21),
(37, '2023_01_15_135000_create_home_service_titles_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('buddhika@benmaze.com', '$2y$10$Hl91zO6WcFI61X0uZ.JXEuo4sVK9rYg7iQgM/g2qpnstKcI3Iwsfy', '2022-06-29 08:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users_create', 'Create Users', 'The user can creates the user', '2022-08-15 06:01:44', '2022-08-15 06:01:44'),
(2, 'view_user', 'View User', 'The user can views user', '2022-08-15 06:01:44', '2022-08-15 06:01:44'),
(3, 'users-update', 'Update Users', 'The user can update the user', '2022-08-15 06:01:44', '2022-08-15 06:01:44'),
(4, 'users_delete', 'Delete Users', 'The user can delete the user', '2022-08-15 06:01:44', '2022-08-15 06:01:44'),
(5, 'make_payments', 'Make Payments', 'The user can create the payments', '2022-08-15 06:01:44', '2022-08-15 06:01:44'),
(6, 'view_payments', 'View Payments', 'The user can view the payments', '2022-08-15 06:01:44', '2022-08-15 06:01:44'),
(7, 'payments_update', 'Update Payments', 'The user can update the payments', '2022-08-15 06:01:44', '2022-08-15 06:01:44'),
(8, 'payments_delete', 'Delete Payments', 'The user can delete the payments', '2022-08-15 06:01:44', '2022-08-15 06:01:44'),
(9, 'profile_create', 'Create Profile', 'The user can create profile', '2022-08-15 06:01:45', '2022-08-15 06:01:45'),
(10, 'profile_update', 'Update Profile', 'The user can update the profile', '2022-08-15 06:01:45', '2022-08-15 06:01:45'),
(11, 'profile_delete', 'Delete Profile', 'The user can delete the profile', '2022-08-15 06:01:45', '2022-08-15 06:01:45'),
(12, 'profile_view', 'View Profile', 'The user can view the profile', '2022-08-15 06:01:45', '2022-08-15 06:01:45'),
(13, 'create_product', 'Create Product', 'The user can create the product', '2022-08-15 06:01:45', '2022-08-15 06:01:45'),
(14, 'view_product', 'View Product', 'The user can view the product', '2022-08-15 06:01:45', '2022-08-15 06:01:45'),
(15, 'edit_product', 'Edit Product', 'The user can edit product', '2022-08-18 22:46:51', '2022-08-18 22:46:51'),
(16, 'delete_product', 'Delete Product', 'The user can delete the product', '2022-08-18 22:46:51', '2022-08-18 22:46:51'),
(17, 'create_site', 'Create Site', 'The user can create the site sections', '2022-08-27 13:09:34', '2022-08-27 13:10:53'),
(18, 'delete_site', 'Delete Site', 'The user can delete site sections', '2022-08-27 13:09:34', '2022-08-27 13:11:05'),
(19, 'update_site', 'Update Site', 'The user can update site sections', '2022-08-27 13:09:34', '2022-08-27 13:11:22'),
(20, 'view site', 'View Site', 'The user can view site sections', '2022-08-27 13:18:57', '2022-08-27 13:18:57'),
(21, 'create_blog', 'Create Blog', 'The user creates the blog', '2022-08-27 13:24:01', '2022-08-27 13:24:01'),
(22, 'view_blog', 'View Blog', 'The user views the blog', '2022-08-27 13:24:01', '2022-08-27 13:24:01'),
(23, 'edit_blog', 'Edit Blog', 'The user edits the blog', '2022-08-27 13:52:53', '2022-08-27 13:52:53'),
(24, 'delete_blog', 'Delete Blog', 'The user deletes the blog', '2022-08-27 13:52:53', '2022-08-27 13:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_identities` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_identities`, `role_id`) VALUES
('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24', 1),
('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,21,22,23,24', 2),
('2,5,6,7,8,9,10,11,12,13,14,15,16,20,21,22,23,24', 7),
('2,5,6,7,8,9,10,11,12,13,14,15,16,20,22', 5),
('2,5,6,9,10,11,12,14,20,22', 6),
('2,5,9,10,11,12,14,20,21,22,23,24', 4),
('2,5,9,10,11,12,14,20,22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_administrator', 'Superadministrator', 'Superadministrator', '2022-08-15 06:01:44', '2022-08-15 06:01:44'),
(2, 'administrator', 'Administrator', 'Administrator', '2022-08-15 06:01:45', '2022-08-15 06:01:45'),
(3, 'user', 'User', 'User', '2022-08-15 06:01:45', '2022-08-15 06:01:45'),
(4, 'blog_writer', 'Blog Writer', 'Who write blogs', '2022-08-15 06:01:45', '2022-08-15 06:01:45'),
(5, 'seller', 'Seller', 'Sell product', '2022-08-18 22:49:21', '2022-08-18 22:49:21'),
(6, 'buyer', 'Buyer', 'Buying products', '2022-08-18 22:49:38', '2022-08-28 10:46:47'),
(7, 'chairman', 'Chairman', 'Responsible for leading the Board and focusing it on strategic matters, overseeing the Group\'s business and setting high governance standards.', '2022-08-26 15:14:21', '2022-08-28 10:57:46'),
(8, 'managing_director', 'Managing director', 'The most senior full-time executive of the company', '2022-08-26 17:03:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(5, 4, 'App\\Models\\User'),
(6, 5, 'App\\Models\\User'),
(2, 6, 'App\\Models\\User'),
(7, 7, 'App\\Models\\User'),
(2, 8, 'App\\Models\\User'),
(2, 10, 'App\\Models\\User'),
(4, 11, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `selected_animations`
--

CREATE TABLE `selected_animations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selected_animations`
--

INSERT INTO `selected_animations` (`id`, `main_section_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tagged`
--

CREATE TABLE `tagging_tagged` (
  `id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tags`
--

CREATE TABLE `tagging_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT 0,
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `tag_group_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tag_groups`
--

CREATE TABLE `tagging_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` bigint(20) UNSIGNED NOT NULL,
  `login_status` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `status`, `login_status`, `email`, `email_verified_at`, `password`, `username`, `profile_image`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Buddhika Atapattu', 1, 1, 2, 'buddhika12343@gmail.com', '2022-08-18 17:09:03', '$2y$10$sUirvxdhEJ2CQmxetjgZ1OShlynLM3ew/zVO7R2VefaepQ38sQciK', 'Buddhika1996', 'NG-International-UIMG-2022-08-18-22-38-19-0.019-62febf5bd4829.png', '', 'mHjzlHaCikXHTYYccS2C7JEgyW625aQisbKzVF9blLkLRMt3CWGfEABWoLyd', '2022-08-18 17:08:49', '2022-08-18 17:09:03'),
(2, 'Samira Usoof', 2, 1, 2, 'samira@gmail.com', '2022-08-19 02:40:12', '$2y$10$yLk1BcNWDjd1Fd1jsaSo9unPEMe9l..wPZNmVwYhAyjBzrWGh5AdK', 'Samira1998', 'NG-International-UIMG-2022-08-19-08-08-57-0.057-62ff4519474a0.png', '', 'sVCqHfD5b6AR2MWaiCvIAMVXpAh1WQhAHNG4LD7pRl3WjRBbpW73OUPPJoLw', '2022-08-19 02:39:47', '2022-08-19 02:40:12'),
(4, 'Saara Usoof', 5, 1, 2, 'saara@gmail.com', '2022-08-29 16:51:56', '$2y$10$V85kK2FAlikKdWm7Q0kHvOLgWEYYcOohafDJi4xogPaYNOptDRszu', 'Saara2005', NULL, '', NULL, '2022-08-29 16:44:35', '2022-08-30 20:17:55'),
(5, 'Pubuduni Atapattu', 6, 1, 1, 'pubuduni@gmail.com', '2022-08-29 16:53:24', '$2y$10$kse4SSTkDSJdFo7vdwisFO2FBCT1evv37cLWxXCtNBW5OEY9zzGNi', 'Pubuduni1993', NULL, '', NULL, '2022-08-29 16:50:00', '2022-08-29 16:53:24'),
(6, 'Gamini Atapattu', 2, 1, 1, 'gamini@gmail.com', NULL, '$2y$10$SDaywx8pQwyGw7yvsEcxnOUE86ez90OKIkazlDzNjzrTDVGctNxwm', 'Gamini1234', NULL, '', NULL, '2022-08-29 17:22:41', '2022-08-29 17:22:41'),
(7, 'Anoma Alwis', 7, 1, 1, 'anoma@gmail.com', NULL, '$2y$10$pWcn.b2wmf0Nr7vIyDQ1teKkhHkFshBXH2YoUKtMkTT.UH3PDEJsC', 'Anoma1234', NULL, '', NULL, '2022-08-29 17:28:29', '2022-08-29 17:28:29'),
(10, 'Buddhika Lahiru', 2, 2, 1, 'atapattu.buddhika@gmail.com', NULL, '$2y$10$khz1BocStEdIxoJ4sIcfzu77WhokNUbaa.rwA9w7MaQAB3k7oLiOG', 'Buddhika1018', NULL, '', NULL, '2022-08-30 02:29:51', '2022-08-31 00:44:21'),
(11, 'Buddhika Atapattu', 4, 1, 2, 'buddhika@benmaze.com', '2022-08-31 11:43:27', '$2y$10$F6Vt6SGQrfkIS0nDJScK.ubjDKQujtidVAl6uwpck8QF0Y1xrlfk.', 'Buddhika19961018', 'NG-International-UIMG-2022-08-31-17-10-18-0.018-630f95fa09e3e.png', 'No.395/5,Polhena,Millawa', NULL, '2022-08-31 11:40:25', '2022-08-31 11:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_statuses`
--

CREATE TABLE `user_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_statuses`
--

INSERT INTO `user_statuses` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'active', 'Active', '2022-08-29 00:56:12', '2022-08-29 00:56:12'),
(2, 'suspended', 'Suspended', '2022-08-29 00:56:12', '2022-08-29 00:56:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_pages`
--
ALTER TABLE `about_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animated_main_sections`
--
ALTER TABLE `animated_main_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selected_id` (`selected_id`);

--
-- Indexes for table `animated_sliders`
--
ALTER TABLE `animated_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `animated_slider_images`
--
ALTER TABLE `animated_slider_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animation_main_section_id` (`animation_main_section_id`),
  ADD KEY `selected_animation_id` (`selected_animation_id`);

--
-- Indexes for table `animated_slider_texts`
--
ALTER TABLE `animated_slider_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_pages`
--
ALTER TABLE `contact_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_about_us`
--
ALTER TABLE `home_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_services`
--
ALTER TABLE `home_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_service_titles`
--
ALTER TABLE `home_service_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slides`
--
ALTER TABLE `home_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_galleries`
--
ALTER TABLE `image_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login_statuses`
--
ALTER TABLE `login_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_statuses_name_unique` (`name`),
  ADD UNIQUE KEY `login_statuses_display_name_unique` (`display_name`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `name` (`name`,`display_name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_identities`,`role_id`),
  ADD UNIQUE KEY `role_id` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `selected_animations`
--
ALTER TABLE `selected_animations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_section_id` (`main_section_id`);

--
-- Indexes for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  ADD KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  ADD KEY `tagging_tagged_tag_slug_index` (`tag_slug`);

--
-- Indexes for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tags_slug_index` (`slug`),
  ADD KEY `tagging_tags_tag_group_id_foreign` (`tag_group_id`);

--
-- Indexes for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tag_groups_slug_index` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `status` (`status`),
  ADD KEY `login_status` (`login_status`);

--
-- Indexes for table `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_statuses_name_unique` (`name`),
  ADD UNIQUE KEY `user_statuses_display_name_unique` (`display_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_pages`
--
ALTER TABLE `about_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animated_main_sections`
--
ALTER TABLE `animated_main_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animated_sliders`
--
ALTER TABLE `animated_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animated_slider_images`
--
ALTER TABLE `animated_slider_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `animated_slider_texts`
--
ALTER TABLE `animated_slider_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_pages`
--
ALTER TABLE `contact_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_about_us`
--
ALTER TABLE `home_about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_services`
--
ALTER TABLE `home_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_service_titles`
--
ALTER TABLE `home_service_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_slides`
--
ALTER TABLE `home_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image_galleries`
--
ALTER TABLE `image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `login_statuses`
--
ALTER TABLE `login_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `selected_animations`
--
ALTER TABLE `selected_animations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animated_main_sections`
--
ALTER TABLE `animated_main_sections`
  ADD CONSTRAINT `animated_main_sections_ibfk_1` FOREIGN KEY (`selected_id`) REFERENCES `selected_animations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `animated_sliders`
--
ALTER TABLE `animated_sliders`
  ADD CONSTRAINT `animated_sliders_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `animated_main_sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `animated_slider_images`
--
ALTER TABLE `animated_slider_images`
  ADD CONSTRAINT `animated_slider_images_ibfk_1` FOREIGN KEY (`animation_main_section_id`) REFERENCES `animated_main_sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `animated_slider_images_ibfk_2` FOREIGN KEY (`selected_animation_id`) REFERENCES `selected_animations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD CONSTRAINT `blog_images_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image_galleries`
--
ALTER TABLE `image_galleries`
  ADD CONSTRAINT `image_galleries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `selected_animations`
--
ALTER TABLE `selected_animations`
  ADD CONSTRAINT `selected_animations_ibfk_1` FOREIGN KEY (`main_section_id`) REFERENCES `animated_main_sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD CONSTRAINT `tagging_tags_tag_group_id_foreign` FOREIGN KEY (`tag_group_id`) REFERENCES `tagging_tag_groups` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`status`) REFERENCES `user_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`login_status`) REFERENCES `login_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
