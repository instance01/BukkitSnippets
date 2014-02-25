<?php

include("config.php");

// mysql connect
connect();

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