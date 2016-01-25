<?php
copydir("bundle_1","filescreate");
function copydir($source,$destination)
{
    if(!is_dir($destination)){
    $oldumask = umask(0); 
    mkdir($destination, 01777); // so you get the sticky bit set 
    umask($oldumask);
}
$dir_handle = @opendir($source) or die("Unable to open");
while ($file = readdir($dir_handle)) 
{
    if($file!="." && $file!=".." && !is_dir("$source/$file")) //if it is file
    copy("$source/$file","$destination/$file");
    if($file!="." && $file!=".." && is_dir("$source/$file")) //if it is folder
    copydir("$source/$file","$destination/$file");
}
    closedir($dir_handle);
}
?>
