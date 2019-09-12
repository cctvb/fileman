<?php

if (!file_exists("drm_iphone")) exit("no drm_iphone");

rename("drm_iphone", "a.mpg");

echo shell_exec("ffmpeg -i dmm.m3u8 -c copy a.mp4 2>&1");

?>
