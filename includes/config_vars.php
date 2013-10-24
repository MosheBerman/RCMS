<?php

/*
 * -----------------------------------------
 *			RCMS Variables Library
 * -----------------------------------------
 *  Version 0.1 - October 24, 2008:
 *		- Initial version. Contains 1
 *		  variable, $agentName.
 *
 *  Version 0.2 - October 25, 2008:
 *		- Added 3 variables: $user, $pass
 *		  and $database;
 *		- File is 60 lines long.
 *
 *  Version 0.3 - December 23, 2008:
 *		- Added 1 variable: $host
 *		- Changed the default value of the
 *		  variable $agentName to "Sample Realtor"
 *		- Modified previous catalog entries.
 *		- File is 78 lines long.
 *
 *  Version 0.35 -  December 24, 2008:
 *		- Changed $server to $host.
 *		- File is 81 lines long.
 *
 *	Version 0.4	- October 23, 2013
 *		-	Cleaned out passwords before publishing to GitHub.
 *		- File is 86 lines long.
 *
 * -----------------------------------------
 * Containing:
 * Variables used by the RCMS program
 * =========================================
 * 				Catalog
 * =========================================
 *  1) $agentName:
 *		- a variable naming the agency
 *		  and/or agent to be used throughout
 *		  the website.
 *
 *  2) $user:
 *		- a variable containing the username
 *		  for the connection.
 *
 *  3) $pass:
 *		- a variable containing the password
 *		  for the connection.
 *
 *  4) $database:
 *		- a variable containing the database
 *		  to use for the connection.
 *
 *  5) $host: (formerly $server)
 *		- a variable containing the url of
 *		  the host in the database
 *		  connection request.
 *
 *
 *
 */

////////
// the following line is needed for main module confirmation
$configConfirmed = 1;

///////
// Database Variables
///////

$user = "";							//username variable

$pass = "";							//password variable

$database = "";					//database variable

$server = "";				     //host variable

///////
// Misc variables
///////

$agentName = "Star Easy";		//what is the agent/agency called


?>