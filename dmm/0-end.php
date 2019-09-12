<?php

echo shell_exec("ffmpeg -sseof -30 -i a.mp4 -c copy b.mp4 2>&1");

?>
