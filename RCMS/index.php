<!DOCTYPE html>
<html>
<head>
	<title>
		Star Easy Properties
	</title>
	<?php @include_once("includes/style.php"); ?>
	<script src="./js/jquery.js"></script>
	<script src="./js/jquery.color.js"></script>
	<script>
	  $(document).ready(function(event){
	    $(".nav a").hover(function(event){
		  $(this).animate({"color":"#98DCFF"}, 900);
		},function(event){
		  $(this).animate({"color":"#3AB7FF"}, 900);
		});
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
	  <p>Everyone sees this.</p>
    </div>
    <div id="footer">
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
</body>
</html>