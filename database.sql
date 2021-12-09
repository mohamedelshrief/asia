-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 01:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asiamobi`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'cT7WpxVKximSRcPOsXP4RFKDFC9tNxZu', 1, '2021-11-16 12:30:12', '2021-11-16 07:30:11', '2021-11-16 07:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_set_id` int(10) UNSIGNED NOT NULL,
  `is_filterable` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_categories`
--

CREATE TABLE `attribute_categories` (
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_sets`
--

CREATE TABLE `attribute_sets` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_set_translations`
--

CREATE TABLE `attribute_set_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_set_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value_translations`
--

CREATE TABLE `attribute_value_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_value_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) UNSIGNED DEFAULT NULL,
  `is_searchable` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(18,4) UNSIGNED DEFAULT NULL,
  `is_percent` tinyint(1) NOT NULL,
  `free_shipping` tinyint(1) NOT NULL,
  `minimum_spend` decimal(18,4) UNSIGNED DEFAULT NULL,
  `maximum_spend` decimal(18,4) UNSIGNED DEFAULT NULL,
  `usage_limit_per_coupon` int(10) UNSIGNED DEFAULT NULL,
  `usage_limit_per_customer` int(10) UNSIGNED DEFAULT NULL,
  `used` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_categories`
--

CREATE TABLE `coupon_categories` (
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `exclude` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_products`
--

