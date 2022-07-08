<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB
{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db15";
    protected $user='root';
    protected $pw='';
    protected $table;
    protected $pdo;

    public function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
    }

    public function all(...$arg){
        $sql="select * from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                
                $sql .= " WHERE " . join(" AND ", $tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }
         //echo $sql;

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    }

    //只取一筆
    public function find($id){
        $sql="select * from $this->table ";

            if(is_array($id)){
                foreach($id as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                
                $sql .= " WHERE " . join(" AND ", $tmp);

            }else{
                $sql .= " WHERE `id` = '$id' ";
            }

         //echo $sql;

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    }
    public function del($id){
        $sql="DELETE from $this->table ";

            if(is_array($id)){
                foreach($id as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                
                $sql .= " WHERE " . join(" AND ", $tmp);

            }else{
                $sql .= " WHERE `id` = '$id' ";
            }

         //echo $sql;

        return $this->pdo->exec($sql);

    }

    public function save($array){

        if(isset($array['id'])){
            //更新
            foreach($array as $key => $value){
                if($key!='id'){
                    $tmp[]="`$key`='$value'";
                }
            }
            $sql="UPDATE $this->table SET ";
            $sql.=join(',',$tmp);
            $sql.=" WHERE `id`='{$array['id']}'";

        }else{
            //新增
            $sql="INSERT INTO $this->table (`".join("`,`",array_keys($array))."`) values('".join("','",$array)."')";
        }

         //echo $sql;

        return $this->pdo->exec($sql);

    }

    public function math($math,$col,...$arg){
        $sql="select $math($col) from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                
                $sql .= " WHERE " . join(" AND ", $tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }
         //echo $sql;

        return $this->pdo->query($sql)->fetchColumn();
    }

    public function q($sql){
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}

class Str{
    public $header;
    public $imgHead;
    public $textHead;
    public $updateImg;
    public $acc;
    public $pw;
    public $mainText;
    public $mainHref;
    public $subText;
    public $subHref;
    public $addBtn;
    public $addModalHeader;
    public $addModalcol;
    public $table;
    public function __construct($table)
    {
        $this->table=$table;
        switch($table){
            case 'title':
                $this->header="網站標題管理";
                $this->imgHead="網站標題";
                $this->textHead="替代文字";
                $this->updateImg="更新圖片";
                $this->addBtn="新增網站標題圖片";
                $this->addModalHeader="新增標題區圖片";
                $this->addModalcol=["標題區圖片","標題區替代文字"];
            break;
            case 'ad':
                $this->header="動態廣告文字管理";
                $this->textHead="動態廣告文字";
                $this->addBtn="新增動態文字廣告";
                $this->addModalHeader="新增動態文字廣告";
                $this->addModalcol=["動態文字廣告"];
            break;
            case 'image':
                $this->header="校園映像資料管理";
                $this->imgHead="校園映像資料圖片";
                $this->updateImg="更換圖片";
                $this->addBtn="新增校園映像圖片";
                $this->addModalHeader="新增校園映像圖片";
                $this->addModalcol=["校園映像圖片"];                
            break;
            case 'mvim':
            break;
            case 'total':
            break;
            case 'bottom':
            break;
            case 'news':
            break;
            case 'admin':
            break;
            case 'menu':
            break;
        }
    }
}

function to($url){
    header("location:".$url);
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


$Bot=new DB('bottom');
$Title=new DB('title');
$Ad=new DB('ad');
$Image=new DB('image');

$Str=new Str($do);

?>
