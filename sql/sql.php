UPDATE `cities` SET `country_id` = '99' WHERE `country_id` = '1';

UPDATE `members` SET `created_by` = '1' WHERE `created_by` IS NULL;