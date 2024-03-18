<?php

    $url = '/extra/a-legbefolyasosabb-magyar-nok-2024/';

    $script = '/assets/index-v1aOd7ip.js';
    $stylsheet = '/assets/index-oOog2nK4.css';
    
    if(!isset($page)) {
        $page = [
            'path' => '/',
            'subpage' => ''
        ];
    }

    if(!isset($metaTitle)) {
        $metaTitle = 'Az 50 leggazdagabb magyar 2023-24 | Forbes';
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="<?= $url ?>/images/Facicon.png" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script>
      window.mainUrl = "/";
    </script>
    
    <!-- share area -->
    <meta property="og:site_name" content="Forbes">
    <meta property="og:url" content="">
    <meta property="og:title" content="<?= $metaTitle ?>">
    <meta property="og:description"
      content="Tizedik alkalommal állítottuk össze a legbefolyásosabb magyar nők listáját üzlet, média, kultúra és közélet kategóriákban.">
    <meta property="og:image" content="<?= $url ?>/social-share-images/fb-share.png">

    <title>Forbes - Az 50 leggazdagabb magyar</title>

    <script type="module" crossorigin src="<?=$url.$script?>"></script>
    <link rel="stylesheet" crossorigin href="<?=$url.$stylsheet?>">

  </head>
  <body>
    <div id="app"></div>
    
  </body>
</html>
