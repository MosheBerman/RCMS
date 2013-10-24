<?php

/*
 * =========================================
 *		RCMS Listing Catalog page
 * -----------------------------------------
 * Version 0.5 - October 26, 2008:
 *		- Displays listings based on a $_GET
 *		  parameter. Reads information out
 *		  of a database and acts accordingly.
 *		- File is 317 lines long.
 *
 * Version 0.6 - December 20, 2008:
 *		- The $_GET parameter is now secured
 *		  from code injections. The error
 *		  messages have been tweaked
 *		  slightly to display a link to the
 *		  'all listings' page.
 *		- File is 327 lines long.
 *
 * Version 0.65 - December 26, 2009: (Yep, over a year later)
 *		- Catalog file has been renamed to "catalogengine.php"
 *		- Image read algorithm is changed slightly to default
 *		  to "na.jpg" for the src attributye and a default "alt"
 *		  has been created as well. (See below)
 *		- Certain sections have been moidified and commented upon slightly
 *		- To Do list added below.
 *		- File is 329 lines long. (With the new comments, minus the HTML - pretty even balance, eh?)
 *
 * Version 0.65.5 - December 26, 2009: 
 *		- Removed certain echo commands that were mimicing
 *		  the functionality of the report() function pf report.php
 *		  for security reasons
 *		- File is 328 lines long. (Wow, losing weight...)
 *
 * Version 0.68 - December 27, 2009: 
 *		- Removed "die()" function calls and instead placed comment placeholders 
 *		  for future error handling. The previous way (aka: die 
 *		  was not good for an engine included in another page. The 
 *		  containing page won't finish rendering that way.
 *		- Reordered the rendering process to render the image first.
 *		  This was done because of the way the CSS works out with the page layout.
 *		- Added an if ... else to check for a query that returns 0 rows.
 *		  If zero rows are returned, shows a message that no matches were found.
 *		- Restuctured $sql query variable to allow for more flexible filtering in future versions
 *		- Modified the check for a $_GET[] parameter
 *		- File is 336 lines long.
 *
 * Version 0.69 - December 27, 2009: 
 *		- Restructured listing ID output using printf statement
 *		- Added in balcony printing where applicable
 *		- Modified "exclusive" check to treat '1' and 'true' the same. (Meaning - print in both cases.)
 *		- File is 347 lines long. 
 *
 * Version 0.7 - December 31, 2009: 
 *	  - Added a MySQL databease check. If the DB is not 
 *		  installed, "false" functions will cover for the 
 *		  lack of MySQL. They automatically return false.
 *		- Balcony is not being printed - this is to save
 *		  space in listing summaries.
 *		- File is 394 lines long.
 *
 * Version 0.7.1 - January 1, 2010: 
 *	  	- Modified images to be wrapped in link for lightbox
 *		  support.
 *		- File is 400 lines long.
 *
 * Version 0.7.2 - January 8 2010:
 *		- Added initial part of "Modes" vor vieweing 
 *		  single listings individually and possibly 
 *		  also side-by-side compare view
 *		- File is 419 lines long
 *
  * Version 0.7.3 - January 17 2010:
 *		- Added more modes ("all" - everything, "search" - search panel)
 *		- Interim  mod, changes may be ignored/undone in future versions.
 *		- File is 450 lines long
 *
 * =========================================
 *
 * TO DO List:
 * ----------
 *	~ Clean up error messages more.
 *	~ Continue reformatting of query output.
 *	~ Add sorting options, perhaps create a user search page. (Sort by Sq Ft, Rooms, Price, Location, Floor, Balcony...)
 *	~ Add a comparison option.
 *
*/


$catalog_register = "present";	//shows containing pages that catalog has loaded

//////////////////////////////////////////////////////////////////////////////////
// Check for MySQL - If it doesn't exist, provide 'catch' placeholder functions	//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

if(!function_exists('mysql_connect')){  
  function mysql_connect($s, $u, $p){ 
    return false;   
  }
  
  function mysql_select_db($db){
    return false;
  }
  
  function mysql_query($q){
    return false;
  }
  
  function mysql_close($c){
    return false;
  }
  
  function mysql_num_rows($q){
    return false;
  }
}

