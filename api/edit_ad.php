<?php
include_once "../base.php";

if(!empty($_POST['id'])){
    foreach($_POST['id'] as $idx=>$id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Ad->del($id);
        }else{
            $row=$Ad->find($id);
            $row['text']=$_POST['text'][$idx];
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $Ad->save($row);
        }
    }
}





to("../back.php?do=ad");

?>