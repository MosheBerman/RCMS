<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/html" xml:lang="en" lang="en">
<head>

</head>
<body>
<?php


$sql_step1 = 'CREATE TABLE `pictures` ( `picture_id` INT( 4 ) DEFAULT NULL ,'
        . ' `title` VARCHAR( 40 ) DEFAULT \'not set\' NOT NULL ,'
        . ' `url` VARCHAR( 40 ) DEFAULT \'not set\' NOT NULL ,'
        . ' `isMain` VARCHAR( 5 ) DEFAULT \'false\' NOT NULL ,'
        . ' `listing_id_num` INT( 3 ) DEFAULT \'0\' NOT NULL ,'
        . ' PRIMARY KEY ( `picture_id` ) ) CHARACTER SET = latin1;'
        . ' ';


$sql_step2 = 'CREATE TABLE `descriptions` ( `desc_id` INT( 4 ) DEFAULT NULL NOT NULL AUTO_INCREMENT ,'
        . ' `listing_id_num` VARCHAR( 4 ) NOT NULL ,'
        . ' `content` MEDIUMTEXT NOT NULL ,'
        . ' PRIMARY KEY ( `desc_id` ) ) CHARACTER SET = latin1;'
        . ' ';

$sql_step3 = 'CREATE TABLE `amenities` ( `amenities_id` INT NOT NULL AUTO_INCREMENT ,'
        . ' `listing_id_num` VARCHAR( 4 ) NOT NULL ,'
        . ' `content` MEDIUMTEXT NOT NULL ,'
        . ' PRIMARY KEY ( `amenities_id` ) ) CHARACTER SET = latin1;'
        . ' ';

$sql_step4 = 'CREATE TABLE `properties` ( `listing_id` INT( 4 ) NOT NULL AUTO_INCREMENT ,'
        . ' `isExclusive` VARCHAR( 5 ) NOT NULL ,'
        . ' `title` VARCHAR( 40 ) NOT NULL ,'
        . ' `addr1` VARCHAR( 15 ) NOT NULL ,'
        . ' `addr2` VARCHAR( 25 ) NOT NULL ,'
        . ' `city` VARCHAR( 25 ) NOT NULL ,'
        . ' `state` VARCHAR( 2 ) NOT NULL ,'
        . ' `zip` VARCHAR( 11 ) NOT NULL ,'
        . ' `beds` VARCHAR( 3 ) NOT NULL ,'
        . ' `bath` VARCHAR( 3 ) NOT NULL ,'
        . ' `sq_feet` VARCHAR( 7 ) NOT NULL ,'
        . ' `hasPix` VARCHAR( 5 ) NOT NULL ,'
        . ' `askingPrice` INT NOT NULL ,'
        . ' `isSold` VARCHAR( 5 ) NOT NULL ,'
        . ' `longDesc` INT NOT NULL ,'
        . ' PRIMARY KEY ( `listing_id` ) ) CHARACTER SET = latin1;'
        . ' ';
?>

</body>
</html>