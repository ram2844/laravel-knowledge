ALTER TABLE `category` ADD `status` TINYINT NULL DEFAULT '1' AFTER `description`, ADD `created_by` INT(11) NULL AFTER `status`, ADD `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_by`, ADD `updated_by` INT(11) NULL AFTER `created_at`, ADD `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NULL AFTER `updated_by`, ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;



ALTER TABLE `hotel_bookings` CHANGE `performance_venue` `venue_id` INT(11) NULL DEFAULT NULL;

ALTER TABLE `hotel_bookings` ADD `artist_type_id` INT(11) NULL AFTER `id`;