<?php

/* ========================================
 * 		RCMS Quick HTML Code Library
 * ----------------------------------------
 * Version 0.1 - October 24, 2008:
 *		- intial version. Contains 5
 *		  functions: nl(), br(), nb(), bn()
 *		  and nbn().
 * Version 0.2 - October 26, 2008:
 *		- Adds 1 function, nhn().
 *		- File is  86 lines long.
 *
 * Version 0.3 - December 23, 2008:
 *		- Adds 2 functions hd() and
 *		  stylesheet().
 *		- File is 176 lines long
 *
 * Version 0.4 - December 24, 2008:
 *		- Adds 10 functions, (here goes,)
 *		  docTyper(), htmlo(), htmlc(),
 *		  heado(), headc(), titleln(),
 *		  bodyo(), bodyc(), pgopn(),
 *		  and pgcls(). (Whew!)
 *		- File is 356 lines long. (HUGE!)
 *
 * Version 0.4.5 - December 27, 2009 (Twenty-Oh-NINE!!)
 *		- Adds HTML 5 Doctype support
 *		  to the Doctyper method
 *		-Adds t() function.
 *		-File is 372 Lines long
 * ========================================
 * 				Containing:
 * PHP functions that render print
 * statements with predefined content.
 * ========================================
 * 				Catalog
 * ========================================
 * 1) nl(); - prints a newline character.
 *
 * 2) br(); - prints (X)HTML <br />.
 *
 * 3) nb(); - prints a newline followed by
 * 			  an (X)HTML <br />.
 *
 * 4) bn(); - prints an (X)HTML <br />
 *			  followed by a newline.
 *
 * 5) nbn(); - prints a newline followed by
 * 			  an (X)HTML <br /> followed
 *			  by a second newline.
 *
 * 6) nhn(); - prints a newline followed by
 * 			  an (X)HTML <hr /> followed
 *			  by a second newline.
 *
 * 7) h(); - prints an (X)HTML header tag,
 *			 detects the size and string
 *			 values.
 *		   - takes 4 parameters:
 *
 *				i)$string - What type of
 *				tag to generate (open or
 *				close)
 *
 *				ii)$id - the (X)HTML tag
 *				id that you want to assign.
 *
 *				iii)$idtype - should the
 *				id be an id or class?
 *
 *			 	iv)$size - The size of the
 *				header tag (eg: <h6>,  where
 *			 	6 is the size)
 *
 * 8) stylesheet(); - prints an (X)HTML
 *					  stylesheet to the page
 *					- takes 2 parameters:
 *
 *					  i)$sheetName - the
 *					  name of the stylesheet.
 *
 *					  ii)$directory - the
 *					  name of the directory
 *					  that the stylesheet is
 *					  located in.
 *
 * 9) docTyper(); - prints the DOCTYPE tag.
 *				  - takes 1 parameter:
 *					$docType, which says
 *					which doctype to use.
 *
 * 10) htmlo(); - prints the <html> tag.
 *
 * 11) htmlc(); - prints the </html> tag.
 *
 * 12) heado(); - prints the <head> tag.
 *
 * 13) headc(); - prints the </head> tag.
 *
 * 14) titleln(); - prints the (X)HTML title.
 *				  - takes 1 parameter, $title
 *				    which determines what to
 *				    print as the title.
 *
 * 15) bodyo(); - prints the <body> tag.
 *
 * 16) bodyc(); - prints the </body> tag.
 *
 * 17) pgopn(); - runs functions 9,10,12,14
 *					 and 15 in order. Takes
 *					 4 parameters:
 *
 *					i)$docType - see 9
 *
 *					ii)$title - see 13
 *
 *					iii)$styleSheet - see 8
 *
 *					iv)$styleDir - see 8
 *
 * 18) pgcls(); - runs functions 16 and 11.
 *
 * 19) t(); - Prints an hmtl tag. Takes 1 parameter
 *
 *					i) $tag - what to print in
 *					   the tag
 *
 *
 */


////////
// the following line is needed for main module confirmation
$quickConfirmed = 1;

///////
//prints a newline - used for printing "eye-pretty" code.
///////
function nl(){
	print("\n");
}

//////
//prints the (X)HTML code for a line break - used for formatting (X)HTML.
//////
function br(){
	print("<br />");
}

//////
//prints a newline followed by the (X)HTML code for a line break
//////
function nb(){
	print("\n <br />");
}

