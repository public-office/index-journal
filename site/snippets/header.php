<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index Journal</title>
    <?= css('assets/css/style.css?v='.sha1_file('assets/css/style.css')) ?>
    <?= js('assets/js/jquery.min.js') ?>
    <?= js('assets/js/script.js?v='.sha1_file('assets/js/script.js')) ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="REP3FyJ9Bqjr3A2K2owDTv9toyWnGTjnoPxmUs6vGT4" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139982363-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-139982363-1');
    </script>
  </head>
  <body>
    <? snippet('pane') ?>
    <header>
      <h1><a href="<?= $site->url() ?>">INDEX JOURNAL</a>, <span>Issue No. 1 IDENTITY</span></h1><nav><a href="<?= $site->url() ?>/about">About</a></nav>
    </header>
