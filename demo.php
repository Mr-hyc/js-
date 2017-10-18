<?php
    #设置php编码
    header("Content-type:text/html;charset=utf-8");
    header("Access-Control-Allow-Origin: *");
    #连接数据库
    $sql=mysqli_connect('localhost','root','12345678');
    #判断连接是否成功
    if (!mysqli_select_db($sql,'user')) {
        echo "失败";
    }
    #设置数据库的编码方式；
    mysqli_query($sql,'set names utf8');
    $pageSize=$_GET['number'];
    $page=$_GET['page'];
   // echo $sqlRefer;
    //执行上面的查询语句
    if ($page>3) {
        echo 1;
    }else{
        #($page-1)*$pageSize 页数 
        #$pageSize 所取条数
         $sqlRefer="select * from imgUrl where 1 limit ".($page-1)*$pageSize.",$pageSize";
         $sqlResult=mysqli_query($sql,$sqlRefer);
         # $sqlResult执行上面的查询返回obj
         while ($result = mysqli_fetch_assoc($sqlResult)) {
             $arr[]=$result;
         }
        echo json_encode($arr);
    }
?>
