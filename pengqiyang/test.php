<?php
    $var1="/var/www/html/2019-zhaopei-高数一-201801/2019-10-16/1.jpg";
    $var2="/var/www/html/2019-zhaopei-高数一-201801/2019-10-16";
    $var3="/var/www/html/2019-zhaopei-高数一-201801/2019-10-16/detect";
    $shell = "bash demo.sh ". $var1." ".$var2." ".$var3;
    exec($shell, $result, $status);
    $shell = "<font color='red'>$shell</font>";
    echo "<pre>";
    if( $status ){
        echo "shell命令{$shell}执行失败";
    } else {
        echo "shell命令{$shell}成功执行, 结果如下<hr>";
        print_r( $result );
    }
    echo "</pre>";
?>
