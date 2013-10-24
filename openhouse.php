<!DOCTYPE html>
<html>
<head>
	<title>
		Sell with Star Easy
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
	<style>	
    #header{
	  background: #3AB7FF url("img/topbar-sell.png") bottom no-repeat;
	}
	</style>
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
	  <h3>Open houses</h3>
	  <h6>Save the Date! Come see your dream apartment.</h6> 
    </div>
    <div id="footer">
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
</body>
</html>