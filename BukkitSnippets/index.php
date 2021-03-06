<?php
ob_start("ob_gzhandler");
include("config.php");

// mysql connect
connect();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Bukkit Snippets">
<meta name="author" content="InstanceLabs">
<title>BukkitSnippets</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/instancelabs.css" rel="stylesheet">
</head>

<body>
<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li id="tab0"><a id="toplist" href="#">Top</a></li>
            <li id="tab1" class="active"><a id="latestlist" href="#">Latest</a></li>
            <!--<li><a href="http://instancelabs.eu5.org/">About</a></li>-->
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">

  <div id="current">
  
  </div>
  <hr>
  <footer>
    <div class="row">
      <div class="col-lg-12">
        <p>Copyright &copy; InstanceLabs 2014 &middot; <a href="http://github.com/instance01/">Github</a> &middot; <a href="http://dev.bukkit.org/profiles/instancelabs/">Bukkit Dev</a></p>
      </div>
    </div>
  </footer>
</div>

<script src="js/jquery.js"></script> 
<script type="text/javascript">

$(document).ready(function(e) {
	$("#current").load('latest.php');
	$.getScript("prettify/run_prettify.js?skin=desert");
	$("#latestlist").click(function(){
		$("#current").load('latest.php');
		$.getScript("prettify/run_prettify.js?skin=desert");
		$("#tab0").removeClass("active");
		$("#tab1").addClass("active");
	});
	$("#toplist").click(function(){
		$("#current").load('top.php');
		$.getScript("prettify/run_prettify.js?skin=desert");
		$("#tab1").removeClass("active");
		$("#tab0").addClass("active");
	});
});

</script>
<script src="prettify/run_prettify.js?skin=desert"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>