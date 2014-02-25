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
<script src="prettify/run_prettify.js?skin=desert"></script>
</head>

<body>

<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a id="toplist" href="#">Top</a></li>
            <li class="active"><a id="latestlist" href="#">Latest</a></li>
            <!--<li><a href="http://instancelabs.eu5.org/">About</a></li>-->
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container"> 
  
<?php
$result = mysql_query("SELECT * FROM snippets ORDER BY id") or die(mysql_error()); 

$currentpost = "";
$count = 0;
while($row = mysql_fetch_array($result)){
    $p0 = $row['id'];
    $p1 = $row['title'];
    $p3 = $row['code'];
    $up = $row['upvotes'];
    $down = $row['downvotes'];
    $date = $row['date'];
    
    $label = "success";
    
    if($down > $up){
        $label = "danger";    
    }
    
    $currentpost = '<div class="row">';
    $currentpost .= '<div class="col-md-6 col-md-offset-3 well"><div class="col-md-1"><h4><span class="label label-' . $label . '">'.($up - $down).'</span></h4></div><div class="col-md-11"><h3>'.$p1.'</h3>';
    $currentpost .= '<p><pre class="prettyprint lang-java linenums:0">' . $p3 . '</pre></p></div></div></div><br>';
    echo($currentpost);
    $count += 1;
}

?>
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
<script src="js/bootstrap.js"></script>
</body>
</html>