//////
//prints the (X)HTML code for a line break followed by a newline
//////
function bn(){
	print("<br /> \n");
}

//////
//prints a newline followed by the (X)HTML code for a line break followed by a second newline.
//////
function nbn(){
	print("\n <br /> \n");
}

//////
//prints a newline followed by the (X)HTML code for a horizontal line followed by a second newline.
//////
function nhn(){
	print("\n <hr /> \n");
}

//////
//prints a (X)HTML header tag
//////
function h($string="o",$id=NULL, $type="id", $size = 1){
	$size = htmlentities($size);
	$string = $string;
	$id = htmlentities($id);
	$type = htmlentities($type);
	if($size != 1 && $size != 2 && $size != 3 && $size != 4 && $size != 5 && $size != 6 ){
	  $size = 1;
	}
	if($id != NULL){
	  if($type != "id" && $type != "class"){
	  	$type = "id";
	  }
	  $concatId = $type.'="'.$id.'"';
	}
	switch($string){
	case "o":
		print("<h".$size." ".$concatId.">");
	break;
	case "c":
		print("</h".$size.">");
	break;
	default:
		print("<h".$size." ".$concatId.">".$string."</h".$size.">");
	break;
	}
}

//////
// Includes a CSS stylesheet in the page
/////

function stylesheet($sheetName = NULL,$directory = NULL){
	$sheetName = htmlentities($sheetName);
	$directory = htmlentities($directory);
	if($sheetName != NULL){
		if($directory != NULL){
		  $sheetName = $directory."/".$sheetName;
		}
		print('<link rel="stylesheet" type="text/css" href="'.$sheetName.'" />');
		nl();
	}
}


//////
// prints an (X)HTML doctype tag
//////

function docTyper($docType=NULL){
	  $docType = htmlentities($docType);
	  switch($docType){
	  	case "xhtml-strict":
	  		print('<!DOCTYPE html PUBLIC -"//W3C//DTD XHTML 1.0 Strict//EN"');
	  		nl();
	  		print('"http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">');
	  	break;
	  	case "xhtml-trans":
	  		print('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"');
	  		nl();
	  		print('"http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">');
	  	break;
	  	case "xhtml-loose":
	  		print('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Loose//EN"');
	  		nl();
	  		print('"http://www.w3.org/tr/xhtml1/dtd/xhtml1-loose.dtd">');
	  	break;
	  	case "html-trans":
	  		print('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"');
	  		nl();
	  		print('"http://www.w3.org/TR/html4/loose.dtd">');
	  	break;
		case "html-5":
		print('<!DOCTYPE html>');
		nl();
		break;
	  	case none:
			//do nothing.
	  	break;
	  	default:
	  		print('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"');
	  		nl();
	  		print('"http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">');
	  	break;
	  }
	  nl();
}

//////
// prints an (X)HTML html tag
//////

function htmlo(){
	echo("<html>");
	nl();
}

//////
// prints an (X)HTML </html> tag
//////

function htmlc(){
	echo("</html>");
	nl();
}

/////
// prints out head tag opener
/////
function heado(){
	echo("<head>");
	nl();
}

/////
// prints out head tag closer
/////
function headc(){
	echo("</head>");
	nl();
}

//////
//  prints out the (X)HTML title tags and content
//////

function titleln($title){
$title = htmlentities($title);
  if($title != NULL){
	print("<title>");
	nl();
	print($title);
	nl();
	print("</title>");
	nl();
  }
}

/////
// prints out body tag opener
/////
function bodyo(){
	echo("<body>");
	nl();
}

/////
// prints out body tag closer
/////
function bodyc(){
	echo("</body>");
	nl();
}

//////
//  Prints the top of an html page from the doctype throught the opening of the body tag
/////

function pgopn($docType = NULL, $title = "Generated page", $styleSheet = NULL, $styleDir = NULL){

	$docType = htmlentities($docType);
	$title = htmlentities($title);
	$styleSheet = htmlentities($styleSheet);
	$styleDir = htmlentities($styleDir);

	if($docType != NULL){
		docTyper($docType);
	}

	htmlo();
	heado();
	titleln($title);
	stylesheet($styleSheet,$styleDir);
	headc();
	bodyo();
}

//////
//  Closes the body AND html tags
//////
function pgcls(){
  nl();
  bodyc();
  nl();
  htmlc();
}

function t($tag){
  print("<".$tag.">");
}

?>