ALTER TABLE `category` ADD `status` TINYINT NULL DEFAULT '1' AFTER `description`, ADD `created_by` INT(11) NULL AFTER `status`, ADD `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_by`, ADD `updated_by` INT(11) NULL AFTER `created_at`, ADD `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NULL AFTER `updated_by`, ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;


ALTER TABLE `users` ADD `max_allowed_member` INT(20) NULL AFTER `frontend_role_id`;

ALTER TABLE `users` ADD `frontend_role_id` INT(11) NULL AFTER `deleted_at`;