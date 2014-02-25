<?php

include("config.php");

// mysql connect
connect();

$result = mysql_query("SELECT * , upvotes - downvotes AS x FROM snippets ORDER BY x DESC LIMIT 100") or die(mysql_error()); 

$currentpost = "";
$count = 0;
while($row = mysql_fetch_array($result)){
    $p0 = $row['id'];
    $p1 = $row['title'];
    $p3 = $row['code'];
    $up = $row['upvotes'];
    $down = $row['downvotes'];
    $date = $row['date'];
    
    /*$label = "success";
    
    if($down > $up){
        $label = "danger";    
    }*/
    
    $currentpost = '<div class="row">';
    //$currentpost .= '<div class="col-md-6 col-md-offset-3 well"><div class="col-md-1"><span class="glyphicon glyphicon-chevron-up"></span><span class="label label-' . $label . '">'.($up - $down).'</span><span class="glyphicon glyphicon-chevron-down"></span></div><div class="col-md-11"><h3>'.$p1.'</h3>';
	  $currentpost .= '<div class="col-md-6 col-md-offset-3 well"><div class="col-md-1"><br><span class="label label-success"><span class="glyphicon glyphicon-chevron-up"></span></span><br><div style="margin: 3px"><center><b><font size="+1">'.($up - $down).'</font></b></center></div><span class="label label-danger"><span class="glyphicon glyphicon-chevron-down"></span></span></div><div class="col-md-11"><h3>'.$p1.'</h3>';
    $currentpost .= '<p><pre class="prettyprint lang-java linenums:0">' . $p3 . '</pre></p></div></div></div><br>';
    echo($currentpost);
    $count += 1;
}

?>