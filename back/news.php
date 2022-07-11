
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$Str->header;?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%"><?=$Str->tdHead[0];?></td>
                    <td width="10%">顯示</td>
                    <td>刪除</td>
                    
                </tr>
                <?php 
                    
                    $all=$DB->math('count',"id");
                    $div=4;
                    $pages=ceil($all/$div);
                    $now=$_GET['p']??1;
                    $start=($now-1)*$div;
                    //select * from table limit 0,3   
                    $rows=$DB->all(" limit $start,$div");
                    foreach($rows as $row){
                ?>
                <tr >
                    <td>
                        <textarea name="text[]" style="width:95%;height:60px"><?=$row['text'];?></textarea>
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>

                </tr>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php 
                }
                ?>
            </tbody>
        </table>
        <div class="cent">

            <?php
                if(($now-1) > 0){
                    $p=$now-1;
                    echo "<a href='?do={$Str->table}&p=$p'> < </a>";
                }
                for($i=1;$i<=$pages;$i++){
                    $fontsize=($now==$i)?'1.5rem':'';
                    echo "<a href='?do={$Str->table}&p=$i' style='font-size:$fontsize'> ";
                    echo $i;
                    echo " </a>";
                }
                if(($now+1) <= $pages){
                    $p=$now+1;
                    echo "<a href='?do={$Str->table}&p=$p'> > </a>";
                }
            ?>
            
        </div>        
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button"
                            onclick="op('#cover','#cvr','./modal/<?=$Str->table;?>.php?do=<?=$Str->table;?>')" value="<?=$Str->addBtn;?>">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="table" value="<?=$do;?>">
    </form>
</div>