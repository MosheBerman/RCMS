<?php
//insert pwd info into database

$sql = 'INSERT INTO `Username` ( `name_id` , `username` , `pwd` ) VALUES ( LAST_INSERT_ID( ) , \'mo\', \'test\' );

?>