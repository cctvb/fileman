<?php

foreach (glob("./tss/media_b*.ts") as $file) {

   unlink($file);
}

foreach (glob("*-?.php") as $file) {

   unlink($file);
}

unlink('a.mpg');
unlink('b.mp4');
unlink('a.jpg');
unlink('a.ts');

?>
