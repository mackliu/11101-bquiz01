<?php
include_once "../base.php";

$chk=$Admin->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if($chk >0 ){
    $_SESSION['login']=1;
    to("../back.php");
}else{
?>
<script>
    alert("帳號密碼錯誤");
    location.href="../index.php?do=login";
</script>

<?php
}
?>