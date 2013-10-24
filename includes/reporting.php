<?php

/* =========================================
 * 		 RCMS Error Reporting Library
 * -----------------------------------------
 * 	Version 0.1 - October 24, 2008:
 *		- Contains 1 function,
 *		  report($errNo).
 *		- Contains 1 variable,
 *		  $reportingConfirmed
 *	Version 0.2 - October 25, 2008:
 *		- added a param, '$mode', to the
 *		  function report($errNo) with a
 *		  default value of "comment".
 *	Version 0.25 - October 25, 2008:
 *		- added a second possible value
 *		  for function report()'s' parameter
 *		  '$mode'.
 *		- Implemented 'mode check' to print
 *		  EITHER (X)HTML comment tags or
 *		  (X)HTML header tags.
 *		- File is  138 lines long.
 *	Version 0.3 - December 26, 2009: (over 400 days later!)
 *		- Report mode now silently ignores all report
 *		  function calls unless explicitly told otherwise
 *		  for security reasons. (This way avoids showing comments in 
 *		  client side HTML.)
 *		- Added to do list
 *		- File is  149 lines long.
 * -----------------------------------------
 * 				Containing:
 * PHP status reports for rendering into
 * (X)HTML comments
 * -----------------------------------------
 * Containing:
 * 1 function that renders
 * (X)HTML comments based on an input param.
 * 1 variable that confirms the existence of
 * this file to the main page and proves
 * that this module has successfully loaded.
 * =========================================
 * 		Catalog
 * =========================================
 * 1) report($errNo, $mode = "comment"):
 *		- takes $errNo as a parameter and
 *		  writes an (X)HTML comment to match
 *		  it.
 *		  As of version 0.3 report writes a
 *		  comment OR (X)HTML header tag
 *		  depending on the value of the second
 *		  parameter.
 *		- As of Version 0.2, report() also
 *		  takes a second param called $mode.
 *
 * 2) $reportingConfirmed:
 *		- proves to the main module that
 *		  reporting has successfullly
 *		  loaded.
 * -----------------------------------------
 *  TO DO LIST:
 * -----------------------------------------
 * ~Add report to file functionality for 
 *  realtime server logging
 */


////////
// 1)the main function
////////
 function report($errNo = "empty", $mode = "off"){
	//validate the mode parameter
	if($mode =="off"){	//if an alternate mode hasn't been provided
		return 0;		//leave the function		
	}
	//open the comment or header as long as it isn't' already opened.
 	if($errNo != 7 && $errNo != 5){
 		print(" \n");
 		if($mode == "comment"){
 			print("<!-- ");
 		}elseif(mode == "bigheader"){
		 	print("<h1>");
 		}

 		if( $errNo != "empty"){
			print("Reporting code #" . $errNo . ": ");
		}
 	}

 	switch($errNo){
 		case 1: 	//report #1
 		  print("Status reporting is working!");
 		break;
 		case 2: 	//report #2
 		  print("Loading external libraries ... ");
 		break;
 		case 3: 	//report #3
 		 print("Configuring MySQL connection variables ...");
 		break;
 		case 4: 	//report #4
 		  print("Attemting to establish connection ... ");
 		break;
 		case 5: 	//report #5
 			print(" failed, see below... ");
 		break;
 		case 6: 	//report #6
 			print("Selecting database ... ");
 		break;
 		case 7: 	//report #7
		  print(" done! ");
 		break;
 		case 8:		//report #8
 			print("FATAL ERROR: Could not select database.");
 		break;
 		case 9:		//report #9
 			print("FATAL ERROR: Check database name, username and password.");
 		break;
 		case 10:		//report #10
 			print("Running query ... ");
 		break;
 		case 11:		//report #11\
 			print("FATAL ERROR: Could not run query.");
 		break;
 		case 12:		//report #12
 			print("Invalid listing ID");
 		break;
 		case "empty": //an empty report() call
 			print("Received an empty report call. ");
 		break;
 		default: //default report
 		  print("'Error and status reporting' is on, but this error code, #" . $errNo . ", isn't defined.");
 		break;
 	}
 	if($errNo == 1 || $errNo == 5 || $errNo == 7 || $errNo == 8 || $errNo == 9 || $errNo == 11 || $errNo ==12|| $errNo == "empty"){
 		if($mode == "comment"){
 		  print("-->");
 		}elseif(mode == "bigheader"){
 			print("</h1>");
 		}
 	}
 	print("\n");
 }

////////
// 2) $reportingConfirmed variable
///////

$reportingConfirmed = 1;

 ?>