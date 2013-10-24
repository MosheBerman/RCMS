<!DOCTYPE html>
<html>
<head>
	<title>
		Sell with Star Easy
	</title>
	
	<?php @include_once("includes/style.php"); ?>
	<style>	
    #header{
	  background: #3AB7FF url("img/topbar-sell.png") bottom no-repeat;
	}
	</style>
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
	  <h2 id="colhead">Sell with Star Easy</h2>
	  <p><span class="t">T</span>he apartments in the town are better than any other apartments in the city. They are much larger and much less expensive. You can't get anything like this anywhere else in the city.</p>
      <p>When you sell with Star Easy, you are getting the best value for your apartment. With Star Easy, <em>you pay just two percent</em> commission. With other realtors, you are paying three or four percent. This means that when you sell with Star Easy, you can save up to $20,000!</p> 
    </div>
    <div id="footer">
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
</body>
</html>