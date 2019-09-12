<?php

$i = 0;
$s = 0;

foreach (glob("./tss/*.ts") as $file) {

   $i = $i + 1;
   $s = $s + filesize($file);

}

echo $i;
echo '   ';
echo round($s/1024/1024,2) ;
echo 'mb'; 

?>
