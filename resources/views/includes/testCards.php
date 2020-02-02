<?php

function getDisplayHeadings(){
global $pdo;
$q1 = "SELECT  * FROM itemstable WHERE itemType = :s";
$r2 = $pdo->prepare($q1);
$r2->execute(["s"=> "displayHeading"]);
$r3 = $r2->fetchAll();
return $r3;
}//...................
        
function get5papers($displayHeading){
global $pdo;
$q1 = "SELECT  * FROM papers WHERE displayHeading = :s ";
$r2 = $pdo->prepare($q1);
$r2->execute(["s"=> $displayHeading]);
$r3 = $r2->fetchAll();
return $r3;
}//...................

function getLi($r3){
global $home;        
$str = "<li class='collection-item'>";
$str .= "<a href=\"";
$str .= $home .         "/test.php?q=";
$str .= $r3["quintillion"];
$str .= "\">";
$str .= $r3["name"];
$str .= "</a></li>";
return $str;
}

$diplayHeadings = getDisplayHeadings();
echo ("<hr/>");
echo("<div class='row'>");
if(!empty($diplayHeadings)){
foreach($diplayHeadings as $dh){
        $t= "";
        $t.= "<div class='col s4'>";
        $t.= "<ul class='collection with-header center-align'>";
        $t.= "<li class='collection-header blue lighten-5 red-text text-darken-5'><h4>";
        $t .= $dh['itemName'];
        $t .= "</h4></li>";          
        echo($t);      

$r3 = get5papers($dh['itemName']);
        for ($i=0; $i < count($r3); $i++) { 
        $str = getLi($r3[$i],$i);        
        echo($str);               
        }
echo("</ul></div>");                       
}
}
echo("</div>");


?>        
        
 
