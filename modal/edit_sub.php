<?php 
include_once "../base.php";

$subs=$Menu->all(['parent'=>$_GET['id']]);

?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="./api/edit_sub.php" method="post">
<table style="width:70%;margin:auto" id="submenu">
    <tr>
        <td>次選單名稱</td>
        <td>次選單連結網址</td>
        <td>刪除</td>
    </tr>
    <?php
        foreach($subs as $sub){    ?>
    <tr>
        <td>
            <input type="text" name="text[]" value="<?=$sub['text'];?>">
        </td>
        <td>
            <input type="text" name="href[]" value="<?=$sub['href'];?>">
        </td>
        <td>
            <input type="checkbox" name="del[]" value="<?=$sub['id'];?>">
        </td>
    </tr>
            <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
    <?php
        }
    ?>
</table>

<div class="cent">
    <input type="hidden" name="parent" value="<?=$_GET['id'];?>">
    <input type="submit" value="修改確定">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單" onclick="more()">
</div>

</form>
<script>
function more(){
    let row=`<tr>
        <td><input type="text" name="text2[]" value=""></td>
        <td><input type="text" name="href2[]" value=""></td>
        <td></td>
        </tr>`
    $("#submenu").append(row)
}

</script>