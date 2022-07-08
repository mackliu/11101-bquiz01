<?php
include_once "../base.php";
$text=$_POST['text'];

$data=['text'=>$text,'sh'=>1];

$Ad->save($data);

to("../back.php?do=ad");

?>