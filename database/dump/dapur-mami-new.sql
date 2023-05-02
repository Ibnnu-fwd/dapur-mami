-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.24-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Membuang data untuk tabel dapur_mami.discounts: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.discount_menus: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `discount_menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `discount_menus` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.material_transactions: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `material_transactions` DISABLE KEYS */;
INSERT IGNORE INTO `material_transactions` (`id`, `transaction_code`, `total_paid`, `total_return`, `total_purchase`, `status`, `suppliers`, `purchase_note`, `purchase_proof`, `purchase_date`, `user_id`, `created_at`, `updated_at`, `cashier_id`) VALUES
	(1, 'MT644e5c0ee052b', 100000, 20000, 72000, 3, NULL, NULL, '1682857810_WhatsApp Image 2023-04-29 at 08.40.17.jpeg', '2023-04-30', 1, '2023-04-30 12:16:14', '2023-04-30 12:30:10', 2),
	(2, 'MT644e5c4d22f06', 50000, 0, 40000, 1, NULL, NULL, NULL, NULL, 1, '2023-04-30 12:17:17', '2023-04-30 12:17:17', NULL),
	(3, 'MT6450bf311f165', 100000, 0, 276, 1, NULL, NULL, NULL, NULL, 1, '2023-05-02 07:43:45', '2023-05-02 07:43:45', NULL),
	(4, 'MT6450bf3f55c2d', 1000000, 0, 230, 1, NULL, NULL, NULL, NULL, 1, '2023-05-02 07:43:59', '2023-05-02 07:43:59', NULL),
	(5, 'MT6450bfbd4837c', 33234, 0, 2342, 1, NULL, NULL, NULL, NULL, 1, '2023-05-02 07:46:05', '2023-05-02 07:46:05', NULL);
/*!40000 ALTER TABLE `material_transactions` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.material_transaction_details: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `material_transaction_details` DISABLE KEYS */;
INSERT IGNORE INTO `material_transaction_details` (`id`, `material_transaction_id`, `name`, `unit_type`, `quantity`, `ppu`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Gula', 'kg', 1, 12000, 12000, 1, '2023-04-30 12:16:14', '2023-04-30 12:30:10'),
	(2, 1, 'Beras', 'kg', 5, 12000, 60000, 1, '2023-04-30 12:16:14', '2023-04-30 12:30:10'),
	(3, 2, 'Minyak', 'l', 5, 8000, 40000, 0, '2023-04-30 12:17:17', '2023-04-30 12:17:17'),
	(4, 3, 'Perinatal', 'kg', 12, 23, 276, 0, '2023-05-02 07:43:45', '2023-05-02 07:43:45'),
	(5, 4, 'Beras', 'kg', 23, 10, 230, 0, '2023-05-02 07:43:59', '2023-05-02 07:43:59'),
	(6, 5, 'seda', 'kg', 1, 2342, 2342, 0, '2023-05-02 07:46:05', '2023-05-02 07:46:05');
/*!40000 ALTER TABLE `material_transaction_details` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.menus: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT IGNORE INTO `menus` (`id`, `name`, `price`, `category`, `description`, `weight`, `discounts_id`, `active`, `created_at`, `updated_at`, `image`) VALUES
	(1, 'Nasi Goreng', 10000, 1, 'Nasi goreng dengan bumbu khas Indonesia', 100, NULL, 1, NULL, '2023-05-02 00:53:53', 'images/menu/1682988833.jpg'),
	(2, 'Nasi Goreng Spesial', 15000, 1, 'Nasi goreng dengan bumbu khas Indonesia', 100, NULL, 1, NULL, '2023-05-02 00:54:30', 'images/menu/1682988870.jpg'),
	(3, 'Soto Ayam', 10000, 1, 'Soto ayam dengan bumbu khas Indonesia', 100, NULL, 1, NULL, '2023-05-02 00:54:40', 'images/menu/1682988880.jpg'),
	(4, 'Es Teh', 5000, 2, 'Es teh dengan bumbu khas Indonesia', 100, NULL, 1, NULL, '2023-05-02 00:59:16', 'images/menu/1682989156.jpg'),
	(5, 'Es Jeruk', 5000, 2, 'Es jeruk dengan bumbu khas Indonesia', 100, NULL, 1, NULL, '2023-05-02 00:59:26', 'images/menu/1682989166.jpg'),
	(6, 'Es Campur', 10000, 2, 'Es campur dengan bumbu khas Indonesia', 100, NULL, 1, NULL, '2023-05-02 00:59:50', 'images/menu/1682989190.jpg'),
	(7, 'Keripik', 5000, 3, 'Keripik dengan bumbu khas Indonesia', 100, NULL, 1, NULL, '2023-05-02 01:00:05', 'images/menu/1682989205.jpg'),
	(8, 'Keripik Kacang', 5000, 3, 'Keripik kacang dengan bumbu khas Indonesia', 100, NULL, 1, NULL, '2023-05-02 01:01:24', 'images/menu/1682989284.jpeg'),
	(9, 'Keripik Tempe', 5000, 3, 'Keripik tempe dengan bumbu khas Indonesia', 100, NULL, 1, NULL, '2023-05-02 01:01:35', 'images/menu/1682989295.jpg');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.migrations: ~22 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(23, '2014_10_12_000000_create_users_table', 1),
	(24, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(25, '2019_08_19_000000_create_failed_jobs_table', 1),
	(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(27, '2023_02_22_160644_create_discounts_table', 1),
	(28, '2023_02_22_160850_create_menus_table', 1),
	(29, '2023_02_22_221553_create_discount_menus_table', 1),
	(30, '2023_02_22_221935_create_transactions_table', 1),
	(31, '2023_02_26_141357_add_image_menu', 1),
	(32, '2023_03_01_103145_create_transaction_details_table', 1),
	(33, '2023_03_01_110657_add_relation_transactions_transaction_details', 1),
	(34, '2023_03_02_222145_delete_column_transaction_details', 1),
	(35, '2023_03_02_223859_remove_amount_item_transaction_details', 1),
	(36, '2023_03_03_095714_remove_total_price_transaction_details', 1),
	(37, '2023_03_04_114056_add_sub_total_transactions', 1),
	(38, '2023_03_05_044002_add_some_columns_transactions', 1),
	(39, '2023_03_05_044915_update_customer_name_transactions', 1),
	(40, '2023_04_03_034506_material_transactions_table', 1),
	(41, '2023_04_03_034841_material_transaction_details_table', 1),
	(42, '2023_04_06_070133_update_unit_type_column_material_transaction_details', 1),
	(43, '2023_04_06_075824_update_some_columns_material_transaction', 1),
	(44, '2023_04_29_232355_add_purchase_note_and_puchase_proof_material_transaction_table', 1),
	(45, '2023_04_30_122448_add_chasier_id_column_material_transactions', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.password_reset_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.transactions: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT IGNORE INTO `transactions` (`id`, `users_id`, `discounts_id`, `transaction_code`, `customer_name`, `payment_method`, `total_payment`, `sub_total`, `status`, `created_at`, `updated_at`, `event_name`, `total_guest`, `booking_date`, `booking_time`) VALUES
	(1, 1, NULL, 'INV-2023-0001', 'Khoirul', 1, 20000, 20000, 2, '2023-04-30 11:55:00', '2023-04-30 11:55:53', NULL, NULL, NULL, NULL),
	(2, 1, NULL, 'INV-2023-0002', NULL, 1, 75000, 75000, 2, '2023-04-30 11:59:26', '2023-04-30 12:00:38', 'Ulang Tahun Mira', 5, '2023-05-01', '14:00:00'),
	(4, 1, NULL, 'INV-2023-0003', NULL, 1, 225000, 225000, 1, '2023-04-30 16:39:18', '2023-04-30 16:39:18', 'Reuni SMP Pelita Hati', 5, '2023-05-02', '12:00:00'),
	(5, 1, NULL, 'INV-2023-0004', 'lfsdlfj', 1, 10000, 10000, 2, '2023-04-30 17:01:47', '2023-05-02 01:06:48', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.transaction_details: ~13 rows (lebih kurang)
/*!40000 ALTER TABLE `transaction_details` DISABLE KEYS */;
INSERT IGNORE INTO `transaction_details` (`id`, `transactions_id`, `menus_id`, `discounts_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, 10000, 1, '2023-04-30 11:55:00', '2023-04-30 11:55:00'),
	(2, 1, 5, NULL, 5000, 1, '2023-04-30 11:55:00', '2023-04-30 11:55:00'),
	(3, 1, 8, NULL, 5000, 1, '2023-04-30 11:55:00', '2023-04-30 11:55:00'),
	(4, 2, 1, NULL, 10000, 2, '2023-04-30 11:59:26', '2023-04-30 11:59:26'),
	(5, 2, 3, NULL, 10000, 3, '2023-04-30 11:59:26', '2023-04-30 11:59:26'),
	(6, 2, 4, NULL, 5000, 2, '2023-04-30 11:59:26', '2023-04-30 11:59:26'),
	(7, 2, 5, NULL, 5000, 3, '2023-04-30 11:59:26', '2023-04-30 11:59:26'),
	(12, 4, 1, NULL, 10000, 4, '2023-04-30 16:39:18', '2023-04-30 16:39:18'),
	(13, 4, 2, NULL, 15000, 4, '2023-04-30 16:39:18', '2023-04-30 16:39:18'),
	(14, 4, 3, NULL, 10000, 4, '2023-04-30 16:39:18', '2023-04-30 16:39:18'),
	(15, 4, 7, NULL, 5000, 5, '2023-04-30 16:39:18', '2023-04-30 16:39:18'),
	(16, 4, 4, NULL, 5000, 5, '2023-04-30 16:39:18', '2023-04-30 16:39:18'),
	(17, 4, 5, NULL, 5000, 7, '2023-04-30 16:39:18', '2023-04-30 16:39:18'),
	(18, 5, 3, NULL, 10000, 1, '2023-04-30 17:01:47', '2023-04-30 17:01:47');
/*!40000 ALTER TABLE `transaction_details` ENABLE KEYS */;

-- Membuang data untuk tabel dapur_mami.users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `first_name`, `last_name`, `fullname`, `email`, `email_verified_at`, `password`, `phone`, `sex`, `address`, `birth_date`, `profile_picture`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'Admin', 'Admin Admin', 'admin@mail.com', NULL, '$2y$10$LvLx6eF/pyNvsGYpD6WVyucvXgR8eOZQEfMu5BjrOwHhN56pMYnJS', '081515144981', 1, 'Sumber Sari, Jember', '2002-04-22', 'images/profile_picture/1682856358.jpg', 2, 1, NULL, '2023-04-30 03:27:48', '2023-05-02 00:38:24'),
	(2, 'Fahmi', 'Ubaidillah', 'Fahmi Ubaidillah', 'fahmi@mail.com', NULL, '$2y$10$yqFrmL72kKfNLS8t3f9vu..ARqYRPTSpPzhu5ZEau9e9iMZr0F6bS', '081515144984', 1, 'Olean, Situbondo', '2000-03-16', 'images/profile_picture/1682989417.jpg', 1, 1, NULL, '2023-04-30 12:10:14', '2023-05-02 01:03:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
