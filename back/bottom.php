
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$Str->header;?></p>
    <form method="post" action="./api/update.php">
        <table width="50%" style="margin:auto;">
            <tbody>
                <tr class="yel">
                    <td width="45%"><?=$Str->tdHead[0];?></td>
                    <td width="23%">
                        <input type="text" name="bottom" value="<?=$Bot->find(1)['bottom'];?>">
                    </td>
                </tr>                
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">                        
                    </td>
                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>