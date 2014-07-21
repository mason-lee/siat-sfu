<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 
    <title>Gallery example using phpflickr and shadowbox</title>
    <link rel="stylesheet" type="text/css" href="js/shadowbox-build-3.0rc1/shadowbox.css">
    <script type="text/javascript" src="js/shadowbox-build-3.0rc1/shadowbox.js"></script>
    <script type="text/javascript">
    Shadowbox.init({
        language: 'en',
        players:  ['img'],
        overlayColor: '#333333'
    });
    </script>
    <style>
        html,body
        {
        text-align:center;
        background:#666666;
        }
        .thumbs
        {
        border: 3px solid #ffffff;
        }
        .thumbs:hover
        {
        border: 3px solid #333333;
        }
    </style>
</head>
<body>
<?php
    require_once("phpFlickr-3.1/phpFlickr.php");
 
    $f = new phpFlickr("7bdcc3b06b68475e1e1fc36c50e32c59");
    
    $setId = '72157641834407043';
    $photos = $f->photosets_getPhotos($setId,NULL,NULL,9,17);
    $i=0;
    $maxCol=3;
    foreach ($photos['photoset']['photo'] as $photo){
        echo '<a rel="shadowbox" href="'. $f->buildPhotoURL($photo, 'medium').'">
        <img class="thumbs" src="'.$f->buildPhotoURL($photo, 'square').'">
        </a>';
        $i++;
        if($i==$maxCol){
            $i=0;
            echo "<br>";
        }
    }
    ?>
</body>
</html>