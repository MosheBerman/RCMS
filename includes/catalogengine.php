<?php

/*
 *
 *	Name: Catalog.php
 *
 *	Created: 1/26/10
 *
 *	Modified: 1/26/10
 *
 *	Description: 
 *	------------
 *	This file reads the	database and shows listings and can sort and search 
 *	them based on a number of factors
 * 
 */
 
 /////////
 //	Register with parent file
 ////////
 $catalog = true;
 
 ///////
 //	Get the page mode
 ///////
 
 $mode = htmlentities($_GET['mode']);
 
 $submode = htmlentities($_GET['submode']);
 
 switch($mode){
	case "search":
	
	break;
	default:
		echo"hi";
	break;
 }
 

?>