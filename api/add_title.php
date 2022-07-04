<?php
include_once "../base.php";
$text=$_POST['text'];

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $img=$_FILES['img']['name'];
}

$data=['img'=>$img,'text'=>$text,'sh'=>0];
$title=new DB('title');
$title->save($data);

to("../back.php?do=title");

?>