<?php
$file='parsed_errors.txt';
$fh = fopen('c:\laragon\error_log','r');
$content=NULL;
$count=0;
while ($line = fgets($fh)) {

    if (strpos($line, 'asavu'))
    {
        
        $first_explode = explode("] ", $line);
      foreach ($first_explode as $row)
      {
        
         $count+=1;
         $x=$count%5;
         switch($x)
         {
             case 1:
                 $a=substr($row,4,8)."\t";
                 $content .=$a;
                break;
             case 2:
                break;
             case 3:
                //$a=substr($row,1)."\t";
                //$content .=$a;
                break;
             case 4:
                $a=substr($row,7)."\t";
                $content .=$a;
                break;
             case 0:
                  $a=$row."\r\n";
                 $content .=$a;
                 break;
            

         }
       
      }
    
    }
   
    

}
file_put_contents($file,$content);
fclose($fh);
