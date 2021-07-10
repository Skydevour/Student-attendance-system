
<?php
  
//递归函数实现遍历指定文件下的目录与文件数量
  
function total($dirname,&$dirnum,&$filenum){
    $dir=opendir($dirname);
    while($folders=readdir($dir)){
        //要判断的是$dirname下的路径是否是目录
        $newfile=$dirname."/".$folders;
         $sl=0;
          echo $folders."<br>";
           $newfiles=opendir($newfile);
            while($filenames=readdir($newfiles))
           {
               $sl++;   
           }
            echo 'A'.$sl."<br>";
      
     }
    closedir($dir);
}
    
$dirnum=0;
$filenum=0;
total("/var/www/html/2019-zhaopei-c++-201805/total",$dirnum,$filenum);
?>
