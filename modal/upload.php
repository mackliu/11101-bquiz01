<?php
$do=$_GET['table'];

include_once "../base.php";?>
<h3 style="text-align:center"><?=$Str->uploadModal[0];?></h3>
<hr>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><?=$Str->uploadModal[1];?>:</td>
            <td><input type="file" name="img" ></td>
        </tr>
    </table>
    <div>
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="hidden" name="table" value="<?=$do;?>">
        <input type="submit" value="更新"><input type="reset" value="重置">
    </div>
</form>