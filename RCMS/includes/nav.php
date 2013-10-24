<?php

  /*
   *   This is the links 
   *   file for the RCMS website.
   *   
   *   Last Modified: December 29, 2009
   *
   */
   
   $homelink = " \n   <a href=\"index.php\" title=\"Home sweet home!\"  class=\"link\">Home</a> \n   ";
   
   print("<ul> \n");   
   print("  <li class=\"nav\">$homelink</li>");
   print("  <li class=\"nav\" id=\"sell\"><a href=\"sell.php\" title=\"Why should you sell with Ezra? Click here to find out!\" class=\"link\">Sell with Ezra</a> \n  </li> \n");    
   print("  <li class=\"nav\" id=\"catalog\"><a href=\"catalog.php\" title=\"Browse my listings and find something for you.\" class=\"link\">View listings</a>\n  </li> \n");
   print("  <li class=\"nav\" id=\"catalog\"><a href=\"openhouse.php\" title=\"Save the date and come see your dream apartment.\" class=\"link\">Open Houses</a>\n  </li> \n");          
   print("</ul> \n");
   
    
?>