CREATE TABLE  `AnalyticsDesk`.`twitter_user_data` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`created_at` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`screen_name` VARCHAR( 200 ) NOT NULL ,
`followers_count` INT NOT NULL ,
INDEX (  `screen_name` ,  `followers_count` )
) ENGINE = MYISAM ;
