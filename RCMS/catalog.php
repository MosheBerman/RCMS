<!DOCTYPE html>
<html>
<head>
	<title>
		Catalog - Star Easy Realty
	</title>
    <?php @include_once("includes/style.php"); ?>
    <style type="text/css" media="screen">
		.listing:first-letter{
			font-size: 1em;	  
    }		
    </style>
    <link type="text/css" media="screen" rel="stylesheet" href="./css/colorbox.css" />
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.color.js"></script>
    <script src="./js/jquery.colorbox.js"></script>	
    <script>
	  $(document).ready(function(event){
	    $(".nav a").hover(function(event){
		  $(this).animate({"color":"#98DCFF"}, 900);
		},function(event){
		  $(this).animate({"color":"#3AB7FF"}, 900);
		});
		$("a[rel='lb']").colorbox();
	  });
     </script>
</head>
<body>
  <div id="centercol">
    <div id="header"> 
      <?php @include_once("includes/header.php"); ?>
    </div>
    <div id="leftcol">
       <?php include_once("includes/nav.php"); ?>
    </div>
    <div id="rightcol">
      <?php
	    @include_once("includes/catalogengine.php");
		if(!$catalog){
			
			print("<div class=\"yellow\">Failed to load the catalog. Please contact the webmaster.</div>");
		}
      ?>
    </div>
    <div id="footer">
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
</body>
</html>
