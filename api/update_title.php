<?php
include_once "../base.php";

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $img=$_FILES['img']['name'];
}

$id=$_POST['id'];
$row=$Title->find($id);
$row['img']=$img;
$Title->save($row);

to("../back.php?do=title");

?>