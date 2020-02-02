<?php
//-------------------getPaper-------------------------
$q1 = "SELECT  * FROM papers WHERE quintillion = :qq";
$r2 = $pdo->prepare($q1);
$r2->execute(["qq"=> $testId]);
$r3 = $r2->fetchAll();
//$level = $r3[0]['subject'];//subject shd be level in DB
$totalTimeAllowed = $r3[0]['totalTimeAllowed'];
$paper = json_decode($r3[0]['paper'],true);
// echo("<pre>");
// print_r($paper);

$final = array();

foreach($paper as $p){
    $subj = $p["subject"];
    //$subj = itemId2Name($s);
    $lvl = $p["level"];
    //$lvl = itemId2Name($l);
//---------------------

            if($p['easy']>0){
            $easy = getQuestions($subj,$lvl,"easy");
            $slicedEasy = array_slice($easy, 0,$p['easy']);
            $final = array_merge($final,$slicedEasy);
            }

            if($p['medium']>0){
            $easy = getQuestions($subj,$lvl,"medium");
            $slicedMed = array_slice($easy, 0,$p['medium']);
            $final = array_merge($final,$slicedMed);
            }

            if($p['hard']>0){
            $easy = getQuestions($subj,$lvl,"hard");
            $slicedHard = array_slice($easy, 0,$p['hard']);
            $final = array_merge($final,$slicedHard);
            }


}//foreach
//..----------------------------------------
//this is where we return
//echo("<pre>");
$ret['success'] = true;
$ret['papers'] = $final;
$ret['totalTimeAllowed']= $totalTimeAllowed;
print_r (json_encode($ret));
//print_r ($final);
//..----------------------------------------
//.........................OLD code
function shuffle_assoc($list) {
    if (!is_array($list)) return $list;
    $keys = array_keys($list);
    shuffle($keys);
    $random = array();
    foreach ($keys as $key) {
      $random[$key] = $list[$key];
    }
    return $random;
  }

function getQuestions($subject,$level,$difficulty){
global $pdo;
$q1 = "SELECT  * FROM questions WHERE subject = :subject && level=:level && difficulty = :difficulty";
$r2 = $pdo->prepare($q1);
$r2->execute(["subject"=> $subject,"level"=>$level, "difficulty"=> $difficulty]);
$r3 = $r2->fetchAll();
$shuffled = (shuffle_assoc($r3));

return $shuffled;
}//getQuestions

function itemId2Name($id){
global $pdo;
$q1 = "SELECT  itemName FROM itemstable WHERE id = :id";
$r2 = $pdo->prepare($q1);
$r2->execute(["id"=> $id]);
$r3 = $r2->fetchAll();
return $r3[0]['itemName'];
}//getQuestions

function chqNoOfTestsAllowed($id){
global $pdo;
$q1 = "SELECT  * FROM users WHERE id = :id";
$r2 = $pdo->prepare($q1);
$r2->execute(["id"=> $id]);
$r3 = $r2->fetchAll();
if($r3[0]['numberOfTestsAllowed'] <= 0 ){
  return false;
}else{
  return true;
}

}//no of tests allowed
?>
