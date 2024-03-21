<?php

    $url = '/extra/a-legbefolyasosabb-magyar-nok-2024';

    $script = '/assets/index-wfswzrdR.js';
    $stylsheet = '/assets/index-Gf-3_lOs.css';
    
    if(!isset($page)) {
        $page = [
            'path' => '/',
            'subpage' => ''
        ];
    }

    if(!isset($metaTitle)) {
        $metaTitle = 'A legbefolyásosabb magyar nők 2024';
        $metaDesc = 'Állócsillagok, újoncok és visszatérők; önerőből, függetlenként építkezők, és kipróbált, jól bevált bizalmasok a magyar üzleti élet, a kultúra, a médiapiac, vagy éppen a politikai közélet területein. Egyedülálló tudás, unikális hatalom, pénzügyi vagy informális kapcsolati tőke, gigantikus elérés, megbonthatatlan családi és baráti kötelékek. Idén is utánajártunk, mit jelent ma Magyarországon a női befolyás. Itt a tizedik, jubileumi magyar női befolyásos lista, nézzük, mit lehet ünnepelni.';
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="<?= $url ?>/images/Facicon.png" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script>
      window.mainUrl = "<?= $url ?>/";
    </script>
    
    <!-- share area -->
    <meta property="og:site_name" content="Forbes">
    <meta property="og:url" content="">
    <meta property="og:title" content="<?= $metaTitle ?>">
    <meta property="og:description"
      content="<?= $metaDesc ?>">
    <meta property="og:image" content="<?= $url ?>/social-share-images/fb-share.png">

    <title>Forbes_Noi_Lista_2024</title>

    <script type="module" crossorigin src="<?=$url.$script?>"></script>
    <link rel="stylesheet" crossorigin href="<?=$url.$stylsheet?>">

  </head>
  <body>
    <div id="app"></div>
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=G-F73R2FJYMR"
    ></script>
    <!-- (C)2000-2023 Gemius SA - gemiusPrism  / https://forbes.hu//Magazin + rovatoldal -->
    <script type="text/javascript">
      var pp_gemius_identifier =
        ".Xo64etTp8t6lPAFeINGA.U2rjvRGAMIPafaVcPMWEn.s7";
      // lines below shouldn't be edited
      function gemius_pending(i) {
        window[i] =
          window[i] ||
          function () {
            var x = (window[i + "_pdata"] = window[i + "_pdata"] || []);
            x[x.length] = Array.prototype.slice.call(arguments, 0);
          };
      }
      (function (cmds) {
        var c;
        while ((c = cmds.pop())) gemius_pending(c);
      })([
        "gemius_cmd",
        "gemius_hit",
        "gemius_event",
        "gemius_init",
        "pp_gemius_hit",
        "pp_gemius_event",
        "pp_gemius_init",
      ]);
      (function (d, t) {
        try {
          var gt = d.createElement(t),
            s = d.getElementsByTagName(t)[0],
            l = "http" + (location.protocol == "https:" ? "s" : "");
          gt.setAttribute("async", "async");
          gt.setAttribute("defer", "defer");
          gt.src = l + "://gahu.hit.gemius.pl/xgemius.js";
          s.parentNode.insertBefore(gt, s);
        } catch (e) {}
      })(document, "script");
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "G-F73R2FJYMR");
    </script>
  </body>
</html>