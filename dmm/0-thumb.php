<?php

echo shell_exec("ffmpeg -ss 00:13:13 -i a.mp4 -vframes 1 -q:v 10 a.jpg");

?>
