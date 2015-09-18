DROP TABLE IF EXISTS `#__smf_child_data`;
 
CREATE TABLE `#__smf_child_data` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	`gender` VARCHAR(50) NOT NULL,
	`birth_date` DATE NOT NULL,
	`country` VARCHAR(50) NOT NULL,
	`my_story` VARCHAR(250) NOT NULL,
	`monthly_sponsorship` DECIMAL(5,2)NOT NULL,
	`show_in_site` tinyint default 1,	
	`image_url` VARCHAR(250),
	`birth_day`       INT(2),
	`birth_month`       INT(2),
	`birth_year`       INT(4),
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;