//////////////////////////////////////
// load the required code libraries	//////////////////////////////////////////////////////////////////////
//////////////////////////////////////

//////////////////////
// reporting module	//
//////////////////////

@include_once("includes/reporting.php");

////
//check if the above module [reporting] successfully loaded
////

if($reportingConfirmed){
	//report - reporting is running!
	report(1);
}else{
	//failure, define a "placeholder function to avoid invalid function calls
	function report($number){
	  return 0;
	}
}

//report - loading external libraries
report(2);

//////////////////////
// quickCode module //
//////////////////////			

require_once("includes/templater4.php");

////
//check if the above module [quickCode] successfully loaded
////

if($quickConfirmed){
	//successfully loaded the quick codes module
}elseif(!$quickConfirmed){
	//failure, report an error
	print("-->");
	echo("<h1 class='yellow'>Fatal Error</h1> \n <p class='yellow'>Couldn't confirm that the 'Quick Code' module successfully loaded. Quitting to avoid undefined function calls. To fix the problem, make sure that the 'quickcode.php' is placed in the 'includes' directory</p>");
}

//////////////////////////
// external vars module	//
//////////////////////////

@include_once("includes/config_vars.php");

if(!$configConfirmed){
 echo("--><h1 class='yellow'>Error</h1> \n <p class='yellow'>Couldn't load the 'External Vars' module. Quitting to avoid undefined variable calls. To fix the problem, make sure that the 'config_vars.php' is placed in the 'includes' directory</p>");
}

//report - done!
report(7);

///////////////////////////////////
//Check what mode the viewer is in
// and apply appropriate actions
///////////////////////////////////

$mode = htmlentities($_GET['mode']); 					//store the mode for the rest of the engine

if($mode == NULL){										//if there is no "mode set"
  $mode = "all";										//default to "view all"
}

if($mode=="expanded" && $_GET['listing'] == NULL){		//if there is no listing number provided
  $mode = "all";										//default to "view all"
}
	
///////////////////////////////
// Check for			  	/////////////////////////////////////////
///////////////////////////////

if($mode == "search"){

}else{

///////////////////////////////
// Connect to the database   /////////////////////////////////////////
///////////////////////////////

//report -  Attemting to establish connection ...
report(4);

////
//Step 1) Set connection in variable
////

$conn = mysql_connect($server, $user, $pass);

////
// Step 2) Verify the connection
////

if(!$conn){
	//Check database name, username and password.	
}

////
// Step 3) Select the database
////

$db_select = mysql_select_db($database);

////
// Step 4) Verify successful selection
////

if(!$db_select){
	//Could not select databse	
}

////
// Step 5) Create the original the query
////

$selector = " * ";
$target = "`properties`";
$condition = "1";

$sql = "SELECT " . $selector . " FROM " . $target . " WHERE " . $condition;

////
//  Step 6) Check for listings request
////

if($_GET['listing'] && !is_null($_GET['listing'])){					//if a listing number was supplied	
	$listingNum = htmlentities($_GET['listing']);					//store the requested listing number
	$pattern = '/\b[0-9]{1,6}\b/';									//define a range of valid, sercheable listings
	if(preg_match($pattern,$listingNum) == 1){						//if the listing id is a valid one
		$sql .= " AND `listing_id` =" .$listingNum . "";			//search for it in the database
	}elseif($exp == 0){												//if the listing number is out of range			
		if($listingNum != "all"){									//check if the "all" keyword was ommitted - if it was not supplied.
			//invalid listing id
		}		
	}
}else if(!$_GET['listing']){
	//No listing ID supplied
}



if(!$sql){
	//report - failed, see next line...
	report(5);
	//report - FATAL ERROR: Could not run query.
	report(11);
	//
	// For some reason the query doesn't exist here. I really do wonder why.
	//
}else{
  //report - done!
  report(7);
  nl();
}

$result = mysql_query($sql);	//perform the actual query

if(!$result){
	//There is no result
}

@mysql_close($conn);

@include_once("renderengine.php");

if(!$renderengine){
  print("<h1 class=\"yellow\">Error!</h1> \n <p>I can't show the results...</p>");
}

}
?>