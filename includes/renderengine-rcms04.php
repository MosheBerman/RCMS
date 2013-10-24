<?php

/*
 *
 *	Renderengine.php 
 *
 *	Created: January 26, 2010
 *
 *	Modified: January 26, 2010
 *
 *
 *	This is a hierarchial seperation of the rendering engine
 *	Of the real estate catalog. This file deals with reading
 *	and rendering the results into html.
 *
 */
 
 //the following line is needed as a hook for 
 //php files that call this one
 $renderengine = true;
 
if(mysql_num_rows($result) > 0){

	//
	// Print the categories header (picture, description, price)
	//

while($result_row = mysql_fetch_array($result)){
//////////
// Set the query in local variables
/////////

	$id = $result_row[0];
	$timestamp = $result_row[1];
	$exclusive = $result_row[2];
	$title = $result_row[3];
	$addr1 = $result_row[4];
	$addr2 = $result_row[5];
	$city = $result_row[6];
	$state = $result_row[7];
	$zip = $result_row[8];
	$beds = $result_row[9];
	$baths = $result_row[10];
	$balcony = $result_row[11];
	$sq_feet = $result_row[12];
	$amenities = $result_row[13];
	$hasPix = $result_row[14];
	$askingPrice = $result_row[15];
	$isSold = $result_row[16];
	$longDesc = $result_row[17];
	
	print('<div class="listing">');
	nl();
	t('div class="tl"');
	nl();
	t('div class="tr"');
	nl();
	t('div class="bl"');
	nl();
	t('div class="br"');
	nl();
	
	if($mode != 'expanded'){
          $title= '<a href="catalog.php?mode=expanded&listing='.$id.'">'.$title.'</a>';		//creates a link to the individual page of the listing
        }
	
	///////////////////////////////////
	//picture insertion section.	
	//////////////////////////////////

		$pictURL = "na.jpg";			//default the image to the not found image
		$alt = "Image not available";	//default the alt as well...
		
	if($hasPix == "true" || $hasPix == 1 || $hasPix == "yes"){
		$imgconn = mysql_connect($server, $user, $pass);
		$db_select = mysql_select_db($database);
		$pictures = 'SELECT * FROM `pictures` WHERE 1 AND `listing_id_num` = '.$id.'';
		$pix = @mysql_query($pictures);
	  	while($p_row = mysql_fetch_row(($pix))){
			if($p_row[3] == true){
				$pictURL = $p_row[2];
				$alt = $p_row[1];
			}
			mysql_close($imgconn);			
	  	}		
	}
	
	if($mode !=expanded){	
		$img = '  <span class="imagewrapper"><img class="largeimg" src="img/'.$pictURL.'" alt="'.$alt.'"title="'.$alt.'" /></span>';
	}else{
		$img = '  <a href="img/'.$pictURL.'" title="'.$alt. '" rel="lb"  class="livewrapper"><img class="largeimg" src="img/'.$pictURL.'" alt="'.$alt.'"title="Click to enlarge: '.$alt.'" /></a>';
	}
	echo($img);
	nl();
	///////////////////////////////////
	//Listing Header Information 	
	///////////////////////////////////	
	print('<h5 class="listingheader">'.$title.'</h5>');
	printf("<h6 class=\"listingnumber\">#%04d</h6>",$id);				//using printf to format the listing id
	nl();	
	///////////////////////////////////
	//address information section.	
	///////////////////////////////////
	nl();
	print('<ul class="listinglist">');
	nl();
	print("  <li class=\"listingdetail\">$addr1</li>");	
	nl();
	print("  <li class=\"listingdetail\">$beds bed</li>");
	nl();
	print("  <li class=\"listingdetail\">$baths bath</li>");
	nl();
	print("  <li class=\"listingdetail\">$sq_feet sq ft </li>");
	if($balcony == "true" || $balcony == 1){
	  //nl();
	  //print("  <li class=\"listingdetail\">balcony </li>");	
	}
	nl();
	print("  <li class=\"listingdetail price\">&#36;$askingPrice</li>");
	nl();
	print("</ul>");
	nl();
	//print("Added on " . $timestamp . " \n <br />");
	nl();
	if($mode == expanded){
	  if($exclusive == "true" || $exclusive == 1){
		print("<h6 class=\"xclusive\">Exclusively for sale by " . $agentName . "</h6>");
	  }
      nl();
	
	  //amenities section
	  if($amenities == "true"){
	    //echo all of the listing's amenites
	  }	
	  nl();
	  echo('<a href="catalog.php" title="Return to Catalog" class="backarrow"><span class="arrow">&laquo;</span> &laquo; Back</a>');
	}
	t('/div');
	nl();
	t('/div');
	nl();
	t('/div');
	nl();
	t('/div');
	nl();	
	echo("</div>");
} //end main 'while' loop
}else{
  echo '<p class="">No Listings match your search. You can try searching again. Or, If you want, feel free to call me anytime.</p>';
}

?>