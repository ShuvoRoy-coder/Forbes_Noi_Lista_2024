<?php

    $url = '/';

    $script = 'assets/index-2BMhiQoc.js';
    $stylsheet = 'assets/index-cbzejEtk.css';
    
    if(!isset($page)) {
        $page = [
            'path' => '/',
            'subpage' => ''
        ];
    }

    if(!isset($metaTitle)) {
        $metaTitle = 'A legbefolyásosabb magyar nők 2024';
        $metaDesc = 'Tizedik alkalommal állítottuk össze a legbefolyásosabb magyar nők listáját üzlet, média, kultúra és közélet kategóriákban.';
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="<?= $url ?>images/Facicon.png" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script>
      window.mainUrl = "/";
    </script>
    
    <!-- share area -->
    <meta property="og:site_name" content="Forbes">
    <meta property="og:url" content="">
    <meta property="og:title" content="<?= $metaTitle ?>">
    <meta property="og:description"
      content="<?= $metaDesc ?>">
    <meta property="og:image" content="<?= $url ?>social-share-images/fb-share.png">

    <title>Forbes_Noi_Lista_2024</title>

    <script type="module" crossorigin src="<?=$url.$script?>"></script>
    <link rel="stylesheet" crossorigin href="<?=$url.$stylsheet?>">

  </head>
  <body>
    <div id="app"></div>
    
  </body>
</html>
