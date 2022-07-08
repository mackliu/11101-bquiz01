<?php
$do=$_GET['do']??'title';
include_once "../base.php";?>
<h3 style="text-align:center"><?=$Str->addModalHeader;?></h3>
<hr>
<form action="./api/add_title.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><?=$Str->addModalcol[0];?>:</td>
            <td><input type="file" name="img" ></td>
        </tr>
        <tr>
            <td><?=$Str->addModalcol[1];?>:</td>
            <td><input type="text" name="text"></td>
        </tr>
    </table>
    <div>
        <input type="submit" value="新增"><input type="reset" value="重置">
    </div>
</form>