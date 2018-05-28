<?php 
    $fileName = pathinfo(__FILE__, PATHINFO_FILENAME);

    $cacheFile = 'cached/cache-' . $fileName . '.html';
    $cacheTime = 3600;

    if (file_exists($cacheFile) && time() - fileatime('cached/01.html') < $cacheTime) {
        include $cacheFile;
    } else {
        ob_start();
        for ($i=1; $i <= 1000; $i++) echo $i . "<br>";
        file_put_contents($cacheFile, ob_get_contents());
        ob_end_flush();
    }
?>