<?php 
if(isset($_POST['acc'])){
	if($_POST['acc']=='admin' && $_POST['pw']=="1234"){
		to("back.php");
	}else{
		echo "<script>";
		echo "alert('帳號或密碼錯誤')";
		echo "</script>";
	}
}


?>

<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <?php include "marquee.php";?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <form method="post" action="?do=login">
        <p class="t botli">管理員登入區</p>
        <p class="cent">帳號 ： <input name="acc" autofocus="" type="text"></p>
        <p class="cent">密碼 ： <input name="pw" type="password"></p>
        <p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
    </form>
</div>