CREATE TABLE `coupon_products` (
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `exclude` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_translations`
--

CREATE TABLE `coupon_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cross_sell_products`
--

CREATE TABLE `cross_sell_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `cross_sell_product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

CREATE TABLE `currency_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `currency`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'USD', '1.0000', '2021-11-16 07:30:19', '2021-11-16 07:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `default_addresses`
--

CREATE TABLE `default_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entity_files`
--

CREATE TABLE `entity_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_products`
--

CREATE TABLE `flash_sale_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `flash_sale_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `end_date` date NOT NULL,
  `price` decimal(18,4) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_product_orders`
--

CREATE TABLE `flash_sale_product_orders` (
  `flash_sale_product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_translations`
--

CREATE TABLE `flash_sale_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `flash_sale_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) UNSIGNED DEFAULT NULL,
  `is_root` tinyint(1) NOT NULL DEFAULT 0,
  `is_fluid` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_translations`
--

CREATE TABLE `menu_item_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_item_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_translations`
--

CREATE TABLE `menu_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_data_translations`
--

CREATE TABLE `meta_data_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_data_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(2, '2014_10_14_200250_create_settings_table', 1),
(3, '2014_10_26_162751_create_files_table', 1),
(4, '2014_10_30_191858_create_pages_table', 1),
(5, '2014_11_31_125848_create_page_translations_table', 1),
(6, '2015_02_27_105241_create_entity_files_table', 1),
(7, '2015_11_20_184604486385_create_translations_table', 1),
(8, '2015_11_20_184604743083_create_translation_translations_table', 1),
(9, '2017_05_29_155126144426_create_products_table', 1),
(10, '2017_05_30_155126416338_create_product_translations_table', 1),
(11, '2017_08_02_153217_create_options_table', 1),
(12, '2017_08_02_153348_create_option_translations_table', 1),
(13, '2017_08_02_153406_create_option_values_table', 1),
(14, '2017_08_02_153736_create_option_value_translations_table', 1),
(15, '2017_08_03_156576_create_product_options_table', 1),
(16, '2017_08_17_170128_create_related_products_table', 1),
(17, '2017_08_17_175236_create_up_sell_products_table', 1),
(18, '2017_08_17_175828_create_cross_sell_products_table', 1),
(19, '2017_11_09_141332910964_create_categories_table', 1),
(20, '2017_11_09_141332931539_create_category_translations_table', 1),
(21, '2017_11_26_083614526622_create_meta_data_table', 1),
(22, '2017_11_26_083614526828_create_meta_data_translations_table', 1),
(23, '2018_01_24_125642_create_product_categories_table', 1),
(24, '2018_02_04_150917488267_create_coupons_table', 1),
(25, '2018_02_04_150917488698_create_coupon_translations_table', 1),
(26, '2018_03_11_181317_create_coupon_products_table', 1),
(27, '2018_03_15_091937_create_coupon_categories_table', 1),
(28, '2018_04_18_154028776225_create_reviews_table', 1),
(29, '2018_05_17_115822452977_create_currency_rates_table', 1),
(30, '2018_07_03_124153537506_create_sliders_table', 1),
(31, '2018_07_03_124153537695_create_slider_translations_table', 1),
(32, '2018_07_03_133107770172_create_slider_slides_table', 1),
(33, '2018_07_03_133107770486_create_slider_slide_translations_table', 1),
(34, '2018_07_28_190524758357_create_attribute_sets_table', 1),
(35, '2018_07_28_190524758497_create_attribute_set_translations_table', 1),
(36, '2018_07_28_190524758646_create_attributes_table', 1),
(37, '2018_07_28_190524758877_create_attribute_translations_table', 1),
(38, '2018_07_28_190524759461_create_product_attributes_table', 1),
(39, '2018_08_01_001919718631_create_tax_classes_table', 1),
(40, '2018_08_01_001919718935_create_tax_class_translations_table', 1),
(41, '2018_08_01_001919723551_create_tax_rates_table', 1),
(42, '2018_08_01_001919723781_create_tax_rate_translations_table', 1),
(43, '2018_08_03_195922206748_create_attribute_values_table', 1),
(44, '2018_08_03_195922207019_create_attribute_value_translations_table', 1),
(45, '2018_08_04_190524764275_create_product_attribute_values_table', 1),
(46, '2018_08_07_135631306565_create_orders_table', 1),
(47, '2018_08_07_135631309451_create_order_products_table', 1),
(48, '2018_08_07_135631309512_create_order_product_options_table', 1),
(49, '2018_08_07_135631309624_create_order_product_option_values_table', 1),
(50, '2018_09_11_213926106353_create_transactions_table', 1),
(51, '2018_09_19_081602135631_create_order_taxes_table', 1),
(52, '2018_09_19_103745_create_setting_translations_table', 1),
(53, '2018_10_01_224852175056_create_wish_lists_table', 1),
(54, '2018_10_04_185608_create_search_terms_table', 1),
(55, '2018_11_03_160015_create_menus_table', 1),
(56, '2018_11_03_160138_create_menu_translations_table', 1),
(57, '2018_11_03_160753_create_menu_items_table', 1),
(58, '2018_11_03_160804_create_menu_item_translation_table', 1),
(59, '2019_02_05_162605_add_position_to_slider_slides_table', 1),
(60, '2019_02_09_164343_remove_file_id_from_slider_slides_table', 1),
(61, '2019_02_09_164434_add_file_id_to_slider_slide_translations_table', 1),
(62, '2019_02_14_103408_create_attribute_categories_table', 1),
(63, '2019_08_09_164759_add_slug_column_to_attributes_table', 1),
(64, '2019_11_01_201511_add_special_price_type_column_to_products_table', 1),
(65, '2019_11_23_193101_add_value_column_to_order_product_options_table', 1),
(66, '2020_01_04_211424_add_icon_column_to_menu_items_table', 1),
(67, '2020_01_05_160502_add_direction_column_to_slider_slide_translations_table', 1),
(68, '2020_01_05_234014_add_speed_column_to_sliders_table', 1),
(69, '2020_01_05_235014_add_fade_column_to_sliders_table', 1),
(70, '2020_01_15_000346259038_create_flash_sales_table', 1),
(71, '2020_01_15_000346259349_create_flash_sale_translations_table', 1),
(72, '2020_01_23_011234_create_flash_sale_products_table', 1),
(73, '2020_01_30_015722_create_flash_sale_product_orders_table', 1),
(74, '2020_02_22_215943_delete_meta_keywords_column_from_meta_data_translations_table', 1),
(75, '2020_03_05_214602901973_create_brands_table', 1),
(76, '2020_03_05_214602902369_create_brand_translations_table', 1),
(77, '2020_03_06_234605_add_brand_id_column_to_products_table', 1),
(78, '2020_04_06_211526_add_note_column_to_orders_table', 1),
(79, '2020_04_28_034118164376_create_tags_table', 1),
(80, '2020_04_28_034118164618_create_tag_translations_table', 1),
(81, '2020_04_28_225657_create_product_tags_table', 1),
(82, '2020_05_10_041616_create_updater_scripts_table', 1),
(83, '2020_10_07_175000_create_addresses_table', 1),
(84, '2020_10_07_175004_create_default_addresses_table', 1),
(85, '2020_11_21_163822_add_downloads_columns_to_products_table', 1),
(86, '2021_01_08_203241_change_shipping_method_column_in_orders_table', 1),
(87, '2021_01_09_172744_add_phone_column_to_users_table', 1),
(88, '2021_01_11_170516_create_order_downloads_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` tinyint(1) NOT NULL,
  `is_global` tinyint(1) NOT NULL DEFAULT 1,
  `position` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `option_translations`
--

CREATE TABLE `option_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `option_values`
--

CREATE TABLE `option_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(18,4) UNSIGNED DEFAULT NULL,
  `price_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `option_value_translations`
--

CREATE TABLE `option_value_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_value_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` decimal(18,4) UNSIGNED NOT NULL,
  `shipping_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` decimal(18,4) UNSIGNED NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `discount` decimal(18,4) UNSIGNED NOT NULL,
  `total` decimal(18,4) UNSIGNED NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` decimal(18,4) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_downloads`
--

CREATE TABLE `order_downloads` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(18,4) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `line_total` decimal(18,4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product_options`
--

CREATE TABLE `order_product_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_product_id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product_option_values`
--

CREATE TABLE `order_product_option_values` (
  `order_product_option_id` int(10) UNSIGNED NOT NULL,
  `option_value_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(18,4) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_taxes`
--

CREATE TABLE `order_taxes` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `tax_rate_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(15,4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, '81rHBrQiniggUijK37sGzlokz5PfoqkZ', '2021-11-16 13:30:46', '2021-11-16 13:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `tax_class_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,4) UNSIGNED NOT NULL,
  `special_price` decimal(18,4) UNSIGNED DEFAULT NULL,
  `special_price_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_price_start` date DEFAULT NULL,
  `special_price_end` date DEFAULT NULL,
  `selling_price` decimal(18,4) UNSIGNED DEFAULT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manage_stock` tinyint(1) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `viewed` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL,
  `new_from` datetime DEFAULT NULL,
  `new_to` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `virtual` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `product_attribute_id` int(10) UNSIGNED NOT NULL,
  `attribute_value_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related_products`
--

CREATE TABLE `related_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `related_product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `reviewer_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `reviewer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `permissions`, `created_at`, `updated_at`) VALUES
(1, '{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.products.index\":true,\"admin.products.create\":true,\"admin.products.edit\":true,\"admin.products.destroy\":true,\"admin.brands.index\":true,\"admin.brands.create\":true,\"admin.brands.edit\":true,\"admin.brands.destroy\":true,\"admin.attributes.index\":true,\"admin.attributes.create\":true,\"admin.attributes.edit\":true,\"admin.attributes.destroy\":true,\"admin.attribute_sets.index\":true,\"admin.attribute_sets.create\":true,\"admin.attribute_sets.edit\":true,\"admin.attribute_sets.destroy\":true,\"admin.options.index\":true,\"admin.options.create\":true,\"admin.options.edit\":true,\"admin.options.destroy\":true,\"admin.filters.index\":true,\"admin.filters.create\":true,\"admin.filters.edit\":true,\"admin.filters.destroy\":true,\"admin.reviews.index\":true,\"admin.reviews.create\":true,\"admin.reviews.edit\":true,\"admin.reviews.destroy\":true,\"admin.categories.index\":true,\"admin.categories.create\":true,\"admin.categories.edit\":true,\"admin.categories.destroy\":true,\"admin.tags.index\":true,\"admin.tags.create\":true,\"admin.tags.edit\":true,\"admin.tags.destroy\":true,\"admin.orders.index\":true,\"admin.orders.show\":true,\"admin.orders.edit\":true,\"admin.flash_sales.index\":true,\"admin.flash_sales.create\":true,\"admin.flash_sales.edit\":true,\"admin.flash_sales.destroy\":true,\"admin.transactions.index\":true,\"admin.coupons.index\":true,\"admin.coupons.create\":true,\"admin.coupons.edit\":true,\"admin.coupons.destroy\":true,\"admin.menus.index\":true,\"admin.menus.create\":true,\"admin.menus.edit\":true,\"admin.menus.destroy\":true,\"admin.menu_items.index\":true,\"admin.menu_items.create\":true,\"admin.menu_items.edit\":true,\"admin.menu_items.destroy\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true,\"admin.pages.index\":true,\"admin.pages.create\":true,\"admin.pages.edit\":true,\"admin.pages.destroy\":true,\"admin.currency_rates.index\":true,\"admin.currency_rates.edit\":true,\"admin.taxes.index\":true,\"admin.taxes.create\":true,\"admin.taxes.edit\":true,\"admin.taxes.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.sliders.index\":true,\"admin.sliders.create\":true,\"admin.sliders.edit\":true,\"admin.sliders.destroy\":true,\"admin.importer.index\":true,\"admin.importer.create\":true,\"admin.reports.index\":true,\"admin.settings.edit\":true,\"admin.storefront.edit\":true}', '2021-11-16 07:30:10', '2021-11-16 07:30:10'),
(2, NULL, '2021-11-16 07:30:13', '2021-11-16 07:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_translations`
--

CREATE TABLE `role_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_translations`
--

INSERT INTO `role_translations` (`id`, `role_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'Admin'),
(2, 2, 'en', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `search_terms`
--

CREATE TABLE `search_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `results` int(10) UNSIGNED NOT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_translatable` tinyint(1) NOT NULL DEFAULT 0,
  `plain_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `is_translatable`, `plain_value`, `created_at`, `updated_at`) VALUES
(1, 'store_name', 1, NULL, '2021-11-16 07:30:12', '2021-11-16 07:30:12'),
(2, 'store_email', 0, 's:20:\"admin@fleetcart.test\";', '2021-11-16 07:30:12', '2021-11-16 07:30:15'),
(3, 'store_phone', 0, 's:9:\"234234234\";', '2021-11-16 07:30:12', '2021-11-16 07:30:12'),
(4, 'search_engine', 0, 's:5:\"mysql\";', '2021-11-16 07:30:13', '2021-11-16 07:30:13'),
(5, 'algolia_app_id', 0, 'N;', '2021-11-16 07:30:13', '2021-11-16 07:30:13'),
(6, 'algolia_secret', 0, 'N;', '2021-11-16 07:30:13', '2021-11-16 07:30:13'),
(7, 'active_theme', 0, 's:10:\"Storefront\";', '2021-11-16 07:30:13', '2021-11-16 07:30:13'),
(8, 'supported_countries', 0, 'a:1:{i:0;s:2:\"BD\";}', '2021-11-16 07:30:13', '2021-11-16 07:30:13'),
(9, 'default_country', 0, 's:2:\"BD\";', '2021-11-16 07:30:13', '2021-11-16 07:30:13'),
(10, 'supported_locales', 0, 'a:1:{i:0;s:2:\"en\";}', '2021-11-16 07:30:14', '2021-11-16 07:30:14'),
(11, 'default_locale', 0, 's:2:\"en\";', '2021-11-16 07:30:14', '2021-11-16 07:30:14'),
(12, 'default_timezone', 0, 's:10:\"Asia/Dhaka\";', '2021-11-16 07:30:14', '2021-11-16 07:30:14'),
(13, 'customer_role', 0, 'i:2;', '2021-11-16 07:30:14', '2021-11-16 07:30:14'),
(14, 'reviews_enabled', 0, 'b:1;', '2021-11-16 07:30:15', '2021-11-16 07:30:15'),
(15, 'auto_approve_reviews', 0, 'b:1;', '2021-11-16 07:30:15', '2021-11-16 07:30:15'),
(16, 'cookie_bar_enabled', 0, 'b:1;', '2021-11-16 07:30:15', '2021-11-16 07:30:15'),
(17, 'supported_currencies', 0, 'a:1:{i:0;s:3:\"USD\";}', '2021-11-16 07:30:15', '2021-11-16 07:30:15'),
(18, 'default_currency', 0, 's:3:\"USD\";', '2021-11-16 07:30:15', '2021-11-16 07:30:15'),
(19, 'send_order_invoice_email', 0, 'b:0;', '2021-11-16 07:30:15', '2021-11-16 07:30:15'),
(20, 'newsletter_enabled', 0, 'b:0;', '2021-11-16 07:30:16', '2021-11-16 07:30:16'),
(21, 'local_pickup_cost', 0, 'i:0;', '2021-11-16 07:30:16', '2021-11-16 07:30:16'),
(22, 'flat_rate_cost', 0, 'i:0;', '2021-11-16 07:30:16', '2021-11-16 07:30:16'),
(23, 'free_shipping_label', 1, NULL, '2021-11-16 07:30:16', '2021-11-16 07:30:16'),
(24, 'local_pickup_label', 1, NULL, '2021-11-16 07:30:16', '2021-11-16 07:30:16'),
(25, 'flat_rate_label', 1, NULL, '2021-11-16 07:30:16', '2021-11-16 07:30:16'),
(26, 'paypal_label', 1, NULL, '2021-11-16 07:30:16', '2021-11-16 07:30:16'),
(27, 'paypal_description', 1, NULL, '2021-11-16 07:30:16', '2021-11-16 07:30:16'),
(28, 'stripe_label', 1, NULL, '2021-11-16 07:30:17', '2021-11-16 07:30:17'),
(29, 'stripe_description', 1, NULL, '2021-11-16 07:30:17', '2021-11-16 07:30:17'),
(30, 'paytm_label', 1, NULL, '2021-11-16 07:30:17', '2021-11-16 07:30:17'),
(31, 'paytm_description', 1, NULL, '2021-11-16 07:30:17', '2021-11-16 07:30:17'),
(32, 'razorpay_label', 1, NULL, '2021-11-16 07:30:17', '2021-11-16 07:30:17'),
(33, 'razorpay_description', 1, NULL, '2021-11-16 07:30:17', '2021-11-16 07:30:17'),
(34, 'instamojo_label', 1, NULL, '2021-11-16 07:30:17', '2021-11-16 07:30:17'),
(35, 'instamojo_description', 1, NULL, '2021-11-16 07:30:18', '2021-11-16 07:30:18'),
(36, 'cod_label', 1, NULL, '2021-11-16 07:30:18', '2021-11-16 07:30:18'),
(37, 'cod_description', 1, NULL, '2021-11-16 07:30:18', '2021-11-16 07:30:18'),
(38, 'bank_transfer_label', 1, NULL, '2021-11-16 07:30:18', '2021-11-16 07:30:18'),
(39, 'bank_transfer_description', 1, NULL, '2021-11-16 07:30:18', '2021-11-16 07:30:18'),
(40, 'check_payment_label', 1, NULL, '2021-11-16 07:30:18', '2021-11-16 07:30:18'),
(41, 'check_payment_description', 1, NULL, '2021-11-16 07:30:18', '2021-11-16 07:30:18'),
(42, 'storefront_copyright_text', 1, 's:92:\"Copyright © <a href=\"{{ store_url }}\">{{ store_name }}</a> {{ year }}. All rights reserved.\";', '2021-11-16 07:30:19', '2021-11-16 13:31:30'),
(43, 'storefront_welcome_text', 1, NULL, '2021-11-16 13:31:29', '2021-11-16 13:31:29'),
(44, 'storefront_address', 1, NULL, '2021-11-16 13:31:29', '2021-11-16 13:31:29'),
(45, 'storefront_navbar_text', 1, NULL, '2021-11-16 13:31:30', '2021-11-16 13:31:30'),
(46, 'storefront_footer_menu_one_title', 1, NULL, '2021-11-16 13:31:30', '2021-11-16 13:31:30'),
(47, 'storefront_footer_menu_two_title', 1, NULL, '2021-11-16 13:31:30', '2021-11-16 13:31:30'),
(48, 'storefront_feature_1_title', 1, NULL, '2021-11-16 13:31:30', '2021-11-16 13:31:30'),
(49, 'storefront_feature_1_subtitle', 1, NULL, '2021-11-16 13:31:30', '2021-11-16 13:31:30'),
(50, 'storefront_feature_2_title', 1, NULL, '2021-11-16 13:31:31', '2021-11-16 13:31:31'),
(51, 'storefront_feature_2_subtitle', 1, NULL, '2021-11-16 13:31:31', '2021-11-16 13:31:31'),
(52, 'storefront_feature_3_title', 1, NULL, '2021-11-16 13:31:31', '2021-11-16 13:31:31'),
(53, 'storefront_feature_3_subtitle', 1, NULL, '2021-11-16 13:31:31', '2021-11-16 13:31:31'),
(54, 'storefront_feature_4_title', 1, NULL, '2021-11-16 13:31:31', '2021-11-16 13:31:31'),
(55, 'storefront_feature_4_subtitle', 1, NULL, '2021-11-16 13:31:31', '2021-11-16 13:31:31'),
(56, 'storefront_feature_5_title', 1, NULL, '2021-11-16 13:31:31', '2021-11-16 13:31:31'),
(57, 'storefront_feature_5_subtitle', 1, NULL, '2021-11-16 13:31:32', '2021-11-16 13:31:32'),
(58, 'storefront_product_page_banner_file_id', 1, NULL, '2021-11-16 13:31:32', '2021-11-16 13:31:32'),
(59, 'storefront_slider_banner_1_file_id', 1, NULL, '2021-11-16 13:31:32', '2021-11-16 13:31:32'),
(60, 'storefront_slider_banner_2_file_id', 1, NULL, '2021-11-16 13:31:32', '2021-11-16 13:31:32'),
(61, 'storefront_three_column_full_width_banners_1_file_id', 1, NULL, '2021-11-16 13:31:33', '2021-11-16 13:31:33'),
(62, 'storefront_three_column_full_width_banners_2_file_id', 1, NULL, '2021-11-16 13:31:33', '2021-11-16 13:31:33'),
(63, 'storefront_three_column_full_width_banners_3_file_id', 1, NULL, '2021-11-16 13:31:33', '2021-11-16 13:31:33'),
(64, 'storefront_featured_categories_section_title', 1, NULL, '2021-11-16 13:31:34', '2021-11-16 13:31:34'),
(65, 'storefront_featured_categories_section_subtitle', 1, NULL, '2021-11-16 13:31:34', '2021-11-16 13:31:34'),
(66, 'storefront_product_tabs_1_section_tab_1_title', 1, NULL, '2021-11-16 13:31:34', '2021-11-16 13:31:34'),
(67, 'storefront_product_tabs_1_section_tab_2_title', 1, NULL, '2021-11-16 13:31:34', '2021-11-16 13:31:34'),
(68, 'storefront_product_tabs_1_section_tab_3_title', 1, NULL, '2021-11-16 13:31:35', '2021-11-16 13:31:35'),
(69, 'storefront_product_tabs_1_section_tab_4_title', 1, NULL, '2021-11-16 13:31:35', '2021-11-16 13:31:35'),
(70, 'storefront_two_column_banners_1_file_id', 1, NULL, '2021-11-16 13:31:35', '2021-11-16 13:31:35'),
(71, 'storefront_two_column_banners_2_file_id', 1, NULL, '2021-11-16 13:31:35', '2021-11-16 13:31:35'),
(72, 'storefront_product_grid_section_tab_1_title', 1, NULL, '2021-11-16 13:31:36', '2021-11-16 13:31:36'),
(73, 'storefront_product_grid_section_tab_2_title', 1, NULL, '2021-11-16 13:31:36', '2021-11-16 13:31:36'),
(74, 'storefront_product_grid_section_tab_3_title', 1, NULL, '2021-11-16 13:31:36', '2021-11-16 13:31:36'),
(75, 'storefront_product_grid_section_tab_4_title', 1, NULL, '2021-11-16 13:31:36', '2021-11-16 13:31:36'),
(76, 'storefront_three_column_banners_1_file_id', 1, NULL, '2021-11-16 13:31:37', '2021-11-16 13:31:37'),
(77, 'storefront_three_column_banners_2_file_id', 1, NULL, '2021-11-16 13:31:37', '2021-11-16 13:31:37'),
(78, 'storefront_three_column_banners_3_file_id', 1, NULL, '2021-11-16 13:31:37', '2021-11-16 13:31:37'),
(79, 'storefront_product_tabs_2_section_title', 1, NULL, '2021-11-16 13:31:37', '2021-11-16 13:31:37'),
(80, 'storefront_product_tabs_2_section_tab_1_title', 1, NULL, '2021-11-16 13:31:38', '2021-11-16 13:31:38'),
(81, 'storefront_product_tabs_2_section_tab_2_title', 1, NULL, '2021-11-16 13:31:38', '2021-11-16 13:31:38'),
(82, 'storefront_product_tabs_2_section_tab_3_title', 1, NULL, '2021-11-16 13:31:38', '2021-11-16 13:31:38'),
(83, 'storefront_product_tabs_2_section_tab_4_title', 1, NULL, '2021-11-16 13:31:38', '2021-11-16 13:31:38'),
(84, 'storefront_one_column_banner_file_id', 1, NULL, '2021-11-16 13:31:38', '2021-11-16 13:31:38'),
(85, 'storefront_theme_color', 0, 's:4:\"blue\";', '2021-11-16 13:31:38', '2021-11-16 13:31:38'),
(86, 'storefront_custom_theme_color', 0, 's:7:\"#000000\";', '2021-11-16 13:31:38', '2021-11-16 13:31:38'),
(87, 'storefront_mail_theme_color', 0, 's:4:\"blue\";', '2021-11-16 13:31:38', '2021-11-16 13:31:38'),
(88, 'storefront_custom_mail_theme_color', 0, 's:7:\"#000000\";', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(89, 'storefront_slider', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(90, 'storefront_terms_page', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(91, 'storefront_privacy_page', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(92, 'storefront_primary_menu', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(93, 'storefront_category_menu', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(94, 'storefront_footer_menu_one', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(95, 'storefront_footer_menu_two', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(96, 'storefront_features_section_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(97, 'storefront_feature_1_icon', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(98, 'storefront_feature_2_icon', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(99, 'storefront_feature_3_icon', 0, 'N;', '2021-11-16 13:31:39', '2021-11-16 13:31:39'),
(100, 'storefront_feature_4_icon', 0, 'N;', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(101, 'storefront_feature_5_icon', 0, 'N;', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(102, 'storefront_product_page_banner_call_to_action_url', 0, 'N;', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(103, 'storefront_product_page_banner_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(104, 'storefront_facebook_link', 0, 'N;', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(105, 'storefront_twitter_link', 0, 'N;', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(106, 'storefront_instagram_link', 0, 'N;', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(107, 'storefront_youtube_link', 0, 'N;', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(108, 'storefront_slider_banner_1_call_to_action_url', 0, 'N;', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(109, 'storefront_slider_banner_1_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(110, 'storefront_slider_banner_2_call_to_action_url', 0, 'N;', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(111, 'storefront_slider_banner_2_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:40', '2021-11-16 13:31:40'),
(112, 'storefront_three_column_full_width_banners_enabled', 0, 's:1:\"1\";', '2021-11-16 13:31:41', '2021-11-16 13:31:41'),
(113, 'storefront_three_column_full_width_banners_1_call_to_action_url', 0, 'N;', '2021-11-16 13:31:41', '2021-11-16 13:31:41'),
(114, 'storefront_three_column_full_width_banners_1_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:41', '2021-11-16 13:31:41'),
(115, 'storefront_three_column_full_width_banners_2_call_to_action_url', 0, 'N;', '2021-11-16 13:31:41', '2021-11-16 13:31:41'),
(116, 'storefront_three_column_full_width_banners_2_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:41', '2021-11-16 13:31:41'),
(117, 'storefront_three_column_full_width_banners_3_call_to_action_url', 0, 'N;', '2021-11-16 13:31:41', '2021-11-16 13:31:41'),
(118, 'storefront_three_column_full_width_banners_3_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:41', '2021-11-16 13:31:41'),
(119, 'storefront_featured_categories_section_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:41', '2021-11-16 13:31:41'),
(120, 'storefront_featured_categories_section_category_1_category_id', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(121, 'storefront_featured_categories_section_category_1_product_type', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(122, 'storefront_featured_categories_section_category_1_products_limit', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(123, 'storefront_featured_categories_section_category_2_category_id', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(124, 'storefront_featured_categories_section_category_2_product_type', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(125, 'storefront_featured_categories_section_category_2_products_limit', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(126, 'storefront_featured_categories_section_category_3_category_id', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(127, 'storefront_featured_categories_section_category_3_product_type', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(128, 'storefront_featured_categories_section_category_3_products_limit', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(129, 'storefront_featured_categories_section_category_4_category_id', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(130, 'storefront_featured_categories_section_category_4_product_type', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(131, 'storefront_featured_categories_section_category_4_products_limit', 0, 'N;', '2021-11-16 13:31:42', '2021-11-16 13:31:42'),
(132, 'storefront_featured_categories_section_category_5_category_id', 0, 'N;', '2021-11-16 13:31:43', '2021-11-16 13:31:43'),
(133, 'storefront_featured_categories_section_category_5_product_type', 0, 'N;', '2021-11-16 13:31:43', '2021-11-16 13:31:43'),
(134, 'storefront_featured_categories_section_category_5_products_limit', 0, 'N;', '2021-11-16 13:31:43', '2021-11-16 13:31:43'),
(135, 'storefront_featured_categories_section_category_6_category_id', 0, 'N;', '2021-11-16 13:31:43', '2021-11-16 13:31:43'),
(136, 'storefront_featured_categories_section_category_6_product_type', 0, 'N;', '2021-11-16 13:31:43', '2021-11-16 13:31:43'),
(137, 'storefront_featured_categories_section_category_6_products_limit', 0, 'N;', '2021-11-16 13:31:43', '2021-11-16 13:31:43'),
(138, 'storefront_product_tabs_1_section_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(139, 'storefront_product_tabs_1_section_tab_1_product_type', 0, 'N;', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(140, 'storefront_product_tabs_1_section_tab_1_category_id', 0, 'N;', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(141, 'storefront_product_tabs_1_section_tab_1_products_limit', 0, 'N;', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(142, 'storefront_product_tabs_1_section_tab_2_product_type', 0, 'N;', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(143, 'storefront_product_tabs_1_section_tab_2_category_id', 0, 'N;', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(144, 'storefront_product_tabs_1_section_tab_2_products_limit', 0, 'N;', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(145, 'storefront_product_tabs_1_section_tab_3_product_type', 0, 'N;', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(146, 'storefront_product_tabs_1_section_tab_3_category_id', 0, 'N;', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(147, 'storefront_product_tabs_1_section_tab_3_products_limit', 0, 'N;', '2021-11-16 13:31:44', '2021-11-16 13:31:44'),
(148, 'storefront_product_tabs_1_section_tab_4_product_type', 0, 'N;', '2021-11-16 13:31:45', '2021-11-16 13:31:45'),
(149, 'storefront_product_tabs_1_section_tab_4_category_id', 0, 'N;', '2021-11-16 13:31:45', '2021-11-16 13:31:45'),
(150, 'storefront_product_tabs_1_section_tab_4_products_limit', 0, 'N;', '2021-11-16 13:31:45', '2021-11-16 13:31:45'),
(151, 'storefront_top_brands_section_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:45', '2021-11-16 13:31:45'),
(152, 'storefront_flash_sale_and_vertical_products_section_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:45', '2021-11-16 13:31:45'),
(153, 'storefront_flash_sale_title', 0, 'N;', '2021-11-16 13:31:45', '2021-11-16 13:31:45'),
(154, 'storefront_active_flash_sale_campaign', 0, 'N;', '2021-11-16 13:31:45', '2021-11-16 13:31:45'),
(155, 'storefront_vertical_products_1_title', 0, 'N;', '2021-11-16 13:31:45', '2021-11-16 13:31:45'),
(156, 'storefront_vertical_products_1_product_type', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(157, 'storefront_vertical_products_1_category_id', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(158, 'storefront_vertical_products_1_products_limit', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(159, 'storefront_vertical_products_2_title', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(160, 'storefront_vertical_products_2_product_type', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(161, 'storefront_vertical_products_2_category_id', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(162, 'storefront_vertical_products_2_products_limit', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(163, 'storefront_vertical_products_3_title', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(164, 'storefront_vertical_products_3_product_type', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(165, 'storefront_vertical_products_3_category_id', 0, 'N;', '2021-11-16 13:31:46', '2021-11-16 13:31:46'),
(166, 'storefront_vertical_products_3_products_limit', 0, 'N;', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(167, 'storefront_two_column_banners_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(168, 'storefront_two_column_banners_1_call_to_action_url', 0, 'N;', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(169, 'storefront_two_column_banners_1_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(170, 'storefront_two_column_banners_2_call_to_action_url', 0, 'N;', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(171, 'storefront_two_column_banners_2_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(172, 'storefront_product_grid_section_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(173, 'storefront_product_grid_section_tab_1_product_type', 0, 'N;', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(174, 'storefront_product_grid_section_tab_1_category_id', 0, 'N;', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(175, 'storefront_product_grid_section_tab_1_products_limit', 0, 'N;', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(176, 'storefront_product_grid_section_tab_2_product_type', 0, 'N;', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(177, 'storefront_product_grid_section_tab_2_category_id', 0, 'N;', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(178, 'storefront_product_grid_section_tab_2_products_limit', 0, 'N;', '2021-11-16 13:31:47', '2021-11-16 13:31:47'),
(179, 'storefront_product_grid_section_tab_3_product_type', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(180, 'storefront_product_grid_section_tab_3_category_id', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(181, 'storefront_product_grid_section_tab_3_products_limit', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(182, 'storefront_product_grid_section_tab_4_product_type', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(183, 'storefront_product_grid_section_tab_4_category_id', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(184, 'storefront_product_grid_section_tab_4_products_limit', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(185, 'storefront_three_column_banners_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(186, 'storefront_three_column_banners_1_call_to_action_url', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(187, 'storefront_three_column_banners_1_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(188, 'storefront_three_column_banners_2_call_to_action_url', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(189, 'storefront_three_column_banners_2_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(190, 'storefront_three_column_banners_3_call_to_action_url', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(191, 'storefront_three_column_banners_3_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(192, 'storefront_product_tabs_2_section_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(193, 'storefront_product_tabs_2_section_tab_1_product_type', 0, 'N;', '2021-11-16 13:31:48', '2021-11-16 13:31:48'),
(194, 'storefront_product_tabs_2_section_tab_1_category_id', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(195, 'storefront_product_tabs_2_section_tab_1_products_limit', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(196, 'storefront_product_tabs_2_section_tab_2_product_type', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(197, 'storefront_product_tabs_2_section_tab_2_category_id', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(198, 'storefront_product_tabs_2_section_tab_2_products_limit', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(199, 'storefront_product_tabs_2_section_tab_3_product_type', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(200, 'storefront_product_tabs_2_section_tab_3_category_id', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(201, 'storefront_product_tabs_2_section_tab_3_products_limit', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(202, 'storefront_product_tabs_2_section_tab_4_product_type', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(203, 'storefront_product_tabs_2_section_tab_4_category_id', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(204, 'storefront_product_tabs_2_section_tab_4_products_limit', 0, 'N;', '2021-11-16 13:31:49', '2021-11-16 13:31:49'),
(205, 'storefront_one_column_banner_enabled', 0, 's:1:\"0\";', '2021-11-16 13:31:50', '2021-11-16 13:31:50'),
(206, 'storefront_one_column_banner_call_to_action_url', 0, 'N;', '2021-11-16 13:31:50', '2021-11-16 13:31:50'),
(207, 'storefront_one_column_banner_open_in_new_window', 0, 's:1:\"0\";', '2021-11-16 13:31:50', '2021-11-16 13:31:50'),
(208, 'storefront_footer_tags', 0, 'N;', '2021-11-16 13:31:50', '2021-11-16 13:31:50'),
(209, 'storefront_featured_categories_section_category_1_products', 0, 'N;', '2021-11-16 13:31:50', '2021-11-16 13:31:50'),
(210, 'storefront_featured_categories_section_category_2_products', 0, 'N;', '2021-11-16 13:31:50', '2021-11-16 13:31:50'),
(211, 'storefront_featured_categories_section_category_3_products', 0, 'N;', '2021-11-16 13:31:51', '2021-11-16 13:31:51'),
(212, 'storefront_featured_categories_section_category_4_products', 0, 'N;', '2021-11-16 13:31:51', '2021-11-16 13:31:51'),
(213, 'storefront_featured_categories_section_category_5_products', 0, 'N;', '2021-11-16 13:31:51', '2021-11-16 13:31:51'),
(214, 'storefront_featured_categories_section_category_6_products', 0, 'N;', '2021-11-16 13:31:51', '2021-11-16 13:31:51'),
(215, 'storefront_product_tabs_1_section_tab_1_products', 0, 'N;', '2021-11-16 13:31:51', '2021-11-16 13:31:51'),
(216, 'storefront_product_tabs_1_section_tab_2_products', 0, 'N;', '2021-11-16 13:31:51', '2021-11-16 13:31:51'),
(217, 'storefront_product_tabs_1_section_tab_3_products', 0, 'N;', '2021-11-16 13:31:51', '2021-11-16 13:31:51'),
(218, 'storefront_product_tabs_1_section_tab_4_products', 0, 'N;', '2021-11-16 13:31:52', '2021-11-16 13:31:52'),
(219, 'storefront_top_brands', 0, 'N;', '2021-11-16 13:31:52', '2021-11-16 13:31:52'),
(220, 'storefront_vertical_products_1_products', 0, 'N;', '2021-11-16 13:31:52', '2021-11-16 13:31:52'),
(221, 'storefront_vertical_products_2_products', 0, 'N;', '2021-11-16 13:31:52', '2021-11-16 13:31:52'),
(222, 'storefront_vertical_products_3_products', 0, 'N;', '2021-11-16 13:31:52', '2021-11-16 13:31:52'),
(223, 'storefront_product_grid_section_tab_1_products', 0, 'N;', '2021-11-16 13:31:52', '2021-11-16 13:31:52'),
(224, 'storefront_product_grid_section_tab_2_products', 0, 'N;', '2021-11-16 13:31:53', '2021-11-16 13:31:53'),
(225, 'storefront_product_grid_section_tab_3_products', 0, 'N;', '2021-11-16 13:31:53', '2021-11-16 13:31:53'),
(226, 'storefront_product_grid_section_tab_4_products', 0, 'N;', '2021-11-16 13:31:53', '2021-11-16 13:31:53'),
(227, 'storefront_product_tabs_2_section_tab_1_products', 0, 'N;', '2021-11-16 13:31:53', '2021-11-16 13:31:53'),
(228, 'storefront_product_tabs_2_section_tab_2_products', 0, 'N;', '2021-11-16 13:31:53', '2021-11-16 13:31:53'),
(229, 'storefront_product_tabs_2_section_tab_3_products', 0, 'N;', '2021-11-16 13:31:53', '2021-11-16 13:31:53'),
(230, 'storefront_product_tabs_2_section_tab_4_products', 0, 'N;', '2021-11-16 13:31:54', '2021-11-16 13:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`) VALUES
(1, 1, 'en', 's:9:\"FleetCart\";'),
(2, 23, 'en', 's:13:\"Free Shipping\";'),
(3, 24, 'en', 's:12:\"Local Pickup\";'),
(4, 25, 'en', 's:9:\"Flat Rate\";'),
(5, 26, 'en', 's:6:\"PayPal\";'),
(6, 27, 'en', 's:28:\"Pay via your PayPal account.\";'),
(7, 28, 'en', 's:6:\"Stripe\";'),
(8, 29, 'en', 's:29:\"Pay via credit or debit card.\";'),
(9, 30, 'en', 's:5:\"Paytm\";'),
(10, 31, 'en', 's:103:\"The best payment gateway provider in India for e-payment through credit card, debit card & net banking.\";'),
(11, 32, 'en', 's:8:\"Razorpay\";'),
(12, 33, 'en', 's:74:\"Pay securely by Credit or Debit card or Internet Banking through Razorpay.\";'),
(13, 34, 'en', 's:9:\"Instamojo\";'),
(14, 35, 'en', 's:16:\"CC/DB/NB/Wallets\";'),
(15, 36, 'en', 's:16:\"Cash On Delivery\";'),
(16, 37, 'en', 's:28:\"Pay with cash upon delivery.\";'),
(17, 38, 'en', 's:13:\"Bank Transfer\";'),
(18, 39, 'en', 's:100:\"Make your payment directly into our bank account. Please use your Order ID as the payment reference.\";'),
(19, 40, 'en', 's:19:\"Check / Money Order\";'),
(20, 41, 'en', 's:33:\"Please send a check to our store.\";'),
(21, 43, 'en', 'N;'),
(22, 44, 'en', 'N;'),
(23, 45, 'en', 'N;'),
(24, 46, 'en', 'N;'),
(25, 47, 'en', 'N;'),
(26, 42, 'en', 's:92:\"Copyright © <a href=\"{{ store_url }}\">{{ store_name }}</a> {{ year }}. All rights reserved.\";'),
(27, 48, 'en', 'N;'),
(28, 49, 'en', 'N;'),
(29, 50, 'en', 'N;'),
(30, 51, 'en', 'N;'),
(31, 52, 'en', 'N;'),
(32, 53, 'en', 'N;'),
(33, 54, 'en', 'N;'),
(34, 55, 'en', 'N;'),
(35, 56, 'en', 'N;'),
(36, 57, 'en', 'N;'),
(37, 58, 'en', 'N;'),
(38, 59, 'en', 'N;'),
(39, 60, 'en', 'N;'),
(40, 61, 'en', 'N;'),
(41, 62, 'en', 'N;'),
(42, 63, 'en', 'N;'),
(43, 64, 'en', 'N;'),
(44, 65, 'en', 'N;'),
(45, 66, 'en', 'N;'),
(46, 67, 'en', 'N;'),
(47, 68, 'en', 'N;'),
(48, 69, 'en', 'N;'),
(49, 70, 'en', 'N;'),
(50, 71, 'en', 'N;'),
(51, 72, 'en', 'N;'),
(52, 73, 'en', 'N;'),
(53, 74, 'en', 'N;'),
(54, 75, 'en', 'N;'),
(55, 76, 'en', 'N;'),
(56, 77, 'en', 'N;'),
(57, 78, 'en', 'N;'),
(58, 79, 'en', 'N;'),
(59, 80, 'en', 'N;'),
(60, 81, 'en', 'N;'),
(61, 82, 'en', 'N;'),
(62, 83, 'en', 'N;'),
(63, 84, 'en', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `speed` int(11) DEFAULT NULL,
  `autoplay` tinyint(1) DEFAULT NULL,
  `autoplay_speed` int(11) DEFAULT NULL,
  `fade` tinyint(1) NOT NULL DEFAULT 0,
  `dots` tinyint(1) DEFAULT NULL,
  `arrows` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider_slides`
--

CREATE TABLE `slider_slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_id` int(10) UNSIGNED NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_to_action_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_in_new_window` tinyint(1) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider_slide_translations`
--

CREATE TABLE `slider_slide_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_slide_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_id` int(10) UNSIGNED DEFAULT NULL,
  `caption_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_to_action_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_classes`
--

CREATE TABLE `tax_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `based_on` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_class_translations`
--

CREATE TABLE `tax_class_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_class_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE `tax_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_class_id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(8,4) UNSIGNED NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rate_translations`
--

CREATE TABLE `tax_rate_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_rate_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translation_translations`
--

CREATE TABLE `translation_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `translation_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `updater_scripts`
--

CREATE TABLE `updater_scripts` (
  `id` int(10) UNSIGNED NOT NULL,
  `script` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `updater_scripts`
--

INSERT INTO `updater_scripts` (`id`, `script`) VALUES
(1, 'V2_0_0');

-- --------------------------------------------------------

--
-- Table structure for table `up_sell_products`
--

CREATE TABLE `up_sell_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `up_sell_product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `permissions`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Syed Umer', 'Fayyaz', 'syedumerfayyaz@gmail.com', '03162315830', '$2y$10$dz/jEt96FQe6qz7xMG7V4eCN2xzo2K7pslP6b4bD40sdsAaEbUYoi', NULL, '2021-11-16 18:30:46', '2021-11-16 07:30:11', '2021-11-16 13:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-16 07:30:12', '2021-11-16 07:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activations_user_id_index` (`user_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_slug_unique` (`slug`),
  ADD KEY `attributes_attribute_set_id_index` (`attribute_set_id`);

--
-- Indexes for table `attribute_categories`
--
ALTER TABLE `attribute_categories`
  ADD PRIMARY KEY (`attribute_id`,`category_id`),
  ADD KEY `attribute_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `attribute_sets`
--
ALTER TABLE `attribute_sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_set_translations`
--
ALTER TABLE `attribute_set_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_set_translations_attribute_set_id_locale_unique` (`attribute_set_id`,`locale`);

--
-- Indexes for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_translations_attribute_id_locale_unique` (`attribute_id`,`locale`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_index` (`attribute_id`);

--
-- Indexes for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_value_translations_attribute_value_id_locale_unique` (`attribute_value_id`,`locale`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_translations_brand_id_locale_unique` (`brand_id`,`locale`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_code_index` (`code`);

--
-- Indexes for table `coupon_categories`
--
ALTER TABLE `coupon_categories`
  ADD PRIMARY KEY (`coupon_id`,`category_id`,`exclude`),
  ADD KEY `coupon_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `coupon_products`
--
ALTER TABLE `coupon_products`
  ADD PRIMARY KEY (`coupon_id`,`product_id`),
  ADD KEY `coupon_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_translations_coupon_id_locale_unique` (`coupon_id`,`locale`);

--
-- Indexes for table `cross_sell_products`
--
ALTER TABLE `cross_sell_products`
  ADD PRIMARY KEY (`product_id`,`cross_sell_product_id`),
  ADD KEY `cross_sell_products_cross_sell_product_id_foreign` (`cross_sell_product_id`);

--
-- Indexes for table `currency_rates`
--
ALTER TABLE `currency_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currency_rates_currency_unique` (`currency`);

--
-- Indexes for table `default_addresses`
--
ALTER TABLE `default_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `default_addresses_customer_id_foreign` (`customer_id`),
  ADD KEY `default_addresses_address_id_foreign` (`address_id`);

--
-- Indexes for table `entity_files`
--
ALTER TABLE `entity_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entity_files_entity_type_entity_id_index` (`entity_type`,`entity_id`),
  ADD KEY `entity_files_file_id_index` (`file_id`),
  ADD KEY `entity_files_zone_index` (`zone`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_user_id_index` (`user_id`),
  ADD KEY `files_filename_index` (`filename`);

--
-- Indexes for table `flash_sales`
--
ALTER TABLE `flash_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flash_sale_products_flash_sale_id_foreign` (`flash_sale_id`),
  ADD KEY `flash_sale_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `flash_sale_product_orders`
--
ALTER TABLE `flash_sale_product_orders`
  ADD PRIMARY KEY (`flash_sale_product_id`,`order_id`),
  ADD KEY `flash_sale_product_orders_order_id_foreign` (`order_id`);

--
-- Indexes for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `flash_sale_translations_flash_sale_id_locale_unique` (`flash_sale_id`,`locale`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_parent_id_foreign` (`parent_id`),
  ADD KEY `menu_items_category_id_foreign` (`category_id`),
  ADD KEY `menu_items_page_id_foreign` (`page_id`),
  ADD KEY `menu_items_menu_id_index` (`menu_id`);

--
-- Indexes for table `menu_item_translations`
--
ALTER TABLE `menu_item_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_item_translations_menu_item_id_locale_unique` (`menu_item_id`,`locale`);

--
-- Indexes for table `menu_translations`
--
ALTER TABLE `menu_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_translations_menu_id_locale_unique` (`menu_id`,`locale`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meta_data_entity_type_entity_id_index` (`entity_type`,`entity_id`);

--
-- Indexes for table `meta_data_translations`
--
ALTER TABLE `meta_data_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meta_data_translations_meta_data_id_locale_unique` (`meta_data_id`,`locale`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_translations`
--
ALTER TABLE `option_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_translations_option_id_locale_unique` (`option_id`,`locale`);

--
-- Indexes for table `option_values`
--
ALTER TABLE `option_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_values_option_id_index` (`option_id`);

--
-- Indexes for table `option_value_translations`
--
ALTER TABLE `option_value_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_value_translations_option_value_id_locale_unique` (`option_value_id`,`locale`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_index` (`customer_id`),
  ADD KEY `orders_coupon_id_index` (`coupon_id`);

--
-- Indexes for table `order_downloads`
--
ALTER TABLE `order_downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_downloads_order_id_foreign` (`order_id`),
  ADD KEY `order_downloads_file_id_foreign` (`file_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_product_options`
--
ALTER TABLE `order_product_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_product_options_order_product_id_option_id_unique` (`order_product_id`,`option_id`),
  ADD KEY `order_product_options_option_id_foreign` (`option_id`);

--
-- Indexes for table `order_product_option_values`
--
ALTER TABLE `order_product_option_values`
  ADD PRIMARY KEY (`order_product_option_id`,`option_value_id`),
  ADD KEY `order_product_option_values_option_value_id_foreign` (`option_value_id`);

--
-- Indexes for table `order_taxes`
--
ALTER TABLE `order_taxes`
  ADD PRIMARY KEY (`order_id`,`tax_rate_id`),
  ADD KEY `order_taxes_tax_rate_id_foreign` (`tax_rate_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_translations_page_id_locale_unique` (`page_id`,`locale`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`),
  ADD KEY `persistences_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_index` (`product_id`),
  ADD KEY `product_attributes_attribute_id_index` (`attribute_id`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`product_attribute_id`,`attribute_value_id`),
  ADD KEY `product_attribute_values_attribute_value_id_foreign` (`attribute_value_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`product_id`,`option_id`),
  ADD KEY `product_options_option_id_foreign` (`option_id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`);
ALTER TABLE `product_translations` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `related_products`
--
ALTER TABLE `related_products`
  ADD PRIMARY KEY (`product_id`,`related_product_id`),
  ADD KEY `related_products_related_product_id_foreign` (`related_product_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminders_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_reviewer_id_index` (`reviewer_id`),
  ADD KEY `reviews_product_id_index` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_translations`
--
ALTER TABLE `role_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_translations_role_id_locale_unique` (`role_id`,`locale`);

--
-- Indexes for table `search_terms`
--
ALTER TABLE `search_terms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `search_terms_term_unique` (`term`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_slides`
--
ALTER TABLE `slider_slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_slides_slider_id_foreign` (`slider_id`);

--
-- Indexes for table `slider_slide_translations`
--
ALTER TABLE `slider_slide_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slider_slide_translations_slider_slide_id_locale_unique` (`slider_slide_id`,`locale`);

--
-- Indexes for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slider_translations_slider_id_locale_unique` (`slider_id`,`locale`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_translations_tag_id_locale_unique` (`tag_id`,`locale`);

--
-- Indexes for table `tax_classes`
--
ALTER TABLE `tax_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_class_translations`
--
ALTER TABLE `tax_class_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_class_translations_tax_class_id_locale_unique` (`tax_class_id`,`locale`);

--
-- Indexes for table `tax_rates`
--
ALTER TABLE `tax_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_rates_tax_class_id_index` (`tax_class_id`);

--
-- Indexes for table `tax_rate_translations`
--
ALTER TABLE `tax_rate_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_rate_translations_tax_rate_id_locale_unique` (`tax_rate_id`,`locale`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_foreign` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_order_id_unique` (`order_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_key_index` (`key`);

--
-- Indexes for table `translation_translations`
--
ALTER TABLE `translation_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translation_translations_translation_id_locale_unique` (`translation_id`,`locale`);

--
-- Indexes for table `updater_scripts`
--
ALTER TABLE `updater_scripts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `up_sell_products`
--
ALTER TABLE `up_sell_products`
  ADD PRIMARY KEY (`product_id`,`up_sell_product_id`),
  ADD KEY `up_sell_products_up_sell_product_id_foreign` (`up_sell_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `wish_lists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_sets`
--
ALTER TABLE `attribute_sets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_set_translations`
--
ALTER TABLE `attribute_set_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `default_addresses`
--
ALTER TABLE `default_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entity_files`
--
ALTER TABLE `entity_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_item_translations`
--
ALTER TABLE `menu_item_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_translations`
--
ALTER TABLE `menu_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meta_data_translations`
--
ALTER TABLE `meta_data_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `option_translations`
--
ALTER TABLE `option_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `option_values`
--
ALTER TABLE `option_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `option_value_translations`
--
ALTER TABLE `option_value_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_downloads`
--
ALTER TABLE `order_downloads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product_options`
--
ALTER TABLE `order_product_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_translations`
--
ALTER TABLE `role_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `search_terms`
--
ALTER TABLE `search_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_slides`
--
ALTER TABLE `slider_slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_slide_translations`
--
ALTER TABLE `slider_slide_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_classes`
--
ALTER TABLE `tax_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_class_translations`
--
ALTER TABLE `tax_class_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_rates`
--
ALTER TABLE `tax_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_rate_translations`
--
ALTER TABLE `tax_rate_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translation_translations`
--
ALTER TABLE `translation_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `updater_scripts`
--
ALTER TABLE `updater_scripts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activations`
--
ALTER TABLE `activations`
  ADD CONSTRAINT `activations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_attribute_set_id_foreign` FOREIGN KEY (`attribute_set_id`) REFERENCES `attribute_sets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_categories`
--
ALTER TABLE `attribute_categories`
  ADD CONSTRAINT `attribute_categories_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_set_translations`
--
ALTER TABLE `attribute_set_translations`
  ADD CONSTRAINT `attribute_set_translations_attribute_set_id_foreign` FOREIGN KEY (`attribute_set_id`) REFERENCES `attribute_sets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD CONSTRAINT `attribute_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  ADD CONSTRAINT `attribute_value_translations_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_categories`
--
ALTER TABLE `coupon_categories`
  ADD CONSTRAINT `coupon_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_categories_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_products`
--
ALTER TABLE `coupon_products`
  ADD CONSTRAINT `coupon_products_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  ADD CONSTRAINT `coupon_translations_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cross_sell_products`
--
ALTER TABLE `cross_sell_products`
  ADD CONSTRAINT `cross_sell_products_cross_sell_product_id_foreign` FOREIGN KEY (`cross_sell_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cross_sell_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `default_addresses`
--
ALTER TABLE `default_addresses`
  ADD CONSTRAINT `default_addresses_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `default_addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `entity_files`
--
ALTER TABLE `entity_files`
  ADD CONSTRAINT `entity_files_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  ADD CONSTRAINT `flash_sale_products_flash_sale_id_foreign` FOREIGN KEY (`flash_sale_id`) REFERENCES `flash_sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flash_sale_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flash_sale_product_orders`
--
ALTER TABLE `flash_sale_product_orders`
  ADD CONSTRAINT `flash_sale_product_orders_flash_sale_product_id_foreign` FOREIGN KEY (`flash_sale_product_id`) REFERENCES `flash_sale_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flash_sale_product_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  ADD CONSTRAINT `flash_sale_translations_flash_sale_id_foreign` FOREIGN KEY (`flash_sale_id`) REFERENCES `flash_sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_item_translations`
--
ALTER TABLE `menu_item_translations`
  ADD CONSTRAINT `menu_item_translations_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_translations`
--
ALTER TABLE `menu_translations`
  ADD CONSTRAINT `menu_translations_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meta_data_translations`
--
ALTER TABLE `meta_data_translations`
  ADD CONSTRAINT `meta_data_translations_meta_data_id_foreign` FOREIGN KEY (`meta_data_id`) REFERENCES `meta_data` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `option_translations`
--
ALTER TABLE `option_translations`
  ADD CONSTRAINT `option_translations_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `option_values`
--
ALTER TABLE `option_values`
  ADD CONSTRAINT `option_values_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `option_value_translations`
--
ALTER TABLE `option_value_translations`
  ADD CONSTRAINT `option_value_translations_option_value_id_foreign` FOREIGN KEY (`option_value_id`) REFERENCES `option_values` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_downloads`
--
ALTER TABLE `order_downloads`
  ADD CONSTRAINT `order_downloads_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_downloads_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product_options`
--
ALTER TABLE `order_product_options`
  ADD CONSTRAINT `order_product_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_options_order_product_id_foreign` FOREIGN KEY (`order_product_id`) REFERENCES `order_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product_option_values`
--
ALTER TABLE `order_product_option_values`
  ADD CONSTRAINT `order_product_option_values_option_value_id_foreign` FOREIGN KEY (`option_value_id`) REFERENCES `option_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_option_values_order_product_option_id_foreign` FOREIGN KEY (`order_product_option_id`) REFERENCES `order_product_options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_taxes`
--
ALTER TABLE `order_taxes`
  ADD CONSTRAINT `order_taxes_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_taxes_tax_rate_id_foreign` FOREIGN KEY (`tax_rate_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `persistences`
--
ALTER TABLE `persistences`
  ADD CONSTRAINT `persistences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_values_product_attribute_id_foreign` FOREIGN KEY (`product_attribute_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `related_products`
--
ALTER TABLE `related_products`
  ADD CONSTRAINT `related_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `related_products_related_product_id_foreign` FOREIGN KEY (`related_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_translations`
--
ALTER TABLE `role_translations`
  ADD CONSTRAINT `role_translations_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_slides`
--
ALTER TABLE `slider_slides`
  ADD CONSTRAINT `slider_slides_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_slide_translations`
--
ALTER TABLE `slider_slide_translations`
  ADD CONSTRAINT `slider_slide_translations_slider_slide_id_foreign` FOREIGN KEY (`slider_slide_id`) REFERENCES `slider_slides` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD CONSTRAINT `slider_translations_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tax_class_translations`
--
ALTER TABLE `tax_class_translations`
  ADD CONSTRAINT `tax_class_translations_tax_class_id_foreign` FOREIGN KEY (`tax_class_id`) REFERENCES `tax_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tax_rates`
--
ALTER TABLE `tax_rates`
  ADD CONSTRAINT `tax_rates_tax_class_id_foreign` FOREIGN KEY (`tax_class_id`) REFERENCES `tax_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tax_rate_translations`
--
ALTER TABLE `tax_rate_translations`
  ADD CONSTRAINT `tax_rate_translations_tax_rate_id_foreign` FOREIGN KEY (`tax_rate_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `throttle`
--
ALTER TABLE `throttle`
  ADD CONSTRAINT `throttle_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `translation_translations`
--
ALTER TABLE `translation_translations`
  ADD CONSTRAINT `translation_translations_translation_id_foreign` FOREIGN KEY (`translation_id`) REFERENCES `translations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `up_sell_products`
--
ALTER TABLE `up_sell_products`
  ADD CONSTRAINT `up_sell_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `up_sell_products_up_sell_product_id_foreign` FOREIGN KEY (`up_sell_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wish_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
