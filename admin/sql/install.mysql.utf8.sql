DROP TABLE IF EXISTS `#__smf_child_data`;
 
CREATE TABLE `#__smf_child_data` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	`gender` VARCHAR(50) NOT NULL,
	`birth_date` DATE NOT NULL,
	`country` VARCHAR(50) NOT NULL,
	`my_story` TEXT,
	`monthly_sponsorship` DECIMAL(5,2)NOT NULL,
	`show_in_site` tinyint default 1,	
	`image_url` VARCHAR(250) default 'images/smf/default_user.png',
	`birth_day`       INT(2),
	`birth_month`       INT(2),
	`birth_year`       INT(4),
	`student_id` VARCHAR(50) NOT NULL,
	`video_code` VARCHAR(250) default 'https://www.youtube.com/watch?v=k-lxD1r-oTA',
	`chores_work` VARCHAR(250),	
	`education` VARCHAR(250),
	`hobbies` VARCHAR(250),
	`favourite_game` VARCHAR(250),
	`dream` VARCHAR(250),
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
