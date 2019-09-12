<?php

if ($_POST['prefix'] == "") exit;
if ($_POST['url'] == "") exit;

$prefix= $_POST["prefix"];
$url= $_POST["url"];

$base = str_replace(basename($url), '', $url);

$bitrate= substr(basename($url,'.ts'), 7, 7);

$total= substr(basename($url,'.ts'), 15);

$a = floor($total/3);
$b = $a + 1;
$c = $a + $a;
$d = $c + 1;

$myfile = fopen("$prefix-0.php", "w") or die("unable to open file!");
$txt = "<?php\n\n\$filelist = '';\n\nfor (\$i = 0; \$i <= $total; \$i++) {\n\n\t\$filelist = \$filelist.'./tss/media_b$bitrate"."_'.strval(\$i).'.ts ' ;\n\n}\n\nsystem('cat '.\$filelist.'> a.ts');\n\n?>";
fwrite($myfile, $txt);
fclose($myfile);

$myfile = fopen("$prefix-1.php", "w") or die("unable to open file!");
$txt = "<?php\n\nfor (\$i = 0; \$i <= $a; \$i++) {\n\n\t\$local = 'media_b$bitrate"."_'.strval(\$i).'.ts';\n\n\t\$remote = '$base'.\$local;\n\n\tif (!file_exists('./tss/'.\$local)) copy(\$remote, './tss/'.\$local);\n\n}\n\n?>";
fwrite($myfile, $txt);
fclose($myfile);

$myfile = fopen("$prefix-2.php", "w") or die("unable to open file!");
$txt = "<?php\n\nfor (\$i = $b; \$i <= $c; \$i++) {\n\n\t\$local = 'media_b$bitrate"."_'.strval(\$i).'.ts';\n\n\t\$remote = '$base'.\$local;\n\n\tif (!file_exists('./tss/'.\$local)) copy(\$remote, './tss/'.\$local);\n\n}\n\n?>";
fwrite($myfile, $txt);
fclose($myfile);

$myfile = fopen("$prefix-3.php", "w") or die("unable to open file!");
$txt = "<?php\n\nfor (\$i = $d; \$i <= $total; \$i++) {\n\n\t\$local = 'media_b$bitrate"."_'.strval(\$i).'.ts';\n\n\t\$remote = '$base'.\$local;\n\n\tif (!file_exists('./tss/'.\$local)) copy(\$remote, './tss/'.\$local);\n\n}\n\n?>";
fwrite($myfile, $txt);
fclose($myfile);

$myfile = fopen("$prefix-9.php", "w") or die("unable to open file!");
$txt = strval($total+1);
fwrite($myfile, $txt);
fclose($myfile);


?>
